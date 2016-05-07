<?php namespace App\Http\Controllers;

use Guzzle\Http\Client;
use Guzzle\Plugin\CurlAuth\CurlAuthPlugin;
use Guzzle\Plugin\Oauth\OauthPlugin;
use DB;
use Mail;
use DateTime;



class PharmaController extends Controller {

	public function __construct()
	{
		$this->middleware('guest');
		$this->days_to_expiry = 21;
	}	

	/**
	* Gets the first available coupon 
	*
	* @return array $coupons
	*/

	public function get_coupons()
	{
		$store_ids = $this->get_ids();

		if(!empty($store_ids))
		{

			// get the coupon code id for each store_id
			foreach($store_ids as $key=>$value)
			{
				$coupon_qry[] = DB::connection('mysql_pharma')->select('SELECT MIN(`id`) as id, coupon FROM coupons WHERE substr(`coupon`, 2, 3) = "'.$value->store_id.'" AND `used` = 0');
			}

			//create a coupon array and then set the used coupons
			foreach($coupon_qry as $key=>$value)
			{
				$coupons[]['coupon_code'] = $value[0]->coupon;
				$this->update_coupons_table($value[0]->id);
			}

			//add the coupon codes to the coupons_reports table
		for($i=0; $i<sizeof($coupon_qry); $i++)
			{
				DB::connection('mysql_pharma')->table('coupon_reports')->where('id', $store_ids[$i]->id)->update(['coupon_code' => $coupon_qry[$i][0]->coupon]);
			}

			//get the date needed to send the email
			$data = $this->get_survey();

			//email the coupon to the customer
			$this->email($data);

		}
	}

	private function email($data)
	{
		$data = json_decode(json_encode($data), TRUE);

		foreach($data as $key=>$value)
		{
			$data['person_name'] 	= $value['first_name']. ' ' .$value['last_name'];
			$data['person_email'] 	= $value['email_address'];
			$data['store_address']  = $value['store_address'];
			$data['pathToImage']  	= 'images/pharmasave/coupons/'.$value['coupon_code'].'.png';
			$data['pathToLogo']  	= 'images/image.png';		
			$data['expiration'] 	= $this->set_expiry_date($this->days_to_expiry,'F d, Y');

	     	Mail::send('emails.pharma_coupon_email', ['data' => $data], function($message) use($data)
			 {
			     $message->attach($data['pathToImage']);
			     $message->attach($data['pathToLogo']);
			 	 $message->subject('Pharmasave');
			 	 $message->from('admin@ngage360.info');
			     $message->to($data['person_email'], $data['person_name']);
			 });

	     	$this->update_coupon_reports_table($value['id']);
		}
	}

	/**
	* Gets the record id and store_id of all new surveys 
	*
	* @return array $id (record_id) and $store_id
	*/	

	private function get_ids()
	{
		return DB::connection('mysql_pharma')->table('coupon_reports')->select('id', 'store_id')->where('completed', NULL)->where('email_address', '!=', 'NULL')->get();
	}

	/**
	* Gets the first available coupon 
	*
	* @return array $coupons
	*/	
	
	private function get_survey()
	{
		return DB::connection('mysql_pharma')->table('coupon_reports')
			->join('stores', function($join)
			{
				$join->on('stores.store_id', '=', 'coupon_reports.store_id')
				->whereNotNull('coupon_reports.coupon_code')
				->whereNull('coupon_reports.completed');
			})
			->get();
	}

	private function set_expiry_date($days, $format)
	{
			$date = new DateTime();
			$date->modify('+'.$days.'days');
			return $date->format($format);		
	}

	private function update_coupons_table($id)
	{
		DB::connection('mysql_pharma')->table('coupons')->where('id', $id)->update(['used' => 1, 'updated_at' => date('Y-m-d H:i:s')]);
	}

	private function update_coupon_reports_table($id)
	{
		DB::connection('mysql_pharma')->table('coupon_reports')->where('id', $id)->update(['issue_date' => date('Y-m-d'), 'expiry_date' => $this->set_expiry_date($this->days_to_expiry, 'Y-m-d'), 'completed' => 1, 'updated_at' => date('Y-m-d H:i:s')]);
	}
	
	private function headers()
	{
		return array(	
				'StoreId', 
				'Reward Identification Number',
				'Issue Date',
				'Expiry Date',
				'First Name',
				'Last Name',
				'Username',
				'Access Code',
				'Email'
			);
	}

	public function create_pharma_report()
	{
		$data =  DB::connection('mysql_pharma')->table('coupon_reports')->select('store_id', 'coupon_code', 'issue_date', 'expiry_date', 'first_name', 'last_name', 'username', 'password', 'email_address')->where('issue_date', date('Y-m-d'))->get();
		$input_array = json_decode(json_encode($data), TRUE);

		$output_file_name = "RIN-RECON-".date('Ymd').".txt";
		$this->save_to_csv($input_array, $output_file_name, ',', $this->headers());
		$this->sftp($output_file_name);
	}
	
	private function save_to_csv($input_array, $output_file_name, $delimiter, $headers)
	{	
	    $f = fopen('../../pharmasave/'.$output_file_name, 'w');
	    fputcsv($f, $headers); 
	    foreach ($input_array as $line) {
	        $csv = fputcsv($f, str_replace('<br>', ' ', $line), $delimiter);
	    }

	    fclose ($f);
	}	

	private function sftp($output_file_name)
	{
		error_reporting(E_ALL);
		ini_set('display_errors', true);		

		$localFile 	= '/home/ngage360/pharmasave/'.$output_file_name;
		$keyphrase = env('SFTP_KEYPHRASE');

		$expCommand = "/home/ngage360/public_html/resources/expect/sftp.exp " . $keyphrase . " " . $localFile; 

		try{
			$expResult = shell_exec($expCommand);
			echo $expResult;
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}	
}

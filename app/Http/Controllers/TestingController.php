<?php namespace App\Http\Controllers;

use DB;
use Excel;
use DateTime;
use DateInterval;

class TestingController extends Controller {

	public function thesource()
	{
		$date = date_create(date('Y-m-d'));
		date_sub($date,date_interval_create_from_date_string("1 days"));
		$yesterday = date_format($date,"Y-m-d 19:00:00");
		$today = date('Y-m-d 19:00:00');
		
		$result = DB::select('select internal_id from the_source_testing WHERE status LIKE "Complet%" AND created_at >= "'.$yesterday.'" AND created_at <= "'.$today.'"');

		foreach ($result as $key => $value) {
			$data[] = DB::table('the_source_testing')->select('id',  'product', 'purpose_of_visit_to_website')->where('internal_id', $value->internal_id)->first();
		}

		$this->product_queries($data);
		$this->purpose_queries($data);

		$this->save_to_csv($this->get_data($result), 'completed_responses_'.date('Ymd').'.csv', ',', $this->headers());
		
	}

	private function product_queries($data)
	{
		foreach ($data as $key => $value) 
		{
			$prod_array[$value->id] = explode('u\'', $value->product);
		}

		foreach ($prod_array as $key => $value) {
			foreach ($value as $k => $v) {
				if($k != '')
			 	{
			 		$product_id[][$key] = DB::table('products')->select('id')->where('product_en', 'LIKE', substr($v, 0, -3).'%')->orWhere('product_fr', 'LIKE', substr($v, 0, -3).'%')->first();
				}
		 	}	
		}

		foreach ($product_id as $key => $value) {
			foreach ($value as $k => $v) 
			{
			  	if(is_object($v)){
				  	DB::table('the_source_testing')->where('id', $k)->update(['product_'.$v->id => 1]);
				  }
				 else{
				  	DB::table('the_source_testing')->where('id', $k)->update(['product_21' => 1]);
				  }
			}
		}		
	}

	private function purpose_queries($data)
	{
		foreach ($data as $key => $value) 
		{
			$purpose_array[$value->id] = explode('u\'', $value->purpose_of_visit_to_website);
		}		

		foreach ($purpose_array as $key => $value) {
			foreach ($value as $k => $v) {
				if($k != '')
			 	{
			 		$purpose_id[][$key] = DB::table('purpose_of_visit')->select('id')->where('purpose_en', 'LIKE', substr($v, 0, -3).'%')->orWhere('purpose_fr', 'LIKE', substr($v, 0, -3).'%')->toSql();
				}
		 	}	
		}

		foreach ($purpose_id as $key => $value) {
			foreach ($value as $k => $v) 
			{
			  	if(is_object($v)){
				  	DB::table('the_source_testing')->where('id', $k)->update(['purpose_of_visit_to_website_'.$v->id => 1]);
				  }
				 else{
				  	DB::table('the_source_testing')->where('id', $k)->update(['purpose_of_visit_to_website_8' => 1]);
				  }
			}
		}		
	}

	private function get_data_for_all($result)
	{
		foreach($result as $value)
		{
		   $res[] = 
		   DB::table('the_source_testing')
		   ->select(
		   'status', 
		   'internal_id', 
		   'created_at', 		   
		   'browser_name',
		   'browser',
		   'device_type',
		   'operating_system',
		   DB::raw('coalesce(store_location,store_location_mobile)'),
		   'primary_reason_visit',
		   'date',
		   'receipt',
		   'amount',
		   'time',
		   'overall_sat_0',
		   'willing_contacted',
		   'contact_info',
		   'unpleasant',
		   'delighted',
		   'likely_return_refer_0',
		   'likely_return_refer_1',
		   'product_1',
		   'product_2',
		   'product_3',
		   'product_4',
		   'product_5',
		   'product_6',
		   'product_7',
		   'product_8',
		   'product_9',
		   'product_10',
		   'product_11',
		   'product_12',
		   'product_13',
		   'product_14',
		   'product_15',
		   'product_16',
		   'product_17',
		   'product_18',
		   'product_19',
		   'product_20',
		   'product_21',
		   'able_to_purchase',
		   'product_not_available_0',
		   'product_not_available_1',
		   'product_not_available_2',
		   'product_not_available_3',
		   'product_not_available_4',
		   'product_not_available_5',
		   'product_not_available_6',
		   'product_not_available_7',
		   'product_not_available_8',
		   'product_not_available_9',
		   'product_not_available_10',
		   'product_not_available_11',
		   'product_not_available_12',
		   'product_not_available_13',
		   'product_not_available_14',
		   'product_not_available_15',
		   'product_not_available_16',
		   'product_not_available_17',
		   'product_not_available_18',
		   'product_not_available_19',
		   'store_experience_0',
		   'store_experience_1',
		   'store_experience_2',
		   'store_experience_3',
		   'store_experience_4',
		   'store_experience_5',
		   'store_experience_6',
		   'store_experience_7',
		   'store_experience_8',
		   'store_experience_9',
		   'Associates_0',
		   'Associates_1',
		   'Associates_2',
		   'Associates_3',
		   'Associates_4',
		   'suggest_products_to_meet_your_needs',
		   'suggest_products_complement_purchase',
		   'mention_mobile_phones_or_tv_services',
		   'satisfied_information_provided_0',
		   'dissatisfied_with_information_0',
		   'dissatisfied_with_information_1',
		   'dissatisfied_with_information_2',
		   'likely_refer_mobile_phones_0',
		   'brand_perception_0',
		   'brand_perception_1',
		   'brand_perception_2',
		   'brand_perception_3',
		   'brand_perception_4',
		   'visited_website',
		   'purpose_of_visit_to_website_1',
		   'purpose_of_visit_to_website_2',
		   'purpose_of_visit_to_website_3',
		   'purpose_of_visit_to_website_4',
		   'purpose_of_visit_to_website_5',
		   'purpose_of_visit_to_website_6',
		   'purpose_of_visit_to_website_7',
		   'purpose_of_visit_to_website_8',
		   'did_you_find_information_looking_for',
		   'reason_for_visit_0',
		   'reason_for_visit_1',
		   'number_of_electronic_purchases_past_year',
		   'number_of_purchase_from_Source_past_year',
		   'number_electronic_purchases_online_past',
		   'number_purchases_thesourceca_past_year',
		   'what_could_be_done_to_improve',
		   'gender',
		   'current_age',
		   'income',
		   'children_under_18',
		   'enter_contest',
		   'personal_0',
		   'personal_1',
		   'personal_2',
		   'personal_3', 
		   'personal_4',
		   'personal_5',
		   'personal_6',
		   'personal_7',
		   'personal_8',
		   'age',
		   'rules',
		   'options',
		   DB::raw('coalesce(region,region_mobile)'),
		   DB::raw('coalesce(district,district_mobile)'),
		   DB::raw('coalesce(store_name,store_name_mobile)'))
		   ->where('internal_id', $value->internal_id)
		   ->first();
		}

		foreach($res as $key=>$value)
		{
		   $data[] = (array) $value;
		}		

		return $data;
	}	

	public function get_data($result)
	{
		foreach($result as $value)
		{
		   $res[] = 
		   DB::table('the_source_testing')
		   ->select(
		   	'id',
		   'status', 
		   'internal_id', 
		   DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'), 		   
		   'browser_name',
		   'browser',
		   'device_type',
		   'operating_system',
		   DB::raw('coalesce(store_location,store_location_mobile)'),
		   'primary_reason_visit',
		   'date',
		   'receipt',
		   'amount',
		   'time',
		   'overall_sat_0',
		   'willing_contacted',
		   'contact_info',
		   'unpleasant',
		   'delighted',
		   'likely_return_refer_0',
		   'likely_return_refer_1',
		   'product_1',
		   'product_2',
		   'product_3',
		   'product_4',
		   'product_5',
		   'product_6',
		   'product_7',
		   'product_8',
		   'product_9',
		   'product_10',
		   'product_11',
		   'product_12',
		   'product_13',
		   'product_14',
		   'product_15',
		   'product_16',
		   'product_17',
		   'product_18',
		   'product_19',
		   'product_20',
		   'product_21',
		   'able_to_purchase',
		   'product_not_available_0',
		   'product_not_available_1',
		   'product_not_available_2',
		   'product_not_available_3',
		   'product_not_available_4',
		   'product_not_available_5',
		   'product_not_available_6',
		   'product_not_available_7',
		   'product_not_available_8',
		   'product_not_available_9',
		   'product_not_available_10',
		   'product_not_available_11',
		   'product_not_available_12',
		   'product_not_available_13',
		   'product_not_available_14',
		   'product_not_available_15',
		   'product_not_available_16',
		   'product_not_available_17',
		   'product_not_available_18',
		   'product_not_available_19',
		   'store_experience_0',
		   'store_experience_1',
		   'store_experience_2',
		   'store_experience_3',
		   'store_experience_4',
		   'store_experience_5',
		   'store_experience_6',
		   'store_experience_7',
		   'store_experience_8',
		   'store_experience_9',
		   'Associates_0',
		   'Associates_1',
		   'Associates_2',
		   'Associates_3',
		   'Associates_4',
		   'suggest_products_to_meet_your_needs',
		   'suggest_products_complement_purchase',
		   'mention_mobile_phones_or_tv_services',
		   'satisfied_information_provided_0',
		   'dissatisfied_with_information_0',
		   'dissatisfied_with_information_1',
		   'dissatisfied_with_information_2',
		   'likely_refer_mobile_phones_0',
		   'brand_perception_0',
		   'brand_perception_1',
		   'brand_perception_2',
		   'brand_perception_3',
		   'brand_perception_4',
		   'visited_website',
		   'purpose_of_visit_to_website_1',
		   'purpose_of_visit_to_website_2',
		   'purpose_of_visit_to_website_3',
		   'purpose_of_visit_to_website_4',
		   'purpose_of_visit_to_website_5',
		   'purpose_of_visit_to_website_6',
		   'purpose_of_visit_to_website_7',
		   'purpose_of_visit_to_website_8',
		   'did_you_find_information_looking_for',
		   'reason_for_visit_0',
		   'reason_for_visit_1',
		   'number_of_electronic_purchases_past_year',
		   'number_of_purchase_from_Source_past_year',
		   'number_electronic_purchases_online_past',
		   'number_purchases_thesourceca_past_year',
		   'what_could_be_done_to_improve',
		   'gender',
		   'current_age',
		   'income',
		   'children_under_18',
		   'enter_contest',
		   'personal_0',
		   'personal_1',
		   'personal_2',
		   'personal_3', 
		   'personal_4',
		   'personal_5',
		   'personal_6',
		   'personal_7',
		   'personal_8',
		   'age',
		   'rules',
		   'options',
		   DB::raw('coalesce(region,region_mobile)'),
		   DB::raw('coalesce(district,district_mobile)'),
		   DB::raw('coalesce(store_name,store_name_mobile)'))
		   ->where('internal_id', $value->internal_id)
		   ->first();
		}

		foreach($res as $key=>$value)
		{
		   $data[] = (array) $value;
		}		

		return $data;
	}
	
	
	public function save_to_csv($input_array, $output_file_name, $delimiter, $headers)
	{	
	    $f = fopen('../../the_source_testing/'.$output_file_name, 'w');
	    fputcsv($f, $headers); 
	    foreach ($input_array as $line) {
	        
	        $csv = fputcsv($f, str_replace('<br>', ' ', $line), $delimiter);
	    }
	    fclose ($f);
	}

	public function change_date_format()
	{
		$new_date = DB::table('the_source_testing')->select(DB::raw('STR_TO_DATE(created_at, "%c/%e/%Y") as date, id'))->where('created_at', '<', '2016-02-01')->get();
		foreach ($new_date as $key => $value) {
			DB::table('the_source_testing')->where('id', $value->id)->update(['created_at' => $value->date]);
		}
	}

    public function thesource_all()
	{
		$result = DB::select('select distinct personal_6 from the_source_testing WHERE status="Complete"') ;	
		$this->save_to_csv($this->get_data($result), 'all_responses.csv', ',', $this->headers());
	}

	protected function headers()
	{
		return array(
			'id',
		   'status', 
           'internal_id', 
		   'created_at', 		   
		   'browser_name',
		   'browser',
		   'device_type',
		   'operating_system',
		   'store_location',
		   'primary_reason_visit',
		   'date',
		   'receipt',
		   'amount',
		   'time',
		   'overall_sat_0',
		   'willing_contacted',
		   'contact_info',
		   'unpleasant',
		   'delighted',
		   'likely_return_refer_0',
		   'likely_return_refer_1',
		   'product_1',
		   'product_2',
		   'product_3',
		   'product_4',
		   'product_5',
		   'product_6',
		   'product_7',
		   'product_8',
		   'product_9',
		   'product_10',
		   'product_11',
		   'product_12',
		   'product_13',
		   'product_14',
		   'product_15',
		   'product_16',
		   'product_17',
		   'product_18',
		   'product_19',
		   'product_20',
		   'product_21',
		   'able_to_purchase',
		   'product_not_available_0',
		   'product_not_available_1',
		   'product_not_available_2',
		   'product_not_available_3',
		   'product_not_available_4',
		   'product_not_available_5',
		   'product_not_available_6',
		   'product_not_available_7',
		   'product_not_available_8',
		   'product_not_available_9',
		   'product_not_available_10',
		   'product_not_available_11',
		   'product_not_available_12',
		   'product_not_available_13',
		   'product_not_available_14',
		   'product_not_available_15',
		   'product_not_available_16',
		   'product_not_available_17',
		   'product_not_available_18',
		   'product_not_available_19',
		   'store_experience_0',
		   'store_experience_1',
		   'store_experience_2',
		   'store_experience_3',
		   'store_experience_4',
		   'store_experience_5',
		   'store_experience_6',
		   'store_experience_7',
		   'store_experience_8',
		   'store_experience_9',
		   'Associates_0',
		   'Associates_1',
		   'Associates_2',
		   'Associates_3',
		   'Associates_4',
		   'suggest_products_to_meet_your_needs',
		   'suggest_products_complement_purchase',
		   'mention_mobile_phones_or_tv_services',
		   'satisfied_information_provided_0',
		   'dissatisfied_with_information_0',
		   'dissatisfied_with_information_1',
		   'dissatisfied_with_information_2',
		   'likely_refer_mobile_phones_0',
		   'brand_perception_0',
		   'brand_perception_1',
		   'brand_perception_2',
		   'brand_perception_3',
		   'brand_perception_4',
		   'visited_website',
		   'purpose_of_visit_to_website_1',
		   'purpose_of_visit_to_website_2',
		   'purpose_of_visit_to_website_3',
		   'purpose_of_visit_to_website_4',
		   'purpose_of_visit_to_website_5',
		   'purpose_of_visit_to_website_6',
		   'purpose_of_visit_to_website_7',
		   'purpose_of_visit_to_website_8',
		   'did_you_find_information_looking_for',
		   'reason_for_visit_0',
		   'reason_for_visit_1',
		   'number_of_electronic_purchases_past_year',
		   'number_of_purchase_from_Source_past_year',
		   'number_electronic_purchases_online_past',
		   'number_purchases_thesourceca_past_year',
		   'what_could_be_done_to_improve',
		   'gender',
		   'current_age',
		   'income',
		   'children_under_18',
		   'enter_contest',
		   'personal_0',
		   'personal_1',
		   'personal_2',
		   'personal_3', 
		   'personal_4',
		   'personal_5',
		   'personal_6',
		   'personal_7',
		   'personal_8',
		   'age',
		   'rules',
		   'options',
		   'region',
		   'district',
		   'store_name'
			);
	}
}
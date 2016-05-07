<?php namespace App\Http\Controllers;

use DB;
use Excel;
use DateTime;
use DateInterval;

class MainController extends Controller {

	//gets the 
	public function thesource()
	{
		$date = date_create(date('Y-m-d'));
		date_sub($date,date_interval_create_from_date_string("1 days"));
		$yesterday 	= date_format($date,"Y-m-d 19:00:00");
		$today 		= date('Y-m-d 19:00:00');
		
		//$result = DB::select('select internal_id from the_source_testing WHERE status="Complete" AND created_at >= "'.$yesterday.'" AND created_at <= "'.$today.'"');

		//$result = DB::select('select internal_id from the_source_testing WHERE status="Complete" AND created_at >= "2016-05-02 10:00:00" AND created_at <= "2016-05-04 19:00:00"');
		$result = DB::select('select internal_id from the_source_testing WHERE status="Complete" AND id > 5547');

		$res = $this->get_data($result);
		foreach ($res as $key => $value) {
			$id = $value['id'];

			$this->answers('primary_reason_visit', $value['primary_reason_visit'], $id);
			$this->answers('able_to_purchase', $value['able_to_purchase'], $id);
			$this->answers('overall_sat_0', $value['overall_sat_0'], $id);
			$this->answers('time', $value['time'], $id);
			$this->answers('willing_contacted', $value['willing_contacted'], $id);
			$this->answers('likely_return_refer_0', $value['likely_return_refer_0'], $id);
			$this->answers('likely_return_refer_1', $value['likely_return_refer_1'], $id);
			$this->answers('store_experience_0', $value['store_experience_0'], $id);
			$this->answers('store_experience_1', $value['store_experience_1'], $id);
			$this->answers('store_experience_2', $value['store_experience_2'], $id);
			$this->answers('store_experience_3', $value['store_experience_3'], $id);
			$this->answers('store_experience_4', $value['store_experience_4'], $id);
			$this->answers('store_experience_5', $value['store_experience_5'], $id);
			$this->answers('store_experience_6', $value['store_experience_6'], $id);
			$this->answers('store_experience_7', $value['store_experience_7'], $id);
			$this->answers('store_experience_8', $value['store_experience_8'], $id);
			$this->answers('store_experience_9', $value['store_experience_9'], $id);
			$this->answers('Associates_0', $value['Associates_0'], $id);
			$this->answers('Associates_1', $value['Associates_1'], $id);
			$this->answers('Associates_2', $value['Associates_2'], $id);
			$this->answers('Associates_3', $value['Associates_3'], $id);
			$this->answers('Associates_4', $value['Associates_4'], $id);
			$this->answers('suggest_products_to_meet_your_needs', $value['suggest_products_to_meet_your_needs'], $id);
			$this->answers('suggest_products_complement_purchase', $value['suggest_products_complement_purchase'], $id);
			$this->answers('mention_mobile_phones_or_tv_services', $value['mention_mobile_phones_or_tv_services'], $id);
			$this->answers('satisfied_information_provided_0', $value['satisfied_information_provided_0'], $id);
			$this->answers('dissatisfied_with_information_0', $value['dissatisfied_with_information_0'], $id);
			$this->answers('satisfied_information_mobile_phone_0', $value['satisfied_information_mobile_phone_0'], $id);
			$this->answers('likely_refer_mobile_phones_0', $value['likely_refer_mobile_phones_0'], $id);
			$this->answers('brand_perception_0', $value['brand_perception_0'], $id);
			$this->answers('brand_perception_1', $value['brand_perception_1'], $id);
			$this->answers('brand_perception_2', $value['brand_perception_2'], $id);
			$this->answers('brand_perception_3', $value['brand_perception_3'], $id);
			$this->answers('brand_perception_4', $value['brand_perception_4'], $id);
			$this->answers('visited_website', $value['visited_website'], $id);
			$this->answers('reason_for_visit_0', $value['reason_for_visit_0'], $id);
			$this->answers('reason_for_visit_1', $value['reason_for_visit_1'], $id);
			$this->answers('number_of_electronic_purchases_past_year', $value['number_of_electronic_purchases_past_year'], $id);
			$this->answers('number_of_purchase_from_Source_past_year', $value['number_of_purchase_from_Source_past_year'], $id);
			$this->answers('number_electronic_purchases_online_past', $value['number_electronic_purchases_online_past'], $id);
			$this->answers('number_purchases_thesourceca_past_year', $value['number_purchases_thesourceca_past_year'], $id);
			$this->answers('gender', $value['gender'], $id);
			$this->answers('current_age', $value['current_age'], $id);
			$this->answers('income', $value['income'], $id);
			$this->answers('children_under_18', $value['children_under_18'], $id);
			$this->answers('enter_contest', $value['enter_contest'], $id);
			$this->answers('age', $value['age'], $id);
			$this->answers('rules', $value['rules'], $id);
			$this->answers('options', $value['options'], $id);
			$this->answers('product_not_available_0', $value['product_not_available_0'], $id);
			$this->answers('product_not_available_1', $value['product_not_available_1'], $id);
			$this->answers('product_not_available_2', $value['product_not_available_2'], $id);
			$this->answers('product_not_available_3', $value['product_not_available_3'], $id);
			$this->answers('product_not_available_4', $value['product_not_available_4'], $id);
			$this->answers('product_not_available_5', $value['product_not_available_5'], $id);
			$this->answers('product_not_available_6', $value['product_not_available_6'], $id);
			$this->answers('product_not_available_7', $value['product_not_available_7'], $id);
			$this->answers('product_not_available_8', $value['product_not_available_8'], $id);
			$this->answers('product_not_available_9', $value['product_not_available_9'], $id);
			$this->answers('product_not_available_10', $value['product_not_available_10'], $id);
			$this->answers('product_not_available_11', $value['product_not_available_11'], $id);
			$this->answers('product_not_available_12', $value['product_not_available_12'], $id);
			$this->answers('product_not_available_13', $value['product_not_available_13'], $id);
			$this->answers('product_not_available_14', $value['product_not_available_14'], $id);
			$this->answers('product_not_available_15', $value['product_not_available_15'], $id);
			$this->answers('product_not_available_16', $value['product_not_available_16'], $id);
			$this->answers('product_not_available_17', $value['product_not_available_17'], $id);
			$this->answers('product_not_available_18', $value['product_not_available_18'], $id);
			$this->answers('product_not_available_19', $value['product_not_available_19'], $id);
		}		


		foreach ($result as $key => $value) {
			$data[] = DB::table('the_source_testing')->select('id',  'product', 'purpose_of_visit_to_website')->where('internal_id', $value->internal_id)->first();
		}
		$this->purpose_queries($data);
		$this->product_queries($data);
		
		$this->save_to_csv($res, 'completed_responses_'.date('Ymd').'.csv', ',', $this->headers());
		
	}

	private function answer_queries($res)
	{

	}

	private function answers($k, $v, $id)
	{

		$arr1 = [
				0=>'To make a purchase',
				1=>'To exchange an item',
				2=>'To return an item',
				3=>'To pick up an order purchased online from thesource.ca',
				4=>'Just browsing, didn’t make a purchase'
				];
		$arr1f =[
				0=>'Pour effectuer un achat',
				1=>'Pour échanger un article',
				2=>'Pour retourner un article',
				3=>'Pour le ramassage d’une commande effectuée en ligne sur le site de LaSource.ca',
				4=>'Juste pour fureter, je n’ai rien acheté'
				];	

		$arr2 = [
				0=>'9am - Noon',
				1=>'Noon - 4pm',
				2=>'4pm - 7pm',
				3=>'7pm - 11pm',
				4=>'I can\'t remember'
				];
		$arr2f =[
				0=>'Entre 9 h 00 et 12 h 00',
				1=>'Entre 12 h 00 et 16 h 00',
				2=>'Entre 16 h 00 et 19 h 00',
				3=>'Entre 19 h 00 et 23 h 00',
				4=>'Je ne me souviens plus'				
				];

		$arr3 =[
				0=>'0<br>Extremely<br>dissatisfied',
				1=>'1<br>Very<br>dissatisfied',
				2=>'2<br>Somewhat<br>dissatisfied',
				3=>'3<br>Somewhat<br>satisfied',
				4=>'4<br>Very<br>satisfied',
				5=>'5<br>Extremely<br>satisfied'
				];
		$arr3f =[
				0=>'0<br>Extrêmement<br>insatisfait',
				1=>'1<br>Très<br>insatisfait',
				2=>'2<br>Plutôt<br>insatisfait',
				3=>'3<br>Plutôt<br>satisfait',
				4=>'4<br>Très<br>satisfait',
				5=>'5<br>Extrêmement<br>satisfait'
				];

		$arrA3 =[
				0=>'0 - Extremely<br>dissatisfied',
				1=>'1 - Very<br>dissatisfied',
				2=>'2 - Somewhat<br>dissatisfied',
				3=>'3 - Somewhat<br>satisfied',
				4=>'4 - Very<br>satisfied',
				5=>'5 - Extremely<br>satisfied'
				];
		$arrA3f =[
				0=>'0 - Extrêmement<br>insatisfait',
				1=>'1 - Très<br>insatisfait',
				2=>'2 - Plutôt<br>insatisfait',
				3=>'3 - Plutôt<br>satisfait',
				4=>'4 - Très<br>satisfait',
				5=>'5 - Extrêmement<br>satisfait'
				];				

		$arr4 = [
				0=>'Yes',
				1=>'No',
				2=>'Prefer not to answer',
				3=>'Some but not all'
				];
		$arr4f = [
				0=>'Oui',
				1=>'Non',
				2=>'Je préfère ne pas répondre',
				3=>'Certains, mais pas tous'				
				];

		$arr5 = [
				0=>'0<br>Completely<br>disagree',
				1=>'1<br>Strongly<br>disagree',
				2=>'2<br>Somewhat<br>disagree',
				3=>'3<br>Somewhat<br>agree',
				4=>'4<br>Strongly<br>agree',
				5=>'5<br>Completely<br>agree'
				];
		$arr5f =[
				0=>'0<br>Totalement<br>en désaccord',
				1=>'1<br>Fortement<br>en désaccord',
				2=>'2<br>Plutôten<br>désaccord',
				3=>'3<br>Plutôt<br>d’accord',
				4=>'4<br>Très<br>en accord',
				5=>'5<br>Entièrement<br>d’accord'
				];


		$arr7 = [		
				0=>'Not enough information provided',
				1=>'Too much information provided',
				2=>'Information was too technical',
				3=>'Other, please specify:'
				];
		$arr7f =[
				0=>'Quantité insuffisante d’information fournie',
				1=>'Quantité trop importante d’information',
				2=>'L’information était trop technique',
				3=>'Autre, veuillez spécifier:'
				];

		$arr8 = [
				0=>'The Source flyer',
				1=>'Another type of advertising',
				2=>'Received an offer by email',
				3=>'To purchase or pick up something',
				4=>'The Source was recommended to me',
				5=>'Just browsing',
				6=>'Returning or exchanging something',
				7=>'To look at something I found on thesource.ca',
				8=>'Other'
				];
		$arr8f= [
				0=>'Circulaire de La Source',
				1=>'Autre source publicitaire',
				2=>'Offre reçue par courriel',
				3=>'Pour acheter, ou pour ramasser une commande',
				4=>'On m’a conseillé La Source',
				5=>'Simplement pour fureter',
				6=>'Retourner ou échanger quelque chose',
				7=>'Pour regarder quelque chose que j’ai trouvé sur le site de <b><i>lasource.ca</b></i>',
				8=>'Autre, veuillez spécifier :'
				];

		$arr9 =[		
				0=>'Never',
				1=>'1 to 2 times',
				2=>'3 to 4 times',
				3=>'5 to 6 times',
				4=>'More than 6 times'
				];
		$arr9f=[
				0=>'Jamais',
				1=>'1 à 2 fois',
				2=>'3 à 4 fois',
				3=>'5 à 6 fois',
				4=>'Plus de 6 fois'				
				];

		$arr10 =[				
				0=>'This was my first purchase from The Source',
				1=>'1 to 2 times',
				2=>'3 to 4 times',
				3=>'5 to 6 times',
				4=>'More than 6 times'
				];
		$arr10f=[
				0=>'C’était la première fois que j’achetais à La Source',
				1=>'1 à 2 fois',
				2=>'3 à 4 fois',
				3=>'5 à 6 fois',
				4=>'Plus de 6 fois'				
				];


		$arr12 =[
				0=>'Male',
				1=>'Female',
				2=>'Prefer not to answer'
				];
		$arr12f=[
				0=>'Masculin',
				1=>'Féminin',
				2=>'Je préfère ne pas répondre'				
				];

		$arr13 =[		
				0=>'Under 18',
				1=>'18 to 24',
				2=>'25 to 34',
				3=>'35 to 44',
				4=>'45 to 54',
				5=>'55 to 64',
				6=>'65 or older',
				7=>'Prefer not to answer'
				];
		$arr13f=[
				0=>'Moins de 18 ans',
				1=>'Entre 18 ans et 24 ans',
				2=>'Entre 25 ans et 34 ans',
				3=>'Entre 35 ans et 44 ans',
				4=>'Entre 45 ans et 54 ans',
				5=>'Entre 55 ans et 64 ans',
				6=>'65 ans et plus',
				7=>'Je préfère ne pas répondre'										
				];

		$arr14 =[		
				0=>'Less than $25,000',
				1=>'$25,000 to $34,999',
				2=>'$35,000 to $49,999',
				3=>'$50,000 to $74,999',
				4=>'$75,000 to $99,999',
				5=>'$100,000 to $124,999',
				6=>'$125,000 to $149,999',
				7=>'$150,000 or more',
				8=>'Prefer not to answer'
				];
		$arr14f=[
				0=>'Moins de 25 000 $',
				1=>'Entre 25 000 $ et 34 999 $',
				2=>'Entre 35 000 $ et 49 999 $',
				3=>'Entre 50 000 $ et 74 999 $',
				4=>'Entre 75 000 $ et 99 999 $',
				5=>'Entre 100 000 $ et 124 999 $',
				6=>'Entre 125 000 $ et 149 999 $',
				7=>'150 000 $ ou plus',	
				8=>'Je préfère ne pas répondre'								
				];

		$arr15=	[0=>'I am 16 years of age or older'];
		$arr15f=[0=>'J’ai 16 ans ou plus'];

		$arr16=	[0=>'I have read, understand and agree to comply by the Official Rules governing this Contest.'];
		$arr16f=[0=>'J’ai lu, compris et accepte de respecter le règlement officiel qui régit ce concours.'];
				
		$arr17=	[0=>'I would like to receive marketing communications from The Source and related Bell companies, including Bell Media, Bell Canada, Bell ExpressVu LP, Bell Mobility and Virgin Mobile (for ease of reference, referred to collectively as “The Source”) that may include email, text message, telemarketing, direct mail, or other means of individual communication (including other forms of electronic communications). I consent to The Source storing, processing and transferring my data (which may include my name, address, email address and mobile number) as required to provide me with marketing communications as described above. I understand that The Source will not sell or share my personal data with any additional third parties for the purpose of providing marketing communications. I understand that I can unsubscribe at any time. This consent to share information and receive marketing communications applies in addition to The Source <a rel="nofollow"  href=""http://www.thesource.ca/sitelets/privacyPolicy/default.asp"" target=""_blank"">Privacy Policy</a>.'];
		$arr17f=[0=>'Je souhaite recevoir les communications marketing de La Source et des entreprises connexes de Bell, incluant Bell Media, Bell Canada, Bell ExpressVu LP, Bell Mobilité et Virgin Mobile (pour faciliter les références, appelées collectivement « La Source ») qui peuvent inclure courriel, messages textes, télémarketing, publipostage, ou autres méthodes de communication individuelle (incluant d’autres formes de communications électroniques). J’autorise La Source à entreposer, traiter et transférer mes données (pouvant inclure mon nom, adresse, adresse courriel et numéro de téléphone mobile) requises pour m’informer des communications marketing décrites ci-dessus. Je comprends que La Source ne vendra pas, ou ne partagera pas mon information personnelle avec aucun autre organisme tiers dans un but de fournir des communications marketing. Je comprends que je peux annuler mon adhésion à tout moment. Ce consentement de partager l’information et recevoir  les communications marketing s’applique en complément de la politique de confidentialité de La Source.'];
		$arr18 = [
				0=>'Out of stock',
				1=>'Not sold in this store',
				2=>'Too expensive',
				3=>'Not the Brand I wanted',
				4=>'Product quality'
		];
		$arr18f = [
				0=>'Rupture de stock',
				1=>'Pas en vente dans ce magasin',
				2=>'Trop cher',
				3=>'Pas la marque recherchée',
				4=>'Qualité du produit'
		];

		switch($k)
		{
			case 'primary_reason_visit':			
					$key = array_search($v, $arr1); 
					if($key === false)
					{
						$key = array_search($v, $arr1f); 
					}
					if($key !== false)
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;
			case 'able_to_purchase':
					$key = array_search($v, $arr4); 
					if($key === false)
					{
						$key = array_search($v, $arr4f); 
					}
					if($key !== false)
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;				
			case 'overall_sat_0':
					$key = array_search($v, $arrA3); 
					if($key === false)
					{
						$key = array_search($v, $arrA3f); 
					}
					if($key !== false)
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'time':
					$key = array_search($v, $arr2);
					if($key === false)
					{
						$key = array_search($v, $arr2f); 
					}
					if($key !== false)				
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;					
			case 'willing_contacted':
					$key = array_search($v, $arr4);
					if($key === false)
					{
						$key = array_search($v, $arr4f); 
					}
					if($key !== false)							
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'likely_return_refer_0':
					$key = array_search($v, $arr5);
					if($key === false)
					{
						$key = array_search($v, $arr5f); 
					}
					if($key !== false)						
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'likely_return_refer_1':
					$key = array_search($v, $arr5);
					if($key === false)
					{
						$key = array_search($v, $arr5f); 
					}
					if($key !== false)				
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;					
			case 'store_experience_0':
					$key = array_search($v, $arr5);
					if($key === false)
					{
						$key = array_search($v, $arr5f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;
			case 'store_experience_1':
					$key = array_search($v, $arr5);
					if($key === false)
					{
						$key = array_search($v, $arr5f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'store_experience_2':
					$key = array_search($v, $arr5);
					if($key === false)
					{
						$key = array_search($v, $arr5f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;		
			case 'store_experience_3':
					$key = array_search($v, $arr5);
					if($key === false)
					{
						$key = array_search($v, $arr5f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;				
			case 'store_experience_4':
					$key = array_search($v, $arr5);
					if($key === false)
					{
						$key = array_search($v, $arr5f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;		
			case 'store_experience_5':
					$key = array_search($v, $arr5);
					if($key === false)
					{
						$key = array_search($v, $arr5f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'store_experience_6':
					$key = array_search($v, $arr5);
					if($key === false)
					{
						$key = array_search($v, $arr5f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;		
			case 'store_experience_7':
					$key = array_search($v, $arr5);
					if($key === false)
					{
						$key = array_search($v, $arr5f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;		
			case 'store_experience_8':
					$key = array_search($v, $arr5);
					if($key === false)
					{
						$key = array_search($v, $arr5f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'store_experience_9':
					$key = array_search($v, $arr5);
					if($key === false)
					{
						$key = array_search($v, $arr5f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'Associates_0':
					$key = array_search($v, $arr5);
					if($key === false)
					{
						$key = array_search($v, $arr5f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;		
			case 'Associates_1':
					$key = array_search($v, $arr5);
					if($key === false)
					{
						$key = array_search($v, $arr5f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;		
			case 'Associates_2':
					$key = array_search($v, $arr5);
					if($key === false)
					{
						$key = array_search($v, $arr5f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;		
			case 'Associates_3':
					$key = array_search($v, $arr5);
					if($key === false)
					{
						$key = array_search($v, $arr5f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'Associates_4':
					$key = array_search($v, $arr5);
					if($key === false)
					{
						$key = array_search($v, $arr5f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'suggest_products_to_meet_your_needs':
					$key = array_search($v, $arr4);
					if($key === false)
					{
						$key = array_search($v, $arr4f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;
			case 'suggest_products_complement_purchase':
					$key = array_search($v, $arr4);
					if($key === false)
					{
						$key = array_search($v, $arr4f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'mention_mobile_phones_or_tv_services':
					$key = array_search($v, $arr4);
					if($key === false)
					{
						$key = array_search($v, $arr4f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'satisfied_information_provided_0':
					$key = array_search($v, $arr3);
					if($key === false)
					{
						$key = array_search($v, $arr3f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'dissatisfied_with_information_0':
					if(isset($k))
					{
						$key = array_search($v, $arr7);
						if($key === false)
						{
							$key = array_search($v, $arr7f); 
						}
						if($key !== false)	
							DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
						if($key == 3)
						{
							DB::table('the_source_testing')->where('id', $id)->update(['dissatisfied_with_information_1' => $v]);
						}
					}
				break;		
			case 'satisfied_information_mobile_phone_0':
					$key = array_search($v, $arr3);
					if($key === false)
					{
						$key = array_search($v, $arr3f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;		
			case 'likely_refer_mobile_phones_0':
					$key = array_search($v, $arr5);
					if($key === false)
					{
						$key = array_search($v, $arr5f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;					
			case 'brand_perception_0':
					$key = array_search($v, $arr5);
					if($key === false)
					{
						$key = array_search($v, $arr5f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;				
			case 'brand_perception_1':
					$key = array_search($v, $arr5);
					if($key === false)
					{
						$key = array_search($v, $arr5f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;					
			case 'brand_perception_2':
					$key = array_search($v, $arr5);
					if($key === false)
					{
						$key = array_search($v, $arr5f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;				
			case 'brand_perception_3':
					$key = array_search($v, $arr5);
					if($key === false)
					{
						$key = array_search($v, $arr5f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;				
			case 'brand_perception_4':
					$key = array_search($v, $arr5);
					if($key === false)
					{
						$key = array_search($v, $arr5f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;
			case 'visited_website':
					$key = array_search($v, $arr4);
					if($key === false)
					{
						$key = array_search($v, $arr4f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;				
			case 'reason_for_visit_0':
					$key = array_search($v, $arr8);
					if($key === false)
					{
						$key = array_search($v, $arr8f); 
					}
					if($key !== false)	
					{
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
					}
					else
					{
						DB::table('the_source_testing')->where('id', $id)->update([$k => 8]);
						DB::table('the_source_testing')->where('id', $id)->update(['reason_for_visit_1' => $v]);
					}					
				break;				
			case 'number_of_electronic_purchases_past_year':
					$key = array_search($v, $arr9);
					if($key === false)
					{
						$key = array_search($v, $arr9f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;				
			case 'number_of_purchase_from_Source_past_year':
					$key = array_search($v, $arr10);
					if($key === false)
					{
						$key = array_search($v, $arr10f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;				
			case 'number_electronic_purchases_online_past':
					$key = array_search($v, $arr9);
					if($key === false)
					{
						$key = array_search($v, $arr9f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'number_purchases_thesourceca_past_year':
					$key = array_search($v, $arr9);
					if($key === false)
					{
						$key = array_search($v, $arr9f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'gender':
					$key = array_search($v, $arr12);
					if($key === false)
					{
						$key = array_search($v, $arr12f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'current_age':
					$key = array_search($v, $arr13);
					if($key === false)
					{
						$key = array_search($v, $arr13f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;		
			case 'income':
					$key = array_search($v, $arr14);
					if($key === false)
					{
						$key = array_search($v, $arr14f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;
			case 'children_under_18':
					$key = array_search($v, $arr4);
					if($key === false)
					{
						$key = array_search($v, $arr4f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;						
			case 'enter_contest':
					$key = array_search($v, $arr4);
					if($key === false)
					{
						$key = array_search($v, $arr4f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;
			case 'age':
					if(!empty($k))	
						DB::table('the_source_testing')->where('id', $id)->update([$k => 1]);
				break;				
			case 'rules':
					if(!empty($k))	
						DB::table('the_source_testing')->where('id', $id)->update([$k => 1]);
				break;	
			case 'options':
					$key = array_search($v, $arr17);
					if($key === false)
					{
						$key = array_search($v, $arr17f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'product_not_available_0':
					$key = array_search($v, $arr18);
					if($key === false)
					{
						$key = array_search($v, $arr18f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'product_not_available_1':
					$key = array_search($v, $arr18);
					if($key === false)
					{
						$key = array_search($v, $arr18f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'product_not_available_2':
					$key = array_search($v, $arr18);
					if($key === false)
					{
						$key = array_search($v, $arr18f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'product_not_available_3':
					$key = array_search($v, $arr18);
					if($key === false)
					{
						$key = array_search($v, $arr18f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'product_not_available_4':
					$key = array_search($v, $arr18);
					if($key === false)
					{
						$key = array_search($v, $arr18f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'product_not_available_5':
					$key = array_search($v, $arr18);
					if($key === false)
					{
						$key = array_search($v, $arr18f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'product_not_available_6':
					$key = array_search($v, $arr18);
					if($key === false)
					{
						$key = array_search($v, $arr18f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'product_not_available_7':
					$key = array_search($v, $arr18);
					if($key === false)
					{
						$key = array_search($v, $arr18f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;	
			case 'product_not_available_8':
					$key = array_search($v, $arr18);
					if($key === false)
					{
						$key = array_search($v, $arr18f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;		
			case 'product_not_available_9':
					$key = array_search($v, $arr18);
					if($key === false)
					{
						$key = array_search($v, $arr18f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;		
			case 'product_not_available_10':
					$key = array_search($v, $arr18);
					if($key === false)
					{
						$key = array_search($v, $arr18f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;		
			case 'product_not_available_11':
					$key = array_search($v, $arr18);
					if($key === false)
					{
						$key = array_search($v, $arr18f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;		
			case 'product_not_available_12':
					$key = array_search($v, $arr18);
					if($key === false)
					{
						$key = array_search($v, $arr18f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;		
			case 'product_not_available_13':
					$key = array_search($v, $arr18);
					if($key === false)
					{
						$key = array_search($v, $arr18f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;		
			case 'product_not_available_14':
					$key = array_search($v, $arr18);
					if($key === false)
					{
						$key = array_search($v, $arr18f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;		
			case 'product_not_available_15':
					$key = array_search($v, $arr18);
					if($key === false)
					{
						$key = array_search($v, $arr18f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;		
			case 'product_not_available_16':
					$key = array_search($v, $arr18);
					if($key === false)
					{
						$key = array_search($v, $arr18f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;		
			case 'product_not_available_17':
					$key = array_search($v, $arr18);
					if($key === false)
					{
						$key = array_search($v, $arr18f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;			
			case 'product_not_available_18':
					$key = array_search($v, $arr18);
					if($key === false)
					{
						$key = array_search($v, $arr18f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;						
			case 'product_not_available_19':
					$key = array_search($v, $arr18);
					if($key === false)
					{
						$key = array_search($v, $arr18f); 
					}
					if($key !== false)	
						DB::table('the_source_testing')->where('id', $id)->update([$k => $key]);
				break;																																																																																
		}

			

	}


	private function product_queries($data)
	{
		/*$qryf 	= DB::table('products')->select('product_fr')->get();
		$qry 	= DB::table('products')->select('product_en')->get();		

		foreach($qryf as $k=>$v)
		{
			$arrf[] = json_decode(json_encode($v), true);
		}

		foreach($qry as $k=>$v)
		{
			$arr[] = json_decode(json_encode($v), true);
		}
		*/

		//$array_f = array_column($arrf, 'product_fr');
		//$arr = array_column($arr, 'product_en');

		foreach ($data as $key => $value) 
		{
			$prod_array[$value->id] = explode('u\'', $value->product);
		}

		foreach ($prod_array as $key => $value) {
			foreach ($value as $k => $v) {		
				if($k != '[')
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
			 		$purpose_id[][$key] = DB::table('purpose_of_visit')->select('id')->where('purpose_en', 'LIKE', substr($v, 0, -3).'%')->orWhere('purpose_fr', 'LIKE', substr($v, 0, -3).'%')->first();
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
		   'satisfied_information_mobile_phone_0',
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
		    DB::raw('UPPER(REPLACE(personal_5, " ", "")'),
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
		   'language',
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
		   'product_22',
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
		   'satisfied_information_mobile_phone_0',
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
		   'purpose_of_visit_to_website_9',
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
		    DB::raw('UPPER(REPLACE(personal_5, " ", ""))'),
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
	        
	        $csv = fputcsv($f, $line, $delimiter);
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
           'language',
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
		   'product_22',
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
		   'satisfied_information_mobile_phone_0',
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
		   'purpose_of_visit_to_website_9',
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

	private function en_product_array()
	{
		$en = DB::table('products')->select('id', 'product_en')->get();
		return json_decode(json_encode($en),true);
	}




}
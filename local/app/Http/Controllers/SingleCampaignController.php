<?php

namespace Responsive\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use File;
use Image;
use URL;
use Mail;
use Carbon\Carbon;

class SingleCampaignController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 
	public function avigher_get_search()
	{
	   return view('search');
	} 
	 
	public function avigher_search_campaign(Request $request)
	{ 
	  $data = $request->all();
	 
	  $search_txt = $data['search_txt'];
	 
	
					   
		$count_campaign = DB::table('campaigns')
	                   ->where("camp_title", "LIKE","%$search_txt%")
					   ->where('camp_status', '!=', 0)
					   ->where('delete_status', '=' , '')
		               ->count();
					   
					   
		$siteid=1;
		$site_setting=DB::select('select * from settings where id = ?',[$siteid]);			   
	     $data = array( 'count_campaign' => $count_campaign, 'site_setting' => $site_setting, 'search_txt' => $search_txt);
		 return view('search')->with($data);
	 
	}
	 
	 
	 
	public function category_views()
	{
	    $siteid=1;
		$site_setting=DB::select('select * from settings where id = ?',[$siteid]);
		
		$category_count = DB::table('category')
		        ->where('status', '=' , 1)
				->where('delete_status', '=' , '')
				->count();
		
		$category = DB::table('category')
		        ->where('status', '=' , 1)
				->where('delete_status', '=' , '')
				->get();
		 $data = array('category_count' => $category_count, 'category' => $category);
		 return view('categories')->with($data);
		
		
	} 
	 
	 
	 
    public function avigher_all_campaigns()
	{
	
	
	   $siteid=1;
		$site_setting=DB::select('select * from settings where id = ?',[$siteid]);
	
	  $view_campaign = DB::table('campaigns')
		               ->where('camp_status', '!=', 0)
					   ->where('delete_status', '=' , '')
		               ->get();
					   
		$count_campaign = DB::table('campaigns')
		               ->where('camp_status', '!=', 0)
					   ->where('delete_status', '=' , '')
		               ->count();
	 $data = array('count_campaign' => $count_campaign, 'view_campaign' => $view_campaign, 'site_setting' => $site_setting);
	 return view('all-campaigns')->with($data);
	
	}
	
	
	
	public function avigher_single_category($id,$slug)
	{
	
	$category_count = DB::table('category')
		        ->where('id', '=' , $id)
				->count();
	
	$category = DB::table('category')
		        ->where('id', '=' , $id)
				->get();
				
	$view_campaign = DB::table('campaigns')
		        ->where('camp_category', '=' , $id)
				->where('camp_status', '!=' , 0)
				->where('delete_status', '=' , '')
				->get();
		$campaign_count = DB::table('campaigns')
		        ->where('camp_category', '=' , $id)
				->where('camp_status', '!=' , 0)
				->where('delete_status', '=' , '')
				->count();			
				
				
	$site_setting = DB::select('select * from settings where id = ?',[1]);			
	
	 $data = array('category_count' => $category_count, 'category' => $category, 'site_setting' => $site_setting, 'campaign_count' => $campaign_count, 'view_campaign' => $view_campaign);
	   return view('category')->with($data);
	
	}
	
	
	
	
	public function avigher_single_campaign($id,$slug)
	{
	
	    $campaign = DB::table('campaigns')
		        ->where('camp_id', '=' , $id)
				->get();
		$campaign_count = DB::table('campaigns')
		        ->where('camp_id', '=' , $id)
				->count();
				
		$category = DB::table('category')
		        ->where('id', '=' , $campaign[0]->camp_category)
				->get();
				
				
		$user_details = DB::table('users')
		        ->where('id', '=' , $campaign[0]->camp_user_id)
				->get();				
				
				
				
		$campid = $campaign[0]->camp_id;
			$check_count = DB::table('checkout')
					 ->where('camp_id', '=', $campid)
					 ->where('payment_status','=','completed')
					 ->count();
					 
			if(!empty($check_count))
			{
			    $checkr = DB::table('checkout')
					 ->where('camp_id', '=', $campid)
					 ->where('payment_status','=','completed')
					 ->get();
				$percent_value = 0;	 
				foreach($checkr as $value){  $percent_value += $value->amount; }
				$raised = $percent_value;
					 
			}
			else
			{
			   $raised = 0;
			}	
			
			$x = $raised;
			$total = $campaign[0]->camp_goal;
			$percentage = ($x*100)/$total;	 
			$percentage_value = round($percentage,2);		
				
				
			$check_count_five = DB::table('checkout')
					 ->where('camp_id', '=', $campid)
					 ->where('payment_status','=','completed')
					 ->orderBy('cid','desc')
					 ->take(5)
					 ->count();	
				
				
		$settings = DB::select('select * from settings where id = ?',[1]);			
	
	     $data = array('campaign_count' => $campaign_count, 'campaign' => $campaign, 'settings' => $settings, 'category' => $category, 'user_details' => $user_details, 'percentage_value' => $percentage_value, 'raised' => $raised, 'check_count' => $check_count, 'campid' => $campid, 'check_count_five' => $check_count_five);
	   return view('campaign')->with($data);
	}
	
	
	public function avigher_donatenow(Request $request)
	{
	   $data = $request->all();
	   $donate_amount = $data['donate_amount'];
	   $name = $data['name'];
	   $email = $data['email'];
	   $phone = $data['phone'];
	   $country = $data['country'];
	   $postcode = $data['postcode'];
	   if(!empty($data['write_comment'])){ $write_comment = $data['write_comment']; } else { $write_comment = ""; }
	   $payment_type = $data['payment_type'];
	   $camp_id = $data['camp_id'];
	   $donator_user_id = $data['donator_user_id'];
	   
	   $campaign_data = DB::table('campaigns')
	                  ->where('camp_id','=',$camp_id)
				      ->get();
					  
		$camp_user_id = $campaign_data[0]->camp_user_id;			  
	   
	   
	   $purchase_token = rand(1111111,9999999);
	   $token = csrf_token();
	   $payment_date =  date("Y-m-d");
	
	   $check_checkout = DB::table('checkout')
	                  ->where('token','=',$token)
					  ->where('payment_status','=','pending')
		              ->count();
					  
			$settings = DB::select('select * from settings where id = ?',[1]); 
			$commission_amt = $settings[0]->commission_amt;
		      $commission_mode = $settings[0]->commission_mode;
		
		
		
		if($settings[0]->min_amt_donation <= $donate_amount && $settings[0]->max_amt_donation >= $donate_amount)
	    {
		
		
					if($commission_mode=="percentage")
				   {
					   $commission_amount = ($commission_amt * $donate_amount) / 100;
				   }
				   if($commission_mode=="fixed")
				   {
					    if($donate_amount < $commission_amt)
						{
							$commission_amount = 0;
						}
						else
						{
							$commission_amount = $commission_amt;
						}
				   }
				   
				   
				   
					  $user_amount = $donate_amount - $commission_amount;
					  
	   
	    
	   
	   
			 if(empty($check_checkout))
			{
				DB::insert('insert into checkout (purchase_token,token,camp_id,	donator_user_id,amount,user_amount,payment_type,commission_amt,commission_mode,fullname,phone,email,country,postcode,write_comment,payment_date,payment_status,camp_user_id) values (?,?,?,? ,?,?,?,?, ?,?,?,? ,?,?, ?, ?, ?, ?)', [$purchase_token,$token,$camp_id,$donator_user_id,$donate_amount,$user_amount,$payment_type,$commission_amt,$commission_mode,$name,$phone,$email,$country,$postcode,$write_comment,$payment_date,'pending',$camp_user_id]);
			}
			else
			{
	   
	   
	        DB::update('update checkout set purchase_token="'.$purchase_token.'",
			camp_id="'.$camp_id.'",
			donator_user_id="'.$donator_user_id.'",
			amount="'.$donate_amount.'",
			user_amount="'.$user_amount.'",
			payment_type="'.$payment_type.'",
			commission_amt="'.$commission_amt.'",
			commission_mode="'.$commission_mode.'",
			fullname="'.$name.'",
			phone="'.$phone.'",
			email="'.$email.'",
			country="'.$country.'",
			postcode="'.$postcode.'",
			write_comment="'.$write_comment.'",
			payment_date="'.$payment_date.'",
			camp_user_id="'.$camp_user_id.'"
			where payment_status="pending" and token = ?', [$token]);
	   
	   
	   
	        }
			
			
			
			
			
			$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
	
	
	
	$phone_no = $phone;
	$amount =  $donate_amount;
	 $currency  = $setts[0]->site_currency;
	$paypal_url = $setts[0]->paypal_url;
	$paypal_id = $setts[0]->paypal_id;
	$order_no = $purchase_token;
	$campaign_name = $campaign_data[0]->camp_title;
	
	
	$ddata = array('name' => $name, 'email' => $email, 'phone_no' => $phone_no, 'amount' => $amount, 'currency' => $currency, 'paypal_url' => $paypal_url, 'paypal_id' => $paypal_id, 'order_no' => $order_no, 'payment_type' => $payment_type, 'campaign_name' => $campaign_name);
            return view('payment')->with($ddata);
	   
	   }
	   else
	   {
	   
	      $error_value =  "Invalid donation amount. Amount range between ".$settings[0]->min_amt_donation.' '.$settings[0]->site_currency.' - '.$settings[0]->max_amt_donation.' '.$settings[0]->site_currency;
				   
				   return back()->with('error', $error_value);
	   
	   
	   }
	   
	   
	   
	}
	
	
	
	
	public function avigher_donate_campaign($id,$slug)
	{
	
	    $campaign = DB::table('campaigns')
		        ->where('camp_id', '=' , $id)
				->get();
		$campaign_count = DB::table('campaigns')
		        ->where('camp_id', '=' , $id)
				->count();
				
				
				
				
		$campid = $campaign[0]->camp_id;
			$check_count = DB::table('checkout')
					 ->where('camp_id', '=', $campid)
					 ->where('payment_status','=','completed')
					 ->count();
					 
			if(!empty($check_count))
			{
			    $checkr = DB::table('checkout')
					 ->where('camp_id', '=', $campid)
					 ->where('payment_status','=','completed')
					 ->get();
				$percent_value = 0;	 
				foreach($checkr as $value){  $percent_value += $value->amount; }
				$raised = $percent_value;
					 
			}
			else
			{
			   $raised = 0;
			}	
			
			$x = $raised;
			$total = $campaign[0]->camp_goal;
			$percentage = ($x*100)/$total;	 
			$percentage_value = round($percentage,2);		
				
				
				
				
				
				
		$category = DB::table('category')
		        ->where('id', '=' , $campaign[0]->camp_category)
				->get();
				
				
		$user_details = DB::table('users')
		        ->where('id', '=' , $campaign[0]->camp_user_id)
				->get();				
				
				
		$settings = DB::select('select * from settings where id = ?',[1]);
		
		$countries = array(
	'Afghanistan',
	'Albania',
	'Algeria',
	'American Samoa',
	'Andorra',
	'Angola',
	'Anguilla',
	'Antarctica',
	'Antigua and Barbuda',
	'Argentina',
	'Armenia',
	'Aruba',
	'Australia',
	'Austria',
	'Azerbaijan',
	'Bahamas',
	'Bahrain',
	'Bangladesh',
	'Barbados',
	'Belarus',
	'Belgium',
	'Belize',
	'Benin',
	'Bermuda',
	'Bhutan',
	'Bolivia',
	'Bosnia and Herzegowina',
	'Botswana',
	'Bouvet Island',
	'Brazil',
	'British Indian Ocean Territory',
	'Brunei Darussalam',
	'Bulgaria',
	'Burkina Faso',
	'Burundi',
	'Cambodia',
	'Cameroon',
	'Canada',
	'Cape Verde',
	'Cayman Islands',
	'Central African Republic',
	'Chad',
	'Chile',
	'China',
	'Christmas Island',
	'Cocos (Keeling) Islands',
	'Colombia',
	'Comoros',
	'Congo',
	'Congo, the Democratic Republic of the',
	'Cook Islands',
	'Costa Rica',
	'Cote d\'Ivoire',
	'Croatia (Hrvatska)',
	'Cuba',
	'Cyprus',
	'Czech Republic',
	'Denmark',
	'Djibouti',
	'Dominica',
	'Dominican Republic',
	'East Timor',
	'Ecuador',
	'Egypt',
	'El Salvador',
	'Equatorial Guinea',
	'Eritrea',
	'Estonia',
	'Ethiopia',
	'Falkland Islands (Malvinas)',
	'Faroe Islands',
	'Fiji',
	'Finland',
	'France',
	'France Metropolitan',
	'French Guiana',
	'French Polynesia',
	'French Southern Territories',
	'Gabon',
	'Gambia',
	'Georgia',
	'Germany',
	'Ghana',
	'Gibraltar',
	'Greece',
	'Greenland',
	'Grenada',
	'Guadeloupe',
	'Guam',
	'Guatemala',
	'Guinea',
	'Guinea-Bissau',
	'Guyana',
	'Haiti',
	'Heard and Mc Donald Islands',
	'Holy See (Vatican City State)',
	'Honduras',
	'Hong Kong',
	'Hungary',
	'Iceland',
	'India',
	'Indonesia',
	'Iran (Islamic Republic of)',
	'Iraq',
	'Ireland',
	'Israel',
	'Italy',
	'Jamaica',
	'Japan',
	'Jordan',
	'Kazakhstan',
	'Kenya',
	'Kiribati',
	'Korea, Democratic People\'s Republic of',
	'Korea, Republic of',
	'Kuwait',
	'Kyrgyzstan',
	'Lao, People\'s Democratic Republic',
	'Latvia',
	'Lebanon',
	'Lesotho',
	'Liberia',
	'Libyan Arab Jamahiriya',
	'Liechtenstein',
	'Lithuania',
	'Luxembourg',
	'Macau',
	'Macedonia, The Former Yugoslav Republic of',
	'Madagascar',
	'Malawi',
	'Malaysia',
	'Maldives',
	'Mali',
	'Malta',
	'Marshall Islands',
	'Martinique',
	'Mauritania',
	'Mauritius',
	'Mayotte',
	'Mexico',
	'Micronesia, Federated States of',
	'Moldova, Republic of',
	'Monaco',
	'Mongolia',
	'Montserrat',
	'Morocco',
	'Mozambique',
	'Myanmar',
	'Namibia',
	'Nauru',
	'Nepal',
	'Netherlands',
	'Netherlands Antilles',
	'New Caledonia',
	'New Zealand',
	'Nicaragua',
	'Niger',
	'Nigeria',
	'Niue',
	'Norfolk Island',
	'Northern Mariana Islands',
	'Norway',
	'Oman',
	'Pakistan',
	'Palau',
	'Panama',
	'Papua New Guinea',
	'Paraguay',
	'Peru',
	'Philippines',
	'Pitcairn',
	'Poland',
	'Portugal',
	'Puerto Rico',
	'Qatar',
	'Reunion',
	'Romania',
	'Russian Federation',
	'Rwanda',
	'Saint Kitts and Nevis',
	'Saint Lucia',
	'Saint Vincent and the Grenadines',
	'Samoa',
	'San Marino',
	'Sao Tome and Principe',
	'Saudi Arabia',
	'Senegal',
	'Seychelles',
	'Sierra Leone',
	'Singapore',
	'Slovakia (Slovak Republic)',
	'Slovenia',
	'Solomon Islands',
	'Somalia',
	'South Africa',
	'South Georgia and the South Sandwich Islands',
	'Spain',
	'Sri Lanka',
	'St. Helena',
	'St. Pierre and Miquelon',
	'Sudan',
	'Suriname',
	'Svalbard and Jan Mayen Islands',
	'Swaziland',
	'Sweden',
	'Switzerland',
	'Syrian Arab Republic',
	'Taiwan, Province of China',
	'Tajikistan',
	'Tanzania, United Republic of',
	'Thailand',
	'Togo',
	'Tokelau',
	'Tonga',
	'Trinidad and Tobago',
	'Tunisia',
	'Turkey',
	'Turkmenistan',
	'Turks and Caicos Islands',
	'Tuvalu',
	'Uganda',
	'Ukraine',
	'United Arab Emirates',
	'United Kingdom',
	'United States',
	'United States Minor Outlying Islands',
	'Uruguay',
	'Uzbekistan',
	'Vanuatu',
	'Venezuela',
	'Vietnam',
	'Virgin Islands (British)',
	'Virgin Islands (U.S.)',
	'Wallis and Futuna Islands',
	'Western Sahara',
	'Yemen',
	'Yugoslavia',
	'Zambia',
	'Zimbabwe'
);
				
				
				
			if(Auth::check())
			{
			    
			   $edit_user = DB::table('users')
							->where('id', '=' , Auth::user()->id)
							->get();
				$full_name = $edit_user[0]->name;
				$email_details = $edit_user[0]->email;
				$phones = $edit_user[0]->phone;	
				$countrry = $edit_user[0]->country;	
				$user_id = $edit_user[0]->id;	
			}
			else
			{
			    $full_name = "";
				$email_details = "";
				$phones = "";	
				$countrry = "";	
				$user_id = 0;	
			}	
				
				
				
				
				
					
	
	     $data = array('campaign_count' => $campaign_count, 'campaign' => $campaign, 'settings' => $settings, 'category' => $category, 'user_details' => $user_details, 'countries' => $countries, 'id' => $id, 'percentage_value' => $percentage_value, 'raised' => $raised, 'full_name' => $full_name, 'email_details' => $email_details, 'phones' => $phones, 'countrry' => $countrry, 'user_id' => $user_id);
	   return view('donate')->with($data);
	}
	
	
	
	
	
	 
	
	
}

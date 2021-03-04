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

class CampaignController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 
	public function avigher_withdrawal_settings()
	{
	
	   $idd = Auth::user()->id;
	   $edit_users = DB::table('users')
		        ->where('id', '=' , $idd)
				
				->get();
				
		$data = array('edit_users' => $edit_users);
		return view('withdrawal-settings')->with($data);		
	   
	} 
	
	
	
	public function avigher_withdrawal_savedata(Request $request)
	{
	
	
	     $userid = Auth::user()->id;
		 
		 $data = $request->all();
		 
		 $payment_type = $data['payment_type'];
		 if(!empty($data['paypal_id'])){ $paypal_id = $data['paypal_id']; } else { $paypal_id = ""; }
		 if(!empty($data['stripe_id'])){ $stripe_id = $data['stripe_id']; } else { $stripe_id = ""; }
		 
		 
		 DB::update('update users set withdraw_payment_type="'.$payment_type.'",withdraw_paypal_id="'.$paypal_id.'",withdraw_stripe_id="'.$stripe_id.'" where id = ?', [$userid]);
		 
		 return back()->with('success', 'Withdraw settings has been updated');
		 
		 
	
	 }
	 
	 
	 
	 
    public function index()
    {
       
	   
	   $category_count = DB::table('category')
		        ->where('status', '=' , 1)
				->orderBy('cat_name','asc')
		        
				->count();
	   
	   
		$category = DB::table('category')
		        ->where('status', '=' , 1)
				->orderBy('cat_name','asc')
		        
				->get();
				
				
		$setting = DB::table('settings')
		        ->where('id', '=' , 1)
				->get();		
				
				
		$data = array('category_count' => $category_count, 'category' => $category, 'setting' => $setting);
		return view('create-campaign')->with($data);
    }
	
	
	
	public function avigher_technologies_withdrawals()
	{
	   return view('withdrawals');
	}
	
	
	public function avigher_withdraw_campaign($status,$idd,$withdraw,$user_amt)
	{
	    $userid = Auth::user()->id;
	
	   
		$edit_users = DB::table('users')
		->where('id', '=', $userid)
		->get();
		
		
		if(empty($edit_users[0]->withdraw_payment_type))
		{
		
		    $error_msg = 'Please update your paypal id or stripe id on the withdrawal settings page';
			return back()->with('error', $error_msg);
		
		}
		
		else
		{
	
	      $setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
		
		   $id = base64_decode($idd);
		   
		   $amount = base64_decode($user_amt);
		   $widate = date("Y-m-d");
		   $with_payment_type = $edit_users[0]->withdraw_payment_type;
		   
		   if($edit_users[0]->withdraw_payment_type=="paypal")
		   {
		   $with_payment_id = $edit_users[0]->withdraw_paypal_id; 
		   }
		   else if($edit_users[0]->withdraw_payment_type=="stripe")
		   {
		   $with_payment_id = $edit_users[0]->withdraw_stripe_id; 
		   }
		   
		   
		   
				DB::update('update campaigns set camp_finish="2" where camp_id="'.$id.'"');
				DB::update('update checkout set withdraw="pending" where camp_id="'.$id.'"');
				
				
				DB::insert('insert into withdrawal (user_id,camp_id,amount,withdraw_date,withdraw_payment_type,withdraw_payment_id,withdraw_status) values (?,?,?,?,?,?,?)', [$userid,$id,$amount,$widate,$with_payment_type,$with_payment_id,'pending']);
				
				
				$campaign = DB::table('campaigns')
					->where('camp_id', '=' , $id)
					->get(); 
			
			$camp_name = $campaign[0]->camp_title;
			$camp_slug = $campaign[0]->camp_slug;
			
			$user_details = DB::table('users')
						   ->where('id', '=', $campaign[0]->camp_user_id)
						   ->get();
			$name = $user_details[0]->name;			   
			$email = $user_details[0]->email;
			$phone = $user_details[0]->phone;			   
			
			
			
			$currency = $setts[0]->site_currency;
			
			$url = URL::to("/");
			
			$site_logo=$url.'/local/images/media/'.$setts[0]->site_logo;
			
			$site_name = $setts[0]->site_name;
			
			
			$aid=1;
			$admindetails = DB::table('users')
			 ->where('id', '=', $aid)
			 ->first();
			
			$admin_email = $admindetails->email;
			
			
			
			$datas = [
				'site_logo' => $site_logo, 'site_name' => $site_name, 'camp_name' => $camp_name,  'email' => $email, 'phone' => $phone, 'amount' => $amount, 'url' => $url, 'camp_slug' => $camp_slug, 'id' => $id,  'currency' => $currency, 'name' => $name
			];
			
			
			Mail::send('withdraw_adminmail', $datas , function ($message) use ($admin_email,$email)
			{
				$message->subject('Withdraw Request');
				
				$message->from($admin_email, 'Admin');
	
				$message->to($admin_email);
	
			}); 
			
		
			$submit_msg = 'Campaign withdraw request has been sent successfully';
			return back()->with('success', $submit_msg);
		} 
	
	
	}
	
	
	
	public function avigher_technologies_donations()
	{
	
	
	  $userid = Auth::user()->id;
	   
	   
	   $checkout_count = DB::table('checkout')
		        	
				->where('camp_user_id','=', $userid)
				->orderBy('cid','desc')
		        
				->count();
				
		$checkout = DB::table('checkout')
		        	
				->where('camp_user_id','=', $userid)
				->orderBy('cid','desc')
		        
				->get();
				
	$settings = DB::select('select * from settings where id = ?',[1]);					
				
	  $data = array('checkout_count' => $checkout_count, 'checkout' => $checkout, 'settings' => $settings);
	   return view('donations')->with($data);
	
	
	
	}
	
	
	
	
	public function avigher_delete_campaign($status,$idd,$raised)
	{
	
	   $id = base64_decode($idd);
	   
	   $raised_amt = base64_decode($raised);
	   
	   
	   if(empty($raised_amt))
	   {
	   
	   
	   
	   $campaigns_check = DB::table('campaigns')
		        ->where('delete_status', '=' , '')
				
				->where('camp_status','!=', 2)
				->where('camp_finish','=', 0)
				->where('camp_id','=', $id)
				->count();
				
				
		  if(!empty($campaigns_check))
		  {
			DB::update('update campaigns set delete_status="deleted" where camp_id="'.$id.'"');
			$submit_msg = 'Campaign has been deleted.';
			return back()->with('success', $submit_msg);
		  }	
		  else
		  {
		   return redirect('/campaigns');
		   
		  }
	  }
	  else
	  {
	  
	     return redirect('/campaigns');
	  }	
				
	  
	
	}
	
	
	
	
	
	public function avigher_view_campaign()
	{
	   $userid = Auth::user()->id;
	   
	   
	   $campaigns_count = DB::table('campaigns')
		        ->where('delete_status', '=' , '')
				
				->where('camp_user_id','=', $userid)
				->orderBy('camp_id','desc')
		        
				->count();
				
		$campaigns = DB::table('campaigns')
		        ->where('delete_status', '=' , '')
				
				->where('camp_user_id','=', $userid)
				->orderBy('camp_id','desc')
		        
				->get();
				
	$settings = DB::select('select * from settings where id = ?',[1]);					
				
	  $data = array('campaigns_count' => $campaigns_count, 'campaigns' => $campaigns, 'settings' => $settings);
	   return view('campaigns')->with($data);
	}
	
	
	
	public function avigher_edit_campaign($idd)
	{
	    $userid = Auth::user()->id;
		$id = base64_decode($idd);
		
	    $campaigns = DB::table('campaigns')
		        ->where('camp_id', '=' , $id)
				
				->where('camp_user_id','=', $userid)
				->get();
		$campaigns_count = DB::table('campaigns')
		        ->where('camp_id', '=' , $id)
				
				->where('camp_user_id','=', $userid)
				->count();
				
		$category_count = DB::table('category')
		        ->where('status', '=' , 1)
				->orderBy('cat_name','asc')
		        
				->count();
	   
	   
		$category = DB::table('category')
		        ->where('status', '=' , 1)
				->orderBy('cat_name','asc')
		        
				->get();		
						
		$settings = DB::select('select * from settings where id = ?',[1]);	
		$data = array('campaigns_count' => $campaigns_count, 'campaigns' => $campaigns, 'settings' => $settings, 'category_count' => $category_count, 'category' => $category);
	     return view('edit-campaign')->with($data);	
	
	}
	
	
	public function avigher_editdata(Request $request)
	{
	
	
	     $userid = Auth::user()->id;
		
		
		 $this->validate($request, [

        		'camp_title' => 'required',

        		'camp_desc' => 'required'

        		
				
				

        	]);
         
		 $data = $request->all();
			
         
		
		$settings = DB::select('select * from settings where id = ?',[1]);
	   
	   $imgsize = $settings[0]->image_size;
	   $imgtype = $settings[0]->image_type;
	   
	   
		$rules = array(
        
       
		
        'camp_title'=>'required:campaigns,camp_title',
		'camp_desc' => 'required:campaigns,camp_desc',
		'camp_image' => 'max:'.$imgsize.'|mimes:'.$imgtype
		
        );
		
		
		
		
		
		
		
		$messages = array(
            
            
			
        );
		
		
		
		
		
		 $validator = Validator::make(Input::all(), $rules, $messages);

		

		if ($validator->fails())
		{
			 $failedRules = $validator->failed();
			 
			return back()->withErrors($validator);
		}
		else
		{ 
		  
        
		     
		
		
		
		
					if(!empty($data['camp_title']))
					{
					   $camp_title=$data['camp_title'];
					}
					else
					{
					  $camp_title = "";
					}
					
					
					
					if(!empty($data['camp_category']))
					{
					   $camp_category=$data['camp_category'];
					}
					else
					{
					  $camp_category = "";
					}
					
					
					
					
					if(!empty($data['camp_goal']))
					{
					   $camp_goal=$data['camp_goal'];
					}
					else
					{
					  $camp_goal = "";
					}
		
					
					if(!empty($data['camp_location']))
					{
					   $camp_location=$data['camp_location'];
					}
					else
					{
					  $camp_location = "";
					}
					
					
					
					
					if(!empty($data['camp_desc']))
					{
					   $camp_desc=htmlentities($data['camp_desc']);
					}
					else
					{
					  $camp_desc = "";
					}
					
					
					if(!empty($data['camp_finish']))
					{
					  $camp_finish = $data['camp_finish'];
					}
					else
					{
					  $camp_finish = 0;
					}
					
					$edit_id = $data['edit_id'];
					
		
		       if($settings[0]->min_amt_campaign <= $camp_goal && $settings[0]->max_amt_campaign >= $camp_goal)
	         {
		
						$image = Input::file('camp_image');
						if($image!="")
						{	
							$userphoto="/media/";
							
							$filename  = time() . '.' . $image->getClientOriginalExtension();
							
							$path = base_path('images'.$userphoto);
							Input::file('camp_image')->move($path, $filename);
					  
								
								$savefname=$filename;
						}
						else
						{
							$savefname=$data['save_photo'];
						}			
						
						
						$status = 1;
						$camp_date = date("Y-m-d");
						
						
						if($settings[0]->site_approve_campaigns==1)
					   {
						 
						 $status_approval = 1;
						 $submit_msg = 'Campaign has been updated.';
					   }
					   else
					   {
						 $status_approval = 0;
						 $submit_msg = 'Campaign has been updated. Once campaign has been approved. You will received the confirmation.';
					   }
		
		
		
		      DB::update('update campaigns set camp_title="'.$camp_title.'",camp_slug="'.$this->clean($camp_title).'",camp_category="'.$camp_category.'",camp_goal="'.$camp_goal.'",camp_location="'.$camp_location.'",camp_image="'.$savefname.'",camp_desc="'.$camp_desc.'",camp_date="'.$camp_date.'",camp_status="'.$status_approval.'",camp_finish="'.$camp_finish.'" where camp_id = ?', [$edit_id]);
		
		
						
						if($camp_finish==1)
						{
						  
						   DB::update('update campaigns set camp_status="2" where camp_id= ?', [$edit_id]);
						    return redirect('/campaigns');
						}
						else
						{
						return back()->with('success', $submit_msg);
						}
			
			
			    }
				
				
				else
				{
				   $error_value =  "Invalid campaign goal amount. Amount range between ".$settings[0]->min_amt_campaign.' '.$settings[0]->site_currency.' - '.$settings[0]->max_amt_campaign.' '.$settings[0]->site_currency;
				   
				   return back()->with('error', $error_value);
				
				}
				
			
			
			
        }
		
		
		
		
    }
	
	
	
	
	
	
	
	
	
	public function clean($string) 
	{
    
     $string = preg_replace("/[^\p{L}\/_|+ -]/ui","",$string);

    
    $string = preg_replace("/[\/_|+ -]+/", '-', $string);

    
    $string =  trim($string,'-');

    return mb_strtolower($string);
	}  
	
	
	 protected function avigher_savedata(Request $request)
    {
       
		$userid = Auth::user()->id;
		
		
		 $this->validate($request, [

        		'camp_title' => 'required',

        		'camp_desc' => 'required'

        		
				
				

        	]);
         
		 $data = $request->all();
			
         
		
		$settings = DB::select('select * from settings where id = ?',[1]);
	   
	   $imgsize = $settings[0]->image_size;
	   $imgtype = $settings[0]->image_type;
	   
	   
		$rules = array(
        
       
		
        'camp_title'=>'required:campaigns,camp_title',
		'camp_desc' => 'required:campaigns,camp_desc',
		'camp_image' => 'max:'.$imgsize.'|mimes:'.$imgtype
		
        );
		
		
		
		
		
		
		
		$messages = array(
            
            
			
        );
		
		
		
		
		
		 $validator = Validator::make(Input::all(), $rules, $messages);

		

		if ($validator->fails())
		{
			 $failedRules = $validator->failed();
			 
			return back()->withErrors($validator);
		}
		else
		{ 
		  
        
		     
		
		
		
		
					if(!empty($data['camp_title']))
					{
					   $camp_title=$data['camp_title'];
					}
					else
					{
					  $camp_title = "";
					}
					
					
					
					if(!empty($data['camp_category']))
					{
					   $camp_category=$data['camp_category'];
					}
					else
					{
					  $camp_category = "";
					}
					
					
					
					
					if(!empty($data['camp_goal']))
					{
					   $camp_goal=$data['camp_goal'];
					}
					else
					{
					  $camp_goal = "";
					}
		
					
					if(!empty($data['camp_location']))
					{
					   $camp_location=$data['camp_location'];
					}
					else
					{
					  $camp_location = "";
					}
					
					
					
					
					if(!empty($data['camp_desc']))
					{
					   $camp_desc=htmlentities($data['camp_desc']);
					}
					else
					{
					  $camp_desc = "";
					}
					
		
		       if($settings[0]->min_amt_campaign <= $camp_goal && $settings[0]->max_amt_campaign >= $camp_goal)
	         {
		
						$image = Input::file('camp_image');
						if($image!="")
						{	
							$userphoto="/media/";
							
							$filename  = time() . '.' . $image->getClientOriginalExtension();
							
							$path = base_path('images'.$userphoto);
							Input::file('camp_image')->move($path, $filename);
					  
								
								$savefname=$filename;
						}
						else
						{
							$savefname="";
						}			
						
						
						$status = 1;
						$camp_date = date("Y-m-d");
						
						
						if($settings[0]->site_approve_campaigns==1)
					   {
						 
						 $status_approval = 1;
						 $submit_msg = 'Campaign has been created.';
					   }
					   else
					   {
						 $status_approval = 0;
						 $submit_msg = 'Campaign has been created. Once campaign has been approved. You will received the confirmation.';
					   }
		
		
						DB::insert('insert into campaigns (camp_user_id,camp_title,camp_slug,camp_category,camp_goal,camp_location,camp_image,camp_desc,camp_date,camp_status) values (?,?,?,?, ?,?,?,?, ?,?)', [$userid,$camp_title,$this->clean($camp_title),$camp_category,$camp_goal,$camp_location,$savefname,$camp_desc,$camp_date,$status_approval]);
						
						
						
						
							return back()->with('success', $submit_msg);
			
			
			    }
				
				
				else
				{
				   $error_value =  "Invalid campaign goal amount. Amount range between ".$settings[0]->min_amt_campaign.' '.$settings[0]->site_currency.' - '.$settings[0]->max_amt_campaign.' '.$settings[0]->site_currency;
				   
				   return back()->with('error', $error_value);
				
				}
				
			
			
			
        }
		
		
		
		
    }
	
	
}

<?php

namespace Responsive\Http\Controllers\Admin;



use File;
use Image;
use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;
use Mail;
use URL;
use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class WithdrawalController extends Controller
{
    
    public function avigher_technologies_withdrawal()
    {
		
		$set_id=1;
		$settings = DB::table('settings')->where('id', $set_id)->get();
		
		
        
				   
				   
		$withdrawal_count = DB::table('withdrawal')
		                        ->count(); 
				 
		
				   
		
		$data=array('withdrawal_count' => $withdrawal_count, 'settings' => $settings);

        return view('admin.withdrawals')->with($data);
    }
	
	
	
	public function avigher_withdrawal_approval($wid,$camp_id)
	{
	    $set_id=1;
		$setts = DB::table('settings')->where('id', $set_id)->get();
		
		$withdraw_check = DB::table('withdrawal')
						->where('wid', '=' , $wid)
						->where('withdraw_status','=','pending')
						->count(); 
		if(!empty($withdraw_check))
		{
		  
		     DB::update('update withdrawal set withdraw_status="completed" where wid="'.$wid.'"');
		  
		     DB::update('update campaigns set camp_finish="3" where camp_id="'.$camp_id.'"');
				DB::update('update checkout set withdraw="completed" where camp_id="'.$camp_id.'"');
		
		
		$withdrawget = DB::table('withdrawal')
					->where('wid', '=' , $wid)
					->where('withdraw_status','=','completed')
					->get(); 
		
		$amount = $withdrawget[0]->amount;
		
		$payment_type = $withdrawget[0]->withdraw_payment_type;
		
		$payment_id = $withdrawget[0]->withdraw_payment_id;
		
		$campaign = DB::table('campaigns')
					->where('camp_id', '=' , $camp_id)
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
			
			$id = $camp_id;
			
			$datas = [
				'site_logo' => $site_logo, 'site_name' => $site_name, 'camp_name' => $camp_name,  'email' => $email, 'phone' => $phone, 'amount' => $amount, 'url' => $url, 'camp_slug' => $camp_slug,  'currency' => $currency, 'name' => $name, 'payment_type' => $payment_type, 'payment_id' => $payment_id, 'id' => $id
			]; 
			
			
			Mail::send('admin.withdraw_email', $datas , function ($message) use ($admin_email,$email)
			{
				$message->subject('Withdrawal Approved');
				
				$message->from($admin_email, 'Admin');
	
				$message->to($admin_email);
	
			}); 
			
			
			
			Mail::send('admin.withdraw_email', $datas , function ($message) use ($admin_email,$email)
			{
				$message->subject('Withdrawal Approved');
				
				$message->from($admin_email, 'Admin');
	
				$message->to($email);
	
			}); 
			
			return back();
			
			
			
			
			}
			else
			{
			
			return back();
			 
		 }
		
		
	
	}
	
	
	
	
	public function update_pending_withdraw($id) 
	{
	
	
	DB::update('update withdraw set withdraw_status="completed" where wid = ?', [$id]);
	  
	  
	   $viewdraw = DB::table('withdraw')
	             ->where('wid','=',$id)
				 ->get();
				 
		$viewshop = DB::table('shop')
	             ->where('shop_id','=',$viewdraw[0]->shop_id)
				 ->get();
		
		$viewusers = DB::table('users')
	             ->where('id','=',$viewdraw[0]->user_id)
				 ->get();
				 
		$seller_email = $viewusers[0]->email;
		$username = $viewusers[0]->name;
		
		
		$withdraw_amount = $viewdraw[0]->withdraw_amount;
	   $withdraw_payment_type = $viewdraw[0]->withdraw_payment_type; 
	   $paypal_id = $viewdraw[0]->paypal_id; 
	   $stripe_id = $viewdraw[0]->stripe_id;
	   $bank_account_no = $viewdraw[0]->bank_account_no;
	   $bank_info = $viewdraw[0]->bank_info;
	   $bank_ifsc = $viewdraw[0]->bank_ifsc;
	   
	  $setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
		$url = URL::to("/");
		
		$site_logo=$url.'/local/images/media/'.$setts[0]->site_logo;
		
		$site_name = $setts[0]->site_name;
		
		$currency = $setts[0]->site_currency;
		
	   
	   $shop_name = $viewshop[0]->name;
	   
	   $aid=1;
		$admindetails = DB::table('users')
		 ->where('id', '=', $aid)
		 ->get();
		
		$admin_email = $admindetails[0]->email;
		
		
		$datas = [
            'withdraw_amount' => $withdraw_amount, 'withdraw_payment_type' => $withdraw_payment_type, 'paypal_id' => $paypal_id, 'stripe_id' => $stripe_id,
			'bank_account_no' => $bank_account_no, 'bank_info' => $bank_info, 'bank_ifsc' => $bank_ifsc, 'shop_name' => $shop_name, 'currency' => $currency, 'site_logo' => $site_logo, 'site_name' => $site_name
        ];
		
		
		
		
		Mail::send('admin.withdraw_email', $datas , function ($message) use ($admin_email,$seller_email,$username)
        {
            $message->subject('Withdrawal Request Approved');
			
            $message->from($admin_email, 'Admin');

            $message->to($seller_email);

        }); 
		
		
		
	  
      
	   
      
	  return redirect()->back()->with('message', 'Updated Successfully');
      
	
	
	
	}
	
	
	
	
	
	
	
	public function completed_withdraw()
    {
		
		$set_id=1;
		$setting = DB::table('settings')->where('id', $set_id)->get();
		
		
        $pending_withdraw = DB::table('withdraw')
		           ->where('withdraw_status','=','pending')
				   ->get();
				   
				   
				 
		
		
		
		$complete_withdraw_cnt = DB::table('withdraw')
		                 ->where('withdraw_status', '=', 'completed')
				         ->count(); 
				 
		$complete_withdraw = DB::table('withdraw')
		                 ->where('withdraw_status', '=', 'completed')
				         ->get(); 		 		  
				   
				   
		
		$data=array('complete_withdraw_cnt' => $complete_withdraw_cnt, 'complete_withdraw'=> $complete_withdraw, 'setting' => $setting);

        return view('admin.completed_withdraw')->with($data);
    }
	
	
	
	
	
	
	
	
}
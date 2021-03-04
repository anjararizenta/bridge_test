<?php

namespace Responsive\Http\Controllers\Admin;



use File;
use Image;
use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $shop = DB::table('shop')
		         ->orderBy('shop_id','desc')
				 ->get();

        return view('admin.shop', ['shop' => $shop]);
    }
	
	
	 public function status($status,$id,$sid) {
	 
	 DB::update('update shop set status="'.$sid.'" where shop_id = ?',[$id]);
	 return back();
	 }
	
	
	
	protected function delete_all(Request $request)
    {
		
		
	   $data = $request->all();
	   $nid = $data['nid'];
	   
	   foreach($nid as $pid)
	   {
	   
	   
	  
	
	  
	  
	  $editshop = DB::table('shop')
		         ->where('shop_id','=',$pid)
				 ->get();
				 
	     $shopro="/media/";
			$delpaths = base_path('images'.$shopro.$editshop[0]->cover_photo);
			File::delete($delpaths);
			
			$shopro_new="/media/";
			$delpaths_new = base_path('images'.$shopro_new.$editshop[0]->profile_photo);
			File::delete($delpaths_new);	
			
			$galleries =  DB::table('shop_gallery')
		         ->where('user_id','=',$editshop[0]->user_id)
				 ->where('token','=',$editshop[0]->token)
				 ->get();
				 
			foreach($galleries as $gallery)
			{
			   $shoprod="/media/";
			$delpath = base_path('images'.$shoprod.$gallery->photo);
			File::delete($delpath);
			
			DB::delete('delete from shop_gallery where id = ?',[$gallery->id]);
			}	 		 
		
	 DB::delete('delete from shop_services where user_id = ?',[$editshop[0]->user_id]);
	  
      DB::delete('delete from shop where shop_id = ?',[$pid]);
	   
	  
	  
	  
	  
	  
	   
	   
          
	   
      	   
	   
	   }
	   return back();
	   
	 }
	 
	 
	 
	 
	 
	 public function edit_shop($id)
	 {
	 
	    $editshop = DB::table('shop')
		         ->where('shop_id','=',$id)
				 ->get();
				 
        $userdata = DB::table('users')
		         		->where('id','=',$editshop[0]->user_id)
				 		->get();
						
		if($editshop[0]->open_time > 12)
					{
						$start=$editshop[0]->open_time - 12;
						$stime=$start."PM";
					}
					else
					{
						$stime=$editshop[0]->open_time."AM";
					}
					if($editshop[0]->close_time>12)
					{
						$end=$editshop[0]->close_time-12;
						$etime=$end."PM";
					}
					else
					{
						$etime=$editshop[0]->close_time."AM";
					}
	    $sid=$editshop[0]->working_days;
						$selected=explode(",",$sid);
						$level=count($selected);
						
		$viewgallery = DB::table('shop_gallery')
		->where('user_id', '=', $editshop[0]->user_id)
		->where('token', '=', $editshop[0]->token)
		->orderBy('id','desc')
		->get();	
		
		 $siteid=1;
		$site_setting=DB::select('select * from settings where id = ?',[$siteid]);			
	  				
        return view('admin.edit-shop', ['editshop' => $editshop, 'userdata' => $userdata, 'stime' => $stime, 'etime' => $etime, 'selected' => $selected, 'level' => $level,  'viewgallery' => $viewgallery, 'site_setting' => $site_setting]);
	 
	 }
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 protected function savedata(Request $request)
    {
        
		
		
		 $data = $request->all();
		
		$editid=$data['editid'];
		
		
         
		 
		
			
		$shop_name=$data['shop_name'];
		$shop_address=$data['address'];
		
		$shop_city=$data['city'];
		$shop_pin_code=$data['pin_code'];
		
		
		$shop_country=$data['country'];
		$shop_state=$data['state'];
		
		$shop_phone_no=$data['shop_phone_no'];
		$shop_desc=$data['description'];
		
		
		$status=$data['status'];
		$featured=$data['featured'];
		$email_status=$data['email_status'];
		
		
		$site_logo=$data['site_logo'];
		
		$site_name=$data['site_name'];
		
		
		 
		$admin_email_status=1;
		
		
		
		/*$adminmeail = Auth::user()->email;*/
    	 
		
		
		if($editid!="")
		{
			
			
			DB::update('update shop set name="'.$shop_name.'",address="'.$shop_address.'",city="'.$shop_city.'",pin_code="'.$shop_pin_code.'",country="'.$shop_country.'",
			state="'.$shop_state.'",shop_phone_no="'.$shop_phone_no.'",description="'.$shop_desc.'",featured="'.$featured.'",
			status="'.$status.'",admin_email_status="'.$admin_email_status.'" where shop_id = ?', [$editid]);
			
					
						
					if($email_status==0)
					{	
				         if($status=="1")
						{
						Mail::send('admin/shop_mail', ['shop_name' => $shop_name, 'shop_address' => $shop_address, 'shop_city' => $shop_city, 'shop_pin_code' => $shop_pin_code, 'shop_country' => $shop_country,
				   'shop_state' => $shop_state, 'shop_phone_no' => $shop_phone_no, 'shop_desc' => $shop_desc, 'site_logo' => $site_logo, 'site_name' => $site_name], function ($message)
					{
						$message->subject('Your shop approved successfully');
						
						$message->from(Auth::user()->email, 'Admin');

						$message->to(Input::get('seller_email'));

					});
						}
			
					}
			
		}
		
		
			
			
			
        
		return redirect('admin/shop');
		
		
		
    }
	
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	
	
	
	
	public function destroy($id) {
		
		
	  $editshop = DB::table('shop')
		         ->where('shop_id','=',$id)
				 ->get();
				 
	     $shopro="/media/";
			$delpaths = base_path('images'.$shopro.$editshop[0]->cover_photo);
			File::delete($delpaths);
			
			$shopro_new="/media/";
			$delpaths_new = base_path('images'.$shopro_new.$editshop[0]->profile_photo);
			File::delete($delpaths_new);	
			
			$galleries =  DB::table('shop_gallery')
		         ->where('user_id','=',$editshop[0]->user_id)
				 ->where('token','=',$editshop[0]->token)
				 ->get();
				 
			foreach($galleries as $gallery)
			{
			   $shoprod="/media/";
			$delpath = base_path('images'.$shoprod.$gallery->photo);
			File::delete($delpath);
			
			DB::delete('delete from shop_gallery where id = ?',[$gallery->id]);
			}	 		 
		
	 DB::delete('delete from shop_services where user_id = ?',[$editshop[0]->user_id]);
	  
      DB::delete('delete from shop where shop_id = ?',[$id]);
	   
      return back();
      
   }
	
}
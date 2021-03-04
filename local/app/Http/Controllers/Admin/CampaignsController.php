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

class CampaignsController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $campaigns_count = DB::table('campaigns')
		        ->where('delete_status', '=' , '')
				
				
				->orderBy('camp_id','desc')
		        
				->count();
				
		$campaigns = DB::table('campaigns')
		        ->where('delete_status', '=' , '')
				
				
				->orderBy('camp_id','desc')
		        
				->get();
				
	$settings = DB::select('select * from settings where id = ?',[1]);					
				
	  $data = array('campaigns_count' => $campaigns_count, 'campaigns' => $campaigns, 'settings' => $settings);
	   return view('admin.campaigns')->with($data);
       
    }
	
	
	
	
	public function view_all_donations()
	{
	
	$checkout_count = DB::table('checkout')
		        	
				->orderBy('checkout.cid','desc')
				
		        
				->count();
				
		$checkout = DB::table('checkout')
		        	
				
				->orderBy('checkout.cid','desc')
		        
				->get();
				
	$settings = DB::select('select * from settings where id = ?',[1]);					
				
	  $data = array('checkout_count' => $checkout_count, 'checkout' => $checkout, 'settings' => $settings);
	   return view('admin.donations')->with($data);
	
	}
	
	
	
	
	
	
	
	
	
}
<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Responsive\Url;
use Mail;
use Session;
use Carbon\Carbon;

class IndexController extends Controller
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
	 
	
	
	
	
	 
    public function avigher_index()
    {
       
		

     
		
		$gallery = DB::table('gallery_images')
					 ->orderBy('imgid', 'desc')->take(3)
					 ->get();	
				
		$gallery_cnt = DB::table('gallery_images')
					 ->orderBy('imgid', 'desc')->take(3)
					 ->count();	
		
		
		
		
		$testimonials = DB::table('testimonials')->orderBy('id', 'desc')->get();
		$testimonials_cnt = DB::table('testimonials')->orderBy('id', 'desc')->count();
		
        
		$about = DB::table('pages')
		->where('page_id', '=', '1')
		->get();
		
		$testimonials = DB::table('testimonials')->orderBy('id', 'desc')->take(3)->get();
		$blogs = DB::table('post')
				->where('post_media_type', '=', 'image')
				->where('post_type', '=', 'blog')
				->orderBy('post_id', 'desc')->take(2)->get();
				
		$blogs_cnt = DB::table('post')
				->where('post_media_type', '=', 'image')
				->where('post_type', '=', 'blog')
				->orderBy('post_id', 'desc')->take(2)->count();		
				
			
		
					 
		
      $siteid=1;
		$site_setting=DB::select('select * from settings where id = ?',[$siteid]);
		
		 
		 
		 
		 $page_count = DB::table('pages')
		               ->where('home_page_box', '=', 1)
		               ->take(3)
					   ->count();	
		 
		 $view_page = DB::table('pages')
		               ->where('home_page_box', '=', 1)
		               ->take(3)
					   ->get();
					   
		
		$view_campaign = DB::table('campaigns')
		               ->where('camp_status', '!=', 0)
					   ->where('delete_status', '=' , '')
					   ->orderBy('camp_id', 'desc')
		               ->take(3)
					   ->get();
					   
		$count_campaign = DB::table('campaigns')
		               ->where('camp_status', '!=', 0)
					   ->where('delete_status', '=' , '')
					   ->orderBy('camp_id', 'desc')
		               ->take(3)
					   ->count();	
					   
					   
		$chckout_cnt = DB::table('checkout')
		             ->where('payment_status','=','completed')
					 ->orderBy('cid', 'desc')->take(4)
					 ->count();				   
					   
		$chckout = DB::table('checkout')
		             ->where('payment_status','=','completed')
					 ->orderBy('cid', 'desc')->take(4)
					 ->get();				   		   
		
		
		$data = array('testimonials' => $testimonials, 'testimonials_cnt' => $testimonials_cnt,  'about' => $about,   'testimonials' => $testimonials, 'blogs' => $blogs, 'blogs_cnt' => $blogs_cnt, 'site_setting' => $site_setting, 'gallery' => $gallery, 'gallery_cnt' => $gallery_cnt, 'page_count' => $page_count, 'view_page' => $view_page, 'count_campaign' => $count_campaign, 'view_campaign' => $view_campaign, 'chckout_cnt' => $chckout_cnt, 'chckout' => $chckout);
            return view('index')->with($data);
    }
	
	
	
	
	
	
	
	
	
	
	
}

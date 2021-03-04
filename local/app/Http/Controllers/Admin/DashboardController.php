<?php namespace Responsive\Http\Controllers\Admin;

use Responsive\Http\Controllers\Admin\AdminController;
/*use App\Article;
use App\ArticleCategory;
use App\User;
use App\Photo;
use App\PhotoAlbum;*/
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class DashboardController extends AdminController {

    public function __construct()
    {
        parent::__construct();
        view()->share('type', '');
    }

	public function index()
	{
        $title = "Dashboard";
		
		$total_user = DB::table('users')
		              ->where('id','!=','1')
			           ->count();
					   
		
					   
		
		
		
		$withdrawal_count = DB::table('withdrawal')
		           
				    ->count();
					
					
		$campaigns_count = DB::table('campaigns')
		                 ->where('delete_status', '=' , '')
				         ->count();	
						 
						 
		$donation_count = DB::table('checkout')
		                 ->where('payment_status', '=' , 'completed')
				         ->count();				 		

		
		
        $blog_cnt = DB::table('post')
		        ->where('post_type', '=' , 'blog')
				->where('post_status', '=' , '1')
		        ->orderBy('post_id','desc')
				->limit(3)->offset(0)
				->count();

		
         $blog = DB::table('post')
		        ->where('post_type', '=' , 'blog')
				->where('post_status', '=' , '1')
		        ->orderBy('post_id','desc')
				->limit(3)->offset(0)
				->get();
		
		
        $total_blog = DB::table('post')
			           ->where('post_type','=', 'blog')
					   ->count();
					   
					   
		$total_comment = DB::table('post')
			           ->where('post_type','=', 'comment')
					   ->count();

         
					  
				$set_id=1;
		$setting = DB::table('settings')->where('id', $set_id)->get();	   
		
		$users = DB::table('users')
		         ->where('id','!=','1')
		         ->orderBy('id','desc')
				 ->limit(4)->offset(0)
				 ->get();
				 
			

       $pages = DB::table('pages')
		         
				 ->count();	

      

				 
		
		$data = array('total_user' => $total_user, 'total_blog' => $total_blog, 'setting' => $setting, 'users' => $users,
		'pages' => $pages,  'total_comment' => $total_comment, 'blog' => $blog, 'blog_cnt' => $blog_cnt,  'withdrawal_count' => $withdrawal_count, 'campaigns_count' => $campaigns_count, 'donation_count' => $donation_count);
		
		return view('admin.index')->with($data);
		
		
		
		
	}
}
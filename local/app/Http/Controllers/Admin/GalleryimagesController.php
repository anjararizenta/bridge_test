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

class GalleryimagesController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $gallery_images = DB::table('gallery_images')
		
		 ->orderBy('gallery_images.imgid','desc')
		->get();

        return view('admin.galleryimages', ['gallery_images' => $gallery_images]);
    }
	
	public function getgallery()
	{
		 /* $getservice = DB::table('services')->where('id', '?')->first();
		 return view('admin.subservices',$getservice);*/
	}
	
	
	protected function delete_all(Request $request)
    {
		
		
	   $data = $request->all();
	   $galleryid = $data['gallery_id'];
	   
	   foreach($galleryid as $gallery)
	   {
		   $image = DB::table('gallery_images')->where('imgid', $gallery)->first();
		$orginalfile=$image->galleryimage;
		$galphoto="/media/";
       $path = base_path('images'.$galphoto.$orginalfile);
	  File::delete($path);
      DB::delete('delete from gallery_images where imgid = ?',[$gallery]);
		   
	   }
	   
      return back();
		
	}
	
	
	
	public function destroy($id) {
		
		$image = DB::table('gallery_images')->where('imgid', $id)->first();
		$orginalfile=$image->galleryimage;
		$galphoto="/media/";
       $path = base_path('images'.$galphoto.$orginalfile);
	  File::delete($path);
      DB::delete('delete from gallery_images where imgid = ?',[$id]);
	   
      return back();
      
   }
	
}
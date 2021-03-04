<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/










Route::get('/', 'IndexController@avigher_index');
Route::get('/index', 'IndexController@avigher_index');
Route::get('/thankyou/{id}', 'IndexController@newsletter_activate');


/************* BLOG ***************/
Route::get('/blog', 'BlogController@avigher_index');
Route::get('/blog/{id}', 'BlogController@avigher_singlepost');
Route::post('/blog', ['as'=>'blog','uses'=>'BlogController@avigher_blog_comment']);
Route::get('/gallery', 'GalleryController@avigher_gallery');

/************ END BLOG *************/




/************** CHECKOUT ***************/
Route::get('/success/{cid}', 'SuccessController@paypal_success');
Route::post('/stripe-success', ['as'=>'stripe-success','uses'=>'StripeController@avigher_stripe']);
/************** CHECKOUT ***********/







/**************** SOCIAL LOGIN ***************/
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
/**************** SOCIAL LOGIN ***************/



/************** TAGS ***************/
Route::get('/tag/{type}/{id}', 'TagController@avigher_tag');
/************* END TAGS ***************/





/************** DASHBOARD **********/
Route::get('/logout', 'DashboardController@avigher_logout');
Route::get('/delete-account', 'DashboardController@avigher_deleteaccount');
Route::post('/dashboard', ['as'=>'dashboard','uses'=>'DashboardController@avigher_edituserdata']);
/*********** END DASHBOARD ************/




/******** CAMPAIGN **********/

Route::get('/withdrawal-settings', 'CampaignController@avigher_withdrawal_settings');
Route::post('/withdrawal-settings', ['as'=>'withdrawal-settings','uses'=>'CampaignController@avigher_withdrawal_savedata']);


Route::get('/create-campaign', 'CampaignController@index');
Route::post('/create-campaign', ['as'=>'create-campaign','uses'=>'CampaignController@avigher_savedata']);
Route::get('/campaigns', 'CampaignController@avigher_view_campaign');
Route::get('/campaigns/{status}/{id}/{raised}', 'CampaignController@avigher_delete_campaign');
Route::get('/campaigns/{status}/{id}/{withdraw}/{user_amt}', 'CampaignController@avigher_withdraw_campaign');

Route::get('/edit-campaign/{id}', 'CampaignController@avigher_edit_campaign');

Route::post('/edit-campaign', ['as'=>'edit-campaign','uses'=>'CampaignController@avigher_editdata']);


Route::get('/campaign/{id}/{slug}', 'SingleCampaignController@avigher_single_campaign');
Route::get('/donate/{id}/{slug}', 'SingleCampaignController@avigher_donate_campaign');
Route::post('/donate', ['as'=>'donate','uses'=>'SingleCampaignController@avigher_donatenow']);



Route::get('/all-campaigns', 'SingleCampaignController@avigher_all_campaigns');
Route::get('/categories', 'SingleCampaignController@category_views');
Route::get('/category/{id}/{slug}', 'SingleCampaignController@avigher_single_category');

Route::get('/donations', 'CampaignController@avigher_technologies_donations');

Route::post('/search', ['as'=>'search_campaign','uses'=>'SingleCampaignController@avigher_search_campaign']);
Route::get('/search', 'SingleCampaignController@avigher_get_search');
/******* END CAMPAIGN ***********/






Route::get('/cancel', 'CancelController@avigher_showpage');









Auth::routes();

	
	
	
	Route::get('/page/{id}','PageController@avigher_viewpage');
	
	Route::get('/404','PageController@avigher_404');
	
	
	/******** Forgot Password *********/
	
	
	Route::get('/forgot-password','ForgotpasswordController@avigher_forgot_view');
	Route::post('/forgot-password', ['as'=>'forgot-password','uses'=>'ForgotpasswordController@avigher_forgot_password']);
	
	
	/************* End Forgot Password **********/
	
	
	/************** Reset Password ***********/
	
	
	
	Route::get('/reset-password/{id}', 'ResetpasswordController@avigher_reset_view');
	
	Route::post('/reset-password', ['as'=>'reset-password','uses'=>'ResetpasswordController@avigher_reset_password']);
	/************** End Reset Password *************/
	
	
	
	
	Route::get('/contact-us','PageController@avigher_contact');
	
	Route::post('/contact-us', ['as'=>'contact-us','uses'=>'PageController@avigher_mailsend']);
	
	
	
	
	
	
	
	
	Route::post('/payment', ['as'=>'payment','uses'=>'PageController@avigher_donate_payment']);
	
	
	








/* Route::group(['namespace' => 'Admin', 'middleware' => 'admin'], function() {*/

Route::group(['middleware' => 'admin'], function() {

    Route::get('/admin','Admin\DashboardController@index');
    Route::get('/admin/index','Admin\DashboardController@index');
	
	/* user */
	Route::get('/admin/users','Admin\UsersController@index');
	Route::get('/admin/adduser','Admin\AdduserController@formview');
	Route::post('/admin/adduser', ['as'=>'admin.adduser','uses'=>'Admin\AdduserController@adduserdata']);
    
	Route::get('/admin/users/{id}','Admin\UsersController@destroy');
	Route::get('/admin/edituser/{id}','Admin\EdituserController@showform');
	Route::post('/admin/edituser', ['as'=>'admin.edituser','uses'=>'Admin\EdituserController@edituserdata']);
	Route::post('/admin/users', ['as'=>'admin.users','uses'=>'Admin\UsersController@delete_all']);
	/* end user */
	
	
	
	
	
	
	
	/* category */
	Route::get('/admin/category','Admin\CategoryController@index');
	Route::get('/admin/addcategory','Admin\AddcategoryController@formview');
	Route::post('/admin/addcategory', ['as'=>'admin.addcategory','uses'=>'Admin\AddcategoryController@addcategorydata']);
	Route::get('/admin/category/{id}','Admin\CategoryController@destroy');
	Route::get('/admin/editcategory/{id}','Admin\EditcategoryController@showform');
	Route::post('/admin/editcategory', ['as'=>'admin.editcategory','uses'=>'Admin\EditcategoryController@editcategorydata']);
	Route::post('/admin/category', ['as'=>'admin.category','uses'=>'Admin\CategoryController@delete_all']);
	/* end category */
	
	
	
	
	
	
	/* Newletter */
	Route::get('/admin/newsletter','Admin\NewsletterController@index');
	Route::get('/admin/newsletter/{action}/{id}/{sid}','Admin\NewsletterController@status');
	Route::get('/admin/newsletter/{id}','Admin\NewsletterController@destroy');
	Route::get('/admin/sendupdates','Admin\AddnewsletterController@formview');
	Route::post('/admin/sendupdates', ['as'=>'admin.sendupdates','uses'=>'Admin\AddnewsletterController@addupdatedata']);
	Route::post('/admin/newsletter', ['as'=>'admin.newsletter','uses'=>'Admin\NewsletterController@delete_all']);
	
	/* End Newsletter */
	
	
	
	
	/* Campaigns */
	
	Route::get('/admin/campaigns','Admin\CampaignsController@index');
	Route::get('/admin/donations','Admin\CampaignsController@view_all_donations');
	
	/* End Campaigns */
	
	
	
	
	
	
	
	
	
	/* Withdrawal */
	
	Route::get('/admin/withdrawals','Admin\WithdrawalController@avigher_technologies_withdrawal');
	
	Route::get('/admin/withdrawals/{wid}/{camp_id}','Admin\WithdrawalController@avigher_withdrawal_approval');
	
	
	/* End Withdrawal */
	
	
	
	
	
	
	
	
	/* gallery images */
	
	Route::get('/admin/galleryimages','Admin\GalleryimagesController@index');
	Route::get('/admin/addgalleryimages','Admin\AddgalleryimagesController@formview');
	
	Route::post('/admin/addgalleryimages', ['as'=>'admin.addgalleryimages','uses'=>'Admin\AddgalleryimagesController@addgalleryimages']);
	Route::get('/admin/galleryimages/{id}','Admin\GalleryimagesController@destroy');
	
	
	
	Route::get('/admin/editgalleryimages/{id}','Admin\EditgalleryimagesController@edit');
	
	Route::post('/admin/editgalleryimages', ['as'=>'admin.editgalleryimages','uses'=>'Admin\EditgalleryimagesController@editgalleryimagesdata']);
	
	Route::post('/admin/galleryimages', ['as'=>'admin.galleryimages','uses'=>'Admin\GalleryimagesController@delete_all']);
	/* end gallery images */
	
	
	
	
	/* Blogs */
	
	Route::get('/admin/blog','Admin\BlogController@index');
	Route::get('/admin/add-blog','Admin\AddblogController@formview');
	Route::post('/admin/add-blog', ['as'=>'admin.add-blog','uses'=>'Admin\AddblogController@addblogdata']);
	Route::get('/admin/blog/{id}','Admin\BlogController@destroy');
	Route::get('/admin/edit-blog/{id}','Admin\EditblogController@showform');
	Route::post('/admin/edit-blog', ['as'=>'admin.edit-blog','uses'=>'Admin\EditblogController@blogdata']);
	Route::post('/admin/blog', ['as'=>'admin.blog','uses'=>'Admin\BlogController@delete_all']);
	
	Route::get('/admin/comment/{blog}/{comment}/{id}','Admin\BlogController@view_comment');
	Route::get('/admin/comment/{pid}/{sid}','Admin\BlogController@status_comment');
	Route::get('/admin/comment/{id}','Admin\BlogController@comment_destroy');
	/* end Blogs */
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/* pages */
	
	Route::get('/admin/pages','Admin\PagesController@index');
	Route::get('/admin/edit-page/{id}','Admin\PagesController@showform');
	Route::post('/admin/edit-page', ['as'=>'admin.edit-page','uses'=>'Admin\PagesController@pagedata']);
	Route::post('/admin/pages', ['as'=>'admin.pages','uses'=>'Admin\PagesController@delete_all']);
	Route::get('/admin/pages/{id}','Admin\PagesController@deleted');
	
	Route::get('/admin/add-page','Admin\PagesController@formview');
	Route::post('/admin/add-page', ['as'=>'admin.add-page','uses'=>'Admin\PagesController@addpagedata']);
	/* end pages */
	
	
	
	/* start settings */
	
	
	Route::get('/admin/settings','Admin\SettingsController@showform');
	Route::post('/admin/settings', ['as'=>'admin.settings','uses'=>'Admin\SettingsController@editsettings']);
	
	/* end settings */
	
	
	/* media settings */
	
	Route::get('/admin/media-settings','Admin\MediasettingsController@showform');
	Route::post('/admin/media-settings', ['as'=>'admin.media-settings','uses'=>'Admin\MediasettingsController@editsettings']);
	
	/* end media settings */
	
	
	/* payment settings */
	
	Route::get('/admin/payment-settings','Admin\SettingsController@paymentform');
	Route::post('/admin/payment-settings', ['as'=>'admin.payment-settings','uses'=>'Admin\SettingsController@payment_settings']);
	/* end payment settings */
	
	
	
	/* color settings */
	
	Route::get('/admin/color-settings','Admin\ColorsettingsController@showform');
	Route::post('/admin/color-settings', ['as'=>'admin.color-settings','uses'=>'Admin\ColorsettingsController@editsettings']);
	
	/* end color settings */
	
	
	
	
	
	
	
	
	
	
	/* Testimonials */
	
	Route::get('/admin/testimonials','Admin\TestimonialsController@index');
	Route::get('/admin/add-testimonial','Admin\AddtestimonialController@formview');
	Route::post('/admin/add-testimonial', ['as'=>'admin.add-testimonial','uses'=>'Admin\AddtestimonialController@addtestimonialdata']);
	Route::get('/admin/testimonials/{id}','Admin\TestimonialsController@destroy');
	Route::get('/admin/edit-testimonial/{id}','Admin\EdittestimonialController@showform');
	Route::post('/admin/edit-testimonial', ['as'=>'admin.edit-testimonial','uses'=>'Admin\EdittestimonialController@testimonialdata']);
	Route::post('/admin/testimonials', ['as'=>'admin.testimonials','uses'=>'Admin\TestimonialsController@delete_all']);
	
	/* end Testimonials */
	
	
	
	
	
	
   
});


Route::group(['middleware' => 'web'], function (){
    
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/my-comments', 'DashboardController@mycomments');
	Route::get('/my-comments/{id}', 'DashboardController@mycomments_destroy');

});





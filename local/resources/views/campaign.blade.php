<?php
use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
?>
<!DOCTYPE html>
<html lang="en">
<head>

    

   @include('style')
	




</head>
<body class="index">

    

    <!-- fixed navigation bar -->
    @include('header')
    
    
    
    

     <section class="probootstrap-hero probootstrap-hero-inner jumbotron-cover" style="background-image: url(<?php echo $url;?>/local/resources/views/theme/img/header_new.jpg); background-position:center;"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                <h1 class="probootstrap-heading probootstrap-animate">Campaign</h1>
              </div>
            </div>
          </div>
        </div>
      </section>
     

    
    <?php if(!empty($campaign_count)){?>
	
    <section class="probootstrap-section">
        <div class="container">
          <div class="row probootstrap-gutter60">

            <div class="col-md-4 col-sm-4 probootstrap-animate" data-animate-effect="fadeIn">
              <div class="probootstrap-image-text-block probootstrap-cause">
                
                <div class="probootstrap-cause-inner">
                   <div class="row mtp30" align="center">
                  <?php if(!empty($user_details[0]->photo)){?>
                  <img src="<?php echo $url;?>/local/images/media/<?php echo $user_details[0]->photo;?>" alt="<?php echo $user_details[0]->name;?>" class="img-responsive user_round"><?php } else { ?>
                  <img src="<?php echo $url;?>/local/images/nophoto.jpg" alt="<?php echo $user_details[0]->name;?>" class="img-responsive user_round">
                  <?php } ?>
                  <span><strong>Organizer :-</strong> <?php echo $user_details[0]->name;?></span>
                  </div>
                  
                  <?php if($percentage_value >= 100){ $color_class = "progress-green"; $percent_value = 100; } else { $color_class = "progress-bar"; $percent_value = $percentage_value; } ?>
                  
                  <div class="progress">
                    <div class="<?php echo $color_class;?> progress-bar-s2" data-percent="<?php echo $percent_value;?>"></div>
                  </div>
                  
                 
                  

                  <div class="row mb30">
                    <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-raised">Raised: <span class="money"><?php echo $raised;?> <?php echo $settings[0]->site_currency;?></span></div>
                    <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-goal">Goal: <span class="money"><?php echo $campaign[0]->camp_goal;?> <?php echo $settings[0]->site_currency;?> </span></div>
                  </div>
                  
                  <h2><a href="<?php echo $url;?>/category/<?php echo $category[0]->id;?>/<?php echo $category[0]->post_slug;?>">Category :- <span class="theme_color"><?php echo $category[0]->cat_name;?></span></a></h2>
                  <div class="probootstrap-date"><i class="icon-map-pin theme_color"></i> <?php echo $campaign[0]->camp_location;?></div>  
                  <div class="probootstrap-date"><i class="icon-calendar3 theme_color"></i> <?php echo date("M d, Y", strtotime($campaign[0]->camp_date));?></div> 
                  <?php if(!empty($campaign[0]->camp_finish)){?>
                  <p><span class="btn btn-primary default_cursor">Campaign Ended!</span></p>
                  <?php } else {
				  
				  if(Auth::guest()) {
				  ?>
                  <p><a href="<?php echo $url;?>/donate/<?php echo $campaign[0]->camp_id;?>/<?php echo $campaign[0]->camp_slug;?>" class="btn btn-primary btn-black">Donate Now!</a></p>
                  <?php } else {
				  
				  if($campaign[0]->camp_user_id!=Auth::user()->id)
				  {
				   ?>
				  
				  <p><a href="<?php echo $url;?>/donate/<?php echo $campaign[0]->camp_id;?>/<?php echo $campaign[0]->camp_slug;?>" class="btn btn-primary btn-black">Donate Now!</a></p>
                  <?php 
				  
				  
				  
				  } } } ?>
                </div>
              </div>
            
            
            
            
            
            <?php if(!empty($check_count_five)){?>
            <div class="probootstrap-image-text-block probootstrap-cause">
                
                <div class="probootstrap-cause-inner">
                
                <h3>Recent Donations</h3>
                
                <?php
				 $checkr = DB::table('checkout')
					 ->where('camp_id', '=', $campid)
					 ->where('payment_status','=','completed')
					 ->orderBy('cid','desc')
					 ->take(5)
					 ->get();
				foreach($checkr as $checkin){
				?>
                <div class="recent_donate">
                <span>
                <?php if(!empty($checkin->donator_user_id)){
				$userdetails = DB::table('users')->where('id','=',$checkin->donator_user_id)->get();
				if(!empty($userdetails[0]->photo)){
				
				?>
                <img src="<?php echo $url;?>/local/images/media/<?php echo $userdetails[0]->photo;?>" border="0" width="60">
                <?php } else { ?>
                <img src="<?php echo $url;?>/local/images/nophoto.jpg" border="0" width="60">
                <?php } } else { ?>
                <img src="<?php echo $url;?>/local/images/nophoto.jpg" border="0" width="60">
                <?php } ?>
                </span>
                
                
                <span>
                <strong><?php echo $checkin->fullname;?></strong>
                <p><?php echo $checkin->amount;?> <?php echo $settings[0]->site_currency;?></p>
                <b><?php echo date('d M, Y', strtotime($checkin->payment_date));?></b>
                </span>
                
                
                
                </div>
                
                
                <?php } ?>
                </div>
                
                </div>
            
            <?php } ?>
            
            
            
            
            
            
            
            
            
            
            </div>
            
            
            
            
            
            

            <div class="col-md-8 col-sm-8 probootstrap-animate custom_format">
              <h2><?php echo $campaign[0]->camp_title;?></h2>
              
              <div class="row">
                <div class="col-md-12 campaign_inner">
                  <p>
                  <?php if(!empty($campaign[0]->camp_image)){?>
                  <a href="<?php echo $url;?>/local/images/media/<?php echo $campaign[0]->camp_image;?>" class="image-popup"><img src="<?php echo $url;?>/local/images/media/<?php echo $campaign[0]->camp_image;?>" alt="<?php echo $campaign[0]->camp_title;?>" class="img-responsive"></a>
                  <?php } else {?>
                  <img src="<?php echo $url;?>/local/images/noimage.jpg" alt="<?php echo $campaign[0]->camp_title;?>" class="img-responsive">
                  <?php } ?>
                  </p>
                </div>
                
              </div>
              
              <p class="custom_format"><?php echo html_entity_decode($campaign[0]->camp_desc);?></p>

            </div>

          </div>
        </div>
      </section>

      
      

	<?php } ?>
	
	
	
	
	
	
	
	

      <div class="height50 clearfix"></div>
	   

      @include('footer')
</body>
</html>
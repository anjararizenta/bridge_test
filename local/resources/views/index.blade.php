<?php
	use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		$headertype = $setts[0]->header_type;
	?>
<!DOCTYPE html>



<html lang="en">
  <head>
    

		

   @include('style')
   




</head>
<body>

  

   
    @include('header')
    
  
  
  
  
  
  
  <section class="probootstrap-hero jumbotron-cover" style="background-image: url(<?php echo $url;?>/local/images/media/<?php echo $setts[0]->site_banner;?>)"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                <h1 class="probootstrap-heading probootstrap-animate"><?php if(!empty($setts[0]->site_banner_heading)){?><?php echo $setts[0]->site_banner_heading;?> <?php } ?><?php if(!empty($setts[0]->site_banner_subheading)){?><span><?php echo $setts[0]->site_banner_subheading;?></span><?php } ?></h1>
                <?php if(!empty($setts[0]->site_button_url)){?><p class="probootstrap-animate"><a href="<?php echo $setts[0]->site_button_url;?>" class="btn btn-primary btn-lg"><?php echo $setts[0]->site_button_text;?></a></p><?php } ?>
              </div>
            </div>
          </div>
        </div>
        
        <?php if($setts[0]->site_home_boxes==1){?>
        <div class="probootstrap-service-intro">
          <div class="container">
            <div class="probootstrap-service-intro-flex">
            
            
            <?php if(!empty($page_count)){?>
            
            <?php foreach($view_page as $pager){?>
            <div class="item probootstrap-animate" data-animate-effect="fadeIn">
                <div class="icon">
                  <a href="<?php echo $url;?>/page/<?php echo $pager->post_slug;?>" class="no_decoration"><i class="fa <?php echo $pager->home_box_icon;?>"></i></a>
                </div>
                <div class="text">
                  <h2><a href="<?php echo $url;?>/page/<?php echo $pager->post_slug;?>" class="no_decoration"><?php echo $pager->page_title;?></a></h2>
                  <p><?php echo substr($pager->page_desc,0,50).' ...';?></p>
                  <p><a href="<?php echo $url;?>/page/<?php echo $pager->post_slug;?>">Read More</a></p>
                </div>
              </div>
            <?php } ?>
            <?php } ?>
            
            
              
            </div>
          </div>
        </div>
        <?php } ?>
        
        
      </section>
      
      <?php if(!empty($count_campaign)){?>

      <section class="probootstrap-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
              <h2>Latest Campaigns</h2>
              <p class="lead custom_format">Our latest campaigns</p>
            </div>
          </div>
          <div class="row">
          
          
          
            <?php foreach($view_campaign as $campaign){
			
			$campid = $campaign->camp_id;
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
			$total = $campaign->camp_goal;
			$percentage = ($x*100)/$total;	 
			$percentage_value = round($percentage,2);
			?>
            
            
            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate campaign_item" data-animate-effect="fadeIn">
              <div class="probootstrap-image-text-block  probootstrap-cause">
                <figure>
                <?php if(!empty($campaign->camp_image)){?>
                  <a href="<?php echo $url;?>/campaign/<?php echo $campaign->camp_id;?>/<?php echo $campaign->camp_slug;?>"><img src="<?php echo $url;?>/local/images/media/<?php echo $campaign->camp_image;?>" alt="<?php echo $campaign->camp_title;?>" class="img-responsive"></a>
                <?php } else { ?>
                <a href="<?php echo $url;?>/campaign/<?php echo $campaign->camp_id;?>/<?php echo $campaign->camp_slug;?>"><img src="<?php echo $url;?>/local/images/noimage.jpg" alt="<?php echo $campaign->camp_title;?>" class="img-responsive"></a>
                <?php } ?>
                
                </figure>
                <?php if($percentage_value >= 100){ $color_class = "progress-green"; $percent_value = 100; } else { $color_class = "progress-bar"; $percent_value = $percentage_value; } ?>
                
                <div class="probootstrap-cause-inner">
                  <div class="progress">
                    <div class="<?php echo $color_class;?> progress-bar-s2" data-percent="<?php echo $percent_value;?>"></div>
                  </div>

                  <div class="row mb30">
                    <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-raised">Raised: <span class="money"><?php echo $raised;?> <?php echo $site_setting[0]->site_currency;?></span></div>
                    <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-goal">Goal: <span class="money"> <?php echo $campaign->camp_goal;?> <?php echo $site_setting[0]->site_currency;?></span></div>
                  </div>
                  
                  <h2 class="camp_heading"><a href="<?php echo $url;?>/campaign/<?php echo $campaign->camp_id;?>/<?php echo $campaign->camp_slug;?>"><?php echo $campaign->camp_title;?></a></h2>
                  <div class="probootstrap-date"><i class="icon-map-pin theme_color"></i> <?php echo $campaign->camp_location;?></div>  
                  <div class="probootstrap-date"><i class="icon-calendar3 theme_color"></i> <?php echo date("M d, Y", strtotime($campaign->camp_date));?></div> 
                  
                  <?php if(!empty($campaign->camp_finish)){ $txt_campaign = "Campaign Ended!"; } else { $txt_campaign = "Donate Now!"; } ?>
                  <p><a href="<?php echo $url;?>/campaign/<?php echo $campaign->camp_id;?>/<?php echo $campaign->camp_slug;?>" class="btn btn-primary btn-black"><?php echo $txt_campaign;?></a></p>
                </div>
              </div>
            </div>
            
            <?php } ?>
            
            
            
            
            
          </div>
          <div class="row">
            <div class="col-md-12">
              <p>Save the future for the little children by donating. <a href="<?php echo $url;?>/all-campaigns">See all campaigns</a></p>
            </div>
          </div>
        </div>
      </section>
      
      
      <?php } ?>

      <?php if(!empty($chckout_cnt)){?>
      <section class="probootstrap-section probootstrap-bg probootstrap-section-dark" style="background-image: url(<?php echo $url;?>/local/resources/views/theme/img/donation_bg.jpg)"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
              <h2>Latest Donations</h2>
              <p class="lead">Our latest donations</p>
            </div>
          </div>
          <div class="row">
          
          <?php foreach($chckout as $view_checkout){
		  
		  if(!empty($view_checkout->donator_user_id))
		  {
		     $view_profile_count = DB::table('users')
		               ->where('id', '=', $view_checkout->donator_user_id)
		               ->count();
			 if(!empty($view_profile_count))
			 {
			 $view_profile = DB::table('users')
		               ->where('id', '=', $view_checkout->donator_user_id)
		               ->get();
				 if(!empty($view_profile[0]->photo))
				 {	   
			     $photo = "<img src=".$url."/local/images/media/".$view_profile[0]->photo." border='0' class='img-responsive'>";
				 }
				 else
				 {
				   $photo = "<img src=".$url."/local/images/nophoto.jpg border='0' class='img-responsive'>";
				 }		   
			 }
			 else
			 {
			   $photo = "<img src=".$url."/local/images/nophoto.jpg border='0' class='img-responsive'>";	
			 }
			 		   
		  }
		  else
		  {
		    $photo = "<img src=".$url."/local/images/nophoto.jpg border='0' class='img-responsive'>";
		  }
		  ?>
            <div class="col-md-3">
              <div class="probootstrap-donors text-center probootstrap-animate">
                <figure class="media">
                 <?php echo $photo;?>
                </figure>
                <div class="text">
                  <h3><?php echo $view_checkout->fullname;?></h3>
                  <p class="donated">Donated <span class="money"><?php echo $view_checkout->amount;?> <?php echo $setts[0]->site_currency;?></span></p>
                </div>
              </div>
            </div>
            <?php } ?>
            
            
          </div>
        </div>
      </section>
      <?php } ?>
      
      <?php if(!empty($testimonials_cnt)){?>
      <section class="probootstrap-section  probootstrap-section-colored">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center section-heading probootstrap-animate">
              <h2>What People Says</h2>
              <p>See our testimonials</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 probootstrap-animate">
              <div class="owl-carousel owl-carousel-testimony owl-carousel-fullwidth">
                
                <?php foreach($testimonials as $testimonial){?>
                
                <div class="item">

                  <div class="probootstrap-testimony-wrap text-center">
                    
                    <figure>
                    <?php if(!empty($testimonial->image)){?>
                      <img src="<?php echo $url;?>/local/images/media/<?php echo $testimonial->image;?>" alt="<?php echo $testimonial->name;?>">
                      <?php } else {?>
                       <img src="<?php echo $url;?>/local/images/nophoto.jpg" alt="<?php echo $testimonial->name;?>">
                       <?php } ?>
                    </figure>
                    <blockquote class="quote">&ldquo;<?php echo substr($testimonial->description,0,200);?>&rdquo; <cite class="author"> &mdash; <span><?php echo $testimonial->name;?></span></cite></blockquote>
                  </div>

                </div>
                
                <?php } ?>
               
                
              </div>
            </div>
          </div>
        </div>
      </section>
       <?php } ?> 
      

      <section class="probootstrap-section">
        <div class="container">
          <div class="row">
          <?php if(!empty($blogs_cnt)) {?>
            <div class="col-md-6 probootstrap-animate">
              <h3>Latest Post</h3>
              <ul class="probootstrap-news">
              <?php  foreach($blogs as $blog){ ?>
              <?php
			$old_dates = strtotime($blog->post_date);
			$new_dates = date('M j', $old_dates);
			?>
            <?php
					$post_comment = DB::table('post')
							 ->where('post_parent', '=', $blog->post_id)
							 ->where('post_comment_type', '=', 'blog')
							 ->where('post_type', '=', 'comment')
							 ->where('post_status', '=', '1')
							 ->count();
					?>
              
                <li>
                  <span class="probootstrap-date"><?php echo $new_dates;?></span>
                  <h3><a href="<?php echo $url;?>/blog/<?php echo $blog->post_slug;?>"><?php echo $blog->post_title;?></a></h3>
                  <p class="black"><?php echo substr($blog->post_desc,0,220).'...';?></p>
                  <p><span class="probootstrap-meta"> <a href="<?php echo $url;?>/blog/<?php echo $blog->post_slug;?>"><i class="icon-bubbles2"></i> <?php echo $post_comment;?></a></span></p>
                </li>
                <?php } ?>
                
              </ul>
              <p><a href="<?php echo $url;?>/blog" class="btn btn-primary">View all post</a></p>
            </div>
             <?php } ?>
            
            
            
            
            
            
             
            <?php if(!empty($gallery_cnt)){?>
            <div class="col-md-6 probootstrap-animate">
              <h3>Gallery</h3>
              <div class="row itemr">
              <?php 
			  $i=1;
			  foreach($gallery as $view_gallery){?>
              
              <div class="<?php if($i==1){?>col-md-12<?php } else {?>col-md-6<?php } ?> <?php if($i==2){?> padd_rightoff <?php } ?>">
              <?php if(!empty($view_gallery->galleryimage)){?>
              
              <span class="whiter"><?php echo $view_gallery->title;?></span>
              <span class="oranger"><?php echo $view_gallery->subtitle;?></span>
              <a href="<?php echo $url;?>/local/images/media/<?php echo $view_gallery->galleryimage;?>" class="image-popup"><img src="<?php echo $url;?>/local/images/media/<?php echo $view_gallery->galleryimage;?>" border="0" class="img-responsive"></a>
              <?php } else { ?>
              <span class="whiter"><?php echo $view_gallery->title;?></span>
              <span class="oranger"><?php echo $view_gallery->subtitle;?></span>
              <a href="<?php echo $url;?>/local/images/media/noimage.jpg" class="image-popup"><img src="<?php echo $url;?>/local/images/media/noimage.jpg" border="0" class="img-responsive"></a>
              <?php  } ?>
              
              </div>
              
              
              
              
              <?php  $i++; } ?> 
              </div>
              <p class="text-right"><a href="<?php echo $url;?>/gallery" class="btn btn-primary">View all gallery</a></p>

            </div>
           <?php } ?>
            
            
          </div>
        </div>
      </section>
  
  
  
  
  
  
  
  
  
  
  
  
			

      @include('footer')
      
</body>
</html>
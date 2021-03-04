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
                <h1 class="probootstrap-heading probootstrap-animate">All Campaigns</h1>
              </div>
            </div>
          </div>
        </div>
      </section>

    
     

    

	
    <?php if(!empty($count_campaign)){?>

      <section class="probootstrap-section">
        <div class="container">
          
          <div class="row camplist">
          
          
          
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
            <div class="clearfix height30"></div>
            <div class="campage"></div>
          
        </div>
      </section>
      
      
      <?php } ?>
	
	
	
	
	
	
	
	

      <div class="height50 clearfix"></div>
	   

      @include('footer')
</body>
</html>
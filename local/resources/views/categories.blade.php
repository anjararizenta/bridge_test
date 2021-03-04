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

<html class="no-js"  lang="en">
<head>

		

   @include('style')
   




</head>
<body>

  

   
    @include('header')

	
    
    
    <section class="probootstrap-hero probootstrap-hero-inner jumbotron-cover" style="background-image: url(<?php echo $url;?>/local/resources/views/theme/img/header_new.jpg); background-position:center;"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                <h1 class="probootstrap-heading probootstrap-animate">Categories</h1>
              </div>
            </div>
          </div>
        </div>
      </section>
    

	
    
    
    
    <section class="probootstrap-section">
        <div class="container">
        
        
			<div class="row row-bottom-padded-md">
    
    <?php if(!empty($category_count)){?>
            <div class="col-md-12 probootstrap-animate campaign_category">
              
              <div class="row categorylist">
              <?php 
			  $i=0;
			  foreach($category as $view_gallery){
			  
			  
			  $count_campaign = DB::table('campaigns')
		               ->where('camp_status', '!=', 0)
					   ->where('delete_status', '=', "")
					   ->where('camp_category', '=', $view_gallery->id)
		               ->count();
			  
			 
			  ?>
              
              <div class="col-md-3 mbottom20">
              <?php if(!empty($view_gallery->image)){?>
              
              
              <a href="<?php echo $url;?>/category/<?php echo $view_gallery->id;?>/<?php echo $view_gallery->post_slug;?>"><img src="<?php echo $url;?>/local/images/media/<?php echo $view_gallery->image;?>" border="0" class="img-responsive"></a>
              <?php } else { ?>
             
              <a href="<?php echo $url;?>/category/<?php echo $view_gallery->id;?>/<?php echo $view_gallery->post_slug;?>"><img src="<?php echo $url;?>/local/images/noimage.jpg" border="0" class="img-responsive"></a>
              <?php  } ?>
              
              <span><a href="<?php echo $url;?>/category/<?php echo $view_gallery->id;?>/<?php echo $view_gallery->post_slug;?>" class="bold theme_color"><?php echo $view_gallery->cat_name;?> (<?php echo $count_campaign;?>)</a></span>
              
              </div>
              
              
              
              
              <?php  $i++; } ?> 
              </div>
              <div class="clearfix height20"></div>
              <div class="gorypage"></div>

            </div>
           <?php } ?>
    
	</div>
		</div>
	</section>

	


	@include('footer')
      
</body>
</html>
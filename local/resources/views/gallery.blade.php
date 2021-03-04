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
                <h1 class="probootstrap-heading probootstrap-animate">Gallery</h1>
              </div>
            </div>
          </div>
        </div>
      </section>
    

	
    
    
    
    <section class="probootstrap-section">
        <div class="container">
        
        
			<div class="row row-bottom-padded-md">
    
    <?php if(!empty($query_cnt)){?>
            <div class="col-md-12 probootstrap-animate">
              
              <div class="row itemrg gallerylist">
              <?php 
			  $i=0;
			  foreach($query as $view_gallery){?>
              
              <div class="<?php if($i%4==0){?>col-md-6<?php } else {?>col-md-3<?php } ?>">
              <?php if(!empty($view_gallery->galleryimage)){?>
              
              <span class="whiterg"><?php echo $view_gallery->title;?></span>
              <span class="orangerg"><?php echo $view_gallery->subtitle;?></span>
              <a href="<?php echo $url;?>/local/images/media/<?php echo $view_gallery->galleryimage;?>" class="image-popup"><img src="<?php echo $url;?>/local/images/media/<?php echo $view_gallery->galleryimage;?>" border="0" class="img-responsive"></a>
              <?php } else { ?>
              <span class="whiterg"><?php echo $view_gallery->title;?></span>
              <span class="orangerg"><?php echo $view_gallery->subtitle;?></span>
              <a href="<?php echo $url;?>/local/images/noimage.jpg" class="image-popup"><img src="<?php echo $url;?>/local/images/media/noimage.jpg" border="0" class="img-responsive"></a>
              <?php  } ?>
              
              </div>
              
              
              
              
              <?php  $i++; } ?> 
              </div>
              <div class="gpage"></div>

            </div>
           <?php } ?>
    
	</div>
		</div>
	</section>

	


	@include('footer')
      
</body>
</html>
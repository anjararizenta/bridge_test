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
<body>

    

    <!-- fixed navigation bar -->
    @include('header')

	

    
     
     
     <section class="probootstrap-hero probootstrap-hero-inner jumbotron-cover" style="background-image: url(<?php echo $url;?>/local/resources/views/theme/img/header_new.jpg); background-position:center;"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                <h1 class="probootstrap-heading probootstrap-animate" style="text-align:center;">404 Page not found!</h1>
              </div>
            </div>
          </div>
        </div>
      </section>

     
     
     
    


            	
	
	
	
	
	
	
	<section class="probootstrap-section">
        <div class="container">
	
	<div class="clearfix height40"></div>
	
	
	
	<div class="video">
	<div class="clearfix"></div>
	<div class="headerbg">
   
	 <div class="col-md-12" align="center"><h3 class="h3 black text-center">The requested page was not found</h3></div>
     
	 </div>
	
	</div>
	
	
	</div>
    </section>
    
   
    
<div class="clearfix height100"></div>
      
	  

      @include('footer')
</body>
</html>
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
            <div class="col-md-12" align="center">
              <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                <h1 class="probootstrap-heading probootstrap-animate">PAYMENT SUCCESS</h1>
              </div>
            </div>
          </div>
        </div>
      </section>
    

    
     
    

<section class="probootstrap-section">
        <div class="container">
        
        
        
        
        
        <div class="container text-center">
	<h2>Your payment has been successful.</h2>
    <h2>Your Payment ID - <?php echo $cid; ?>.</h2>
	</div>
        
        
        
           
           
           
           
          	
	
	
	
	
	</div>
    </section>
    
   
    

      
	  

      @include('footer')
</body>
</html>
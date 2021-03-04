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
                <h1 class="probootstrap-heading probootstrap-animate"><?php if(!empty($page[0]->page_title)){?><?php echo $page[0]->page_title;?><?php } ?></h1>
              </div>
            </div>
          </div>
        </div>
      </section>

    
     

    

	
    <?php if(!empty($page_cnt)){?>
	

	
		
		<section class="probootstrap-section">
        <div class="container">

                	

                    	<!-- details-image -->
                       <?php if(!empty($page[0]->photo)){?>
                       <div class="col-md-5">	 
                       
                        	<img src="<?php echo $url;?>/local/images/media/<?php echo $page[0]->photo;?>" alt="" class="img-responsive"/>
                       </div>
                       
                        <?php } ?>
                        <!-- details-image -->

                        <!-- content -->
                       
                         
                       <?php if(!empty($page[0]->photo)){?>
                        <div class="col-md-7">
                       <?php } else { ?> 
                        <div class="col-md-12">	
                        <?php } ?> 
                           

                            	

                            	<div><?php echo $page[0]->page_desc;?></div>

                                

                          

                        </div>

                        <!-- content -->

                        

                   

                </div>

            </div>
            
            </section>
	
	
	<?php } ?>
	
	
	
	
	
	
	
	
	
	
	

      <div class="height50 clearfix"></div>
	   

      @include('footer')
</body>
</html>
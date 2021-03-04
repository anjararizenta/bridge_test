<?php
use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   

     @include('admin.title')
    @include('admin.style')
    
    
    
    
  </head>

  <body>
    
    <!--Header-part-->
@include('admin.top')
<!--close-top-serch-->
<!--sidebar-menu-->
@include('admin.menu')
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb" style="min-width:180px;"> <a href="<?php echo $url;?>/admin"> <i class="icon-dashboard"></i>  My Dashboard </a> </li>
        <li class="bg_lg" style="min-width:180px;"> <a href="<?php echo $url;?>/admin/settings"> <i class="icon-key"></i> Settings</a> </li>
        <li class="bg_ly" style="min-width:180px;"> <a href="<?php echo $url;?>/admin/users"> <i class="icon-user"></i> Users </a> </li>
        <li class="bg_lo" style="min-width:180px;"> <a href="<?php echo $url;?>/admin/galleryimages"> <i class="icon-th"></i> Gallery</a> </li>
        <li class="bg_ls" style="min-width:180px;"> <a href="<?php echo $url;?>/admin/blog"> <i class="icon-edit"></i> Blog</a> </li>
        <li class="bg_lo" style="min-width:180px;"> <a href="<?php echo $url;?>/admin/campaigns"> <i class="icon-th-list"></i> Campaigns</a> </li>
        <li class="bg_ls" style="min-width:180px;"> <a href="<?php echo $url;?>/admin/pages"> <i class="icon-file"></i> Pages</a> </li>
        
        <li class="bg_lg" style="min-width:180px;"> <a href="<?php echo $url;?>/admin/donations"> <i class="icon-calendar"></i> Donations</a> </li>
        <li class="bg_lr" style="min-width:180px;"> <a href="<?php echo $url;?>/admin/withdrawals"> <i class="icon-money"></i> Withdrawals </a> </li>
        
        <li class="bg_lo" style="min-width:180px;"> <a href="<?php echo $url;?>/admin/testimonials"> <i class="icon-edit"></i> Testimonials </a> </li>
      </ul>
    </div>
<!--End-Action boxes-->    

<!--Chart-box-->    
    <div class="row-fluid">
      <div class="widget-box">
        
        <div class="widget-content" >
          <div class="row-fluid">
            <div class="span12">
            
                          <ul class="site-stats">
                <li class="bg_lh"><i class="icon-user"></i> <strong><?php echo $total_user;?></strong> <small>Total Users</small></li>
                
               
                
                <li class="bg_lh"><i class="icon-money"></i> <strong><?php echo $withdrawal_count;?></strong> <small>Withdrawals</small></li>
                
                
                
                <li class="bg_lh"><i class="icon-th-list"></i> <strong><?php echo $campaigns_count;?></strong> <small>Campaigns</small></li>
                
                
                <li class="bg_lh"><i class="icon-calendar"></i> <strong><?php echo $donation_count;?></strong> <small>Donations</small></li>
              </ul>

              
            </div>
            
          </div>
        </div>
      </div>
    </div>

    
  </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->


@include('admin.footer')

<!--end-Footer-part-->

	
  </body>
</html>

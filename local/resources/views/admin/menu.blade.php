<?php
use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");

/*$ncounts = DB::table('users')->get();
		foreach($ncounts as $well)
		{
			$we = $well->id;
			$ewe = $well->email;
			DB::update('update shop set user_id="'.$we.'" where seller_email = ?', [$ewe]);
		}*/
?>	


<div id="sidebar"><a href="<?php echo $url;?>/admin" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li><a href="<?php echo $url;?>/admin"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Settings</span> </a>
      <ul>
        
         <li><a href="<?php echo $url;?>/admin/settings">General Settings </a></li>
         <li><a href="<?php echo $url;?>/admin/payment-settings">Payment Settings </a></li>
         <li><a href="<?php echo $url;?>/admin/media-settings">Media Settings </a></li>
         
      </ul>
    </li>
    
    
    <li><a href="<?php echo $url;?>/admin/category"><i class="icon icon-th-list"></i>  <span> Category </span> </a></li> 
    
    <li><a href="<?php echo $url;?>/admin/pages"><i class="icon icon-file"></i>  <span> Pages </span> </a></li>
    
     <li><a href="<?php echo $url;?>/admin/users"><i class="icon icon-user"></i> <span>Users</span> </a></li>
     
     <li><a href="<?php echo $url;?>/admin/blog"><i class="icon icon-comment"></i> <span> Blog </span> </a></li>
     
     
                
               
     
     
                  
         <li><a href="<?php echo $url;?>/admin/galleryimages"><i class="icon icon-file"></i>  <span> Gallery </span> </a></li>  
         
         <li><a href="<?php echo $url;?>/admin/campaigns"><i class="icon icon-file"></i>  <span> Campaigns </span> </a></li> 
         
         <li><a href="<?php echo $url;?>/admin/donations"><i class="icon icon-file"></i>  <span> Donations </span> </a></li>     
                   
                   
                    
                    <li><a href="<?php echo $url;?>/admin/withdrawals"><i class="icon icon-file"></i> <span>Withdrawals </span></a></li>
                  
                   <?php /*?><li><a href="<?php echo $url;?>/admin/newsletter"><i class="icon icon-inbox"></i> <span>Newsletter </span></a></li><?php */?>
                   
                   <li><a href="<?php echo $url;?>/admin/testimonials"><i class="icon icon-file"></i> Testimonials </a></li>
                   
                  
				 
    
    <!--<li> <a href="charts.html"><i class="icon icon-signal"></i> <span>Charts &amp; graphs</span></a> </li>
    <li> <a href="widgets.html"><i class="icon icon-inbox"></i> <span>Widgets</span></a> </li>
    <li><a href="tables.html"><i class="icon icon-th"></i> <span>Tables</span></a></li>
    <li><a href="grid.html"><i class="icon icon-fullscreen"></i> <span>Full width</span></a></li>
    
    <li><a href="buttons.html"><i class="icon icon-tint"></i> <span>Buttons &amp; icons</span></a></li>
    <li><a href="interface.html"><i class="icon icon-pencil"></i> <span>Eelements</span></a></li>
    <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Addons</span> <span class="label label-important">5</span></a>
      <ul>
        <li><a href="index2.html">Dashboard2</a></li>
        <li><a href="gallery.html">Gallery</a></li>
        <li><a href="calendar.html">Calendar</a></li>
        <li><a href="invoice.html">Invoice</a></li>
        <li><a href="chat.html">Chat option</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-info-sign"></i> <span>Error</span> <span class="label label-important">4</span></a>
      <ul>
        <li><a href="error403.html">Error 403</a></li>
        <li><a href="error404.html">Error 404</a></li>
        <li><a href="error405.html">Error 405</a></li>
        <li><a href="error500.html">Error 500</a></li>
      </ul>
    </li>-->
    
    
  </ul>
</div>

<?php /*?><div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                <ul class="nav side-menu">
                  <li><a href="<?php echo $url;?>/admin"><i class="fa fa-laptop"></i> Dashboard </a></li>
				   
                   
                   <li><a><i class="fa fa-cog"></i> Settings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo $url;?>/admin/settings">General Settings </a></li>
                      <li><a href="<?php echo $url;?>/admin/media-settings">Media Settings </a></li>
                      
                    </ul>
                  </li>
                   
				  <li><a href="<?php echo $url;?>/admin/users"><i class="fa fa-user"></i> Users </a></li>
				  
                  
                  
                  <li><a href="<?php echo $url;?>/admin/portfolio"><i class="fa fa-picture-o"></i> Portfolio </a></li>
				  
				  <li><a href="<?php echo $url;?>/admin/blog"><i class="fa fa-comments"></i> Blog </a></li>
                  
                  <li><a href="<?php echo $url;?>/admin/pages"><i class="fa fa-sticky-note"></i> Pages </a></li>
                  
                 
                   
                   
                  
                   <li><a href="<?php echo $url;?>/admin/newsletter"><i class="fa fa-user"></i> Newsletter </a></li>
                  
				
                </ul>
              </div>

            </div>
			
			
			<?php */?>
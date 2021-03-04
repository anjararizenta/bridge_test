<?php
use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
if($currentPaths=="/")
 {
 $activemenu = "/";
 }
 else 
 {
  $activemenu = $currentPaths;
 }
 
 
 
if($activemenu == "/"){ $active_home = "active"; } else { $active_home =""; }
if($activemenu == "gallery") { $active_gallery = "active"; } else { $active_gallery = ""; }


if($activemenu == "blog" or $activemenu == "blog/{id}") { $active_blog = "active"; } else { $active_blog = ""; }
if($activemenu == "contact-us") { $active_contact = "active"; } else { $active_contact = ""; }

if($activemenu == "register"){ $active_register = "active"; } else { $active_register = ""; }
if($activemenu == "dashboard" or $activemenu == "my-comments"){ $active_dashboard = "active"; } else { $active_dashboard = ""; }


$pages = DB::table('pages')
		            
					
					->orderBy('page_title','asc')
					->get();
	$pages_cnt = DB::table('pages')
		            ->orderBy('page_title','asc')
					->count();
					
					
$category_count = DB::table('category')
		        ->where('delete_status', '=' , '')
				->where('status', '=' , 1)
				->orderBy('cat_name','asc')
				->take(5)
				->count();
	
	$category = DB::table('category')
		        ->where('delete_status', '=' , '')
				->where('status', '=' , 1)
				->orderBy('cat_name','asc')
				->take(5)
				->get();
?>

<?php if($setts[0]->site_loading_url!="" && $setts[0]->site_loading=='1'){?>	
<div class="avigher-loader"></div>
<?php } ?>	
 




<?php /* ?>
<nav class="avigher-nav" role="navigation">
		<div class="top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-right">
						<?php if(!empty($setts[0]->site_phone)){?><p class="num">Call: <?php echo $setts[0]->site_phone;?></p><?php } ?>
						<ul class="avigher-social">
							
                            
                            
                            
                            <?php if(!empty($setts[0]->site_facebook)){?><li><a href="<?php echo $setts[0]->site_facebook;?>" target="_blank"><i class="icon-facebook"></i></a></li><?php } ?>
          <?php if(!empty($setts[0]->site_twitter)){?><li><a href="<?php echo $setts[0]->site_twitter;?>" target="_blank"><i class="icon-twitter"></i></a></li><?php } ?>
         <?php if(!empty($setts[0]->site_gplus)){?> <li><a href="<?php echo $setts[0]->site_gplus;?>" target="_blank"><i class="icon-google"></i></a></li><?php } ?>
          <?php if(!empty($setts[0]->site_pinterest)){?><li><a href="<?php echo $setts[0]->site_pinterest;?>" target="_blank"><i class="icon-pinterest"></i></a></li><?php } ?>
          
          <?php if(!empty($setts[0]->site_instagram)){?><li><a href="<?php echo $setts[0]->site_instagram;?>" target="_blank"><i class="icon-instagram"></i></a></li><?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-2">
						<div id="avigher-logo">
                        
                        <?php if(!empty($setts[0]->site_logo)){?>
		  
		   <a class="" href="<?php echo $url;?>"><img src="<?php echo $url.'/local/images/media/'.$setts[0]->site_logo;?>" border="0" alt="<?php echo $setts[0]->site_name;?>" /></a>
		   <?php } else {?>
		   <a class="" href="<?php echo $url;?>"><?php echo $setts[0]->site_name;?></a>
		   <?php } ?>
                        
                    </div>
                        
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li class="<?php echo $active_home;?>"><a href="<?php echo $url;?>">Home</a></li>
                            
                            
                            <li class="has-dropdown">
								<a href="#">Pages <i class="icon-arrow-down"></i></a>
                                  <ul class="dropdown">
                            <?php if(!empty($pages_cnt)){?>
                                <?php foreach($pages as $page){
								if($page->page_id==4){ $pagerurl = $url.'/'.'contact-us'; }
								
								else { $pagerurl = $url.'/page/'.$page->post_slug; }
								?>
                                <li><a href="<?php echo $pagerurl; ?>"><?php echo $page->page_title;?></a></li>
                                <?php } } ?>
                                </ul>
                                
                                
                          </li>
                                
                                
                                
                            
							<li class="<?php echo $active_gallery;?>"><a href="<?php echo $url;?>/gallery">Gallery</a></li>
                            
                            
                            
							
							
							<li class="has-dropdown">
								<a href="<?php echo $url;?>/blog">Blog</a>
								
							</li>
                            
                            <li class="has-dropdown">
								<a href="<?php echo $url;?>/search/sellers">Sellers</a>
								
							</li>
                            
                            
                            <?php if(Auth::guest()) { ?>
                            <li><a href="<?php echo $url;?>/login">Login</a></li>
                            <li><a href="<?php echo $url;?>/register">Register</a></li>
							<?php } else { ?>
                            <li class="has-dropdown">
								<a href="#"><?php echo Auth::user()->name;?> <i class="icon-arrow-down"></i></a>
								<ul class="dropdown">
									
                                    <li><a href="<?php echo $url;?>/dashboard">Dashboard</a></li>
                                    <?php
							
						$shope_count = DB::table('shop')
									 ->where('status','=',1)
									->where('user_id','=',Auth::user()->id)
									 ->count();	
									 if(!empty($shope_count))
									 {
									 $shope = DB::table('shop')
							 ->where('status','=',1)
							 ->where('user_id','=',Auth::user()->id)
							 ->get();
									?>
                                     <li><a href="<?php echo $url;?>/seller/<?php echo $shope[0]->shop_id;?>/<?php echo Auth::user()->post_slug;?>">My Profile</a></li>
                                    
                                    <?php } ?>
									<?php if(Auth::user()->admin==2){?>
                                    <li><a href="<?php echo $url;?>/myshop">My Shop</a></li>
									<li><a href="<?php echo $url;?>/myservices">My Services</a></li>
                                    <li><a href="<?php echo $url;?>/my_orders">My Orders</a></li>
                                    <li><a href="<?php echo $url;?>/my-shopping">My Shopping</a></li>
                                    <li><a href="<?php echo $url;?>/my-balance">My Balance</a></li>
                                    <?php } ?>
									<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout</a></li>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
								</ul>
							</li>
                            <?php } ?>
                            
                            
                            
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>
<?php */?>



<nav class="navbar navbar-default probootstrap-navbar">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
           
             <?php if(!empty($setts[0]->site_logo)){?>
		  
		   <a class="navbar-brand" href="<?php echo $url;?>"><img src="<?php echo $url.'/local/images/media/'.$setts[0]->site_logo;?>" border="0" alt="<?php echo $setts[0]->site_name;?>" /></a>
		   <?php } else {?>
		   <a class="navbar-brand" href="<?php echo $url;?>"><?php echo $setts[0]->site_name;?></a>
		   <?php } ?>
            
          </div>

          <div id="navbar-collapse" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="<?php echo $active_home;?>"><a href="<?php echo $url;?>">Home</a></li>
              
              <li class="dropdown">
								<a href="javascript:void(0)" data-toggle="dropdown" class="dropdown-toggle">Pages</a>
                                  <ul class="dropdown-menu">
                            <?php if(!empty($pages_cnt)){?>
                                <?php foreach($pages as $page){
								if($page->page_id==4){ $pagerurl = $url.'/'.'contact-us'; }
								
								else { $pagerurl = $url.'/page/'.$page->post_slug; }
								?>
                                <li><a href="<?php echo $pagerurl; ?>"><?php echo $page->page_title;?></a></li>
                                <?php } } ?>
                                <li><a href="<?php echo $url;?>/gallery">Gallery</a></li>
                                </ul>
                                
                                
                          </li>
              
              <li><a href="<?php echo $url;?>/blog">Blog</a></li>
              <li><a href="<?php echo $url;?>/all-campaigns">Campaigns</a></li>
              
              <li class="dropdown">
                <a href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle">Categories</a>
                <ul class="dropdown-menu">
                <?php if(!empty($category_count)){?>
                <?php foreach($category as $get){
				
				$count_campaign = DB::table('campaigns')
		               ->where('camp_status', '!=', 0)
					   ->where('delete_status', '=', "")
					   ->where('camp_category', '=', $get->id)
		               ->count();
				?>
                <li><a href="<?php echo $url;?>/category/<?php echo $get->id;?>/<?php echo $get->post_slug;?>"><?php echo $get->cat_name;?> [<?php echo $count_campaign;?>]</a></li>
                <?php } ?>
                <?php } ?>
                <li><a href="<?php echo $url;?>/categories">View All</a></li>
                </ul>
              </li>  
                
              
              
              
              
              
              
              
              
              <li class="dropdown">
                <a href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle">My Account</a>
                <ul class="dropdown-menu">
                <?php if(Auth::guest()) { ?>
                <li><a href="<?php echo $url;?>/login">Login</a></li>
                <li><a href="<?php echo $url;?>/register">Register</a></li>
				<?php } else { ?>
                  <li><a href="<?php echo $url;?>/dashboard">Account Settings</a></li>
                  
                  <?php if(Auth::user()->admin!=1){?>
                  <li><a href="<?php echo $url;?>/my-comments">My Comments</a></li>
                  <li><a href="<?php echo $url;?>/campaigns">My Campaigns</a></li>
                  <li><a href="<?php echo $url;?>/donations">My Donations</a></li>
                  <li><a href="<?php echo $url;?>/withdrawal-settings">Withdrawal Settings</a></li>
                  <?php } ?>
                  <li><a href="<?php echo $url;?>/logout">Log Out</a></li>
                  <?php } ?>
                </ul>
              </li>
              <li><a href="#search"><i class="icon-search"></i></a></li>
              <?php if(Auth::guest()) { ?>
              <li class="probootstra-cta-button last"><a href="<?php echo $url;?>/login" class="btn btn-primary">Create Campaign</a></li>
              <?php } else { ?>
              
               <?php if(Auth::user()->admin!=1){?>
              <li class="probootstra-cta-button last"><a href="<?php echo $url;?>/create-campaign" class="btn btn-primary">Create Campaign</a></li>
              <?php } } ?>
            </ul>
          </div>
        </div>
      </nav>
      


<div id="search">
  <button type="button" class="close">X</button>
  <form class="probootstrap-form" role="form" method="POST" action="{{ route('search_campaign') }}"  enctype="multipart/form-data">
          {{ csrf_field() }}
    <input type="text" value="" name="search_txt" placeholder="SEARCH KEYWORD(s)" autocomplete="off" />
    <input type="submit" class="btn btn-primary btn-lg" value="Search">
  </form>
</div>

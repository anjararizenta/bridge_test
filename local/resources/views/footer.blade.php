<?php 
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
$ncurrentPath= Route::getFacadeRoot()->current()->uri();
$url = URL::to("/");
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
$users = DB::select('select * from users where id = ?',[$setid]);	


$aid=1;
		$admindetails = DB::table('users')
		 ->where('id', '=', $aid)
		 ->first();
		
		$admin_email = $admindetails->email;							
?>


 <?php if(session()->has('message')){?>
    <script type="text/javascript">
        alert("<?php echo session()->get('message');?>");
		</script>
    </div>
	 <?php } ?>
     
<?php 

$pages = DB::table('pages')
		            
					
					->orderBy('page_title','asc')
					->get();
	$pages_cnt = DB::table('pages')
		            ->orderBy('page_title','asc')
					->count();

?>

<?php /* ?>
<footer id="avigher-footer" class="avigher-bg" style="background-image: url(<?php echo $url;?>/local/resources/views/template/images/img_bg_1.jpg);" role="contentinfo">
		<div class="overlay"></div>
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-4 avigher-widget">
					
      <h3>Contact Us</h3>
        <div class="link"><i class="icon-map"></i> <?php echo $setts[0]->site_address;?></div>
        <div class="link"><i class="icon-phone"></i> <?php echo $setts[0]->site_phone;?></div>
        <div class="link"><i class="icon-message"></i> <?php echo $setts[0]->site_email;?></div>
				</div>
				<div class="col-md-8">
					
					<div class="col-md-4 col-sm-4 col-xs-6">
                    <h3>Pages</h3>
						<ul class="avigher-footer-links">
							<?php if(!empty($pages_cnt)){?>
                                <?php foreach($pages as $page){
								if($page->page_id==4){ $pagerurl = $url.'/'.'contact-us'; }
								
								else { $pagerurl = $url.'/page/'.$page->post_slug; }
								?>
                                <li><a href="<?php echo $pagerurl; ?>"><?php echo $page->page_title;?></a></li>
                                <?php } } ?>
                                
                                
						</ul>
					</div>

					<div class="col-md-4 col-sm-4 col-xs-6">
						<ul class="avigher-footer-links">
							<li><a href="<?php echo $url;?>/gallery">Gallery</a></li>
                            
                            
                            
							
							
							<li>
								<a href="<?php echo $url;?>/blog">Blog</a>
								
							</li>
                            
                            <li>
								<a href="<?php echo $url;?>/search/sellers">Sellers</a>
								
							</li>
                            
                            
                            <li>
								<a href="<?php echo $url;?>/dashboard">My dashboard</a>
								
							</li>
                            
						</ul>
					</div>

					<div class="col-md-4 col-sm-4 col-xs-6">
						<ul class="avigher-footer-links">
							<li>
								<a href="<?php echo $url;?>/myshop">My shop</a>
								
							</li>
                            <li>
								<a href="<?php echo $url;?>/myservices">My services</a>
								
							</li>
                             <li>
								<a href="<?php echo $url;?>/my_orders">My Orders</a>
								
							</li>
                            <li>
								<a href="<?php echo $url;?>/my-shopping">My Shopping</a>
								
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="white"><?php echo $setts[0]->site_copyright;?></small> 
						
					</p>
					<p>
						<ul class="avigher-social-icons">
							
                            <?php if(!empty($setts[0]->site_facebook)){?><li><a href="<?php echo $setts[0]->site_facebook;?>" target="_blank"><i class="icon-facebook"></i></a></li><?php } ?>
          <?php if(!empty($setts[0]->site_twitter)){?><li><a href="<?php echo $setts[0]->site_twitter;?>" target="_blank"><i class="icon-twitter"></i></a></li><?php } ?>
         <?php if(!empty($setts[0]->site_gplus)){?> <li><a href="<?php echo $setts[0]->site_gplus;?>" target="_blank"><i class="icon-google"></i></a></li><?php } ?>
          <?php if(!empty($setts[0]->site_pinterest)){?><li><a href="<?php echo $setts[0]->site_pinterest;?>" target="_blank"><i class="icon-pinterest"></i></a></li><?php } ?>
          
          <?php if(!empty($setts[0]->site_instagram)){?><li><a href="<?php echo $setts[0]->site_instagram;?>" target="_blank"><i class="icon-instagram"></i></a></li><?php } ?>
                            
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

<?php */?>


<footer class="probootstrap-footer probootstrap-bg">
        <div class="container">
          <div class="row">
            
            
           
            
           
            <div class="col-md-4 probootstrap-animate">
              <div class="probootstrap-footer-widget">
                <h3>Contact Info</h3>
                <ul class="probootstrap-contact-info">
                  <?php if(!empty($setts[0]->site_address)){?><li><i class="icon-location2"></i> <span><?php echo $setts[0]->site_address;?></span></li><?php } ?>
                  <?php if(!empty($setts[0]->site_email)){?><li><i class="icon-mail"></i><span><?php echo $setts[0]->site_email;?></span></li><?php } ?>
                 <?php if(!empty($setts[0]->site_phone)){?> <li><i class="icon-phone2"></i><span><?php echo $setts[0]->site_phone;?></span></li><?php } ?>
                </ul>
                
              </div>
            </div>

            <div class="col-md-2 probootstrap-animate">
              <div class="probootstrap-footer-widget">
              
                <h3>Pages</h3>
                <ul>
				<?php if(!empty($pages_cnt)){?>
                                <?php foreach($pages as $page){
								if($page->page_id==4){ $pagerurl = $url.'/'.'contact-us'; }
								
								else { $pagerurl = $url.'/page/'.$page->post_slug; }
								?>
                                <li><a href="<?php echo $pagerurl; ?>"><?php echo $page->page_title;?></a></li>
                                <?php } } ?>
              </ul>
              </div>
            </div>
            
            
            
            
            <div class="col-md-3 probootstrap-animate">
              <div class="probootstrap-footer-widget">
              
                <h3>Quick Links</h3>
                <ul>
				
                   
                  <li><a href="<?php echo $url;?>/categories">Categories</a></li>
                  <li><a href="<?php echo $url;?>/all-campaigns">Campaigns</a></li>  
                  <li><a href="<?php echo $url;?>/blog">Blog</a></li>
                  <li><a href="<?php echo $url;?>/gallery">Gallery</a></li>              
              </ul>
              </div>
            </div>
            
            
            
            
            
            <div class="col-md-3 probootstrap-animate">
              <div class="probootstrap-footer-widget">
                <h3>Follow Us</h3>
               
                <ul class="probootstrap-footer-social">
                   <?php if(!empty($setts[0]->site_facebook)){?><li><a href="<?php echo $setts[0]->site_facebook;?>" target="_blank"><i class="icon-facebook"></i></a></li><?php } ?>
          <?php if(!empty($setts[0]->site_twitter)){?><li><a href="<?php echo $setts[0]->site_twitter;?>" target="_blank"><i class="icon-twitter"></i></a></li><?php } ?>
         <?php if(!empty($setts[0]->site_gplus)){?> <li><a href="<?php echo $setts[0]->site_gplus;?>" target="_blank"><i class="icon-google"></i></a></li><?php } ?>
          <?php if(!empty($setts[0]->site_pinterest)){?><li><a href="<?php echo $setts[0]->site_pinterest;?>" target="_blank"><i class="icon-pinterest"></i></a></li><?php } ?>
          
          <?php if(!empty($setts[0]->site_instagram)){?><li><a href="<?php echo $setts[0]->site_instagram;?>" target="_blank"><i class="icon-instagram"></i></a></li><?php } ?>
                </ul>
              </div>
            </div>
           
          </div>
          <!-- END row -->
          
        </div>

        <div class="probootstrap-copyright">
          <div class="container">
            <div class="row">
              <div class="col-md-8 text-left">
                <p><?php echo $setts[0]->site_copyright;?></p>
              </div>
              <div class="col-md-4 probootstrap-back-to-top">
                <p><a href="#" class="js-backtotop">Back to top <i class="icon-arrow-long-up"></i></a></p>
              </div>
            </div>
          </div>
        </div>
      </footer>

    <script src="<?php echo $url;?>/local/resources/views/theme/js/scripts.min.js"></script>
    <script src="<?php echo $url;?>/local/resources/views/theme/js/main.min.js"></script>
    <script src="<?php echo $url;?>/local/resources/views/theme/js/custom.js"></script>
    
    
    <?php /* SHARE */ ?>
    
    <script type="text/javascript" src="<?php echo $url;?>/local/resources/views/theme/share/js/avigher-technologies.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($){
            $('#share1').sharegg();

           });
    </script>
    
     <?php /* SHARE */ ?>
    
    
    
<script src="<?php echo $url;?>/local/resources/views/theme/js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
	</script>
	<script src="<?php echo $url;?>/local/resources/views/theme/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
	</script>
	<script>
		jQuery(document).ready(function(){
			
			jQuery("#formID").validationEngine('attach', { promptPosition: "topLeft" });
			
		});
		
		
		
		
		function withdraw_checking(str)
    {	

        document.getElementById("localbank").style.display="none";
		document.getElementById("paypal").style.display="none";
		document.getElementById("stripe").style.display="none";
		
	if(str=="paypal")
	{	
		document.getElementById("localbank").style.display="none";
		document.getElementById("paypal").style.display="block";
		document.getElementById("stripe").style.display="none";
		
	}
	else if(str=="localbank")
	{
		document.getElementById("paypal").style.display="none";
		document.getElementById("localbank").style.display="block";
		document.getElementById("stripe").style.display="none";
		
	}
	else if(str=="stripe")
	{
		document.getElementById("paypal").style.display="none";
		document.getElementById("localbank").style.display="none";
		document.getElementById("stripe").style.display="block";
		
	}
	
	
}
		
    </script>
    
    
    
    
   

<script type="text/javascript" src="<?php echo $url;?>/local/resources/views/theme/js/jquery.simplePagination.min.js"></script>
            <script type="text/javascript">
		$(function(){
			var perPage = <?php echo $setts[0]->site_post_per;?>;
			var opened = 1;
			var onClass = 'on';
			var paginationSelector = '.pagess';
			$('.bloglist').simplePagination(perPage, opened, onClass, paginationSelector);
		});
		
		
		
		$(function(){
			var perPage = <?php echo $setts[0]->site_gallery_per;?>;
			var opened = 1;
			var onClass = 'on';
			var paginationSelector = '.gpage';
			$('.gallerylist').simplePagination(perPage, opened, onClass, paginationSelector);
		});
		
		
		$(function(){
			var perPage = <?php echo $setts[0]->site_campaigns_per;?>;
			var opened = 1;
			var onClass = 'on';
			var paginationSelector = '.campage';
			$('.camplist').simplePagination(perPage, opened, onClass, paginationSelector);
		});
		
		
		
		
		$(function(){
			var perPage = <?php echo $setts[0]->site_category_per;?>;
			var opened = 1;
			var onClass = 'on';
			var paginationSelector = '.gorypage';
			$('.categorylist').simplePagination(perPage, opened, onClass, paginationSelector);
		});
		
		
		
	$(".owl-carousel").owlCarousel({
     items : 1,
     loop  : true,
     margin : 30,
     nav    : true,
     smartSpeed :500,
	 navSpeed: 350,
	 autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:true,
	 
		lazyLoad:true,
		dots: false,
		responsive : {
            480 : { items : 1  }, // from zero to 480 screen width 4 items
            768 : { items : 2  }, // from 480 screen widthto 768 6 items
            1024 : { items : 3   // from 768 screen width to 1024 8 items
            }
        },
	 
     navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"]
   });
   
   
   
   /*$(document).ready(function()
{
    var navItems = $('.admin-menu li > a');
    var navListItems = $('.admin-menu li');
    var allWells = $('.admin-content');
    var allWellsExceptFirst = $('.admin-content:not(:first)');
    
    allWellsExceptFirst.hide();
    navItems.click(function(e)
    {
        e.preventDefault();
        navListItems.removeClass('active');
        $(this).closest('li').addClass('active');
        
        allWells.hide();
        var target = $(this).attr('data-target-id');
        $('#' + target).show();
    });
});*/




$(function() {
    
    $('#withdraw_payment_type').change(function(){
        if($('#withdraw_payment_type').val() == 'paypal') 
		{
            $('#withdraw_paypal_id').show(); 
			$('#withdraw_stripe_id').hide(); 
        }
		else if($('#withdraw_payment_type').val() == 'stripe') 
		{
            $('#withdraw_stripe_id').show(); 
			$('#withdraw_paypal_id').hide(); 
        }  
		else 
		{
            $('#withdraw_paypal_id').hide();
			$('#withdraw_stripe_id').hide(); 
        } 
    });
});		
		
</script>
    
    
    
    
   
	
	<!-- Main -->
	<script src="<?php echo $url;?>/local/resources/views/theme/new_main.js"></script>
    
    
    
    
    <?php /* editor */?>
    
    <script type="text/javascript" src="<?php echo $url;?>/local/resources/views/theme/editor/cazary.min.js"></script>
		<script type="text/javascript">
		(function($, window)
		{
			$(function($)
			{
				// that's it!
				$("textarea#id_cazary").cazary();

				// customized editor
				$("textarea#id_cazary_minimal").cazary({
					commands: "MINIMAL"
				});
				$("textarea#id_cazary_full").cazary({
					commands: "FULL"
				});
			});
		})(jQuery, window);
		
		
		
		$(function() {
  $('a[href="#search"]').on("click", function(event) {
    event.preventDefault();
    $("#search").addClass("open");
    $('#search > form > input[type="text"]').focus();
  });

  $("#search, #search button.close").on("click keyup", function(event) {
    if (
      event.target == this ||
      event.target.className == "close" ||
      event.keyCode == 27
    ) {
      $(this).removeClass("open");
    }
  });

  
});

		</script>
<?php /* editor */?>
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
<html lang="en">
<head>
   
   <meta charset="utf-8" />
		

   @include('style')
   


<?php if(!empty($post_count)){?>
<meta property="og:type" content="article">
<meta property="og:title" content="<?php echo $post[0]->post_title;?>">
<meta property="og:description" content="<?php echo substr($post[0]->post_desc,0,280).'...';?>">
<meta property="og:url" content="<?php echo $url;?>/blog/<?php echo $post[0]->post_slug;?>">
<meta property="og:site_name" content="<?php echo $setts[0]->site_name;?>">
<?php if(!empty($post[0]->post_image)){ ?>
<meta property="og:image" content="<?php echo $url.'/local/images/media/'.$post[0]->post_image;?>">
<?php } else { ?>
<meta property="og:image" content="<?php echo $url;?>/local/images/noimage.jpg">
<?php } ?>
<meta property="og:image:width" content="400">
<meta property="og:image:height" content="300">
<?php } ?>

</head>
<body>

    

    <!-- fixed navigation bar -->
    @include('header')

    
     
     
      <section class="probootstrap-hero probootstrap-hero-inner jumbotron-cover" style="background-image: url(<?php echo $url;?>/local/resources/views/theme/img/header_new.jpg); background-position:center;"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
              
                <h1 class="probootstrap-heading probootstrap-animate"><?php if(!empty($blog_count)){?>Blog<?php } ?><?php if(!empty($post_count)){?>Blog<span><?php echo $post[0]->post_title; ?></span><?php } ?></h1>
                
               
               
              </div>
            </div>
          </div>
        </div>
      </section>
      
      
      
       <?php if(!empty($blog_count)){?>
      <section class="probootstrap-section">
        <div class="container">
          
          <div class="bloglist">
          <?php 
		  $q=0;
		  foreach($blogs as $blog){
						$date = $blog->post_date;
						
						$old_date = strtotime($date);
						$dateonly = date('j M Y', $old_date);
						
						if($q%2 == 0)
						{
						   $txt_img = "col-md-push-6";
						   $texter = "col-md-pull-6";
						}
						else
						{
						  $txt_img = "";
						  $texter = "col-md-push-1";
						}
						?>
          
          <div class="row mb40">
            <div class="col-md-6 <?php echo $txt_img;?> probootstrap-animate">
              
              <?php if($blog->post_media_type=="image"){ ?>
                   <p>         
    				<?php if(!empty($blog->post_image)){ ?>
          			<a href="<?php echo $url;?>/blog/<?php echo $blog->post_slug;?>" title="<?php echo $blog->post_title;?>"><img src="<?php echo $url.'/local/images/media/'.$blog->post_image;?>" class="img-responsive" alt="<?php echo $blog->post_title;?>"></a>
        			<?php } else {?>
       				<a href="<?php echo $url;?>/blog/<?php echo $blog->post_slug;?>" title="<?php echo $blog->post_title;?>"><img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive" alt="<?php echo $blog->post_title;?>"></a>
        			<?php } ?>
                    </p>
                    <?php } ?>
              
              
              
              <?php if($blog->post_media_type=="mp3"){ ?>
              
                        
                    
                     <div class="audioplayer">
                     <div align="center">
                     <audio preload="auto" controls>
					<source src="<?php echo $url;?>/local/images/media/<?php echo $blog->post_audio;?>">
		            </audio>
    				
					</div>
                    </div>
                    
                  
                   
                    <?php } ?>
                    
                    
                    
                    <?php 
					if($blog->post_media_type=="video"){
					if (strpos($blog->post_video, 'youtube') > 0) {
					 $vurl = $blog->post_video;
						preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $vurl, $matches);
						$id = $matches[1];
						
						$height = '420px';
					?>
                    <div>
                    <iframe id="ytplayer" type="text/html" width="100%" height="<?php echo $height ?>" src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <?php } 
					if (strpos($blog->post_video, 'vimeo') > 0) {
					$vimeo = $blog->post_video;
					?>
                    <div class='embed-container'>
                    <iframe src="https://player.vimeo.com/video/<?php echo (int) substr(parse_url($vimeo, PHP_URL_PATH), 1);?>" frameborder="0"  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
					<?php }
					} ?>
                    
                    
                    
                    <?php
					$post_comment = DB::table('post')
							 ->where('post_parent', '=', $blog->post_id)
							 ->where('post_comment_type', '=', 'blog')
							 ->where('post_type', '=', 'comment')
							 ->where('post_status', '=', '1')
							 ->count();
					?>
              <?php
			$old_dates = strtotime($blog->post_date);
			$new_dates = date('d F Y', $old_dates);
			?>
              
            </div>
            <div class="col-md-5 <?php echo $texter;?> news-entry probootstrap-animate">
              <h2 class="mb0"><a href="<?php echo $url;?>/blog/<?php echo $blog->post_slug;?>" title="<?php echo $blog->post_title;?>"><?php echo $blog->post_title;?></a></h2>
              <span class="probootstrap-news-date theme_color"><i class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo $new_dates;?></span>
              <span class="clearfix height10"></span>
              <p class="black"><?php echo substr($blog->post_desc,0,300).'...';?></p>
              <p><span class="probootstrap-meta-share"><a href="<?php echo $url;?>/blog/<?php echo $blog->post_slug;?>"><i class="icon-bubbles2"></i> <?php echo $post_comment;?></a></span> <a href="<?php echo $url;?>/blog/<?php echo $blog->post_slug;?>" class="btn btn-black">Read More...</a></p>
            </div>
          </div>

          

          <?php $q++; } ?>
             </div>
             <div class="pagess"></div>

        </div>
      </section>

      
     <?php } ?>
     
     
     
     
     
   
    <section class="probootstrap-section">
        
		
		
            	<div class="container">

                	
                    
                    <section class="col-md-4 paddingoff">
                     <?php if(!empty($post_count)){?>
                    <div class="borderbottom">
                    <h3>
                    Popular Post
                    </h3>
                </div>
                     <div class="height20"></div>
                    
                    <?php foreach($popular_blog as $popular){
	
	?>
    
    <div>
   
        <div class="col-md-4 paddingoff">
         
        <?php if($popular->post_media_type=="image"){ ?>
    				<?php if(!empty($popular->post_image)){ ?>
          			<a href="<?php echo $url;?>/blog/<?php echo $popular->post_slug;?>" title="<?php echo $popular->post_title;?>"><img src="<?php echo $url.'/local/images/media/'.$popular->post_image;?>" class="img-responsive blogpost"></a>
        			<?php } else {?>
       				<a href="<?php echo $url;?>/blog/<?php echo $popular->post_slug;?>" title="<?php echo $popular->post_title;?>"><img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive blogpost"></a>
        			<?php } ?>
                    <?php } ?>
                    
                    <?php if($popular->post_media_type=="mp3"){ ?>
                    <a href="<?php echo $url;?>/blog/<?php echo $popular->post_slug;?>" title="<?php echo $popular->post_title;?>"><img src="<?php echo $url;?>/local/images/blogaudio.png" class="img-responsive blogpost"></a>
                   
                    <?php } ?>
                    <?php if($popular->post_media_type=="video"){?>
                    <a href="<?php echo $url;?>/blog/<?php echo $popular->post_slug;?>" title="<?php echo $popular->post_title;?>"><img src="<?php echo $url;?>/local/images/blogvideo.png" class="img-responsive blogpost"></a>
                    <?php } ?>
                    
        </div>
        <div class="col-md-8">
        <div class="black para heading ellipsis"><a href="<?php echo $url;?>/blog/<?php echo $popular->post_slug;?>" title="<?php echo $popular->post_title;?>" class="black decorationoff hoveroff"><?php echo $popular->post_title;?></a></div>
        <div class="ash fontsize12"><?php echo date("d M Y h:i:s a",strtotime($popular->post_date));?></div>
        </div>
    
    
    
    
    
    
    
    <div class="clearfix height20"></div>
    <?php } ?>
    
    <?php 
					
					if(!empty($setts[0]->site_blog_ads)){?>
                    <div class="animate-box">
                    <div class="clearfix height20"></div>
                    <?php echo html_entity_decode($setts[0]->site_blog_ads);?>
                    </div>
                    <?php } ?>
    </div>
	<?php } ?>
                    
                    
                    </section>
                    
                    
                    <section class="col-md-8">
                    <?php if(!empty($post_count)){
	
					$date = $post[0]->post_date;
					
					$old_date = strtotime($date);
					$dateonly = date('d F Y', $old_date);
					
					?>
                    
                    
                    <?php if($post[0]->post_media_type=="image"){ ?>
                    <div class="text-center">
                    
    				<?php if(!empty($post[0]->post_image)){ ?>
          			<img src="<?php echo $url.'/local/images/media/'.$post[0]->post_image;?>" class="img-responsive" title="<?php echo $post[0]->post_title;?>">
        			<?php } else {?>
       				<img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive" title="<?php echo $post[0]->post_title;?>">
        			<?php } ?>
                     </div>
                    <?php } ?>
                   
                    
                    <?php if($post[0]->post_media_type=="mp3"){ ?>
                    
                    
                    <div class="audioplayer">
                     <div align="center">
                     <audio preload="auto" controls>
					<source src="<?php echo $url;?>/local/images/media/<?php echo $post[0]->post_audio;?>">
		            </audio>
    				
					</div>
                    </div>
                    <div class="height20"></div>
                    <?php } ?>
                    
                    
                    <?php 
					if($post[0]->post_media_type=="video"){?>
                    <div>
                    <?php
					if (strpos($post[0]->post_video, 'youtube') > 0) {
					 $vurl = $post[0]->post_video;
						preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $vurl, $matches);
						$id = $matches[1];
						
						$height = '420px';
					?>
                    <iframe id="ytplayer" type="text/html" width="100%" height="<?php echo $height ?>" src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>
                    
                    <?php } 
					if (strpos($post[0]->post_video, 'vimeo') > 0) {
					$vimeo = $post[0]->post_video;
					?>
                    <iframe src="https://player.vimeo.com/video/<?php echo (int) substr(parse_url($vimeo, PHP_URL_PATH), 1);?>" width="100%" height="420" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					<?php }?>
                    </div>
					<?php } ?>
                    
                    
                    
                    
                    <div class="blogbody">
                   
                    <div class="h3 black"><?php echo $post[0]->post_title;?></div>
                    
                    <span class="theme_color"><i class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo $dateonly;?></span>
                    <div class="clearfix height10"></div>
                    <div class="cpara black"><?php echo $post[0]->post_desc;?></div>
                    <div class="clearfix height40"></div>
                    
                    
                    <?php /********* SOCIAL BUTTON *******/?>
                    

<?php 
						if($post[0]->post_media_type=="image")
						{ 
						?>            
						<?php 
						if(!empty($post[0]->post_image))
						{ 
						$share_img = $url.'/local/images/media/'.$post[0]->post_image;
						}
						else
						{
						 $share_img = $url.'/local/images/noimage.jpg';
						}
						}
						else if($post[0]->post_media_type=="video")
						{
						 $share_img = $url.'/local/images/blogvideo.png';
						}
						else if($post[0]->post_media_type=="mp3")
						{
						 $share_img = $url.'/local/images/blogaudio.png';
						}
						else
						{
						  $share_img = $url.'/local/images/noimage.jpg';
						}
						
						?>

<div id="share1"
         data-url="<?php echo $url;?>/blog/<?php echo $post[0]->post_slug;?>"
         data-title="<?php echo $post[0]->post_title;?>"
         data-description="<?php echo $post[0]->post_desc;?>"
         data-image="<?php echo $share_img;?>"></div>
                    
                    
                <div class="clearfix height40"></div>     
                    <div class="text-left">
                    <span class="bold black"><i class="fa fa-tags" aria-hidden="true"></i> Tags :</span>
                    
                    <span>
                    <?php 
					$post_tags = explode(',',$post[0]->post_tags);
					
					foreach($post_tags as $tags)
                    {
					$tag =strtolower(str_replace(" ","-",$tags)); 
					$ftag = $tag.',';
					$rtag = rtrim($ftag,",");
					if(!empty($tags))
					{
					?>
                    <a href="<?php echo $url;?>/tag/blog/<?php echo $tag;?>" class="white colorbg"><?php echo $ftag;?></a>
                    <?php
					}
					}
					?>
                    </span>
                    
                    </div>
                    
                    
                    
                   <div class="clearfix height50"></div>
       
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingoff">
          <?php if(!empty($previous)){
		
		?>
         <div class="fleft"><a href="<?php echo $url;?>/blog/<?php echo $previous_link[0]->post_slug;?>" class="btn btn-primary"> <?php echo 'previous';?></a></div>
         <?php } ?>
         
         
         
         <?php if(!empty($next)){
		
		 ?>
         <div class="fright"><a href="<?php echo $url;?>/blog/<?php echo $next_link[0]->post_slug;?>" class="btn btn-primary"><?php echo 'next';?> </a></div>
          <?php } ?>
         </div>
         
         
        
        
          <div class="clearfix height50"></div>
          
          
          <div class="col-md-12 paddingoff">
        <div class="h3 black">Leave a Reply</div>
        <div class="clear height20"></div>
        <?php if(Auth::check()) { ?>
        <div>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('blog') }}" id="formID" enctype="multipart/form-data">
                        {{ csrf_field() }}
	
	<div class="paddingoff">
    
	
          <div class="col-lg-12 col-md-12 col-sm-12 paddingoff">
            <label class="ash">Name<span class="star">*</span></label>
            <input type="text" value=""  class="form-control validate[required] text-input radiusoff" id="name" name="name" >
          </div>
         <div class="clearfix height10"></div>
          <div class="col-lg-12 col-md-12 col-sm-12 paddingoff">
            <label class="ash">Email<span class="star">*</span> </label>
            <input type="text" value="<?php echo Auth::user()->email;?>"  class="form-control validate[required,custom[email]] text-input radiusoff" id="email" name="email" readonly>
          </div>
		  
          <div class="clearfix height10"></div>
          <div class="col-lg-12 col-md-12 col-sm-12 paddingoff">
            <label class="ash">Message<span class="star">*</span> </label>
            <textarea value=""   class="form-control validate[required] text-input radiusoff height150" id="msg" name="msg"></textarea>
          </div>
          
          <input type="hidden" name="post_comment_type" value="blog">
          
           <input type="hidden" name="post_type" value="comment">
           
           <input type="hidden" name="post_user_id" value="<?php echo Auth::user()->id;?>">
           
          
          <input type="hidden" name="post_parent" value="<?php echo $post[0]->post_id;?>">
          
		  <div class="clearfix height20"></div>
          <div class="col-lg-6 paddingoff">
            <input type="submit" class="btn btn-primary custombtn" value="Send">
          </div>
		  <div class="clearfix height50"></div>
		 </div> 
        </form>
        </div>
        
		
		
        
        <?php } else {?>
        <div class="para black">You must be <a href="<?php echo $url;?>/login" class="gold bold">logged</a> in to post a comment.</div>
        
        <?php } ?>
        
        
        
        <?php
		$pcomment = DB::table('post')
							 ->where('post_parent', '=', $post[0]->post_id)
							 ->where('post_comment_type', '=', 'blog')
							 ->where('post_type', '=', 'comment')
							 ->where('post_status', '=', '1')
							 ->orderBy('post_id', 'DESC')
							 ->get();
							 $pcnt = DB::table('post')
							 ->where('post_parent', '=', $post[0]->post_id)
							 ->where('post_comment_type', '=', 'blog')
							 ->where('post_type', '=', 'comment')
							 ->where('post_status', '=', '1')
							 ->count();
							 
			if(!empty($pcnt)){				 ?>
        <div class="clearfix height20"></div>
         <div class="h3 black">View Comments</div>
         <div class="clearfix height30"></div>
         
         <?php 
		 
							 foreach($pcomment as $viwcomment){
							 $user = DB::table('users')
							         ->where('id', '=', $viwcomment->post_user_id)
									 ->get();
		?>					 
         <div class="col-lg-2 col-md-2 col-sm-2">
         <?php 
					   $userphoto="/media/";
						$path ='/local/images'.$userphoto.$user[0]->photo;
						if($user[0]->photo!=""){
						?>
						 <img src="<?php echo $url.$path;?>" class="thumb round" width="70" style="padding:0px !important;">
						 <?php } else { ?>
						  <img src="<?php echo $url.'/local/images/nophoto.jpg';?>" class="thumb round" width="70" style="padding:0px !important;">
						 <?php } ?>
         </div>
         <div class="col-lg-10 col-md-10 col-sm-10 paddingoff">
         <div class="h4 black"><?php echo $viwcomment->post_title;?></div>
         <div class="height5"></div>
         <div class="para"><?php echo $viwcomment->post_desc;?></div>
         <div class="height5"></div>
         <div class="fontsize12 gold italic"><?php echo date('d M Y h:i:s a',strtotime($viwcomment->post_date));?></div>
         </div>
         <div class="clearfix borderbottom paddingtopbottom10"></div>
         <div class="height30 clearfix"></div>
         <?php } } ?>
         
        
        
        
        
        </div>
          
          
          
          
                   
              </div>      
                    
                    
                    <?php } ?>
                    </section>
                    
                   
                    
                    
                    </div>
                    
                  
                   
	
	
	 </section>
	
	 
    
	
	
	
    

      @include('footer')
     
</body>
</html>
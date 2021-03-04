<?php
/*
Theme Name: DonateMe
Theme URI: http://avigher.com
Author: Avigher
Author URI: http://avigher.com
Description: DonateMe
Version: 1.0
*/
?>
 <?php 
 use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();
 $url = URL::to("/"); 
 $setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		$color_setts = DB::table('color_settings')
		->where('id', '=', $setid)
		->get();
		
		
		$name = Route::currentRouteName();
 if($currentPaths=="/")
 {
	 $pagetitle="Home";
	 $activemenu = "/";
 }
 else 
 {
	 $pagetitle=$currentPaths;
	 $activemenu = $currentPaths;
 }
 
 


$ppid=1;
		$about_title = DB::table('pages')
		->where('page_id', '=', $ppid)
		->get();
$ppid_two=4;
		$contact_title = DB::table('pages')
		->where('page_id', '=', $ppid_two)
		->get();
$ppid_three=5;
		$donate_title = DB::table('pages')
		->where('page_id', '=', $ppid_three)
		->get();
$ppid_four=6;
		$support_title = DB::table('pages')
		->where('page_id', '=', $ppid_four)
		->get();
$ppid_five=7;
		$faq_title = DB::table('pages')
		->where('page_id', '=', $ppid_five)
		->get();	
		
$ppid_six=8;
		$terms_title = DB::table('pages')
		->where('page_id', '=', $ppid_six)
		->get();
$ppid_seven=9;
		$privacy_title = DB::table('pages')
		->where('page_id', '=', $ppid_seven)
		->get();					
 ?>

       <title><?php echo $setts[0]->site_name;?> - 
 <?php if($activemenu == "/" or $activemenu == "index"){ echo "Home"; } else { echo ""; }
 if($activemenu == "gallery") { echo "Gallery"; } else { echo ""; }
 

if($activemenu == "blog" or $activemenu == "blog/{id}"){ echo "Blog"; } else { echo ""; }
if($activemenu == "contact-us"){ echo $contact_title[0]->page_title; } else { echo ""; }
if($activemenu == "dashboard"){ echo 'Account Settings'; } else { echo ""; }
if($activemenu == "my-comments"){ echo 'My Comments'; } else { echo ""; }
if($activemenu == "login"){ echo 'Login'; } else { echo ""; }
if($activemenu == "register"){ echo 'Register'; } else { echo ""; }

if($activemenu == "tag/{type}/{id}"){ echo 'Tags'; } else { echo ""; }

if($activemenu == "404"){ echo '404 Page not found!'; } else { echo ""; }
if($activemenu == "forgot-password"){ echo 'Forgot Password?'; } else { echo ""; }
if($activemenu == "reset-password/{id}"){ echo 'Reset Password'; } else { echo ""; }
if($activemenu == "thankyou/{id}"){ echo 'Thank You'; } else { echo ""; }

if($activemenu == "page/{id}"){ echo 'Pages'; } else { echo ""; }

if($activemenu == "all-campaigns") { echo "All Campaigns"; } else { echo ""; }

if($activemenu == "category/{id}/{slug}"){ echo "Category"; } else { echo ""; }

if($activemenu == "categories") { echo "Categories"; } else { echo ""; }

if($activemenu == "campaigns") { echo "My Campaigns"; } else { echo ""; }

if($activemenu == "donations") { echo "My Donations"; } else { echo ""; }


if($activemenu == "withdrawal-settings") { echo "Withdrawal Settings"; } else { echo ""; }

if($activemenu == "search") { echo "Search"; } else { echo ""; }

if($activemenu == "campaign/{id}/{slug}"){ echo "Campaign"; } else { echo ""; }

if($activemenu == "donate/{id}/{slug}"){ echo "Donate"; } else { echo ""; }

if($activemenu == "donate"){ echo "Payment Confirmation"; } else { echo ""; }


if($activemenu == "success/{cid}"){ echo "Payment Success"; } else { echo ""; }

if($activemenu == "stripe-success"){ echo "Payment Success"; } else { echo ""; }

if($activemenu == "create-campaign"){ echo "Create Campaign"; } else { echo ""; }

if($activemenu == "cancel"){ echo "PayPal Transaction Cancel"; } else { echo ""; }

?>
 </title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
	 <!-- css stylesheets -->
	 <?php if(!empty($setts[0]->site_favicon)){?>
	 <link rel="icon" type="image/x-icon" href="<?php echo $url.'/local/images/media/'.$setts[0]->site_favicon;?>" />
	 <?php } else { ?>
	 <link rel="icon" type="image/x-icon" href="<?php echo $url.'/local/images/noimage.jpg';?>" />
	 <?php } ?>
	
         
         
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Montserrat:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $url;?>/local/resources/views/theme/css/styles-merged.css">
    
    <link rel="stylesheet" href="<?php echo $url;?>/local/resources/views/theme/css/custom.css">
	
	<link rel="stylesheet" href="<?php echo $url;?>/local/resources/views/admin/theme/css/new_font-awesome.css">

	


<script src="<?php echo $url;?>/local/resources/views/theme/js/jquery.min.js"></script>


<script src="<?php echo $url;?>/local/resources/views/theme/js/audioplayer.js"></script>
		<script>
			$(function() {
				$('audio').audioPlayer();
			});
			
			
			
		</script>


	
<!--[if lt IE 9]>
      <script src="<?php echo $url;?>/local/resources/views/theme/js/vendor/html5shiv.min.js"></script>
      <script src="<?php echo $url;?>/local/resources/views/theme/js/vendor/respond.min.js"></script>
    <![endif]-->

<script src='https://www.google.com/recaptcha/api.js'></script>

<link rel="stylesheet" href="<?php echo $url;?>/local/resources/views/theme/css/validationEngine.jquery.css" type="text/css"/>


<?php /********* End Loader********/ ?>


<?php /* SHARE */ ?>

<link rel="stylesheet" type="text/css" href="<?php echo $url;?>/local/resources/views/theme/share/css/avigher-technologies.css">

<?php /* SHARE */ ?>


<?php /* editor */?>

<link rel="stylesheet" type="text/css" href="<?php echo $url;?>/local/resources/views/theme/editor/themes/flat/style.css">

<?php /* editor */?>





    <style type="text/css">


@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->body_font;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->heading1;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->heading2;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->heading3;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->heading4;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->heading5;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->heading6;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->paragraph;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->list_font;?>');



@font-face {
  font-family: 'FredokaOne-Regular';
  src: url('<?php echo $url;?>/local/resources/views/template/fonts/FredokaOne-Regular.eot?#iefix') format('embedded-opentype'),  url('<?php echo $url;?>/local/resources/views/template/fonts/FredokaOne-Regular.woff') format('woff'), url('<?php echo $url;?>/local/resources/views/template/fonts/FredokaOne-Regular.ttf')  format('truetype'), url('<?php echo $url;?>/local/resources/views/template/fonts/FredokaOne-Regular.svg#FredokaOne-Regular') format('svg');
  font-weight: normal;
  font-style: normal;
}


.avigher-loader {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url('<?php echo $url;?>/local/images/media/<?php echo $setts[0]->site_loading_url;?>') center no-repeat #fff;
}

.paddingoff
	{
	padding:0px !important;
	}
.paddingleftoff
{
padding-left:0px !important;
}	

.black
{
color:#000000 !important;
}
.mtop10
{
margin-top:10px;
}

.green
{
color:#006600;
}

.bold
{
font-weight:bold !important;
}


.black:hover
{
color:#000000 !important;
text-decoration:none !important;
}
.black:focus
{
color:#000000 !important;
text-decoration:none !important;
}

.embed-container {
  position: relative;
  
  overflow: hidden;
}
		
.embed-container iframe,
.embed-container object,
.embed-container embed {
  
 
  width: 100%;
  min-height:350px;
  
}


.panel-default > .panel-heading
{
background:#2C3E50;
color:#fff;
}

.ffleft
{
text-align:center;
display:inline-block !important;
}


.fleft
{
float:left;
}
.fright
{
float:right;
}

.mtp10
{
margin-top:10px;
margin-bottom:10px;
}
.mtp20
{
margin-top:20px;
margin-bottom:20px;
}

.mtp30
{
margin-top:10px;
margin-bottom:60px;
}

.user_round
{
border-radius:50%;
	-webkit-border-radius:50%;
	max-width:100px;
}

.round
	{
	border-radius:50%;
	-webkit-border-radius:50%;
	border:2px solid #ccc;
	padding:30px;
	}



.jumbotron-cover:before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: rgba(5,5,5,.6);
    left: 0;
    top: 0;
}





.height5
{
height:5px !important;
}
.height7
{
height:7px !important;
}

.height10
{
height:10px !important;
}
.height20
{
height:20px !important;
}
.height30
{
height:30px !important;
}
.height40
{
height:40px !important;
}
.height50
{
height:50px !important;
}

.height100
{
height:100px !important;
}

.clearfix
{
clear:both !important;

}
.paddingoff
{
padding:0px !important;
}
.radiusoff
{
border-radius:0 !important;
}


.camp_heading
{
white-space: nowrap; 
    overflow: hidden;
    text-overflow: ellipsis;
}



/*************** PAGINATION *************/

.pagess {
	clear: both;
	float:right;
	
	display: inline;
}

.pagess ul {
	float: left;
}

.pagess ul li {
	float: left;
	display: inline;
	margin-right: 3px;
	text-transform:uppercase;
}

.pagess ul li a {
	padding: 5px 10px 5px 10px;
	background:#000000 !important;
	color: #fff;
}

.pagess ul li.on a {
	background: #F45302 !important;
	color: #fff;
}

.pagess ul li span span {
	color: #fff;
	padding: 5px 10px 5px 10px;
	background: #454545;
}








.gpage {
	clear: both;
	float:right;
	
	display: inline;
}

.gpage ul {
	float: left;
}

.gpage ul li {
	float: left;
	display: inline;
	margin-right: 3px;
	text-transform:uppercase;
}

.gpage ul li a {
	padding: 5px 10px 5px 10px;
	background:#000000 !important;
	color: #fff;
}

.gpage ul li.on a {
	background: #F45302 !important;
	color: #fff;
}

.gpage ul li span span {
	color: #fff;
	padding: 5px 10px 5px 10px;
	background: #454545;
}






.campage {
	clear: both;
	float:right;
	
	display: inline;
}

.campage ul {
	float: left;
}

.campage ul li {
	float: left;
	display: inline;
	margin-right: 3px;
	text-transform:uppercase;
}

.campage ul li a {
	padding: 5px 10px 5px 10px;
	background:#000000 !important;
	color: #fff;
}

.campage ul li.on a {
	background: #F45302 !important;
	color: #fff;
}

.campage ul li span span {
	color: #fff;
	padding: 5px 10px 5px 10px;
	background: #454545;
}




.gorypage {
	clear: both;
	float:right;
	
	display: inline;
}

.gorypage ul {
	float: left;
}

.gorypage ul li {
	float: left;
	display: inline;
	margin-right: 3px;
	text-transform:uppercase;
}

.gorypage ul li a {
	padding: 5px 10px 5px 10px;
	background:#000000 !important;
	color: #fff;
}

.gorypage ul li.on a {
	background: #F45302 !important;
	color: #fff;
}

.gorypage ul li span span {
	color: #fff;
	padding: 5px 10px 5px 10px;
	background: #454545;
}





/**************** END PAGINATION ***************/







/*************** MP3 PLAYER ****************/

.mediPlayer .control {
    opacity        : 0; 
    pointer-events : none;
    cursor         : pointer;
}

.mediPlayer .not-started .play, .mediPlayer .paused .play {
    opacity : 1;

}

.mediPlayer .playing .pause {
    opacity : 1;

}

.mediPlayer .playing .play {
    opacity : 0;
}

.mediPlayer .ended .stop {
    opacity        : 1;
    pointer-events : none;
}

.mediPlayer .precache-bar .done {
    opacity : 0;
}

.mediPlayer .not-started .progress-bar, .mediPlayer .ended .progress-bar {
    display : none;
}

.mediPlayer .ended .progress-track {
    stroke-opacity : 1;
}

.mediPlayer .progress-bar,
.mediPlayer .precache-bar {
    transition        : stroke-dashoffset 500ms;

    stroke-dasharray  : 298.1371428256714;
    stroke-dashoffset : 298.1371428256714;
}





/************ NEW MP3 *************/




.audioplayer {
    display: flex;
    flex-direction: row;
    box-sizing: border-box;
    margin: 1em 0;
    padding: 0 24px;
    width: 100%;
    height: 96px;
    align-items: center;
    border: 1px solid #DDE2E6;
    border-radius: 4px;
    background: #FAFAFA;
	cursor:pointer;
}

.audioplayer-playpause {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    cursor: pointer !important;
    transition: all .2s ease-in-out;
}

.audioplayer:not(.audioplayer-playing) .audioplayer-playpause {
    background: rgba(91, 130, 255, 0);
    border: 1px solid #5B82FF;
}

.audioplayer:not(.audioplayer-playing) .audioplayer-playpause:hover {
    background: rgba(91, 130, 255, 0.1);
}

.audioplayer-playing .audioplayer-playpause {
    background: rgba(253, 79, 26, 0);
    border: 1px solid #FD4F1A;
}

.audioplayer-playing .audioplayer-playpause:hover {
    background: rgba(235, 79, 26, 0.1);
}

.audioplayer:not(.audioplayer-playing) .audioplayer-playpause a {
    content: '';
    justify-content: center;
    width: 0;
    height: 0;
    margin-left: 2px;
    border-top: 7px solid transparent;
    border-right: none;
    border-bottom: 7px solid transparent;
    border-left: 12px solid #0059FF;
}

.audioplayer-playing .audioplayer-playpause a {
    content: '';
    display: flex;
    justify-content: space-between;
    width: 12px;
    height: 14px;
}

.audioplayer-playing .audioplayer-playpause a::before, .audioplayer-playing .audioplayer-playpause a::after {
    content: '';
    width: 4px;
    height: 14px;
    background-color: #FD4F1A;
}

.audioplayer-time {
    display: flex;
    width: 40px;
    justify-content:center;
    font-size: 12px;
    color: rgba(51, 51 ,51, .6)
}

.audioplayer-time-current {
    margin-left: 24px;
}

.audioplayer-time-duration {
    margin-right: 24px;
}

.audioplayer-bar {
    position: relative;
    display: flex;
    margin: 0 12px;
    height: 12px;
    flex-basis: 0;
    flex-grow: 1;
    cursor: pointer;
}

.audioplayer-bar::before {
    content: '';
    position: absolute;
    top: 5px;
    width: 100%;
    height: 2px;
    background-color: #DDE2E6;
}

.audioplayer-bar > div {
    position: absolute;
    left: 0;
    top: 5px;
}
.audioplayer-bar-loaded {
    z-index: 1;
    height: 2px;
    background: #BEC8D2;
}

.audioplayer-bar-played {
    flex-direction: row-reverse;
    z-index: 2;
    height: 2px;
    background: -webkit-linear-gradient(left,#0059FF,#09B1FA);
}

.audioplayer-bar-played::after {
    display: flex;
    position: absolute;
    content: '';
    box-sizing: border-box;
    top: -5px;
    right: -1px;
    margin-right: -5px;
    width: 12px;
    height: 12px;
    background-color: #fff;
    border-radius: 6px;
}

.audioplayer:not(.audioplayer-playing) .audioplayer-bar-played::after {
    border: 2px solid #BEC8D2;
}

.audioplayer-playing .audioplayer-bar-played::after {
    border: 2px solid #0059FF;

}

.audioplayer-volume {
    display: flex;
    align-items: center;
	cursor:pointer !important;
}

.audioplayer-volume-button {
    display: flex;
    align-items: center;
    width: 24px;
    height: 24px;
    cursor: pointer;
}

.audioplayer-volume-button a {
    display: flex;
    width: 6px;
    height: 8px;
    background-color: #9A9FB0;
    position: relative;
	cursor:pointer !important;
}

.audioplayer-volume-button a:before, .audioplayer-volume-button a:after {
    content: '';
    position: absolute;
}

.audioplayer-volume-button a:before {
    width: 0;
    height: 0;
    border-top: 8px solid transparent;
    border-right: 9px solid #9A9FB0;
    border-bottom: 8px solid transparent;
    border-left: none;
    top: -4px;
}

.audioplayer:not(.audioplayer-mute) .audioplayer-volume-button a:after {
    left: 10px;
    top: -2px;
    width: 6px;
    height: 6px;
    border: 6px double #9A9FB0;
    border-width: 6px 6px 0 0;
    border-radius: 0 12px 0 0;
    transform: rotate(45deg);
	cursor:pointer !important;
}


.audioplayer-mute .audioplayer-volume-button a {
    background-color: #FD4F1A;
}

.audioplayer-mute .audioplayer-volume-button a:before {
    border-right: 9px solid #FD4F1A;
}

.audioplayer-volume-adjust {
    display: flex;
    align-items: center;
    margin-left: 8px;
	cursor:pointer !important;
}

.audioplayer-volume-adjust > div {
    position: relative;
    display: flex;
    width: 60px;
    height: 2px;
    cursor: pointer;
    background-color: #BEC8D2;
}

.audioplayer-volume-adjust div div {
    position: absolute;
    top: 0;
    left: 0;
    height: 2px;
    background-color: #0059FF;
}

/* responsive | you can change the max-width value to match your theme */

@media screen and (max-width: 679px) {
    .audioplayer-volume-adjust {
        display: none;
    }
}


























/******************** END MP3 PLAYER ***************/



.fontsize10
{
font-size:10px;
}

.fontsize11
{
font-size:11px;
}

.fontsize12
{
font-size:12px;
}
.fontsize13
{
font-size:13px;
}
.fontsize14
{
font-size:14px;
}
.fontsize15
{
font-size:15px;
}
.fontsize16
{
font-size:16px;
}
.fontsize17
{
font-size:17px;
}
.fontsize18
{
font-size:18px;
}
.fontsize19
{
font-size:19px;
}
.fontsize20
{
font-size:20px;
}
.fontsize21
{
font-size:21px;
}
.fontsize22
{
font-size:22px;
}
.fontsize23
{
font-size:23px;
}
.fontsize24
{
font-size:24px;
}
.fontsize25
{
font-size:25px;
}

.fontsize30
{
font-size:30px;
}

.fontsize35
{
font-size:35px;
}

.fontsize40
{
font-size:40px;
}

.fontsize45
{
font-size:45px;
}

.fontsize50
{
font-size:50px;
}

.fontsize55
{
font-size:55px;
}
.fontsize60
{
font-size:60px;
}
.fontsize65
{
font-size:65px;
}


.fontsize70
{
font-size:70px;
}


.fontsize75
{
font-size:75px;
}

.fontsize80
{
font-size:80px;
}

.fontsize85
{
font-size:85px;
}

.fontsize90
{
font-size:90px;
}

.fontsize95
{
font-size:95px;
}






@media screen and (max-width: 768px) {



}

@media screen and (max-width: 480px) {



}



/********** IPAD LANDSCAPE *********/

@media screen and (min-width : 1024px) {

.padd_rightoff
{
padding-right:0px;
}

}

@media screen and (min-width : 1200px) {

.padd_rightoff
{
padding-right:0px;
}

}



/************* IPAD LANDSCAPE *******/












.rounder
{
border-radius:50px;
-webkit-border-radius:50px;
}

.ash_border
{
border:1px solid #dddddd;

}


.theme_color
{
color:<?php echo $setts[0]->site_primary_color;?> !important;
}


.itemr .img-responsive {
    width: 100%;
    min-height: 170px;
    object-fit: cover;
    max-height: 170px;
	margin-bottom:15px;
}


.itemrg .img-responsive {
    width: 100%;
    min-height: 250px;
    object-fit: cover;
    max-height: 250px;
	margin-bottom:25px;
}
/************* theme style ************/

.ash_color
{
color:#333333 !important;
}

.default_cursor
{
cursor:default !important;
pointer-events: none !important;
}

.btn:active,.probootstrap-navbar,.progress{-webkit-box-shadow:none}@font-face{font-family:icomoon;src:url(../fonts/icomoon/icomoon.eot?1z9v6x);src:url(../fonts/icomoon/icomoon.eot?1z9v6x#iefix) format("embedded-opentype"),url(../fonts/icomoon/icomoon.ttf?1z9v6x) format("truetype"),url(../fonts/icomoon/icomoon.woff?1z9v6x) format("woff"),url(../fonts/icomoon/icomoon.svg?1z9v6x#icomoon) format("svg");font-weight:400;font-style:normal}html{overflow-x:hidden}


body{background:#fff;line-height:26px;font-size:16px;font-weight:300;font-family:Lato,Arial,sans-serif}



h1,h2,h3,h4,h5,h6{color:#000;line-height:1.5;font-family:Montserrat,Arial,sans-serif;font-weight:400;margin:0 0 30px}h1{font-size:36px}h2{font-size:30px;line-height:38px}.probootstrap-navbar .dropdown-submenu>a:before,.probootstrap-navbar .dropdown>a:before{font-family:icomoon;font-style:normal;font-weight:400;line-height:1;speak:none;font-variant:normal;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}h3{font-size:24px}h4{font-size:22px}h5{text-transform:uppercase}h5,h6{font-size:14px}ol,p,ul{margin-bottom:30px}a{-webkit-transition:.3s all;transition:.3s all;color:<?php echo $setts[0]->site_primary_color;?>;}a:active,a:focus,a:hover{color:#000;text-decoration:none}

.probootstrap-navbar{border:none;box-shadow:none;border-radius:0;margin-bottom:0;background:#000;-webkit-transition:.3s all;transition:.3s all;width:100%;z-index:2 !important;}


@media screen and (max-width:768px){.probootstrap-navbar{background:#000;-webkit-box-shadow:0 2px 10px 0 rgba(0,0,0,.1);box-shadow:0 2px 10px 0 rgba(0,0,0,.1)}}.probootstrap-navbar .navbar-toggle{top:20px;border:none}.probootstrap-navbar .navbar-toggle:focus,.probootstrap-navbar .navbar-toggle:hover{background-color:transparent}.probootstrap-navbar .navbar-toggle span.icon-bar{-webkit-transition:all .15s;transition:all .15s}.probootstrap-navbar .navbar-toggle span:nth-child(2){-webkit-transform:rotate(45deg);transform:rotate(45deg);-webkit-transform-origin:10% 10%;transform-origin:10% 10%}.probootstrap-navbar .navbar-toggle span:nth-child(3){opacity:0}.probootstrap-navbar .navbar-toggle span:nth-child(4){-webkit-transform:rotate(-45deg);transform:rotate(-45deg);-webkit-transform-origin:10% 90%;transform-origin:10% 90%}.probootstrap-navbar .navbar-toggle.collapsed span:nth-child(2),.probootstrap-navbar .navbar-toggle.collapsed span:nth-child(4){-webkit-transform:rotate(0);transform:rotate(0)}.probootstrap-navbar .navbar-toggle.collapsed span:nth-child(3){opacity:1}.probootstrap-navbar .navbar-brand,.probootstrap-navbar .navbar-nav>li>a,.probootstrap-navbar .parent-nav-link-padding{margin-left:15px;margin-right:15px;padding:34px 0}.probootstrap-navbar .dropdown-header{color:rgba(255,255,255,.2);padding-left:10px;text-transform:uppercase}.probootstrap-navbar .dropdown>a{padding-right:10px!important;position:relative;display:block}@media screen and (max-width:480px){.probootstrap-navbar .dropdown>a{display:block;padding-right:0}}.probootstrap-navbar .dropdown>a:before{text-transform:none;position:absolute;top:50%;right:0;margin-right:-10px;margin-top:-11px;content:"\e924";font-size:20px;color:rgba(255,255,255,.5);-webkit-transition:.3s all;transition:.3s all}@media screen and (max-width:768px){.probootstrap-navbar .navbar-brand,.probootstrap-navbar .navbar-nav>li>a,.probootstrap-navbar .parent-nav-link-padding{padding-top:15px!important;padding-bottom:15px!important}.probootstrap-navbar .dropdown>a:before{color:rgba(0,0,0,.2)}}.probootstrap-navbar .dropdown>a:hover:before{-webkit-transform:rotate(180deg);transform:rotate(180deg)}.probootstrap-navbar .dropdown.open>a,.probootstrap-navbar .dropdown:active>a,.probootstrap-navbar .dropdown:focus>a,.probootstrap-navbar .dropdown:hover>a{-webkit-transition:.3s all;transition:.3s all}.probootstrap-navbar .dropdown.open>a:before,.probootstrap-navbar .dropdown:active>a:before,.probootstrap-navbar .dropdown:focus>a:before,.probootstrap-navbar .dropdown:hover>a:before{-webkit-transform:rotate(180deg);transform:rotate(180deg)}.probootstrap-navbar .dropdown>.dropdown-menu>li a{padding:10px;color:rgba(255,255,255,.8)}.probootstrap-navbar .dropdown>.dropdown-menu>li a:hover,.probootstrap-navbar .dropdown>.dropdown-menu>li.open>a,.probootstrap-navbar .dropdown>.dropdown-menu>li:active>a,.probootstrap-navbar .dropdown>.dropdown-menu>li:focus>a,.probootstrap-navbar .dropdown>.dropdown-menu>li:hover>a{color:#fff;background:0 0!important;border-top:none}.probootstrap-navbar .dropdown>.dropdown-menu>li.dropdown-submenu.open>a,.probootstrap-navbar .dropdown>.dropdown-menu>li.dropdown-submenu:active>a,.probootstrap-navbar .dropdown>.dropdown-menu>li.dropdown-submenu:focus>a,.probootstrap-navbar .dropdown>.dropdown-menu>li.dropdown-submenu:hover>a{border-top:none}.probootstrap-navbar .dropdown>.dropdown-menu>li.dropdown-submenu.open>a:before,.probootstrap-navbar .dropdown>.dropdown-menu>li.dropdown-submenu:active>a:before,.probootstrap-navbar .dropdown>.dropdown-menu>li.dropdown-submenu:focus>a:before,.probootstrap-navbar .dropdown>.dropdown-menu>li.dropdown-submenu:hover>a:before{color:#000}.probootstrap-navbar .dropdown>.dropdown-menu>li.active>a{color:#fff}.probootstrap-navbar .navbar-right .dropdown-menu{right:auto}.probootstrap-navbar .dropdown-menu{border:none;background:<?php echo $setts[0]->site_primary_color;?>;border-radius:0;-webkit-box-shadow:0 0 7px 0 rgba(0,0,0,.15);box-shadow:0 0 7px 0 rgba(0,0,0,.15);min-width:200px;white-space:normal;word-wrap:break-word}.probootstrap-half .image .image-bg img,.probootstrap-service-2 .image .image-bg img{min-width:100%;min-height:100%}.probootstrap-navbar .dropdown-menu a{white-space:normal}@media screen and (max-width:768px){.probootstrap-navbar .dropdown-menu{width:100%;padding:10px 15px}.probootstrap-navbar .dropdown-menu a{color:#fff}}.probootstrap-navbar .navbar-brand{padding-top:0!important;padding-bottom:0!important;font-size:30px;text-transform:uppercase;background:url(../theme/img/logo.png) left 100% no-repeat;top:24px;position:relative;width:220px;height:43px;text-indent:-999999px;-webkit-transition:.2s all;transition:.2s all}@media screen and (max-width:768px){.probootstrap-navbar .navbar-brand{top:0;background-position:left 100%;margin-top:20px;margin-bottom:20px}}@media only screen and (-webkit-min-device-pixel-ratio:2),only screen and (min--moz-device-pixel-ratio:2),only screen and (min-device-pixel-ratio:2),only screen and (min-resolution:192dpi),only screen and (min-resolution:2dppx){.probootstrap-navbar .navbar-brand{position:relative;width:220px;height:43px;background:url(../theme/img/logo@2x.png) left 100% no-repeat;background-size:cover}}.probootstrap-navbar .navbar-nav>li>a{color:#fff;font-size:15px;position:relative}@media screen and (max-width:768px){.probootstrap-navbar .navbar-nav>li>a{padding-top:8px;padding-bottom:8px;color:rgba(255,255,255,.7)}}.probootstrap-navbar .navbar-nav>li>a:active,.probootstrap-navbar .navbar-nav>li>a:focus,.probootstrap-navbar .navbar-nav>li>a:hover{color:rgba(255,255,255,.7)}.probootstrap-navbar .navbar-nav>li.open>a,.probootstrap-navbar .navbar-nav>li.open>a:focus,.probootstrap-navbar .navbar-nav>li.open>a:hover{background:0 0}.probootstrap-navbar .navbar-nav>li.active>a{background:0 0!important;color:<?php echo $setts[0]->site_primary_color;?>;!important}.probootstrap-navbar .navbar-nav>li.active>a:active,.probootstrap-navbar .navbar-nav>li.active>a:focus,.probootstrap-navbar .navbar-nav>li.active>a:hover{background:0 0}.probootstrap-navbar .navbar-nav>li>.dropdown-menu:before{border:1px solid <?php echo $setts[0]->site_primary_color;?>;content:"";position:absolute;top:-20px;left:40px;border-color:rgba(253,190,52,0);border-bottom-color:<?php echo $setts[0]->site_primary_color;?>;border-width:10px;margin-left:-10px}@media screen and (max-width:768px){.probootstrap-navbar .navbar-nav>li.active>a{color:rgba(255,255,255,.7)!important}.probootstrap-navbar .navbar-nav>li>.dropdown-menu:before{display:none}}.probootstrap-navbar .navbar-nav>li.probootstra-cta-button>a{padding:10px 20px;margin-top:24px;background:<?php echo $setts[0]->site_primary_color;?>;color:#fff;border-radius:0;border:none}.probootstrap-navbar .navbar-nav>li.probootstra-cta-button>a:active,.probootstrap-navbar .navbar-nav>li.probootstra-cta-button>a:focus{outline:0}.probootstrap-navbar .navbar-nav>li.probootstra-cta-button>a.btn-ghost{background:0 0;border-radius:0;color:#fff;border:2px solid rgba(255,255,255,.4)}.probootstrap-navbar .navbar-nav>li.probootstra-cta-button.last{margin-left:20px}.probootstrap-navbar .navbar-nav>li.probootstra-cta-button.last>a{margin-left:0;margin-right:0}@media screen and (max-width:768px){.probootstrap-navbar .navbar-nav>li.probootstra-cta-button>a{margin-bottom:10px;margin-top:0}.probootstrap-navbar .navbar-nav>li.probootstra-cta-button.last{margin-left:0}.probootstrap-navbar .navbar-nav>li.probootstra-cta-button.last>a{margin-left:15px;margin-right:15px}}.probootstrap-navbar .navbar-nav .dropdown li.active>a{background:0 0}.probootstrap-navbar .dropdown-submenu{position:relative}.probootstrap-navbar .dropdown-submenu .dropdown-menu{top:0;left:100%;margin-top:-1px}.probootstrap-navbar .dropdown-submenu>a{display:block}.probootstrap-navbar .dropdown-submenu>a:before{text-transform:none;position:absolute;top:50%;right:0;margin-right:10px;margin-top:-11px;content:"\e926";font-size:20px;color:rgba(0,0,0,.5);-webkit-transition:.3s all;transition:.3s all}.container-fluid .dropdown-submenu,.probootstrap-navbar .navbar-right .dropdown-submenu{position:relative}.container-fluid .dropdown-submenu .dropdown-menu,.probootstrap-navbar .navbar-right .dropdown-submenu .dropdown-menu{left:auto;right:100%;margin-top:-1px;top:0}@media screen and (max-width:768px){.probootstrap-navbar .dropdown-submenu>a:before{color:rgba(0,0,0,.2)}}.probootstrap-navbar .dropdown-submenu>a:hover:before{color:rgba(0,0,0,.3);-webkit-transform:rotate(180deg);transform:rotate(180deg)}.container-fluid .navbar-brand{margin-left:15px}@media screen and (max-width:480px){.container-fluid .dropdown-submenu:hover>.dropdown-menu,.probootstrap-navbar .dropdown-submenu:hover>.dropdown-menu{display:block}.probootstrap-cta h2{text-align:center}}@-webkit-keyframes zoomout{0%{background-size:120% auto}100%{background-size:100% auto}}@keyframes zoomout{0%{background-size:120% auto}100%{background-size:100% auto}}

.probootstrap-hero{z-index:1 !important;height:600px;background-size:cover;background-repeat:no-repeat;position:relative;background-position:center !important; }




@media screen and (max-width:1024px){.probootstrap-hero{height:700px}}@media screen and (max-width:768px){.probootstrap-hero{background-position:center center;height:inherit}}


.probootstrap-hero.probootstrap-hero-inner{height:300px}

@media screen and (max-width:768px){.probootstrap-hero.probootstrap-hero-inner{height:inherit;padding:3em 0}}.probootstrap-hero .probootstrap-slider-text{padding-top:120px}

@media screen and (max-width:1024px){.probootstrap-hero .probootstrap-slider-text{padding-top:110px}}

.probootstrap-hero .probootstrap-slider-text h1{text-transform:uppercase;font-size:60px;color:#fff;font-weight:900;line-height:60px}


@media screen and (max-width:768px){.probootstrap-hero .probootstrap-slider-text{padding-top:30px}.probootstrap-hero .probootstrap-slider-text h1{font-size:50px;line-height:40px}}.probootstrap-hero .probootstrap-slider-text h1 span{display:block;font-size:30px;text-transform:none;font-weight:300;font-family:Lato,Arial,sans-serif}.probootstrap-service-intro{position:absolute;bottom:0;width:100%;overflow:hidden}.probootstrap-service-intro .probootstrap-service-intro-flex{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap}.probootstrap-service-intro .probootstrap-service-intro-flex .item{width:33.333%;background:<?php echo $setts[0]->site_primary_color;?>;padding:20px;border-right:1px solid rgba(255,255,255,.3)}@media screen and (max-width:768px){.probootstrap-hero .probootstrap-slider-text h1 span{line-height:1.5;font-size:20px}.probootstrap-service-intro{position:relative;margin-bottom:30px}.probootstrap-service-intro .probootstrap-service-intro-flex .item{width:100%}}.probootstrap-service-intro .probootstrap-service-intro-flex .item:last-child{border-right:none}.probootstrap-service-intro .probootstrap-service-intro-flex .item .icon,.probootstrap-service-intro .probootstrap-service-intro-flex .item .text{display:table-cell;vertical-align:top}.probootstrap-service-intro .probootstrap-service-intro-flex .item .icon{width:80px}.probootstrap-service-intro .probootstrap-service-intro-flex .item .icon i{font-size:50px;color:#fff}.probootstrap-service-intro .probootstrap-service-intro-flex .item .text h2,.probootstrap-service-intro .probootstrap-service-intro-flex .item .text p{margin:0;padding:0;color:#fff;line-height:1.5}


.probootstrap-service-intro .probootstrap-service-intro-flex .item .text h2{font-size:18px;color:#fff;text-transform:uppercase}


.probootstrap-service-intro .probootstrap-service-intro-flex .item .text p{color:rgba(255,255,255,.7)}.probootstrap-service-intro .probootstrap-service-intro-flex .item .text a{color:#fff;text-decoration:underline}.btn{border:none;border-radius:0;padding-left:30px;padding-right:30px}.btn:active{-webkit-transition:.2s all;transition:.2s all;-webkit-transform:scale(.95);transform:scale(.95);box-shadow:none}.btn.btn-lg{line-height:1.5}.btn.btn-primary{border:1px solid <?php echo $setts[0]->site_primary_color;?>;background:<?php echo $setts[0]->site_primary_color;?>;color:#fff}.btn.btn-primary:active,.btn.btn-primary:focus,.btn.btn-primary:hover{background:#000;color:#fff;border:1px solid #000}.btn.btn-primary:active,.btn.btn-primary:focus{outline:0;border:1px solid #000}.btn.btn-ghost{background:0 0;border:1px solid <?php echo $setts[0]->site_primary_color;?>;color:<?php echo $setts[0]->site_primary_color;?>;}.btn.btn-ghost:hover{background:<?php echo $setts[0]->site_primary_color;?>;color:#fff}.btn.btn-ghost:active,.btn.btn-ghost:focus{outline:0;background:0 0;color:<?php echo $setts[0]->site_primary_color;?>;border:1px solid <?php echo $setts[0]->site_primary_color;?>;}.btn.btn-black{background:#000;color:#fff;border:1px solid #000}.btn.btn-black:active,.btn.btn-black:focus,.btn.btn-black:hover{border:1px solid <?php echo $setts[0]->site_primary_color;?>;background:<?php echo $setts[0]->site_primary_color;?>;color:#fff}.btn.btn-black:active,.btn.btn-black:focus{outline:0}.probootstrap-section{padding:4em 0;position:relative}.probootstrap-section.probootstrap-section-sm{padding:3em 0}.probootstrap-section.probootstrap-border-top{border-top:1px solid rgba(0,0,0,.1)}.probootstrap-section.probootstrap-border-bottom{border-bottom:1px solid rgba(0,0,0,.1)}.probootstrap-section>.container.probootstrap-border-top{padding-top:50px;border-top:1px solid rgba(0,0,0,.1)}.probootstrap-section.probootstrap-section-colored,.probootstrap-section.probootstrap-section-dark{background:<?php echo $setts[0]->site_primary_color;?>;}.probootstrap-section.probootstrap-section-colored .section-heading h2,.probootstrap-section.probootstrap-section-dark .section-heading h2{color:#fff}.probootstrap-section.probootstrap-section-colored .section-heading p,.probootstrap-section.probootstrap-section-dark .section-heading p{color:rgba(255,255,255,.6)}.probootstrap-section.probootstrap-section-dark{background:#333}.probootstrap-section.probootstrap-bg-white{background:#fff}@media screen and (max-width:768px){.probootstrap-section{padding:3em 0}}.probootstrap-section.probootstrap-bg{background-size:cover;background-repeat:no-repeat}.probootstrap-section.probootstrap-bg:before{position:absolute;content:"";background:rgba(0,0,0,.4);top:0;left:0;right:0;bottom:0}.probootstrap-half{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap}.probootstrap-half .image,.probootstrap-half .text{width:50%}.probootstrap-half .image{overflow:hidden;position:relative}.probootstrap-half .image .image-bg{position:absolute;left:50%;top:50%;-webkit-transform:translateY(-50%) translateX(-50%);transform:translateY(-50%) translateX(-50%)}.probootstrap-half .text{padding:100px;background:#1a1919}@media screen and (max-width:1000px){.probootstrap-half .image{width:100%;height:200px}.probootstrap-half .text{width:100%;padding:30px 15px;float:left}}.probootstrap-half .text h3{color:#fff;line-height:30px;font-size:30px;margin-bottom:30px;text-transform:uppercase;font-weight:700}@media screen and (max-width:768px){.probootstrap-half .text h3{font-size:24px;line-height:24px}}.probootstrap-half .text p{font-size:18px;color:rgba(255,255,255,.5);line-height:1.5}.section-heading{margin-bottom:40px}@media screen and (max-width:768px){.section-heading h1{font-size:24px;line-height:24px}}.section-heading h2{line-height:30px;font-size:30px;margin-bottom:10px;text-transform:uppercase;font-weight:700}@media screen and (max-width:768px){.section-heading h2{font-size:24px;line-height:24px}.section-heading p{font-size:16px;line-height:24px}}.lead{font-size:18px;line-height:32px;font-weight:400}.probootstrap-cta{padding:3em 0;background:<?php echo $setts[0]->site_primary_color;?>;color:#fff}.probootstrap-cta h2{margin:12px 0 0;padding:0;color:#fff;float:left;line-height:1.5;font-weight:300}@media screen and (max-width:768px){.probootstrap-cta h2{float:none;width:100%;margin:0 0 30px}}.probootstrap-cta .btn{float:right;margin-top:10px}@media screen and (max-width:768px){.probootstrap-cta .btn{float:none;width:100%;margin-top:0}}.probootstrap-cta .btn.btn-ghost{width:200px;border:1px solid #fff;color:#fff}@media screen and (max-width:480px){.probootstrap-cta .btn.btn-ghost{width:100%}}.probootstrap-cta .btn.btn-ghost:hover{background:#fff;color:<?php echo $setts[0]->site_primary_color;?>;}.probootstrap-footer{padding:7em 0 0;background:#000;color:rgba(255,255,255,.9)}
.probootstrap-footer a,.probootstrap-footer span{color:rgba(255,255,255,.6)}

.probootstrap-footer a:hover{color:#fff}.probootstrap-footer .probootstrap-copyright{padding:3em 0;margin-top:20px;background:#1a1919}@media screen and (max-width:768px){.probootstrap-footer{padding:3em 0}.probootstrap-footer .probootstrap-copyright{margin-top:0}}.probootstrap-footer .probootstrap-copyright p{line-height:20px}.probootstrap-footer .probootstrap-copyright p .icon{position:relative;top:2px}.probootstrap-footer .probootstrap-copyright p:last-child{margin-bottom:0}.probootstrap-footer .probootstrap-footer-widget{float:left;width:100%;margin-bottom:30px}.probootstrap-footer .probootstrap-footer-widget h3{color:#fff;font-size:24px;font-weight:300}.probootstrap-footer .probootstrap-footer-widget ul{margin:0;padding:0 0 20px}.probootstrap-footer .probootstrap-footer-widget ul li{margin:0 0 10px;padding:0;list-style:none}.probootstrap-footer .probootstrap-footer-widget .probootstrap-contact-info li{display:block}.probootstrap-footer .probootstrap-footer-widget .probootstrap-contact-info li i{display:table-cell;vertical-align:top;width:40px;color:rgba(255,255,255,.3)}.probootstrap-footer .probootstrap-footer-widget .probootstrap-contact-info li span{vertical-align:top;display:table-cell}.probootstrap-footer .probootstrap-back-to-top{text-align:right}@media screen and (max-width:768px){.probootstrap-footer .probootstrap-back-to-top{text-align:left;margin-top:30px}}.probootstrap-news{padding:0;margin:0}.probootstrap-news li{padding:0;margin:0 0 20px;list-style:none}.probootstrap-news li h3{line-height:25px;font-size:18px;margin:0}.probootstrap-news li h3 a:hover{color:#000}.probootstrap-news li p{margin-bottom:10px}.probootstrap-news li .probootstrap-date{color:#ccc;text-transform:uppercase}.probootstrap-news li .probootstrap-meta a{margin:0 20px 10px 0;color:#ccc}.news-entry h2 a,.probootstrap-news li .probootstrap-meta a:hover{color:#000}.news-entry h2 a:hover{color:<?php echo $setts[0]->site_primary_color;?>;}.probootstrap-news-date{color:#ccc;text-transform:uppercase}.probootstrap-meta-share a{margin:0 20px 10px 0;color:#ccc}.probootstrap-image-text-block h2 a,.probootstrap-meta-share a:hover{color:#000}.probootstrap-image-text-block{margin-bottom:30px}.probootstrap-image-text-block figure{margin-bottom:0}


.probootstrap-image-text-block .probootstrap-cause-inner{padding:20px;border:1px solid #e6e5e5;}


.probootstrap-image-text-block h2{font-size:20px;line-height:24px;margin-bottom:10px}.probootstrap-image-text-block :last-child{margin-bottom:0}.probootstrap-cause .probootstrap-goal,.probootstrap-cause .probootstrap-raised{font-size:13px;text-transform:uppercase;color:#515151}.probootstrap-cause .probootstrap-goal span,.probootstrap-cause .probootstrap-raised span{color:#01c632;font-size:24px;display:block}.probootstrap-cause .probootstrap-goal{text-align:right}.probootstrap-cause .probootstrap-date{margin-bottom:10px;color:#515151}.probootstrap-cause .probootstrap-date i{color:#d9d9d9}.progress{background-color:#e6e5e5;height:7px;margin:0 0 10px;overflow:visible;border-radius:10px;position:relative;box-shadow:none}

.progress-green{border:none;background-color:#139E59;border-radius:10px;-webkit-box-shadow:none;box-shadow:none;position:relative}
.progress-green>span{background:#139E59;padding:2px 4px;font-size:10px;position:absolute;right:0;top:-32px;color:#fff}


.progress-green>span:before{content:"";width:0;height:0;border-left:5px solid transparent;border-right:5px solid transparent;border-top:7px solid #139E59;position:absolute;bottom:-7px;left:50%;-webkit-transform:translateX(-50%);transform:translateX(-50%)}

.progress-bar{border:none;background-color:<?php echo $setts[0]->site_primary_color;?>;border-radius:10px;-webkit-box-shadow:none;box-shadow:none;position:relative}


.progress-bar>span{background:<?php echo $setts[0]->site_primary_color;?>;padding:2px 4px;font-size:10px;position:absolute;right:0;top:-32px;color:#fff}.progress-bar>span:before{content:"";width:0;height:0;border-left:5px solid transparent;border-right:5px solid transparent;border-top:7px solid <?php echo $setts[0]->site_primary_color;?>;position:absolute;bottom:-7px;left:50%;-webkit-transform:translateX(-50%);transform:translateX(-50%)}.probootstrap-uppercase{color:#515151;font-size:14px;margin-bottom:5px}.probootstrap-footer-social{padding:0;margin:0}.probootstrap-footer-social li{display:inline;padding:0;margin:0;list-style:none}.probootstrap-footer-social li a{padding:10px;font-size:22px}.probootstrap-footer-social li:first-child>a{padding-left:0}.probootstrap-donors{padding:20px;-webkit-transition:.3s all;transition:.3s all;position:relative;top:0;margin-bottom:20px;background:#fff}.probootstrap-donors .media{margin-bottom:20px}.probootstrap-donors .media img{border-radius:50%;width:90px;margin:0 auto}.probootstrap-donors .text h3{font-size:20px;margin:0}.probootstrap-donors .text p{margin-bottom:10px}.probootstrap-donors .text .donated{font-size:12px;text-transform:uppercase;color:#515151}.probootstrap-donors .text .donated .money{color:#01c632;font-size:30px;display:block}.probootstrap-donors .probootstrap-footer-social li a{font-size:15px}.probootstrap-donors .probootstrap-footer-social li.twitter a{color:#1da1f2}.probootstrap-donors .probootstrap-footer-social li.facebook a{color:#3b5998}.probootstrap-donors .probootstrap-footer-social li.instagram a{color:#e1306c}.probootstrap-donors .probootstrap-footer-social li.google-plus a{color:#dd4b39}.probootstrap-donors:focus,.probootstrap-donors:hover{top:-10px;-webkit-box-shadow:0 2px 20px 0 rgba(0,0,0,.1);box-shadow:0 2px 20px 0 rgba(0,0,0,.1)}.probootstrap-counter-wrap{float:left;width:100%;margin-bottom:30px}.probootstrap-counter-wrap .probootstrap-icon,.probootstrap-counter-wrap .probootstrap-text{display:table-cell;vertical-align:top}.probootstrap-counter-wrap .probootstrap-icon{width:60px}.probootstrap-counter-wrap .probootstrap-icon i{font-size:40px;color:<?php echo $setts[0]->site_primary_color;?>;}.probootstrap-counter-wrap .probootstrap-text .probootstrap-counter{display:block;font-size:40px;color:#000;margin-bottom:10px;font-family:Montserrat,Arial,sans-serif}.probootstrap-counter-wrap .probootstrap-text .probootstrap-counter-label{display:block;color:#515151;line-height:20px}.probootstrap-overlap{margin-top:-150px;position:relative}.nav-pills.probootstrap-center,.nav-tabs.probootstrap-center{text-align:center}.nav-pills.probootstrap-center>li,.nav-tabs.probootstrap-center>li{float:none;display:inline-block;zoom:1}.nav-pills.probootstrap-tabs>li>a,.nav-tabs.probootstrap-tabs>li>a{border-radius:0;padding:20px 30px;background:<?php echo $setts[0]->site_primary_color;?>;color:#fff;font-size:16px;border:none!important}@media screen and (max-width:480px){.nav-pills.probootstrap-center>li,.nav-pills.probootstrap-tabs>li>a,.nav-tabs.probootstrap-center>li,.nav-tabs.probootstrap-tabs>li>a{width:100%;display:block}}.nav-pills.probootstrap-tabs>li>a:hover,.nav-tabs.probootstrap-tabs>li>a:hover{background:#fdb61b}.nav-pills.probootstrap-tabs>li>a:active,.nav-pills.probootstrap-tabs>li>a:focus,.nav-tabs.probootstrap-tabs>li>a:active,.nav-tabs.probootstrap-tabs>li>a:focus{outline:0}.nav-pills.probootstrap-tabs>li.active>a,.nav-tabs.probootstrap-tabs>li.active>a{background:#fff;color:#000}.nav-pills.probootstrap-tabs.no-border,.nav-tabs.probootstrap-tabs.no-border{border-bottom:none}.probootstrap-tab-style-1{position:absolute;bottom:1px;width:100%}@media screen and (max-width:768px){.probootstrap-overlap{margin-top:-100px}.probootstrap-tab-section{padding-bottom:0!important}.probootstrap-tab-style-1{position:relative}}.probootstrap-date,.probootstrap-location{display:block;color:#666}.probootstrap-date i,.probootstrap-location i{color:#ccc;position:relative;top:2px;width:30px;display:inline-block;zoom:1}.probootstrap-featured-news-box .probootstrap-media{position:relative;z-index:1}.probootstrap-featured-news-box .probootstrap-text{position:relative;z-index:2;background:#fff;padding:20px;-webkit-box-shadow:0 2px 10px 0 rgba(0,0,0,.05);box-shadow:0 2px 10px 0 rgba(0,0,0,.05);margin-left:10px;margin-right:10px;top:-30px;-webkit-transition:.3s all;transition:.3s all;border-bottom:3px solid <?php echo $setts[0]->site_primary_color;?>;}.probootstrap-featured-news-box .probootstrap-text h3{font-size:18px;margin:0 0 10px;line-height:22px}.probootstrap-featured-news-box .probootstrap-text p{color:#666}.probootstrap-featured-news-box:focus,.probootstrap-featured-news-box:hover{outline:0}.probootstrap-featured-news-box:focus .probootstrap-text,.probootstrap-featured-news-box:hover .probootstrap-text{background:<?php echo $setts[0]->site_primary_color;?>;top:-40px;-webkit-box-shadow:0 2px 20px 0 rgba(0,0,0,.1);box-shadow:0 2px 20px 0 rgba(0,0,0,.1)}.probootstrap-featured-news-box:focus .probootstrap-text h3,.probootstrap-featured-news-box:hover .probootstrap-text h3{font-size:18px;margin:0 0 10px;color:#fff}.probootstrap-featured-news-box:focus .probootstrap-text p,.probootstrap-featured-news-box:hover .probootstrap-text p{color:rgba(255,255,255,.7)}.probootstrap-featured-news-box:focus .probootstrap-text .probootstrap-date,.probootstrap-featured-news-box:focus .probootstrap-text .probootstrap-location,.probootstrap-featured-news-box:hover .probootstrap-text .probootstrap-date,.probootstrap-featured-news-box:hover .probootstrap-text .probootstrap-location{color:rgba(255,255,255,.8)}.probootstrap-featured-news-box:focus .probootstrap-text .probootstrap-date i,.probootstrap-featured-news-box:focus .probootstrap-text .probootstrap-location i,.probootstrap-featured-news-box:hover .probootstrap-text .probootstrap-date i,.probootstrap-featured-news-box:hover .probootstrap-text .probootstrap-location i{color:rgba(255,255,255,.4)}.service{margin-bottom:30px;float:left;width:100%;padding:40px;border:1px solid rgba(0,0,0,.1)}.service .icon{display:block;margin-bottom:30px}.service .icon i{font-size:40px;color:<?php echo $setts[0]->site_primary_color;?>;}.service h3{font-size:22px;margin-bottom:20px}.service p{font-size:15px}.service.left-icon{padding:0;border:none;margin-bottom:20px!important}.service.left-icon .icon,.service.left-icon .text{display:table-cell;vertical-align:top}.service.left-icon .icon{width:70px;position:relative;top:20px}.service.left-icon .icon i{font-size:40px}.service.left-icon .text{display:table-cell}.service.left-icon h3{font-size:22px;margin-bottom:0}.service.left-icon p{font-size:14px}.service.left-icon p:last-child{margin-bottom:0}.service.hover_service{-webkit-transition:.3s all;transition:.3s all}.service.hover_service:focus,.service.hover_service:hover{-webkit-box-shadow:0 2px 20px 0 rgba(0,0,0,.1);box-shadow:0 2px 20px 0 rgba(0,0,0,.1);border:1px solid transparent}.probootstrap-service-2{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-box-shadow:0 2px 20px 0 rgba(0,0,0,.1);box-shadow:0 2px 20px 0 rgba(0,0,0,.1);margin-bottom:40px}.probootstrap-service-2 .image{width:40%;overflow:hidden;position:relative}.probootstrap-service-2 .text{width:60%;padding:20px}@media screen and (max-width:480px){.probootstrap-service-2 .image,.probootstrap-service-2 .text{width:100%}.probootstrap-service-2 .image{width:100%;height:200px}}.probootstrap-service-2 .image .image-bg{position:absolute;left:50%;top:50%;-webkit-transform:translateY(-50%) translateX(-50%);transform:translateY(-50%) translateX(-50%)}.probootstrap-service-2 .text h3{font-size:20px;margin:0}.probootstrap-service-2 .text p{margin-bottom:20px}.probootstrap-service-2 .text p:last-child{margin-bottom:0}.probootstrap-service-2 .text .probootstrap-meta{font-size:14px;color:#515151}.enrolled-count{display:block;margin-top:10px;font-size:12px;color:#515151;font-family:Montserrat,Arial,sans-serif;font-style:italic}.gal-item{margin-bottom:10px}.probootstrap-gallery{width:100%;float:left}.probootstrap-gallery figure{display:block;width:32%;margin-right:2%;float:left;margin-bottom:20px}.probootstrap-gallery figure:nth-of-type(3n+3){margin-right:0}.probootstrap-gallery figure figcaption{display:none}.probootstrap-gallery img{width:100%;height:auto}.probootstrap-gallery.four-col figure{width:23.5%;margin-right:2%;float:left}.probootstrap-gallery.four-col figure:nth-of-type(4n+4){margin-right:0}.probootstrap-gallery.three-col figure{width:32%;margin-right:2%;float:left}.probootstrap-gallery.three-col figure:nth-of-type(3n+3){margin-right:0}.probootstrap-gallery.two-col figure{width:49%;margin-right:2%;float:left}.probootstrap-gallery.two-col figure:nth-of-type(2n+2){margin-right:0}.grid-item{float:left}.gutter-sizer{width:2%}.isotope .isotope-item{-webkit-transition-duration:.6s;transition-duration:.6s;-webkit-transition-property:-webkit-transform,opacity;-webkit-transition-property:opacity,-webkit-transform;transition-property:opacity,-webkit-transform;transition-property:transform,opacity;transition-property:transform,opacity,-webkit-transform}.grid-item,.grid-sizer{margin-bottom:0}.grid-item img,.grid-sizer img{max-width:100%;margin-bottom:0;transition:all .3s ease-in-out;-moz-transition:all .3s ease-in-out;-webkit-transition:all .3s ease-in-out}.two-cols .grid-item,.two-cols .grid-sizer{width:49%}@media screen and (max-width:768px){.two-cols .grid-item,.two-cols .grid-sizer{width:49%}}@media screen and (max-width:768px) and (max-width:992px){.two-cols .grid-item img,.two-cols .grid-sizer img{margin-bottom:10px}}@media screen and (max-width:768px) and (max-width:768px){.two-cols .grid-item img,.two-cols .grid-sizer img{margin-bottom:10px}}@media screen and (max-width:480px){.two-cols .grid-item,.two-cols .grid-sizer{width:100%;margin-left:0;margin-right:0}}.three-cols .grid-item,.three-cols .grid-sizer{width:32%}@media screen and (max-width:768px){.three-cols .grid-item,.three-cols .grid-sizer{width:48%;margin-bottom:10px}}@media screen and (max-width:480px){.three-cols .grid-item,.three-cols .grid-sizer{width:100%;margin-left:0;margin-right:0}}.four-cols .grid-item,.four-cols .grid-sizer{width:23.5%}@media screen and (max-width:768px){.four-cols .grid-item,.four-cols .grid-sizer{width:32%;margin-bottom:10px}}@media screen and (max-width:480px){.four-cols .grid-item,.four-cols .grid-sizer{width:100%;margin-left:0;margin-right:0}}.probootstrap-gallery-item{padding:0;margin:0 0 20px;list-style:none;float:left;cursor:pointer;position:relative}.probootstrap-gallery-item img{max-width:100%;-webkit-transition:.3s all;transition:.3s all}.probootstrap-gallery-item a{display:block;float:left;width:100%}.probootstrap-gallery-item:hover img{opacity:.7}.probootstrap-form{margin-bottom:50px}.probootstrap-form label{font-weight:400}.probootstrap-form .form-control{height:46px;-webkit-box-shadow:none;box-shadow:none;font-size:16px;-webkit-appearance:none;-moz-appearance:none;appearance:none}.probootstrap-form .form-control:active,.probootstrap-form .form-control:focus{-webkit-box-shadow:none;box-shadow:none;border-color:<?php echo $setts[0]->site_primary_color;?>;}.probootstrap-form textarea.form-control{height:inherit;resize:vertical}.probootstrap-animate{opacity:0;visibility:hidden}.modal .modal-content{border-radius:0;border:none;position:relative;-webkit-box-shadow:0 0 40px 0 rgba(0,0,0,.2);box-shadow:0 0 40px 0 rgba(0,0,0,.2)}.modal .modal-content .close{position:absolute;top:10px;right:10px;z-index:100;font-size:26px}.modal .probootstrap-modal-flex{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap}.modal .probootstrap-modal-flex .probootstrap-modal-figure{width:40%;background-size:cover;background-position:center center;background-repeat:no-repeat}.modal .probootstrap-modal-flex .probootstrap-modal-content{width:60%;padding:40px;position:relative}@media screen and (max-width:480px){.modal .modal-content .close{top:20px;right:20px}.modal .probootstrap-modal-flex .probootstrap-modal-figure{height:200px}.modal .probootstrap-modal-flex .probootstrap-modal-content{padding-left:15px;padding-right:15px}.modal .probootstrap-modal-flex .probootstrap-modal-content,.modal .probootstrap-modal-flex .probootstrap-modal-figure{width:100%}.modal .probootstrap-modal-flex .btn{margin-bottom:10px}}.modal .probootstrap-modal-flex .form-control{height:40px}.modal .probootstrap-modal-flex .probootstrap-remember{float:left}.modal .probootstrap-modal-flex .probootstrap-forgot{float:right}.modal .probootstrap-modal-flex .form-group{position:relative}.modal .probootstrap-modal-flex .probootstrap-or{padding:10px 0;text-align:center;display:block;font-size:11px;text-transform:uppercase}.modal .probootstrap-modal-flex .probootstrap-or>span{display:block}.modal .probootstrap-modal-flex .probootstrap-or>span:before{height:1px;left:0;right:0;top:50%;background:#ccc;width:100%;content:"";position:absolute}.modal .probootstrap-modal-flex .probootstrap-or em{color:#ccc;display:inline-block;background:#fff;position:relative;z-index:2;padding:0 4px;font-style:normal}.modal .probootstrap-modal-flex .btn-connect-facebook{background:#3b5998;border-color:#3b5998;color:#fff}.modal .probootstrap-modal-flex .btn-connect-twitter{background:#1da1f2;border-color:#1da1f2;color:#fff}.modal .probootstrap-modal-flex .btn-connect-google{background:#ea4335;border-color:#ea4335;color:#fff}.modal .vertical-alignment-helper{display:table;height:100%;width:100%;pointer-events:none}.modal .vertical-align-center{display:table-cell;vertical-align:middle;pointer-events:none}.modal .modal-content{width:inherit;height:inherit;margin:0 auto;pointer-events:all}.probootstrap-contact-info{padding:0;margin:0 0 30px}.probootstrap-contact-info li{padding:0;margin:20px 0 15px;list-style:none;line-height:24px}.probootstrap-contact-info li>i,.probootstrap-contact-info li>span{vertical-align:top;display:table-cell}.probootstrap-contact-info li>i{font-size:20px;position:relative;top:2px;width:30px}.probootstrap-team{margin-bottom:30px;float:left;display:block;position:relative;overflow:hidden;z-index:2}.probootstrap-team img{-webkit-transition:.3s all;transition:.3s all;-webkit-transition-timing-function:cubic-bezier(.57,.21,.69,1.25);transition-timing-function:cubic-bezier(.57,.21,.69,1.25)}.probootstrap-team .probootstrap-team-info{visibility:hidden;opacity:0;position:absolute;top:50%;width:100%;-webkit-transform:translateY(-50%);transform:translateY(-50%);-webkit-transition:.3s all;transition:.3s all;-webkit-transition-timing-function:cubic-bezier(.57,.21,.69,1.25);transition-timing-function:cubic-bezier(.57,.21,.69,1.25);text-align:center;margin-top:20px;z-index:3;display:block}@media screen and (max-width:480px){.modal .probootstrap-modal-flex .probootstrap-forgot{float:left}.probootstrap-team{overflow:visible}.probootstrap-team img{max-width:100%}.probootstrap-team .probootstrap-team-info{position:relative;top:inherit!important;margin-top:0!important;visibility:visible;opacity:1;-webkit-transform:translateY(0);transform:translateY(0)}}.flexslider .slides>li.overlay:before,.probootstrap-team:before{content:"";top:0;left:0;bottom:0;right:0}.probootstrap-team .probootstrap-team-info h3{font-size:18px;color:#fff}.probootstrap-team .probootstrap-team-info h3 .position{display:block;font-size:14px;color:rgba(255,255,255,.4)}.probootstrap-team:before{visibility:hidden;opacity:0;position:absolute;background:rgba(0,0,0,.7);-webkit-transition:.3s all;transition:.3s all;z-index:1}.probootstrap-team:focus img,.probootstrap-team:hover img{-webkit-transform:scale(1.1);transform:scale(1.1)}.probootstrap-team:focus:before,.probootstrap-team:hover:before{visibility:visible;opacity:1}@media screen and (max-width:480px){.probootstrap-team .probootstrap-team-info h3{line-height:24px;font-size:20px;margin-top:20px;color:rgba(0,0,0,.7)}.probootstrap-team .probootstrap-team-info h3 .position{display:block;font-size:14px;color:rgba(0,0,0,.4)}.probootstrap-team:focus:before,.probootstrap-team:hover:before{display:none}}.probootstrap-team:focus .probootstrap-team-info,.probootstrap-team:hover .probootstrap-team-info{opacity:1;visibility:visible;margin-top:0}.probootstrap-flex-section{padding:7em 0}.probootstrap-flex-section.probootstrap-bg-white{background:#fff}.probootstrap-flex{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap}.probootstrap-flex .probootstrap-flex-item{width:33.3333%;padding:40px;-webkit-transition:.3s all;transition:.3s all;-webkit-transition-timing-function:cubic-bezier(.57,.21,.69,1.25);transition-timing-function:cubic-bezier(.57,.21,.69,1.25);z-index:1;position:relative;border-radius:4px}@media screen and (max-width:768px){.probootstrap-flex .probootstrap-flex-item{padding:30px;width:50%}}@media screen and (max-width:480px){.probootstrap-flex .probootstrap-flex-item{padding:20px;margin-bottom:20px}}.probootstrap-flex .probootstrap-flex-item .service,.probootstrap-flex .probootstrap-flex-item p:last-child{margin-bottom:0}.probootstrap-flex .probootstrap-flex-item.active,.probootstrap-flex .probootstrap-flex-item:focus,.probootstrap-flex .probootstrap-flex-item:hover{-webkit-box-shadow:0 0 40px 0 rgba(0,0,0,.08);box-shadow:0 0 40px 0 rgba(0,0,0,.08);z-index:2;background:#fff}.proboostrap-clients .client-logo{margin-bottom:30px}@media screen and (max-width:768px){.proboostrap-clients .client-logo{margin-bottom:30px}}.probootstrap-pricing-wrap{position:relative}.probootstrap-pricing{background:#fff;float:left;width:100%;padding:20px;text-align:center;position:relative;-webkit-box-shadow:0 0 40px 0 rgba(0,0,0,.08);box-shadow:0 0 40px 0 rgba(0,0,0,.08);z-index:2;margin-top:-200px}@media screen and (max-width:992px){.probootstrap-pricing{margin-top:0!important;margin-bottom:30px}}.probootstrap-pricing.popular{z-index:10;margin-top:-215px;padding-top:40px}@media screen and (max-width:992px){.probootstrap-pricing.popular{margin-top:0!important}}.probootstrap-pricing h3{font-size:16px;text-transform:uppercase;letter-spacing:.1em;margin-bottom:50px}.probootstrap-pricing h3>span{margin-top:10px;display:block;text-transform:none;letter-spacing:normal;color:<?php echo $setts[0]->site_primary_color;?>;font-size:14px}.probootstrap-pricing .probootstrap-price-wrap{margin-bottom:50px}.probootstrap-pricing .probootstrap-price-wrap .probootstrap-price{font-size:50px;color:<?php echo $setts[0]->site_primary_color;?>;font-weight:100;display:block;margin-bottom:10px}.probootstrap-pricing .probootstrap-price-wrap .probootstrap-price-per-month{font-size:13px}.probootstrap-pricing ul{padding:0 30px;margin:0 0 50px}@media screen and (max-width:480px){.probootstrap-flex .probootstrap-flex-item{width:100%}.probootstrap-pricing ul{padding:0 10px}}.probootstrap-pricing ul li{padding:0;margin:0 0 20px;line-height:24px;list-style:none}.probootstrap-testimony-wrap{background:#fff;border-radius:4px;padding:20px}.probootstrap-testimony-wrap figure{margin-bottom:20px}.probootstrap-testimony-wrap figure img{height:80px;width:80px!important;margin:0 auto;border-radius:50%}.probootstrap-testimony-wrap blockquote{border-left:none;padding:0;margin-bottom:0;color:#000}.probootstrap-testimony-wrap blockquote cite{margin-top:30px;display:block;font-size:14px;color:rgba(0,0,0,.3)}.probootstrap-testimony-wrap blockquote cite span{font-style:normal;color:#000;font-weight:700}.owl-carousel-testimony .item{padding-bottom:40px;padding-top:20px}.owl-carousel-testimony .probootstrap-testimony-wrap{max-width:800px;margin:0 auto}.owl-carousel-testimony .probootstrap-testimony-wrap figure{position:relative;margin:-40px 0 20px}.mt0,.owl-carousel .owl-controls,.owl-carousel-posts .owl-controls{margin-top:0}.owl-carousel-testimony .probootstrap-testimony-wrap figure img{border:7px solid #fff}.flexslider,.flexslider .slides>li,.slider-height{height:800px}.flexslider{position:relative;z-index:2;background:0 0;border:none;margin:0}.flexslider .slides>li{background-size:cover;background-position:center center;background-repeat:none}.flexslider .slides>li.overlay:before{background:rgba(0,0,0,.3);position:absolute}.flexslider .flex-control-paging{position:absolute;bottom:30px;z-index:20}@media screen and (max-width:480px){.flexslider,.flexslider .slides>li,.slider-height{height:400px}.flexslider .flex-direction-nav{display:none}}.flexslider .flex-direction-nav a{text-decoration:none;display:block;width:30px;height:30px;position:absolute;top:50%;-webkit-transform:translateY(-50%);transform:translateY(-50%);z-index:10;overflow:hidden;opacity:0;cursor:pointer;color:rgba(0,0,0,.8);text-shadow:1px 1px 0 rgba(255,255,255,.3);-webkit-transition:all .3s ease-in-out;transition:all .3s ease-in-out;background:rgba(0,0,0,.8);border-radius:0;padding:30px}.flexslider .flex-direction-nav a:before{font-family:icomoon;speak:none;font-style:normal;font-weight:400;font-variant:normal;text-transform:none;line-height:1;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;position:absolute;content:"\e929";-webkit-transition:.3s all;transition:.3s all;font-size:30px;display:inline-block;color:rgba(255,255,255,.8);left:50%;top:50%;-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}.flexslider .flex-direction-nav a.flex-next:before{content:"\e92a";left:50%;top:50%;-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}.flex-direction-nav .flex-prev{left:0}.flex-direction-nav .flex-next{right:0;text-align:right}.flexslider:hover .flex-direction-nav .flex-prev{opacity:.7;left:0}.flexslider:hover .flex-direction-nav .flex-prev:hover{opacity:1}.flexslider:hover .flex-direction-nav .flex-next{opacity:.7;right:0}.flex-control-paging li a{width:30px;height:7px;display:block;background:rgba(255,255,255,.2);cursor:pointer;text-indent:-9999px;-webkit-box-shadow:none;-o-box-shadow:none;box-shadow:none;-webkit-transition:.3s all;transition:.3s all}.flex-control-paging li a:hover{background:#333;background:rgba(255,255,255,.7)}.flex-control-paging li a.flex-active{background:#fff;cursor:default}.owl-carousel{margin-bottom:0px}.owl-carousel.border-rounded .item{border:1px solid rgba(0,0,0,.1);border-radius:4px;overflow:hidden}.owl-carousel .owl-controls .owl-nav .owl-next,.owl-carousel .owl-controls .owl-nav .owl-prev,.owl-carousel-posts .owl-controls .owl-nav .owl-next,.owl-carousel-posts .owl-controls .owl-nav .owl-prev{top:50%;-webkit-transform:translateY(-50%);transform:translateY(-50%);z-index:9999;position:absolute;-webkit-transition:.2s all;transition:.2s all}.owl-carousel-posts .owl-controls .owl-nav .owl-next,.owl-carousel-posts .owl-controls .owl-nav .owl-prev{top:24%}.owl-carousel .owl-controls .owl-nav .owl-next,.owl-carousel-posts .owl-controls .owl-nav .owl-next{right:20px}.owl-carousel .owl-controls .owl-nav .owl-prev,.owl-carousel-posts .owl-controls .owl-nav .owl-prev{left:20px}.owl-carousel-fullwidth .owl-controls .owl-nav .owl-next i,.owl-carousel-fullwidth .owl-controls .owl-nav .owl-next:hover i,.owl-carousel-fullwidth .owl-controls .owl-nav .owl-prev i,.owl-carousel-fullwidth .owl-controls .owl-nav .owl-prev:hover i,.owl-carousel-posts .owl-controls .owl-nav .owl-next i,.owl-carousel-posts .owl-controls .owl-nav .owl-next:hover i,.owl-carousel-posts .owl-controls .owl-nav .owl-prev i,.owl-carousel-posts .owl-controls .owl-nav .owl-prev:hover i{color:#000}.owl-carousel-fullwidth.fh5co-light-arrow .owl-controls .owl-nav .owl-next i,.owl-carousel-fullwidth.fh5co-light-arrow .owl-controls .owl-nav .owl-next:hover i,.owl-carousel-fullwidth.fh5co-light-arrow .owl-controls .owl-nav .owl-prev i,.owl-carousel-fullwidth.fh5co-light-arrow .owl-controls .owl-nav .owl-prev:hover i{color:#fff}.owl-theme .owl-controls .owl-nav [class*=owl-]{background:0 0!important}.owl-theme .owl-controls .owl-nav [class*=owl-] i{font-size:24px;background:rgba(0,0,0,.7)!important;padding:12px;-webkit-transition:.5s all;transition:.5s all}.mfp-no-margins .mfp-container,.mfp-no-margins img.mfp-img{padding:0}.owl-theme .owl-controls .owl-nav [class*=owl-]:focus i,.owl-theme .owl-controls .owl-nav [class*=owl-]:hover i{background:rgba(0,0,0,.7)!important}.owl-theme .owl-dots{position:absolute;bottom:-30px;width:100%;text-align:center}.owl-carousel-fullwidth.owl-theme .owl-dots,.owl-work.owl-theme .owl-dots{bottom:-30px;margin-bottom:-2.5em}.owl-theme .owl-dots .owl-dot span{width:8px;height:8px;background:rgba(0,0,0,.2);-webkit-transition:.2s all;transition:.2s all;border:2px solid transparent}.owl-theme .owl-dots .owl-dot span:hover{background:0 0;border:2px solid rgba(0,0,0,.2)}.owl-theme .owl-dots .owl-dot.active span,.owl-theme .owl-dots .owl-dot:hover span{background:0 0;border:2px solid #000}.probootstrap-testimonial:before{background:rgba(0,0,0,.7)!important}.probootstrap-testimonial .section-heading p{color:rgba(255,255,255,.9)!important}.probootstrap-testimonial .owl-theme .owl-dots .owl-dot span{background:rgba(255,255,255,.2)}.probootstrap-testimonial .owl-theme .owl-dots .owl-dot span:hover{background:0 0;border:2px solid rgba(255,255,255,.2)}.probootstrap-testimonial .owl-theme .owl-dots .owl-dot.active span,.probootstrap-testimonial .owl-theme .owl-dots .owl-dot:hover span{background:0 0;border:2px solid #fff}.mfp-fade.mfp-bg{opacity:0;-webkit-transition:all .15s ease-out;transition:all .15s ease-out}.mfp-fade.mfp-bg.mfp-ready{opacity:.8}.mfp-fade.mfp-bg.mfp-removing{opacity:0}.mfp-fade.mfp-wrap .mfp-content{opacity:0;-webkit-transition:all .15s ease-out;transition:all .15s ease-out}.mfp-fade.mfp-wrap.mfp-ready .mfp-content{opacity:1}.mfp-fade.mfp-wrap.mfp-removing .mfp-content{opacity:0}.image-link{cursor:-webkit-zoom-in;cursor:zoom-in}.mfp-with-zoom .mfp-container,.mfp-with-zoom.mfp-bg{opacity:0;-webkit-backface-visibility:hidden;-webkit-transition:all .3s ease-out;transition:all .3s ease-out}.mfp-with-zoom.mfp-ready .mfp-container{opacity:1}.mfp-with-zoom.mfp-ready.mfp-bg{opacity:.8}.mfp-with-zoom.mfp-removing .mfp-container,.mfp-with-zoom.mfp-removing.mfp-bg{opacity:0}.mfp-no-margins .mfp-figure:after{top:0;bottom:0}.mfp-title{text-align:center;padding:6px 0}.image-source-link{color:#DDD}.probootstrap-gutter0>div[class*=col-]{padding-right:0;padding-left:0}@media screen and (max-width:480px){.probootstrap-gutter0>div[class*=col-]{padding-right:15px;padding-left:15px}.probootstrap-gutter10>div[class*=col-]{padding-right:5px;padding-left:5px}}.probootstrap-gutter10>div[class*=col-]{padding-right:5px;padding-left:5px}.probootstrap-gutter40>div[class*=col-]{padding-right:20px;padding-left:20px}@media screen and (max-width:480px){.probootstrap-gutter40>div[class*=col-]{padding-right:15px;padding-left:15px}}.probootstrap-gutter60>div[class*=col-]{padding-right:30px;padding-left:30px}.mb0{margin-bottom:0}.mb10{margin-bottom:10px}.mb20{margin-bottom:20px}.mb30{margin-bottom:30px}.mb40{margin-bottom:40px}.mb50{margin-bottom:50px}.mb60{margin-bottom:60px}.mb70{margin-bottom:70px}.mb80{margin-bottom:80px}.mb90{margin-bottom:90px}.mb100{margin-bottom:100px}.mt10{margin-top:10px}.mt20{margin-top:20px}.mt30{margin-top:30px}.mt40{margin-top:40px}.mt50{margin-top:50px}.mt60{margin-top:60px}.mt70{margin-top:70px}.mt80{margin-top:80px}.mt90{margin-top:90px}.mt100{margin-top:100px}.pb0{padding-bottom:0!important}@media screen and (max-width:768px){.owl-theme .owl-controls .owl-nav{display:none}.img-sm-responsive,.img-xs-responsive{max-width:100%}}@media screen and (max-width:480px){.probootstrap-gutter60>div[class*=col-]{padding-right:15px;padding-left:15px}.col-xxs-12{float:none;width:100%}}




.no_decoration
{
text-decoration:none !important;
}



.fa-chevron-left:before,.fa-chevron-right:before
{
color:#ffffff !important;
}


.whiter
{
position:absolute;
color:#fff;
bottom:40px;
margin-left:10px;
font-weight:600;
font-size:20px;
}

.oranger
{
color:<?php echo $setts[0]->site_primary_color;?>;
position:absolute;
bottom:18px;
margin-left:10px;
font-size:13px;
font-weight:500;
}



.whiterg
{
position:absolute;
color:#fff;
bottom:70px;
margin-left:10px;
font-weight:600;
font-size:25px;
}

.orangerg
{
color:<?php echo $setts[0]->site_primary_color;?>;
position:absolute;
bottom:45px;
margin-left:10px;
font-size:16px;
font-weight:500;
}



.nav-pills>li.active>a
{
background:<?php echo $setts[0]->site_primary_color;?> !important;
}



/* editor */


.txteditor
		{
		width:100%;
		min-width:550px;
		height:250px !important;
		}
		
.mbottom20
{
margin-bottom:20px;
}		
		
/* editor */	


.campaign_item .img-responsive {
    width: 100%;
    min-height: 200px;
    object-fit: cover;
    max-height: 200px;
}

.campaign_category .img-responsive {
    width: 100%;
    min-height: 250px;
    object-fit: cover;
    max-height: 250px;
}


p span,.custom_format,.custom_format div,.custom_format div span,.custom_format span
{
font-family:Lato,Arial,sans-serif !important;
font-size:16px !important;
}


.campaign_inner .img-responsive {
    width: 100%;
    min-height: 450px;
    object-fit: cover;
    max-height: 450px;
}	




/* search box */


#search {
  position: fixed;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 100%;
  z-index:999;
  background-color: rgba(0, 0, 0, 0.9);
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-transform: translate(0px, -100%) scale(0, 0);
  -moz-transform: translate(0px, -100%) scale(0, 0);
  -o-transform: translate(0px, -100%) scale(0, 0);
  -ms-transform: translate(0px, -100%) scale(0, 0);
  transform: translate(0px, -100%) scale(0, 0);
  opacity: 0.9;
}
#search input[type="text"] {
  position: absolute;
  top: 50%;
  width: 100%;
  color: white;
  background: rgba(0, 0, 0, 0);
  font-size: 60px;
  font-weight: 300;
  text-align: center;
  border: 0px;
  margin: 0px auto;
  margin-top: -51px;
  padding-left: 30px;
  padding-right: 30px;
  outline: none;
}
#search .btn {
  position: absolute;
  top: 50%;
  left: 50%;
  margin-top: 61px;
  margin-left: -45px;
  background-color:<?php echo $setts[0]->site_primary_color;?> ;
  border: black;
}
#search .close {
  position: fixed;
  top: 15px;
  right: 15px;
  color: #fff;
  background-color: <?php echo $setts[0]->site_primary_color;?>;
  border-color: <?php echo $setts[0]->site_primary_color;?>;
  opacity: 1;
  padding: 10px 17px;
  font-size: 27px;
}
#search.open {
  -webkit-transform: translate(0px, 0px) scale(1, 1);
  -moz-transform: translate(0px, 0px) scale(1, 1);
  -o-transform: translate(0px, 0px) scale(1, 1);
  -ms-transform: translate(0px, 0px) scale(1, 1);
  transform: translate(0px, 0px) scale(1, 1);
  opacity: 1;
}

.recent_donate
{
margin-bottom:10px;
}

.recent_donate span
{
display:inline-block;
vertical-align:top;
}
.recent_donate span strong
{
font-size:15px;
margin-left:5px;
text-transform:capitalize;
}
.recent_donate span p
{
margin-left:5px;
margin-bottom:0px;
line-height:20px;
}
.recent_donate span b
{
font-weight:normal !important;
font-size:11px;
margin-left:5px;
color:#666666;
}

/* search box */


	</style>    
        
        
	
	
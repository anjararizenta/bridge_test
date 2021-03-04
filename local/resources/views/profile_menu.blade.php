 <?php 
 use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();
 $url = URL::to("/");
 if($currentPaths=="/")
 {
	 
	 $activemenu = "/";
 }
 else 
 {
	 
	 $activemenu = $currentPaths;
 }
 
 if($activemenu == "dashboard"){ $active1 = "active"; } else { $active1 = ""; }
 if($activemenu == "my-comments"){ $active2 = "active"; } else { $active2 = ""; }
 if($activemenu == "campaigns"){ $active3 = "active"; } else { $active3 = ""; }
 if($activemenu == "donations"){ $active4 = "active"; } else { $active4 = ""; }
 if($activemenu == "withdrawal-settings"){ $active5 = "active"; } else { $active5 = ""; }
 ?>
<ul class="nav nav-pills nav-stacked admin-menu">
                <li class="<?php echo $active1;?>"><a href="<?php echo $url;?>/dashboard"><i class="fa fa-home fa-fw"></i>Account Settings</a></li>
                 <?php if(Auth::user()->admin!=1){?>
                <li class="<?php echo $active2;?>"><a href="<?php echo $url;?>/my-comments"><i class="fa fa-table fa-fw"></i>My comments </a></li>
                <li class="<?php echo $active3;?>"><a href="<?php echo $url;?>/campaigns"><i class="fa fa-file-o fa-fw"></i>My Campaigns</a></li>
                <li class="<?php echo $active4;?>"><a href="<?php echo $url;?>/donations"><i class="fa fa-money fa-fw"></i>My Donations</a></li>
                <li class="<?php echo $active5;?>"><a href="<?php echo $url;?>/withdrawal-settings"><i class="fa fa-cogs fa-fw"></i>Withdrawal Settings</a></li>
               <?php } ?>
                <li><a href="<?php echo $url;?>/logout"><i class="fa fa-sign-out"></i>Log Out</a></li>
            </ul>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Your payment approved successfully</title>

  
	




</head>
<body>

   

    
    

	
    
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div class="container">
	 <h1><?php echo $site_name;?> - Your payment approved successfully</h1>
	 
	 
	
	 
	 
	 <div class="clearfix"></div>
	 
	 <div class="row profile shop">
		<div class="col-md-6">
	 
	 
	
	<div id="outer" style="width: 100%;margin: 0 auto;background-color:#cccccc; padding:10px;">  
	
	
	<div id="inner" style="width: 80%;margin: 0 auto;background-color: #fff;font-family: Open Sans,Arial,sans-serif;font-size: 13px;
	font-weight: normal;line-height: 1.4em;color: #444;margin-top: 10px; padding:10px;">
			<div style="background:#22313F;padding:15px 10px 10px 10px;">
			<?php if(!empty($site_logo)){?>
			<div align="center"><img src="<?php echo $site_logo;?>" border="0" alt="logo" /></div>
			<?php } else { ?>
			<div align="center"><h2><?php echo $site_name;?></h2></div>
			<?php } ?>
            </div>
			
			<h3> Your payment approved successfully</h3>
			<p> Booking Id - <?php echo $reference_id;?></p>
			<p> User Name - <?php echo $username;?></p> 	
			<p> Price - <?php echo $get_price;?></p> 	
			<p> Payment date  - <?php echo $payment_date;?></p> 
			<p> Payment type - <?php echo $payment_type;?></p> 
            <p> Job Title - <a href="<?php echo $url;?>/seller/<?php echo $shop_id;?>/<?php echo $post_slug;?>"><?php echo $title;?></a></p>			
			
	
	
	</div>
	</div>
	 
	 
	 
	
	 
	 
	
	
	
	
	 
	 
	 
	 
	 
	 <div class="height30"></div>
	 <div class="row">
	
	
	
	
	
	</div>
	
	</div>
	

      
</body>
</html>
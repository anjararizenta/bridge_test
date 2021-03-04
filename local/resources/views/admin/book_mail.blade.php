<!DOCTYPE html>
<html lang="en">
<head>

    <title>Payment Created</title>

  
	




</head>
<body>

   

    
    

	
    
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div class="container">
	 <h1><?php echo $site_name;?> - Payment Approved</h1>
	 
	 
	
	 
	 
	 <div class="clearfix"></div>
	 
	 <div class="row profile shop">
		<div class="col-md-6">
	 
	 
	
	<div id="outer" style="width: 100%;margin: 0 auto;background-color:#cccccc; padding:10px;">  
	
	
	<div id="inner" style="width: 80%;margin: 0 auto;background-color: #fff;font-family: Open Sans,Arial,sans-serif;font-size: 13px;
	font-weight: normal;line-height: 1.4em;color: #444;margin-top: 10px; padding:10px;">
			<?php if(!empty($site_logo)){?>
			<div align="center"><img src="<?php echo $site_logo;?>" border="0" alt="logo" /></div>
			<?php } else { ?>
			<div align="center"><h2><?php echo $site_name;?></h2></div>
			<?php } ?>
			
			
			
			
			
			<h3> Your payment approved successfully</h3>
			<p> Shop Name - <?php echo $shop_name;?></p>
			<p> Service Name - <?php echo $ser_name;?></p> 	
			<p> Booking Date - <?php echo $book_date;?></p> 	
			<p> Booking Time - <?php echo $book_time;?></p> 	
			<p> Booking Email - <?php echo $book_email;?></p> 	
			<p> Booking Address - <?php echo $book_address;?></p> 	
			<p> Booking City - <?php echo $book_city;?></p> 	
			<p> Boking Pincode - <?php echo $book_pincode;?></p> 
            <p> Amount - <?php echo $total_amount;?></p> 	
			<p> Submitted Date - <?php echo $submit_date;?></p> 	
			
			
			
	
	
	
	
	</div>
	</div>
	 
	 
	 
	
	 
	 
	
	
	
	
	 
	 
	 
	 
	 
	 <div class="height30"></div>
	 <div class="row">
	
	
	
	
	
	</div>
	
	</div>
	

      
</body>
</html>
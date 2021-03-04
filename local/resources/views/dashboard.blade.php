<!DOCTYPE html>
<html lang="en">
<head>

   

   @include('style')
	




</head>
<body>

    <?php $url = URL::to("/"); ?>

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
    

    

	
    
	<section class="probootstrap-hero probootstrap-hero-inner jumbotron-cover" style="background-image: url(<?php echo $url;?>/local/resources/views/theme/img/header_new.jpg); background-position:center;"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                <h1 class="probootstrap-heading probootstrap-animate">Account Settings</h1>
              </div>
            </div>
          </div>
        </div>
      </section>
	
	
    
	
	
	
	
	
	
	
	
	
	
	
	
	
	 
	 
	 <section class="probootstrap-section">
        <div class="container">
        
        
        
        
        
        
        <div class="col-md-12">
        
        <div class="row">
        
	 @if(Session::has('success'))

	    <div class="alert alert-success">

	      {{ Session::get('success') }}

	    </div>

	@endif


	
	
 	@if(Session::has('error'))

	    <div class="alert alert-danger">

	      {{ Session::get('error') }}

	    </div>

	@endif
	 
     </div>
     
     
     
    <div class="row">
        <div class="col-md-3">
            @include('profile_menu')
        </div>
        <div class="col-md-9 well admin-content" id="account_settings">
            
            <form class="form-horizontal" role="form" method="POST" action="{{ route('dashboard') }}" id="formID" enctype="multipart/form-data">
                        {{ csrf_field() }}
<div class="height20"></div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control validate[required] text-input radiusoff" name="name" <?php if($editprofile[0]->provider!=""){?>readonly<?php } ?> value="<?php echo $editprofile[0]->name;?>">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control validate[required,custom[email]] text-input radiusoff" <?php if($editprofile[0]->provider!=""){?>readonly<?php } ?> name="email" value="<?php echo $editprofile[0]->email;?>">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                       
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control radiusoff" <?php if($editprofile[0]->provider!=""){?>readonly<?php } ?> name="password" value="">

                                
                            </div>
                        </div>

                        
						
						<input type="hidden" name="savepassword" value="<?php echo $editprofile[0]->password;?>">
						
						 <input type="hidden" name="id" value="<?php echo $editprofile[0]->id; ?>">
						
						 <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone No</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control validate[required] text-input radiusoff" value="<?php echo $editprofile[0]->phone;?>" name="phone">
								@if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						
						
						<div class="form-group">
                            <label for="gender" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
							<select name="gender" class="form-control validate[required] text-input radiusoff">
							  
							  <option value=""></option>
							   <option value="male" <?php if($editprofile[0]->gender=='male'){?> selected="selected" <?php } ?>>Male</option>
							   <option value="female" <?php if($editprofile[0]->gender=='female'){?> selected="selected" <?php } ?>>Female</option>
							</select>
                               
                            </div>
                        </div>
                        
                        
                        <?php
						$countries = array(
	'Afghanistan',
	'Albania',
	'Algeria',
	'American Samoa',
	'Andorra',
	'Angola',
	'Anguilla',
	'Antarctica',
	'Antigua and Barbuda',
	'Argentina',
	'Armenia',
	'Aruba',
	'Australia',
	'Austria',
	'Azerbaijan',
	'Bahamas',
	'Bahrain',
	'Bangladesh',
	'Barbados',
	'Belarus',
	'Belgium',
	'Belize',
	'Benin',
	'Bermuda',
	'Bhutan',
	'Bolivia',
	'Bosnia and Herzegowina',
	'Botswana',
	'Bouvet Island',
	'Brazil',
	'British Indian Ocean Territory',
	'Brunei Darussalam',
	'Bulgaria',
	'Burkina Faso',
	'Burundi',
	'Cambodia',
	'Cameroon',
	'Canada',
	'Cape Verde',
	'Cayman Islands',
	'Central African Republic',
	'Chad',
	'Chile',
	'China',
	'Christmas Island',
	'Cocos (Keeling) Islands',
	'Colombia',
	'Comoros',
	'Congo',
	'Congo, the Democratic Republic of the',
	'Cook Islands',
	'Costa Rica',
	'Cote d\'Ivoire',
	'Croatia (Hrvatska)',
	'Cuba',
	'Cyprus',
	'Czech Republic',
	'Denmark',
	'Djibouti',
	'Dominica',
	'Dominican Republic',
	'East Timor',
	'Ecuador',
	'Egypt',
	'El Salvador',
	'Equatorial Guinea',
	'Eritrea',
	'Estonia',
	'Ethiopia',
	'Falkland Islands (Malvinas)',
	'Faroe Islands',
	'Fiji',
	'Finland',
	'France',
	'France Metropolitan',
	'French Guiana',
	'French Polynesia',
	'French Southern Territories',
	'Gabon',
	'Gambia',
	'Georgia',
	'Germany',
	'Ghana',
	'Gibraltar',
	'Greece',
	'Greenland',
	'Grenada',
	'Guadeloupe',
	'Guam',
	'Guatemala',
	'Guinea',
	'Guinea-Bissau',
	'Guyana',
	'Haiti',
	'Heard and Mc Donald Islands',
	'Holy See (Vatican City State)',
	'Honduras',
	'Hong Kong',
	'Hungary',
	'Iceland',
	'India',
	'Indonesia',
	'Iran (Islamic Republic of)',
	'Iraq',
	'Ireland',
	'Israel',
	'Italy',
	'Jamaica',
	'Japan',
	'Jordan',
	'Kazakhstan',
	'Kenya',
	'Kiribati',
	'Korea, Democratic People\'s Republic of',
	'Korea, Republic of',
	'Kuwait',
	'Kyrgyzstan',
	'Lao, People\'s Democratic Republic',
	'Latvia',
	'Lebanon',
	'Lesotho',
	'Liberia',
	'Libyan Arab Jamahiriya',
	'Liechtenstein',
	'Lithuania',
	'Luxembourg',
	'Macau',
	'Macedonia, The Former Yugoslav Republic of',
	'Madagascar',
	'Malawi',
	'Malaysia',
	'Maldives',
	'Mali',
	'Malta',
	'Marshall Islands',
	'Martinique',
	'Mauritania',
	'Mauritius',
	'Mayotte',
	'Mexico',
	'Micronesia, Federated States of',
	'Moldova, Republic of',
	'Monaco',
	'Mongolia',
	'Montserrat',
	'Morocco',
	'Mozambique',
	'Myanmar',
	'Namibia',
	'Nauru',
	'Nepal',
	'Netherlands',
	'Netherlands Antilles',
	'New Caledonia',
	'New Zealand',
	'Nicaragua',
	'Niger',
	'Nigeria',
	'Niue',
	'Norfolk Island',
	'Northern Mariana Islands',
	'Norway',
	'Oman',
	'Pakistan',
	'Palau',
	'Panama',
	'Papua New Guinea',
	'Paraguay',
	'Peru',
	'Philippines',
	'Pitcairn',
	'Poland',
	'Portugal',
	'Puerto Rico',
	'Qatar',
	'Reunion',
	'Romania',
	'Russian Federation',
	'Rwanda',
	'Saint Kitts and Nevis',
	'Saint Lucia',
	'Saint Vincent and the Grenadines',
	'Samoa',
	'San Marino',
	'Sao Tome and Principe',
	'Saudi Arabia',
	'Senegal',
	'Seychelles',
	'Sierra Leone',
	'Singapore',
	'Slovakia (Slovak Republic)',
	'Slovenia',
	'Solomon Islands',
	'Somalia',
	'South Africa',
	'South Georgia and the South Sandwich Islands',
	'Spain',
	'Sri Lanka',
	'St. Helena',
	'St. Pierre and Miquelon',
	'Sudan',
	'Suriname',
	'Svalbard and Jan Mayen Islands',
	'Swaziland',
	'Sweden',
	'Switzerland',
	'Syrian Arab Republic',
	'Taiwan, Province of China',
	'Tajikistan',
	'Tanzania, United Republic of',
	'Thailand',
	'Togo',
	'Tokelau',
	'Tonga',
	'Trinidad and Tobago',
	'Tunisia',
	'Turkey',
	'Turkmenistan',
	'Turks and Caicos Islands',
	'Tuvalu',
	'Uganda',
	'Ukraine',
	'United Arab Emirates',
	'United Kingdom',
	'United States',
	'United States Minor Outlying Islands',
	'Uruguay',
	'Uzbekistan',
	'Vanuatu',
	'Venezuela',
	'Vietnam',
	'Virgin Islands (British)',
	'Virgin Islands (U.S.)',
	'Wallis and Futuna Islands',
	'Western Sahara',
	'Yemen',
	'Yugoslavia',
	'Zambia',
	'Zimbabwe'
);
?>
                        
                         <div class="form-group">
                            <label for="gender" class="col-md-4 control-label para black">Country</label>

                            <div class="col-md-6">
							<select name="country" class="form-control validate[required] radiusoff" required>
							  
							  <option value=""></option>
							  <?php foreach($countries as $country){?>
                              <option value="<?php echo $country;?>" <?php if($country==$editprofile[0]->country){?> selected <?php } ?>><?php echo $country;?></option>
                              <?php } ?>
							</select>
                               
                            </div>
                        </div>
						
						
						
						
						<div class="form-group">
                            <label for="phoneno" class="col-md-4 control-label">Photo</label>

                            <div class="col-md-6">
                                <input type="file" id="photo" name="photo" class="form-control radiusoff">
								@if ($errors->has('photo'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                                <br/>
                                <?php 
				$url = URL::to("/");
				$userphoto="/media/";
						$path ='/local/images'.$userphoto.$editprofile[0]->photo;
						if($editprofile[0]->photo!=""){?>
					<img src="<?php echo $url.$path;?>" class="img-responsive" alt="" style="max-width:100px;">
						<?php } else { ?>
						<img src="<?php echo $url.'/local/images/nophoto.jpg';?>" class="img-responsive" alt="" style="max-width:100px;">
						<?php } ?>
                            </div>
                        </div>
						
						
						<input type="hidden" name="currentphoto" value="<?php echo $editprofile[0]->photo;?>">
						
						
						<input type="hidden" name="usertype" value="<?php echo $editprofile[0]->admin;?>">
                        
                        <input type="hidden" name="save_gender" value="<?php echo $editprofile[0]->gender;?>">
						

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
							<?php if(config('global.demosite')=="yes"){?><button type="button" class="btn btn-primary">Update</button> <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
							
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
							<?php } ?>
                            </div>
                        </div>
                    </form>
            
            
        </div>
        
        
        <?php /*?><div class="col-md-9 well admin-content" id="Profile">
            Widgets
        </div>
        <div class="col-md-9 well admin-content" id="Activity">
            Pages
        </div>
        <div class="col-md-9 well admin-content" id="Devices">
            Charts
        </div>
        <div class="col-md-9 well admin-content" id="Messaging">
            Table
        </div>
        <div class="col-md-9 well admin-content" id="InstallationJobs">
            Forms
        </div><?php */?>
        
    </div>


     
     
     
     
	 
	 
	 
	 
	 
    


	 
	 
	  
            
            
            
        </div>
   
    </section>



      @include('footer')
</body>
</html>
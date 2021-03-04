@extends('layouts.app')

@section('content')

	

<?php $url = URL::to("/"); ?>






<section class="probootstrap-hero probootstrap-hero-inner jumbotron-cover" style="background-image: url(<?php echo $url;?>/local/resources/views/theme/img/header_new.jpg); background-position:center;"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                <h1 class="probootstrap-heading probootstrap-animate">Login</h1>
              </div>
            </div>
          </div>
        </div>
      </section>







    
        
        <section class="probootstrap-section">
        <div class="container">
        
        
        
        
        <div class="col-md-3"></div>
        
        <div class="col-md-6">
        
        <div class="">
	
	
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
        
        
            <div class="panel panel-default ">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                   




                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4">Username / Email</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control radiusoff" name="username" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control radiusoff" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label class="para black">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                               
                                <input name="" type="submit" value="Login" class="btn btn-primary">

                                <a class="btn btn-link para gold" href="{{ route('forgot-password') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                      <?php /*?><div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <a href="{{ url('/login/facebook') }}"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a>
        <a href="{{ url('/login/twitter') }}"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
        <a href="{{ url('/login/github') }}"><i class="fa fa-github" aria-hidden="true"></i> Github</a>
   <a href="{{ url('/login/google') }}" class="">google-plus</i></a>
                             
                             
                             <a href="<?php echo $url;?>/login/facebook" class="">facebook</i></a>
<a href="<?php echo $url;?>/login/twitter" class="">twitter</i></a>
<a href="<?php echo $url;?>/login/google" class="">google-plus</i></a>
<a href="<?php echo $url;?>/login/linkedin" class="">linkedin</i></a>
<a href="<?php echo $url;?>/login/github" class="">github</i></a>
</div>
                        </div><?php */?> 
                        
                        
                        <?php /*?><div class="form-group">
                            <div align="center">
                            
                            <div class="ffleft">
                            <a href="{{ url('/login/facebook') }}">

<img src="<?php echo $url;?>/local/images/facebook_btn.png" border="0" alt="facebook login" class="img-responsive" />
</a></div>
        
       <div class="ffleft"> 
   <a href="{{ url('/login/google') }}" class="">
<img src="<?php echo $url;?>/local/images/google_btn.png" border="0" alt="google plus login" class="img-responsive" />
</a></div>
                            
</div>
                        </div><?php */?>
                                       
                      </form>
                </div>
            </div>
            
            </div>
            
            <div class="col-md-3"></div>
            
            
            
        </div>
   
    </section>





	
	
	
@include('footer')
@endsection

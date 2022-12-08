
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Fasilitas Kesehatan</title>
  <!-- loader-->
  <!--favicon-->
  <link rel="icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="{{ asset('assets/login/assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{ asset('assets/login/assets/css/animate.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{ asset('assets/login/assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="{{ asset('assets/login/assets/css/app-style.css') }}" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme1">

<!-- start loader -->
 <div id="wrapper">

 <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
	<div class="card card-authentication1 mx-auto my-5">
		<div class="card-body">
		 <div class="card-content p-2">
		 	<div class="text-center">
		 		<img src="{{ asset('assets/images/logo.png') }}" width="100" alt="logo icon">
		 	</div>
		  <div class="card-title text-uppercase text-center py-3" style="margin-bottom: 0px !important;">Login Disini</div>
        <div class="text-center" style="margin-bottom:25px !important;">
            <a href="">Silahkan masukan email dan password anda yang sudah terdaftar di aplikasi</a>
        </div>
		    <form accept="{{ route('login') }}" method="POST">
          @csrf
          <div class="form-group" style="margin-bottom: 20px !important;">
            <label for="exampleInputUsername" class="sr-only">E-Mail</label>
            <div class="position-relative has-icon-right">
                <input type="email" name="email" id="exampleInputUsername" class="form-control input-shadow" placeholder="masukan emai">
                <div class="form-control-position">
                  <i class="icon-user"></i>
                </div>
            </div>
          </div>
          <div class="form-group" style="margin-bottom: 20px !important;">
            <label for="exampleInputPassword" class="sr-only">Password</label>
            <div class="position-relative has-icon-right">
                <input type="password" name="password" id="exampleInputPassword" class="form-control input-shadow" placeholder="masukan password">
                <div class="form-control-position">
                  <i class="icon-lock"></i>
                </div>
            </div>
          </div>
          <button type="submit" class="btn btn-light btn-block">Sign In</button>
        </form>
        </div>
		  </div>
		  <div class="card-footer text-center py-3">
		    <p class="text-warning mb-0">Belum memiliki akun? <a href="register.html"> Daftar disini</a></p>
		  </div>
	     </div>
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
		<li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
      
     </div>
   </div>
  <!--end color switcher-->
	
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('assets/login/assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/login/assets/js/popper.min.js') }}"></script>
  <script src="{{ asset('assets/login/assets/js/bootstrap.min.js') }}"></script>
	
  <!-- sidebar-menu js -->
  <script src="{{ asset('assets/login/assets/js/sidebar-menu.js') }}"></script>
  
  <!-- Custom scripts -->
  <script src="{{ asset('assets/login/assets/js/app-script.js') }}"></script>
  
</body>
</html>

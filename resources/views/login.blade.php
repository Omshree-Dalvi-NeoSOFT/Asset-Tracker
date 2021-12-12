<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Asset Tracker</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Sign In</h3>
              <p class="mb-4">l WILL HAVE AN ADMINISTRATIVE SYSTEM WHERE THERE IS NO WAY TO EXTRICATE RED.</p>
            </div>
            @if(Session::has('success'))
                <div class="alert alert-success"> {{Session::get('success') }} </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger"> {{Session::get('error')}} </div>
            @endif
            <form action="{{route('PostLogin')}}" method="post">
                @csrf()
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">
              </div>
                @if($errors->has('username'))
                    <label class="text-danger">{{$errors->first('username')}}</label>
                @endif

              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
                @if($errors->has('password'))
                    <label class="text-danger">{{$errors->first('password')}}</label>
                @endif
                
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-primary">

              <span class="d-block text-left my-4 text-muted">&mdash; or login with &mdash;</span>
              
              <div class="social-login">
                <a href="#" class="facebook">
                  <span class="icon-facebook mr-3"></span> 
                </a>
                <a href="#" class="twitter">
                  <span class="icon-twitter mr-3"></span> 
                </a>
                <a href="#" class="google">
                  <span class="icon-google mr-3"></span> 
                </a>
              </div>
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
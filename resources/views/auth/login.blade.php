<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/paper_img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
    <title>Login | SIPTAS</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="author" content="Sreejith BS">
    
    <!-- Style-CSS --> 
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset ('assets/css/login_register.css')}}" type="text/css" media="all" /> 

    <!--     Fonts and icons     -->
    <link rel="shortcut icon" href="{{asset('Assets/images/icon.png')}}" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>    
</head>

<body>
    <nav class="navbar navbar-ct-transparent navbar-fixed-top" role="navigation-demo" id="register-navbar">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{url("/Assets/images/maxvolum.png")}}" width="120px" class="navbar">
                </div>
               
            </div>
            
          
        </div>
    
      </div><!-- /.container-->
    </nav> 
    
    <div class="wrapper">
        <div class="register-background"> 
            <div class="filter-black"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
                            <div class="register-card">
                                {{-- <center>
                                <img src="{{url("/Assets/images/unu.png")}}" width="150px" class="text-center">
                            </center> --}}
                                <h3 class="title"><b>SIPTAS</b></h3>
                                @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    <small><strong>Login Gagal!</strong> {{session('error')}}</small>
                                </div>
                                @endif
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                 {{ csrf_field() }}
                                    <label>Username</label>
                                    <input id="name" type="name" name="name" class="form-control" placeholder="Username" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif

                                    <label>Password</label>
                                    <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    
                                    <input type="submit" class="btn btn-primary btn-block" value="Login" />
                                </form>
                                {{-- <div class="forgot">

                                    <a href="{{ route('register') }}" class="btn btn-simple btn-danger">Don't have an account ? Sign Up</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>     
            <div class="footer register-footer text-center">
                    <h6>&copy; <script>document.write(new Date().getFullYear())</script> | Ikhsan</h6>
            </div>
        </div>
    </div>      

</body>

<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

</html>
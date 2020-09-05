
<!DOCTYPE html>
<html>
<head>
  <title>login</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>



<body>

<style>  
    body {
    margin: 0;
    padding: 0;
    background-color: #17a2b8;
    height: 100vh;
    }
    #login .container #login-row #login-column #login-box {
    margin-top: 120px;
    max-width: 600px;
    height: 320px;
    border: 1px solid #9C9C9C;
    background-color: #EAEAEA;
    }
    #login .container #login-row #login-column #login-box #login-form {
    padding: 20px;
    }
    #login .container #login-row #login-column #login-box #login-form #register-link {
    margin-top: -85px;
    }
</style>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Pasticceria del Corso</h3>
        <div class="container">
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    {{$errors->first()}}
                </div>
            @endif
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                       <form class="login-form" action="{{ route('admin.login.post') }}" method="POST" role="form">
                            @csrf
                            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Login</h3>
                            <div class="form-group">
                                <label class="control-label" for="email">Email Address</label>
                                <input class="form-control" type="email" id="email" name="email" placeholder="Email address" autofocus value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input class="form-control" type="password" id="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group btn-container">
                                <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

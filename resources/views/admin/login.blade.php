<!DOCTYPE html>
<html>
<head>
<title>Admin Login || Price</title>
<link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/login.css') }}" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
</head>
<body class="bg agileinfo">
   <h1 class="white-text text-center">Login Please </h1>
   <div class="w3layouts_main wrap">
        <div id="parentHorizontalTab_agile">
            <div class="resp-tabs-container hor_1">
               <div class="w3_agile_login">
                    <form action="{{ route('login')}}" method="post" class="agile_form">
                      {{ csrf_field() }}
					            <p>Email</p>
					            <input type="email" name="email" required="required" />
					            <p>Password</p>
					            <input type="password" name="password" required="required" class="password" />
					            <input type="submit" value="LogIn" class="agileinfo" />
					          </form>
                    @if(count($errors) > 0)
                      <div class="container-fluid">
                        <div class="alert alert-danger">
                          <strong>Errors:</strong>
                          <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                        </div>
                      </div>
                    @endif
              </div>
            </div>
        </div>
    </div>
</body>
</html>

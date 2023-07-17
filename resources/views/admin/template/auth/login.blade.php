<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/main.css') }}" />

    <!-- Index CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/index.css') }}" />
    
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/font-awesome/4.7.0/css/font-awesome.min.css') }}" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Login - Vali Admin</title>
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    @if(session()->has('warning'))
        <div class="alert alert-danger">
            {{ session()->get('warning') }}
        </div>
    @endif
    <div class="logo">
        <h1>Thời Trang C665</h1>
    </div>
    <div class="login-box">
        <form class="login-form"
              action="{{route('admin.login')}} "
              method="POST"
              enctype="multipart/form-data">
            @csrf
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>

            <div class="form-group">
                <label class="control-label">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Email" autofocus>
            </div>
            <div class="form-group">
                <label class="control-label">PASSWORD</label>
                <input class="form-control" type="password" name="password"  placeholder="Password">
            </div>

            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
            </div>
        </form>
    </div>
</section>
</body>
</html>


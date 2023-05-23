@extends('admin.app')

@section('content')
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


    <h1 class="text-center mt-5" >Đăng nhập quản trị</h1>
    <form style="max-width:875px;margin:auto;" action="{{route('admin.login')}} " method="POST"
          enctype="multipart/form-data">
        @csrf
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Email</label>
            <input type="email"  name="email" id="form2Example1" class="form-control" required />
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Password</label>
            <input type="password" name="password" id="form2Example2" class="form-control" required />
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-dark btn-block mb-4 w-100">Sign in</button>
    </form>
@endsection

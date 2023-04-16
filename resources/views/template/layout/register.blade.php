{{-- @extends('layouts.client')
@section('content')
@if(session()->has('warning'))
    <div class="alert alert-danger">
        {{ session()->get('warning') }}
    </div>
@endif

<h1 class="text-center mt-5" >Đăng ký</h1>

<form style="max-width:875px;margin:auto;" action="{{route('account_register')}} " method="POST"
enctype="multipart/form-data">
    @csrf

    <!-- Username input -->
    <div class="form-outline mb-1">
        <label class="form-label" for="registerUsername">Username</label>
        <input type="text" id="registerUsername" name="username" class="form-control" required/>
    </div>

    <!-- Fullname input -->
    <div class="form-outline mb-1">
        <label class="form-label" for="registerUsername">Fullname</label>
        <input type="text" id="registerUsername" name="fullname" class="form-control" required/>
    </div>

    <!-- Email input -->
    <div class="form-outline mb-1">
        <label class="form-label" for="registerEmail">Email</label>
        <input type="email" id="registerEmail" name="email"  class="form-control" required/>
    </div>

    <!-- Phone input -->
    <div class="form-outline mb-1">
        <label class="form-label" for="registerPhone">Phone</label>
        <input type="phone" id="registerPhone" name="phone"  class="form-control" required/>
    </div>

    <!-- Password input -->
    <div class="form-outline mb-1">
        <label class="form-label" for="registerPassword">Password</label>
        <input type="password" id="registerPassword" name="password" class="form-control" required/>
    </div>


    <!-- Checkbox -->
    <div class="form-check d-flex justify-content-center mb-3">
        <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
            aria-describedby="registerCheckHelpText" />
        <label class="form-check-label" for="registerCheck">
            I have read and agree to the terms
        </label>
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-dark btn-block mb-1 w-100">Register</button>

    <!-- Register buttons -->
    <div class="text-center">
        <p>or sign up with:</p>
        <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-facebook-f"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-google"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-twitter"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-github"></i>
        </button>
    </div>
</form>

@endsection --}}

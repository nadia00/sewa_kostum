@extends('layouts.master')

@section('content')

<<<<<<< HEAD
    <div id="content">
        <div class="container">

            <div class="col-md-6 col-md-offset-3">
                <div class="box">
                    <h1>New account</h1>

                    <p class="lead">Not registered yet?</p>
                    <p>With registration with us, you can rent costumes easily! The whole process will not take you more than a minute!</p>
                    <p class="text-muted">Already have an account? <a href="{{ route('login') }}">Sign In</a></p>

                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="email-modal" required autofocus>
=======
                <div class="card-body">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="email-modal" placeholder="email" required autofocus>
>>>>>>> 48e35bfb1baf557eafa08c0e4523c3a5233cdaeb
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
<<<<<<< HEAD
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" id="first-name-modal" required autofocus>
=======
                            <input type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" id="first-name-modal" placeholder="first name" required autofocus>
>>>>>>> 48e35bfb1baf557eafa08c0e4523c3a5233cdaeb
                            @if ($errors->has('first_name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
<<<<<<< HEAD
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" id="last-name-modal" required autofocus>
=======
                            <input type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" id="last-name-modal" placeholder="last name" required autofocus>
>>>>>>> 48e35bfb1baf557eafa08c0e4523c3a5233cdaeb
                            @if ($errors->has('last_name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->last('last_name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
<<<<<<< HEAD
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}" id="phone-number-modal" required autofocus>
=======
                            <input type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}" id="phone-number-modal" placeholder="phone number" required autofocus>
>>>>>>> 48e35bfb1baf557eafa08c0e4523c3a5233cdaeb
                            @if ($errors->has('phone_number'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
<<<<<<< HEAD
                            <label for="date_of_birth">Date of birth</label>
                            <input type="date" class="form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}" name="date_of_birth" value="{{ old('date_of_birth') }}" id="birth-modal" required autofocus>
=======
                            <input type="date" class="form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}" name="date_of_birth" value="{{ old('date_of_birth') }}" id="birth-modal" placeholder="date of birth" required autofocus>
>>>>>>> 48e35bfb1baf557eafa08c0e4523c3a5233cdaeb
                            @if ($errors->has('date_of_birth'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('date_of_birth') }}</strong>
                                </span>
                            @endif
<<<<<<< HEAD
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password-modal" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" id="password-modal" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
=======
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password-modal" placeholder="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" id="password-modal" placeholder="confirm-password" required>
>>>>>>> 48e35bfb1baf557eafa08c0e4523c3a5233cdaeb
                        </div>

                        <p class="text-center">
                            <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Register</button>
                        </p>

                    </form>
                </div>
            </div>




        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->

@endsection




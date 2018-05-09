@extends('layouts.header-footer')

@section('content')			
<section class="main-content">				
    <div class="row">
        <div class="span5">					
            <h4 class="title"><span class="text"><strong>Login</strong> Form</span></h4>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="hidden" name="next" value="/">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Username</label>
                        <div class="controls">
                            <input type="text" placeholder="Enter your username" id="username" class="input-xlarge form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input type="password" placeholder="Enter your password" id="password" class="input-xlarge form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="control-group">
                        <input tabindex="3" class="btn btn-inverse large" type="submit" value="Sign into your account">
                        <hr>
                        <p class="reset">Recover your <a tabindex="4" href="#" title="Recover your username or password">username or password</a></p>
                    </div>
                </fieldset>
            </form>				
        </div>


        <div class="span7">					
            <h4 class="title"><span class="text"><strong>Register</strong> Form</span></h4>
            <form method="POST" action="{{ route('register') }}" class="form-stacked">
                @csrf
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Fullname</label>
                        <div class="controls">
                            <input type="text" placeholder="Enter your fullname" class="input-xlarge form-control{{ $errors->has('fullname') ? ' is-invalid' : '' }}" name="fullname" value="{{ old('fullname') }}" required autofocus>
                            @if ($errors->has('fullname'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('fullname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email address:</label>
                        <div class="controls">
                            <input type="email" placeholder="Enter your email" class="input-xlarge form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="control-group">
                            <label class="control-label">No. Telepon</label>
                            <div class="controls">
                                <input type="number" placeholder="Enter your phone" class="input-xlarnotege form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <div class="control-group">
                        <label class="control-label">Password:</label>
                        <div class="controls">
                            <input type="password" placeholder="Enter your password" class="input-xlarge form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Confirm Password:</label>
                        <div class="controls">
                            <input type="password" placeholder="Enter the same password" class="input-xlarge form-control" name="password_confirmation" required>
                        </div>
                    </div>							                            
                    <div class="control-group">
                        <p>Now that we know who you are. I'm not a mistake! In a comic, you know how you can tell who the arch-villain's going to be?</p>
                    </div>
                    <hr>
                    <div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="Create your account"></div>
                </fieldset>
            </form>					
        </div>				
    </div>
</section>			
@endsection
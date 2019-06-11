@extends(($agent->isMobile()) ? 'layouts.mobile-layout' : 'layouts.app')


@section('title', 'Login | QuickList')
@section('content')
<div class="body-content">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="text-center pt-3">
                    <h2>{{ __('Login') }}</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group ">
                            <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-12 col-form-label text-md-left">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group font-12">
                            <div class="col-md-12 ">
                                <div class="form-check d-inline">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <div class="form-check d-inline float-right">
                                    @if (Route::has('password.request'))
                                        <a class="" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-success col-md-12">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="col-md-12 mt-1">
                                <a href="{{ url('/login/facebook') }}" class="btn btn-primary col-md-12">
                                    <strong>Login With Facebook</strong>
                                </a> 
                            </div>
                            <div class="col-md-12 mt-1">
                                <a href="{{ url('/login/google') }}" class="btn btn-danger col-md-12">
                                    <strong>Login With Google</strong>
                                </a> 
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="col-md-12">     
                        <p class="text-center">
                            Dont Have an Account?
                        </p>
                        <div>
                            <a class="btn btn-success col-md-12" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </div>               
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

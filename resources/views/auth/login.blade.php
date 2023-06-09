@extends('layouts.app-master')

@section('content')


    <section id="aye">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panele panel-default">
                        <div class="panel-heading"><h2>LOGIN</h2></div>

                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail </label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- <div class="col-md-6 col-md-offset-4"> -->
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ingat Saya
                                            </label>
                                        </div>
                                    <!-- </div> -->
                                </div>

                                <div class="form-group row justify-content-md-center">
                                    <div class="col-md-4 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <div class="col-md-4 col-md-offset-4">
                                        <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Lupa Password?
                                        </a>
                                        <br>atau<br> -->
                                        <a class="btn btn-link" href="{{ route('register') }}">
                                            Belum punya akun?
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div style="height: 3vh; background-color: #1BBD36;"></div>
@endsection

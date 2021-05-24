@extends('app')

@section('content')
<main>
    <div class="height-full responsive-phone">
        <div class="container height-full">
            <div class="row d-flex align-center height-full">
                <div class="col-lg-7 hide-phone">
                    <img src="/skin/img/banner-login.png" alt="">
                </div>
                <div class="col-lg-5 col-md-12 col-xs-12 p-t-100">
                    <div class="row">
	                	<img src="/skin/img/logo.svg" class="width-270 mb-15" alt="Tunas" />
                        @if(session()->has('status'))
                        <p><strong><em>{{ session('status') }}</em></strong></p>
                        @endif
    	                <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-6 text-right">
                                    <label for="email" class="control-label">E-Mail Address</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Send Password Reset Link
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>
<script src="/skin/js/app.js"></script>

@endsection
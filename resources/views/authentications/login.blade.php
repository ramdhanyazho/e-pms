@extends('app')

@section('content')
<main>
    <div class="height-full responsive-phone">
        <div class="container height-full">
            <div style="padding: 20px 20px 20px 20px; background-color: #048bd4; color: white; text-align: center;">
                <strong>Saat ini aplikasi E-Performance Management System baru bisa dibuka oleh level Supervisor Up</strong>
            </div>
            <div class="row d-flex align-center height-full">
                <div class="col-lg-7 hide-phone">
                    <img src="skin/img/banner-login.png" alt="">
                </div>
                <div class="col-lg-5 col-md-12 col-xs-12 p-t-100 mb-center">
                    <div class="row">
	                	<img src="skin/img/logo.svg" class="width-270 mb-15" alt="Tunas" />
                        @if(session()->has('message'))
                        <p><strong><em>{{ session('message') }}</em></strong></p>
                        @endif
	                    <form action="{{ url('/login') }}" class="from-login" id="form" method="post">
                            {{ csrf_field() }}
                            <div class="form-group mb-15">
                                <input name="nik" type="text" class="text-uppercase width-270" placeholder="NIK" required>
                            </div>
                            <div class="form-group mb-15">
                                <input name="password" type="password" class="width-270" placeholder="Password" required>
                            </div>
                            <div class="width-270 buttonLogin">
                            	<div class="checkboxCustom mb-15 s-16">
                            	    <input type="checkbox" id="remember" name="remember" />
                            	    <label for="remember"> Remember Me</label>
                            	</div>
                                <!-- <input type="hidden" name="acl_assigned_id" id="id_login_as" value=""> -->
                                <!-- SAMPLE link -->
                                <input type="submit" class="mb-15 btn btn-main btn-lg btn-block r-10" value="Sign In">
                                <!-- <a href="javascript:btnLoginAsEm();" class="mb-15 btn btn-main btn-lg btn-block r-10">Sign In<span></span></a> -->

                                <!-- <a href="javascript:btnLoginAsOD();" class="mb-15 btn btn-main btn-lg btn-block r-10">Sign In as OD <span></span></a> -->
                                <!-- <a href="javascript:btnLoginAsEm();" class="btn btn-main btn-lg btn-block r-10">Sign In as Employee <span></span></a> -->
                                <!-- <button type="submit" class="mb-15 btn btn-main btn-lg btn-block r-10">Sign In as DO <span></span></button> -->
                                <!-- <button type="submit" class="btn btn-main btn-lg btn-block r-10">Sign In as Employee <span></span></button> -->
                            </div>
                            <p class="forget-pass"><a href="password/reset">Have you forgot your password ?</a></p>
                		</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>
<script src="skin/js/app.js"></script>
<script>
    function btnLoginAsOD() {
        $("#id_login_as").val(300);
        $("form").submit();
    }

    function btnLoginAsEm() {
        $("form").submit();
    }
</script>
@endsection
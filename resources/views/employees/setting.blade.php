@extends('app')

@section('sidebar')
@include('templates.employeesidebar')
@endsection

@section('content')
    <div class="page has-sidebar-left height-full">
        <!-- MAIN -->
        <div class="container-fluid animatedParent">
            <div class="animated fadeInUpShort col-md-5 f-none">
                <div class="row no-gutters">
                    <!-- FILTER -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session()->has('message'))
                        <div class="alert alert-info">
                            <ul>
                                    <li>{{ session('message') }}</li>
                            </ul>
                        </div>
                    @endif
                    <div class="col-sm-12 columns f-none mt-30">
                        <div class="pb-t-10">
                            <div class="s-16 text-black font-bold">Change Password</div>
                            <div class="s-14">Enter a new password</div>
                        </div>
                        <form action="{{ url('/em/change-password') }}" method="post" class="mt-30 col-xs-8 pt-b-15 white form-material">
                            {{ csrf_field() }}
                            <div class="form-group col-xs-12 no-p">
                                <input type="password" name="password" class="form-control form-control-lg r-10 s-16" placeholder="New Password" required />
                            </div>
                            <div class="form-group col-xs-12 no-p">
                                <input type="password" name="password_confirmation" class="form-control form-control-lg r-10 s-16" placeholder="Retype Password" required />
                            </div>
                            <button class="mb-0 btn btn-lg btn-block t-center btn-primary font-semibold s-16 pz-20 r-10">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN -->
    </div>

    <script src="{{ url('skin/js/app.js') }}"></script>
@endsection
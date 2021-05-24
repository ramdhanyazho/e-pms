@extends('app')

@section('sidebar')
@include('templates.sidebar', ['sidebar' => $sidebar])
@endsection

@section('content')
    <div class="page has-sidebar-left height-full">
        <!-- MAIN -->
        <div class="container-fluid animatedParent pt-20">
            <div class="animated fadeInUpShort col-md-12 f-none">
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
                    <div class="col-sm-6">
                        <div class="pb-t-10">
                            <div class="s-16 text-black font-bold">Change Password</div>
                            <div class="s-14">Enter a new password</div>
                        </div>
                        <form action="{{ url('change-password') }}" method="post" class="mt-30 col-xs-8 pt-b-15 white form-material">
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
                    <div class="col-sm-6">
                        <div class="pb-t-10">
                            <div class="s-16 text-black font-bold">Deadline KPI Input</div>
                        </div>
                        <form action="{{ url('od/set-deadline') }}" method="post" class="mt-30 col-xs-8 pt-b-15 white form-material">
                            {{ csrf_field() }}
                            <div class="form-group col-xs-12 no-p">
                                <input type="text" name="deadline"  id="datepicker" class="form-control form-control-lg r-10 s-16" value="{{ $deadline }}" placeholder="Deadline" required />
                            </div>
                            <button class="mb-0 btn btn-lg btn-block t-center btn-primary font-semibold s-16 pz-20 r-10">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row no-gutters" style="margin-top: 60px;">
                    <!-- delete kpi -->
                    @if (session()->has('delete-message'))
                        <div class="alert alert-danger">
                            <ul>
                                    <li>{{ session('delete-message') }}</li>
                            </ul>
                        </div>
                    @endif
                    <div class="col-sm-6">
                        <div class="pb-t-10">
                            <div class="s-16 text-black font-bold">Delete KPI Template</div>
                            <div class="s-14">Select KPI Template</div>
                        </div>
                        <div class="pb-t-10">
                            <div class="pb-t-10">
                                <div class="row">
                                    <form method="post" action="{{ url('/od/setting/delete-kpi-template') }}" class="mt-30 col-xs-8 pt-b-15 white form-material">
                                        {{ csrf_field() }}
                                        <div class="form-group col-md-12">
                                            <select class="custom-select select2 bsc_class" name="bsc" href-data="" required>
                                                <option value="">BSC</option>
                                                @foreach($bscs as $bsc)
                                                    <option value="{{ $bsc->getId() }}">{{ $bsc->getName() }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <select class="custom-select select2 kpi_class" name="template_id" id="kpi-curr" required>
                                                <option value="">Select KPI</option>
                                            </select>
                                        </div>
                                        <button type="button" class="btn-delete mb-0 btn btn-lg btn-block t-center btn-danger font-semibold s-16 pz-20 r-10">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN -->

        <div id="dialog-confirm" title="Basic dialog" class="modal">
            <p>Are your sure want delete this KPI Template ?</p>
        </div>
    </div>


    <style type="text/css">
        .error, .alert-danger { color : red; font-size: 14px }
    </style>

    <script src="{{ url('skin/js/app.js') }}"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );

        $(".btn-delete").on("click", function() {
            var submitId = $(this);
            if(! $(submitId).parent().valid()) return false;
            $( "#dialog-confirm" ).dialog({
                resizable: false,
                height: "auto",
                width: 400,
                modal: true,
                buttons: {
                  "Yes": function() {
                    $(submitId).parent().submit();
                    $( this ).dialog( "close" );
                  },
                  No: function(e) {
                    $( this ).dialog( "close" );
                  }
                }
            });

        });

        $('.bsc_class').change(function() {
        $.get( "/em/getkpi/custom", { bsc_id: this.value}, function(result) {
            $('.kpi_class').empty();
            $.each(result, function (i, item) {
                $('.kpi_class').append($('<option>', { 
                    value: item.id,
                    text : item.name 
                }));
            });
        });   
    });
    </script>
@endsection
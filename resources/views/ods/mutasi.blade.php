@extends('app')

@section('sidebar')
@include('templates.sidebar')
@endsection

@section('content')
    <div class="page has-sidebar-left height-full">

        <div class="container-fluid animatedParent">
            <div class="animated fadeInUpShort col-md-12 f-none">

                <div class="row no-gutters">
                    <div class="col-md-12 sticky mt-30">
                       
                    <div class="col-sm-6">
                        <div class="pb-t-10">
                            <div class="s-16 text-black font-bold">Mutasi Karyawan</div>
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
                        </div>
                        <form action="{{ url('od/mutasi') }}" method="post" class="mt-30 col-xs-8 pt-b-15 white form-material">
                            {{ csrf_field() }}
                            <div class="form-group col-xs-12 no-p">
                                <input type="text" name="nik_resign" id="nik_resign" class=" form-control form-control-lg r-10 s-16" placeholder="NIK Karyawan Resign" required />
                                <span class="name_resign" style="display:block; margin:10px"></span>
                            </div>
                            <div class="form-group col-xs-12 no-p">
                                <input type="text" name="nik_new" id="nik_new" class=" form-control form-control-lg r-10 s-16" placeholder="NIK Karyawan Baru" required />
                                <span class="name_new" style="display:block; margin:10px"></span>
                            </div>
                            <button class="mb-0 btn btn-lg btn-block t-center btn-primary font-semibold s-16 pz-20 r-10">
                                Submit
                            </button>
                        </form>
                    </div>
                    </div>
                    
                </div>

            </div>
        </div>
        
    </div>
    

<div class="modal fade" id="ex1">
    <div class="modal-dialog modal-md dis-flex align-center height-100p">
            <div class="modal-content b-0 r-10" style="width:unset">
                <div class="modal-header mb-10">
                    <h6 class="modal-title">Mutasi telah dikirim</h6>
                    <button data-dismiss="modal" class="close" style="padding: 0px 8px;">×</button>
                </div>
                <div class="modal-body no-p no-b">
                    <div class="row"></div>
                </div>
                <div class="modal-footer text-center" style="display: unset">
                    <button class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10" onclick="location.reload();">
                        Ok
                    </button>
                </div>
            </div>
    </div>
</div>

<style type="text/css">
    .alert-info {
        color: #0c5460;
        background-color: #d1ecf1;
        border-color: #bee5eb;
    }
    .alert {
        position: relative;
        padding: .75rem 1.25rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: .25rem;
    }

</style>
    <script src="{{ url('skin/js/app.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var result;
            $('#nik_resign').on('keyup', function(){
                if($(this).val().length == 9) {
                    $.get( "/od/getuser", { nik: $(this).val() }, function(result) {
                        $('.name_resign').html(result.message);
                    }).fail(function(e){
                        console.log('err');
                    });
                }
            });

            $('#nik_new').on('keyup', function(){
                if($(this).val().length == 9) {
                    $.get( "/od/getuser", { nik: $(this).val() }, function(result) {
                        $('.name_new').html(result.message);
                    }).fail(function(e){
                        console.log('err');
                    });
                }
            });

            
        })
    </script>
@endsection
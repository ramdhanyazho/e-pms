@extends('app')

@section('sidebar')
@include('templates.employeesidebar', ['sidebar' => $sidebar])
@endsection

@section('content')
    <div class="page has-sidebar-left height-full">
        <!-- MAIN -->
        <div class="container-fluid animatedParent">
            <div class="row d-flex subnav-kpi pull-up-20 pl-20 pr-20 pt-20">
                <ul class="nav nav-material nav-material-white s-16">
                    <li class="mr-5">
                        <a href="{{ url('/em/kpi') }}" class="nav-link pb-15 ">Personal KPI</a>
                    </li>
                    <li class="mr-5">
                        <a href="{{ url('/em/kpi/subordinate') }}" class="nav-link pb-15 active ">Subordinate KPI</a>
                    </li>
                    <li class="mr-5">
                        <a href="{{ url('/em/kpi/review') }}" class="nav-link pb-15">Review KPI</a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="">
            <div class="row">
                <div class="col-md-12" style="margin: 50px 30px;">
                @if(session('message'))
                {!! session('message') !!}
                @endif
                </div>
            </div>
        </div>
        <!-- END MAIN -->
    </div>

    <div class="bg-layer"></div>
<div class="modal fade" id="ex1">
    <div class="modal-dialog modal-md dis-flex align-center height-100p">
            <div class="modal-content b-0 r-10" style="width:unset">
                <div class="modal-header mb-10">
                    <h6 class="modal-title">Data telah tersimpan</h6>
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
    <script src="{{ url('skin/js/app.js') }}"></script>
    <script type="text/javascript">
        function submitScore() {
            var form = $('#form_score');
            if(! form.valid()) return false;
            var data = $('#form_score').serialize();  
            $.post(
                '/em/kpi/self/score', data,
                function(response){
                    $('#inputscore').hide();
                    $('#ex1').modal('toggle');
                }
            ).fail(function(e){
                console.log('err');
            });
        }
    </script>
@endsection
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
                        <a href="{{ url('/em/kpi') }}" class="nav-link pb-15">Personal KPI</a>
                    </li>
                    <li class="mr-5">
                        <a href="{{ url('/em/kpi/subordinate') }}" class="nav-link pb-15 active">Subordinate KPI</a>
                    </li>
                    <li class="mr-5">
                        <a href="{{ url('/em/kpi/review') }}" class="nav-link pb-15">Review KPI</a>
                    </li>
                </ul>
            </div>
            <div>&nbsp;</div>
        </div>
        <form id="kpi_submit">
            {{ csrf_field() }}
            <div class="modal-content b-0 r-10">
                <div class="modal-body no-p no-b">
                    <div class="row">
                        
                            @foreach($subordinates as $subordinate)
                            <div class="form-group col-md-12">
                            <input type="checkbox" name="employee_id[]" value="{{ $subordinate->getId() }}"> <label for="{{ $subordinate->getName() }}"> {{ $subordinate->getName() }}</label><br>
                            </div>
                            @endforeach
                        
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <select class="custom-select select2 bsc_class" name="bsc" required>
                                <option value="">Select BSC</option>
                                @foreach($bscs as $bsc)
                                <option value="{{ $bsc->getId() }}">{{ $bsc->getName() }}</option>       
                                @endforeach                         
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <select class="custom-select select2 kpi_class" name="kpi_id" id="kpi" required>
                                <option value="">Select KPI</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <select class="custom-select select2 select-yearkpi" name="year" required>
                                <option value="">Year</option>
                                <?php $currentYear = intval(date('Y')); ?>
                                @for ($year = $currentYear - 1; $year <= $currentYear + 1; $year++)
                                    <option value="{{ $year }}" @if($year == $currentYear) selected @endif>{{ $year }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <input id="weight_id" type="number" class="form-control weightkpi" name="weight" placeholder="Weight" value="10" required max="100" min="0" maxlength="5">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="target" placeholder="Target" required>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="text-main s-14 font-semibold mb-10">Indicator 1</div>
                            <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator1" id="" cols="30" rows="7"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="text-main s-14  font-semibold mb-10">Indicator 2</div>
                            <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator2" id="" cols="30" rows="7"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="text-main s-14 font-semibold mb-10">Indicator 3</div>
                            <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator3" id="" cols="30" rows="7"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="text-main s-14 font-semibold mb-10">Indicator 4</div>
                            <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator4" id="" cols="30" rows="7"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="text-main s-14 font-semibold mb-10">Indicator 5</div>
                            <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator5" id="" cols="30" rows="7"></textarea>
                        </div>
                                                                
                    </div>
                </div>
                <div class="modal-footer mt-30">
                    <button id="btnSubmitKPI_Id" type="button" class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10 w-100px" onclick="submitKPI()">
                        Submit
                    </button>
                </div>
            </div>
        </form>
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
                    <button class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10 btn_click_ok" data-dismiss="modal" onclick="">
                        Ok
                    </button>
                </div>
            </div>
    </div>
</div>
    <script src="{{ url('skin/js/app.js') }}"></script>
    <script type="text/javascript">

        $('.bsc_class').change(function() {
            $.get( "/em/getkpi/custom", { bsc_id: this.value }, function(result) {
                $('.kpi_class').empty();
                $.each(result, function (i, item) {
                    $('.kpi_class').append($('<option>', { 
                        value: item.id,
                        text : item.name 
                    }));
                });
            });   


        });

        function submitKPI() {
            var form = $('#kpi_submit');
            if(! form.valid()) return false;
            var data = $('#kpi_submit').serialize();  
            $.post(
                '/em/kpi/subordinate/custom', data,
                function(response){
                    $('.modal-title').html(response.message.replace(/\n/g, "<br />"));
                    $('#ex1').modal('toggle');
                    if(response.code == 200) {
                        $('.btn_click_ok').on('click', function() {
                            window.location.href = '/em/kpi/subordinate'
                        });
                    }
                }
            ).fail(function(e){
                console.log('err');
                alert('Something is wrong. Please try again later.');
            });
        }
    </script>
    <style type="text/css">
        .error {
            color: red;
        }
    </style>
@endsection
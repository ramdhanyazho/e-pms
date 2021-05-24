@extends('app')

@section('sidebar')
@include('templates.sidebar', ['sidebar' => $sidebar])
@endsection

@section('content')
    <div class="page has-sidebar-left height-full">
        <!-- MAIN -->
        <div class="container-fluid animatedParent">
            @if ($message = Session::get('message'))
                {{ session('message') }}
            @endif
            <!-- FILTER -->
            <div class="col-md-11 columns f-none mt-30 mb-20">
                <form action="" class="row" id="form-filter">
                    <div class="col-md-12 f-none pt-b-10">
                        <div class="input-group border r-10 mb-10 bg-whtsmoke-opacity">
                            <input type="text" name="people" class="s-18 form-control bg-transparent no-b p-25" placeholder="Search People" 
                                value="{{ (isset($filter['people']) ? $filter['people'] : '') }}" />
                            <button type="submit" class="ic-search fa fa-search search"></button>
                        </div>
                        <div class="d-flex">
                            <div class="form-group">
                                <div class="select white r-5">
                                    <select id="" class="cmd-select form-control" name="company_id">
                                        <option value="">Company</option>
                                        @foreach ($companies as $cpKey => $cpValue)
                                            <option value="{{ $cpKey }}" {{ isset($filter['company_id']) && $filter['company_id'] == $cpKey?'selected':'' }}>{{ $cpValue }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="select white r-5">
                                    <select id="" class="cmd-select form-control" name="location_id">
                                        <option value="">Location</option>
                                        @foreach ($locations as $locKey => $locValue)
                                            <option value="{{ $locKey }}" {{ isset($filter['location_id']) && $filter['location_id'] == $locKey?'selected':'' }}>{{ $locValue }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="select white r-5">
                                    <select id="" class="cmd-select form-control" name="cost_center_id">
                                        <option value="">Cost Center</option>
                                        @foreach ($costcenters as $ccKey => $ccValue)
                                            <option value="{{ $ccKey }}" {{ isset($filter['cost_center_id']) && $filter['cost_center_id'] == $ccKey?'selected':'' }}>{{ $ccValue }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // TODO: Enable search functionality -->
                </form>
            </div>
            <div class="col-md-12 mb-30">
                <a class="btn btn-primary font-semibold s-16"
                    href="{{ url('/od/people/download/all') }}">Download All Employees</a>
            </div>
            <!-- END FILTER -->
            <div class="animated fadeInUpShort col-md-12">
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="nav table table-tab table-hover table-white table-hover-link" role="tablist">
                                <thead>
                                    <tr class="no-b">
                                        <th style="width: 100px"></th>
                                        <th>Employee Name</th>
                                        <th>Cost Center</th>
                                        <th>Status</th>
                                        <th>Reporting Line</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $count = 0; ?>
                                    @foreach ($people as $employee)
                                        <?php $count++; ?>
                                        @if (!$employee->isPermanent())
                                            <tr data-toggle="tab" href="#people-{{ $count }}" role="tab" aria-selected="false" style="background-color: #{{ env('CONTRACT_BACKGROUND_COLOR') }};">
                                        @else
                                            <tr data-toggle="tab" href="#people-{{ $count }}" role="tab" aria-selected="false">
                                        @endif
                                            <td>
                                                <div class="avatar avatar-md mr-3 mt-1 w-50px center t-center">
                                                    <img src="{!! $employee->photo() !!}" alt="User Image" class="r-fl">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="s-16 text-main">
                                                    <strong>{{ $employee->getName() }}</strong>
                                                </div>
                                                <div class="s-14">{{ $employee->getNIK() }} - {{ $employee->getTitle() }}</div>
                                                <div class="text-whitesmoke s-14"><i>{{ $employee->levels->getLevel() }}</i></div>
                                            </td>
                                            <td>{{ $employee->costcenter->getName() }}</td>
                                            <td>{{ $employee->getStatus() }}</td>
                                            @if ($employee->getSuperOrdinate() != null)
                                                <td>{{ $employee->getSuperOrdinate()->getName() ?? '-' }}<br>{{ $employee->getSuperOrdinate()->getNIK() ?? '-' }}
                                            @else
                                                <td>-</td>
                                            @endif
                                            </td>
                                            <td>
                                                <a class="tb-link"><i class="fas fa-pen"></i> Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <nav class="my-3">
                    {{ $people->appends(request()->input())->links() }}
                </nav>
            </div>
        </div>
        <!-- END MAIN -->
    </div>

<!-- 
    POPUP EDIT PEOPLE // SIDEBAR
-->
<div class="col-sm-12 f-none tab-content">
    <?php $count = 0; ?>
    @foreach ($people as $employee)
        <?php $count++; ?>
    <div class="tab-sidebar control-sidebar fixed white" id="people-{{ $count }}" role="tabpanel">
        <div class="slimScroll">
            <div class="sidebar-header">
                <!-- <a href="#people-{{ $count }}" data-toggle="tab" role="tab" class="paper-nav-toggle"><i class="fas fa-times"></i></a> -->
                <!-- <a href="javascript:void(0)" onclick="closeNav('#people-{{ $count }}')"><i class="fas fa-times"></i></a> -->
                <a href="#" data-toggle="hide-toggle"><i class="fas fa-times"></i></a>
            </div>
            <div class="sidebar-header d-flex">
                <div class="pr-20">
                    <div class="avatar avatar-md mt-1 w-80px">
                        <img src="{!! $employee->photo() !!}" alt="User Image" class="r-fl">
                    </div>
                </div>
                <div>
                    <div class="s-16 text-main">
                        <strong>{{ $employee->getName() }}</strong>
                    </div>
                    <div class="s-14">{{ $employee->getTitle() }}</div>
                    <div class="text-whitesmoke s-14"><i>{{ $employee->levels->getLevel() }}</i></div>
                    <div class="s-14"><i>{{ $employee->getEmail() }}</i></div>
                </div>
            </div>
            <div class="p-30 pt-b-0">
                <div class="d-flex align-start flex-wrap b-b pt-20">
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">NIK</div>
                        <div class="text-uppercase s-14">{{ $employee->getNIK() }}</div>
                    </div>
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">Status</div>
                        <div class="s-14">{{ $employee->getStatus() }}</div>
                    </div>
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">Cost Center</div>
                        <div class="text-uppercase s-14">{{ $employee->costcenter->getName() }}</div>
                    </div>
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">Join Date</div>
                        <div class="s-14">{{ $employee->getJoinDate() }}</div>
                    </div>
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">Unit</div>
                        <div class="text-uppercase s-14">{{ $employee->division->getName() }}</div>
                    </div>
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">Location</div>
                        <div class="s-14">{{ $employee->location->getName() }}</div>
                    </div>
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">End of Contract</div>
                        <div class="s-14">{{ $employee->getEndContract() }}</div>
                    </div>
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">Company</div>
                        <div class="text-uppercase s-14">{{ $employee->company->getName() }}</div>
                    </div>
                        
                </div>
            </div>
            <div class="p-30 pt-b-0 mb-35">
                <h3 class="s-16 mb-0 text-black font-bold">Superior</h3>
                @if ($employee->getSuperordinate() != null)
                    <h5>{{ $employee->getSuperordinate()->getName() }} - {{ $employee->getSuperordinate()->getNIK() }}</h5>
                @else
                    <h5>-</h5>
                @endif
                <div class="d-flex align-start flex-wrap pt-20">
                    <div class="d-flex align-start flex-wrap wd-fl-12">
                        <a href="#" class="pb-10"><i class="fas fa-plus mr-3"></i><i class="chg-superior">Change Superior</i></a>
                    </div>
                    <form method="post" action="{{ url('od/people/change/superior') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ $employee->getId() }}">
                        <div class="superior-box d-flex align-start flex-wrap wd-fl-12 hide-superior">
                            <div class="wd-fl-8 wd-fl-dynamic mb-35">
                                <div class="select no-pl b-b">
                                    <select name="superior_id" id="" class="no-p">
                                        @foreach($superiors as $emp)
                                            @if ($emp->getNIK() == $employee->getNIK()) continue; @endif
                                            <option value="{{ $emp->getNIK() }}">{{ $emp->getNIK() }} - {{ $emp->getName() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>v
                            <div class="wd-fl-end w-50px t-center">
                                <button type="submit">save</button>
                            </div>
                        </div>

                    </form>

                    <br>
                </div>
            </div>
            <div class="p-30 pt-b-0 mb-35">
                <h3 class="s-16 mb-0 text-black font-bold">Subordinate</h3>
                @if (count($employee->getSubordinate()) > 0)
                    @foreach ($employee->getSubordinate() as $sub)
                        <h5>{{ $sub->getName() }} - {{ $sub->getNIK() }}</h5>
                    @endforeach
                @else
                    <h5>-</h5>
                @endif
                <div class="d-flex align-start flex-wrap pt-20">
                    <a href="#" class="pb-10"><i class="fas fa-plus mr-3"></i><i class="chg-subordinate">Add Subordinate</i></a>
                </div>

                <form method="post" action="{{ url('od/people/change/subordinate') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="{{ $employee->getNik() }}">
                    <div class="subordinate-box d-flex align-start flex-wrap wd-fl-12 hide-superior">
                        <div class="wd-fl-8 wd-fl-dynamic mb-35">
                            <div class="select no-pl b-b">
                                <select name="subordinate_nik[]" id="" class="no-p">
                                    @foreach($superiors as $emp)
                                        @if ($emp->getNIK() == $employee->getNIK()) continue; @endif
                                        <option value="{{ $emp->getNIK() }}">{{ $emp->getNIK() }} - {{ $emp->getName() }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--
                        <div class="wd-fl-end w-50px t-center">
                            <a href="#" class="text-red"><i class="fas fa-plus add-more"></i></a>
                        </div> -->
                        <div class="wd-fl-end w-50px t-center">
                            <button type="submit">save</button>
                        </div>
                    </div>

                </form>
            </div>

            <div class="p-30 pt-b-0 mb-35">
                <div class="d-flex align-start flex-wrap pt-20">
                    <a href="#" class="pb-10"><i class="fas fa-key mr-3"></i><i class="chg-password">Change Password</i></a>
                </div>

                <form name="frm_change_passwd" method="post" action="{{ url('/od/people/change/password') }}" onsubmit="return changePassword('{{ $employee->getCleanNIK() }}')">
                    {{ csrf_field() }}
                    <input type="hidden" name="nik" value="{{ $employee->getCleanNIK() }}">
                    <input type="password" name="passwd_{{ $employee->getCleanNIK() }}" value=""><br style="margin-bottom: 10px;">
                    <input type="password" name="repeat_passwd_{{ $employee->getCleanNIK() }}" value=""><br style="margin-bottom: 10px;">
                    <button type="submit">Change Password</button>
                </form>
                <br>
                
                <a class="tb-link popup-add-kpi" data-target="#kpi-{{ $employee->getId() }}" data-sidetab="#people-{{ $count }}"><i class="fas fa-pen"></i> Add KPI</a>
            </div>
        </div>
    </div>

<!-- POPUP ADD KPI -->
    <div class="modal fade s-16" id="kpi-{{ $employee->getId() }}">
        <div class="modal-dialog modal-lg">
            <form id="kpi_{{ $employee->getId() }}">
                {{ csrf_field() }}
                <div class="modal-content b-0 r-10">
                    <div class="modal-header mb-10">
                        <h6 class="modal-title">Add KPI</h6>
                        <button data-dismiss="modal" class="close" style="padding: 0px 8px;">×</button>
                    </div>
                    <div class="modal-body no-p no-b">
                        <div class="row">
                            <div class="form-group col-md-6 test">
                                <select class="custom-select select2 select-emp" name="employee_id">
                                    <option value="{{ $employee->getId() }}">{{ $employee->getName() }}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <select class="custom-select select2 bsc_class" name="bsc" href-data="{{ $employee->getPositionId() }}">
                                    <option value="">Select BSC</option>
                                    @foreach($employee->getTemplateKPI() as $template)
                                    <option value="{{ $template->bsc->getId() }}">{{ $template->bsc->getName() }}</option>
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
                                <input type="text" class="form-control" name="target" placeholder="Target" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input id="weight_id" type="number" class="form-control weightkpi" name="weight" placeholder="Weight" value="10" required max="100" maxlength="5">
                            </div>

                            <div class="form-group col-md-12">
                                <div class="text-main s-14 font-semibold mb-10">Indicator 1</div>
                                <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator1" id="" cols="30" rows="7"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="text-main s-14 font-semibold mb-10">Indicator 2</div>
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
                            <!-- <div class="form-group col-md-12">
                                <div class="text-main s-14 font-semibold mb-10">Indicator 6</div>
                                <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator6" id="" cols="30" rows="7"></textarea>
                            </div> -->
                                                                    
                        </div>
                    </div>
                    <div class="modal-footer mt-30">
                        <button id="btnSubmitKPI_Id" onclick="submitKPI({{ $employee->getId() }})" type="button" class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10 w-100px">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<!-- END POPUP ADD KPI -->
    @endforeach


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
<style type="text/css">
    .hide-superior {
        display: none; 
    }
</style>
<script src="{{ url('skin/js/app.js') }}"></script>
<script type="text/javascript">
    var yearkpi = '{{ date("Y") }}';

    var yearkpi = '{{ date("Y") }}';

    function getWeight(year, emp_id, weight) {
        $.get( "/em/totalweight", { year: year, employee_id: emp_id}, function(result) {
            if(result.status == 200) {
                let weightInt = parseFloat(weight);
                let currentWeight = parseFloat(result.message);
                let totalweight = weightInt + currentWeight;
                let maxCanAdded = 100 - currentWeight;
                if (totalweight > 100) {
                    $("#btnSubmitKPI_Id").prop('disabled', true);
                    alert('Weight tidak boleh melebihi 100 \nTotal weight saat ini : ' + result.message + 
                        '\nmax penambahan : ' + maxCanAdded.toFixed(2));
                } else {
                    $("#btnSubmitKPI_Id").prop('disabled', false);
                }
            } else {
                console.log('Something Error');
            }
        });
    }

    $(".weightkpi").change(function() {
        var weight = $(this).val();
        let emp_id = $(this).parent().parent().children('.test').children('.select-emp').val()
        getWeight(yearkpi, emp_id, weight);
    });

    $('.select-yearkpi').change(function() {
        yearkpi = this.value;
    });
    
    $(document).ready(function(){
        $('.chg-superior').on('click', function() {
            $('.superior-box').removeClass('hide-superior');
            // $('#select-superior').addClass('hide-superior');
        });

        $('.chg-subordinate').on('click', function() {
            $('.subordinate-box').removeClass('hide-superior');
            // $('#select-superior').addClass('hide-superior');
        });

        $('.cmd-select').on('change', function() {
            $('#form-filter').submit();
        });

        $('.bsc_class').change(function() {
            $.get( "/em/getkpi", { bsc_id: this.value, position_id: $(this).attr('href-data') }, function(result) {
                $('.kpi_class').empty();
                $.each(result, function (i, item) {
                    $('.kpi_class').append($('<option>', { 
                        value: item.id,
                        text : item.name 
                    }));
                });
            });   
        });

        $('.popup-add-kpi').on('click', function() {
            id = $(this).attr('data-target');
            nav = $(this).attr('data-sidetab');
            $(id).modal('show');
            closeNav(nav);
        });

    });

    function changePassword(nik) {
        var passwd = document.getElementsByName('passwd_' + nik)[0].value;
        var repeat_passwd = document.getElementsByName('repeat_passwd_' + nik)[0].value;
        if (passwd == repeat_passwd) return true;
        alert('New password doesn\'t match.');
        return false;
    }

    function submitKPI(id) {
        var form = $('#kpi_'+id);
        console.log(form);
        if(! form.valid()) return false;
        var data = $('#kpi_'+id).serialize();  
        $.post(
            '/em/kpi/subordinate', data,
            function(response){

                if(response.code == 200) {
                    $('#kpi-'+id).hide();
                    $('#ex1').modal('toggle');
                } else {
                    alert(response.message);
                }
            }
        ).fail(function(e){
            console.log('err');
            alert('Something is wrong. Please try again later.');
        });
    }

    function closeNav(closeID) {
        $(closeID).removeClass("active");
        $('.bg-layer').removeClass("active");
    }

    $('body').on('keypress', 'input[type=number][maxlength]', function(event){
        var key = event.keyCode || event.charCode;
        var charcodestring = String.fromCharCode(event.which);
        var txtVal = $(this).val();
        var maxlength = $(this).attr('maxlength');
        var regex = new RegExp('^[0-9]+$');
        // 8 = backspace 46 = Del 13 = Enter 39 = Left 37 = right Tab = 9
        if( key == 8 || key == 46 || key == 13 || key == 37 || key == 39 || key == 9 ){
            return true;
        }

        if((txtVal.indexOf(".") == 1)) { maxlength = 4 }
            
        // maxlength allready reached
        if(txtVal.length==maxlength){
            event.preventDefault();
            return false;
        }
        // pressed key have to be a number
        if( !regex.test(charcodestring) ){
            event.preventDefault();
            return false;
        }
        return true;
    });

</script>
@endsection
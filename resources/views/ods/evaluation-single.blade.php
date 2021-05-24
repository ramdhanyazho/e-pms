@extends('app')

@section('sidebar')
@include('templates.sidebar')
@endsection

@section('content')
    <div class="page has-sidebar-left height-full">

        <div class="container-fluid animatedParent">
            <div class="animated fadeInUpShort col-md-12 f-none">

                <div class="row no-gutters">
                    <div class="col-md-3 sticky mt-30">
                        <!-- MAIN SIDE LEFT PROFILE -->
                        <div class="white r-5 p-30 pb-0 mb-30 mb-center">
                            <div class="pb-15">
                                <div class="avatar avatar-md mt-1 w-100px m-mlr-center">
                                    <img src="{!! $me->photo() !!}" alt="User Image" class="r-fl" id="pic_profile">
                                </div>
                            </div>
                            <div class="pb-15">
                                <div class="s-16 text-main">
                                    <strong>{{ $me->getName() }}</strong>
                                </div>
                                <div class="s-14">{{ $me->getTitle() }}</div>
                                <div class="text-whitesmoke s-14"><i>{{ $me->levels->getLevel() }}</i></div>
                                <div class="s-14"><i class="far fa-envelope mr-7 text-main"></i><i>{{ $me->getPersonalEmail() }}</i></div>
                            </div>
                            <div class="pb-15">
                                <div class="text-main s-14 font-semibold">Score</div>
                                <h3 class="s-16 mt-2 mb-0">
                                    {{ $me->getFinalScore() }}
                                </h3>
                            </div>
                            <div class="pb-15">
                                <div class="text-main s-14 font-semibold">Grade</div>
                                <h3 class="s-16 mt-2 mb-0 grade-A">
                                    A / Potential Candidate
                                </h3>
                                <a class="mt-3 btn btn-outline-primary font-semibold s-16 pz-20" data-toggle="modal" data-target="#changegrade">Change Grade</a>
                            </div>
                            <div class="pb-15">
                                <div class="d-flex align-start flex-wrap">
                                    <div class="wd-fl-12 mb-20">
                                        <div class="text-main s-14 font-semibold">Department</div>
                                        <div class="s-14">{{ $me->costcenter->getName() }}</div>
                                    </div>
                                    <div class="wd-fl-12 mb-20">
                                        <div class="text-main s-14 font-semibold">Business Unit</div>
                                        <div class="s-14">{{ $me->businessUnit->getName() }}</div>
                                    </div>
                                    <div class="wd-fl-12 mb-20">
                                        <div class="text-main s-14 font-semibold">Period</div>
                                        <div class="s-14">{{ $me->getEvaluationPeriod() }}</div>
                                    </div>
                                    <div class="wd-fl-12 mb-20">
                                        <div class="text-main s-14 font-semibold">Year</div>
                                        <div class="s-14">{{ date('Y') }}</div>
                                    </div>
                                    <div class="wd-fl-12 mb-20">
                                        <div class="text-main s-14 font-semibold">Reporting Line</div>
                                        <div class="s-14">{{ $super_ordinate ? $super_ordinate->name : '-' }}</div>
                                    </div>
                                    <div class="wd-fl-12 mb-20">
                                        <div class="text-main s-14 font-semibold">Subordinate</div>
                                        <div class="s-14">{{ $me->getSubordinateCount() }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="mb-30">
                            <h3 class="s-16 mb-10 text-black font-bold">Review KPI</h3>
                            <span class="s-12 font-bold text-whitesmoke mt-20 d-block">Schedule</span>
                            <div class="white r-5 p-30 pt-b-15 mt-b-10">
                                <div class="s-16 mb-10">Name 1</div>
                                <div class="s-16 ">Name 2</div>
                            </div>

                            <span class="s-12 font-bold text-whitesmoke mt-20 d-block">Waiting Approval</span>
                            <div class="white r-5 p-30 pt-b-15 mt-b-10">
                                <div class="s-16">Name 1</div>
                            </div>

                            <span class="s-12 font-bold text-whitesmoke mt-20 d-block">Completed</span>
                            <div class="white r-5 p-30 pt-b-15 mt-b-10">
                                <div class="s-16">Name 1</div>
                            </div>
                        </div> -->
                        <!-- END MAIN SIDE LEFT PROFILE -->
                    </div>
                     <div class="col-md-9">
                        <div class="ml-4">
                            <!-- FILTER -->
                            <div class="col-sm-12 columns f-none mt-30">
                                <form action="" class="row" id="form1">
                                    <div class="col-md-12 columns f-none mt-30 mb-30">
                                        <!-- <a class="btn btn-primary font-semibold s-16 pz-20 r-10 w-150px mr-3" data-toggle="modal" data-target="#inputscore">
                                            <i class="fas fa-plus s-14"></i> Input Score
                                        </a> -->
                                        <a class="btn btn-primary font-semibold s-16 pz-20 r-10 w-150px" data-toggle="modal" data-target="#track-kpi">
                                            Track KPI
                                        </a>
                                        <a class="btn btn-primary font-semibold s-16 pz-20 r-10 w-150px" data-toggle="modal" data-target="#add-kpi">
                                            ADD KPI
                                        </a>
                                    </div>
                                    <div class="col-md-12 f-none clearfix">
                                        <div class="row">
                                            <div class="col-md-5 m-pl-r-0 m-mb-15">
                                                <select id="period_id" class="form-control" name="year" onchange="updateYear()">
                                                    <option>Period</option>
                                                    @for ($i = $year - 3; $i <= $year; $i++)
                                                        <option value="{{ $i }}" <?php if ($i == $year) echo "selected"; ?>>{{ $i }}</option>
                                                    @endfor
                                                </select>

                                                <!--
                                                <div class="input-group border r-10 mb-10 bg-whtsmoke-opacity">
                                                    <span class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </span>
                                                    <input type="text" class="date-time-picker form-control bg-transparent no-b"
                                                           data-options='{"timepicker":false, "format":"d/m/Y"}' placeholder="dd/mm/yy" />
                                                    <button type="submit" class="ic-search fa fa-search search"></button>
                                                </div>
                                                -->
                                            </div>
                                            <div class="col-md-7 t-right m-pl-r-0 m-mb-15 mb-left">
                                                <a href="#" class="mr-5 s-14 font-light">
                                                    <i class="fas fa-print mr-7"></i><i>Print</i>
                                                </a>
                                                <a href="#" class="mr-5 s-14 font-light download">
                                                    <i class="fas fa-download mr-7"></i><i>Download</i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 f-none pt-b-10">
                                        <div class="d-flex">
                                            <div class="form-group">
                                                <div class="select white r-5">
                                                    <!--
                                                    <select id="" class="form-control">
                                                        <option>Period</option>
                                                        <?php // $year = intval(date("Y")); ?>
                                                        @for ($i = $year - 3; $i <= $year; $i++)
                                                            <option value="{{-- $i --}}" <?php // if ($i == $year) echo "selected"; ?>>{{-- $i --}}</option>
                                                        @endfor
                                                    </select>
                                                    -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <!-- END FILTER -->
                            <!-- AREA TABLE -->
                            <form action="#">
                                <div class="col-sm-12 f-none table-responsive mb-50">
                                
                                    <table class="table table-tab table-white table-hover">
                                        <thead>
                                            <tr class="no-b">
                                                <th>BSC</th>
                                                <th style="width: 250px;">KPI</th>
                                                <th>Target</th>
                                                <th>Weight</th>
                                                <th>Achievement</th>
                                                <th class="text-main">Score</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $totalWeight = 0;
                                                $totalAchievement = 0;
                                                $totalScore = 0;
                                            ?>
                                            @foreach($kpis as $kpi)
                                                <?php
                                                $weight = floatval($kpi->getWeight());
                                                $achievement = floatval($kpi->getAchievement());
                                                $score = $achievement * ($weight/100);
                                                ?>
                                                <tr data-toggle="tab" href="#eval-{{ $kpi->getId() }}" role="tab">
                                                    <td>{{ $kpi->kpiTemplate->bsc->getName() }}</td>
                                                    <td>{{ $kpi->kpiTemplate->kpi->getName() }}</td>
                                                    <td>{{ $kpi->getTarget() }}</td>
                                                    <td>{{ $kpi->getWeight() }}%</td>
                                                    <td>{{ $kpi->getAchievement() }}</td>
                                                    <td>{{ $score }}</td>
                                                </tr>
                                                <?php
                                                    $totalWeight += floatval($kpi->getWeight());
                                                    $totalAchievement += intval($kpi->getAchievement());
                                                    $totalScore += $score;
                                                ?>
                                            @endforeach
                                            <tr class="count-table font-bold s-16">
                                                <td>Total</td>
                                                <td>{{ count($kpis) }} KPI</td>
                                                <td></td>
                                                <td>{{ $totalWeight }}%</td>
                                                <td></td>
                                                <td>{{ $totalScore }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                            <!-- END AREA TABLE -->
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

    </div>

<!-- POPUP -->
<div class="f-none tab-content">
    @foreach($kpis as $kpi)
    <div class="tab-sidebar control-sidebar fixed white" id="eval-{{ $kpi->getId() }}" role="tabpanel">
        <div class="slimScroll">
            <div class="sidebar-header">
                <a href="javascript:void(0)" onclick="closeNav('#eval-{{ $kpi->getId() }}')"><i class="fas fa-times"></i></a>
            </div>
            <div class="sidebar-header d-flex separator">
                <div class="col-xs-12 mb-20 no-p ">
                    <div class="text-main s-14 font-semibold">KPI</div>
                    <h4 class="s-18 font-bold mt-0 mb-0 text-black">{{ $kpi->kpiTemplate->kpi->getName() }}</h4>
                </div>
            </div>
            <div class="p-30 pt-b-0">
                <div class="d-flex align-start flex-wrap pt-20">
                    <div class="wd-fl-12 mb-20">
                        <div class="text-main s-14 font-semibold">BSC</div>
                        <div class="text-uppercase s-14">{{ $kpi->kpiTemplate->bsc->getName() }}</div>
                    </div>
                    <div class="wd-fl-12 mb-20">
                        <div class="text-main s-14 font-semibold">Target</div>
                        <div class="s-14">{{ $kpi->getTarget() }}</div>
                    </div>
                    <div class="wd-fl-12 mb-20">
                        <div class="text-main s-14 font-semibold">Weight</div>
                        <div class="text-uppercase s-14">{{ $kpi->getWeight() }}%</div>
                    </div>
                </div>
            </div>
            <div class="p-30 pt-b-0 bg-main-opacity">
                <div class="d-flex align-start flex-wrap pt-20">
                    <div class="text-main s-14 font-semibold">Achievement Indicator</div>
                    @if($kpi->getIndicators() != null)
                    @foreach($kpi->getIndicators() as $key => $indicator)
                    <div class="wd-fl-12 mb-20">
                        <!-- <div class="font-bold s-14 text-black">Indicator </div> -->
                        <div class="s-14">
                            <strong>{{ $key }}</strong><br>
                            {{ $indicator }}
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="p-30 pt-b-0">
                <div class="d-flex align-start flex-wrap pt-20">
                    <div class="wd-fl-12 mb-20">
                        <div class="text-main s-14 font-semibold">Self Appraisal</div>
                        <div class="text-uppercase s-14">{{ $kpi->getSelfActual() }}</div>
                    </div>
                    <div class="wd-fl-12 mb-20">
                        <div class="text-main s-14 font-semibold">Superior Appraisal</div>
                        <div class="s-14">{{ $kpi->getAchievement() }}</div>
                    </div>
                    <div class="wd-fl-12 mb-20">
                        <div class="text-main s-14 font-semibold">Score</div>
                        <div class="text-uppercase s-14">{{ $kpi->getScore() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- END POPUP -->

    <!-- 
        POPUP TRACK KPI 
    -->
    <div class="modal fade s-16" id="track-kpi">
        <div class="modal-dialog modal-xl">
            <div class="modal-content b-0 r-10">
                <div class="modal-header mb-10">
                    <h6 class="modal-title">KPI Track</h6>
                    <button data-dismiss="modal" class="close" style="padding: 0px 8px;">×</button>
                </div>
                <div class="modal-body no-p no-b">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-hover same-hei s-12">
                                <thead>
                                    <tr class="no-b">
                                        <th style="width: 320px;">KPI</th>
                                        <th>Jan</th>
                                        <th>Feb</th>
                                        <th>Mar</th>
                                        <th>Apr</th>
                                        <th>May</th>
                                        <th>Jun</th>
                                        <th>Jul</th>
                                        <th>Aug</th>
                                        <th>Sep</th>
                                        <th>Oct</th>
                                        <th>Nov</th>
                                        <th>Des</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($kpi_track as $history)
                                <tr>
                                    <td>{{ $history['title'] }}</td>
                                    <td>{{ isset($history['actual']['01'])?$history['actual']['01']:'-' }}</td>
                                    <td>{{ isset($history['actual']['02'])?$history['actual']['02']:'-' }}</td>
                                    <td>{{ isset($history['actual']['03'])?$history['actual']['03']:'-' }}</td>
                                    <td>{{ isset($history['actual']['04'])?$history['actual']['04']:'-' }}</td>
                                    <td>{{ isset($history['actual']['05'])?$history['actual']['05']:'-' }}</td>
                                    <td>{{ isset($history['actual']['06'])?$history['actual']['06']:'-' }}</td>
                                    <td>{{ isset($history['actual']['07'])?$history['actual']['07']:'-' }}</td>
                                    <td>{{ isset($history['actual']['08'])?$history['actual']['08']:'-' }}</td>
                                    <td>{{ isset($history['actual']['09'])?$history['actual']['09']:'-' }}</td>
                                    <td>{{ isset($history['actual']['10'])?$history['actual']['10']:'-' }}</td>
                                    <td>{{ isset($history['actual']['11'])?$history['actual']['11']:'-' }}</td>
                                    <td>{{ isset($history['actual']['12'])?$history['actual']['12']:'-' }}</td>                                   
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 
        POPUP Change Grade
    -->
    <div class="modal fade s-16" id="changegrade">
        <div class="modal-dialog modal-md dis-flex align-center height-100p">
            <form method="" class="col-xs-12">
            <div class="modal-content b-0 r-10">
                <div class="modal-header mb-10">
                    <h6 class="modal-title">Change Grade</h6>
                    <button data-dismiss="modal" class="close" style="padding: 0px 8px;">×</button>
                </div>
                <div class="modal-body no-p no-b">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <select class="custom-select select2">
                                <option value="">Grade</option>
                                <option value="a-1">A-1</option>
                                <option value="a-2">A-2</option>
                                <option value="a-3">A-3</option>
                                <option value="a-4">A-4</option>
                                <option value="b-1">B-1</option>
                                <option value="b-2">B-2</option>
                                <option value="b-3">B-3</option>
                                <option value="b-4">B-4</option>
                                <option value="c-1">C-1</option>
                                <option value="c-2">C-2</option>
                                <option value="c-3">C-3</option>
                                <option value="c-4">C-4</option>
                                <option value="d-1">D-1</option>
                                <option value="d-2">D-2</option>
                                <option value="d-3">D-3</option>
                                <option value="d-4">D-4</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10">
                        Send
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <!-- POPUP ADD KPI -->
    <div class="modal fade s-16" id="add-kpi">
        <div class="modal-dialog modal-lg">
            <form id="kpi_submit" method="post">
                <input type="hidden" name="employee_id" value="{{ $me->getId() }}">
                {{ csrf_field() }}
                <div class="modal-content b-0 r-10">
                    <div class="modal-header mb-10">
                        <h6 class="modal-title">Add KPI</h6>
                        <button data-dismiss="modal" class="close" style="padding: 0px 8px;">×</button>
                    </div>
                    <div class="modal-body no-p no-b">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <select class="custom-select select2 bsc_class" name="bsc" required>
                                    <option value="">BSC</option>
                                    @foreach($bscs as $bsc)
                                        <option value="{{ $bsc->getId() }}">{{ $bsc->getName() }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <select class="custom-select select2 kpi_class" name="kpi_id" id="kpi" required>
                                    <option value="">Select KPI</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <select class="custom-select select2" name="year" required>
                                    <option value="">Year</option>
                                    <?php $currentYear = intval(date('Y')); ?>
                                    @for ($year = $currentYear - 1; $year <= $currentYear + 1; $year++)
                                        <option value="{{ $year }}" @if($year == date('Y')) selected @endif >{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="number" class="form-control" name="weight" placeholder="Weight" value="10" required max="100">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="target" placeholder="Target" required>
                            </div>
                            
                            <div class="form-group col-md-12">
                                <div class="text-main s-14 font-semibold mb-10">Indicator 1</div>
                                <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator1" id="" cols="30" rows="7" required></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="text-main s-14 font-semibold mb-10">Indicator 2</div>
                                <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator2" id="" cols="30" rows="7" required></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="text-main s-14 font-semibold mb-10">Indicator 3</div>
                                <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator3" id="" cols="30" rows="7" required></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="text-main s-14 font-semibold mb-10">Indicator 4</div>
                                <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator4" id="" cols="30" rows="7" required></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="text-main s-14 font-semibold mb-10">Indicator 5</div>
                                <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator5" id="" cols="30" rows="7" required></textarea>
                            </div>                                  
                        </div>
                    </div>
                    <div class="modal-footer mt-30">
                        <button type="submit" class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10 w-100px">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ url('skin/js/app.js') }}"></script>
    <script type="text/javascript">
        function closeNav(closeID) {
            $(closeID).removeClass("active");
            $('.bg-layer').removeClass("active");
        }
        function updateYear() {
            $('#form1').submit();
        }

        $('.bsc_class').change(function() {
            $.get( "/em/getkpi", { bsc_id: this.value, position_id: {{ $me->getPositionId() }}}, function(result) {
                $('.kpi_class').empty();
                $.each(result, function (i, item) {
                    $('.kpi_class').append($('<option>', { 
                        value: item.id,
                        text : item.name 
                    }));
                });
            });   
        });

        $('.download').on('click', function() {
            window.location.href = '/od/evaluation/' + {{ $me->getId() }} + '/download/' + $("#period_id").val().trim();
        });

    </script>

@endsection    
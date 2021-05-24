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
                    <li class="mr-5 active">
                        <a href="{{ url('/em/kpi') }}" class="nav-link pb-15 active">Personal KPI</a>
                    </li>
                    <li class="mr-5">
                        <a href="{{ url('/em/kpi/subordinate') }}" class="nav-link pb-15">Subordinate KPI</a>
                    </li>
                    @if ($is_having_superordinate)
                        <li class="mr-5">
                            <a href="{{ url('/em/kpi/review') }}" class="nav-link pb-15">Review KPI</a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="col-md-12 columns f-none mt-30 mb-30">
                <a class="btn btn-primary m-btn-track font-semibold s-14 mb-3 pz-20 r-10 w-200px mr-3" data-toggle="modal" data-target="#inputscore">
                    <i class="fas fa-plus s-14"></i> Input Your Achievement
                </a>
                <a class="btn btn-primary m-btn-track font-semibold s-14 mb-3 pz-20 r-10 w-150px" data-toggle="modal" data-target="#track-kpi">
                    Track Your KPI
                </a>
            </div>
            <div class="animated fadeInUpShort col-md-12 f-none">
                <div class="row">
                    <form action="#">
                        <div class="table-responsive">
                            <!-- <table class="table table-striped table-hover table-white"> -->
                            <table class="table table-tab table-white table-hover">
                                <thead>
                                    <tr class="no-b">
                                        <th>BSC</th>
                                        <th style="width: 320px;">KPI</th>
                                        <th>Target</th>
                                        <th>Weight</th>
                                        <th>Self Appraisal</th>
                                        <th>Achievement</th>
                                        <th class="text-main">Score</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if (count($kpis) > 0)
                                        @foreach($kpis as $kpi)
                                            <?php
                                            $weight = floatval($kpi->getWeight());
                                            $achievement = floatval($kpi->getAchievement());
                                            $score = $achievement * ($weight / 100);
                                            ?>
                                            <tr data-toggle="tab" href="#people-{{ $kpi->getId() }}" role="tab" aria-selected="true">
                                                <td>{{ $kpi->kpiTemplate->bsc->getName() }}</td>
                                                <td>{{ $kpi->kpiTemplate->kpi->getName() }}</td>
                                                <td>{{ $kpi->getTarget() }}</td>
                                                <td>{{ $kpi->getWeight() }}%</td>
                                                <td>{{ $kpi->getSelfActual() }}</td>
                                                <td>{{ $kpi->getAchievement() }}</td>
                                                <td>{{ $score }}</td>
                                                <!-- <td><span class="{{ $kpi->getClassStatusIndex() }}">{{ $kpi->getStatus() }}</span></td> -->
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr href="#" role="tab" aria-selected="true">
                                            @if ($me->getSuperordinate() != null)
                                                <td colspan="6">No KPIs available. You can ask your superordinate ({{ $me->getSuperordinate()->getName() }}) or HR to start inputting your KPIs.</td>
                                            @else
                                                <td colspan="6">No KPIs available. Because you don't have superordinate, you can ask your HR to start inputting your KPIs.</td>
                                            @endif
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
        <!-- END MAIN -->
    </div>

    <div class="modal fade s-16" id="inputscore">
        <div class="modal-dialog modal-md dis-flex align-center height-100p">
            <form id="form_score" class="col-xs-12">
                {{ csrf_field() }}
                <div class="modal-content b-0 r-10">
                    <div class="modal-header mb-10">
                        <h6 class="modal-title">Input Your Achievements</h6>
                        <button data-dismiss="modal" class="close" style="padding: 0px 8px;">×</button>
                    </div>
                    <div class="modal-body no-p no-b">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <select class="custom-select select2 select-month" name="month" required>
                                    <option value="">Month</option>
                                    <option value="01" @if('01' == date('m')) selected @endif >Januari</option>
                                    <option value="02" @if('02' == date('m')) selected @endif >Februari</option>
                                    <option value="03" @if('03' == date('m')) selected @endif >Maret</option>
                                    <option value="04" @if('04' == date('m')) selected @endif >April</option>
                                    <option value="05" @if('05' == date('m')) selected @endif >Mei</option>
                                    <option value="06" @if('06' == date('m')) selected @endif >Juni</option>
                                    <option value="07" @if('07' == date('m')) selected @endif >Juli</option>
                                    <option value="08" @if('08' == date('m')) selected @endif >Agustus</option>
                                    <option value="09" @if('09' == date('m')) selected @endif >September</option>
                                    <option value="10" @if('10' == date('m')) selected @endif >Oktober</option>
                                    <option value="11" @if('11' == date('m')) selected @endif >November</option>
                                    <option value="12" @if('12' == date('m')) selected @endif >Desember</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <select class="custom-select select2 select-year" name="year" required>
                                    <option value="">Year</option>
                                    <?php $currentYear = intval(date('Y')); ?>
                                    @for ($year = $currentYear - 1; $year <= $currentYear + 1; $year++)
                                    <option value="{{ $year }}" @if($year == date('Y')) selected @endif>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <select class="custom-select select2 select-kpi" name="kpi_id" required>
                                    <option value="">Select KPI</option>
                                    @foreach($kpis as $kpi)
                                        <option value="{{ $kpi->getId() }}">{{ $kpi->kpiTemplate->kpi->getName() }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12 self_appraisal" style="text-align: center;">
                                Self appraisal for the selected KPI<br>
                                <span id="self_appraisal_kpi"><strong>Please select month, year, and KPI first</strong></span>
                            </div> 
                            <div class="form-group col-md-12">
                                <select class="custom-select select2" name="score" required>
                                    <option value="">Select Achievement...</option>
                                    @for ($i = 0; $i <= 5; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="submitScore()" class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
   
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
        POPUP EDIT PEOPLE // SIDEBAR
    -->
    <div class="col-sm-12 f-none tab-content">
        @foreach($kpis as $kpi)
        <div class="tab-sidebar control-sidebar fixed white" id="people-{{ $kpi->getId() }}" role="tabpanel">
            <div class="slimScroll">
                <div class="sidebar-header">
                    <a href="javascript:void(0)" onclick="closeNav('#people-{{ $kpi->getId() }}')"><i class="fas fa-times"></i></a>
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
        $('.subnav-kpi li').each(function(){
            var $bpk = $(this);
            var wsr = $(window).width();
            if($bpk.hasClass("active")){
                if (wsr < 1025 ) {
                    var leftPos = $('.subnav-kpi li.active').offset().left - $('.nav-material').offset().left + $('.nav-material').scrollLeft();
                    $('.nav-material').animate({
                        scrollLeft: leftPos
                    }, 800);
                }
            }
        });
        function closeNav(closeID) {
            $(closeID).removeClass("active");
            $('.bg-layer').removeClass("active");
        }
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

        var year, month, kpi_id;
        kpi_id = '';
        month = '{{ date("m") }}';
        year = '{{ date("Y") }}';

        $('.select-kpi').change(function() {
            kpi_id = this.value;
            getselfappraisal(this);
			getIndicatorsText(this);
        });

        $('.select-year').change(function() {
            year = this.value;
            getselfappraisal(this);
        });

        $('.select-yearkpi').change(function() {
            yearkpi = this.value;
            getselfappraisal(this);
        });

        $('.select-month').change(function() {
            month = this.value;
            getselfappraisal(this);
        });

        function getselfappraisal(e) {
        if(month != '' && year != '' && kpi_id != '') {
            $.get( "/em/getselfappraisal", { id: kpi_id, year: year, month: month}, function(result) {
                if(result.status == 200) {                    
                    $(e).closest("form").children('div').children('.modal-footer').children('#btn_submit_achievement').prop('disabled', false);
                    $('.self_appraisal').html(' Self Appraisal ( ' + result.message + ' )');
                } else {
                    $(e).closest("#btn_submit_achievement").prop('disabled', true);
                    $('.self_appraisal').html(' Self Appraisal ( - )');
                }
            }); 
        } else {
            $('.self_appraisal').html('Self appraisal for the selected KPI<br><span id="self_appraisal_kpi"><strong>Please select month, year, and KPI first</strong></span>');
        }
    }

	function getIndicatorsText(e) {
		$.get('/em/get_indicators_text', {emp_kpi_id: kpi_id}, function(result) {
			if (result.status == 200) {
				var indicators = result.message;
				var html = '<option value="0">0</option>';
				html += '<option value="1">1 - ' + indicators.indicator1 + '</option>';
				html += '<option value="2">2 - ' + indicators.indicator2 + '</option>';
				html += '<option value="3">3 - ' + indicators.indicator3 + '</option>';
				html += '<option value="4">4 - ' + indicators.indicator4 + '</option>';
				html += '<option value="5">5 - ' + indicators.indicator5 + '</option>';

				$("select[name='score']").html(html);
			}
		});
	}

    </script>
@endsection
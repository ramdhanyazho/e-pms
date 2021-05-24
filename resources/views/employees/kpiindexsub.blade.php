@extends('app')

@section('sidebar')
@include('templates.employeesidebar')
@endsection

@section('content')
    <div class="page has-sidebar-left height-full">
        <!-- MAIN -->
        <div class="container-fluid">
            <div class="row d-flex subnav-kpi pull-up-20 pl-20 pr-20 pt-20">
                <ul class="nav nav-material nav-material-white s-16">
                    <li class="mr-5">
                        <a href="{{ url('/em/kpi') }}" class="nav-link pb-15">Personal KPI</a>
                    </li>
                    <li class="mr-5 active">
                        <a href="{{ url('/em/kpi/subordinate') }}" class="nav-link pb-15 active">Subordinate KPI</a>
                    </li>
                    @if ($is_having_superordinate)
                        <li class="mr-5">
                            <a href="{{ url('/em/kpi/review') }}" class="nav-link pb-15">Review KPI</a>
                        </li>
                    @endif
                </ul>
            </div>
            @if ($is_having_subordinate)
                <div class="col-md-12 columns f-none mb-30 mt-30">
                    <a href="#" class="btn btn-primary font-semibold s-14 pz-20 r-10 m-btn-track mb-3 m-btn-track" data-toggle="modal" data-target="#input_kpi_baru">
                        Add New KPI
                    </a>
                    <a href="{{ url('em/kpi/subordinate/custom') }}" class="btn btn-primary font-semibold s-14 pz-20 r-10 m-btn-track mb-3">
                        Add KPI to multiple subordinates
                    </a>
                    <!-- <form id="upload-kpi" style="display: inline;" method="POST" action="{{ url('em/kpi/subordinate/upload') }}" enctype="multipart/form-data">
                        @csrf 
                        <input type="file" name="csv" style="display: none" id="csv_id">
                        <a class="btn btn-primary font-semibold s-14 pz-20 r-10 m-btn-track mb-3" onclick="javascript:uploadCSV();">Upload KPI</a>
                    </form> -->
                    <a href="{{ url('em/kpi/subordinate/upload/kpi') }}" class="btn btn-primary font-semibold s-14 pz-20 r-10 m-btn-track mb-3">
                        Upload KPI
                    </a>
                    <!-- <form id="upload-archiement" style="display: inline;" method="POST" action="{{ url('em/kpi/subordinate/achievement/upload') }}" enctype="multipart/form-data">
                        @csrf 
                        <input type="file" name="csv_archiement" style="display: none" id="csv_id2">
                        <a class="btn btn-primary font-semibold s-14 pz-20 r-10 m-btn-track mb-3" onclick="javascript:uploadCSVAchievement();">Upload Achievement</a>
                    </form> -->
                    <a href="{{ url('em/kpi/subordinate/upload/achievement') }}" class="btn btn-primary font-semibold s-14 pz-20 r-10 m-btn-track mb-3">
                        Upload Achievement
                    </a>
                </div>
            @endif
            <ul class="no-list slide-acc slide-subordinate mt-30">
                @if (count($subordinates) > 0)
                    @foreach($subordinates as $subordinate)
                    <li>
                        <!-- AREA CLICK -->
                        <div class="titleHeadline" data-acc="click">
                            <div class="d-flex m-flex-wrap">

                                <div class="wd-fl-6 m-wd-fl-12 d-flex align-center">
                                    <div class="wd-fl-end">
                                        <div class="w-60px mr-5 mt-1 t-center">
                                            <img src="{!! $subordinate->photo() !!}" alt="User Image" class="r-fl">
                                        </div>
                                    </div>
                                    <div class="wd-fl-dynamic">
                                        <div class="s-16 text-main">
                                            <strong>{{ $subordinate->getName() }} - {{ $subordinate->getNIK() }}</strong>
                                        </div>
                                        <div class="s-14">{{ $subordinate->getTitle() }}</div>
                                        <div class="text-whitesmoke s-14"><i>{{ $subordinate->getStatus() }}</i></div>
                                    </div>
                                </div>
                                <div class="wd-fl-6 m-wd-fl-12 d-flex align-center">
                                    <div class="wd-fl-end p-15">
                                        <div class="s-14 text-main">
                                            <strong>{{ $subordinate->getStatus() }}</strong>
                                        </div>
                                        <div class="text-whitesmoke s-14"><i>{{ $subordinate->getJoinDate() }}</i></div>
                                    </div>
                                    <div class="wd-fl-end p-15">
                                        <div class="s-16"></div>
                                    </div>
                                    <div class="wd-fl-dynamic p-15">
                                        <div class="s-14">{{ $subordinate->getKPIUnprocessed() }} Unprocessed</div>
                                        <div class="s-14">{{ $subordinate->getKPIProgress() }} On Progress</div>
                                        <div class="s-14">{{ $subordinate->getKPICompleted() }} Completed</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- AREA DESCRIPTION -->
                        <div class="detailHeadline white" data-detail="description">
                            <!-- START FORM -->
                                <div class="col-md-12 columns f-none mb-30 mx-p-0">
                                    <a class="btn btn-primary font-semibold s-14 m-btn-track mb-3 pz-20 r-10 w-150px" data-toggle="modal" data-target="#track-kpi" onclick="javascript:getTrackKPI({{$subordinate->getId()}});">
                                        Track KPI
                                    </a>
                                    <a class="btn btn-primary font-semibold s-14 m-btn-track mb-3 pz-20 r-10 w-150px" data-toggle="modal" data-target="#add-subordinate-kpi-{{ $subordinate->getId() }}">
                                        Add KPI
                                    </a>
                                    <a class="btn btn-primary font-semibold s-14 m-btn-track mb-3 pz-20 r-10 w-200px mr-3" data-toggle="modal" data-target="#inputscore-{{ $subordinate->getId() }}">
                                        <i class="fas fa-plus s-14"></i> Input Achievement
                                    </a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table same-hei table-hover">
                                        <thead>
                                            <tr class="no-b">
                                                <th>BSC</th>
                                                <th style="width: 320px;">KPI</th>
                                                <th>Target</th>
                                                <th>Weight</th>
                                                <th>Self Appraisal</th>
                                                <th>Achievement</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                            $totalPoints = 0;
                                            $numOfKpis = 0;
                                        ?>
                                        @foreach($subordinate->getKPI as $kpi)
                                        <?php
                                            $totalPoints = $totalPoints + ($kpi->getAchievement() * ($kpi->getWeight() / 100));
                                            $numOfKpis = $numOfKpis + 1;
                                        ?>
                                        <tr>
                                            <td>{{ $kpi->kpiTemplate->bsc->getName() }}</td>
                                            <td>{{ $kpi->kpiTemplate->kpi->getName() }}</td>
                                            <td style="text-align: center;">{{ $kpi->getTarget() }}</td>
                                            <td style="text-align: center;">{{ $kpi->getWeight() }}%</td>
                                            <td style="text-align: center;">{{ $kpi->getSelfAppraisal() }}</td>
                                            <td style="text-align: center;">{{ $kpi->getAchievement() }}</td>
                                            <td style="text-align: center;" class="{{ $kpi->getClassStatusSub() }}">
                                                {{ $kpi->getStatus() }}<br>
                                                <a onclick="javascript:showEdit({{ $kpi->getId() }}, {{ $kpi->kpiTemplate->kpi->getId() }}, {{ $kpi->kpiTemplate->bsc->getId() }}, {{ $subordinate->getPositionId() }})"><i class="far fa-edit"> Edit</i></a>&nbsp;&nbsp;<br>
                                                <form class="form-delete" method="POST" action="/em/kpi/{{ $kpi->getId() }}">
                                                    @csrf 
                                                    @method('DELETE')
                                                    <a class="btn btn-delete "><i class="far fa-trash-alt"> Delete</i></a>
                                                </form>
                                            </td>
                                        </tr>
                                        <!-- EDIT KPI -->
                                        <div class="modal fade s-16" id="update-kpi-{{ $kpi->getId() }}">
                                            <div class="modal-dialog modal-lg">
                                                <form id="form-update-kpi-{{ $kpi->getId() }}">
                                                    {{ csrf_field() }}

                                                    <div class="modal-content b-0 r-10">
                                                        <a href="#" data-dismiss="modal" aria-label="Close" class="inbox-back">Back</a>
                                                        <div class="modal-header mb-10">
                                                            <h6 class="modal-title">Edit Subordinate KPI</h6>
                                                        </div>

                                                        <div class="modal-body no-p no-b">
                                                            <div class="row">
                                                                <div class="form-group col-md-6 test">
                                                                    <select class="custom-select select2 select-emp" name="employee_id">
                                                                        <option value="{{ $subordinate->getId() }}" >{{ $subordinate->getName() }}</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <select class="custom-select select2 bsc_class" name="bsc" href-data="{{ $subordinate->getPositionId() }}" required>
                                                                        <option value="">BSC</option>
                                                                        @foreach($bscs as $bsc)
                                                                            <option value="{{ $bsc->getId() }}" {{ $kpi->kpiTemplate->bsc->getId() == $bsc->getId()?'selected':''  }}>{{ $bsc->getName() }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <select class="custom-select select2 kpi_class" name="kpi_id" id="kpi-curr-{{ $kpi->getId() }}" required>
                                                                        <option value="">Select KPI</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <select class="custom-select select2" name="year" required>
                                                                        <option value="">Year</option>
                                                                        <?php $currentYear = intval(date('Y')); ?>
                                                                        @for ($year = $currentYear - 1; $year <= $currentYear + 1; $year++)
                                                                            <option value="{{ $year }}" {{ $kpi->getYears() == $year?'selected':''  }}>{{ $year }}</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <input type="text" class="form-control " name="target" value="{{ $kpi->getTarget() }}" placeholder="Target" required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <input type="hidden" class="oldweightkpi" name="old_weight" value="{{ $kpi->getWeight() }}">
                                                                    <input type="number" class="form-control weightkpi" name="weight" placeholder="Weight" value="{{ $kpi->getWeight() }}" required max="100" min="1" maxlength="5" alt="edit weight kpi">
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <div class="text-main s-14 font-semibold mb-10">Indicator 1</div>
                                                                    <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator1" cols="30" rows="7">{{ $kpi->getIndicators()->indicator1 }}</textarea>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <div class="text-main s-14 font-semibold mb-10">Indicator 2</div>
                                                                    <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator2" cols="30" rows="7">{{ $kpi->getIndicators()->indicator2 }}</textarea>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <div class="text-main s-14 font-semibold mb-10">Indicator 3</div>
                                                                    <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator3" cols="30" rows="7">{{ $kpi->getIndicators()->indicator3 }}</textarea>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <div class="text-main s-14 font-semibold mb-10">Indicator 4</div>
                                                                    <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator4" cols="30" rows="7">{{ $kpi->getIndicators()->indicator4 }}</textarea>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <div class="text-main s-14 font-semibold mb-10">Indicator 5</div>
                                                                    <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator5" cols="30" rows="7">{{ $kpi->getIndicators()->indicator5 }}</textarea>
                                                                </div>
                                                                <!-- <div class="form-group col-md-12">
                                                                    <div class="text-main s-14 font-semibold mb-10">Indicator 6</div>
                                                                    <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator6" cols="30" rows="7"></textarea>
                                                                </div> -->
                                                                                                        
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer mt-30">
                                                            <button onclick="updateKPI({{ $kpi->getId() }})" type="button" class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10 w-100px">
                                                                Update
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    <div>Total Score: <strong>{{ number_format($subordinate->getFinalScore(), 2) }}</strong></div>

                                </div>
                                <!-- POPUP ADD KPI -->
                                <div class="modal fade s-16" id="add-subordinate-kpi-{{ $subordinate->getId() }}">
                                    <div class="modal-dialog modal-lg">
                                        <form id="kpi_submit-{{ $subordinate->getId() }}">
                                            {{ csrf_field() }}
                                            <div class="modal-content b-0 r-10">
                                                <div class="modal-header mb-10">
                                                    <h6 class="modal-title">Add Subordinate KPI</h6>
                                                    <button data-dismiss="modal" class="close" style="padding: 0px 8px;">×</button>
                                                </div>
                                                <div class="modal-body no-p no-b">
                                                    <div class="row">
                                                        <div class="form-group col-md-6 test">
                                                            <select class="custom-select select2 select-emp" name="employee_id">
                                                                <option value="{{ $subordinate->getId() }}">{{ $subordinate->getName() }}</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <select class="custom-select select2 bsc_class" name="bsc" href-data="{{ $subordinate->getPositionId() }}" required>
                                                                <option value="">Select BSC</option>
                                                                @foreach($subordinate->getTemplateKPI() as $template)
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
                                                            <input id="weight_id" type="number" class="form-control weightkpi" name="weight" placeholder="Weight" value="10" required max="100" min="0" maxlength="5">
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <div class="text-main s-14 font-semibold mb-10">Indicator 1</div>
                                                            <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator1" cols="30" rows="7"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <div class="text-main s-14 font-semibold mb-10">Indicator 2</div>
                                                            <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator2" cols="30" rows="7"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <div class="text-main s-14 font-semibold mb-10">Indicator 3</div>
                                                            <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator3" cols="30" rows="7"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <div class="text-main s-14 font-semibold mb-10">Indicator 4</div>
                                                            <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator4" cols="30" rows="7"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <div class="text-main s-14 font-semibold mb-10">Indicator 5</div>
                                                            <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator5" cols="30" rows="7"></textarea>
                                                        </div>
                                                        <!-- <div class="form-group col-md-12">
                                                            <div class="text-main s-14 font-semibold mb-10">Indicator 6</div>
                                                            <textarea class="form-control form-control-lg" placeholder="Type here.." name="indicator6" cols="30" rows="7"></textarea>
                                                        </div> -->
                                                                                                
                                                    </div>
                                                </div>
                                                <div class="modal-footer mt-30">
                                                    <button id="btnSubmitKPI_Id" onclick="submitKPI({{ $subordinate->getId() }})" type="button" class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10 w-100px">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                                <!-- POPUP INPUT SCORE -->
                                <div class="modal fade s-16" id="inputscore-{{ $subordinate->getId() }}">
                                    <div class="modal-dialog modal-md dis-flex align-center height-100p">
                                        <form id="form_score-{{ $subordinate->getId() }}" class="col-xs-12">
                                            {{ csrf_field() }}
                                            <div class="modal-content b-0 r-10">
                                                <div class="modal-header mb-10">
                                                    <h6 class="modal-title">Subordinate Apprasial - Input Achievement</h6>
                                                       <button data-dismiss="modal" class="close" style="padding: 0px 8px;">×</button>
                                                </div>
                                                <div class="modal-body no-p no-b">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <select class="custom-select select2" name="{{ $subordinate->getId() }}">
                                                                <option value="{{ $subordinate->getId() }}">{{ $subordinate->getName() }}</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <select class="custom-select select2 select-month" name="month" required>
                                                                <?php $currentMonth = intval(date('m')); ?>
                                                                <option value="">Month</option>
                                                                <option value="01" @if ($currentMonth == 1) selected @endif >Januari</option>
                                                                <option value="02" @if ($currentMonth == 2) selected @endif >Februari</option>
                                                                <option value="03" @if ($currentMonth == 3) selected @endif >Maret</option>
                                                                <option value="04" @if ($currentMonth == 4) selected @endif >April</option>
                                                                <option value="05" @if ($currentMonth == 5) selected @endif >Mei</option>
                                                                <option value="06" @if ($currentMonth == 6) selected @endif >Juni</option>
                                                                <option value="07" @if ($currentMonth == 7) selected @endif >Juli</option>
                                                                <option value="08" @if ($currentMonth == 8) selected @endif >Agustus</option>
                                                                <option value="09" @if ($currentMonth == 9) selected @endif >Sepetember</option>
                                                                <option value="10" @if ($currentMonth == 10) selected @endif >Oktober</option>
                                                                <option value="11" @if ($currentMonth == 11) selected @endif >November</option>
                                                                <option value="12" @if ($currentMonth == 12) selected @endif >Desember</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <select class="custom-select select2 select-year" name="year" required>
                                                                <option value="">Year</option>
                                                                <?php $currentYear = intval(date('Y')); ?>
                                                                @for ($year = $currentYear - 1; $year <= $currentYear + 1; $year++)
                                                                <option value="{{ $year }}" @if($year == date('Y')) selected @endif >{{ $year }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <select class="custom-select select2 select-kpi" name="kpi_id" required>
                                                                <option value="" selected>Select KPI</option>
                                                                @foreach($subordinate->getKpi as $kpi)
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
                                                                <option value="" selected>Select Achievement...</option>
																@for ($i = 0; $i <= 5; $i++)
																	<option value="{{ $i }}">{{ $i }}</option>
																@endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button id="btn_submit_achievement" type="button" onclick="submitScore({{ $subordinate->getId() }})" class="btn-save mb-0 btn btn-primary font-semibold s-16 pz-20 r-10" disabled="disabled">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>                                
                            <!-- END FORM -->
                        </div>
                    </li>
                    @endforeach
                @else
                    <li>You don't have any subordinates.</li>
                @endif
            </ul>
        </div>
        <!-- END MAIN -->
    </div>

<!-- POPUP TRACK KPI -->
<div class="modal fade s-16" id="track-kpi">
    <div class="modal-dialog modal-xl">
        <div class="modal-content b-0 r-10">
            <div class="modal-header mb-10">
                <h6 class="modal-title">Track KPI - <span id="track_kpi_employee_name"></span></h6>
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

                            <tbody id="track_kpi_contents">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- POPUP INPUT KPI BARU -->
<div class="modal fade s-16" id="input_kpi_baru">
    <div class="modal-dialog modal-md dis-flex align-center height-100p">
        <form id="form_inpu_kpi_baru" class="col-xs-12">
            {{ csrf_field() }}
            <div class="modal-content b-0 r-10" style="border : solid 1px #000">
                <div class="modal-header mb-10">
                    <h6 class="modal-title">Add New KPI Template</h6>
                    <button data-dismiss="modal" class="close" style="padding: 0px 8px;">×</button>
                </div>
                <div class="modal-body no-p no-b">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <select class="custom-select select2" id="id_location_id" name="location_id" required>
                                <option value="">Location</option>
                                @foreach($locations as $location)
                                    <option value="{{ $location->getId() }}">{{ $location->getName() }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <select class="custom-select select2" name="bsc_id" required>
                                <option value="">BSC</option>
                                @foreach($bscs as $bsc)
                                    <option value="{{ $bsc->getId() }}">{{ $bsc->getName() }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <select class="custom-select select2" id="id_position_id" name="position_id" required>
                                <option value="">Position</option>
                                @foreach($positions as $position)
                                    <option value="{{ $position->getId() }}">{{ $position->getName() }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="kpi" value="" placeholder="KPI" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="submitKPIBaru()" class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="ex1">
    <div class="modal-dialog modal-md dis-flex align-center height-100p">
        <div class="modal-content b-0 r-10" style="width:unset">
            <div class="modal-header mb-10">
                <h6 class="modal-title ext1-message">Data telah tersimpan</h6>
                <button data-dismiss="modal" class="close" style="padding: 0px 8px;">×</button>
            </div>
            <div class="modal-body no-p no-b">
                <div class="row"></div>
            </div>
            <div class="modal-footer text-center" style="display: unset">
                <button class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10" onclick="location.reload();">
                    OK
                </button>
            </div>
        </div>
    </div>
</div>
@if(session('message'))
<div class="modal fade" id="res-upload">
    <div class="modal-dialog modal-md dis-flex align-center height-100p">
        <div class="modal-content b-0 r-10" style="width:unset">
            <div class="modal-header mb-10">
                <h6 class="modal-title">{!! session('message') !!}</h6>
                <button data-dismiss="modal" class="close" style="padding: 0px 8px;">×</button>
            </div>
            <div class="modal-body no-p no-b">
                <div class="row"></div>
            </div>
            <div class="modal-footer text-center" style="display: unset">
                <button class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10" onclick="">
                    OK
                </button>
            </div>
        </div>
    </div>
</div>
@endif

<div id="dialog-confirm" title="Basic dialog" class="modal">
    <p>Are your sure want delete this record ?</p>
</div>

<script src="{{ url('skin/js/app.js') }}"></script>
<script type="text/javascript">
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
        var oldWeight = parseFloat($(this).parent().children('.oldweightkpi').val());
        var weight = parseFloat($(this).val());
        var finalWeight = weight - oldWeight;
        let emp_id = $(this).parent().parent().children('.test').children('.select-emp').val();

        getWeight(yearkpi, emp_id, finalWeight);
    });

    $(document).ready(function() {

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

        @if(session('message'))
        $('#res-upload').modal('toggle');
        @endif

        $("#csv_id").on('change', function(e) {
            $('#upload-kpi').submit();
            console.log('upload-kpi');
        })

        $("#csv_id2").on('change', function(e) {
            $('#upload-archiement').submit();
            console.log('upload archiement');
        })

        $(".btn-delete").on("click", function() {
            var submitId = $(this);
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

        $("#id_location_id").change(function() {
            let locationId = $(this).val();
            $.get('/em/getposbyloc', {loc_id: locationId}, function(result) {
                if (result.status == 200) {
                    // console.log(result.data);
                    let html = '';
                    result.data.forEach(element => {
                        html += '<option value="' + element.id + '">' + element.name + '</option>';
                    });
                    $("#id_position_id").html(html);
                } else {
                    console.log('Retrieve data error.');
                }
            });
        });
    });

    function getTrackKPI(employeeId) {
        $.get('/em/gettrackkpi/' + employeeId, function(result) {
            if (result.code == 200) {
                $('#track_kpi_employee_name').html(result.name);
                html ='';
                $.each(result.data, function(key, value) {
                    html += '<tr>';
                    html += '<td>' + value.title + '</td>';
                    html += '<td>' + (value.actual['01'] != undefined ? value.actual['01'] : '-') + '</td>';
                    html += '<td>' + (value.actual['02'] != undefined ? value.actual['02'] : '-') + '</td>';
                    html += '<td>' + (value.actual['03'] != undefined ? value.actual['03'] : '-') + '</td>';
                    html += '<td>' + (value.actual['04'] != undefined ? value.actual['04'] : '-') + '</td>';
                    html += '<td>' + (value.actual['05'] != undefined ? value.actual['05'] : '-') + '</td>';
                    html += '<td>' + (value.actual['06'] != undefined ? value.actual['06'] : '-') + '</td>';
                    html += '<td>' + (value.actual['07'] != undefined ? value.actual['07'] : '-') + '</td>';
                    html += '<td>' + (value.actual['08'] != undefined ? value.actual['08'] : '-') + '</td>';
                    html += '<td>' + (value.actual['09'] != undefined ? value.actual['09'] : '-') + '</td>';
                    html += '<td>' + (value.actual['10'] != undefined ? value.actual['10'] : '-') + '</td>';
                    html += '<td>' + (value.actual['11'] != undefined ? value.actual['11'] : '-') + '</td>';
                    html += '<td>' + (value.actual['12'] != undefined ? value.actual['12'] : '-') + '</td>';
                    html += '</tr>';
                });
                $("#track_kpi_contents").html(html);
            }
        });
    }

    function submitKPI(id) {
        var form = $('#kpi_submit-'+id);
        if(! form.valid()) return false;
        var data = $('#kpi_submit-'+id).serialize();  
        $.post(
            '/em/kpi/subordinate', data,
            function(response){
                if(response.code == 200) {
                    $('#add-subordinate-kpi-'+id).hide();
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

    function updateKPI(id) {
        message = '';
        var form = $('#form-update-kpi-'+id);
        if(! form.valid()) return false;
        var data = $('#form-update-kpi-'+id).serialize();  
        $.post(
            '/em/kpi/update/' + id, data,
            function(response){
                if(response.code == 200) {
                    $('#update-kpi-'+id).hide();
                    $('#ex1').modal('toggle');
                } else {
                    alert(response.message);
                }
            }
        ).fail(function(jqXHR, textStatus, errorThrown ){
            $.each(jqXHR.responseJSON.errors, function (i, item) {
                message = message + '\n' + item;
            })
            alert(message);
        });
    }

    function submitKPIBaru() {
        var form = $('#form_inpu_kpi_baru');
        if(! form.valid()) return false;
        var data = $('#form_inpu_kpi_baru').serialize();  
        $.post(
            '/em/kpi/add-new', data,
            function(response){
                $('#input_kpi_baru').hide();
                $('#ex1').modal('toggle');
            }
        ).fail(function(e){
            console.log('err');
            alert('Something is wrong. Please try again later.');
        });
    }

    function submitScore(id) {
        var form = $('#form_score-'+id);
        if(! form.valid()) return false;
        var data = $('#form_score-'+id).serialize();  
        $.post(
            '/em/kpi/subordinate/score', data,
            function(response){
                $('#inputscore-'+id).hide();
                $('#ex1').modal('toggle');
            }
        ).fail(function(e){
            console.log('err');
        });
    }

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

    var year, month, kpi_id;
    kpi_id = '';
    month = '{{ date("m") }}';
    year = '{{ date("Y") }}';

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

    function edit() {
        $('#update-kpi').modal('toggle');
    }

    function showEdit(id, kpi, bsc, pos_id) {
        $('#update-kpi-'+id).modal('toggle');
        $('#kpi-curr-'+id).empty();
        $.get( "/em/getkpi", { bsc_id: bsc, position_id: pos_id}, function(result) {
            $.each(result, function (i, item) {
                if (kpi == item.id) {
                    $('#kpi-curr-'+id).append($('<option>', { 
                        value: item.id,
                        text : item.name,
                        selected: 'selected'
                    })); 
                } else {
                    $('#kpi-curr-'+id).append($('<option>', { 
                        value: item.id,
                        text : item.name
                    }));
                }
            });
        });
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

$(document).on('hidden.bs.modal', function (event) {
    if ($('.modal:visible').length) {
        $('body').addClass('modal-open');
    }
});

function uploadCSV() {
    $('#csv_id').click();
}

function uploadCSVAchievement() {
    $('#csv_id2').click();
}
</script>
<style type="text/css">
    .error {
        color: red;
        font-size: 12px;
    }


</style>

@endsection

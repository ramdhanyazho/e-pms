@extends('app')

@section('sidebar')
@include('templates.employeesidebar')
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
                                    <img src="{!! $me->photo() !!}" alt="User Image" class="r-fl">
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
                                <h3 class="s-16 mt-2 mb-0 grade-disable">
                                    <!-- ?? TODO: Count grade -->
                                    [Only Available after January]
                                </h3>
                            </div>
                            <div class="pb-15">
                                <div class="d-flex align-start flex-wrap">
                                    <div class="wd-fl-12 mb-20">
                                        <div class="text-main s-14 font-semibold">Cost Center</div>
                                        <div class="s-14">{{ $me->costcenter->getName() }}</div>
                                    </div>
                                    <div class="wd-fl-12 mb-20">
                                        <div class="text-main s-14 font-semibold">Unit</div>
                                        <div class="s-14">{{ $me->division->getName() }}</div>
                                    </div>
                                    <div class="wd-fl-12 mb-20">
                                        <div class="text-main s-14 font-semibold">Period</div>
                                        <div class="s-14">{{ $me->getEvaluationPeriod() }}</div>
                                    </div>
                                    <div class="wd-fl-12 mb-20">
                                        <div class="text-main s-14 font-semibold">Year</div>
                                        <div class="s-14">{{ date("Y") }}</div>
                                    </div>
                                    <div class="wd-fl-12 mb-20">
                                        <div class="text-main s-14 font-semibold">Reporting Line</div>
                                        <div class="s-14">{{ $super_ordinate ? ucwords(strtolower($super_ordinate->getName())) : '-' }}</div>
                                    </div>
                                    <div class="wd-fl-12 mb-20">
                                        <div class="text-main s-14 font-semibold">Subordinate</div>
                                        @foreach ($me->getSubordinate() as $subordinate)
                                            <div class="s-14">{{ ucwords(strtolower($subordinate->getName())) }}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END MAIN SIDE LEFT PROFILE -->
                    </div>
                    <div class="col-md-9">
                        <div class="ml-4">
                            <!-- FILTER -->
                            <div class="col-sm-12 columns f-none mt-30">
                                <form action="" class="row">

                                    <div class="col-md-12 f-none clearfix">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <select id="period_id" name="period" class="form-control">
                                                    <option>Period</option>
                                                    <?php
                                                        $year = intval(date("Y"));
                                                        if (!isset($chosen_year)) $chosen_year = $year;
                                                    ?>
                                                    @for ($i = $year - 3; $i <= $year; $i++)
                                                        <option value="{{ $i }}" <?php if ($i == $chosen_year) echo "selected"; ?>>{{ $i }}</option>
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
                                            <div class="col-md-7 t-right">
                                                <!-- <a href="{{ url()->current()}}/print" target="_blank" class="mr-5 s-14 font-light">
                                                    <i class="fas fa-print mr-7"></i><i>Print</i>
                                                </a> -->
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
                            <div class="col-sm-12 f-none table-responsive mb-50">
                                <form action="#">
                                    <table class="table table-striped table-hover table-white">
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
                                                $totalWeight = 0.0;
                                                $totalAchievement = 0;
                                                $totalScore = 0;
                                            ?>
                                            @foreach($kpis as $kpi)
                                                <?php
                                                $weight = floatval($kpi->getWeight());
                                                $achievement = floatval($kpi->getAchievement());
                                                $score = $achievement * ($weight/100);
                                                ?>
                                                <tr>
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
                                </form>
                            </div>
                            <!-- END AREA TABLE -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
    </div>

    <script src="{{ url('skin/js/app.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#period_id").change(function() {
                window.location.href='/em/evaluation/' + $("#period_id").val();
            });

            $('.download').on('click', function() {
                window.location.href = '/em/download/' + $("#period_id").val();
            })
        });
    </script>
@endsection


@extends('app')

@section('sidebar')
@include('templates.employeesidebar', ['sidebar' => $sidebar])
@endsection

@section('content')
    <div class="page has-sidebar-left height-full">
        <div class="container-fluid bannerOD columns pt-20">
            <div class="col-xs-12">
                <div class="columns trans-blue d-flex align-center r-10">
                    <div class="relative">
                        <img src="{{ url('skin/img/dashboard-employee.png') }}" alt="" />
                    </div>
                    <div class="relative text-banner">
                        <h3>Hello, {{ $content['auth_user']->name }}!</h3>
                        <p>you have <span>{{ $tasks_count }}</span> unprocessed task as of today</p>
                        <a href="{{ url('/em/kpi') }}" class="btn btn-primary btn-lg mt-10 light-blue">Go to KPI Index ></a>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid">
            <!-- FILTER -->
            <div class="col-md-11 columns f-none mt-30 mb-30">
                <form action="" class="row">
                    <div class="col-md-12 f-none pt-b-10">
                        <div class="d-flex search-filter">
                            <div class="form-group">
                                <div class="select white r-5">
                                    <select id="" class="form-control">
                                        <option>Periode</option>
                                        <?php $currentYear = date('Y'); ?>
                                        @foreach ($periods as $period)
                                            <!-- TODO: set the detault to current year -->
                                            <option value="{{ $period }}" @if ($period == $currentYear) selected @endif >{{ $period }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // TODO: Make the search functionality works -->
                </form>
            </div>
            <!-- END FILTER -->
            <div class="col-md-12 columns f-none mb-30">
                <div class="row d-flex m-flex-wrap">
                    <div class="wd-fl-6 col-md-6 m-wd-fl-12 f-none employee-index">
                        <div class="col-xs-12 no-p f-none">
                            <h3 class="mb-15 thumb-Title">KPI Index</h3>
                            <div class="columns white col-xs-12 pt-b-20 r-10 mb-center">
                                <div class="col-md-4 col-sm-4 col-xs-12 m-mt-20">
                                    <span class="easy-pie-chart " data-percent="{{ $kpi_completed }}"
                                            data-options='{"lineWidth": 15, "size": 150, "scaleColor": false, "barColor": "#91e842", "trackColor":"#F1F2F7"}'>
                                            <span class="percent homePie cl-green">{{ $kpi_completed }}</span>
                                    </span>
                                    <span class="s-17 mt-10 mb-10 dis-block t-center cl-green">Completed</span>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 m-mt-20">
                                    <span class="easy-pie-chart " data-percent="{{ $kpi_on_progress }}"
                                            data-options='{"lineWidth": 15, "size": 150, "scaleColor": false, "barColor": "#1860ab", "trackColor":"#F1F2F7"}'>
                                            <span class="percent homePie cl-blue">{{ $kpi_on_progress }}</span>
                                    </span>
                                    <span class="s-17 mt-10 mb-10 dis-block t-center cl-blue">On Progress</span>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 m-mt-20">
                                    <span class="easy-pie-chart " data-percent="{{ $kpi_unprocessed }}"
                                            data-options='{"lineWidth": 15, "size": 150, "scaleColor": false, "barColor": "#f3933d", "trackColor":"#F1F2F7"}'>
                                            <span class="percent homePie cl-orange">{{ $kpi_unprocessed }}</span>
                                    </span>
                                    <span class="s-17 mt-10 mb-10 dis-block t-center cl-orange">Unprocessed</span>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-12 no-p f-none">
                            <div class="mt-30 custom-date">
                                <input type="text" class="date-time-picker form-control form-control-lg"
                                       data-options='{"inline":true, "timepicker":false, "format":"d.m.Y H:i"}'/>
                            </div>
                        </div>
                    </div>
                    <div class="wd-fl-6 col-md-6 m-wd-fl-12 f-none m-wd-fl-12">
                        <h3 class="mb-15 thumb-Title">To do list</h3>
                        <div class="white p-20 r-10 slimScroll" data-height="648">
                            <ul class="list-unstyled list-border-b">
                                @if (count($tasks) > 0)
                                    @foreach ($tasks as $task)
                                        <li>{!! $task->getTodo() !!}</li>
                                    @endforeach
                                @else
                                    <li>Yay! You have no tasks.</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 columns f-none">
                <div class="row">
                    <div class="col-md-6">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('skin/js/app.js') }}"></script>
@endsection
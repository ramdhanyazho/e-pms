@extends('app')

@section('sidebar')
@include('templates.sidebar', ['sidebar' => $sidebar])
@endsection

@section('content')
    <div class="page has-sidebar-left height-full">
            <div class="container-fluid bannerOD columns pt-20">
            <div class="col-xs-12">
                <div class="columns trans-blue d-flex align-center r-10">
                    <div class="relative">
                    <img src="{{ url('skin/img/dashboard-od.png') }}" alt="" />
                    </div>
                    <div class="relative text-banner">
                        <h3>Hello, {{ $content['auth_user']->name }}</h3>
                        <p>You have <span>{{ $tasks_count }}</span> unprocessed task as of today</p>
                        <a href="{{ url('/em/dashboard') }}" class="btn btn-primary btn-lg mt-10 light-blue">You've logged in as OD. Click here to switch as Employee</a><br>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- FILTER -->
            <div class="col-md-11 columns f-none mt-30 mb-30">
                <form action="" class="row">

                    <!--
                    <div class="col-md-5 f-none">
                        <div class="input-group border r-10 mb-10 bg-whtsmoke-opacity">
                            <span class="input-group-append">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </span>
                            <input type="text" class="date-time-picker form-control bg-transparent no-b"
                                   data-options='{"timepicker":false, "format":"d/m/Y"}' placeholder="dd/mm/yy" />
                        </div>
                    </div>
                -->
                    <div class="col-md-12 f-none pt-b-10">
                        <div class="d-flex search-filter">
                            <div class="form-group">
                                <div class="select white r-5">
                                    <select id="" class="form-control" style="width: 100px;">
                                        <option>Periode</option>
                                        @foreach ($periods as $period)
                                            <option value="{{ $period }}">{{ $period }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="select white r-5">
                                    <select id="" class="form-control">
                                        <option>Company</option>
                                        @foreach ($companies as $cpKey => $cpValue)
                                            <option value="{{ $cpKey }}">{{ $cpValue }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="select white r-5">
                                    <select id="" class="form-control">
                                        <option>Location</option>
                                        @foreach ($locations as $locKey => $locValue)
                                            <option value="{{ $locKey }}">{{ $locValue }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="select white r-5">
                                    <select id="" class="form-control">
                                        <option>Cost Center</option>
                                        @foreach ($costcenters as $ccKey => $ccValue)
                                            <option value="{{ $ccKey }}">{{ $ccValue }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // TODO: Enable search functionality  -->
                </form>
            </div>
            <!-- END FILTER -->
            <div class="col-md-11 columns f-none mb-30">
                <div class="row">
                    <div class="col-md-7">
                        <!-- 
                            Evaluation Progress
                        -->
                        <div class="columns">
                            <h3 class="mb-15 thumb-Title">Evaluation Progress</h3>
                            <div class="columns white col-xs-12 pt-b-20">
                                <div class="col-md-4 col-sm-4 col-xs-12 t-center m-mt-20">
                                    <span class="easy-pie-chart " data-percent="{{ $kpi_completed }}"
                                            data-options='{"lineWidth": 15, "size": 150, "scaleColor": false, "barColor": "#91e842", "trackColor":"#F1F2F7"}'>
                                            <span class="percent homePie cl-green">{{ $kpi_completed }}</span>
                                    </span>
                                    <span class="s-17 mt-10 mb-0 dis-block">Completed</span>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 t-center m-mt-20">
                                    <span class="easy-pie-chart " data-percent="{{ $kpi_on_progress }}"
                                            data-options='{"lineWidth": 15, "size": 150, "scaleColor": false, "barColor": "#1860ab", "trackColor":"#F1F2F7"}'>
                                            <span class="percent homePie cl-blue">{{ $kpi_on_progress }}</span>
                                    </span>
                                    <span class="s-17 mt-10 mb-0 dis-block">On Progress</span>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 t-center m-mt-20">
                                    <span class="easy-pie-chart " data-percent="{{ $kpi_unprocessed }}"
                                            data-options='{"lineWidth": 15, "size": 150, "scaleColor": false, "barColor": "#f3933d", "trackColor":"#F1F2F7"}'>
                                            <span class="percent homePie cl-orange">{{ $kpi_unprocessed }}</span>
                                    </span>
                                    <span class="s-17 mt-10 mb-0 dis-block">Unprocessed</span>
                                </div>
                            </div>
                        </div>
                        <!-- 
                            Grade
                        -->
                        <div class="columns">
                            <h3 class="mb-15 thumb-Title">Grade</h3>
                            <div class="col-xs-12 pt-b-20">
                                <div class="row dis-flex m-flex-colum">
+                                    <div class="dash-doughnut m-mlr-center">
                                        <canvas
                                                data-chart="chartJs"
                                                data-chart-type="doughnut"
                                                data-dataset="[
                                                    [10.3, 29.7, 55, 5]
                                                ]"
                                                data-labels="['A','B','C','D']"
                                                data-dataset-options="[
                                                                {
                                                                    label: 'Disk',
                                                                    backgroundColor: [
                                                                        '#245BA6',
                                                                        '#91e842',
                                                                        '#f3933d',
                                                                        '#be2b27'
                                                                    ],

                                                                },


                                                                ]"
                                                data-options="{
                                                    legend: {
                                                        display: false,
                                                    },
                                                    tooltips: {enabled: false},
                                                    cutoutPercentage: 80,
                                                    
                                            }"
                                        >
                                        </canvas>
                                        <span class="title-total">
                                            <span class="count-dough">Total</span><span>1.700</span>
                                        </span>
                                    </div>
                                    <div class="notes-doughnut columns">
                                        <div class="rank columns mb-10">
                                            <span class="push-left-30 icon-bullet grade-A">A. 10.3%</span>
                                            <span class="push-left-30"><i class="fas fa-user"></i> 170</span>
                                        </div>
                                        <div class="rank columns mb-10">
                                            <span class="push-left-30 icon-bullet grade-B">B. 29.7%</span>
                                            <span class="push-left-30"><i class="fas fa-user"></i> 530</span>
                                        </div>
                                        <div class="rank columns mb-10">
                                            <span class="push-left-30 icon-bullet grade-C">C. 55%</span>
                                            <span class="push-left-30"><i class="fas fa-user"></i> 915</span>
                                        </div>
                                        <div class="rank columns mb-10">
                                            <span class="push-left-30 icon-bullet grade-D">D. 5%</span>
                                            <span class="push-left-30"><i class="fas fa-user"></i> 85</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 
                            Human Asset Value
                        -->
                        <div class="columns">
                            <h3 class="mb-15 thumb-Title">Human Asset Value (NOT AVAILABLE AT THIS TIME)</h3>
                            <div class="columns col-xs-12">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-asset">
                                            <tr>
                                                <td>A</td>
                                                <td class="tooltip">
                                                    <span class="grade-C">0%</span>
                                                    <div class="ele-tooltip">
                                                        <div class="progress mb-10">
                                                           <div class="progress-bar" 
                                                           role="progressbar"
                                                           role-grade="C"
                                                           role-valuenow="6.25"></div>
                                                           <!-- 
                                                            ROLE GRADE MUST CAPITAL
                                                           -->
                                                        </div>
                                                        <span class="d-block s-14">Low Performer</span>
                                                        <span class="d-block cl-perform s-24 font-bold">0%</span>
                                                        <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                    </div>
                                                </td>
                                                <td class="tooltip">
                                                    <span class="grade-C">0%</span>
                                                    <div class="ele-tooltip">
                                                        <div class="progress mb-10">
                                                           <div class="progress-bar" 
                                                           role="progressbar"
                                                           role-grade="C"
                                                           role-valuenow="26.25"></div>
                                                           <!-- 
                                                            ROLE-GRADE MUST CAPITAL
                                                           -->
                                                        </div>
                                                        <span class="d-block s-14">Medium Performer</span>
                                                        <span class="d-block cl-perform s-24 font-bold">0%</span>
                                                        <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                    </div>
                                                </td>
                                                <td class="tooltip">
                                                    <span class="grade-B">0%</span>
                                                    <div class="ele-tooltip">
                                                        <div class="progress mb-10">
                                                           <div class="progress-bar" 
                                                           role="progressbar"
                                                           role-grade="B"
                                                           role-valuenow="50"></div>
                                                           <!-- 
                                                            ROLE GRADE MUST CAPITAL
                                                           -->
                                                        </div>
                                                        <span class="d-block s-14">Medium Performer</span>
                                                        <span class="d-block cl-perform s-24 font-bold">0%</span>
                                                        <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                    </div>
                                                </td>
                                                <td class="tooltip">
                                                    <span class="grade-A">0%</span>
                                                    <div class="ele-tooltip">
                                                        <div class="progress mb-10">
                                                           <div class="progress-bar" 
                                                           role="progressbar"
                                                           role-grade="A"
                                                           role-valuenow="75"></div>
                                                           <!-- 
                                                            ROLE GRADE MUST CAPITAL
                                                           -->
                                                        </div>
                                                        <span class="d-block s-14">Strong Performer</span>
                                                        <span class="d-block cl-perform s-24 font-bold">0%</span>
                                                        <span class="d-block s-14"><i class="fas fa-user" style=""></i> 10</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>B</td>
                                                <td class="tooltip">
                                                    <span class="grade-C">0%</span>
                                                    <div class="ele-tooltip">
                                                        <div class="progress mb-10">
                                                           <div class="progress-bar" 
                                                           role="progressbar"
                                                           role-grade="C"
                                                           role-valuenow="44"></div>
                                                           <!-- 
                                                            ROLE GRADE MUST CAPITAL
                                                           -->
                                                        </div>
                                                        <span class="d-block s-14">Low Performer</span>
                                                        <span class="d-block cl-perform s-24 font-bold">0%</span>
                                                        <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                    </div>
                                                </td>
                                                <td class="tooltip">
                                                    <span class="grade-A">0%</span>
                                                    <div class="ele-tooltip">
                                                        <div class="progress mb-10">
                                                           <div class="progress-bar" 
                                                           role="progressbar"
                                                           role-grade="A"
                                                           role-valuenow="80"></div>
                                                           <!-- 
                                                            ROLE GRADE MUST CAPITAL
                                                           -->
                                                        </div>
                                                        <span class="d-block s-14">Strong Performer</span>
                                                        <span class="d-block cl-perform s-24 font-bold">0%</span>
                                                        <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                    </div>
                                                </td>
                                                <td class="tooltip">
                                                    <span class="grade-C">0%</span>
                                                    <div class="ele-tooltip">
                                                        <div class="progress mb-10">
                                                           <div class="progress-bar" 
                                                           role="progressbar"
                                                           role-grade="B"
                                                           role-valuenow="55"></div>
                                                           <!-- 
                                                            ROLE GRADE MUST CAPITAL
                                                           -->
                                                        </div>
                                                        <span class="d-block s-14">Medium Performer</span>
                                                        <span class="d-block cl-perform s-24 font-bold">0%</span>
                                                        <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                    </div>
                                                </td>
                                                <td class="tooltip">
                                                    <span class="grade-C">0%</span>
                                                    <div class="ele-tooltip">
                                                        <div class="progress mb-10">
                                                           <div class="progress-bar" 
                                                           role="progressbar"
                                                           role-grade="C"
                                                           role-valuenow="35"></div>
                                                           <!-- 
                                                            ROLE GRADE MUST CAPITAL
                                                           -->
                                                        </div>
                                                        <span class="d-block s-14">Low Performer</span>
                                                        <span class="d-block cl-perform s-24 font-bold">0%</span>
                                                        <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>C</td>
                                                <td class="tooltip">
                                                    <span class="grade-C">0%</span>
                                                    <div class="ele-tooltip">
                                                        <div class="progress mb-10">
                                                           <div class="progress-bar" 
                                                           role="progressbar"
                                                           role-grade="C"
                                                           role-valuenow="6.25"></div>
                                                           <!-- 
                                                            ROLE GRADE MUST CAPITAL
                                                           -->
                                                        </div>
                                                        <span class="d-block s-14">Low Performer</span>
                                                        <span class="d-block cl-perform s-24 font-bold">0%</span>
                                                        <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                    </div>
                                                </td>
                                                <td class="tooltip">
                                                    <span class="grade-C">0%</span>
                                                    <div class="ele-tooltip">
                                                        <div class="progress mb-10">
                                                           <div class="progress-bar" 
                                                           role="progressbar"
                                                           role-grade="C"
                                                           role-valuenow="6.25"></div>
                                                           <!-- 
                                                            ROLE GRADE MUST CAPITAL
                                                           -->
                                                        </div>
                                                        <span class="d-block s-14">Low Performer</span>
                                                        <span class="d-block cl-perform s-24 font-bold">0%</span>
                                                        <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                    </div>
                                                </td>
                                                <td class="tooltip">
                                                    <span class="grade-C">0%</span>
                                                    <div class="ele-tooltip">
                                                        <div class="progress mb-10">
                                                           <div class="progress-bar" 
                                                           role="progressbar"
                                                           role-grade="C"
                                                           role-valuenow="6.25"></div>
                                                           <!-- 
                                                            ROLE GRADE MUST CAPITAL
                                                           -->
                                                        </div>
                                                        <span class="d-block s-14">Low Performer</span>
                                                        <span class="d-block cl-perform s-24 font-bold">0%</span>
                                                        <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                    </div>
                                                </td>
                                                <td class="tooltip">
                                                    <span class="grade-C">0%</span>
                                                    <div class="ele-tooltip">
                                                        <div class="progress mb-10">
                                                           <div class="progress-bar" 
                                                           role="progressbar"
                                                           role-grade="C"
                                                           role-valuenow="6.25"></div>
                                                           <!-- 
                                                            ROLE GRADE MUST CAPITAL
                                                           -->
                                                        </div>
                                                        <span class="d-block s-14">Low Performer</span>
                                                        <span class="d-block cl-perform s-24 font-bold">0%</span>
                                                        <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>D</td>
                                                <td class="tooltip">
                                                    <span class="grade-A">0%</span>
                                                    <div class="ele-tooltip">
                                                        <div class="progress mb-10">
                                                           <div class="progress-bar" 
                                                           role="progressbar"
                                                           role-grade="A"
                                                           role-valuenow="77"></div>
                                                           <!-- 
                                                            ROLE GRADE MUST CAPITAL
                                                           -->
                                                        </div>
                                                        <span class="d-block s-14">Strong Performer</span>
                                                        <span class="d-block cl-perform s-24 font-bold">0%</span>
                                                        <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                    </div>
                                                </td>
                                                <td class="tooltip">
                                                    <span class="grade-B">0%</span>
                                                    <div class="ele-tooltip">
                                                        <div class="progress mb-10">
                                                           <div class="progress-bar" 
                                                           role="progressbar"
                                                           role-grade="B"
                                                           role-valuenow="60.25"></div>
                                                           <!-- 
                                                            ROLE GRADE MUST CAPITAL
                                                           -->
                                                        </div>
                                                        <span class="d-block s-14">Medium Performer</span>
                                                        <span class="d-block cl-perform s-24 font-bold">0%</span>
                                                        <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                    </div>
                                                </td>
                                                <td class="tooltip">
                                                    <span class="grade-C">0%</span>
                                                    <div class="ele-tooltip">
                                                        <div class="progress mb-10">
                                                           <div class="progress-bar" 
                                                           role="progressbar"
                                                           role-grade="C"
                                                           role-valuenow="46.30"></div>
                                                           <!-- 
                                                            ROLE GRADE MUST CAPITAL
                                                           -->
                                                        </div>
                                                        <span class="d-block s-14">Low Performer</span>
                                                        <span class="d-block cl-perform s-24 font-bold">0%</span>
                                                        <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                    </div>
                                                </td>
                                                <td class="tooltip">
                                                    <span class="grade-B">0%</span>
                                                    <div class="ele-tooltip">
                                                        <div class="progress mb-10">
                                                           <div class="progress-bar" 
                                                           role="progressbar"
                                                           role-grade="B"
                                                           role-valuenow="60.25"></div>
                                                           <!-- 
                                                            ROLE GRADE MUST CAPITAL
                                                           -->
                                                        </div>
                                                        <span class="d-block s-14">Medium Performer</span>
                                                        <span class="d-block cl-perform s-24 font-bold">0%</span>
                                                        <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="notes-table"><45%</td>
                                                <td class="notes-table">>50%</td>
                                                <td class="notes-table">>61%</td>
                                                <td class="notes-table">>71%</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-4">
                        <h3 class="mb-15 thumb-Title">Bussines Unit Performance</h3>
                        <div class="slimScroll" data-height="900">
                            <div class="columns white col-xs-12 pt-b-20">
                                <div class="columns mb-30 pb-30">
                                    <div style="height: 200px">
                                        <canvas
                                                data-chart="bar"
                                                data-dataset="[[40, 80, 30, 60]]"
                                                data-labels="['data 1','data 2','data 3','data 4']"
                                                data-dataset-options="[
                                                            { label:'Kelengkapan', backgroundColor: '#245BA6'}]"
                                                data-options="{
                                                                maintainAspectRatio: false,
                                                                scales: {
                                                                    xAxes: [{
                                                                        display: false,
                                                                        categoryPercentage: 0.5,
                                                                    }],
                                                                    yAxes: [{
                                                                        display: true,
                                                                        ticks: {
                                                                            fixedStepSize: 25
                                                                        }
                                                                    }]
                                                                },
                                                                
                                                            }">
                                        </canvas>
                                    </div>
                                    <div class="s-16 mt-3 t-center font-bold pb-15">BMW</div>
                                </div>
                                <div class="columns mb-30 pb-30">
                                    <div style="height: 200px">
                                        <canvas
                                                data-chart="bar"
                                                data-dataset="[[20, 50, 30, 90]]"
                                                data-labels="['data 1','data 2','data 3','data 4']"
                                                data-dataset-options="[
                                                            { label:'Kelengkapan', backgroundColor: '#245BA6'}]"
                                                data-options="{
                                                                maintainAspectRatio: false,
                                                                scales: {
                                                                    xAxes: [{
                                                                        display: false,
                                                                        categoryPercentage: 0.5,
                                                                    }],
                                                                    yAxes: [{
                                                                        display: true,
                                                                        ticks: {
                                                                            fixedStepSize: 25
                                                                        }
                                                                    }]
                                                                },
                                                                
                                                            }">
                                        </canvas>
                                    </div>
                                    <div class="s-16 mt-3 t-center font-bold pb-15">Honda</div>
                                </div>
                                <div class="columns mb-30 pb-30">
                                    <div style="height: 200px">
                                        <canvas
                                                data-chart="bar"
                                                data-dataset="[[10, 40, 80, 60]]"
                                                data-labels="['data 1','data 2','data 3','data 4']"
                                                data-dataset-options="[
                                                            { label:'Kelengkapan', backgroundColor: '#245BA6'}]"
                                                data-options="{
                                                                maintainAspectRatio: false,
                                                                scales: {
                                                                    xAxes: [{
                                                                        display: false,
                                                                        categoryPercentage: 0.5,
                                                                    }],
                                                                    yAxes: [{
                                                                        display: true,
                                                                        ticks: {
                                                                            fixedStepSize: 25
                                                                        }
                                                                    }]
                                                                },
                                                                
                                                            }">
                                        </canvas>
                                    </div>
                                    <div class="s-16 mt-3 t-center font-bold pb-15">Toyota</div>
                                </div>
                                <div class="columns mb-30 pb-30">
                                    <div style="height: 200px">
                                        <canvas
                                                data-chart="bar"
                                                data-dataset="[[80, 30, 60, 90]]"
                                                data-labels="['data 1','data 2','data 3','data 4']"
                                                data-dataset-options="[
                                                            { label:'Kelengkapan', backgroundColor: '#245BA6'}]"
                                                data-options="{
                                                                maintainAspectRatio: false,
                                                                scales: {
                                                                    xAxes: [{
                                                                        display: false,
                                                                        categoryPercentage: 0.5,
                                                                    }],
                                                                    yAxes: [{
                                                                        display: true,
                                                                        ticks: {
                                                                            fixedStepSize: 25
                                                                        }
                                                                    }]
                                                                },
                                                                
                                                            }">
                                        </canvas>
                                    </div>
                                    <div class="s-16 mt-3 t-center font-bold pb-15">Mazda</div>
                                </div>
                                <div class="columns mb-30 pb-30">
                                    <div style="height: 200px">
                                        <canvas
                                                data-chart="bar"
                                                data-dataset="[[50, 80, 30, 60]]"
                                                data-labels="['data 1','data 2','data 3','data 4']"
                                                data-dataset-options="[
                                                            { label:'Kelengkapan', backgroundColor: '#245BA6'}]"
                                                data-options="{
                                                                maintainAspectRatio: false,
                                                                scales: {
                                                                    xAxes: [{
                                                                        display: false,
                                                                        categoryPercentage: 0.5,
                                                                    }],
                                                                    yAxes: [{
                                                                        display: true,
                                                                        ticks: {
                                                                            fixedStepSize: 25
                                                                        }
                                                                    }]
                                                                },
                                                                
                                                            }">
                                        </canvas>
                                    </div>
                                    <div class="s-16 mt-3 t-center font-bold pb-15">Lexus</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('skin/js/app.js') }}"></script>
@endsection
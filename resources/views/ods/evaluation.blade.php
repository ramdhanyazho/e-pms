@extends('app')

@section('sidebar')
@include('templates.sidebar')
@endsection

@section('content')
    <div class="page has-sidebar-left height-full">

        <div class="container-fluid animatedParent">
            <!-- FILTER -->
            <div class="col-md-11 columns f-none mt-30 mb-30">
                <form action="" class="row" id="form-filter">

                    <div class="col-md-12 f-none pt-b-10">
                        <div class="input-group border r-10 mb-10 bg-whtsmoke-opacity">
                            <input type="text" name="name" style="margin-right: 30px;" class="s-18 form-control bg-transparent no-b p-25" placeholder="Search Name" 
                                value="{{ (isset($filter['name']) ? $filter['name'] : '') }}" />
                            <button type="submit" class="ic-search fa fa-search search"></button>
                        </div>
                        <div class="d-flex">
                            <div class="form-group">
                                <div class="select white r-5">
                                    <select id="" class="cmd-select form-control" name="period" style="width: 100px;">
                                        <option>Periode</option>
                                        @foreach ($periods as $period)
                                            <option value="{{ $period }}"{{ isset($filter['period']) && $filter['period'] == $period ? 'selected':''}}>{{ $period }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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
                                    <select id="" class="cmd-select form-control" name="org_unit_id">
                                        <option value="">Cost Center</option>
                                        @foreach ($costcenters as $ccKey => $ccValue)
                                            <option value="{{ $ccKey }}" {{ isset($filter['cost_center_id']) && $filter['cost_center_id'] == $ccKey?'selected':'' }}>{{ $ccValue }}</option>
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
            <div class="animated fadeInUpShort show active col-md-12 f-none">
                <div class="row">
                    <div class="col-md-6">
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
                    <div class="col-md-5">
                        <h3 class="mb-15 thumb-Title">Grade</h3>
                        <div class="col-xs-12 pt-b-20">
                            <div class="row dis-flex">
                                <div class="dash-doughnut">
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
                </div>
                <!-- AREA TABLE -->
                <!-- // TODO: List real employees with actual grade -->
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-white">
                                <thead>
                                    <tr class="no-b">
                                        <th style="width: 100px"></th>
                                        <th></th>
                                        <th>Cost Center</th>
                                        <th>Unit</th>
                                        <th>Score</th>
                                        <th>Grade/HAV</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @if(count($people) <= 0)
                                    <tr>
                                        <td colspan="6" style="text-align: center">
                                            Data No Found
                                        </td>
                                        
                                    </tr>
                                @endif
                                @foreach ($people as $pep)
	                                <tr onclick="window.location.href = '{{ url("od/evaluation/" . $pep->getId() ) }}'">
	                                    <td>
	                                        <div class="avatar avatar-md mr-3 mt-1 w-50px center t-center">
	                                            <img src="{!! $pep->photo() !!}" alt="User Image" class="r-fl">
	                                        </div>
	                                    </td>
	                                    <td>
	                                        <div class="s-16 text-main">
	                                            <strong>{{ $pep->getName() }}</strong>
	                                        </div>
	                                        <div class="s-14">{{ $pep->getTitle() }}</div>
	                                        <div class="text-whitesmoke s-14"><i>Employee</i></div>
	                                    </td>
	                                    <td>{{ $pep->costcenter->getName() }}</td>
	                                    <td>{{ $pep->division->getName() }}</td>
	                                    <td>{{ $pep->getFinalScore() }}</td>
	                                    <td>
	                                    	<!-- // TODO: Get the grade -->
	                                        <span class="grade-color-A d-block height-6 w-50px r-30 mb-5"></span>
	                                        A / Star
	                                    </td>
	                                </tr>
	                            @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END AREA TABLE -->
                <nav class="my-3">
                	{{ $people->appends(request()->input())->links() }}
                </nav>
            </div>
        </div>

    </div>

    <script src="../skin/js/app.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('.cmd-select').on('change', function() {
            $('#form-filter').submit();
        })
    })
</script>
@endsection    
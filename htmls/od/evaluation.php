<?php
    $author = 'Tunas';
    $titleBrowser = 'Evaluation | Tunas';
    $titlePage = 'Evaluation';
    $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime dignissimos illum libero at, porro expedita deserunt recusandae in, labore odit!" ;
    $img = "../skin/img/logo.svg"; // img to 
    $pg = basename(substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'.')));
?>
<?php include('../resources/partials/header.php');?>
    <div class="page has-sidebar-left height-full">

        <div class="container-fluid animatedParent">
            <!-- FILTER -->
            <div class="col-md-11 columns f-none mt-30 mb-30">
                <form action="" class="row">

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
                    <div class="col-md-12 f-none pt-b-10">
                        <div class="d-flex">
                            <div class="form-group">
                                <div class="select white r-5">
                                    <select id="" class="form-control">
                                        <option>Periode</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="select white r-5">
                                    <select id="" class="form-control">
                                        <option>Business Unit</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="select white r-5">
                                    <select id="" class="form-control">
                                        <option>Level</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="select white r-5">
                                    <select id="" class="form-control">
                                        <option>Progress</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <!-- END FILTER -->
            <div class="animated fadeInUpShort show active col-md-12 f-none">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="mb-15 thumb-Title">Human Asset Value</h3>
                        <div class="columns col-xs-12">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-asset">
                                        <tr>
                                            <td>A</td>
                                            <td class="tooltip">
                                                <span class="grade-C">6.25%</span>
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
                                                    <span class="d-block cl-perform s-24 font-bold">6.25%</span>
                                                    <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                </div>
                                            </td>
                                            <td class="tooltip">
                                                <span class="grade-C">26.25%</span>
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
                                                    <span class="d-block cl-perform s-24 font-bold">26.25%</span>
                                                    <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                </div>
                                            </td>
                                            <td class="tooltip">
                                                <span class="grade-B">50%</span>
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
                                                    <span class="d-block cl-perform s-24 font-bold">50%</span>
                                                    <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                </div>
                                            </td>
                                            <td class="tooltip">
                                                <span class="grade-A">75%</span>
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
                                                    <span class="d-block cl-perform s-24 font-bold">75%</span>
                                                    <span class="d-block s-14"><i class="fas fa-user" style=""></i> 10</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>B</td>
                                            <td class="tooltip">
                                                <span class="grade-C">44%</span>
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
                                                    <span class="d-block cl-perform s-24 font-bold">44%</span>
                                                    <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                </div>
                                            </td>
                                            <td class="tooltip">
                                                <span class="grade-A">80%</span>
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
                                                    <span class="d-block cl-perform s-24 font-bold">80%</span>
                                                    <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                </div>
                                            </td>
                                            <td class="tooltip">
                                                <span class="grade-C">55%</span>
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
                                                    <span class="d-block cl-perform s-24 font-bold">55%</span>
                                                    <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                </div>
                                            </td>
                                            <td class="tooltip">
                                                <span class="grade-C">35%</span>
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
                                                    <span class="d-block cl-perform s-24 font-bold">35%</span>
                                                    <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>C</td>
                                            <td class="tooltip">
                                                <span class="grade-C">6.25%</span>
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
                                                    <span class="d-block cl-perform s-24 font-bold">80%</span>
                                                    <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                </div>
                                            </td>
                                            <td class="tooltip">
                                                <span class="grade-C">6.25%</span>
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
                                                    <span class="d-block cl-perform s-24 font-bold">80%</span>
                                                    <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                </div>
                                            </td>
                                            <td class="tooltip">
                                                <span class="grade-C">6.25%</span>
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
                                                    <span class="d-block cl-perform s-24 font-bold">80%</span>
                                                    <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                </div>
                                            </td>
                                            <td class="tooltip">
                                                <span class="grade-C">6.25%</span>
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
                                                    <span class="d-block cl-perform s-24 font-bold">80%</span>
                                                    <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>D</td>
                                            <td class="tooltip">
                                                <span class="grade-A">77%</span>
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
                                                    <span class="d-block cl-perform s-24 font-bold">77%</span>
                                                    <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                </div>
                                            </td>
                                            <td class="tooltip">
                                                <span class="grade-B">60.25%</span>
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
                                                    <span class="d-block cl-perform s-24 font-bold">60.25%</span>
                                                    <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                </div>
                                            </td>
                                            <td class="tooltip">
                                                <span class="grade-C">46.30%</span>
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
                                                    <span class="d-block cl-perform s-24 font-bold">46.30%</span>
                                                    <span class="d-block s-14"><i class="fas fa-user" style=""></i> 35</span>
                                                </div>
                                            </td>
                                            <td class="tooltip">
                                                <span class="grade-B">60.25%</span>
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
                                                    <span class="d-block cl-perform s-24 font-bold">60.25%</span>
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
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-white">
                                <thead>
                                    <tr class="no-b">
                                        <th style="width: 100px"></th>
                                        <th></th>
                                        <th>Department</th>
                                        <th>Unit</th>
                                        <th>Score</th>
                                        <th>Grade/HAV</th>
                                    </tr>
                                </thead>

                                <tbody>

                                <tr onclick="window.location.href = 'single-evaluation.php';">
                                    <td>
                                        <div class="avatar avatar-md mr-3 mt-1 w-50px center t-center">
                                            <img src="../skin/img/dummy/avatar-1.jpg" alt="User Image" class="r-fl">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="s-16 text-main">
                                            <strong>Abdul Pierce</strong>
                                        </div>
                                        <div class="s-14">IT Consultant</div>
                                        <div class="text-whitesmoke s-14"><i>Staff</i></div>
                                    </td>
                                    <td>Human Capital</td>
                                    <td>Toyota</td>
                                    <td>42.7</td>
                                    <td>
                                        <span class="grade-color-A d-block height-6 w-50px r-30 mb-5"></span>
                                        A / Star
                                    </td>
                                </tr>
                                <tr onclick="window.location.href = 'single-evaluation.php';">
                                    <td>
                                        <div class="avatar avatar-md mr-3 mt-1 w-50px center t-center">
                                            <img src="../skin/img/dummy/avatar-1.jpg" alt="User Image" class="r-fl">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="s-16 text-main">
                                            <strong>Abdul Pierce</strong>
                                        </div>
                                        <div class="s-14">IT Consultant</div>
                                        <div class="text-whitesmoke s-14"><i>Staff</i></div>
                                    </td>
                                    <td>Human Capital</td>
                                    <td>Toyota</td>
                                    <td>42.7</td>
                                    <td>
                                        <span class="grade-color-B d-block height-6 w-50px r-30 mb-5"></span>
                                        B / Potential Candidate
                                    </td>
                                </tr>
                                <tr onclick="window.location.href = 'single-evaluation.php';">
                                    <td>
                                        <div class="avatar avatar-md mr-3 mt-1 w-50px center t-center">
                                            <img src="../skin/img/dummy/avatar-1.jpg" alt="User Image" class="r-fl">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="s-16 text-main">
                                            <strong>Abdul Pierce</strong>
                                        </div>
                                        <div class="s-14">IT Consultant</div>
                                        <div class="text-whitesmoke s-14"><i>Staff</i></div>
                                    </td>
                                    <td>Human Capital</td>
                                    <td>Toyota</td>
                                    <td>42.7</td>
                                    <td>
                                        <span class="grade-color-C d-block height-6 w-50px r-30 mb-5"></span>
                                        C / Minimal Contributor
                                    </td>
                                </tr>
                                <tr onclick="window.location.href = 'single-evaluation.php';">
                                    <td>
                                        <div class="avatar avatar-md mr-3 mt-1 w-50px center t-center">
                                            <img src="../skin/img/dummy/avatar-1.jpg" alt="User Image" class="r-fl">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="s-16 text-main">
                                            <strong>Abdul Pierce</strong>
                                        </div>
                                        <div class="s-14">IT Consultant</div>
                                        <div class="text-whitesmoke s-14"><i>Staff</i></div>
                                    </td>
                                    <td>Human Capital</td>
                                    <td>Toyota</td>
                                    <td>42.7</td>
                                    <td>
                                        <span class="grade-color-A d-block height-6 w-50px r-30 mb-5"></span>
                                        A / Feature Star
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END AREA TABLE -->
                <nav class="my-3">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-prev" href="#"> < Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link current" href="#">1</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item"><a class="page-next" href="#">Next > </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </div>

    <script src="../skin/js/app.js"></script>

<?php include('../resources/partials/foot.php');?>
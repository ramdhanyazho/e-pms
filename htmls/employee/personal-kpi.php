<?php
    $author = 'Tunas';
    $titleBrowser = 'KPI Index | Tunas';
    $titlePage = 'KPI Index';
    $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime dignissimos illum libero at, porro expedita deserunt recusandae in, labore odit!" ;
    $img = "../skin/img/logo.svg"; // img to 
    $pg = basename(substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'.')));
?>
<?php include('../resources/partials/header-employee.php');?>

    <div class="page has-sidebar-left height-full">
        <!-- MAIN -->
        <div class="container-fluid animatedParent">
            <div class="row d-flex subnav-kpi pull-up-20 pl-20 pr-20 pt-20">
                <ul class="nav nav-material nav-material-white s-16">
                    <li class="mr-5">
                        <a href="personal-kpi.php" class="nav-link pb-15 <?php if($pg=='personal-kpi'){?>active<?php }?>">Personal KPI</a>
                    </li>
                    <li class="mr-5">
                        <a href="subordinate-kpi.php" class="nav-link pb-15 <?php if($pg=='subordinate-kpi'){?>active<?php }?>">Subordinate KPI</a>
                    </li>
                    <li class="mr-5">
                        <a href="review-kpi.php" class="nav-link pb-15 <?php if($pg=='review-kpi'){?>active<?php }?>">Review KPI</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12 columns f-none mt-30 mb-30">
                <a class="btn btn-primary font-semibold s-16 pz-20 r-10 w-150px mr-3" data-toggle="modal" data-target="#inputscore">
                    <i class="fas fa-plus s-14"></i> Input Score
                </a>
                <a class="btn btn-primary font-semibold s-16 pz-20 r-10 w-150px" data-toggle="modal" data-target="#track-kpi">
                    Track KPI
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
                                        <th>Achievement</th>
                                        <th class="text-main">Score</th>
                                    </tr>
                                </thead>

                                <tbody>

                                <tr data-toggle="tab" href="#people-1" role="tab" aria-selected="true">
                                    <td>Financial</td>
                                    <td>LLorem ipsum dolor.</td>
                                    <td>Human Capital</td>
                                    <td>Permanent</td>
                                    <td>Lorem Ipsum</td>
                                    <td>
                                        <span class="text-green font-semibold">Complate</span>
                                    </td>
                                </tr>

                                <tr data-toggle="tab" href="#people-2" role="tab" aria-selected="true">
                                    <td>Financial</td>
                                    <td>LLorem ipsum dolor.</td>
                                    <td>Human Capital</td>
                                    <td>Permanent</td>
                                    <td>Lorem Ipsum</td>
                                    <td>
                                        <span class="text-green font-semibold">Complate</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Financial</td>
                                    <td>BSeluruh Driver Sudah ditraining (30 orang) Lorem ipsum dolor sit amet, consectetur.</td>
                                    <td>Human Capital</td>
                                    <td>Permanent</td>
                                    <td>Lorem Ipsum</td>
                                    <td>
                                        <span class="text-green font-semibold">Complate</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Financial</td>
                                    <td>BLorem ipsum dolor.</td>
                                    <td>Human Capital</td>
                                    <td>Permanent</td>
                                    <td>Lorem Ipsum</td>
                                    <td>
                                        <span>On Porgress</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Financial</td>
                                    <td>DLorem ipsum dolor.</td>
                                    <td>Human Capital</td>
                                    <td>Permanent</td>
                                    <td>Lorem Ipsum</td>
                                    <td>
                                        <span>On Porgress</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Financial</td>
                                    <td>DLorem ipsum dolor.</td>
                                    <td>Human Capital</td>
                                    <td>Permanent</td>
                                    <td>Lorem Ipsum</td>
                                    <td>
                                        <span>On Porgress</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Financial</td>
                                    <td>SLorem ipsum dolor.</td>
                                    <td>Human Capital</td>
                                    <td>Permanent</td>
                                    <td>Lorem Ipsum</td>
                                    <td>
                                        <span class="text-green font-semibold">Complate</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Financial</td>
                                    <td>SLorem ipsum dolor.</td>
                                    <td>Human Capital</td>
                                    <td>Permanent</td>
                                    <td>Lorem Ipsum</td>
                                    <td>
                                        <span class="text-green font-semibold">Complate</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Financial</td>
                                    <td>KLorem ipsum dolor.</td>
                                    <td>Human Capital</td>
                                    <td>Permanent</td>
                                    <td>Lorem Ipsum</td>
                                    <td>
                                        <span class="text-green font-semibold">Complate</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Financial</td>
                                    <td>KLorem ipsum dolor.</td>
                                    <td>Human Capital</td>
                                    <td>Permanent</td>
                                    <td>Lorem Ipsum</td>
                                    <td>
                                        <span class="text-green font-semibold">On Progress</span>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
        <!-- END MAIN -->
    </div>
    <!-- 
        POPUP INPUT SCORE 
    -->
    <div class="modal fade s-16" id="inputscore">
        <div class="modal-dialog modal-md dis-flex align-center height-100p">
            <form method="" class="col-xs-12">
            <div class="modal-content b-0 r-10">
                <div class="modal-header mb-10">
                    <h6 class="modal-title">Create A New Announcement</h6>
                    <a href="#" data-dismiss="modal" aria-label="Close"
                       class="paper-nav-toggle paper-nav-white active"><i></i></a>
                </div>
                <div class="modal-body no-p no-b">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <select class="custom-select select2">
                                <option value="">Month</option>
                                <option value="januari">Januari</option>
                                <option value="februari">Februari</option>
                                <option value="maret">Maret</option>
                                <option value="april">April</option>
                                <option value="mei">Mei</option>
                                <option value="juni">Juni</option>
                                <option value="juli">Juli</option>
                                <option value="agustus">Agustus</option>
                                <option value="sepetember">Sepetember</option>
                                <option value="oktober">Oktober</option>
                                <option value="november">November</option>
                                <option value="desember">Desember</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <select class="custom-select select2">
                                <option value="">Year</option>
                                <option value="1999">1999</option>
                                <option value="2000">2000</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                                <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <select class="custom-select select2">
                                <option value="">Select KPI</option>
                                <option value="kpi-1">KPI 1</option>
                                <option value="kpi-2">KPI 2</option>
                                <option value="kpi-3">KPI 3</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <select class="custom-select select2">
                                <option value="">Score</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
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
    <!-- 
        POPUP TRACK KPI 
    -->
    <div class="modal fade s-16" id="track-kpi">
        <div class="modal-dialog modal-xl">
            <div class="modal-content b-0 r-10">
                <div class="modal-header mb-10">
                    <h6 class="modal-title">KPI Track</h6>
                    <a href="#" data-dismiss="modal" aria-label="Close"
                       class="paper-nav-toggle paper-nav-white active"><i></i></a>
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

                                <tr>
                                    <td>BSeluruh Driver Sudah ditraining (30 orang) Lorem ipsum dolor sit amet, consectetur.</td>
                                    <td>10</td>
                                    <td>8</td>
                                    <td>21</td>
                                    <td>15</td>
                                    <td>-</td>
                                    <td>9</td>
                                    <td>1</td>
                                    <td>31</td>
                                    <td>29</td>
                                    <td>12</td>
                                    <td>11</td>
                                    <td>71</td>
                                </tr>

                                <tr>
                                    <td>BSeluruh Driver Sudah ditraining (30 orang) Lorem ipsum dolor sit amet, consectetur.</td>
                                    <td>20</td>
                                    <td>11</td>
                                    <td>1</td>
                                    <td>8</td>
                                    <td>9</td>
                                    <td>15</td>
                                    <td>31</td>
                                    <td>12</td>
                                    <td>71</td>
                                    <td>29</td>
                                    <td>-</td>
                                    <td>21</td>
                                </tr>

                                <tr>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil, voluptas!</td>
                                    <td>30</td>
                                    <td>71</td>
                                    <td>9</td>
                                    <td>8</td>
                                    <td>21</td>
                                    <td>31</td>
                                    <td>12</td>
                                    <td>15</td>
                                    <td>1</td>
                                    <td>29</td>
                                    <td>-</td>
                                    <td>11</td>
                                </tr>

                                <tr>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, libero.</td>
                                    <td>40</td>
                                    <td>8</td>
                                    <td>12</td>
                                    <td>15</td>
                                    <td>71</td>
                                    <td>21</td>
                                    <td>9</td>
                                    <td>31</td>
                                    <td>29</td>
                                    <td>1</td>
                                    <td>11</td>
                                    <td>-</td>
                                </tr>

                                <tr>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi quos consequatur pariatur vitae.</td>
                                    <td>50</td>
                                    <td>8</td>
                                    <td>21</td>
                                    <td>15</td>
                                    <td>-</td>
                                    <td>12</td>
                                    <td>11</td>
                                    <td>71</td>
                                    <td>9</td>
                                    <td>1</td>
                                    <td>31</td>
                                    <td>29</td>
                                </tr>

                                <tr>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore culpa nostrum magnam.</td>
                                    <td>60</td>
                                    <td>21</td>
                                    <td>15</td>
                                    <td>-</td>
                                    <td>9</td>
                                    <td>1</td>
                                    <td>31</td>
                                    <td>29</td>
                                    <td>71</td>
                                    <td>8</td>
                                    <td>12</td>
                                    <td>11</td>
                                </tr>

                                <tr>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                    <td>70</td>
                                    <td>8</td>
                                    <td>21</td>
                                    <td>15</td>
                                    <td>-</td>
                                    <td>9</td>
                                    <td>1</td>
                                    <td>31</td>
                                    <td>29</td>
                                    <td>12</td>
                                    <td>11</td>
                                    <td>71</td>
                                </tr>

                                <tr>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur.</td>
                                    <td>80</td>
                                    <td>-</td>
                                    <td>29</td>
                                    <td>71</td>
                                    <td>21</td>
                                    <td>15</td>
                                    <td>9</td>
                                    <td>1</td>
                                    <td>31</td>
                                    <td>12</td>
                                    <td>11</td>
                                    <td>8</td>
                                </tr>

                                <tr>
                                    <td>KLorem ipsum dolor.</td>
                                    <td>90</td>
                                    <td>8</td>
                                    <td>21</td>
                                    <td>15</td>
                                    <td>-</td>
                                    <td>71</td>
                                    <td>9</td>
                                    <td>1</td>
                                    <td>31</td>
                                    <td>29</td>
                                    <td>-</td>
                                    <td>11</td>
                                </tr>

                                <tr>
                                    <td>KLorem ipsum dolor.</td>
                                    <td>100</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>15</td>
                                    <td>-</td>
                                    <td>9</td>
                                    <td>11</td>
                                    <td>71</td>
                                    <td>31</td>
                                    <td>12</td>
                                    <td>29</td>
                                    <td>1</td>
                                </tr>

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
        <div class="tab-sidebar control-sidebar fixed white" id="people-1" role="tabpanel">
            <div class="slimScroll">
                <div class="sidebar-header">
                    <a href="#" data-toggle="control-sidebar" class="paper-nav-toggle  active"><i class="fas fa-times"></i></a>
                </div>
                <div class="sidebar-header d-flex separator">
                    <div class="col-xs-12 mb-20 no-p ">
                        <div class="text-main s-14 font-semibold">KPI</div>
                        <h4 class="s-18 font-bold mt-0 mb-0 text-black">Seluruh Driver Sudah ditraining (30 orang)</h4>
                    </div>
                </div>
                <div class="p-30 pt-b-0">
                    <div class="d-flex align-start flex-wrap pt-20">
                        <div class="wd-fl-12 mb-20">
                            <div class="text-main s-14 font-semibold">BSC</div>
                            <div class="text-uppercase s-14">Learning &amp; Growth</div>
                        </div>
                        <div class="wd-fl-12 mb-20">
                            <div class="text-main s-14 font-semibold">Target</div>
                            <div class="s-14">4</div>
                        </div>
                        <div class="wd-fl-12 mb-20">
                            <div class="text-main s-14 font-semibold">Weight</div>
                            <div class="text-uppercase s-14">20%</div>
                        </div>
                    </div>
                </div>
                <div class="p-30 pt-b-0 bg-main-opacity">
                    <div class="d-flex align-start flex-wrap pt-20">
                        <div class="text-main s-14 font-semibold">Achievement Indicator</div>
                        <div class="wd-fl-12 mb-20">
                            <div class="font-bold s-14 text-black">1 (<70%)</div>
                            <div class="s-14">Driver yang ditraining di bawah 8 orang</div>
                        </div>
                        <div class="wd-fl-12 mb-20">
                            <div class="font-bold s-14 text-black">2 (70%-80%)</div>
                            <div class="s-14">Driver yang ditraining di bawah 8 orang</div>
                        </div>
                        <div class="wd-fl-12 mb-20">
                            <div class="font-bold s-14 text-black">3 (80%-90%)</div>
                            <div class="s-14">Driver yang ditraining di bawah 8 orang</div>
                        </div>
                        <div class="wd-fl-12 mb-20">
                            <div class="font-bold s-14 text-black">4 (90%-100%)</div>
                            <div class="s-14">Driver yang ditraining di bawah 8 orang</div>
                        </div>
                        <div class="wd-fl-12 mb-20">
                            <div class="font-bold s-14 text-black">5 (>100%)</div>
                            <div class="s-14">Driver yang ditraining di bawah 8 orang</div>
                        </div>
                    </div>
                </div>
                <div class="p-30 pt-b-0">
                    <div class="d-flex align-start flex-wrap pt-20">
                        <div class="wd-fl-12 mb-20">
                            <div class="text-main s-14 font-semibold">Self Appraisal</div>
                            <div class="text-uppercase s-14">4</div>
                        </div>
                        <div class="wd-fl-12 mb-20">
                            <div class="text-main s-14 font-semibold">Superior Appraisal</div>
                            <div class="s-14">4</div>
                        </div>
                        <div class="wd-fl-12 mb-20">
                            <div class="text-main s-14 font-semibold">Score</div>
                            <div class="text-uppercase s-14">0.25</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-sidebar control-sidebar fixed white" id="people-2" role="tabpanel">
            <div class="slimScroll">
                <div class="sidebar-header">
                    <a href="#" data-toggle="control-sidebar" class="paper-nav-toggle  active"><i class="fas fa-times"></i></a>
                </div>
                <div class="sidebar-header d-flex separator">
                    <div class="col-xs-12 mb-20 no-p ">
                        <div class="text-main s-14 font-semibold">KPI</div>
                        <h4 class="s-18 font-bold mt-0 mb-0 text-black">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h4>
                    </div>
                </div>
                <div class="p-30 pt-b-0">
                    <div class="d-flex align-start flex-wrap pt-20">
                        <div class="wd-fl-12 mb-20">
                            <div class="text-main s-14 font-semibold">BSC</div>
                            <div class="text-uppercase s-14">Learning &amp; Growth</div>
                        </div>
                        <div class="wd-fl-12 mb-20">
                            <div class="text-main s-14 font-semibold">Target</div>
                            <div class="s-14">4</div>
                        </div>
                        <div class="wd-fl-12 mb-20">
                            <div class="text-main s-14 font-semibold">Weight</div>
                            <div class="text-uppercase s-14">20%</div>
                        </div>
                    </div>
                </div>
                <div class="p-30 pt-b-0 bg-main-opacity">
                    <div class="d-flex align-start flex-wrap pt-20">
                        <div class="text-main s-14 font-semibold">Achievement Indicator</div>
                        <div class="wd-fl-12 mb-20">
                            <div class="font-bold s-14 text-black">1 (<70%)</div>
                            <div class="s-14">Driver yang ditraining di bawah 8 orang</div>
                        </div>
                        <div class="wd-fl-12 mb-20">
                            <div class="font-bold s-14 text-black">2 (70%-80%)</div>
                            <div class="s-14">Driver yang ditraining di bawah 8 orang</div>
                        </div>
                        <div class="wd-fl-12 mb-20">
                            <div class="font-bold s-14 text-black">3 (80%-90%)</div>
                            <div class="s-14">Driver yang ditraining di bawah 8 orang</div>
                        </div>
                        <div class="wd-fl-12 mb-20">
                            <div class="font-bold s-14 text-black">4 (90%-100%)</div>
                            <div class="s-14">Driver yang ditraining di bawah 8 orang</div>
                        </div>
                        <div class="wd-fl-12 mb-20">
                            <div class="font-bold s-14 text-black">5 (>100%)</div>
                            <div class="s-14">Driver yang ditraining di bawah 8 orang</div>
                        </div>
                    </div>
                </div>
                <div class="p-30 pt-b-0">
                    <div class="d-flex align-start flex-wrap pt-20">
                        <div class="wd-fl-12 mb-20">
                            <div class="text-main s-14 font-semibold">Self Appraisal</div>
                            <div class="text-uppercase s-14">4</div>
                        </div>
                        <div class="wd-fl-12 mb-20">
                            <div class="text-main s-14 font-semibold">Superior Appraisal</div>
                            <div class="s-14">4</div>
                        </div>
                        <div class="wd-fl-12 mb-20">
                            <div class="text-main s-14 font-semibold">Score</div>
                            <div class="text-uppercase s-14">0.25</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-layer"></div>

<script src="../skin/js/app.js"></script>
<?php include('../resources/partials/foot.php');?>
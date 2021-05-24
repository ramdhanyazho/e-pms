<?php
    $author = 'Tunas';
    $titleBrowser = 'Evaluation | Tunas';
    $titlePage = 'Evaluation Detail';
    $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime dignissimos illum libero at, porro expedita deserunt recusandae in, labore odit!" ;
    $img = "../skin/img/logo.svg"; // img to 
    $pg = basename(substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'.')));
?>
<?php include('../resources/partials/header.php');?>

    <div class="page has-sidebar-left height-full">

        <div class="container-fluid animatedParent">
            <div class="animated fadeInUpShort col-md-12 f-none">

                <div class="row no-gutters">
                    <div class="col-md-3 sticky mt-30">
                        <!-- MAIN SIDE LEFT PROFILE -->
                        <div class="white r-5 p-30 pb-0 mb-30 mb-center">
                            <div class="pb-15">
                                <div class="avatar avatar-md mt-1 w-100px m-mlr-center">
                                    <img src="../skin/img/dummy/avatar-1.jpg" alt="User Image" class="r-fl">
                                </div>
                            </div>
                            <div class="pb-15">
                                <div class="s-16 text-main">
                                    <strong>Abdul Pierce</strong>
                                </div>
                                <div class="s-14">IT Consultant</div>
                                <div class="text-whitesmoke s-14"><i>Staff</i></div>
                                <div class="s-14"><i class="far fa-envelope mr-7 text-main"></i><i>abdul@ tunas.com</i></div>
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
                                        <div class="s-14">Human Capital</div>
                                    </div>
                                    <div class="wd-fl-12 mb-20">
                                        <div class="text-main s-14 font-semibold">Business Unit</div>
                                        <div class="s-14">Unit Name</div>
                                    </div>
                                    <div class="wd-fl-12 mb-20">
                                        <div class="text-main s-14 font-semibold">Period</div>
                                        <div class="s-14">Half year evaluation</div>
                                    </div>
                                    <div class="wd-fl-12 mb-20">
                                        <div class="text-main s-14 font-semibold">Year</div>
                                        <div class="s-14">2020</div>
                                    </div>
                                    <div class="wd-fl-12 mb-20">
                                        <div class="text-main s-14 font-semibold">Reporting Line</div>
                                        <div class="s-14">Name 1</div>
                                        <div class="s-14">Name 2</div>
                                    </div>
                                    <div class="wd-fl-12 mb-20">
                                        <div class="text-main s-14 font-semibold">Subordinate</div>
                                        <div class="s-14">Subordinate 1</div>
                                        <div class="s-14">Subordinate 2</div>
                                        <div class="s-14">Subordinate 3</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-30">
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
                                            <div class="col-md-5 m-pl-r-0 m-mb-15">
                                                <a class="btn btn-primary font-semibold s-16 pz-20 r-10 w-150px" data-toggle="modal" data-target="#track-kpi">
                                                    Track KPI
                                                </a>
                                            </div>
                                            <div class="col-md-7 t-right m-pl-r-0 m-mb-15 mb-left">
                                                <a href="#" class="mr-5 s-14 font-light">
                                                    <i class="fas fa-print mr-7"></i><i>Print</i>
                                                </a>
                                                <a href="#" class="mr-5 s-14 font-light">
                                                    <i class="fas fa-download mr-7"></i><i>Download</i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 f-none pt-b-10 m-pl-r-0">
                                        <div class="d-flex row m-flex-colum">
                                            <div class="col-md-5">
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
                                            </div>
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
                                                <th>KPI</th>
                                                <th>Target</th>
                                                <th>Weight</th>
                                                <th>Self Apprasial</th>
                                                <th>Achievement</th>
                                                <th class="text-main">Result</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Financial</td>
                                                <td>Lorem ipsum dolor.</td>
                                                <td>4</td>
                                                <td>20%</td>
                                                <td>4</td>
                                                <td>4</td>
                                                <td>0.25</td>
                                            </tr>
                                            <tr>
                                                <td>Financial</td>
                                                <td>Lorem ipsum dolor.</td>
                                                <td>4</td>
                                                <td>20%</td>
                                                <td>4</td>
                                                <td>4</td>
                                                <td>0.25</td>
                                            </tr>
                                            <tr>
                                                <td>Financial</td>
                                                <td>Lorem ipsum dolor.</td>
                                                <td>4</td>
                                                <td>20%</td>
                                                <td>4</td>
                                                <td>4</td>
                                                <td>0.25</td>
                                            </tr>
                                            <tr>
                                                <td>Financial</td>
                                                <td>Lorem ipsum dolor.</td>
                                                <td>4</td>
                                                <td>20%</td>
                                                <td>4</td>
                                                <td>4</td>
                                                <td>0.25</td>
                                            </tr>
                                            <tr>
                                                <td>Financial</td>
                                                <td>Lorem ipsum dolor.</td>
                                                <td>4</td>
                                                <td>20%</td>
                                                <td>4</td>
                                                <td>4</td>
                                                <td>0.25</td>
                                            </tr>
                                            <tr>
                                                <td>Financial</td>
                                                <td>Lorem ipsum dolor.</td>
                                                <td>4</td>
                                                <td>20%</td>
                                                <td>4</td>
                                                <td>4</td>
                                                <td>0.25</td>
                                            </tr>
                                            <tr>
                                                <td>Financial</td>
                                                <td>Lorem ipsum dolor.</td>
                                                <td>4</td>
                                                <td>20%</td>
                                                <td>4</td>
                                                <td>4</td>
                                                <td>0.25</td>
                                            </tr>
                                            <tr>
                                                <td>Financial</td>
                                                <td>Lorem ipsum dolor.</td>
                                                <td>4</td>
                                                <td>20%</td>
                                                <td>4</td>
                                                <td>4</td>
                                                <td>0.25</td>
                                            </tr>
                                            <tr>
                                                <td>Financial</td>
                                                <td>Lorem ipsum dolor.</td>
                                                <td>4</td>
                                                <td>20%</td>
                                                <td>4</td>
                                                <td>4</td>
                                                <td>0.25</td>
                                            </tr>
                                            <tr>
                                                <td>Financial</td>
                                                <td>Lorem ipsum dolor.</td>
                                                <td>4</td>
                                                <td>20%</td>
                                                <td>4</td>
                                                <td>4</td>
                                                <td>0.25</td>
                                            </tr>
                                            <tr class="count-table font-bold s-16">
                                                <td>Total</td>
                                                <td>12 KPI</td>
                                                <td></td>
                                                <td>100%</td>
                                                <td></td>
                                                <td></td>
                                                <td>4.38</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <div class="col-sm-12 f-none table-responsive">
                                <h3 class="s-24 mb-10 text-black font-bold">Talent Maping - HAV</h3>
                                <a class="mt-3 mb-20 btn btn-primary font-semibold s-16 pz-20 r-10" data-toggle="modal" data-target="#inputachievement">
                                    <i class="fas fa-plus"></i> Add Achievement
                                </a>
                                <h4 class="bullet text-main s-16 mb-10 font-bold">Potential Assesment</h4>
                                <table class="table table-striped table-white">
                                    <thead>
                                        <tr class="no-b">
                                            <th style="width:40%">Potential Indicator</th>
                                            <th style="width:15%">Weight</th>
                                            <th style="width:45%">Score</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>ATDM</td>
                                            <td>20%</td>
                                            <td>5</td>
                                        </tr>
                                        <tr>
                                            <td>PO</td>
                                            <td>15%</td>
                                            <td>5</td>
                                        </tr>
                                        <tr>
                                            <td>SE</td>
                                            <td>15%</td>
                                            <td>5</td>
                                        </tr>
                                        <tr>
                                            <td>TL</td>
                                            <td>20%</td>
                                            <td>5</td>
                                        </tr>
                                        <tr>
                                            <td>CSO</td>
                                            <td>10%</td>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td>RB</td>
                                            <td>10%</td>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td>BA</td>
                                            <td>10%</td>
                                            <td>4</td>
                                        </tr>
                                        <tr class="count-table font-bold s-16">
                                            <td>Total</td>
                                            <td>100%</td>
                                            <td>80%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-12 f-none table-responsive">
                                <h4 class="bullet text-main s-16 mb-10 font-bold">Performance Assessment</h4>
                                <table class="table table-striped table-white">
                                    <thead>
                                        <tr class="no-b">
                                            <th style="width:40%">Year</th>
                                            <th style="width:15%">Grade</th>
                                            <th style="width:45%">Conversion</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>2017</td>
                                            <td>B</td>
                                            <td>5</td>
                                        </tr>
                                        <tr>
                                            <td>2018</td>
                                            <td>B</td>
                                            <td>5</td>
                                        </tr>
                                        <tr>
                                            <td>2019</td>
                                            <td>15%</td>
                                            <td>A</td>
                                        </tr>
                                        <tr class="count-table font-bold s-16">
                                            <td>Total</td>
                                            <td></td>
                                            <td>4</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-12 f-none table-responsive">
                                <h4 class="bullet text-main s-16 mb-10 font-bold">Human Asset Value</h4>
                                <table class="table table-striped table-white">
                                    <tbody>
                                        <tr>
                                            <td style="width:40%">Potential Assesment</td>
                                            <td style="width:15%">80%</td>
                                            <td style="width:45%">Column 4</td>
                                        </tr>
                                        <tr>
                                            <td>Performance Assessment</td>
                                            <td>B</td>
                                            <td>Row 3</td>
                                        </tr>
                                        <tr class="count-table font-bold s-16">
                                            <td>Mapping</td>
                                            <td></td>
                                            <td>Potential Candidate</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- END AREA TABLE -->
                        </div>
                    </div>
                </div>
                
            </div>
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
        POPUP ADD ACHIEVEMENT
    -->
    <div class="modal fade s-16" id="inputachievement">
        <div class="modal-dialog modal-md dis-flex align-center height-100p">
            <form method="" class="col-xs-12">
            <div class="modal-content b-0 r-10">
                <div class="modal-header mb-10">
                    <h6 class="modal-title">Create A New Achievement</h6>
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
        POPUP Change Grade
    -->
    <div class="modal fade s-16" id="changegrade">
        <div class="modal-dialog modal-md dis-flex align-center height-100p">
            <form method="" class="col-xs-12">
            <div class="modal-content b-0 r-10">
                <div class="modal-header mb-10">
                    <h6 class="modal-title">Change Grade</h6>
                    <a href="#" data-dismiss="modal" aria-label="Close"
                       class="paper-nav-toggle paper-nav-white active"><i></i></a>
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

    <script src="../skin/js/app.js"></script>

<?php include('../resources/partials/foot.php');?>
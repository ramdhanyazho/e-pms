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
        <div class="container-fluid">
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
            <ul class="no-list slide-acc slide-subordinate mt-30">

                <li>
                    <!-- AREA CLICK -->
                    <div class="titleHeadline" data-acc="click">
                        <div class="d-flex m-flex-wrap">

                            <div class="wd-fl-6 m-wd-fl-12 d-flex align-center">
                                <div class="wd-fl-end">
                                    <div class="w-60px mr-5 mt-1 t-center">
                                        <img src="../skin/img/dummy/avatar-1.jpg" alt="User Image" class="r-fl">
                                    </div>
                                </div>
                                <div class="wd-fl-dynamic">
                                    <div class="s-16 text-main">
                                        <strong>Abdul Pierce</strong>
                                    </div>
                                    <div class="s-14">IT Consultant</div>
                                    <div class="text-whitesmoke s-14"><i>Staff</i></div>
                                </div>
                            </div>
                            <div class="wd-fl-6 m-wd-fl-12 d-flex align-center">
                                <div class="wd-fl-end p-15">
                                    <div class="s-14 text-main">
                                        <strong>Permanent</strong>
                                    </div>
                                    <div class="text-whitesmoke s-14"><i>Aug 17.2019</i></div>
                                </div>
                                <div class="wd-fl-end p-15">
                                    <div class="s-16">8</div>
                                </div>
                                <div class="wd-fl-dynamic p-15">
                                    <div class="s-14">5 On Progress</div>
                                    <div class="s-14">2 Unporcessed</div>
                                    <div class="s-14">12 Complate</div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- AREA DESCRIPTION -->
                    <div class="detailHeadline white" data-detail="description">
                        <!-- START FORM -->
                        <form action="#">
                            <div class="col-md-12 columns f-none mb-30">
                                <a class="btn btn-primary font-semibold s-16 pz-20 r-10 w-150px" data-toggle="modal" data-target="#add-subordinate-kpi-1">
                                    Add KPI
                                </a>
                                <a class="btn btn-primary font-semibold s-16 pz-20 r-10 w-150px mr-3" data-toggle="modal" data-target="#inputscore-1">
                                    <i class="fas fa-plus s-14"></i> Input Score
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table same-hei table-hover">
                                    <thead>
                                        <tr class="no-b">
                                            <th>BSC</th>
                                            <th style="width: 320px;">KPI</th>
                                            <th>Due Date</th>
                                            <th>Target</th>
                                            <th>Weight</th>
                                            <th>Self Apprasial</th>
                                            <th>Achievement</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <tr>
                                        <td>Financial</td>
                                        <td>Lorem ipsum dolor.</td>
                                        <td>08/08/2019</td>
                                        <td>4</td>
                                        <td>20%</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td class="text-main">Complate</td>
                                    </tr>

                                    <tr>
                                        <td>Financial</td>
                                        <td>Lorem ipsum dolor.</td>
                                        <td>09/08/2019</td>
                                        <td>4</td>
                                        <td>20%</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td class="text-whitesmoke">On Progress</td>
                                    </tr>

                                    <tr>
                                        <td>Financial</td>
                                        <td>Lorem ipsum dolor.</td>
                                        <td>10/08/2019</td>
                                        <td>4</td>
                                        <td>20%</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td class="text-main">Complate</td>
                                    </tr>

                                    <tr>
                                        <td>Financial</td>
                                        <td>Lorem ipsum dolor.</td>
                                        <td>11/08/2019</td>
                                        <td>4</td>
                                        <td>20%</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td class="text-whitesmoke">On Progress</td>
                                    </tr>

                                    <tr>
                                        <td>Financial</td>
                                        <td>Lorem ipsum dolor.</td>
                                        <td>12/08/2019</td>
                                        <td>4</td>
                                        <td>20%</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td class="text-main">Complate</td>
                                    </tr>

                                    <tr>
                                        <td>Financial</td>
                                        <td>Lorem ipsum dolor.</td>
                                        <td>13/08/2019</td>
                                        <td>4</td>
                                        <td>20%</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td class="text-whitesmoke">On Progress</td>
                                    </tr>

                                    <tr>
                                        <td>Financial</td>
                                        <td>Lorem ipsum dolor.</td>
                                        <td>14/08/2019</td>
                                        <td>4</td>
                                        <td>20%</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td class="text-main">Complate</td>
                                    </tr>

                                    <tr>
                                        <td>Financial</td>
                                        <td>Lorem ipsum dolor.</td>
                                        <td>15/08/2019</td>
                                        <td>4</td>
                                        <td>20%</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td class="text-whitesmoke">On Progress</td>
                                    </tr>

                                    <tr>
                                        <td>Financial</td>
                                        <td>Lorem ipsum dolor.</td>
                                        <td>16/08/2019</td>
                                        <td>4</td>
                                        <td>20%</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td class="text-main">Complate</td>
                                    </tr>

                                    <tr>
                                        <td>Financial</td>
                                        <td>Lorem ipsum dolor.</td>
                                        <td>17/08/2019</td>
                                        <td>4</td>
                                        <td>20%</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td class="text-whitesmoke">On Progress</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- POPUP ADD KPI -->
                            <div class="modal fade s-16" id="add-subordinate-kpi-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content b-0 r-10">
                                        <a href="#" data-dismiss="modal" aria-label="Close" class="inbox-back">Back</a>
                                        
                                        <div class="modal-header mb-10">
                                            <h6 class="modal-title">Add Subordinate KPI</h6>
                                            <a href="#" data-dismiss="modal" aria-label="Close"
                                               class="paper-nav-toggle paper-nav-white active"><i></i></a>
                                        </div>
                                        <div class="modal-body no-p no-b">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <select class="custom-select select2">
                                                        <option value="">Select Subordinate</option>
                                                        <option value="subordinate-1">Subordinate 1</option>
                                                        <option value="subordinate-2">Subordinate 2</option>
                                                        <option value="subordinate-3">Subordinate 3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <select class="custom-select select2">
                                                        <option value="">Select KPI</option>
                                                        <option value="kpi-1">KPI 1</option>
                                                        <option value="kpi-2">KPI 2</option>
                                                        <option value="kpi-3">KPI 3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <select class="custom-select select2">
                                                        <option value="">BSC</option>
                                                        <option value="bsc-1">BSC 1</option>
                                                        <option value="bsc-2">BSC 2</option>
                                                        <option value="bsc-3">BSC 3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <select class="custom-select select2">
                                                        <option value="">Weight</option>
                                                        <option value="weight-1">1</option>
                                                        <option value="weight-2">2</option>
                                                        <option value="weight-3">3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="text-main s-14 font-semibold mb-10">Indicator 1</div>
                                                    <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="text-main s-14 font-semibold mb-10">Indicator 2</div>
                                                    <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="text-main s-14 font-semibold mb-10">Indicator 3</div>
                                                    <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="text-main s-14 font-semibold mb-10">Indicator 4</div>
                                                    <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="text-main s-14 font-semibold mb-10">Indicator 5</div>
                                                    <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="text-main s-14 font-semibold mb-10">Indicator 6</div>
                                                    <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <select class="custom-select select2">
                                                        <option value="">Target</option>
                                                        <option value="target-1">Target 1</option>
                                                        <option value="target-2">Target 2</option>
                                                        <option value="target-3">Target 3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <select class="custom-select select2">
                                                        <option value="">Periode</option>
                                                        <option value="periode-1">Periode 1</option>
                                                        <option value="periode-2">Periode 2</option>
                                                        <option value="periode-3">Periode 3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6 mt-15">
                                                    <div class="input-group white">
                                                        <input type="text" class="s-14 date-time-picker form-control bg-transparent no-b"
                                                               data-options='{"timepicker":false, "format":"d/m/Y"}' placeholder="dd/mm/yy" />
                                                        <span class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="far fa-calendar-alt"></i>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer mt-30">
                                            <button class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10 w-100px">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- POPUP INPUT SCORE -->
                            <div class="modal fade s-16" id="inputscore-1">
                                <div class="modal-dialog modal-md dis-flex align-center height-100p">
                                    <!-- <form method="" class="col-xs-12"> -->
                                        <div class="modal-content b-0 r-10">
                                            <div class="modal-header mb-10">
                                                <h6 class="modal-title">Subordinate Apprasial - Input Score</h6>
                                                <a href="#" data-dismiss="modal" aria-label="Close"
                                                   class="paper-nav-toggle paper-nav-white active"><i></i></a>
                                            </div>
                                            <div class="modal-body no-p no-b">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <select class="custom-select select2">
                                                            <option value="">Select Subordinate</option>
                                                            <option value="kpi-1">Subordinate 1</option>
                                                            <option value="kpi-2">Subordinate 2</option>
                                                            <option value="kpi-3">Subordinate 3</option>
                                                        </select>
                                                    </div>
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
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    <!-- </form> -->
                                </div>
                            </div>
                        </form>
                        <!-- END FORM -->
                    </div>
                </li>
                <li>
                    <!-- AREA CLICK -->
                    <div class="titleHeadline" data-acc="click">
                        <div class="d-flex">

                            <div class="wd-fl-6 d-flex align-center">
                                <div class="wd-fl-end">
                                    <div class="w-60px mr-5 mt-1 t-center">
                                        <img src="../skin/img/dummy/avatar-1.jpg" alt="User Image" class="r-fl">
                                    </div>
                                </div>
                                <div class="wd-fl-dynamic">
                                    <div class="s-16 text-main">
                                        <strong>Abdul Pierce</strong>
                                    </div>
                                    <div class="s-14">IT Consultant</div>
                                    <div class="text-whitesmoke s-14"><i>Staff</i></div>
                                </div>
                            </div>
                            <div class="wd-fl-6 d-flex align-center">
                                <div class="wd-fl-end p-15">
                                    <div class="s-14 text-main">
                                        <strong>Permanent</strong>
                                    </div>
                                    <div class="text-whitesmoke s-14"><i>Aug 17.2019</i></div>
                                </div>
                                <div class="wd-fl-end p-15">
                                    <div class="s-16">8</div>
                                </div>
                                <div class="wd-fl-dynamic p-15">
                                    <div class="s-14">5 On Progress</div>
                                    <div class="s-14">2 Unporcessed</div>
                                    <div class="s-14">12 Complate</div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- AREA DESCRIPTION -->
                    <div class="detailHeadline white" data-detail="description">
                        <!-- START FORM -->
                        <form action="#">
                            <div class="col-md-12 columns f-none mb-30">
                                <a class="btn btn-primary font-semibold s-16 pz-20 r-10 w-150px" data-toggle="modal" data-target="#add-subordinate-kpi-2">
                                    Add KPI
                                </a>
                                <a class="btn btn-primary font-semibold s-16 pz-20 r-10 w-150px mr-3" data-toggle="modal" data-target="#inputscore-2">
                                    <i class="fas fa-plus s-14"></i> Input Score
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table same-hei table-hover">
                                    <thead>
                                        <tr class="no-b">
                                            <th>BSC</th>
                                            <th style="width: 320px;">KPI</th>
                                            <th>Due Date</th>
                                            <th>Target</th>
                                            <th>Weight</th>
                                            <th>Self Apprasial</th>
                                            <th>Achievement</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <tr>
                                        <td>Financial</td>
                                        <td>Lorem ipsum dolor.</td>
                                        <td>08/08/2019</td>
                                        <td>4</td>
                                        <td>20%</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td class="text-main">Complate</td>
                                    </tr>

                                    <tr>
                                        <td>Financial</td>
                                        <td>Lorem ipsum dolor.</td>
                                        <td>09/08/2019</td>
                                        <td>4</td>
                                        <td>20%</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td class="text-whitesmoke">On Progress</td>
                                    </tr>

                                    <tr>
                                        <td>Financial</td>
                                        <td>Lorem ipsum dolor.</td>
                                        <td>10/08/2019</td>
                                        <td>4</td>
                                        <td>20%</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td class="text-main">Complate</td>
                                    </tr>

                                    <tr>
                                        <td>Financial</td>
                                        <td>Lorem ipsum dolor.</td>
                                        <td>11/08/2019</td>
                                        <td>4</td>
                                        <td>20%</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td class="text-whitesmoke">On Progress</td>
                                    </tr>

                                    <tr>
                                        <td>Financial</td>
                                        <td>Lorem ipsum dolor.</td>
                                        <td>12/08/2019</td>
                                        <td>4</td>
                                        <td>20%</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td class="text-main">Complate</td>
                                    </tr>

                                    <tr>
                                        <td>Financial</td>
                                        <td>Lorem ipsum dolor.</td>
                                        <td>13/08/2019</td>
                                        <td>4</td>
                                        <td>20%</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td class="text-whitesmoke">On Progress</td>
                                    </tr>

                                    <tr>
                                        <td>Financial</td>
                                        <td>Lorem ipsum dolor.</td>
                                        <td>14/08/2019</td>
                                        <td>4</td>
                                        <td>20%</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td class="text-main">Complate</td>
                                    </tr>

                                    <tr>
                                        <td>Financial</td>
                                        <td>Lorem ipsum dolor.</td>
                                        <td>15/08/2019</td>
                                        <td>4</td>
                                        <td>20%</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td class="text-whitesmoke">On Progress</td>
                                    </tr>

                                    <tr>
                                        <td>Financial</td>
                                        <td>Lorem ipsum dolor.</td>
                                        <td>16/08/2019</td>
                                        <td>4</td>
                                        <td>20%</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td class="text-main">Complate</td>
                                    </tr>

                                    <tr>
                                        <td>Financial</td>
                                        <td>Lorem ipsum dolor.</td>
                                        <td>17/08/2019</td>
                                        <td>4</td>
                                        <td>20%</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td class="text-whitesmoke">On Progress</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- POPUP ADD KPI -->
                            <div class="modal fade s-16" id="add-subordinate-kpi-2">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content b-0 r-10">
                                        <div class="modal-header mb-10">
                                            <h6 class="modal-title">Add Subordinate KPI</h6>
                                            <a href="#" data-dismiss="modal" aria-label="Close"
                                               class="paper-nav-toggle paper-nav-white active"><i></i></a>
                                        </div>
                                        <div class="modal-body no-p no-b">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <select class="custom-select select2">
                                                        <option value="">Select Subordinate 2nd</option>
                                                        <option value="subordinate-1">Subordinate 1</option>
                                                        <option value="subordinate-2">Subordinate 2</option>
                                                        <option value="subordinate-3">Subordinate 3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <select class="custom-select select2">
                                                        <option value="">Select KPI 2nd</option>
                                                        <option value="kpi-1">KPI 1</option>
                                                        <option value="kpi-2">KPI 2</option>
                                                        <option value="kpi-3">KPI 3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <select class="custom-select select2">
                                                        <option value="">BSC 2nd</option>
                                                        <option value="bsc-1">BSC 1</option>
                                                        <option value="bsc-2">BSC 2</option>
                                                        <option value="bsc-3">BSC 3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <select class="custom-select select2">
                                                        <option value="">Weight</option>
                                                        <option value="weight-1">1</option>
                                                        <option value="weight-2">2</option>
                                                        <option value="weight-3">3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="text-main s-14 font-semibold mb-10">Indicator 1</div>
                                                    <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="text-main s-14 font-semibold mb-10">Indicator 2</div>
                                                    <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="text-main s-14 font-semibold mb-10">Indicator 3</div>
                                                    <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="text-main s-14 font-semibold mb-10">Indicator 4</div>
                                                    <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="text-main s-14 font-semibold mb-10">Indicator 5</div>
                                                    <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="text-main s-14 font-semibold mb-10">Indicator 6</div>
                                                    <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <select class="custom-select select2">
                                                        <option value="">Target</option>
                                                        <option value="target-1">Target 1</option>
                                                        <option value="target-2">Target 2</option>
                                                        <option value="target-3">Target 3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <select class="custom-select select2">
                                                        <option value="">Periode</option>
                                                        <option value="periode-1">Periode 1</option>
                                                        <option value="periode-2">Periode 2</option>
                                                        <option value="periode-3">Periode 3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6 mt-15">
                                                    <div class="input-group white">
                                                        <input type="text" class="s-14 date-time-picker form-control bg-transparent no-b"
                                                               data-options='{"timepicker":false, "format":"d/m/Y"}' placeholder="dd/mm/yy" />
                                                        <span class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="far fa-calendar-alt"></i>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer mt-30">
                                            <button class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10 w-100px">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- POPUP INPUT SCORE -->
                            <div class="modal fade s-16" id="inputscore-2">
                                <div class="modal-dialog modal-md dis-flex align-center height-100p">
                                    <!-- <form method="" class="col-xs-12"> -->
                                        <div class="modal-content b-0 r-10">
                                            <div class="modal-header mb-10">
                                                <h6 class="modal-title">Subordinate Apprasial - Input Score</h6>
                                                <a href="#" data-dismiss="modal" aria-label="Close"
                                                   class="paper-nav-toggle paper-nav-white active"><i></i></a>
                                            </div>
                                            <div class="modal-body no-p no-b">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <select class="custom-select select2">
                                                            <option value="">Select Subordinate 2nd</option>
                                                            <option value="kpi-1">Subordinate 1</option>
                                                            <option value="kpi-2">Subordinate 2</option>
                                                            <option value="kpi-3">Subordinate 3</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <select class="custom-select select2">
                                                            <option value="">Month 2nd</option>
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
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    <!-- </form> -->
                                </div>
                            </div>
                        </form>
                        <!-- END FORM -->
                    </div>
                </li>

            </ul>
        </div>
        <!-- END MAIN -->
    </div>

<div class="modal fade" id="inputscore-2">
    <div class="modal-dialog modal-md dis-flex align-center height-100p">
        <form method="" class="col-xs-12">
            <div class="modal-content b-0 r-10">
                <div class="modal-header mb-10">
                    <h6 class="modal-title">Subordinate Apprasial - Input Score</h6>
                    <a href="#" data-dismiss="modal" aria-label="Close"
                       class="paper-nav-toggle paper-nav-white active"><i></i></a>
                </div>
                <div class="modal-body no-p no-b">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <select class="custom-select select2">
                                <option value="">Select Subordinate</option>
                                <option value="kpi-1">Subordinate 1</option>
                                <option value="kpi-2">Subordinate 2</option>
                                <option value="kpi-3">Subordinate 3</option>
                            </select>
                        </div>
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
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- END POPUP INPUT SCORE -->

<div class="modal fade" id="add-subordinate-kpi-2">
    <div class="modal-dialog modal-lg">
        <div class="modal-content b-0 r-10">
            <div class="modal-header mb-10">
                <h6 class="modal-title">Add Subordinate KPI</h6>
                <a href="#" data-dismiss="modal" aria-label="Close"
                   class="paper-nav-toggle paper-nav-white active"><i></i></a>
            </div>
            <div class="modal-body no-p no-b s-16">
                <div class="row">
                    <div class="form-group col-md-6">
                        <select class="custom-select select2">
                            <option value="">Select Subordinate</option>
                            <option value="subordinate-1">Subordinate 1</option>
                            <option value="subordinate-2">Subordinate 2</option>
                            <option value="subordinate-3">Subordinate 3</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <select class="custom-select select2">
                            <option value="">Select KPI</option>
                            <option value="kpi-1">KPI 1</option>
                            <option value="kpi-2">KPI 2</option>
                            <option value="kpi-3">KPI 3</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <select class="custom-select select2">
                            <option value="">BSC</option>
                            <option value="bsc-1">BSC 1</option>
                            <option value="bsc-2">BSC 2</option>
                            <option value="bsc-3">BSC 3</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <select class="custom-select select2">
                            <option value="">Weight</option>
                            <option value="weight-1">1</option>
                            <option value="weight-2">2</option>
                            <option value="weight-3">3</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="text-main s-14 font-semibold mb-10">Indicator 1</div>
                        <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="text-main s-14 font-semibold mb-10">Indicator 2</div>
                        <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="text-main s-14 font-semibold mb-10">Indicator 3</div>
                        <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="text-main s-14 font-semibold mb-10">Indicator 4</div>
                        <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="text-main s-14 font-semibold mb-10">Indicator 5</div>
                        <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="text-main s-14 font-semibold mb-10">Indicator 6</div>
                        <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <select class="custom-select select2">
                            <option value="">Target</option>
                            <option value="target-1">Target 1</option>
                            <option value="target-2">Target 2</option>
                            <option value="target-3">Target 3</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <select class="custom-select select2">
                            <option value="">Periode</option>
                            <option value="periode-1">Periode 1</option>
                            <option value="periode-2">Periode 2</option>
                            <option value="periode-3">Periode 3</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6 mt-15">
                        <div class="input-group white">
                            <input type="text" class="s-14 date-time-picker form-control bg-transparent no-b"
                                   data-options='{"timepicker":false, "format":"d/m/Y"}' placeholder="dd/mm/yy" />
                            <span class="input-group-append">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer mt-30">
                <button class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10 w-100px">
                    Submit
                </button>
            </div>
        </div>
    </div>
</div>
<!-- END POPUP INPUT SCORE -->


<script src="../skin/js/app.js"></script>
<?php include('../resources/partials/foot.php');?>
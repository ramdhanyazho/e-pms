<?php
    $author = 'Tunas';
    $titleBrowser = 'Evaluation | Tunas';
    $titlePage = 'Evaluation';
    $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime dignissimos illum libero at, porro expedita deserunt recusandae in, labore odit!" ;
    $img = "../skin/img/logo.svg"; // img to 
    $pg = basename(substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'.')));
?>
<?php include('../resources/partials/header-employee.php');?>

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
                                <h3 class="s-16 mt-2 mb-0 grade-disable">
                                    [Only Available ever Januari]
                                </h3>
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
                                            <div class="col-md-7 t-right">
                                                <a href="#" class="mr-5 s-14 font-light">
                                                    <i class="fas fa-print mr-7"></i><i>Print</i>
                                                </a>
                                                <a href="#" class="mr-5 s-14 font-light">
                                                    <i class="fas fa-download mr-7"></i><i>Download</i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 f-none pt-b-10">
                                        <div class="d-flex">
                                            <div class="form-group">
                                                <div class="select white r-5">
                                                    <select id="" class="form-control">
                                                        <option>Period</option>
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
                                                <th style="width: 250px;">KPI</th>
                                                <th>Target</th>
                                                <th>Weight</th>
                                                <th>Achievement</th>
                                                <th class="text-main">Score</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Financial</td>
                                                <td>Lorem ipsum dolor.</td>
                                                <td>4</td>
                                                <td>20%</td>
                                                <td>4</td>
                                                <td>0.25</td>
                                            </tr>
                                            <tr>
                                                <td>Financial</td>
                                                <td>Lorem ipsum dolor.</td>
                                                <td>4</td>
                                                <td>20%</td>
                                                <td>4</td>
                                                <td>0.25</td>
                                            </tr>
                                            <tr>
                                                <td>Financial</td>
                                                <td>Lorem ipsum dolor.</td>
                                                <td>4</td>
                                                <td>20%</td>
                                                <td>4</td>
                                                <td>0.25</td>
                                            </tr>
                                            <tr>
                                                <td>Financial</td>
                                                <td>Lorem ipsum dolor.</td>
                                                <td>4</td>
                                                <td>20%</td>
                                                <td>4</td>
                                                <td>0.25</td>
                                            </tr>
                                            <tr>
                                                <td>Financial</td>
                                                <td>Lorem ipsum dolor.</td>
                                                <td>4</td>
                                                <td>20%</td>
                                                <td>4</td>
                                                <td>0.25</td>
                                            </tr>
                                            <tr>
                                                <td>Financial</td>
                                                <td>Lorem ipsum dolor.</td>
                                                <td>4</td>
                                                <td>20%</td>
                                                <td>4</td>
                                                <td>0.25</td>
                                            </tr>
                                            <tr>
                                                <td>Financial</td>
                                                <td>Lorem ipsum dolor.</td>
                                                <td>4</td>
                                                <td>20%</td>
                                                <td>4</td>
                                                <td>0.25</td>
                                            </tr>
                                            <tr>
                                                <td>Financial</td>
                                                <td>Lorem ipsum dolor.</td>
                                                <td>4</td>
                                                <td>20%</td>
                                                <td>4</td>
                                                <td>0.25</td>
                                            </tr>
                                            <tr>
                                                <td>Financial</td>
                                                <td>Lorem ipsum dolor.</td>
                                                <td>4</td>
                                                <td>20%</td>
                                                <td>4</td>
                                                <td>0.25</td>
                                            </tr>
                                            <tr>
                                                <td>Financial</td>
                                                <td>Lorem ipsum dolor.</td>
                                                <td>4</td>
                                                <td>20%</td>
                                                <td>4</td>
                                                <td>0.25</td>
                                            </tr>
                                            <tr class="count-table font-bold s-16">
                                                <td>Total</td>
                                                <td>12 KPI</td>
                                                <td></td>
                                                <td>100%</td>
                                                <td></td>
                                                <td>4.38</td>
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

    <script src="../skin/js/app.js"></script>

<?php include('../resources/partials/foot.php');?>
<?php
    $author = 'Tunas';
    $titleBrowser = 'Tunas';
    $titlePage = 'Dashboard';
    $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime dignissimos illum libero at, porro expedita deserunt recusandae in, labore odit!" ;
    $img = "../skin/img/logo.svg"; // img to 
    $pg = basename(substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'.')));
?>
<?php include('../resources/partials/header-employee.php');?>

    <div class="page has-sidebar-left height-full">
        <div class="container-fluid bannerOD columns pt-20">
            <div class="col-xs-12">
                <div class="columns trans-blue d-flex align-center r-10">
                    <div class="relative">
                        <img src="../skin/img/dashboard-employee.png" alt="" />
                    </div>
                    <div class="relative text-banner">
                        <h3>hello, Jane!</h3>
                        <p>you have <span>78</span> unprocessed task as of today</p>
                        <a href="personal-kpi.php" class="btn btn-primary btn-lg mt-10 light-blue">Go to KPI Index ></a>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid">
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
                        <div class="d-flex search-filter">
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
            <div class="col-md-12 columns f-none mb-30">
                <div class="row d-flex m-flex-wrap">
                    <div class="wd-fl-6 col-md-6 f-none employee-index">
                        <div class="col-xs-12 no-p f-none">
                            <h3 class="mb-15 thumb-Title">KPI Index</h3>
                            <div class="columns white col-xs-12 pt-b-20 r-10 mb-center">
                                <div class="col-md-4 col-sm-4 col-xs-12 m-mt-20">
                                    <span class="easy-pie-chart " data-percent="40"
                                            data-options='{"lineWidth": 15, "size": 150, "scaleColor": false, "barColor": "#91e842", "trackColor":"#F1F2F7"}'>
                                            <span class="percent homePie cl-green">42</span>
                                    </span>
                                    <span class="s-17 mt-10 mb-10 dis-block t-center cl-green">Completed</span>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 m-mt-20">
                                    <span class="easy-pie-chart " data-percent="90"
                                            data-options='{"lineWidth": 15, "size": 150, "scaleColor": false, "barColor": "#1860ab", "trackColor":"#F1F2F7"}'>
                                            <span class="percent homePie cl-blue">53</span>
                                    </span>
                                    <span class="s-17 mt-10 mb-10 dis-block t-center cl-blue">On Progress</span>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 m-mt-20">
                                    <span class="easy-pie-chart " data-percent="80"
                                            data-options='{"lineWidth": 15, "size": 150, "scaleColor": false, "barColor": "#f3933d", "trackColor":"#F1F2F7"}'>
                                            <span class="percent homePie cl-orange">78</span>
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
                    <div class="wd-fl-6 col-md-6 f-none m-wd-fl-12">
                        <h3 class="mb-15 thumb-Title">To do list</h3>
                        <div class="white p-20 r-10 slimScroll" data-height="648">
                            <ul class="list-unstyled list-border-b">
                                <li>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, impedit quod, voluptate consequatur eum sit enim rem blanditiis nam autem.
                                </li>
                                <li>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, iure.
                                </li>
                                <li>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem quia perspiciatis, minima illo sunt ut?
                                </li>
                                <li>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id possimus quo harum?
                                </li>
                                <li>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, impedit quod, voluptate consequatur eum sit enim rem blanditiis nam autem.
                                </li>
                                <li>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, iure.
                                </li>
                                <li>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem quia perspiciatis, minima illo sunt ut?
                                </li>
                                <li>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id possimus quo harum?
                                </li>
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

    <script src="../skin/js/app.js"></script>

<?php include('../resources/partials/foot.php');?>
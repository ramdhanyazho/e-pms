<?php
    $author = 'Tunas';
    $titleBrowser = 'Audit Trial | Tunas';
    $titlePage = 'Audit Trial';
    $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime dignissimos illum libero at, porro expedita deserunt recusandae in, labore odit!" ;
    $img = "../skin/img/logo.svg"; // img to 
    $pg = basename(substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'.')));
?>
<?php include('../resources/partials/header-employee.php');?>

    <div class="page has-sidebar-left height-full">

        <div class="container-fluid animatedParent">
            <div class="animated fadeInUpShort col-md-12 f-none">

                <div class="row no-gutters">
                    <!-- FILTER -->
                    <div class="col-sm-12 columns f-none mt-30">
                        <form action="" class="row">

                            <div class="col-md-5 f-none clearfix mb-10">
                                <div class="d-flex dateTo r-10">
                                    <div class="input-group">
                                        <span class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </span>
                                        <input type="text" class="date-time-picker form-control bg-transparent no-b"
                                               data-options='{"timepicker":false, "format":"d/m/Y"}' placeholder="dd/mm/yy" />
                                    </div>
                                    <span class="endTo mr-5 font-bold">To</span>
                                    <div class="input-group">
                                        <span class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </span>
                                        <input type="text" class="date-time-picker form-control bg-transparent no-b"
                                               data-options='{"timepicker":false, "format":"d/m/Y"}' placeholder="dd/mm/yy" />
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
                                    <div class="form-group">
                                        <div class="select white r-5">
                                            <select id="" class="form-control">
                                                <option>User</option>
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
                                                <option>Action</option>
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
                                                <option>Status</option>
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
                    <div class="col-sm-12 f-none table-responsive">
                        <table class="table table-striped table-white">
                            <thead>
                                <tr class="no-b">
                                    <th style="width: 120px;"></th>
                                    <th style="width: 200px;">Username</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                            <tr>
                                <td>
                                    <div>Oct 06, 2019</div>
                                    <div>11:12 pm</div>
                                </td>
                                <td>
                                    <div class="s-16 text-main">
                                        <strong>OD Username</strong>
                                    </div>
                                </td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, facere.</td>
                            </tr>
                            <tr>
                                <td>
                                    <div>Oct 06, 2019</div>
                                    <div>11:12 pm</div>
                                </td>
                                <td>
                                    <div class="s-16 text-main">
                                        <strong>Staff User</strong>
                                    </div>
                                </td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi inventore, accusantium eum.</td>
                            </tr>
                            <tr>
                                <td>
                                    <div>Oct 06, 2019</div>
                                    <div>11:12 pm</div>
                                </td>
                                <td>
                                    <div class="s-16 text-main">
                                        <strong>OD Username</strong>
                                    </div>
                                </td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae.</td>
                            </tr>
                            <tr>
                                <td>
                                    <div>Oct 06, 2019</div>
                                    <div>11:12 pm</div>
                                </td>
                                <td>
                                    <div class="s-16 text-main">
                                        <strong>Staff User</strong>
                                    </div>
                                </td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga ullam sint sed veritatis ab!</td>
                            </tr>
                            <tr>
                                <td>
                                    <div>Oct 06, 2019</div>
                                    <div>11:12 pm</div>
                                </td>
                                <td>
                                    <div class="s-16 text-main">
                                        <strong>OD Username</strong>
                                    </div>
                                </td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem voluptate nobis sed harum! Odit obcaecati, hic nostrum provident atque adipisci!</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- END AREA TABLE -->
                </div>
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
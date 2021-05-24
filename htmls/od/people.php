<?php
    $author = 'Tunas';
    $titleBrowser = 'People | Tunas';
    $titlePage = 'People';
    $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime dignissimos illum libero at, porro expedita deserunt recusandae in, labore odit!" ;
    $img = "../skin/img/logo.svg"; // img to 
    $pg = basename(substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'.')));
?>
<?php include('../resources/partials/header.php');?>

    <div class="page has-sidebar-left height-full">
        <!-- MAIN -->
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
            <div class="animated fadeInUpShort col-md-12">
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="nav table table-tab table-hover table-white table-hover-link" role="tablist">
                                <thead>
                                    <tr class="no-b">
                                        <th style="width: 100px"></th>
                                        <th></th>
                                        <th>Department</th>
                                        <th>Status</th>
                                        <th>Reporting Line</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                <tr data-toggle="tab" href="#people-1" role="tab" aria-selected="true">

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
                                    <td>Permanent</td>
                                    <td>Lorem Ipsum</td>
                                    <td>
                                        <a class="tb-link"><i class="fas fa-pen"></i> Edit</a>
                                    </td>
                                </tr>

                                <tr data-toggle="tab" href="#people-2" role="tab" aria-selected="true">
                                    <td>
                                        <div class="avatar avatar-md mr-3 mt-1 w-50px center t-center">
                                            <img src="../skin/img/dummy/avatar-1.jpg" alt="User Image" class="r-fl">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="s-16 text-main">
                                            <strong>Pierce</strong>
                                        </div>
                                        <div class="s-14">IT Consultant</div>
                                        <div class="text-whitesmoke s-14"><i>Staff</i></div>
                                    </td>
                                    <td>Human Capital</td>
                                    <td>Permanent</td>
                                    <td>Lorem Ipsum</td>
                                    <td>
                                        <a class="tb-link"><i class="fas fa-pen"></i> Edit</a>
                                    </td>
                                </tr>

                                <tr>
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
                                    <td>Permanent</td>
                                    <td>Lorem Ipsum</td>
                                    <td>
                                        <a class="tb-link"><i class="fas fa-pen"></i> Edit</a>
                                    </td>
                                </tr>

                                <tr>
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
                                    <td>Permanent</td>
                                    <td>Lorem Ipsum</td>
                                    <td>
                                        <a class="tb-link"><i class="fas fa-pen"></i> Edit</a>
                                    </td>
                                </tr>

                                <tr>
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
                                    <td>Permanent</td>
                                    <td>Lorem Ipsum</td>
                                    <td>
                                        <a class="tb-link"><i class="fas fa-pen"></i> Edit</a>
                                    </td>
                                </tr>

                                <tr>
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
                                    <td>Permanent</td>
                                    <td>Lorem Ipsum</td>
                                    <td>
                                        <a class="tb-link"><i class="fas fa-pen"></i> Edit</a>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
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
        <!-- END MAIN -->
    </div>

<!-- 
    POPUP EDIT PEOPLE // SIDEBAR
-->
<div class="col-sm-12 f-none tab-content">
    <div class="tab-sidebar control-sidebar fixed white" id="people-1" role="tabpanel">
        <div class="slimScroll">
            <div class="sidebar-header">
                <a href="#" data-toggle="hide-toggle"><i class="fas fa-times"></i></a>
            </div>
            <div class="sidebar-header d-flex">
                <div class="pr-20">
                    <div class="avatar avatar-md mt-1 w-80px">
                        <img src="../skin/img/dummy/avatar-1.jpg" alt="User Image" class="r-fl">
                    </div>
                </div>
                <div>
                    <div class="s-16 text-main">
                        <strong>Abdul Pierce</strong>
                    </div>
                    <div class="s-14">IT Consultant</div>
                    <div class="text-whitesmoke s-14"><i>Staff</i></div>
                    <div class="s-14"><i>abdul@ tunas.com</i></div>
                </div>
            </div>
            <div class="p-30 pt-b-0">
                <div class="d-flex align-start flex-wrap b-b pt-20">
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">NIK</div>
                        <div class="text-uppercase s-14">a2312casd</div>
                    </div>
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">Status</div>
                        <div class="s-14">Permanent</div>
                    </div>
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">Department</div>
                        <div class="text-uppercase s-14">Human Capital</div>
                    </div>
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">Join Date</div>
                        <div class="s-14">Jan 01, 2019</div>
                    </div>
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">Branch</div>
                        <div class="s-14">Branch Name</div>
                    </div>
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">End of Contract</div>
                        <div class="s-14">Jan O1, 2022</div>
                    </div>
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">Business Unit</div>
                        <div class="text-uppercase s-14">Unit Name</div>
                    </div>
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">Location</div>
                        <div class="text-uppercase s-14">Palmerah</div>
                    </div>
                </div>
            </div>
            <div class="p-30 pt-b-0 mb-35">
                <h3 class="s-16 mb-0 text-black font-bold">Superior</h3>
                <div class="d-flex align-start flex-wrap pt-20">

                    <div class="d-flex align-start flex-wrap wd-fl-12">
                        <div class="wd-fl-8 wd-fl-dynamic mb-35">
                            <div class="select no-pl b-b">
                                <select name="" id="" class="no-p">
                                    <option value="">Jane Doe</option>
                                    <option value="">Jane 1</option>
                                    <option value="">Jane 2</option>
                                    <option value="">Jane 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="wd-fl-end w-50px t-center">
                            <a href="#" class="text-red"><i class="fas fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="d-flex align-start flex-wrap wd-fl-12">
                        <div class="wd-fl-8 wd-fl-dynamic mb-35">
                            <div class="select no-pl b-b">
                                <select name="" id="" class="no-p">
                                    <option value="">Jane Doe</option>
                                    <option value="">Jane 1</option>
                                    <option value="">Jane 2</option>
                                    <option value="">Jane 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="wd-fl-end w-50px t-center">
                            <a href="#" class="text-red"><i class="fas fa-minus"></i></a>
                        </div>
                    </div>

                    <a href="#" class="pb-10"><i class="fas fa-plus mr-3"></i><i>Add Superior</i></a>
                </div>
            </div>
            <div class="p-30 pt-b-0 mb-35">
                <h3 class="s-16 mb-0 text-black font-bold">Subordinate</h3>
                <div class="d-flex align-start flex-wrap pt-20">

                    <div class="d-flex align-start flex-wrap wd-fl-12">
                        <div class="wd-fl-8 wd-fl-dynamic mb-35">
                            <div class="select no-pl b-b">
                                <select name="" id="" class="no-p">
                                    <option value="">Name A</option>
                                    <option value="">Name B</option>
                                    <option value="">Name C</option>
                                    <option value="">Name D</option>
                                </select>
                            </div>
                        </div>
                        <div class="wd-fl-end w-50px t-center">
                            <a href="#" class="text-red"><i class="fas fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="d-flex align-start flex-wrap wd-fl-12">
                        <div class="wd-fl-8 wd-fl-dynamic mb-35">
                            <div class="select no-pl b-b">
                                <select name="" id="" class="no-p">
                                    <option value="">Name A</option>
                                    <option value="">Name B</option>
                                    <option value="">Name C</option>
                                    <option value="">Name D</option>
                                </select>
                            </div>
                        </div>
                        <div class="wd-fl-end w-50px t-center">
                            <a href="#" class="text-red"><i class="fas fa-minus"></i></a>
                        </div>
                    </div>

                    <a href="#" class="pb-10"><i class="fas fa-plus mr-3"></i><i>Add Subordinate</i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-sidebar control-sidebar fixed white" id="people-2" role="tabpanel">
        <div class="slimScroll">
            <div class="sidebar-header">
                <a href="#" data-toggle="hide-toggle"><i class="fas fa-times"></i></a>
            </div>
            <div class="sidebar-header d-flex">
                <div class="pr-20">
                    <div class="avatar avatar-md mt-1 w-80px">
                        <img src="../skin/img/dummy/avatar-1.jpg" alt="User Image" class="r-fl">
                    </div>
                </div>
                <div>
                    <div class="s-16 text-main">
                        <strong>Pierce</strong>
                    </div>
                    <div class="s-14">IT Consultant</div>
                    <div class="text-whitesmoke s-14"><i>Staff</i></div>
                    <div class="s-14"><i>abdul@ tunas.com</i></div>
                </div>
            </div>
            <div class="p-30 pt-b-0">
                <div class="d-flex align-start flex-wrap b-b pt-20">
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">NIK</div>
                        <div class="text-uppercase s-14">a2312casd</div>
                    </div>
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">Status</div>
                        <div class="s-14">Permanent</div>
                    </div>
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">Department</div>
                        <div class="text-uppercase s-14">Human Capital</div>
                    </div>
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">Join Date</div>
                        <div class="s-14">Jan 01, 2019</div>
                    </div>
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">Branch</div>
                        <div class="s-14">Branch Name</div>
                    </div>
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">End of Contract</div>
                        <div class="s-14">Jan O1, 2022</div>
                    </div>
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">Business Unit</div>
                        <div class="text-uppercase s-14">Unit Name</div>
                    </div>
                    <div class="wd-fl-6 mb-20">
                        <div class="text-main s-14 font-semibold">Location</div>
                        <div class="text-uppercase s-14">Palmerah</div>
                    </div>
                </div>
            </div>
            <div class="p-30 pt-b-0 mb-35">
                <h3 class="s-16 mb-0 text-black font-bold">Superior</h3>
                <div class="d-flex align-start flex-wrap pt-20">

                    <div class="d-flex align-start flex-wrap wd-fl-12">
                        <div class="wd-fl-8 wd-fl-dynamic mb-35">
                            <div class="select no-pl b-b">
                                <select name="" id="" class="no-p">
                                    <option value="">Jane Doe</option>
                                    <option value="">Jane 1</option>
                                    <option value="">Jane 2</option>
                                    <option value="">Jane 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="wd-fl-end w-50px t-center">
                            <a href="#" class="text-red"><i class="fas fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="d-flex align-start flex-wrap wd-fl-12">
                        <div class="wd-fl-8 wd-fl-dynamic mb-35">
                            <div class="select no-pl b-b">
                                <select name="" id="" class="no-p">
                                    <option value="">Jane Doe</option>
                                    <option value="">Jane 1</option>
                                    <option value="">Jane 2</option>
                                    <option value="">Jane 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="wd-fl-end w-50px t-center">
                            <a href="#" class="text-red"><i class="fas fa-minus"></i></a>
                        </div>
                    </div>

                    <a href="#" class="pb-10"><i class="fas fa-plus mr-3"></i><i>Add Superior</i></a>
                </div>
            </div>
            <div class="p-30 pt-b-0 mb-35">
                <h3 class="s-16 mb-0 text-black font-bold">Subordinate</h3>
                <div class="d-flex align-start flex-wrap pt-20">

                    <div class="d-flex align-start flex-wrap wd-fl-12">
                        <div class="wd-fl-8 wd-fl-dynamic mb-35">
                            <div class="select no-pl b-b">
                                <select name="" id="" class="no-p">
                                    <option value="">Name A</option>
                                    <option value="">Name B</option>
                                    <option value="">Name C</option>
                                    <option value="">Name D</option>
                                </select>
                            </div>
                        </div>
                        <div class="wd-fl-end w-50px t-center">
                            <a href="#" class="text-red"><i class="fas fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="d-flex align-start flex-wrap wd-fl-12">
                        <div class="wd-fl-8 wd-fl-dynamic mb-35">
                            <div class="select no-pl b-b">
                                <select name="" id="" class="no-p">
                                    <option value="">Name A</option>
                                    <option value="">Name B</option>
                                    <option value="">Name C</option>
                                    <option value="">Name D</option>
                                </select>
                            </div>
                        </div>
                        <div class="wd-fl-end w-50px t-center">
                            <a href="#" class="text-red"><i class="fas fa-minus"></i></a>
                        </div>
                    </div>

                    <a href="#" class="pb-10"><i class="fas fa-plus mr-3"></i><i>Add Subordinate</i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-layer"></div>


<script src="../skin/js/app.js"></script>
<?php include('../resources/partials/foot.php');?>
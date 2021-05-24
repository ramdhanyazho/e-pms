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
            <div class="col-md-12 columns f-none mt-30 mb-30">
                <a class="btn btn-primary font-semibold s-16 pz-20 r-10 w-150px mr-3" data-toggle="modal" data-target="#set-schedule">
                    Set Schedule
                </a>
            </div>
            <div class="animated col-md-12 s-16">
                <div class="row">
                    <div class="col-md-4">
                        <div class="s-14 text-main mb-10">
                            <strong>Schedule (5)</strong>
                        </div>
                        <ul class="list-unstyled list-white list-r-10 list-link">
                            <li>
                                <a href="#" data-toggle="modal" data-target="#user-schedule-1">
                                    Username 1
                                    <span class="hv-review"><i>+ Review</i></span>
                                </a>
                                <!-- POPUP SCHEDULE -->
                                <div class="modal fade" id="user-schedule-1">
                                    <div class="modal-dialog modal-lg dis-flex align-center height-100p">
                                        <form method="" class="col-xs-12">
                                            <div class="modal-content b-0 r-10">
                                                <a href="#" data-dismiss="modal" aria-label="Close" class="hide-modals"><i class="fas fa-times"></i></a>
                                                <div class="modal-header mb-10">
                                                    <h6 class="modal-title">Add Review</h6>
                                                </div>
                                                <div class="d-flex align-center mb-30 m-flex-wrap">
                                                    <div class="pb-15 wd-fl-end">
                                                        <div class="avatar avatar-md mt-1 w-100px">
                                                            <img src="../skin/img/dummy/avatar-1.jpg" alt="User Image" class="r-fl">
                                                        </div>
                                                    </div>
                                                    <div class="wd-fl-dynamic pl-25 m-pl-0">
                                                        <div class="s-16 text-black font-bold">Username 1</div>
                                                        <div class="s-14">IT Consultant</div>
                                                        <div class="clearfix b-b pb-10 mb-10"></div>
                                                        <div class="s-14 chat-meta text-whitesmoke">
                                                            oct 6, 2019 / 11:12 pm
                                                        </div>
                                                        <div class="s-16 font-bold text-black">
                                                            Seluruh Driver Sudah ditraining (30 orang) Lorem ipsum dolor sit amet, consectetur.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-body no-p no-b">
                                                    <div class="row">
                                                        <div class="form-group col-md-12 col-xs-12">
                                                            <div class="text-main s-14 font-semibold mb-10">Review</div>
                                                            <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-12 col-xs-12">
                                                            <div class="file-upload pt-b-10 col-md-6 col-xs-12 border">
                                                               <div class="file-select d-flex s-14">
                                                                    <div class="wd-fl-dynamic file-select-name">
                                                                        <i class="pr-10 fas fa-download"></i> 
                                                                        <span>No file chosen...</span>
                                                                    </div> 
                                                                    <div class="btn btn-outline-primary wd-fl-end text-main s-16 font-bold">Browse</div>
                                                                    <input type="file" class="upload-file" accept="image/*" name="upload_file" />
                                                               </div>
                                                            </div>
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
                            </li>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#user-schedule-2">
                                    Username 2
                                    <span class="hv-review"><i>+ Review</i></span>
                                </a>
                                <!-- POPUP SCHEDULE -->
                                <div class="modal fade" id="user-schedule-2">
                                    <div class="modal-dialog modal-lg dis-flex align-center height-100p">
                                        <form method="" class="col-xs-12">
                                            <div class="modal-content b-0 r-10">
                                                <a href="#" data-dismiss="modal" aria-label="Close" class="hide-modals"><i class="fas fa-times"></i></a>
                                                <div class="modal-header mb-10">
                                                    <h6 class="modal-title">Add Review</h6>
                                                </div>
                                                <div class="d-flex align-center mb-30 m-flex-wrap">
                                                    <div class="pb-15 wd-fl-end">
                                                        <div class="avatar avatar-md mt-1 w-100px">
                                                            <img src="../skin/img/dummy/avatar-1.jpg" alt="User Image" class="r-fl">
                                                        </div>
                                                    </div>
                                                    <div class="wd-fl-dynamic pl-25 m-pl-0">
                                                        <div class="s-16 text-black font-bold">Username 1</div>
                                                        <div class="s-14">IT Consultant</div>
                                                        <div class="clearfix b-b pb-10 mb-10"></div>
                                                        <div class="s-14 chat-meta text-whitesmoke">
                                                            oct 6, 2019 / 11:12 pm
                                                        </div>
                                                        <div class="s-16 font-bold text-black">
                                                            Seluruh Driver Sudah ditraining (30 orang) Lorem ipsum dolor sit amet, consectetur.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-body no-p no-b">
                                                    <div class="row">
                                                        <div class="form-group col-md-12 col-xs-12">
                                                            <div class="text-main s-14 font-semibold mb-10">Review</div>
                                                            <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-12 col-xs-12">
                                                            <div class="file-upload pt-b-10 col-md-6 col-xs-12 border">
                                                               <div class="file-select d-flex s-14">
                                                                    <div class="wd-fl-dynamic file-select-name">
                                                                        <i class="pr-10 fas fa-download"></i> 
                                                                        <span>No file chosen...</span>
                                                                    </div> 
                                                                    <div class="btn btn-outline-primary wd-fl-end text-main s-16 font-bold">Browse</div>
                                                                    <input type="file" class="upload-file" accept="image/*" name="upload_file" />
                                                               </div>
                                                            </div>
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
                            </li>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#user-schedule-3">
                                    Username 3
                                    <span class="hv-review"><i>+ Review</i></span>
                                </a>
                                <!-- POPUP SCHEDULE -->
                                <div class="modal fade" id="user-schedule-3">
                                    <div class="modal-dialog modal-lg dis-flex align-center height-100p">
                                        <form method="" class="col-xs-12">
                                            <div class="modal-content b-0 r-10">
                                                <a href="#" data-dismiss="modal" aria-label="Close" class="hide-modals"><i class="fas fa-times"></i></a>
                                                <div class="modal-header mb-10">
                                                    <h6 class="modal-title">Add Review</h6>
                                                </div>
                                                <div class="d-flex align-center mb-30 m-flex-wrap">
                                                    <div class="pb-15 wd-fl-end">
                                                        <div class="avatar avatar-md mt-1 w-100px">
                                                            <img src="../skin/img/dummy/avatar-1.jpg" alt="User Image" class="r-fl">
                                                        </div>
                                                    </div>
                                                    <div class="wd-fl-dynamic pl-25 m-pl-0">
                                                        <div class="s-16 text-black font-bold">Username 1</div>
                                                        <div class="s-14">IT Consultant</div>
                                                        <div class="clearfix b-b pb-10 mb-10"></div>
                                                        <div class="s-14 chat-meta text-whitesmoke">
                                                            oct 6, 2019 / 11:12 pm
                                                        </div>
                                                        <div class="s-16 font-bold text-black">
                                                            Seluruh Driver Sudah ditraining (30 orang) Lorem ipsum dolor sit amet, consectetur.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-body no-p no-b">
                                                    <div class="row">
                                                        <div class="form-group col-md-12 col-xs-12">
                                                            <div class="text-main s-14 font-semibold mb-10">Review</div>
                                                            <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-12 col-xs-12">
                                                            <div class="file-upload pt-b-10 col-md-6 col-xs-12 border">
                                                               <div class="file-select d-flex s-14">
                                                                    <div class="wd-fl-dynamic file-select-name">
                                                                        <i class="pr-10 fas fa-download"></i> 
                                                                        <span>No file chosen...</span>
                                                                    </div> 
                                                                    <div class="btn btn-outline-primary wd-fl-end text-main s-16 font-bold">Browse</div>
                                                                    <input type="file" class="upload-file" accept="image/*" name="upload_file" />
                                                               </div>
                                                            </div>
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
                            </li>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#user-schedule-4">
                                    Username 4
                                    <span class="hv-review"><i>+ Review</i></span>
                                </a>
                                <!-- POPUP SCHEDULE -->
                                <div class="modal fade" id="user-schedule-4">
                                    <div class="modal-dialog modal-lg dis-flex align-center height-100p">
                                        <form method="" class="col-xs-12">
                                            <div class="modal-content b-0 r-10">
                                                <a href="#" data-dismiss="modal" aria-label="Close" class="hide-modals"><i class="fas fa-times"></i></a>
                                                <div class="modal-header mb-10">
                                                    <h6 class="modal-title">Add Review</h6>
                                                </div>
                                                <div class="d-flex align-center mb-30 m-flex-wrap">
                                                    <div class="pb-15 wd-fl-end">
                                                        <div class="avatar avatar-md mt-1 w-100px">
                                                            <img src="../skin/img/dummy/avatar-1.jpg" alt="User Image" class="r-fl">
                                                        </div>
                                                    </div>
                                                    <div class="wd-fl-dynamic pl-25 m-pl-0">
                                                        <div class="s-16 text-black font-bold">Username 1</div>
                                                        <div class="s-14">IT Consultant</div>
                                                        <div class="clearfix b-b pb-10 mb-10"></div>
                                                        <div class="s-14 chat-meta text-whitesmoke">
                                                            oct 6, 2019 / 11:12 pm
                                                        </div>
                                                        <div class="s-16 font-bold text-black">
                                                            Seluruh Driver Sudah ditraining (30 orang) Lorem ipsum dolor sit amet, consectetur.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-body no-p no-b">
                                                    <div class="row">
                                                        <div class="form-group col-md-12 col-xs-12">
                                                            <div class="text-main s-14 font-semibold mb-10">Review</div>
                                                            <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-12 col-xs-12">
                                                            <div class="file-upload pt-b-10 col-md-6 col-xs-12 border">
                                                               <div class="file-select d-flex s-14">
                                                                    <div class="wd-fl-dynamic file-select-name">
                                                                        <i class="pr-10 fas fa-download"></i> 
                                                                        <span>No file chosen...</span>
                                                                    </div> 
                                                                    <div class="btn btn-outline-primary wd-fl-end text-main s-16 font-bold">Browse</div>
                                                                    <input type="file" class="upload-file" accept="image/*" name="upload_file" />
                                                               </div>
                                                            </div>
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
                            </li>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#user-schedule-5">
                                    Username 5
                                    <span class="hv-review"><i>+ Review</i></span>
                                </a>
                                <!-- POPUP SCHEDULE -->
                                <div class="modal fade" id="user-schedule-5">
                                    <div class="modal-dialog modal-lg dis-flex align-center height-100p">
                                        <form method="" class="col-xs-12">
                                            <div class="modal-content b-0 r-10">
                                                <a href="#" data-dismiss="modal" aria-label="Close" class="hide-modals"><i class="fas fa-times"></i></a>
                                                <div class="modal-header mb-10">
                                                    <h6 class="modal-title">Add Review</h6>
                                                </div>
                                                <div class="d-flex align-center mb-30 m-flex-wrap">
                                                    <div class="pb-15 wd-fl-end">
                                                        <div class="avatar avatar-md mt-1 w-100px">
                                                            <img src="../skin/img/dummy/avatar-1.jpg" alt="User Image" class="r-fl">
                                                        </div>
                                                    </div>
                                                    <div class="wd-fl-dynamic pl-25 m-pl-0">
                                                        <div class="s-16 text-black font-bold">Username 1</div>
                                                        <div class="s-14">IT Consultant</div>
                                                        <div class="clearfix b-b pb-10 mb-10"></div>
                                                        <div class="s-14 chat-meta text-whitesmoke">
                                                            oct 6, 2019 / 11:12 pm
                                                        </div>
                                                        <div class="s-16 font-bold text-black">
                                                            Seluruh Driver Sudah ditraining (30 orang) Lorem ipsum dolor sit amet, consectetur.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-body no-p no-b">
                                                    <div class="row">
                                                        <div class="form-group col-md-12 col-xs-12">
                                                            <div class="text-main s-14 font-semibold mb-10">Review</div>
                                                            <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-12 col-xs-12">
                                                            <div class="file-upload pt-b-10 col-md-6 col-xs-12 border">
                                                               <div class="file-select d-flex s-14">
                                                                    <div class="wd-fl-dynamic file-select-name">
                                                                        <i class="pr-10 fas fa-download"></i> 
                                                                        <span>No file chosen...</span>
                                                                    </div> 
                                                                    <div class="btn btn-outline-primary wd-fl-end text-main s-16 font-bold">Browse</div>
                                                                    <input type="file" class="upload-file" accept="image/*" name="upload_file" />
                                                               </div>
                                                            </div>
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
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div class="s-14 text-main mb-10">
                            <strong>Waiting Approval (2)</strong>
                        </div>
                        <ul class="list-unstyled list-white list-r-10 list-link">
                            <li>
                                <a href="#" data-toggle="modal" data-target="#waiting-approval-1">
                                    Mellissa
                                    <span class="hv-review"><i>+ Review</i></span>
                                </a>
                                <!-- POPUP APPROVAL -->
                                <div class="modal fade" id="waiting-approval-1">
                                    <div class="modal-dialog modal-lg">
                                        <form method="" class="col-xs-12">
                                            <div class="modal-content b-0 r-10">
                                                <a href="#" data-dismiss="modal" aria-label="Close" class="hide-modals"><i class="fas fa-times"></i></a>
                                                <div class="modal-header mb-10">
                                                    <h6 class="modal-title">Waiting Approval</h6>
                                                </div>
                                                <div class="d-flex align-center mb-30 m-flex-wrap">
                                                    <div class="pb-15 wd-fl-end">
                                                        <div class="avatar avatar-md mt-1 w-100px">
                                                            <img src="../skin/img/dummy/avatar-1.jpg" alt="User Image" class="r-fl">
                                                        </div>
                                                    </div>
                                                    <div class="wd-fl-dynamic pl-25 m-pl-0">
                                                        <div class="s-16 text-black font-bold">Mellissa</div>
                                                        <div class="s-14">Account Executive</div>
                                                        <div class="clearfix b-b pb-10 mb-10"></div>
                                                        <div class="s-14 chat-meta text-whitesmoke">
                                                            oct 6, 2019 / 11:12 pm
                                                        </div>
                                                        <div class="s-16 font-bold text-black">
                                                            Seluruh Driver Sudah ditraining (30 orang)
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-body no-p no-b s-16">
                                                    <div class="row">
                                                        <div class="form-group col-md-12 col-xs-12 mb-20">
                                                            <div class="text-main s-14 font-semibold mb-10">Review</div>
                                                            <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-12 col-xs-12 mb-30">
                                                            <a href="#" class="b-b s-16">uploaded_document.jpg</a>
                                                        </div>
                                                        <div class="form-group col-md-12 col-xs-12">
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio minus repellat assumenda, praesentium quibusdam eum delectus soluta sunt, perspiciatis voluptatum! Tempore nemo repellat totam, aperiam, quos assumenda amet nisi quae!
                                                            </p>
                                                        </div>
                                                        <div class="form-group col-md-12 col-xs-12 mb-30">
                                                            <div class="border p-15">
                                                                <div class="s-16 text-black font-bold text-capitalize">Mia Lovia</div>
                                                                <div class="s-14">Marketing Manager</div>
                                                                <div class="checkboxCustom mt-15">
                                                                    <input type="checkbox" id="check-1" name="check-1" />
                                                                    <label for="check-1"><i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga sint quis dolor doloremque. Veritatis quas rem, aliquam officiis similique explicabo.</i></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12 col-xs-12 mb-30">
                                                            <div class="border p-15">
                                                                <div class="s-16 text-black font-bold text-capitalize">Subordinatename</div>
                                                                <div class="s-14">Marketing Lead</div>
                                                                <div class="checkboxCustom mt-15">
                                                                    <input type="checkbox" id="check-2" name="check-2" />
                                                                    <label for="check-2"><i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga sint quis dolor doloremque. Veritatis quas rem, aliquam officiis similique explicabo.</i></label>
                                                                </div>
                                                            </div>
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
                            </li>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#waiting-approval-2">
                                    Username 7
                                    <span class="hv-review"><i>+ Review</i></span>
                                </a>
                                <!-- POPUP APPROVAL -->
                                <div class="modal fade" id="waiting-approval-2">
                                    <div class="modal-dialog modal-lg">
                                        <form method="" class="col-xs-12">
                                            <div class="modal-content b-0 r-10">
                                                <a href="#" data-dismiss="modal" aria-label="Close" class="hide-modals"><i class="fas fa-times"></i></a>
                                                <div class="modal-header mb-10">
                                                    <h6 class="modal-title">Waiting Approval</h6>
                                                </div>
                                                <div class="d-flex align-center mb-30 m-flex-wrap">
                                                    <div class="pb-15 wd-fl-end">
                                                        <div class="avatar avatar-md mt-1 w-100px">
                                                            <img src="../skin/img/dummy/avatar-1.jpg" alt="User Image" class="r-fl">
                                                        </div>
                                                    </div>
                                                    <div class="wd-fl-dynamic pl-25 m-pl-0">
                                                        <div class="s-16 text-black font-bold">Username 7</div>
                                                        <div class="s-14">Account Executive</div>
                                                        <div class="clearfix b-b pb-10 mb-10"></div>
                                                        <div class="s-14 chat-meta text-whitesmoke">
                                                            oct 6, 2019 / 11:12 pm
                                                        </div>
                                                        <div class="s-16 font-bold text-black">
                                                            Seluruh Driver Sudah ditraining (30 orang)
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-body no-p no-b s-16">
                                                    <div class="row">
                                                        <div class="form-group col-md-12 col-xs-12 mb-20">
                                                            <div class="text-main s-14 font-semibold mb-10">Review</div>
                                                            <textarea class="form-control form-control-lg" placeholder="Type here.." name="" id="" cols="30" rows="7"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-12 col-xs-12 mb-30">
                                                            <a href="#" class="b-b s-16">uploaded_document.jpg</a>
                                                        </div>
                                                        <div class="form-group col-md-12 col-xs-12">
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio minus repellat assumenda, praesentium quibusdam eum delectus soluta sunt, perspiciatis voluptatum! Tempore nemo repellat totam, aperiam, quos assumenda amet nisi quae!
                                                            </p>
                                                        </div>
                                                        <div class="form-group col-md-12 col-xs-12 mb-30">
                                                            <div class="border p-15">
                                                                <div class="s-16 text-black font-bold text-capitalize">Mia Lovia</div>
                                                                <div class="s-14">Marketing Manager</div>
                                                                <div class="checkboxCustom mt-15">
                                                                    <input type="checkbox" id="check-3" name="check-3" />
                                                                    <label for="check-3"><i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga sint quis dolor doloremque. Veritatis quas rem, aliquam officiis similique explicabo.</i></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12 col-xs-12 mb-30">
                                                            <div class="border p-15">
                                                                <div class="s-16 text-black font-bold text-capitalize">Subordinatename</div>
                                                                <div class="s-14">Marketing Lead</div>
                                                                <div class="checkboxCustom mt-15">
                                                                    <input type="checkbox" id="check-4" name="check-4" />
                                                                    <label for="check-4"><i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga sint quis dolor doloremque. Veritatis quas rem, aliquam officiis similique explicabo.</i></label>
                                                                </div>
                                                            </div>
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
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div class="s-14 text-main mb-10">
                            <strong>Completed (8)</strong>
                        </div>
                        <ul class="list-unstyled list-white list-r-10">
                            <li>
                                <a href="#">
                                    Username 8
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Username 9
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Username 10
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Username 11
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Username 12
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Username 13
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Username 14
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Username 15
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal fade s-16" id="set-schedule">
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
                                            <option value="">Select KPI</option>
                                            <option value="kpi-1">select KPI 1</option>
                                            <option value="kpi-2">select KPI 2</option>
                                            <option value="kpi-3">select KPI 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <select class="custom-select select2">
                                            <option value="">Select Name</option>
                                            <option value="kpi-1">Username 1</option>
                                            <option value="kpi-2">Username 2</option>
                                            <option value="kpi-3">Username 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="input-group">
                                            <input type="text" class="date-time-picker form-control bg-transparent no-b"
                                                           data-options='{"timepicker":false, "format":"d/m/Y"}' placeholder="dd/mm/yy" />
                                            <span class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="input-group">
                                            <input type="text" class="date-time-picker form-control bg-transparent no-b"
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
                            <div class="modal-footer">
                                <button class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10">
                                    Submit
                                </button>
                            </div>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
        <!-- END MAIN -->
    </div>
<script src="../skin/js/app.js"></script>
<script>
    function uploadFIle($cl) {
        $cl.each(function(){
            var $this = $(this);
            $this.bind('change', function () {
                var filename = $this.val();
                if (/^\s*$/.test(filename)) {
                    $(this).parents('.file-upload').removeClass('active');
                    $(this).parents('.file-upload').find('.file-select-name span').text("No file chosen..."); 
                }
                else {
                    $(this).parents('.file-upload').addClass('active');
                    $(this).parents('.file-upload').find('.file-select-name span').text(filename.replace("C:\\fakepath\\", "")); 
                }
            });

        });
    }
    var uplda = $('.upload-file');
    uploadFIle(uplda);
</script>
<?php include('../resources/partials/foot.php');?>
<?php
    $author = 'Tunas';
    $titleBrowser = 'Profile | Tunas';
    $titlePage = 'My Profile';
    $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime dignissimos illum libero at, porro expedita deserunt recusandae in, labore odit!" ;
    $img = "../skin/img/logo.svg"; // img to 
    $pg = basename(substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'.')));
?>
<?php include('../resources/partials/header-employee.php');?>

    <div class="page has-sidebar-left height-full">


        <div class="container-fluid animatedParent">
            <div class="animated fadeInUpShort col-md-12 f-none">

                <div class="row no-gutters">
                    <div class="col-md-4 sticky mt-30">
                        <!-- MAIN SIDE LEFT PROFILE -->
                        <div class="white r-5 p-30 mx-p-15 pb-0 mb-30">
                            <div class="pb-15 d-flex align-center">
                                <div class="avatar avatar-md mt-1 w-100px">
                                    <img src="../skin/img/dummy/avatar-1.jpg" alt="User Image" class="r-fl">
                                </div>
                                <div class="pl-20 s-16 font-light">
                                    <a href="#"><i class="fas fa-pen s-14 pr-10"></i><i>Change Picture</i></a>
                                </div>
                            </div>
                            <div class="pb-15 b-b">
                                <div class="s-16 text-main">
                                    <strong>Abdul Pierce</strong>
                                </div>
                                <div class="s-14">IT Consultant</div>
                                <div class="text-whitesmoke s-14"><i>Staff</i></div>
                                <div class="s-14"><i class="far fa-envelope mr-7 text-main"></i><i>abdul@ tunas.com</i></div>
                            </div>
                            <div class="pb-15 mt-15">
                                <div class="d-flex align-start flex-wrap">
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
                                    <div class="wd-fl-12 mb-20">
                                        <div class="text-main s-14 font-semibold">Superior</div>
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
                    <div class="col-md-8">
                        <div class="ml-4">
                            <div class="col-sm-12 f-none mt-30 mb-50 m-p-0">
                                <h3 class="mb-15 thumb-Title">Organization Hierarchy</h3>
                                <ul class="list-timeline">
                                    <li>
                                        <div class="text-main s-14 mb-10 font-semibold">Superior lvl 1</div>
                                        <div class="s-16 mb-5">Superior Name 1</div>
                                        <div class="s-16 mb-5">Superior Name 2</div>
                                    </li>
                                    <li>
                                        <div class="text-main s-14 mb-10 font-semibold">Superior lvl 2</div>
                                        <div class="s-16 mb-5">Lorem ipsum.</div>
                                        <div class="s-16 mb-5">Lorem ipsum dolor.</div>
                                        <div class="s-16 mb-5">Lorem ipsum dolor sit.</div>
                                    </li>
                                    <li>
                                        <div class="text-main s-14 mb-10 font-semibold">Subordinate</div>
                                        <div class="s-16 mb-5">Subordinate 1</div>
                                        <div class="s-16 mb-5">Subordinate 2</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../skin/js/app.js"></script>

<?php include('../resources/partials/foot.php');?>
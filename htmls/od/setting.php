<?php
    $author = 'Tunas';
    $titleBrowser = 'Setting | Tunas';
    $titlePage = 'Setting';
    $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime dignissimos illum libero at, porro expedita deserunt recusandae in, labore odit!" ;
    $img = "../skin/img/logo.svg"; // img to 
?>
<?php include('../resources/partials/header.php');?>

    <div class="page has-sidebar-left height-full">
        <!-- MAIN -->
        <div class="container-fluid animatedParent">
            <div class="animated fadeInUpShort col-md-5 f-none">
                <div class="row no-gutters">
                    <!-- FILTER -->
                    <div class="col-sm-12 columns f-none mt-30">
                        <div class="pb-t-10">
                            <div class="s-16 text-black font-bold">Change Password</div>
                            <div class="s-14">Enter a new password</div>
                        </div>
                        <form action="" class="mt-30 col-xs-8 pt-b-15 white form-material">
                            <div class="form-group col-xs-12 no-p">
                                <input type="text" class="form-control form-control-lg r-10 s-16" placeholder="New Password" />
                            </div>
                            <div class="form-group col-xs-12 no-p">
                                <input type="text" class="form-control form-control-lg r-10 s-16" placeholder="Retype Password" />
                            </div>
                            <button class="mb-0 btn btn-lg btn-block t-center btn-primary font-semibold s-16 pz-20 r-10">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN -->
    </div>


<script src="../skin/js/app.js"></script>
<?php include('../resources/partials/foot.php');?>
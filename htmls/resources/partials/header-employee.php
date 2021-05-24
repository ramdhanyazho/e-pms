<?php include('head.php');?>
<?php include('sidebar-employee.php');?>
<div class="has-sidebar-left">
    <div class="navbar navbar-expand d-flex justify-between">
        <div class="relative hide-xl m-f-at">
            <a href="#" data-toggle="push-menu" class="s-24 paper-nav-toggle">
                <i class="fas fa-bars"></i>
            </a>
        </div>
        <div class="relative m-f-at mb-center">
            <h1 class="nav-title text-main"><?php echo $titlePage?></h1>
        </div>
        <!--Top Menu Start -->
        <div class="navbar-custom-menu m-f-at relative">
            <ul class="nav navbar-nav">
                <!-- User Account-->
                <li class="dropdown custom-dropdown user user-menu ">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        Account <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right pt-b-20">
                        <div class="col-xs-12 box s-16 justify-between mb-10">
                            <a href="setting.php" class="s-16">
                                Settings
                            </a>
                        </div>
                        <div class="col-xs-12 box s-16 justify-between">
                                <a href="#" class="s-16">
                                    Logout
                                </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
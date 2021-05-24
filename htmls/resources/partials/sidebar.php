<!-- Sidebar -->
<aside class="main-sidebar fixed offcanvas shadow">
    <section class="sidebar">
        <div class="w-150px mt-15 mb-15 ml-at mr-at">
            <a href="../index.php"><img src="../skin/img/logo.svg" alt=""></a>
        </div>
        <div class="relative">
            <div class="user-panel p-3 mb-2">
                <div class="dis-flex algn-center">
                    <div class="user_avatar w-50px">
                        <img src="../skin/img/dummy/side-profile.png" alt="User Image" class="r-fl">
                    </div>
                    <div class="info">
                        <h6 class="name-profile font-bold text-main">Welcome,</h6>
                        <h6 class="name-profile font-normal">Abdul Pierce</h6>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="<?php if($pg=='index'){?>current<?php }?>">
                <a href="index.php">
                    <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="<?php if($pg=='people'){?>current<?php }?>">
                <a href="people.php">
                    <i class="fas fa-user"></i> <span>People</span>
                </a>
            </li>
            <li class="<?php if($pg=='evaluation'){?>current<?php }?><?php if($pg=='single-evaluation'){?>current<?php }?>">
                <a href="evaluation.php">
                    <i class="fas fa-signal"></i><span>Evaluation</span>
                </a>
            </li>
            <li class="<?php if($pg=='announcement'){?>current<?php }?>">
                <a href="announcement.php">
                    <i class="fas fa-exclamation-circle"></i><span>Announcement</span>
                </a>
            </li>
            <li class="<?php if($pg=='activity'){?>current<?php }?>">
                <a href="activity.php">
                    <i class="fas fa-running"></i><span>Activity</span>
                </a>
            </li>
            <li class="<?php if($pg=='audit-trial'){?>current<?php }?>">
                <a href="audit-trial.php">
                    <i class="fas fa-history"></i><span>Audit Trail</span>
                </a>
            </li>
            <li class="<?php if($pg=='faq'){?>current<?php }?>">
                <a href="faq.php">
                    <i class="fas fa-question-circle"></i><span>F.A.Q</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
<!--Sidebar End-->
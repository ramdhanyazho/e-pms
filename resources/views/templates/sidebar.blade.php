<?php
$path = request()->path();
?>

<!-- Sidebar -->
<aside class="main-sidebar fixed offcanvas shadow">
    <section class="sidebar">
        <div class="w-150px mt-15 mb-15 ml-at mr-at">
            <a href="{{ url('/') }}"><img src="{{ url('skin/img/logo.svg') }}" alt=""></a>
        </div>
        <div class="relative">
            <div class="user-panel p-3 mb-2">
                <div class="dis-flex algn-center">
                    <div class="user_avatar w-50px">
                        <img src="{!! $sidebar['employee']->photo() !!}" alt="User Image" class="r-fl">
                    </div>
                    <div class="info">
                        <h6 class="name-profile font-bold text-main" style="margin-bottom: 5px;">Welcome,</h6>
                        <h6 class="name-profile font-normal" style="margin-bottom: 5px;">{{ ucwords(strtolower($sidebar['employee']->getName()))  }}</h6>
                        <p class="name-profile font-normal"><strong>as OD</strong></p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ ($sidebar['current_path'] == 'od/dashboard' ? 'current':'') }}">
                <a href="{{ url('/od/dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ ($sidebar['current_path'] == 'od/dashboard2' ? 'current':'') }}">
                <a href="{{ url('/od/dashboard2') }}">
                    <i class="fas fa-tachometer-alt"></i> <span>Dashboard 2</span>
                </a>
            </li>
            <li class="{{ ($sidebar['current_path'] == 'od/people' ? 'current':'') }}">
                <a href="{{ url('od/people') }}">
                    <i class="fas fa-user"></i> <span>People</span>
                </a>
            </li>
            <li class="{{ ($sidebar['current_path'] == 'od/evaluation' ? 'current':'') }}">
                <a href="{{ url('od/evaluation') }}">
                    <i class="fas fa-signal"></i><span>Evaluation</span>
                </a>
            </li>
            <li class="{{ ($sidebar['current_path'] == 'od/announcement' ? 'current':'') }}">
                <a href="{{ url('od/announcement') }}">
                    <i class="fas fa-exclamation-circle"></i><span>Announcement</span>
                </a>
            </li>
            <li class="{{ ($sidebar['current_path'] == 'od/activity' ? 'current':'') }}">
                <a href="{{ url('od/activity') }}">
                    <i class="fas fa-running"></i><span>Activity</span>
                </a>
            </li>
            <li class="{{ ($sidebar['current_path'] == 'od/logs' ? 'current':'') }}">
                <a href="{{ url('od/logs') }}">
                    <i class="fas fa-history"></i><span>Audit Trail</span>
                </a>
            </li>
            <li class="{{ ($sidebar['current_path'] == 'od/mutasi' ? 'current':'') }}">
                <a href="{{ url('od/mutasi') }}">
                    <i class="fas fa-question-circle"></i><span>Mutasi</span>
                </a>
            </li>
            <li class="{{ ($sidebar['current_path'] == 'od/faq' ? 'current':'') }}">
                <a href="{{ url('od/faq') }}">
                    <i class="fas fa-question-circle"></i><span>F.A.Q</span>
                </a>
            </li>
            <li class="{{ ($sidebar['current_path'] == 'od/setting' ? 'current':'') }}">
                <a href="{{ url('od/setting') }}">
                    <i class="fas fa-question-circle"></i><span>Settings</span>
                </a>
            </li>
            <li class="{{ url('') }}">
                <a href="#" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                    <i class="fas fa-question-circle"></i><span>Logout</span>
                </a>
            </li>
            <form id="frm-logout" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </ul>
    </section>
</aside>
<!--Sidebar End-->
<div class="has-sidebar-left">
    <div class="navbar navbar-expand d-flex justify-between">
        <div class="relative hide-xl m-f-at">
            <a href="#" data-toggle="push-menu" class="s-24 paper-nav-toggle">
                <i class="fas fa-bars"></i>
            </a>
        </div>
        <div class="relative m-f-at mb-center">
            <h1 class="nav-title text-main">{{ $sidebar['menu_title'] }}</h1>
            <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                <i></i>
            </a>
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
                        @if ($sidebar['employee']->isOD())
                            <div class="col-xs-12 box s-16 justify-between mb-10">
                                <a href="{{ url('em/dashboard') }}" class="s-16">
                                    Switch as Employee
                                </a>
                            </div>
                        @endif
                        <div class="col-xs-12 box s-16 justify-between mb-10">
                            <a href="{{ url('em/setting') }}" class="s-16">
                                Settings
                            </a>
                        </div>
                        <div class="col-xs-12 box s-16 justify-between">
                            <form method="post" action="{{ url('logout') }}" id="formlogout">
                                {{ csrf_field() }}
                                <a href="javascript:formlogout.submit()" class="s-16">
                                    Logout
                                </a>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
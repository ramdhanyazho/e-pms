<!-- Sidebar -->
<aside class="main-sidebar fixed offcanvas shadow">
    <section class="sidebar">
        <div class="w-150px mt-15 mb-15 ml-at mr-at">
            <a href="{{ url('/') }}"><img src="{{ url('/skin/img/logo.svg') }}" alt=""></a>
        </div>
        <div class="relative">
            <div class="user-panel p-3 mb-2">
                <div class="dis-flex algn-center">
                    <div class="user_avatar w-50px">
                        <img src="{!! $sidebar['employee']->photo() !!}" alt="User Image" class="r-fl">
                    </div>
                    <div class="info">
                        <h6 class="name-profile font-bold text-main" style="margin-bottom: 5px;">Welcome,</h6>
                        <h6 class="name-profile font-normal" style="margin-bottom: 5px;">{{ ucwords(strtolower($sidebar['employee']->getName())) }}</h6>
                        <h6 class="name-profile font-normal"><strong>as employee</strong></h6>

                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ $sidebar['current_path'] == 'em/dashboard'?'current':'' }}">
                <a href="{{ url('em/dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ $sidebar['current_path'] == 'em/me'?'current':'' }}">
                <a href="{{ url('em/me') }}">
                    <i class="fas fa-user"></i> <span>My Profile</span>
                </a>
            </li>
            <li class="{{ $sidebar['current_path'] == 'em/evaluation'?'current':'' }}">
                <a href="{{ url('em/evaluation') }}">
                    <i class="fas fa-signal"></i><span>My Evaluation</span>
                </a>
            </li>
            <li class="{{ $sidebar['current_path'] == 'em/kpi'?'current':'' }}{{ $sidebar['current_path'] == 'em/kpi/subordinate'?'current':'' }}{{ $sidebar['current_path'] == 'em/kpi/review'?'current':'' }}{{ $sidebar['current_path'] == 'em/kpi/subordinate/custom'?'current':'' }}">
                <a href="{{ url('em/kpi') }}">
                    <i class="fas fa-trophy"></i><span>KPI Index</span>
                </a>
            </li>
            <li class="{{ $sidebar['current_path'] == 'em/announcement'?'current':'' }}">
                <a href="{{ url('em/announcement') }}">
                    <i class="fas fa-exclamation-circle"></i><span>Announcement</span>
                </a>
            </li>
            <li class="{{ $sidebar['current_path'] == 'em/activity'?'current':'' }}">
                <a href="{{ url('em/activity') }}">
                    <i class="fas fa-running"></i><span>Activity</span>
                </a>
            </li>
            <li class="{{ $sidebar['current_path'] == 'em/faq'?'current':'' }}">
                <a href="{{ url('em/faq') }}">
                    <i class="fas fa-question-circle"></i><span>F.A.Q</span>
                </a>
            </li>
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
                                <a href="{{ url('od/dashboard') }}" class="s-16">
                                    Switch as OD
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
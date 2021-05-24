@extends('app')

@section('sidebar')
@include('templates.sidebar', ['sidebar' => $sidebar])
@endsection

@section('content')
    <div class="page has-sidebar-left height-full">
            <div class="container-fluid bannerOD columns pt-20">
            <div class="col-xs-12">
                <div class="columns trans-blue d-flex align-center r-10">
                    <div class="relative">
                    <img src="{{ url('skin/img/dashboard-od.png') }}" alt="" />
                    </div>
                    <div class="relative text-banner">
                        <h3>Hello, {{ $content['auth_user']->name }}</h3>
                        <p>You have <span>{{ $tasks_count }}</span> unprocessed task as of today</p>
                        <a href="{{ url('/em/dashboard') }}" class="btn btn-primary btn-lg mt-10 light-blue">You've logged in as OD. Click here to switch as Employee</a><br>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="col-md-11 columns f-none mb-30">
                <div class="row">
					<div style="margin: 20px 0 0 20px;">
						<ul>
							<li><a href="#">Listing Data KPI Index</a></li>
							<li><a href="#">KPI below 100%</a></li>
							<li><a href="#">KPI per category</a></li>
							<li><a href="#">List of employees not inputing self-appraisal</a></li>
							<li><a href="#">List of employees not having achievement scoring from superior</a></li>
							<li><a href="#">Grades</a></li>
							<li><a href="#">Business Unit Performance</a></li>
							<li><a href="#">Review KPI Completeness</a></li>
							<li><a href="#">Employees with Tracking KPI</a></li>
						</ul>
					</div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('skin/js/app.js') }}"></script>
@endsection
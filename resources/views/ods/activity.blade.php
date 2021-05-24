@extends('app')

@section('sidebar')
@include('templates.sidebar')
@endsection

@section('content')
    <div class="page has-sidebar-left height-full">


        <div class="container-fluid animatedParent">
            <div class="animated fadeInUpShort col-md-12 f-none">

                <div class="row no-gutters">
                    <!-- FILTER -->
                    <div class="col-sm-12 columns f-none mt-30">
                        <form action="" class="row" id="form-activity">
                            <div class="col-md-5 f-none clearfix mb-10">
                                <div class="d-flex dateTo r-10">
                                    <div class="input-group">
                                        <span class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </span>
                                        <input type="text" class="date-time-picker form-control bg-transparent no-b cmd-select"
                                               data-options='{"timepicker":false, "format":"d/m/Y"}' placeholder="dd/mm/yy" name="startdate"
                                               value="{{ (isset($filter['startdate']) ? $filter['startdate'] : '') }}" />
                                    </div>
                                    <span class="endTo mr-5 font-bold">To</span>
                                    <div class="input-group">
                                        <span class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </span>
                                        <input type="text" class="date-time-picker form-control bg-transparent no-b cmd-select"
                                               data-options='{"timepicker":false, "format":"d/m/Y"}' placeholder="dd/mm/yy" name="enddate"
                                               value="{{ (isset($filter['enddate']) ? $filter['enddate'] : '') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 f-none pt-b-10">
                                <div class="d-flex">
                                    <div class="form-group">
                                        <div class="select white r-5">
                                            <select id="" class="form-control cmd-select" name="user">
                                                <option value="">User</option>
                                                @foreach($users as $user)
                                                    <option value="{{ $user->getId() }}" {{ isset($filter['user']) && $filter['user'] == $user->getId()?'selected':'' }}>{{ $user->getName() }} - {{ $user->getNIK() }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input white r-5">
                                            <input class="form-control cmd-input" size="50" type="text" name="action" value="{{ (isset($filter['action']) ? $filter['action'] : '') }}" placeholder="Filter by action...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 f-none pt-b-10">
                                <input class="btn btn-default" type="submit" name="btnSubmit" value="Filter">
                            </div>
                        </form>
                    </div>
                    <!-- END FILTER -->
                    <!-- AREA TABLE -->
                    <div class="col-sm-12 f-none table-responsive">
                        <table class="table table-striped table-hover table-white">
                            <thead>
                                <tr class="no-b">
                                    <th style="width: 120px;">Date/Time</th>
                                    <th style="width: 300px;">Employee</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach($activities as $activity)
                            <tr>
                                <td>
                                    <div>{{ $activity->getDate() }}</div>
                                    <div>{{ $activity->getTime() }}</div>
                                </td>
                                <td>
                                    <div class="s-16 text-main">
                                        <strong>{{ ($activity->user != null ? $activity->user->getName() : '-') }}</strong>
                                        -
                                        <strong>{{ ($activity->user != null ? $activity->user->getNIK() : '-') }}</strong>
                                    </div>
                                </td>
                                <td>{!! $activity->getAction() !!}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END AREA TABLE -->
                    <nav class="my-3">
                        {{ $activities->appends(request()->input())->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('skin/js/app.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
        });
    </script>
@endsection
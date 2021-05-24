@extends('app')

@section('sidebar')
@include('templates.employeesidebar')
@endsection

@section('content')
    <div class="page has-sidebar-left height-full">


        <div class="container-fluid animatedParent">
            <div class="animated fadeInUpShort col-md-12 f-none">

                <div class="row no-gutters">
                    <!-- FILTER -->
                    <div class="col-sm-12 columns f-none mt-30">
                        <form action="" class="row" id="form-activity">
                            {{ csrf_field() }}
                            <div class="col-md-5 f-none clearfix mb-10">
                                <div class="d-flex dateTo r-10">
                                    <div class="input-group">
                                        <span class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </span>
                                        <input type="text" class="date-time-picker form-control bg-transparent no-b cmd-select"
                                               data-options='{"timepicker":false, "format":"d/m/Y"}' placeholder="dd/mm/yy" name="startdate" value="{{ isset($filter['startdate']) ?$filter['startdate']:'' }}" />
                                    </div>
                                    <span class="endTo mr-5 font-bold">To</span>
                                    <div class="input-group">
                                        <span class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </span>
                                        <input type="text" class="date-time-picker form-control bg-transparent no-b cmd-select"
                                               data-options='{"timepicker":false, "format":"d/m/Y"}' placeholder="dd/mm/yy" name="enddate" value="{{ isset($filter['enddate']) ?$filter['enddate']:'' }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 f-none pt-b-10">
                                <div class="d-flex">
                                    <div class="form-group">
                                        <div class="select white r-5">
                                            <select id="" class="form-control cmd-select" name="period">
                                                @foreach ($periods as $period)
                                                    <option value="{{ $period }}" {{ isset($filter['period']) && $filter['period'] == $period?'selected':'' }}>{{ $period }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- END FILTER -->
                    <!-- AREA TABLE -->
                    <div class="col-sm-12 f-none table-responsive">
                        <table class="table table-striped table-hover table-white">
                            <thead>
                                <tr class="no-b">
                                    <th style="width: 120px;"></th>
                                    <th style="width: 200px;">Username</th>
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
                                        <strong>{{ $activity->user->getName() }}</strong>
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
            $('.cmd-select').on('change', function() {
                $('#form-activity').submit();
            })
        })
    </script>
@endsection
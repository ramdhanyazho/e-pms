@extends('app')

@section('sidebar')
@include('templates.sidebar')
@endsection

@section('content')
<style>
    .wrapword {
    white-space: -moz-pre-wrap !important;  /* Mozilla, since 1999 */
    white-space: -webkit-pre-wrap; /*Chrome & Safari */ 
    white-space: -pre-wrap;        /* Opera 4-6 */
    white-space: -o-pre-wrap;      /* Opera 7 */
    white-space: pre-wrap;         /* CSS3 */
    word-wrap: break-word;         /* Internet Explorer 5.5+ */
    word-break: break-all;
    white-space: normal;
}
</style>

    <div class="page has-sidebar-left height-full">

        <div class="container-fluid animatedParent">
            <div class="animated fadeInUpShort col-md-12 f-none">

                <div class="row no-gutters">
                    <!-- FILTER -->
                    <div class="col-sm-12 columns f-none mt-30">
                        <form action="" class="row" id="form-logs">

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
                                    <div class="form-group">
                                        <div class="select white r-5">
                                            <select id="" class="form-control cmd-select" name="user">
                                                <option value="">User</option>
                                                @foreach($users as $user)
                                                    <option value="{{ $user->getId() }}" {{ isset($filter['user']) && $filter['user'] == $user->getId()?'selected':'' }}>{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="select white r-5">
                                            <select id="" class="form-control cmd-select " name="action">
                                                <option value="">Action</option>
                                                @foreach($actions as $action)
                                                    <option value="{{ $action->getPage() }}" {{ isset($filter['action']) && $filter['action'] == $action->getPage()?'selected':'' }}>{{ $action->getPage() }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <div class="select white r-5">
                                            <select id="" class="form-control">
                                                <option>Status</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div> -->
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- END FILTER -->
                    <!-- AREA TABLE -->
                    <div class="col-sm-12 f-none table-responsive">
                        <table class="table table-striped table-white">
                            <thead>
                                <tr class="no-b">
                                    <th style="width: 120px;"></th>
                                    <th>UID</th>
                                    <th>Username</th>
                                    <th>Page</th>
                                    <th>IP Address</th>
                                    <th>User Agent</th>
                                    <th>Data</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($logs as $log)
                                    <tr>
                                        <td>
                                            <div>{{ $log->getDate() }}</div>
                                            <div>{{ $log->getTime() }}</div>
                                        </td>
                                        <td>{{ $log->getUserId() }}</td>
                                        <td>{{ ($log->user != null ? $log->user->getName() : '-') }}</td>
                                        <td>{{ $log->getPage() }}</td>
                                        <td>{{ $log->getIPAddr() }}</td>
                                        <td>{{ $log->getUserAgent() }}</td>
                                        <td class="wrapword">{{ $log->getData() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END AREA TABLE -->
                    <nav class="my-3">
                        {{ $logs->appends(request()->input())->links() }}
                    </nav>
                </div>
                
            </div>
        </div>
        
    </div>

    <script src="{{ url('skin/js/app.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.cmd-select').on('change', function() {
                $('#form-logs').submit();
            })
        })
    </script>
@endsection
@extends('app')

@section('sidebar')
@include('templates.sidebar')
@endsection

@section('content')
    <div class="page has-sidebar-left height-full">
        <div class="container-fluid animatedParent">
        <div class="animated fadeInUpShort col-md-12">
                <div class="row my-3">
                    <div class="col-md-12">
                    <a href="{{ url('/od/mutasi/new') }}" class="btn btn-primary s-16 font-semibold">New Employee</a>&nbsp;&nbsp;
                        <a href="{{ url('/od/mutasi/mutation') }}" class="btn btn-warning s-16 font-semibold">New Mutation</a>&nbsp;&nbsp;
                        <a href="{{ url('/od/mutasi/termination') }}" class="btn btn-danger s-16 font-semibold">New Termination</a>&nbsp;&nbsp;
                        <div class="clearfix">&nbsp;</div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="table-responsive">
                            <table class="nav table table-tab table-hover table-white table-hover-link" role="tablist">
                                <thead>
                                    <tr class="no-b">
                                        <th style="width: 100px"></th>
                                        <th>Employee Name</th>
                                        <th>Cost Center</th>
                                        <th>Status</th>
                                        <th>Reporting Line</th>
                                        <th>Termination Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $count = 0; ?>
                                    @foreach ($mutationEmployees as $employee)
                                        <?php $count++; ?>
                                        @if (!$employee->isPermanent())
                                            <tr data-toggle="tab" href="#people-{{ $count }}" role="tab" aria-selected="false" style="background-color: #{{ env('CONTRACT_BACKGROUND_COLOR') }};">
                                        @else
                                            <tr data-toggle="tab" href="#people-{{ $count }}" role="tab" aria-selected="false">
                                        @endif
                                            <td>
                                                <div class="avatar avatar-md mr-3 mt-1 w-50px center t-center">
                                                    <img src="{!! $employee->photo() !!}" alt="User Image" class="r-fl">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="s-16 text-main">
                                                    <strong>{{ $employee->getName() }}</strong>
                                                </div>
                                                <div class="s-14">{{ $employee->getNIK() }} - {{ $employee->getTitle() }}</div>
                                                <div class="text-whitesmoke s-14"><i>{{ $employee->levels->getLevel() }}</i></div>
                                            </td>
                                            <td>{{ $employee->costcenter->getName() }}</td>
                                            <td>{{ $employee->getStatus() }}</td>
                                            @if ($employee->getSuperOrdinate() != null)
                                                <td>{{ $employee->getSuperOrdinate()->getName() ?? '-' }}<br>{{ $employee->getSuperOrdinate()->getNIK() ?? '-' }}
                                            @else
                                                <td>-</td>
                                            @endif
                                            </td>
                                            <td>
                                                {{ $employee->getTerminationDate() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <nav class="my-3">
                    {{ $mutationEmployees->appends(request()->input())->links() }}
                </nav>
            </div>            
        </div>
    </div>
    

    <script src="{{ url('skin/js/app.js') }}"></script>
@endsection
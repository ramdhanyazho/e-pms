@extends('app')

@section('sidebar')
@include('templates.employeesidebar')
@endsection

@section('content')
    <div class="page has-sidebar-left height-full">
        <div class="container-fluid animatedParent">
            <div class="animated fadeInUpShort col-md-12">
                <div class="row my-3">
                    <div class="col-md-12">
                        <h4 class="thumb-Title">Upload KPI</h4>
                        <div class="clearfix">&nbsp;</div>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                <strong><em>{{ session('error') }}</em></strong>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li><strong><em>{{ $error }}</em></strong></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                        @endif
                        @if (session('result'))
                            <div class="alert alert-success">
                                @foreach (session('result') as $res)
                                    <strong><em>{{ $res[0] }} | {{ $res[1] }} | {{ $res[2] }}</em></strong><br>
                                @endforeach
                            </div>
                            <div class="clearfix">&nbsp;</div>
                        @endif
                        @if (session('message'))
                            <div class="alert alert-success">
                                    <strong><em>{{ session('message') }}</em></strong><br>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                        @endif
                        <div>Upload KPI using CSV formatted file.</div>
                        <div>Download the <a href="{{ url('/em/kpi/subordinate/upload/kpi/template') }}">template here</a>.</div>
                        <div class="clearfix">&nbsp;</div>
                        <form method="POST" enctype="multipart/form-data" action="{{ url('/em/kpi/subordinate/kpi/upload') }}">
                            @csrf
                            <input type="file" name="employeekpicsv" class="form-control">
                            <br>
                            <input type="submit" class="btn btn-warning" name="btn_test_upload" value="Test File">
                            <input type="submit" class="btn btn-primary" name="btn_upload" value="Upload">
                        </form>
                    </div>
                </div>
            </div>            
        </div>
    </div>
    

    <script src="{{ url('skin/js/app.js') }}"></script>
@endsection
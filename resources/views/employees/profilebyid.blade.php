@extends('app')

@section('sidebar')
@include('templates.employeesidebar', ['sidebar' => $sidebar])
@endsection

@section('content')
    <div class="page has-sidebar-left height-full">
        <div class="container-fluid animatedParent">
            <div class="animated fadeInUpShort col-md-12 f-none">

                <div class="row no-gutters">
                    <div class="col-md-4 sticky mt-30">
                        <!-- MAIN SIDE LEFT PROFILE -->
                        <div class="white r-5 p-30 mx-p-15 pb-0 mb-30">
                            <div class="pb-15 d-flex align-center">
                                <div class="avatar avatar-md mt-1 w-100px">
                                    <img src="{{ url('skin/img/dummy/avatar-1.jpg') }}" alt="User Image" class="r-fl">
                                </div>
                                <div class="pl-20 s-16 font-light">
                                    <a href="#"><i class="fas fa-pen s-14 pr-10"></i><i>Change Picture</i></a>
                                </div>
                            </div>
                            <div class="pb-15 b-b">
                                <div class="s-16 text-main">
                                    <strong>{{ $employee->getName() }}</strong>
                                </div>
                                <div class="s-14">{{ $employee->getTitle() }}</div>
                                <div class="text-whitesmoke s-14"><i>{{ $employee->getLevel() }}</i></div>
                                <div class="s-14"><i class="far fa-envelope mr-7 text-main"></i><i>{{ $employee->getPersonalEmail() }}</i></div>
                            </div>
                            <div class="pb-15 mt-15">
                                <div class="d-flex align-start flex-wrap">
                                    <div class="wd-fl-6 mb-20">
                                        <div class="text-main s-14 font-semibold">NIK</div>
                                        <div class="text-uppercase s-14">{{ $employee->getNIK() }}</div>
                                    </div>
                                    <div class="wd-fl-6 mb-20">
                                        <div class="text-main s-14 font-semibold">Status</div>
                                        <div class="s-14">{{ $employee->getStatus() }}</div>
                                    </div>
                                    <div class="wd-fl-6 mb-20">
                                        <div class="text-main s-14 font-semibold">Department</div>
                                        <div class="text-uppercase s-14">{{ $employee->getDepartment() }}</div>
                                    </div>
                                    <div class="wd-fl-6 mb-20">
                                        <div class="text-main s-14 font-semibold">Join Date</div>
                                        <div class="s-14">{{ $employee->getJoinDate() }}</div>
                                    </div>
                                    <div class="wd-fl-6 mb-20">
                                        <div class="text-main s-14 font-semibold">Branch</div>
                                        <div class="s-14">{{ $employee->getBranch() }}</div>
                                    </div>
                                    <div class="wd-fl-6 mb-20">
                                        <div class="text-main s-14 font-semibold">End of Contract</div>
                                        <div class="s-14">{{ $employee->getEndContract() }}</div>
                                    </div>
                                    <div class="wd-fl-6 mb-20">
                                        <div class="text-main s-14 font-semibold">Business Unit</div>
                                        <div class="text-uppercase s-14">{{ $employee->getBusinessUnit() }}</div>
                                    </div>
                                    <div class="wd-fl-6 mb-20">
                                        <div class="text-main s-14 font-semibold">Location</div>
                                        <div class="text-uppercase s-14">{{ $employee->getLocation() }}</div>
                                    </div>
                                    <div class="wd-fl-12 mb-20">
                                        <div class="text-main s-14 font-semibold">Superior</div>
                                        <div class="s-14">{{ count($employee->getSuperOrdinate()) }}</div>
                                    </div>
                                    <div class="wd-fl-12 mb-20">
                                        <div class="text-main s-14 font-semibold">Subordinate</div>
                                        <div class="s-14">{{ count($employee->getSubOrdinate()) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END MAIN SIDE LEFT PROFILE -->
                    </div>
                    <div class="col-md-8">
                        <div class="ml-4">
                            <div class="col-sm-12 f-none mt-30 mb-50 m-p-0">
                                <h3 class="mb-15 thumb-Title">Organization Hierarchy</h3>
                                <ul class="list-timeline">
                                    <li>
                                        <div class="text-main s-14 mb-10 font-semibold">Superior lvl 1</div>
                                        <div class="s-16 mb-5">Superior Name 1</div>
                                        <div class="s-16 mb-5">Superior Name 2</div>
                                    </li>
                                    <li>
                                        <div class="text-main s-14 mb-10 font-semibold">Superior lvl 2</div>
                                        <div class="s-16 mb-5">Lorem ipsum.</div>
                                        <div class="s-16 mb-5">Lorem ipsum dolor.</div>
                                        <div class="s-16 mb-5">Lorem ipsum dolor sit.</div>
                                    </li>
                                    <li>
                                        <div class="text-main s-14 mb-10 font-semibold">Subordinate</div>
                                        <div class="s-16 mb-5">Subordinate 1</div>
                                        <div class="s-16 mb-5">Subordinate 2</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('skin/js/app.js') }}"></script>
@endsection
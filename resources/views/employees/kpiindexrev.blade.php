@extends('app')

@section('sidebar')
@include('templates.employeesidebar')
@endsection

@section('content')
    <div class="page has-sidebar-left height-full">
        <!-- MAIN -->
        <div class="container-fluid">
            <div class="row d-flex subnav-kpi pull-up-20 pl-20 pr-20 pt-20">
                <ul class="nav nav-material nav-material-white s-16">
                    <li class="mr-5">
                        <a href="{{ url('/em/kpi') }}" class="nav-link pb-15">Personal KPI</a>
                    </li>
                    <li class="mr-5">
                        <a href="{{ url('/em/kpi/subordinate') }}" class="nav-link pb-15">Subordinate KPI</a>
                    </li>
                    @if ($is_having_superordinate)
                        <li class="mr-5 active">
                            <a href="{{ url('/em/kpi/review') }}" class="nav-link pb-15 active">Review KPI</a>
                        </li>
                    @endif
                </ul>
            </div>

            @if ($is_having_superordinate)
                <div class="col-md-12 columns f-none mt-30 mb-30">
                    <a class="btn btn-primary font-semibold s-16 pz-20 r-10 w-150px mr-3" data-toggle="modal" data-target="#schedule">
                        Set Schedule
                    </a>
                </div>
                <div class="animated col-md-12 s-16">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="s-14 text-main mb-10">
                                <strong>Schedule ({{ count($me->getScheduleSchedule())}})</strong>
                            </div>
                            <ul class="list-unstyled list-white list-r-10 list-link">
                                @if (count($my_schedules) > 0)
                                    @foreach ($my_schedules as $scd)
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#user-schedule-{{ $scd->getId() }}">
                                            Scheduler: <strong>{{ $scd->getSchedulerEmployee->getName() }}</strong><br>
                                            Scheduled: <strong>{{ $scd->getScheduledEmployee->getName() }}</strong><br>
                                            Proposed time: <em>{{ $scd->getFormattedDate() }}</em><br>
                                            &nbsp;<br>
                                            <span class="s-12">Created at: {{ $scd->getSubmitDate() }}</span>
                                            <span class="hv-review"><i>+ Review</i></span>
                                        </a>
                                        <a href="#" onclick="javascript:removeSchedule({{ $scd->getId() }});">Remove</a>
                                        <!-- POPUP SCHEDULE -->
                                        <div class="modal fade" id="user-schedule-{{ $scd->getId() }}">
                                            <div class="modal-dialog modal-lg dis-flex align-center height-100p">
                                                <form method="post" action="/em/kpi/schedule/review"  enctype="multipart/form-data" class="col-xs-12">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="schedule_id" value="{{ $scd->getId() }}">
                                                    <div class="modal-content b-0 r-10">
                                                        <a href="#" data-dismiss="modal" aria-label="Close" class="hide-modals"><i class="fas fa-times"></i></a>
                                                        <div class="modal-header mb-10">
                                                            <h6 class="modal-title">Add Review</h6>
                                                        </div>
                                                        <div class="d-flex align-center mb-30 m-flex-wrap">
                                                            <div class="pb-15 wd-fl-end">
                                                                <div class="avatar avatar-md mt-1 w-100px">
                                                                    <img src="{!! $me->photo() !!}" alt="User Image" class="r-fl">
                                                                </div>
                                                            </div>
                                                            <div class="wd-fl-dynamic pl-25 m-pl-0">
                                                                <div class="s-16 text-black font-bold">{{ $me->getName() }} - {{ $me->getNIK() }} - {{ $scd->getFormattedDate() }}</div>
                                                                <div class="s-14">{{ $me->getTitle() }}</div>
                                                                <div class="clearfix b-b pb-10 mb-10"></div>
                                                                <div class="s-14 chat-meta text-whitesmoke">
                                                                    {{ $scd->getSubmitDate() }}
                                                                </div>
                                                                <div class="s-16 font-bold text-black">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-body no-p no-b">
                                                            <div class="row">
                                                                <div class="form-group col-md-12 col-xs-12">
                                                                    <div class="text-main s-14 font-semibold mb-10">Review</div>
                                                                    <textarea class="form-control form-control-lg" placeholder="Type here.." name="review" id="" cols="30" rows="7" required></textarea>
                                                                </div>
                                                                <div class="form-group col-md-12 col-xs-12">
                                                                    <div class="file-upload pt-b-10 col-md-6 col-xs-12 border">
                                                                    <div class="file-select d-flex s-14">
                                                                            <div class="wd-fl-dynamic file-select-name">
                                                                                <i class="pr-10 fas fa-download"></i> 
                                                                                <span>No file chosen...</span>
                                                                            </div> 
                                                                            <div class="btn btn-outline-primary wd-fl-end text-main s-16 font-bold">Browse</div>
                                                                            <input type="file" class="upload-file" name="upload_file[]" multiple required />
                                                                    </div>
                                                                    </div>
                                                                    <div class="col-md-12 col-xs-12">
                                                                        <spa class="s-12"n>File extensions: <strong>jpg, png, pdf, doc, docx, xls, xlsx, ppt, pptx</strong></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10">
                                                                Send
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                @else
                                    <li>&nbsp;</li>
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="s-14 text-main mb-10">
                                <strong>Waiting Approval ({{ count($me->getScheduleApproval())}})</strong>
                            </div>
                            <ul class="list-unstyled list-white list-r-10 list-link">
                            @if (count($my_waiting_approvals) > 0)
                                @foreach ($my_waiting_approvals as $scd)
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#waiting-approval-{{ $scd->getId() }}">
                                        Scheduler: <strong>{{ $scd->getSchedulerEmployee->getName() }}</strong><br>
                                        Scheduled: <strong>{{ $scd->getScheduledEmployee->getName() }}</strong><br>
                                        Proposed time: <em>{{ $scd->getFormattedDate() }}</em><br>
                                        &nbsp;<br>
                                        <span class="s-12">Created at: {{ $scd->getSubmitDate() }}</span>

                                        <span class="hv-review"><i>+ Review</i></span>
                                    </a>
                                    <a href="#" onclick="javascript:removeSchedule({{ $scd->getId() }});">Remove</a>
                                    <!-- POPUP APPROVAL -->
                                    <div class="modal fade" id="waiting-approval-{{ $scd->getId() }}">
                                        <div class="modal-dialog modal-lg dis-flex align-center">
                                            <form method="post" action="{{ url('/em/kpi/schedule/approval') }}" enctype="multipart/form-data" class="col-xs-12">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="schedule_id" value="{{ $scd->getId() }}">
                                                <div class="modal-content b-0 r-10">
                                                    <div class="modal-header mb-10">
                                                        <h6 class="modal-title">Waiting Approval</h6>
                                                        <a href="#" data-dismiss="modal" aria-label="Close" class="hide-modals"><i class="fas fa-times"></i></a>
                                                    </div>
                                                    <div class="d-flex align-center mb-30">
                                                        <div class="pb-15 wd-fl-end">
                                                            <div class="avatar avatar-md mt-1 w-100px">
                                                                <img src="{!! $scd->getSchedulerEmployee->photo() !!}" alt="User Image" class="r-fl">
                                                            </div>
                                                        </div>
                                                        <div class="wd-fl-dynamic pl-25">
                                                            <div class="s-16 text-black font-bold">{{ $scd->getSchedulerEmployee->getName() }} - {{ $scd->getSchedulerEmployee->getNIK() }} - {{ $scd->getFormattedDate() }}</div>
                                                            <div class="s-14">{{ $scd->getSchedulerEmployee->getTitle() }}</div>
                                                            <div class="clearfix b-b pb-10 mb-10"></div>
                                                            <div class="s-14 chat-meta text-whitesmoke">
                                                                {{ $scd->getSubmitDate() }}
                                                            </div>
                                                            <div class="s-16 font-bold text-black">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body no-p no-b s-16">
                                                        <div class="row">
                                                            <div class="form-group col-md-12 col-xs-12 mb-20">
                                                                <div class="text-main s-14 font-semibold mb-10">Review {{ $scd->getSchedulerEmployee->getName() }}</div>
                                                                <p>{!! $scd->getScheduledContent() !!}</p>
                                                            </div>
                                                            <div class="form-group col-md-12 col-xs-12 mb-20">
                                                                <div class="text-main s-14 font-semibold mb-10">Review {{ $scd->getScheduledEmployee->getName() }}</div>
                                                                @if($scd->getScheduledEmployee->getName() != $me->getName()) 
                                                                {{ $scd->getApprovalContent() }}
                                                                @else
                                                                <textarea class="form-control form-control-lg" placeholder="Type here.." name="review" id="" cols="30" rows="7">{{ $scd->getApprovalContent() }}</textarea>
                                                                @endif
                                                            </div>
                                                            <div class="form-group col-md-12 col-xs-12 mb-30">
                                                            @foreach($scd->getImage as $image)
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="margin-top: 20px;">
                                                                            {{-- @if (public_path('uploads/' . $image->getPathImage())) --}}
                                                                                {{-- @if(@is_array(getimagesize(url('uploads/' . $image->getPathImage())))) --}}
                                                                                {{-- @if (exif_imagetype(url('uploads/' . $image->getPathImage()))) --}}
                                                                                    <!-- <a href="#" class="b-b s-16"><img src="{{ url('uploads/' . $image->getPathImage() )}}"></a> -->
                                                                                {{-- @else --}}
                                                                                    <a target="_blank" href="{{ url('uploads/' . $image->getPathImage() )}}" class="b-b s-16"><i class="far fa-file-alt fa-3x"></i></a>
                                                                                {{-- @endif --}}
                                                                            {{-- @else --}}
                                                                                <!-- <span class="s-14"><em>The file {{ $image->getPathImage() }} is missing.</em></span> -->
                                                                            {{-- @endif --}}

                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                                <div style="margin-top: 50px;">
                                                                    <div class="file-upload pt-b-10 col-md-6 col-xs-12 border">
                                                                    <div class="file-select d-flex s-14">
                                                                            <div class="wd-fl-dynamic file-select-name">
                                                                                <i class="pr-10 fas fa-download"></i> 
                                                                                <span>No file chosen...</span>
                                                                            </div> 
                                                                            <div class="btn btn-outline-primary wd-fl-end text-main s-16 font-bold">Browse</div>
                                                                            <input type="file" class="upload-file" name="upload_file[]" multiple/>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12 col-xs-12">
                                                                <p>
                                                                    <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio minus repellat assumenda, praesentium quibusdam eum delectus soluta sunt, perspiciatis voluptatum! Tempore nemo repellat totam, aperiam, quos assumenda amet nisi quae! -->
                                                                </p>
                                                            </div>
                                                            <div class="form-group col-md-12 col-xs-12 mb-30">
                                                                <div class="border p-15">
                                                                    <div class="s-16 text-black font-bold text-capitalize">{{ $scd->getScheduledEmployee->getName() }} - {{ $scd->getScheduledEmployee->getNIK() }}</div>
                                                                    <div class="s-14">{{ $scd->getScheduledEmployee->getTitle() }}</div>
                                                                    <div class="checkboxCustom mt-15">
                                                                        <input type="checkbox" id="check-3-{{ $scd->id }}" name="is_approval_scheduled" @if($scd->is_approval_scheduled == 1) checked @endif @if($scd->getScheduledEmployee->getName() != $me->getName())  onclick="return false" @endif/>
                                                                        <label for="check-3-{{ $scd->id }}"><i>Dengan ini saya, <strong>{{ $scd->getScheduledEmployee->getName() }}</strong>, menyatakan bahwa apa yang saya isi di form ini adalah benar.</i></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12 col-xs-12 mb-30">
                                                                <div class="border p-15">
                                                                    <div class="s-16 text-black font-bold text-capitalize">{{ $scd->getSchedulerEmployee->getName() }} - {{ $scd->getSchedulerEmployee->getNIK() }}</div>
                                                                    <div class="s-14">{{ $scd->getSchedulerEmployee->getTitle() }}</div>
                                                                    <div class="checkboxCustom mt-15">
                                                                        <input type="checkbox" id="check-4-{{ $scd->id }}" name="is_approval_scheduler" @if($scd->is_approval_scheduler == 1) checked @endif @if($scd->getSchedulerEmployee->getName() != $me->getName())  onclick="return false" @endif/>
                                                                        <label for="check-4-{{ $scd->id }}"><i>Dengan ini saya, <strong>{{ $scd->getSchedulerEmployee->getName() }}</strong>, menyatakan bahwa apa yang saya isi di form ini adalah benar.</i></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10">
                                                            Send
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            @endif
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="s-14 text-main mb-10">
                                <strong>Completed ({{ count($me->getScheduleComplete())}})</strong>
                            </div>
                            <ul class="list-unstyled list-white list-r-10">
                            @if (count($my_completed_review) > 0)
                                @foreach ($me->getScheduleComplete() as $scheduleComplete)
                                <li>
                                    <a href="" data-toggle="modal" data-target="#completed-{{ $scheduleComplete->getId() }}">
                                        Scheduler: <strong>{{ $scheduleComplete->getSchedulerEmployee->getName() }}</strong><br>
                                        Scheduled: <strong>{{ $scheduleComplete->getScheduledEmployee->getName() }}</strong><br>
                                        Proposed time: <em>{{ $scheduleComplete->getFormattedDate() }}</em><br>
                                        &nbsp;<br>
                                        <span class="s-12">Created at: {{ $scheduleComplete->getSubmitDate() }}</span>
                                    </a>
                                </li>
                                    <!-- POPUP -->

                                    <div class="modal fade" id="completed-{{ $scheduleComplete->getId() }}">
                                        <div class="modal-dialog modal-lg">

                                                <div class="modal-content b-0 r-10">
                                                    <div class="modal-header mb-10">
                                                        <h6 class="modal-title">Completed</h6>
                                                        <button data-dismiss="modal" class="close" style="padding: 0px 8px;">×</button>
                                                    </div>
                                                    <div class="d-flex align-center mb-30">
                                                        <div class="pb-15 wd-fl-end">
                                                            <div class="avatar avatar-md mt-1 w-100px">
                                                                <img src="{!! $scheduleComplete->getSchedulerEmployee->photo() !!}" alt="User Image" class="r-fl">
                                                            </div>
                                                        </div>
                                                        <div class="wd-fl-dynamic pl-25">
                                                            <div class="s-16 text-black font-bold">{{ $scheduleComplete->getSchedulerEmployee->getName() }} - {{ $scheduleComplete->getSchedulerEmployee->getNIK() }} - {{ $scheduleComplete->getFormattedDate() }}</div>
                                                            <div class="s-14">{{ $me->getTitle() }}</div>
                                                            <div class="clearfix b-b pb-10 mb-10"></div>
                                                            <div class="s-14 chat-meta text-whitesmoke">
                                                                {{ $scheduleComplete->getSubmitDate() }}
                                                            </div>
                                                            <div class="s-16 font-bold text-black">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body no-p no-b s-16">
                                                        <div class="row">
                                                            <div class="form-group col-md-12 col-xs-12 mb-20">
                                                                <div class="text-main s-14 font-semibold mb-10">Review {{ $scheduleComplete->getSchedulerEmployee->getName() }}</div>
                                                                <p>{{ $scheduleComplete->getScheduledContent() }}</p>
                                                            </div>
                                                            <div class="form-group col-md-12 col-xs-12 mb-20">
                                                                <div class="text-main s-14 font-semibold mb-10">Review {{ $scheduleComplete->getScheduledEmployee->getName() }}</div>
                                                                <p>{{ $scheduleComplete->getApprovalContent() }}</p>
                                                            </div>
                                                            <div class="form-group col-md-12 col-xs-12 mb-30">
                                                                @foreach($scheduleComplete->getImage as $image)

                                                                    <div class="row">
                                                                        <div class="col-md-12" style="margin-top: 20px;">
                                                                            {{-- @if (public_path('uploads/' . $image->getPathImage())) --}}
                                                                                {{-- @if(@is_array(getimagesize(url('uploads/' . $image->getPathImage())))) --}}
                                                                                {{-- @if (exif_imagetype(url('uploads/' . $image->getPathImage()))) --}}
                                                                                    <!-- <a href="#" class="b-b s-16"><img src="{{ url('uploads/' . $image->getPathImage() )}}"></a> -->
                                                                                {{-- @else --}}
                                                                                    <a target="_blank" href="{{ url('uploads/' . $image->getPathImage() )}}" class="b-b s-16"><i class="far fa-file-alt fa-3x"></i></a>
                                                                                {{-- @endif --}}
                                                                            {{-- @else --}}
                                                                                <!-- <span class="s-14"><em>The file {{ $image->getPathImage() }} is missing.</em></span> -->
                                                                            {{-- @endif --}}
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                                
                                                            </div>
                                                            <div class="form-group col-md-12 col-xs-12">
                                                                <p>
                                                                    <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio minus repellat assumenda, praesentium quibusdam eum delectus soluta sunt, perspiciatis voluptatum! Tempore nemo repellat totam, aperiam, quos assumenda amet nisi quae! -->
                                                                </p>
                                                            </div>
                                                            <div class="form-group col-md-12 col-xs-12 mb-30">
                                                                <div class="border p-15">
                                                                    <div class="s-16 text-black font-bold text-capitalize">{{ $scheduleComplete->getScheduledEmployee->getName() }} - {{ $scheduleComplete->getScheduledEmployee->getNIK() }}</div>
                                                                    <div class="s-14">{{ $scheduleComplete->getScheduledEmployee->getTitle() }}</div>
                                                                    <div class="checkboxCustom mt-15">
                                                                        <input type="checkbox" id="check-1-{{ $scheduleComplete->id }}" name="is_approval_scheduled" @if($scheduleComplete->is_approval_scheduled == 1) checked @endif disabled/>
                                                                        <label for="check-1-{{ $scheduleComplete->id }}"><i>Dengan ini saya, <strong>{{ $scheduleComplete->getScheduledEmployee->getName() }}</strong>, menyatakan bahwa apa yang saya isi di form ini adalah benar.</i></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12 col-xs-12 mb-30">
                                                                <div class="border p-15">
                                                                    <div class="s-16 text-black font-bold text-capitalize">{{ $scheduleComplete->getSchedulerEmployee->getName() }} - {{ $scheduleComplete->getSchedulerEmployee->getNIK() }}</div>
                                                                    <div class="s-14">{{ $scheduleComplete->getSchedulerEmployee->getTitle() }}</div>
                                                                    <div class="checkboxCustom mt-15">
                                                                        <input type="checkbox" id="check-2-{{ $scheduleComplete->id }}" name="is_approval_scheduler" @if($scheduleComplete->is_approval_scheduler == 1) checked @endif disabled/>
                                                                        <label for="check-2-{{ $scheduleComplete->id }}"><i>Dengan ini saya, <strong>{{ $scheduleComplete->getSchedulerEmployee->getName() }}</strong>, menyatakan bahwa apa yang saya isi di form ini adalah benar.</i></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10" type="button" data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>

                                        </div>
                                    </div>
                                    <!-- POPUP  -->
                                @endforeach
                            @endif
                            </ul>
                        </div>
                    </div>
                </div>
            @else
                <div style="padding-top: 20px; padding-left: 20px;">
                    <strong><em>You don't have any superordinate.</em></strong>
                </div>
            @endif
        </div>
        <!-- END MAIN -->
    </div>

 <div class="modal fade s-16" id="schedule">
    <div class="modal-dialog modal-md dis-flex align-center height-100p">
        <form id="form_schedule" class="col-xs-12">
            {{ csrf_field() }}
            <div class="modal-content b-0 r-10">
                <div class="modal-header mb-10">
                    <h6 class="modal-title">Set Review Schedule</h6>
                    <button data-dismiss="modal" class="close" style="padding: 0px 8px;">×</button>
                </div>
                <div class="modal-body no-p no-b">
                    <div class="row">
                        <div class="form-group col-md-6">
                            Scheduler
                        </div>
                        <div class="form-group col-md-6">
                            <select class="custom-select select2" name="scheduler_id">
                                <option value="{{ $me->getId() }}">{{ $me->getName() }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            Scheduled
                        </div>
                        <div class="form-group col-md-6">
                            <select class="custom-select select2" name="scheduled_id">
                                @foreach($me->getScheduledList() as $scheduled)
                                <option value="{{ $scheduled['id'] }}">{{ ucwords(strtolower($scheduled['name'])) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            Year
                        </div>
                        <div class="form-group col-md-6">
                            <select class="custom-select select2" name="year" required id="years">
                                <option value="">Year</option>
                                <?php $currentYear = intval(date('Y')); ?>
                                @for ($year = $currentYear - 1; $year <= $currentYear + 1; $year++)
                                <option value="{{ $year }}" @if($year == $currentYear) selected @endif>{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            Month
                        </div>
                        <div class="form-group col-md-6">
                            <select class="custom-select select2" name="month" id="month" required>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            Date
                        </div>
                        <div class="form-group col-md-6">
                            <select class="custom-select select2" name="date" id="date" required>
								@for ($i = 1; $i <= 31; $i++)
									<option value="{{ $i }}">{{ $i }}</option>
								@endfor
                            </select>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="submitSchedule()" class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="ex1">
    <div class="modal-dialog modal-md dis-flex align-center height-100p">
            <div class="modal-content b-0 r-10" style="width:unset">
                <div class="modal-header mb-10">
                    <h6 class="modal-title">Data telah tersimpan</h6>
                    <button data-dismiss="modal" class="close" style="padding: 0px 8px;">×</button>
                </div>
                <div class="modal-body no-p no-b">
                    <div class="row"></div>
                </div>
                <div class="modal-footer text-center" style="display: unset">
                    <button class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10" onclick="location.reload();">
                        Ok
                    </button>
                </div>
            </div>
    </div>
</div>
<script src="{{ url('skin/js/app.js') }}"></script>
<script type="text/javascript">
        $('.subnav-kpi li').each(function(){
            var $bpk = $(this);
            var wsr = $(window).width();
            if($bpk.hasClass("active")){
                if (wsr < 1025 ) {
                    var leftPos = $('.subnav-kpi li.active').offset().left - $('.nav-material').offset().left + $('.nav-material').scrollLeft();
                    $('.nav-material').animate({
                        scrollLeft: leftPos
                    }, 800);
                }
            }
        });
        function submitSchedule() {
            var form = $('#form_schedule');
            if(! form.valid()) return false;
            var data = $('#form_schedule').serialize();  
            $.post(
                '/em/kpi/schedule/add', data,
                function(response){
                    $('#schedule').hide();
                    $('#ex1').modal('toggle');
                }
            ).fail(function(e){
                console.log('err');
            });
        }

        function removeSchedule(scheduleId) {
            if (confirm('Are you sure you want to remove this schedule? This can\'t be undone.')) {
                $.post('/em/kpi/schedule/remove', {schedule_id: scheduleId, _token: '{{ csrf_token() }}'}, function(data) {
                    alert(data.message);
                    if (data.code == 200) {
                        window.location.reload(true);
                    }
                });
            }
        }

        $('#years').on('change', function(){
            $.get( "/em/getkpi/user", { year: $('#years').val(), employee_id: {{ $me->getId() }} }, function(result) {
                $.each(result, function (i, item) {
                    
                    $('#employee_kpi_id').append($('<option>', { 
                        value: item.id,
                        text : item.name
                    }));

                });
            });
        });
        
    </script>
<script>
    function uploadFIle($cl) {
        $cl.each(function(){
            var $this = $(this);
            $this.bind('change', function () {
                var filename = $this.val();
                if (/^\s*$/.test(filename)) {
                    $(this).parents('.file-upload').removeClass('active');
                    $(this).parents('.file-upload').find('.file-select-name span').text("No file chosen..."); 
                }
                else {
                    $(this).parents('.file-upload').addClass('active');
                    $(this).parents('.file-upload').find('.file-select-name span').text(filename.replace("C:\\fakepath\\", "")); 
                }
            });

        });
    }
    var uplda = $('.upload-file');
    uploadFIle(uplda);
</script>
@endsection

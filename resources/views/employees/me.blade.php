@extends('app')

@section('sidebar')
@include('templates.employeesidebar')
@endsection

@section('content')
    <div class="page has-sidebar-left height-full">
        <div class="container-fluid animatedParent">
            <div class="animated fadeInUpShort col-md-12 f-none">

                <div class="row no-gutters">
                    <div class="col-md-4 sticky mt-30">
                        <!-- MAIN SIDE LEFT PROFILE -->
                        <div class="white r-5 p-30 pb-0 mb-30">
                            <div class="pb-15 d-flex align-center">
                                <div class="avatar avatar-md mt-1 w-100px">
                                    <img src="{!! $me->photo() !!}" alt="User Image" class="r-fl" id="pic_profile">
                                </div>
                                <div class="pl-20 s-16 font-light">
                                    <input type="file" name="image" style="display: none" id="image_id" accept="image/jpg">
                                    <a href="javascript:changePic();"><i class="fas fa-pen s-14 pr-10"></i><i class="change-pic_caption">Change Picture (*.jpg)</i></a>
                                    <br>
                                    <span style="font-size: 14px;">(Max. 1 MB)</span>
                                </div>
                            </div>
                            <div class="pb-15 b-b">
                                <div class="s-16 text-main">
                                    <strong>{{ $me->getName() }}</strong>
                                </div>
                                <div class="s-14">{{ $me->getTitle() }}</div>
                                <div class="text-whitesmoke s-14"><i>{{ $me->levels->getLevel() }}</i></div>
                                <div class="s-14"><i class="far fa-envelope mr-7 text-main"></i><i>{{ $me->getPersonalEmail() }}</i></div>
                            </div>
                            <div class="pb-15 mt-15">
                                <div class="d-flex align-start flex-wrap">
                                    <div class="wd-fl-6 mb-20">
                                        <div class="text-main s-14 font-semibold">NIK</div>
                                        <div class="text-uppercase s-14">{{ $me->getNIK() }}</div>
                                    </div>
                                    <div class="wd-fl-6 mb-20">
                                        <div class="text-main s-14 font-semibold">Status</div>
                                        <div class="s-14">{{ $me->getStatus() }}</div>
                                    </div>
                                    <div class="wd-fl-6 mb-20">
                                        <div class="text-main s-14 font-semibold">Department</div>
                                        <div class="text-uppercase s-14">{{ $me->costcenter->getName() }}</div>
                                    </div>
                                    <div class="wd-fl-6 mb-20">
                                        <div class="text-main s-14 font-semibold">Join Date</div>
                                        <div class="s-14">{{ $me->getJoinDate() }}</div>
                                    </div>
                                    <div class="wd-fl-6 mb-20">
                                        <div class="text-main s-14 font-semibold">End of Contract</div>
                                        <div class="s-14">{{ $me->getEndContract() }}</div>
                                    </div>
                                    <div class="wd-fl-6 mb-20">
                                        <div class="text-main s-14 font-semibold">Unit</div>
                                        <div class="s-14">{{ $me->division->getName() }}</div>
                                    </div>
                                    <div class="wd-fl-6 mb-20">
                                        <div class="text-main s-14 font-semibold">Location</div>
                                        <div class="s-14">{{ $me->location->getName() }}</div>
                                    </div>
                                    <div class="wd-fl-12 mb-20">
                                        <div class="text-main s-14 font-semibold">Superior</div>
                                        <div class="s-14">{{ $super_ordinate ? $super_ordinate->getName() : '-' }}</div>
                                    </div>
                                    <div class="wd-fl-12 mb-20">
                                        <div class="text-main s-14 font-semibold">Subordinate</div>
                                        <div class="s-14">{{ $me->getSubordinateCount() }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END MAIN SIDE LEFT PROFILE -->
                    </div>
                    <div class="col-md-8">
                        <div class="ml-4">
                            <div class="col-sm-12 f-none mt-30 mb-50">
                                <h3 class="mb-15 thumb-Title">Organization Hierarchy</h3>
                                <ul class="list-timeline">
                                    <li>
                                        <div class="text-main s-14 mb-10 font-semibold">Superior</div>
                                        <div class="s-16 mb-5">{{ $super_ordinate ? $super_ordinate->getName() : '-' }}</div>
                                    </li>
                                    <li>
                                        <div class="text-main s-14 mb-10 font-semibold">You</div>
                                        <div class="s-16 mb-5"><strong>{{ $me->getName() }}</strong></div>
                                    </li>
                                    <li>
                                        <div class="text-main s-14 mb-10 font-semibold">Subordinate</div>
                                        @if (count($subordinate) == 0)
                                            -
                                        @else
                                            @foreach ($subordinate as $sub)
                                                <div class="s-16 mb-5">{{ ucwords(strtolower($sub->getName())) }}</div>
                                            @endforeach
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="ex1">
    <div class="modal-dialog modal-md dis-flex align-center height-100p">
            <div class="modal-content b-0 r-10" style="width:unset">
                <div class="modal-header mb-10">
                    <h6 class="modal-title"><span class="message"></span></h6>
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
        function changePic() {
            $('#image_id').click();
        }
        
        $(document).ready(function (e) {
            $("#image_id").on('change',(function(e) {
                var fileInput = document.getElementById('image_id');
                var file = fileInput.files[0];
                var formData = new FormData();
                formData.append('image', file);
                var output = document.getElementById('pic_profile');
                output.src = URL.createObjectURL(file);
                $.ajax({
                    url: "ajaxupload",
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data) {

                        if(data.code != 200) {
                            // invalid file format.
                            $('.message').html('Invalid File Type!');
                        } else {
                            // view uploaded file.
                            $("#preview").html(data).fadeIn();
                            $('.message').html(data.message);
                        }
                        $('#ex1').modal('toggle');
                    },
                    error: function(e) {
                        $("#err").html(e).fadeIn();
                    }
                });
            }));
        });
    </script>
    <style type="text/css">
        .change-pic_caption {
            font-size: 14px;
        }
    </style>
@endsection
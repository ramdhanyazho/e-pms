@extends('app')

@section('sidebar')
@include('templates.sidebar')
@endsection

@section('content')
    <div class="page has-sidebar-left height-full">

        <div class="container-fluid animatedParent">
            <div class="animated fadeInUpShort col-md-12 f-none">
                <a href="#" class="btn btn-primary btn-lg mt-10 light-blue" data-toggle="modal" data-target="#add_new_faq">Add New FAQ</a>
                <a class="btn btn-primary btn-lg mt-10 light-blue btn-upload" id="file_id">Upload Guide Book</a>
                <a class="btn btn-primary btn-lg mt-10 light-blue btn-upload" id="file_video_id">Upload Video (.mp4, max. 50MB)</a>
                <input type="file" name="file" id="file_upload" style="visibility: hidden" accept="application/pdf">
                <input type="file" name="file_video" id="file_video_upload" style="visibility: hidden" accept="video/*">
                <ul class="no-list slide-acc slideFAQ mt-30">
                    @foreach ($faqs as $faq)
                        <li>
                            <div class="titleHeadline" data-acc="click">
                                <span id="title-{{ $faq->getId() }}">{{ $faq->getTitle() }}</span>
                            </div>
                            <div class="detailHeadline" data-detail="description">
                                <pre id="desc-{{ $faq->getId() }}">{!! $faq->getDescription() !!}</pre>
                                <div class="action mt-15">
                                    <a href="javascript:editFAQ({{ $faq->getId() }})" class="text-main mr-5"><i>Edit</i></a>
                                    <a href="javascript:removeFAQ({{ $faq->getId() }})" class="text-red"><i>X Remove</i></a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
        
    </div>

<!-- POPUP ADD NEW FAQ -->
<div class="modal fade s-16" id="add_new_faq">
    <div class="modal-dialog modal-md dis-flex align-center height-100p">
        <form id="frm_add_new_faq" class="col-xs-12">
            {{ csrf_field() }}
            <div class="modal-content b-0 r-10" style="border : solid 1px #000">
                <div class="modal-header mb-10">
                    <h6 class="modal-title">Add New FAQ</h6>
                    <button data-dismiss="modal" class="close" style="padding: 0px 8px;">×</button>
                </div>
                <div class="modal-body no-p no-b">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="text-main s-14 font-semibold mb-10">Question</div>
                            <textarea class="form-control form-control-lg" placeholder="Type here.." name="question" id="id_question" cols="30" rows="4" required></textarea>
                        </div>                        
                        <div class="form-group col-md-12">
                            <div class="text-main s-14 font-semibold mb-10">Answer</div>
                            <textarea class="form-control form-control-lg" placeholder="Type here.." name="answer" id="id_answer" cols="30" rows="6" required></textarea>
                        </div>                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="submitNewFAQ()" class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- POPUP EDIT FAQ -->
<div class="modal fade s-16" id="edit_faq">
    <div class="modal-dialog modal-md dis-flex align-center height-100p">
        <form id="frm_edit_faq" class="col-xs-12">
            {{ csrf_field() }}
            <div class="modal-content b-0 r-10" style="border : solid 1px #000">
                <div class="modal-header mb-10">
                    <h6 class="modal-title">Edit FAQ</h6>
                    <button data-dismiss="modal" class="close" style="padding: 0px 8px;">×</button>
                </div>
                <div class="modal-body no-p no-b">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="text-main s-14 font-semibold mb-10">Question</div>
                            <textarea class="form-control form-control-lg" placeholder="Type here.." name="question" id="id_edited_question" cols="30" rows="4" required></textarea>
                        </div>                        
                        <div class="form-group col-md-12">
                            <div class="text-main s-14 font-semibold mb-10">Answer</div>
                            <textarea class="form-control form-control-lg" placeholder="Type here.." name="answer" id="id_edited_answer" cols="30" rows="6" required></textarea>
                        </div>                        
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="faq_id" id="faq_edited_id" value="">
                    <button type="button" onclick="submitEditFAQ()" class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10">
                        Update
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
                <h6 class="modal-title message">Data telah tersimpan</h6>
                <button data-dismiss="modal" class="close" style="padding: 0px 8px;">×</button>
            </div>
            <div class="modal-body no-p no-b">
                <div class="row"></div>
            </div>
            <div class="modal-footer text-center" style="display: unset">
                <button class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10" onclick="location.reload();">
                    OK
                </button>
            </div>
        </div>
    </div>
</div>


<script src="{{ url('skin/js/app.js') }}"></script>

<script>
    function submitNewFAQ() {
        var form = $('#frm_add_new_faq');
        if(! form.valid()) return false;
        var data = $('#frm_add_new_faq').serialize();  
        $.post(
            '/od/faq/add-new', data,
            function(response){
                $('#add_new_faq').hide();
                $('#ex1').modal('toggle');
                $("#id_question").val('');
                $("#id_answer").val('');
            }
        ).fail(function(e){
            console.log('err');
        });
    }

    function editFAQ(id) {
        var title = $("#title-" + id).html();
        var description = $("#desc-" + id).html();

        $("#id_edited_question").val(title);
        $("#id_edited_answer").val(description);
        $("#faq_edited_id").val(id);

        $("#edit_faq").modal('toggle');
    }

    function submitEditFAQ() {
        var form = $('#frm_edit_faq');
        if(! form.valid()) return false;
        var data = $('#frm_edit_faq').serialize();  
        $.post(
            '/od/faq/update', data,
            function(response){
                $('#edit_faq').hide();
                $('#ex1').modal('toggle');
                $("#id_edited_question").val('');
                $("#id_edited_answer").val('');
            }
        ).fail(function(e){
            console.log('err');
        });

    }

    function removeFAQ(id) {
        if (confirm('Do you really want to remove this FAQ?')) {
            $.ajax({
                method: "DELETE",
                url: '/od/faq/' + id + '/delete',
                data: "_token={{ csrf_token() }}",
                dataType: "json",
                success: function(data) {
                    alert('The record has been deleted.');
                    window.location.reload();
                }
            });
        }
    }

    $(document).ready(function (e) {

        $('#file_id').on('click', function() {
            $('#file_upload').click();
        });

        $('#file_video_id').on('click', function() {
            $('#file_video_upload').click();
        });

        $("#file_upload").on('change',(function(e) {
            var fileInput = document.getElementById('file_upload');
            var file = fileInput.files[0];
            var formData = new FormData();
            formData.append('guide_book', file);
            $.ajax({
                url: "/od/faq/upload",
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
                        $('.message').html(data.message);
                    }
                    $('#ex1').modal('toggle');
                },
                error: function(e) {
                    $("#err").html(e).fadeIn();
                }
            });
        }));

        $("#file_video_upload").on('change',(function(e) {
            var fileInput = document.getElementById('file_video_upload');
            var file = fileInput.files[0];
            var formData = new FormData();
            formData.append('video', file);
            $.ajax({
                url: "/od/faq/upload_video",
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

@endsection
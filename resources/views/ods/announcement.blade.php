@extends('app')

@section('sidebar')
@include('templates.sidebar')
@endsection

@section('content')
    <div class="page has-sidebar-left height-full">

        <div class="container-fluid animatedParent">
            <div class="animated fadeInUpShort col-md-12 f-none">

                <div class="row no-gutters">
                    <div class="col-md-4 sticky mt-30">
                        <!-- SEARCH ANNOUNCEMENT -->
                        <div class="col-sm-12 columns f-none mb-15">
                            <form action="" class="row">
                                <div class="input-group border r-10 mb-10 bg-whtsmoke-opacity">
                                    <input value="@if(isset($keyword)){{ $keyword }}@endif"  type="text" name="q" class="s-18 form-control bg-transparent no-b p-25" placeholder="Search Announcement" required />
                                    <button type="submit" class="ic-search fa fa-search search"> </button>
                                </div>
                            </form>
                            @if(isset($keyword)) <a href="{{ url('od/announcement') }}">clear filter</a> @endif
                        </div>
                        <!-- END SEARCH ANNOUNCEMENT -->
                    </div>
                    <div class="col-md-8 mt-30">
                        <!-- MAIN SIDE RIGHT -->
                        <div class="ml-4">
                            <a href="#formAddAnnouncement" class="f-right mb-30 btn btn-primary font-semibold s-16 pz-20 r-10 2-150px hide-phone" data-toggle="modal" data-target="#formAddAnnouncement">
                                <i class="fas fa-plus"></i> New
                            </a>
                            <div class="clearfix"></div>
                        </div>
                        <!-- END MAIN SIDE RIGHT -->
                    </div>
                </div>

            </div>
			<div>
				<div class="row my-3">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="nav table table-tab table-hover table-white table-hover-link" role="tablist">
                                <thead>
                                    <tr class="no-b">
                                        <th>No.</th>
                                        <th>Date</th>
                                        <th>Sender</th>
                                        <th>Subject</th>
										<th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $count = 0; ?>
                                    @foreach ($announcements as $ann)
                                        <?php $count++; ?>
										@if (!$ann->isActive())
											<tr style="background-color: #{{ env('ANNOUNCEMENT_INACTIVE_BACKGROUND_COLOR') }};">
										@else
											<tr>
										@endif
											<td>{{ $count }}</td>
											<td>{{ $ann->getTimeSent() }}</td>
											<td>{{ $ann->getFrom->getName() }}</td>
											<td>{{ $ann->getTitle() }}</td>
											<td class="status">{{ ($ann->isActive() ? 'Active': 'Not Active') }}</td>
											<td style="text-align: center;">
												@if ($ann->isActive())
													<a href="javascript:setAnnActive({{$ann->getId()}}, false);" class="btn btn-default">Set Inactive</a>
												@else
													<a href="javascript:setAnnActive({{$ann->getId()}}, true);" class="btn btn-default">Set Active</a>
													<br>&nbsp;<br>												
													<a href="javascript:deleteAnn({{$ann->getId()}});" class="btn btn-warning">Delete</a>
												@endif
											</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <nav class="my-3">
                    {{ $announcements->appends(request()->input())->links() }}
                </nav>				
			</div>

        </div>
        
    </div>
    <div class="modal fade" id="formAddAnnouncement" tabindex="-1" role="dialog" aria-labelledby="modalCreateMessage">
        <div class="modal-dialog modal-lg" role="document">
            <form method="post" id="annoucement_form">
                {{ csrf_field() }}
            <div class="modal-content b-0 r-10">
                <div class="modal-header mb-10">
                    <!-- // TODO: Make new announcement works -->
                    <h6 class="modal-title">Create A New Announcement</h6>
                    <button data-dismiss="modal" class="close" style="padding: 0px 8px;">×</button>
                </div>
                <div class="modal-body no-p no-b">
                        <div class="form-group mb-10 dropdown-select">
                            <div class="layer">
                                <input class="form-control form-control-lg r-0 b-0 s-16" type="text" name="to" id="to" placeholder="Recipient" required>
                                <span></span>
                            </div>
                            <div class="dropdown-list">
                                <ul>
                                    <li><a href="#">All</a></li>
                                    <li>
                                        <span>Level</span>
                                        <ul>
                                            @foreach($groups as $group)
                                            <li><a href="{{ $group->getName() }}">{{ $group->getName() }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <!-- <li>
                                        <span>Bussines Unit</span>
                                        <ul>
                                            <li><a href="#">Toyota</a></li>
                                            <li><a href="#">Honda</a></li>
                                            <li><a href="#">BMW</a></li>
                                            <li><a href="#">Lexus</a></li>
                                            <li><a href="#">Audi</a></li>
                                            <li><a href="#">Daihatsu</a></li>
                                        </ul>
                                    </li> -->
                                </ul>
                              </div>
                        </div>
                        <div class="form-group mb-10">
                            <i class="icon-subject"></i>
                            <input class="form-control form-control-lg r-0 b-0 s-16" type="text"
                                   name="title" id="title" placeholder="Subject" required>
                        </div>
                        <textarea required name="content" class="form-control r-0 b-0 p-t-40 editor" tabindex="-1" placeholder="Write Something..." rows=""
                                  data-options='{"btns":[
                                    ["viewHTML"],
                                    ["bold","italic"],
                                    ["link"],
                                    ["formatting"],
                                    ["del"],
                                    ["superscript", "subscript"],
                                    ["insertImage"],
                                    ["justifyLeft", "justifyCenter", "justifyRight", "justifyFull"],
                                    ["unorderedList", "orderedList"],
                                    ["horizontalRule"],
                                    ["fullscreen"]
                                  ]}'></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="mb-0 btn btn-primary font-semibold s-16 pz-20 r-10" onclick="submitAnnoucement()">
                        Send
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
                    <h6 class="modal-title">Annoucement telah dikirim</h6>
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
    <script>
        
        const $menu = $('.dropdown-select');
        $(document).mouseup(e => {
            if (!$menu.is(e.target) && $menu.has(e.target).length === 0) {
                $menu.removeClass('active');
            }
        });
        $('.layer span').click(function(){
            $menu.addClass('active');
        });
        $('.dropdown-list li a').click(function(e){
            e.preventDefault();
            var a = "";
            a = $(this).text();
            // alert('test');
            $('.layer input').val(a);
            $menu.removeClass('active')
        });

        function submitAnnoucement() {
            var form = $('#annoucement_form');
            if(! form.valid()) return false;
            var data = form.serialize();  
            $.post(
                '/od/announcement', data,
                function(response){
                    $('#formAddAnnouncement').hide();
                    $('#ex1').modal('toggle');
                }
            ).fail(function(e){
                console.log('err ');
            });
		}
		
		function setAnnActive(id, setStatus) {
			if (setStatus == true) {
				$.post('/od/announcement/' + id + '/active', {'_token': '{{ csrf_token() }}'}, function(data) {
					if (data.status == 200 && data.message == 'OK') {
						alert('Announcement has been activated.');
						window.location.reload();
					}
				});
			}

			if (setStatus == false) {
				$.post('/od/announcement/' + id + '/inactive', {'_token': '{{ csrf_token() }}'}, function(data) {
					if (data.status == 200 && data.message == 'OK') {
						alert('Announcement has been deactivated.');
						window.location.reload();
					}
				});
			}
		}

		function deleteAnn(id) {
			if (confirm('Are you sure you want to delete this announcement?')) {
				$.ajax({
					url: '/od/announcement/' + id + '/delete',
					type: 'DELETE',
					data: {'_token': '{{ csrf_token() }}'},
					dataType: 'json',
					success: function(data) {
						if (data.status == 200 && data.message == 'OK') {
							alert('Announcement has been deleted.');
							window.location.reload();
						}
					}
				});
			}
		}
    </script>
@endsection
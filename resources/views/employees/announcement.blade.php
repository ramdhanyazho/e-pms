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
                        <!-- SEARCH ANNOUNCEMENT -->
                        <div class="col-sm-12 columns f-none mb-15">
                            <form action="" class="row" method="get">
                                <div class="input-group border r-10 mb-10 bg-whtsmoke-opacity">
                                    <input value="@if(isset($keyword)){{ $keyword }}@endif" type="text" class="s-18 form-control bg-transparent no-b p-25" placeholder="Search Announcement" name="q" required />
                                    <button type="submit" class="ic-search fa fa-search search"> </button>
                                </div> 
                            </form>@if(isset($keyword)) <a href="{{ url('em/announcement') }}">clear filter</a> @endif
                        </div>

                        @if(count($announcements) == 0)
                            <p>No announcements for you.</p>
                        @endif
                        <!-- END SEARCH ANNOUNCEMENT -->
                        <div class="slimScroll" data-height="700">
                            <!-- MAIN SIDE LEFT PROFILE -->
                            <div class="columns">
                                <ul class="list-unstyled list-inbox nav d-block" role="tablist">
                                    <?php $count = 0; ?>
                                    @foreach ($announcements as $announcement)
                                        <?php $count++; ?>
                                        <li>
                                            <a class="inbox-content" data-toggle="tab" href="#inbox-{{ $count }}" role="tab" aria-selected="false">
                                                <div class="s-18 text-main mb-10">

                                                    <strong>{{ $announcement->getFrom->getName() }}</strong>
                                                </div>
                                                <div class="s-18">
                                                    {{ $announcement->getTitle() }}
                                                </div>
                                                <div class="s-14 chat-meta text-whitesmoke">
                                                    {{ $announcement->getTimeSent() }}
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                {{ $announcements->links() }}
                            </div>
                            <!-- END MAIN SIDE LEFT PROFILE -->
                        </div>
                    </div>
                    <div class="col-md-8 mt-30">
                        <!-- MAIN SIDE RIGHT -->
                        <div class="ml-4">
                            <!-- AREA INBOX -->
                            <div class="col-sm-12 f-none mb-50 tab-content tab-announce">
                                <?php $count = 0; ?>
                                @foreach ($announcements as $announcement)
                                    <?php $count++; ?>
                                    <div class="tab-pane fade" id="inbox-{{ $count }}" role="tabpanel">
                                        <div class="white p-40 r-10 slimScroll" data-height="700">
                                            <a href="#" class="inbox-back">Back</a>
                                            <div class="d-flex">
                                                <div class="s-18 text-main wd-fl-dynamic">
                                                    <strong>{{ $announcement->getFrom->getName() }}</strong>
                                                </div>
                                                <div class="s-14 chat-meta text-whitesmoke">
                                                    {{ $announcement->getTimeSent() }}
                                                </div>
                                            </div>
                                            <div class="s-18">
                                                {{ $announcement->getTitle() }}
                                            </div>
                                            <div class="s-18 chat-meta text-whitesmoke">
                                                to: me
                                            </div>
                                            <hr >
                                            <div class="s-18 my-3 message-content">
                                                {!! $announcement->getContents() !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- END AREA INBOX -->
                        </div>
                        <!-- END MAIN SIDE RIGHT -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('skin/js/app.js') }}"></script>
@endsection
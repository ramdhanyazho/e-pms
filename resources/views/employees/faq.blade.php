@extends('app')

@section('sidebar')
@include('templates.employeesidebar')
@endsection

@section('content')
    <div class="page has-sidebar-left height-full">

        <div class="container-fluid animatedParent">
            <div class="animated fadeInUpShort col-md-12 f-none">
			<a href="{{ url('/uploads/faq/guide-book.pdf') }}" target="_blank" class="btn btn-primary btn-lg mt-10 light-blue">Download Guide Book</a>
			<a href="{{ url('/uploads/faq/video.mp4') }}" target="_blank" class="btn btn-primary btn-lg mt-10 light-blue">Download Video</a>

                <ul class="no-list slide-acc slideFAQ mt-30">
                    @foreach ($faqs as $faq)
                        <li>
                            <div class="titleHeadline" data-acc="click">
                                <span id="title-{{ $faq->getId() }}">{{ $faq->getTitle() }}</span>
                            </div>
                            <div class="detailHeadline" data-detail="description">
                                <pre id="desc-{{ $faq->getId() }}">{!! $faq->getDescription() !!}</pre>
                            </div>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
        
    </div>

    <script src="{{ url('skin/js/app.js') }}"></script>
@endsection
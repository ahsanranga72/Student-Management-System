<!--popular courses start-->
<section class="grey_section section_gap" id="courses">
    <div class="container">
        <div class="heading">
            <h1><span>latest </span>Courses</h1>
            <p>Staying abreast of the latest trends
            </p>
        </div>
        <ul class="hover_listing row">
            @forelse($courses as $course)
                <li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd" style="height: 320px; width: 292px;">
                    <div class="img">
                        @if(auth()->check())
                            <a href="{{route('frontend.course.show', $course->id)}}" target="_blank">
                                <img src="{{ asset('storage/app/public/course/thumbnail') }}/{{ $course->thumbnail }}"
                                    style="height:100%; width:100%;"
                                    onerror="{{ asset('public/assets/new') }}/images/slider/pdf.png"
                                    alt=""></a>
                            <a class="play-btn" href="{{route('frontend.course.show', $course->id)}}" target="_blank">
                                <i class="fa fa-eye fa-3"></i>
                            </a>
                        @else
                            <a href="#" data-toggle="modal" data-target="#myModal">
                                <img src="{{ asset('storage/app/public/course/thumbnail') }}/{{ $course->thumbnail }}"
                                    style="height:100%; width:100%;"
                                    onerror="{{ asset('public/assets/new') }}/images/slider/pdf.png"
                                    alt=""></a>
                            <a class="play-btn" href="#" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-eye fa-3"></i>
                            </a>
                        @endif
                    </div>
                </li>
            @empty
                <p>please add first.</p>
            @endforelse
        </ul>
        <p class="text-center noPadd" style="margin-top: 100px;"><a
                href="{{ route('frontend.course.by-category') }}" class="btn btn-primary btn-lg"
                role="button">View all Courses</a></p>
    </div>
</section>
<!--/popular courses end-->

@extends('frontend.layouts.master')

@push('css')

@endpush

@section('content')
<section class="wrapper">
    <section class="page_head">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Courses</h2>
                    <nav id="breadcrumbs">
                        <ul>
                            <li>You are here:</li>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>Courses</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!--portfolio start-->
    <div class="container portfolio-center">
        <section class="protfolio" id="ourwork" style="padding: 72px 30px;">
            <div class="row">
                <div class="portfolioFilter">
                    <ul>
                        <li><a href="#" data-filter="*" class="current">All</a></li>
                    </ul>
                </div>
                <ul class="portfolioContainer row">
                    @forelse($courses as $course)
                        <li class="course1 col-xs-6 col-sm-4 col-md-3 col-lg-3" style="height: 320px; width: 292px;">
                            <div class="lightCon">
                                @if(auth()->check())
                                <a href="{{route('frontend.course.show', $course->id)}}"
                                    target="_blank">
                                    <span class="hoverBox">
                                        <div>
                                            <h4>{{ $course->name }}</h4>
                                        </div>
                                    </span>
                                </a>
                                <img src="{{ asset('storage/app/public/course/thumbnail') }}/{{ $course->thumbnail }}"
                                    alt="" style="height: 100%; width: 100%;">
                                @else
                                <a href="#" data-toggle="modal" data-target="#myModal">
                                    <span class="hoverBox">
                                        <div>
                                            <h4>{{ $course->name }}</h4>
                                        </div>
                                    </span>
                                </a>
                                <img src="{{ asset('storage/app/public/course/thumbnail') }}/{{ $course->thumbnail }}"
                                    alt="" style="height: 100%; width: 100%;">
                                @endif
                            </div>
                        </li>
                    @empty
                        <p>please add first.</p>
                    @endforelse
                </ul>
            </div>
        </section>
    </div>
    <!--portfolio end-->

</section>
@endsection

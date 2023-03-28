@extends('frontend.layouts.master')

@push('css')
<style>
    .section_gap{
        padding: 40px 0 0px;
    }
</style>
@endpush

@section('content')
<!-- Teachers details start-->
<section class="grey_section section_gap" id="faculties">
    <div class="container">
        <div class="heading" style="text-align: left; padding-bottom: 0; margin-bottom: 0;">
            <h1><span>WORLD CLASS </span>FACULTIES</h1>
            <p>Our internationally trained instructors comes with elite experience <br>
                in working at kitchens of star category hotels in various countries around the world.</p>
        </div>
        <ul class="hover_listing row">
            <!-- Teacher 01 details start-->
            <li class="col-xs-12 col-sm-6 col-md-4 col-lg-4 noPadd">
                <div class="img" style="height: 320px; width: 292px;"><img
                        src="{{ asset('public/assets/frontend') }}/images/teachers/6.jpg" alt=""
                        style="height:100%; width:100%;">
                    <ul class="hover-social-icons">
                        <li><a href="https://www.facebook.com/shinee.com.bd"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/shinee.com.bd/"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <h3 class="uppercase">Chef Nayeem Ashraf</h3>
                <p>CEO AND CULINARY INSTRUCTOR- SHINEE: SCHOOL OF HOSPITALITY INTEGRATED EDUCATION EPICENTER LTD.</p>
            </li>
            <!-- Teacher 01 details end-->
            <!-- Teacher 02 details start-->
            <li class="col-xs-12 col-sm-6 col-md-4 col-lg-4 noPadd">
                <div class="img" style="height: 320px; width: 292px;"><img
                        src="{{ asset('public/assets/frontend') }}/images/teachers/4.jpg" alt=""
                        style="height:100%; width:100%;">
                    <ul class="hover-social-icons">
                        <li><a href="https://www.facebook.com/shinee.com.bd"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/shinee.com.bd/"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <h3 class="uppercase">Chef Subhabrata Maitra</h3>
                <p>CULINARY INSTRUCTOR- SHINEE: SCHOOL OF HOSPITALITY INTEGRATED EDUCATION EPICENTER LTD.</p>
            </li>
            <!-- Teacher 02 details end-->
            <!-- Teacher 04 details start-->
            <li class="col-xs-12 col-sm-6 col-md-4 col-lg-4 noPadd">
                <div class="img" style="height: 320px; width: 292px;"><img
                        src="{{ asset('public/assets/frontend') }}/images/teachers/5.jpg" alt=""
                        style="height:100%; width:100%;">
                    <ul class="hover-social-icons">
                        <li><a href="https://www.facebook.com/shinee.com.bd"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/shinee.com.bd/"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <h3 class="uppercase">Chef Farhana Habib</h3>
                <p>CULINARY INSTRUCTOR- SHINEE: SCHOOL OF HOSPITALITY INTEGRATED EDUCATION EPICENTER LTD.</p>
            </li>
            <!-- Teacher 04 details end-->
            <!-- Teacher 04 details start-->
            <li class="col-xs-12 col-sm-6 col-md-4 col-lg-4 noPadd">
                <div class="img" style="height: 320px; width: 292px;"><img
                        src="{{ asset('public/assets/frontend') }}/images/teachers/7.jpeg" alt=""
                        style="height:100%; width:100%;">
                    <ul class="hover-social-icons">
                        <li><a href="https://www.facebook.com/shinee.com.bd"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/shinee.com.bd/"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <p>DIRECTOR - SHINEE: SCHOOL OF HOSPITLITY INTEGRTED EDUCATION EPICENTER LTD.</p>
            </li>
            <!-- Teacher 04 details end-->
            <!-- Teacher 04 details start-->
            <li class="col-xs-12 col-sm-6 col-md-4 col-lg-4 noPadd">
                <div class="img" style="height: 320px; width: 292px;"><img
                        src="{{ asset('public/assets/frontend') }}/images/teachers/8.jpeg" alt=""
                        style="height:100%; width:100%;">
                    <ul class="hover-social-icons">
                        <li><a href="https://www.facebook.com/shinee.com.bd"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/shinee.com.bd/"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <p>DIRECTOR - SHINEE: SCHOOL OF HOSPITLITY INTEGRTED EDUCATION EPICENTER LTD.</p>
            </li>
            <!-- Teacher 04 details end-->
            <!-- Teacher 04 details start-->
            <li class="col-xs-12 col-sm-6 col-md-4 col-lg-4 noPadd">
                <div class="img" style="height: 320px; width: 292px;"><img
                        src="{{ asset('public/assets/frontend') }}/images/teachers/9.jpeg" alt=""
                        style="height:100%; width:100%;">
                    <ul class="hover-social-icons">
                        <li><a href="https://www.facebook.com/shinee.com.bd"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/shinee.com.bd/"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <p>DIRECTOR - SHINEE: SCHOOL OF HOSPITLITY INTEGRTED EDUCATION EPICENTER LTD.</p>
            </li>
            <!-- Teacher 04 details end-->
        </ul>
    </div>
</section>
<!-- Teachers details end-->

<section class="grey_section section_gap" id="contact">
    <div class="container">
        <div class="heading" style="text-align: left; padding-bottom: 0; margin-bottom: 0;">
            <h1><span>Got</span>Questions ?</h1>
            <p>Please connect with us at SHINEE without any delay. We're happy to help !</p>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                <!--google map start-->
                <div class="row mapArea">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.031129405163!2d90.4258952!3d23.781905800000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c70e6603ec89%3A0xd8b39cc33fdba886!2sSHINE%20School%20of%20Hospitality%20INtegrated%20Education!5e0!3m2!1sen!2sin!4v1674806242668!5m2!1sen!2sin"
                        frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <!--google map end-->
            </div>
            <!-- contact from start-->
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                <div id="message"></div>
                <form method="post" action="php/contact.php" name="cform" id="cform">
                    <div class="form-row clearfix">
                        <input name="name" id="name" type="text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 normal"
                            placeholder="Your Name">
                    </div>
                    <div class="form-row clearfix">
                        <input name="number" id="number" type="text"
                            class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 normal" placeholder="Contact Number">
                    </div>
                    <div class="form-row clearfix">
                        <input name="email" id="email" type="email"
                            class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 normal" placeholder="Email Address">
                    </div>
                    <div class="form-row clearfix">
                        <textarea name="comments" id="comments"
                            class="col-xs-12 col-sm-12 col-md-12 col-lg-12 normal medium"
                            placeholder="Your Comments"></textarea>
                    </div>
                    <input type="submit" id="submit" name="send" class="button" value="Send message">
                    <div id="simple-msg"></div>
                </form>
            </div>
            <!-- contact from end-->
        </div>
    </div>
</section>
@endsection

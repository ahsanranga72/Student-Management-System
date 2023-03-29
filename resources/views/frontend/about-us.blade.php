@extends('frontend.layouts.master')

@push('css')
    <style>
        .section_gap {
            padding: 40px 0 0px;
        }
        @media screen and (max-width: 810px){
            .hover_listing li h3{
                text-align: left;
            }
            .hover_listing li p{
                text-align: left;
            }
        }
        @media screen and (min-width: 811px){
            .logo{
                margin-top: 0;
            }
        }
    </style>
@endpush

@section('content')
<!-- Teachers details start-->
<section class="grey_section section_gap" id="faculties">
    <div class="container">
        <div class="heading" style="text-align: left; padding-bottom: 0; margin-bottom: 0;">
            <h1><span>ABOUT THE</span>INSTITUTE</h1>
            <p>School of Hospitality INtegrated Education Epicenter provides you with hospitality training of the<br>
                highest quality with state-of-the-art kitchen and classroom facilities. <br><br>
                Headed by renowned Chef, Restaurateur, Entrepreneur, and Culinary Instructor, Subhabrata Maitra, our
                aim<br>
                at SHINEE is to produce quality graduates who are not only confident with their hospitality skills
                but<br>
                also able to communicate fluently, work independently and display leadership qualities that will
                enhance<br>
                their credentials in the hospitality and food service industries here in Bangladesh and globally.</p>
        </div>
        <ul class="hover_listing row">
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
                <p style="padding-right: 80px;">DIRECTOR – SHINEE : SCHOOL OF HOSPITALITY INTEGRATED EDUCATION EPICENTER
                    LTD.<br>
                    Chef Maitra entered into entrepreneurship after gaining rich experiences from busy kitchens globally
                    for over a decade. Running his organisations seamlessly, Chef Maitra became one of the most known
                    faces all over the country after honing the judges chair at Shera Radhuni for consecutive seasons.
                    Chef Maitra leads an instrumental role at SHINEE as a Culinary Instructor.
                </p>
            </li>
            <!-- Teacher 02 details end-->
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
                <p style="padding-right: 80px;">DIRECTOR – SHINEE : SCHOOL OF HOSPITALITY INTEGRATED EDUCATION EPICENTER
                    LTD.<br>
                    Gathering knowledge from Toronto, Canada and Le Cordon Bleu, Malaysia and gaining enriched
                    experience from global platforms like NOBU at Kuala Lumpur, Chef Nayeem has honed the judges chair
                    at Shera Radhuni 1429 season. He is a prized possession and plays an integral part at SHINEE as the
                    CEO and Culinary Instructor.
                </p>
            </li>
            <!-- Teacher 01 details end-->
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
                <p style="padding-right: 80px;">DIRECTOR – SHINEE : SCHOOL OF HOSPITALITY INTEGRATED EDUCATION EPICENTER
                    LTD.<br>
                    Her passion for baking and patisserie had drove her to Academy of Pastry Arts, Malaysia and
                    Richemont Master-Baker, Dubai to master in the art. Holding the position of the second runner up at
                    Shera Radhuni season 1424 and being chosen as the Mentor for Marks Dessert Queen and at Shera
                    Radhuni in the season 1429, gave her a strong platform in the country. Chef Farhana is a key team
                    player at SHINEE as a Course Instructor.
                </p>
            </li>
            <!-- Teacher 04 details end-->
            <!-- Teacher 04 details start-->
            <li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd">
                <div class="img" style="height: 320px; width: 292px;"><img
                        src="{{ asset('public/assets/frontend') }}/images/teachers/7.jpeg" alt=""
                        style="height:100%; width:100%;">
                    <ul class="hover-social-icons">
                        <li><a href="https://www.facebook.com/shinee.com.bd"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/shinee.com.bd/"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <h3 class="uppercase">MS. FARZANA ISLAM</h3>
                <p style="padding-right: 50px;">DIRECTOR - SHINEE: SCHOOL OF HOSPITLITY INTEGRTED EDUCATION EPICENTER
                    LTD.<br>
                    Ms. Farzana is a successful CEO of one of the leading advertising and digital media company of the
                    country – Adency Limited. She has a great contribution in the social media marketing and is a key
                    team player of SHINEE.
                </p>
            </li>
            <!-- Teacher 03 details end-->
            <!-- Teacher 03 details start-->
            <li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd">
                <div class="img" style="height: 320px; width: 292px;"><img
                        src="{{ asset('public/assets/frontend') }}/images/teachers/8.jpeg" alt=""
                        style="height:100%; width:100%;">
                    <ul class="hover-social-icons">
                        <li><a href="https://www.facebook.com/shinee.com.bd"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/shinee.com.bd/"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <h3 style="padding-right: 50px;" class="uppercase">AR. MD. ZILHAZ UDDIN KHANDAKER OPI</h3>
                <p style="padding-right: 50px;">DIRECTOR - SHINEE: SCHOOL OF HOSPITLITY INTEGRTED EDUCATION EPICENTER
                    LTD.<br>
                    Ar. Opi is a qualified architect by profession and is running his architectural company – Design
                    Central International Ltd. successfully. He is the mastermind behind the architectural designs of
                    SHINEE and is thereby playing a vital role.
                </p>
            </li>
            <!-- Teacher 03 details end-->
            <!-- Teacher 03 details start-->
            <li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd">
                <div class="img" style="height: 320px; width: 292px;"><img
                        src="{{ asset('public/assets/frontend') }}/images/teachers/9.jpeg" alt=""
                        style="height:100%; width:100%;">
                    <ul class="hover-social-icons">
                        <li><a href="https://www.facebook.com/shinee.com.bd"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/shinee.com.bd/"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <h3 class="uppercase">AR. RAIYAN IBN EMDAD</h3>
                <p style="padding-right: 50px;">DIRECTOR - SHINEE: SCHOOL OF HOSPITLITY INTEGRTED EDUCATION EPICENTER
                    LTD.<br>
                    Ar. Raiyan is a full member of IAB and also an enlisted member of RAJUK, CDA & Dhaka Cantonment
                    Board. He has an immense contribution in the construction of SHINEE and plays a pivotal role.
                </p>
            </li>
            <!-- Teacher 03 details end-->
            <!-- Teacher 03 details start-->
            <li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd">
                <div class="img" style="height: 320px; width: 292px;"><img
                        src="{{ asset('public/assets/frontend') }}/images/teachers/10.jpeg" alt=""
                        style="height:100%; width:100%;">
                    <ul class="hover-social-icons">
                        <li><a href="https://www.facebook.com/shinee.com.bd"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/shinee.com.bd/"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <h3 class="uppercase">MD. ASADUZZAMAN PITU</h3>
                <p style="padding-right: 50px;">DIRECTOR – SHINEE : SCHOOL OF HOSPITALITY INTEGRATED EDUCATION EPICENTER
                    LTD.<br>
                    Mr. Asad is associated with one of the leading media houses of the country. He plays a key role in
                    SHINEE.
                </p>
            </li>
            <!-- Teacher 03 details end-->
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
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.031129305163!2d90.3258952!3d23.781905800000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c70e6603ec89%3A0xd8b39cc33fdba886!2sSHINE%20School%20of%20Hospitality%20INtegrated%20Education!5e0!3m2!1sen!2sin!4v1674806242668!5m2!1sen!2sin"
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

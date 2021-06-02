@extends('layouts.website', ['pageTitle' => 'Home'])

@section('content')
    {{-- <section id="slider" class="slider-element slider-parallax swiper_wrapper vh-75">
        <div class="slider-inner">

            <div class="swiper-container swiper-parent">
                <div class="swiper-wrapper">
                    <div class="swiper-slide ">
                        <div class="swiper-slide-bg" style="background-image: url('images/slide-1.jpg');"></div>
                    </div>
                    <div class="swiper-slide ">
                        <div class="swiper-slide-bg" style="background-image: url('images/slide-2.jpg');"></div>
                    </div>
                    <div class="swiper-slide ">
                        <div class="swiper-slide-bg" style="background-image: url('images/slide-3.jpg');"></div>
                    </div>
                    <div class="swiper-slide ">
                        <div class="swiper-slide-bg" style="background-image: url('images/slide-4.jpg');"></div>
                    </div>
                    <div class="swiper-slide ">
                        <div class="swiper-slide-bg" style="background-image: url('images/slide-5.jpg');"></div>
                    </div>
                </div>
                <div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
                <div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
                <div class="slide-number">
                    <div class="slide-number-current"></div><span>/</span>
                    <div class="slide-number-total"></div>
                </div>
            </div>

        </div>
    </section> --}}
    <section id="slider" class="slider-element h-auto bottommargin-sm" style="background-color: #222;">
        <div class="slider-inner">

            <div class="owl-carousel carousel-widget" data-margin="0" data-items="1" data-pagi="false" data-loop="true"
                data-animate-in="rollIn" data-speed="450" data-animate-out="rollOut" data-autoplay="5000">

                <a href="javascript:void(0)"><img src="images/slide-1.jpg" alt="Slider"></a>
                <a href="javascript:void(0)"><img src="images/slide-2.jpg" alt="Slider"></a>
                <a href="javascript:void(0)"><img src="images/slide-3.jpg" alt="Slider"></a>
                <a href="javascript:void(0)"><img src="images/slide-4.jpg" alt="Slider"></a>
                <a href="javascript:void(0)"><img src="images/slide-5.jpg" alt="Slider"></a>

            </div>

        </div>
    </section>

    <!-- Content
        ============================================= -->
    <section id="content">
        <div class="">

            <div class="promo promo-light promo-full header-stick border-top-0 p-5">
                <div class="container clearfix">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg">
                            <h3>Admission to Aksharam International Malayalam Academy is open!</h3>
                            <span>Learn your mother tongue when and where ever you are!</span>
                        </div>
                        <div class="col-12 col-lg-auto mt-4 mt-lg-0">
                            <a href="{{ route('aksharam.apply') }}" class="button button-large button-circle m-0">Apply
                                now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div id="about-front" class="section mt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="heading-block">
                                <h2>Aksharam International Malayalam Academy</h2>
                            </div>
                            <p>There are thousands of Keralites living in different parts of the world as expatriates. We
                                can
                                find many people who have chosen exile to meet their livelihood over the years as global
                                citizens in various countries. Even though they have settled in other countries and become
                                citizens of those countries, Keralites are eager to preserve their heritage and tradition.
                                There
                                are many people who have not been able to learn their mother tongue due to living abroad for
                                a
                                long time. Aksharam International Malayalam Academy is finding a solution for them.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container clearfix">

                <div class="row col-mb-50">
                    <div class="col-sm-6 col-lg-3">
                        <div class="feature-box fbox-center fbox-light fbox-effect border-bottom-0">
                            <div class="fbox-icon">
                                <a href="javascript:void(0)"><i class="i-alt border-0 icon-certificate"></i></a>
                            </div>
                            <div class="fbox-content">
                                <h3>Multi course modes<span class="subtitle">Certificate & Diploma course</span></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="feature-box fbox-center fbox-light fbox-effect border-bottom-0">
                            <div class="fbox-icon">
                                <a href="javascript:void(0)"><i class="i-alt border-0 icon-wallet"></i></a>
                            </div>
                            <div class="fbox-content">
                                <h3>Easy Payment Options<span class="subtitle">Credit Cards &amp; UPI Support</span></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="feature-box fbox-center fbox-light fbox-effect border-bottom-0">
                            <div class="fbox-icon">
                                <a href="javascript:void(0)"><i class="i-alt border-0 icon-megaphone"></i></a>
                            </div>
                            <div class="fbox-content">
                                <h3>Instant Notifications<span class="subtitle">Realtime Email &amp; SMS Support</span></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="feature-box fbox-center fbox-light fbox-effect border-bottom-0">
                            <div class="fbox-icon">
                                <a href="javascript:void(0)"><i class="i-alt border-0 icon-fire"></i></a>
                            </div>
                            <div class="fbox-content">
                                <h3>Seasonal Offers<span class="subtitle">Upto 50% Discounts</span></h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="line"></div>

                <div class="row col-mb-50">
                    <div class="col-md-5">
                        <img src="{{ asset('images/student-study.jpeg') }}" class="img-fluid"
                            alt="Why aksharam is different">
                    </div>

                    <div class="col-md-7">
                        <div class="heading-block">
                            <h2>Why AKSHARAM is different</h2>
                        </div>

                        <div>
                            <p>This course aims at developing the personality and natural abilities and skills of the
                                students beyond just learning the Malayalam language. The main objective of Aksharam Academy
                                is to create a generation on a global scale that can form its own perspectives, make
                                decisions and dream of specific goals for the future.</p>
                            <p>Instead of living as addicts to modern technology, Aksharam International Malayalam Academy
                                strongly believes that there is an urgent need for a generation that can use their potential
                                to emerge as world leaders. Aksharam is a unique project which delivers five live classes
                                per week on Malayalam language in scientific methods where the subject experts will be
                                available to support the students. </p>
                        </div>

                        {{-- <div class="row col-mb-30">
                            <div class="col-sm-6 col-md-12 col-lg-6">
                                <ul class="iconlist iconlist-color mb-0">
                                    <li><i class="icon-caret-right"></i> Certificate Course</li>
                                    <li><i class="icon-caret-right"></i> Diploma Course</li>
                                    <li><i class="icon-caret-right"></i> Interactive Live Sessions</li>
                                    <li><i class="icon-caret-right"></i> Assessments; Activities</li>
                                </ul>
                            </div>

                            <div class="col-sm-6 col-md-12 col-lg-6">
                                <ul class="iconlist iconlist-color mb-0">
                                    <li><i class="icon-caret-right"></i> Extracurricular activities</li>
                                    <li><i class="icon-caret-right"></i> Live classes in convenient time zones</li>
                                    <li><i class="icon-caret-right"></i> Presence of qualified teachers</li>
                                    <li><i class="icon-caret-right"></i> And much more...</li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>

            </div>

            <div class="section topmargin-lg mb-0">
                <div class="container clearfix">

                    <div class="heading-block center">
                        <h2>Features that you are gonna Love</h2>
                        <span>Explore the inspiring features we provide.</span>
                    </div>

                    <div class="row justify-content-center col-mb-50">
                        <div class="col-sm-6 col-lg-6">
                            <div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn">
                                <div class="fbox-icon">
                                    <a href="javascript:void(0)"><i class="icon-certificate"></i></a>
                                </div>
                                <div class="fbox-content">
                                    <h3>Certificate Course</h3>
                                    <p>Malayalam Basic Certificate Course is designed and developed for the students who do
                                        not know even the basics of Malayalam language.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-6">
                            <div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn">
                                <div class="fbox-icon">
                                    <a href="javascript:void(0)"><i class="icon-file-settings"></i></a>
                                </div>
                                <div class="fbox-content">
                                    <h3>Diploma Course</h3>
                                    <p>Diploma in Advanced Malayalam is designed for those who want to become more
                                        proficient in the Malayalam language.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-6">
                            <div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn">
                                <div class="fbox-icon">
                                    <a href="javascript:void(0)"><i class="icon-line-video"></i></a>
                                </div>
                                <div class="fbox-content">
                                    <h3>Interactive Live Sessions</h3>
                                    <p>Students from all over the world can participate in our live classes through the Zoom
                                        application.</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 col-lg-6">
                            <div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn">
                                <div class="fbox-icon">
                                    <a href="javascript:void(0)"><i class="icon-line-activity"></i></a>
                                </div>
                                <div class="fbox-content">
                                    <h3>Assessments; Activities</h3>
                                    <p>Various activities, different assessments, fun games and quizzes ​​are organized to
                                        improve the learning level of the students.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="mx-auto col-md-6 text-center">
                            <a href="{{ route('aksharam.features') }}"
                                class="button button-large button-rounded">Explore</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row clearfix align-items-stretch bottommargin-lg">

                <div class="col-lg-6 center col-padding"
                    style="background: url('{{ asset('images/graduate.jpg') }}') center center no-repeat; background-size: cover;">
                </div>

                <div class="col-lg-6 center col-padding" style="background-color: #F5F5F5;">
                    <div class="heading-block border-bottom-0">
                        <span class="before-heading color">Want to join us?</span>
                        <h3>Who can enrol</h3>
                    </div>

                    <p class="lead">
                        Anyone of all ages and from all over the world who wants to learn Malayalam can join the course. The
                        fresh applications who don’t know the basics of Malayalam language can join the Malayalam Basic
                        Certificate Course. This course is based on a syllabus that compiles basic studies of the language,
                        including writing and reading. The duration of the course is two years. Those who want to become
                        more proficient in the Malayalam language can join Diploma in Advanced Malayalam after successfully
                        completing the Malayalam Basic Certificate Course.
                    </p>
                </div>

            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div id="section-pricing" class="heading-block text-center border-bottom-0 page-section"
                            data-onepage-settings="{&quot;offset&quot;:100,&quot;speed&quot;:1250,&quot;easing&quot;:&quot;easeOutQuad&quot;}">
                            <h2>Pricing Details</h2>
                        </div>

                        <div class="pricing-box pricing-extended row align-items-stretch mb-5 mx-0">
                            <div class="pricing-desc col-lg-9 p-4">
                                <div class="pricing-features pb-0">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-12 col-lg-6">
                                            <ul class="iconlist iconlist-color mb-0">
                                                <li><i class="icon-caret-right"></i> Certificate Course</li>
                                                <li><i class="icon-caret-right"></i> Diploma Course</li>
                                                <li><i class="icon-caret-right"></i> Interactive Live Sessions</li>
                                                <li><i class="icon-caret-right"></i> Assessments; Activities</li>
                                            </ul>
                                        </div>

                                        <div class="col-sm-6 col-md-12 col-lg-6">
                                            <ul class="iconlist iconlist-color mb-0">
                                                <li><i class="icon-caret-right"></i> Extracurricular activities</li>
                                                <li><i class="icon-caret-right"></i> Live classes in convenient time zones
                                                </li>
                                                <li><i class="icon-caret-right"></i> Presence of qualified teachers</li>
                                                <li><i class="icon-caret-right"></i> And much more...</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pricing-action-area col-lg d-flex flex-column justify-content-center">
                                <div class="pricing-meta">
                                    As Low as
                                </div>
                                <div class="pricing-price">
                                    <span class="price-unit">$</span>100<span class="price-tenure">monthly</span>
                                </div>
                                <div class="pricing-action">
                                    <a href="{{ route('aksharam.apply') }}"
                                        class="button button-3d button-large btn-block m-0">Get Started</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section><!-- #content end -->
@endsection

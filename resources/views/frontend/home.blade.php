@extends('frontend.partials.main')

@section('title', 'Home')

@section('content')
    <!-- Slider
    ============================================= -->
    @include('frontend.partials.slider')

    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="heading-block">
                            <h1>Welcome to <br> Academy of Bir Gurkhas Security Services.</h1>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="position-relative overflow-hidden">
                            <p class="lead">
                                Our organisation idolizes the Brave Gurkhas who were known for their bravery, honesty
                                and loyalty. Foreseeing and understanding the ever changing security requirement of the
                                current time, both in the domestic and international sectors;

                                We aim to set a high standard of training programs so that graduates of our academy will
                                get due recognition along with a remuneration matching their level of education. We are
                                established with strong determination and motto “Security with Sensibility”. We are
                                fully confident that our “Bir Gurkhas” will be role model security personnel and cope
                                with the challenges of any modern security threats.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section my-0">
                <div class="container">
                    <div class="row mt-3 col-mb-50">
                        <div class="col-lg-3">
                            <img src="{{ asset('frontend/images/hpsec/security-guards.jpg') }}">
                            <div class="heading-block border-bottom-0" style="margin-bottom: 15px;">
                                <h4>SECURITY GUARDS</h4>
                            </div>
                            <p>The Company provides highly skilled, trained, motivated, committed and smartly uniformed
                                security guards (men and women) for security of personnel, materials and
                                information.</p>
                        </div>
                        <div class="col-lg-3">
                            <img src="{{ asset('frontend/images/hpsec/Mobile-Petrol.jpg') }}">
                            <div class="heading-block border-bottom-0" style="margin-bottom: 15px;">
                                <h4>MOBILE PATROL</h4>
                            </div>
                            <p>A group of trained guards commanded by supervisor will carried out mobile patrol mounted
                                on vehicles on day and night at guard duty site.</p>
                        </div>
                        <div class="col-lg-3">
                            <img src="{{ asset('frontend/images/hpsec/67828565_405980853457387_1268980664930140160_n.jpg') }}">
                            <div class="heading-block border-bottom-0" style="margin-bottom: 15px;">
                                <h4>CC TV AND ALARM SYSTEM</h4>
                            </div>
                            <p>We have trained manpower regarding CCTV and alarm system. Bir Gurkhas Security can
                                establish center monitoring and alarm system from their office.</p>
                        </div>
                        <div class="col-lg-3">
                            <img src="{{ asset('frontend/images/hpsec/bdyy.jpg') }}">
                            <div class="heading-block border-bottom-0" style="margin-bottom: 15px;">
                                <h4>EVENT SECURITY/LIFE GUARD</h4>
                            </div>
                            <p>Bir Gurkhas Security provides trained event guards for any types of event such as fair,
                                musical concert, sport, social function etc. At the same time, we provide very
                                experience and well trained Bodyguards.</p>
                        </div>
                    </div>
                </div>
            </div>

<!--            <div class="row clearfix align-items-stretch">-->
<!--                <div class="col-lg-6 center col-padding"-->
<!--                     style="background: url('images/DSC06510.jpg') center center no-repeat; background-size: cover;">-->
<!--                </div>-->
<!--                <div class="col-lg-6 center col-padding" style="background-color: #F5F5F5;">-->
<!--                    <div class="heading-block border-bottom-0">-->
<!--                        <h3>Training Video of ABGSS</h3>-->
<!--                    </div>-->
<!--                    <div class="center bottommargin">-->
<!--                        <a class="d-block position-relative" href="https://youtube/dRUGgUcpew4" data-lightbox="iframe">-->
<!--                            <img src="{{ asset('frontend/images/jump.jpg') }}" alt="Video">-->
<!--                            <div class="bg-overlay">-->
<!--                                <div class="bg-overlay-content dark">-->
<!--                                    <span class="overlay-trigger-icon size-lg op-ts op-07 bg-light text-dark"-->
<!--                                          data-hover-animate="op-1" data-hover-animate-out="op-07"-->
<!--                                          data-hover-parent=".row"><i class="icon-line-play"></i></span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                    <p class="lead mb-0">Take a tour in Academy of Bir Gurkhas Security Services and you will find the-->
<!--                        best training academy in Kathmandu.</p>-->
<!--                </div>-->
<!--            </div>-->

            <div class="section parallax dark mb-0"
                 style="background-image: url('{{ asset('frontend/images/services/home-testi-bg.jpg') }}'); padding: 30px 0;"
                 data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">
                <div class="heading-block center">
                    <h3>What Clients Say?</h3>
                </div>

                <div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
                    <div class="flexslider">
                        <div class="slider-wrap">
                            <div class="slide">
                                <div class="testi-image">
                                    <a href="#"><img src="{{ asset('frontend/images/testimonials/nabal-150x150.jpg') }}"
                                                     alt="Customer Testimonails"></a>
                                </div>
                                <div class="testi-content">
                                    <p>We appreciate their attitude, approach and efforts to meet our expectations of
                                        service levels, not only that but most of the times their prompt efforts to
                                        resolve the issues being brought to their notice and amicably resolving them. We
                                        extend our gratitude to all the team members for their hard work put in to bring
                                        the good service levels and providing value addition to our 10 branches in the
                                        field of security and given utmost customer satisfaction.</p>
                                    <div class="testi-meta">
                                        NABAL SHAH
                                        <span>HOD Security Department Everest Bank Limited</span>
                                    </div>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="testi-image">
                                    <a href="#"><img src="{{ asset('frontend/images/testimonials/BHARAT-RAJ-DHAKAL-150x150.jpg') }}"
                                                     alt="Customer Testimonails"></a>
                                </div>
                                <div class="testi-content">
                                    <p>We would like to extend appreciation to the quality service provided by your
                                        company to this airlines since 21st September,2014. We have found the guards are
                                        dedicated and professional to their duties; we would like to wish you all the
                                        best for your mission in the days to come.</p>
                                    <div class="testi-meta">
                                        BHARAT RAJ DHAKAL
                                        <span>HOD Security Department Yeti Airlines</span>
                                    </div>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="testi-image">
                                    <a href="#"><img src="{{ asset('frontend/images/testimonials/avatar.jpg') }}"
                                                     alt="Customer Testimonails"></a>
                                </div>
                                <div class="testi-content">
                                    <p>We truly appreciate your professional dedication to the security service. Thank
                                        you for your incredible exceptional quality service.</p>
                                    <div class="testi-meta">
                                        ROHIT THAPA
                                        <span>General Manager Casino Mahjong</span>
                                    </div>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="testi-image">
                                    <a href="#"><img src="{{ asset('frontend/images/testimonials/logo_gokarna.jpg') }}"
                                                     alt="Customer Testimonails"></a>
                                </div>
                                <div class="testi-content">
                                    <p>We would like to extend sincere appreciation to your professional dedication,
                                        valuable service and excellent performance during this period of time. We wish
                                        you all the very best and success for your future mission in any time and
                                        place.</p>
                                    <div class="testi-meta">
                                        Gokarna Forest Resort
                                        <span>Admin</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container clearfix">
            <div id="oc-clients" class="owl-carousel image-carousel carousel-widget" data-margin="60"
                 data-loop="true" data-nav="false" data-autoplay="1000" data-pagi="false" data-items-xs="2"
                 data-items-sm="3" data-items-md="4" data-items-lg="5" data-items-xl="6">
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/Agantuk-Resort-150x150.jpg') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/akama_hotel.jpg') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/bally_casino.png') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/bishal_cement.jpg') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/casino_mahjong.png') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/CG-Group-150x150.jpg') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/everest_bank.jpg') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/hokke_lumbini.png') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/huaxin_cement.jpg') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/hyatt.jpeg') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/kfc.png') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/kia_logo.png') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/kumari_bank.png') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/laxmi_bank.png') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/Logo_ballys-2-150x150.png') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/logo_gokarna.jpg') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/logo_himalayaairlines-150x80.png') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/logo_shikhar-150x150.png') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/logo_yeti-150x63.png') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/mega-bank-ltd34.png') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/ncc_bank.png') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/ncell.png') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/nepal_orthopaedic.png') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/nic%20asia.png') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/pepsi.png') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/ullens.jpg') }}" alt="Clients"></a></div>
                <div class="oc-item"><a href="#"><img src="{{ asset('frontend/images/clients/vivanta.jpg') }}" alt="Clients"></a></div>
            </div>
        </div>
    </section>
@stop

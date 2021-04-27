@extends('frontend.partials.main')

@section('title', 'Board of Directors')

@section('content')

    <!-- Content
    ============================================= -->
    <!-- Page Title
    ============================================= -->
    <section id="page-title">
        <div class="container clearfix">
            <h1>Message From The Chairman</h1>
            <!--            <span>Get in Touch with Us</span>-->
        </div>
    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row col-mb-50 mb-0">
                    <div class="col-lg-12">
                        <div class="team team-list row align-items-center">
                            <div class="team-image col-sm-3">
                                <img src="{{ asset('frontend/images/bod/1 Bonid Shrestha Chairman.jpg') }}" alt="John Doe">
                            </div>
                            <div class="team-desc col-sm-9">
                                <div class="team-title"><h4>BINOD SHRESTHA</h4><span>Chairman</span></div>
                                <div class="team-content">
                                    <p>It gives me a great pleasure and pride to express my gratitude towards our
                                        experienced and qualified staff members whose efforts and relentless hard
                                        works made this organization the best security service provider and training
                                        centre within a small span of time. This Academy is the result of very dynamic
                                        entrepreneurs (mostly consisting of highly qualified top ranked retired Nepalese
                                        army and Nepalese Police Officers) to address the present affairs and problem of
                                        the security threats in the country and abroad.
                                    </p>
                                    <p>
                                        This academy is registered under the act of sub section (1) of section 5 of the
                                        company Act, 2006 and affiliated to the Council for Technical Education and
                                        Vocational Training (CTEVT).
                                        This academy is registered under the act of sub section (1) of section 5 of the
                                        companies Act, 2006 and affiliated to the Council for Technic
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clear"></div>

                <div class="fancy-title title-border">
                    <h2>Directors</h2>
                </div>

                <div class="row justify-content-center col-mb-50 mb-0">
                    <div class="col-sm-6 col-lg-4">
                        <div class="team">
                            <div class="team-image d-flex justify-content-center">
                                <img src="{{ asset('frontend/images/bod/1 Bonid Shrestha Chairman.jpg') }}" style="max-width: 65%">
                            </div>
                            <div class="team-desc">
                                <div class="team-title"><h4>Binod Shrestha</h4><span>Binod Shrestha</span></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4">
                        <div class="team">
                            <div class="team-image d-flex justify-content-center">
                                <img src="{{ asset('frontend/images/bod/2 DIGP Ashok Kumar Shrestha (Retd.) Managing Director.jpg') }}" style="max-width: 65%">
                            </div>
                            <div class="team-desc">
                                <div class="team-title"><h4>DIGP Ashok Shrestha (Retd.)</h4><span>Managing Director</span></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4">
                        <div class="team">
                            <div class="team-image d-flex justify-content-center">
                                <img src="{{ asset('frontend/images/bod/3 Hemanta Raj Kolachhapati Executive Director.jpg') }}" style="max-width: 69%">
                            </div>
                            <div class="team-desc">
                                <div class="team-title"><h4>Hemanta Raj Kolachhapati</h4><span>Executive Director</span></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clear"></div>

                <div class="fancy-title title-border">
                    <h2>Advisors</h2>
                </div>

                <div class="row col-mb-50 mb-0">
                    <div class="col-lg-3 col-md-6">
                        <div class="team">
                            <div class="team-image d-flex justify-content-center">
                                <img src="{{ asset('frontend/images/bod/Prof.Dr. Hem Raj Subedi.jpg') }}" style="max-width: 87%">
                            </div>
                            <div class="team-desc">
                                <div class="team-title"><h4>Prof. Dr. Hem Raj Subedi</h4></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="team">
                            <div class="team-image d-flex justify-content-center">
                                <img src="{{ asset('frontend/images/bod/Maj.Gen. Jagdish C. Pokhrel (Retd.).jpg') }}" style="max-width: 69%">
                            </div>
                            <div class="team-desc">
                                <div class="team-title"><h4>Maj. Gen. Jagdish C. Pokhrel (Retd.)</h4></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="team">
                            <div class="team-image d-flex justify-content-center">
                                <img src="{{ asset('frontend/images/bod/P.B. Rai.jpg') }}" style="max-width: 69%">
                            </div>
                            <div class="team-desc">
                                <div class="team-title"><h4>P.B. Rai</h4></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="team">
                            <div class="team-image d-flex justify-content-center">
                                <img src="{{ asset('frontend/images/bod/Him Rawal.jpg') }}" style="max-width: 79%">
                            </div>
                            <div class="team-desc">
                                <div class="team-title"><h4>Him Rawal</h4></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center col-mb-50 mb-0">
                    <div class="col-sm-6 col-lg-4">
                        <div class="team">
                            <div class="team-image d-flex justify-content-center">
                                <img src="{{ asset('frontend/images/bod/Ram Prasad Khalal Legal Advisor.jpg') }}" style="max-width: 50%">
                            </div>
                            <div class="team-desc">
                                <div class="team-title"><h4>Ram Pd.Khanal</h4><span>Legal Advisor</span></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4">
                        <div class="team">
                            <div class="team-image d-flex justify-content-center">
                                <img src="{{ asset('frontend/images/bod/SSP. Indra Pd. Neupane (Retd.).jpg') }}" style="max-width: 50%">
                            </div>
                            <div class="team-desc">
                                <div class="team-title"><h4>SSP. Indra Pd.Neupane (Retd.)</h4></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4">
                        <div class="team">
                            <div class="team-image d-flex justify-content-center">
                                <img src="{{ asset('frontend/images/bod/Sp. Gopi Man Shrestha (Retd.).jpg') }}" style="max-width: 50%">
                            </div>
                            <div class="team-desc">
                                <div class="team-title"><h4>Sp. Gopi Man Shrestha (Retd.)</h4></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clear"></div>

                <div class="fancy-title title-border">
                    <h2>Management Team</h2>
                </div>

                <div class="row justify-content-center col-mb-50 mb-0">
                    <div class="col-sm-12">
                        <div class="team">
                            <div class="team-image d-flex justify-content-center">
                                <img src="{{ asset('frontend/images/bod/Lt.Col.Niranjan Basnet (Retd.) CEO.jpg') }}" style="max-width: 15%">
                            </div>
                            <div class="team-desc">
                                <div class="team-title"><h4>Lt. Col. NIRANJAN BASNET (Retd.)</h4><span>CEO</span></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row col-mb-50 mb-0">
                    <div class="col-lg-3 col-md-6">
                        <div class="team">
                            <div class="team-image d-flex justify-content-center">
                                <img src="{{ asset('frontend/images/bod/Shishir Raj Kolachhapati Mareting and Recovery Manager.jpg') }}" style="max-width: 87%">
                            </div>
                            <div class="team-desc">
                                <div class="team-title"><h4>SHISHIR R. KOLACHHAPATI</h4><span>Marketing & Recovery Manager</span></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="team">
                            <div class="team-image d-flex justify-content-center">
                                <img src="{{ asset('frontend/images/bod/Major Bishnu Mani K.C (Retd.) Operation Manager.jpg') }}" style="max-width: 87%">
                            </div>
                            <div class="team-desc">
                                <div class="team-title"><h4>Major BISHNU MANI K.C. (Retd.)</h4><span>Operation & Training Manager</span></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="team">
                            <div class="team-image d-flex justify-content-center">
                                <img src="{{ asset('frontend/images/bod/Bishwaraj Singh Thapa.jpg') }}" style="max-width: 69%">
                            </div>
                            <div class="team-desc">
                                <div class="team-title"><h4>DYSP. Bishworaj Singh Thapa (Retd.)</h4><span>Admin & HR Manager</span></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="team">
                            <div class="team-image d-flex justify-content-center">
                                <img src="{{ asset('frontend/images/bod/Inspector Dashu Giri (Retd.) Account Officer..jpg') }}" style="max-width: 64%">
                            </div>
                            <div class="team-desc">
                                <div class="team-title"><h4>INSPECTOR DASHU GIRI (Retd.)</h4><span>Account Officer</span></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- #content end -->
    
@stop

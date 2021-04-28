<footer id="footer" class="dark">
    <div class="container">
        <!-- Footer Widgets
        ============================================= -->
        <div class="footer-widgets-wrap">
            <div class="row col-mb-50">
                <div class="col-md-6 col-lg-4">
                    <div class="widget clearfix">
                        <img src="{{ asset('frontend/images/icons/Academic-of-Birgurkha-Security-Services-400x85.png') }}" alt="Image" class="footer-logo">
                        <p>Academy Of Bir Gurkhas Security Service</p>
                        <div style="background: url('images/world-map.png') no-repeat center center; background-size: 100%;">
                            <address>
                                <strong>Headquarters:</strong><br>
                                Milijuli Tole, Maharajgunj-4<br>
                                Kathmandu<br>
                            </address>
                            <abbr title="Phone Number"><strong>Phone:</strong></abbr> +977-01-4016305 <br>
                            <abbr title="Email Address"><strong>Email:</strong></abbr> info@birgurkhasecurity.com
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="widget clearfix">
                        <h4>Client Testimonials</h4>
                        <div class="fslider testimonial no-image bg-transparent border-0 shadow-none p-0"
                            data-animation="slide" data-arrows="false">
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
                    <div class="widget clearfix">
                        <a href="#" class="social-icon si-small si-rounded si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>
                        <a href="#" class="social-icon si-small si-rounded si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>
                        <a href="#" class="social-icon si-small si-rounded si-linkedin">
                            <i class="icon-linkedin"></i>
                            <i class="icon-linkedin"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="widget quick-contact-widget form-widget clearfix">
                        <h4>Send Message</h4>
                        <div class="form-result"></div>
                        <form id="quick-contact-form" name="quick-contact-form"
                            action="#" method="post"
                            class="quick-contact-form mb-0">
                            <div class="form-process">
                                <div class="css3-spinner">
                                    <div class="css3-spinner-scaler"></div>
                                </div>
                            </div>
                            <div class="input-group mx-auto">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="icon-user"></i></div>
                                </div>
                                <input type="text" class="required form-control" id="quick-contact-form-name"
                                    name="quick-contact-form-name" value="" placeholder="Full Name"/>
                            </div>
                            <div class="input-group mx-auto">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="icon-email2"></i></div>
                                </div>
                                <input type="text" class="required form-control email" id="quick-contact-form-email"
                                    name="quick-contact-form-email" value="" placeholder="Email Address"/>
                            </div>
                            <textarea class="required form-control input-block-level short-textarea"
                                    id="quick-contact-form-message" name="quick-contact-form-message" rows="4"
                                    cols="30" placeholder="Message"></textarea>
                            <input type="text" class="d-none" id="quick-contact-form-botcheck"
                                name="quick-contact-form-botcheck" value=""/>
                            <input type="hidden" name="prefix" value="quick-contact-form-">
                            <button type="submit" id="quick-contact-form-submit" name="quick-contact-form-submit"
                                    class="btn btn-danger m-0" value="submit">Send Email
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- .footer-widgets-wrap end -->
    </div>

    <!-- Copyrights
    ============================================= -->
    <div id="copyrights">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-auto text-center text-lg-left">
                    <p class="mb-3">Copyrights &copy; Academy Of Bir Gurkhas Security Service</p>
                </div>
            </div>
        </div>
    </div><!-- #copyrights end -->
</footer>
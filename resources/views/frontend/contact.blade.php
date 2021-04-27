@extends('frontend.partials.main')

@section('title', 'Contact')

@section('content')

    <!-- Content
    ============================================= -->
    <!-- Page Title
    ============================================= -->
    <section id="page-title">
        <div class="container clearfix">
            <h1>Contact</h1>
            <span>Get in Touch with Us</span>
        </div>
    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="row gutter-40 col-mb-80">
                    <!-- Postcontent
                    ============================================= -->
                    <div class="postcontent col-lg-9">
                        <h3>Send us an Email</h3>
                        <div class="form-widget">
                            <div class="form-result"></div>
                            <form class="row mb-0" id="template-contactform" name="template-contactform"
                                  action="http://themes.semicolonweb.com/html/canvas/include/form.php" method="post">
                                <div class="form-process">
                                    <div class="css3-spinner">
                                        <div class="css3-spinner-scaler"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="template-contactform-name">Name <small>*</small></label>
                                    <input type="text" id="template-contactform-name" name="template-contactform-name"
                                           value="" class="sm-form-control required"/>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="template-contactform-email">Email <small>*</small></label>
                                    <input type="email" id="template-contactform-email"
                                           name="template-contactform-email" value=""
                                           class="required email sm-form-control"/>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-md-8 form-group">
                                    <label for="template-contactform-subject">Subject <small>*</small></label>
                                    <input type="text" id="template-contactform-subject" name="subject" value=""
                                           class="required sm-form-control"/>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="template-contactform-phone">Phone</label>
                                    <input type="text" id="template-contactform-phone" name="template-contactform-phone"
                                           value="" class="sm-form-control"/>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-12 form-group">
                                    <label for="template-contactform-message">Message <small>*</small></label>
                                    <textarea class="required sm-form-control" id="template-contactform-message"
                                              name="template-contactform-message" rows="6" cols="30"></textarea>
                                </div>
                                <div class="col-12 form-group d-none">
                                    <input type="text" id="template-contactform-botcheck"
                                           name="template-contactform-botcheck" value="" class="sm-form-control"/>
                                </div>
<!--                                <div class="col-12 form-group">-->
<!--                                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>-->
<!--                                    <div class="g-recaptcha"-->
<!--                                         data-sitekey="6LfijgUTAAAAACPt-XfRbQszAKAJY0yZDjjhMUQT"></div>-->
<!--                                </div>-->
                                <div class="col-12 form-group">
                                    <button class="button button-3d m-0" type="submit" id="template-contactform-submit"
                                            name="template-contactform-submit" value="submit">Send Message
                                    </button>
                                </div>
                                <input type="hidden" name="prefix" value="template-contactform-">
                            </form>
                        </div>
                    </div><!-- .postcontent end -->

                    <!-- Sidebar
                    ============================================= -->
                    <div class="sidebar col-lg-3">
                        <address>
                            <strong>Headquarters:</strong><br>
                            Milijuli Tole, Maharajgunj-4<br>
                            Kathmandu<br>
                        </address>
                        <abbr title="Phone Number"><strong>Phone:</strong></abbr> +977-01-4016305<br>
                        <abbr title="Email Address"><strong>Email:</strong></abbr> academy.birgurkhas@gmail.com
                        <div class="widget border-0 pt-0">
                            <a href="#" class="social-icon si-small si-dark si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>
                            <a href="#" class="social-icon si-small si-dark si-twitter">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>
                        </div>
                    </div><!-- .sidebar end -->
                </div>
            </div>
        </div>
    </section><!-- #content end -->
    
@stop

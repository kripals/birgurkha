<div id="menubar" class="menubar-inverse ">
    <div class="menubar-fixed-panel">
        <div>
            <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="expanded">
            <a href="#">
                <span class="text-lg text-bold text-primary ">{{ config('website.name') }}</span>
            </a>
        </div>
    </div>
    <div class="menubar-scroll-panel">

        <!-- BEGIN MAIN MENU -->
        <ul id="main-menu" class="gui-controls">

            <!-- BEGIN DASHBOARD -->
            <li>
                <a href="{{ route('home') }}" class="active">
                    <div class="gui-icon"><i class="md md-home"></i></div>
                    <span class="title">Dashboard</span>
                </a>
            </li><!--end /menu-li -->
            <li>
                <a href="{{ route('news.news') }}">
                    <div class="gui-icon"><i class="md md-new-releases"></i></div>
                    <span class="title">News and Notices</span>
                </a>
            </li><!--end /menu-li -->
            <li>
                <a href="{{ route('slider.slider') }}">
                    <div class="gui-icon"><i class="md md-slideshow"></i></div>
                    <span class="title">Slider</span>
                </a>
            </li><!--end /menu-li -->
            <li>
                <a href="{{ route('popup.popup') }}">
                    <div class="gui-icon"><i class="md md-adjust"></i></div>
                    <span class="title">Popup</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END DASHBOARD -->

        </ul><!--end .main-menu -->
        <!-- END MAIN MENU -->
    </div><!--end .menubar-scroll-panel-->
</div><!--end #menubar-->

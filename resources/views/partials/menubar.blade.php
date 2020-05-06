
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
                <a href="#" class="active">
                    <div class="gui-icon"><i class="md md-home"></i></div>
                    <span class="title">Dashboard</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END DASHBOARD -->

            <!-- BEGIN SLIDER -->
            <li>
                <a href="#">
                    <div class="gui-icon"><i class="md md-email"></i></div>
                    <span class="title">Slider</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END SLIDER -->

            <!-- BEGIN PODUCTS -->
            <li>
                <a href="{{ route('products') }}">
                    <div class="gui-icon"><i class="md md-home"></i></div>
                    <span class="title">Products</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END PODUCTS -->

        </ul><!--end .main-menu -->
        <!-- END MAIN MENU -->

        <div class="menubar-foot-panel">
            <small class="no-linebreak hidden-folded">
                <span class="opacity-75">Copyright &copy; 2014</span> <strong>CodeCovers</strong>
            </small>
        </div>
    </div><!--end .menubar-scroll-panel-->
</div><!--end #menubar-->

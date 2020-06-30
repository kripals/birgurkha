
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
                <a href="home" class="active">
                    <div class="gui-icon"><i class="md md-home"></i></div>
                    <span class="title">Dashboard</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END DASHBOARD -->

            <!-- BEGIN SLIDER -->
            <li>
                <a href="local">
                    <div class="gui-icon"><i class="md md-cloud"></i></div>
                    <span class="title">Local</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END SLIDER -->

            <!-- BEGIN PODUCTS -->
            <li>
                <a href="{{ route('products') }}">
                    <div class="gui-icon"><i class="md md-folder"></i></div>
                    <span class="title">Products</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END PODUCTS -->

            <!-- BEGIN CATEGORIES -->
            <li>
                <a href="{{ route('categories') }}">
                    <div class="gui-icon"><i class="md md-folder-shared"></i></div>
                    <span class="title">Categories</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END CATEGORIES -->

            <!-- BEGIN TYPES -->
            <li>
                <a href="{{ route('types.index') }}">
                    <div class="gui-icon"><i class="md md-folder-shared"></i></div>
                    <span class="title">Homepage Sections</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END TYPES -->

            <!-- BEGIN CMS PAGES -->
            <li>
                <a href="{{ route('cmsPages') }}">
                    <div class="gui-icon"><i class="md md-folder-shared"></i></div>
                    <span class="title">Cms Pages</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END CMS PAGES -->

            <!-- BEGIN URL KEYS -->
            <li>
                <a href="{{ route('urlKeys') }}">
                    <div class="gui-icon"><i class="md md-folder-shared"></i></div>
                    <span class="title">Url Keys</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END URL KEYS -->

            <!-- BEGIN SEARCH -->
            <li>
                <a href="{{ route('search') }}">
                    <div class="gui-icon"><i class="md md-folder-shared"></i></div>
                    <span class="title">Search</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END SEARCH -->

        </ul><!--end .main-menu -->
        <!-- END MAIN MENU -->
    </div><!--end .menubar-scroll-panel-->
</div><!--end #menubar-->

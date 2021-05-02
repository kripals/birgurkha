<section id="slider" class="slider-element slider-parallax swiper_wrapper vh-75">
    <div class="slider-inner">
        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide dark">
                        <div class="container">
                            <div class="slider-caption slider-caption-center">
                                <h2 data-animate="fadeInUp">{{ $slider->title }}</h2>
                                <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">{{ $slider->description }}</p>
                            </div>
                        </div>
                        <div class="swiper-slide-bg" style="background-image: url('{{ asset($slider->images->path) }}');"></div>
                    </div>
                @endforeach
            </div>
            <div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
            <div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
            <div class="slide-number"><div class="slide-number-current"></div><span>/</span><div class="slide-number-total"></div></div>
        </div>
    </div>
</section>
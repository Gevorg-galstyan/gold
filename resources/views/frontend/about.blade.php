@extends('frontend.layouts.app')

@section('content')

    <!-- ===================== ABOUT ========================== -->
    <section id="section-about" class="my-5">
        <div class="own-container">
            <div class="row justify-content-between mob-partner-logo">
                <div class="col-12">
                    <div class="text-center w-100  mb-lg-3 d-flex justify-content-center">
                        <div>
                            <h2 class="color-white font-trajan about-header">About JAS</h2>
                            <hr class="border-line border-color  my-3"/>
                        </div>
                    </div>
                    <p class="about-text color-white">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                        and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                        leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                        with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                        publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- ===================== TEAM ========================== -->
    <section id="section-team">
        <div class="row justify-content-center">
            <div>
                <h2 class="color-white font-trajan about-header">JAS TEAM</h2>
                <hr class="border-line border-color  my-3"/>
            </div>
        </div>
        <div class="container">
            <div class="owl-carousel">
                <div>
                    <div class="img__area"><img src="img/about/ugmonk-bag-1.jpg" alt=""></div>
                    <div class="text__area">
                        <p>SOME TEXT</p>
                    </div>
                </div>
                <div>
                    <div class="img__area"><img src="img/about/ugmonk-bag-2.jpg" alt=""></div>
                    <div class="text__area">
                        <p>SOME TEXT</p>
                    </div>
                </div>
                <div>
                    <div class="img__area"><img src="img/about/ugmonk-bag-3.jpg" alt=""></div>
                    <div class="text__area">
                        <p>SOME TEXT</p>
                    </div>
                </div>
                <div>
                    <div class="img__area"><img src="img/about/ugmonk-bag-1.jpg" alt=""></div>
                    <div class="text__area">
                        <p>SOME TEXT</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@extends('layouts.election-template')
@include('auth.login')

@section('content')

        <div class="banner">
            <div class="container">
                <section class="slider">
                    <div class="flexslider">
                        @yield('login')
                        <ul class="slides">
                            <li>
                                <div class="banner-info">
                                    <div class="dummy_text">
                                        <h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore magna
                                            aliqua.</h1>
                                        </h1>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="banner-info">
                                    <div class="dummy_text">
                                        <h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore magna
                                            aliqua.
                                        </h1>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="banner-info">
                                    <div class="dummy_text">
                                        <h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore magna
                                            aliqua.
                                        </h1>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
            <!-- FlexSlider -->
            <script defer src="{{ asset('election-template/js/jquery.flexslider.js')  }}"></script>
            <script type="text/javascript">
                $(window).load(function(){
                    $('.flexslider').flexslider({
                        animation: "slide",
                        start: function(slider){
                            $('body').removeClass('loading');
                        }
                    });
                });
            </script>
            <!-- //FlexSlider -->
        </div>
        <!-- //banner -->
        <div class="container">
    </div>
@endsection

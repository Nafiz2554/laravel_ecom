@extends('auth.layouts.base')
@section('main-container')
    {{-- Add to cart success --}}
    <div class="container text-center">

        @if (session('success'))
            <div class="alert alert-info">
                {{ session('success') }}
            </div>
        @endif
    </div>


    <!-- Products search -->
    <div class="container-fluid pb-3">
        <div class="row px-xl-5">
            @if ($product_search != false)


                @if (!empty($product_search[0]))
                    @foreach ($product_search as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 pb-1" id="prod">
                            <div class="product-item bg-light mb-4" style="border-radius:20px;">
                                <div class="product-img position-relative overflow-hidden">
                                    <img class="img-fluid w-90" style="height:280px;"
                                        src="{{ asset('/storage/' . $product->image) }}" alt="">
                                    <div class="product-action">
                                        <a class="btn btn-outline-dark btn-square"
                                            href="{{ route('add.to.cart', $product->id) }}"><i
                                                class="fa fa-shopping-cart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i
                                                class="fa fa-sync-alt"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i
                                                class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate"
                                        href="{{ url('productviewlog/' . $product->id) }}">{{ $product->product_name }}</a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5>{{ $product->product_price }}</h5>
                                        <h6 class="text-muted ml-2"><del>{{ $product->product_price + 200 }}</del></h6>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mb-1">
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small>{{ $product->review }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert bg-warning col mx-auto text-center" role="alert"><h3>No product found!</h3></div>
                @endif

            @endif

        </div>
    </div>
    <!-- Products search end -->


    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        @for ($i = 0; $i < $total_banner; $i++)
                            <li data-target="#header-carousel" data-slide-to="$i"></li>
                        @endfor

                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="assets/img/tor3.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1
                                        class="display-4 text-primary mb-3 animate__animated animate__fadeInDown text-uppercase">
                                        Welcome to TENTEX</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet
                                        lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                        href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        @foreach ($banner_nav as $nav)
                            <div class="carousel-item position-relative" style="height: 430px;">
                                <img class="position-absolute w-100 h-100" src="{{ asset('/storage/' . $nav->image) }}"
                                    style="object-fit: cover;">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h1
                                            class="display-4 text-primary mb-3 animate__animated animate__fadeInDown text-uppercase">
                                            {{ $nav->title }}</h1>
                                        <p class="mx-md-5 px-5 animate__animated animate__bounceIn">{{ $nav->desc }}</p>
                                        <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                            href="#">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-lg-4">

                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="{{ asset('/storage/' . $blogs[0]->image) }}" alt="">
                    <div class="offer-text">
                        <h3 class="text-white mb-3">{{ $blogs[0]->title }}</h3>
                        <a href="/dashboard#prod" class="btn btn-info">Shop Now</a>
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="{{ asset('/storage/' . $blogs[1]->image) }}" alt="">
                    <div class="offer-text">
                        <h3 class="text-white mb-3">{{ $blogs[1]->title }}</h3>
                        <a href="/dashboard#prod" class="btn btn-info">Shop Now</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Vendor Start -->
    <div class="container-fluid py-5">

        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Find your
                choice</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">

                    @foreach ($all_product as $product)
                        <div class="bg-light p-4">
                            <div class="product-item bg-light mb-4">
                                <div class="product-img position-relative overflow-hidden">
                                    <img style="height:120px;" class="img-fluid w-100"
                                        src="{{ asset('/storage/' . $product->image) }}" alt="">
                                    <div class="product-action p-2">
                                        <a class="btn btn-outline-dark btn-square text-danger bg-info"
                                            href="{{ route('add.to.cart', $product->id) }}"><i
                                                class="fa fa-shopping-cart"></i></a>
                                        <a class="btn btn-outline-dark btn-square text-danger bg-info" href=""><i
                                                class="far fa-heart"></i></a>
                                        <a class="btn btn-outline-dark btn-square text-danger bg-info" href=""><i
                                                class="fa fa-sync-alt"></i></a>

                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate"
                                        href="{{ url('productviewlog/' . $product->id) }}">{{ $product->product_name }}</a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5>{{ $product->product_price }}</h5>
                                        <h6 class="text-muted ml-2"><del>{{ $product->product_price + 200 }}</del></h6>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mb-1">
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star-half-alt text-primary mr-1"></small>
                                        <small>(99)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->



    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                class="bg-secondary pr-3">Categories</span></h2>
        <div class="row px-xl-5 pb-3">


            @foreach ($cat_all as $cat)
                <div class="col-lg-4 col-md-4 col-sm-6 pb-1">
                    <a class="text-decoration-none" href="{{ url('sub-category-log/' . $cat->id) }}">
                        <div class="cat-item d-flex align-items-center mb-4">
                            <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                <img class="img-fluid" src="{{ asset('/storage/' . $cat->image) }}" alt="">
                            </div>
                            <div class="flex-fill pl-3">
                                <h6><b>Name:</b> {{ $cat->name }}</h6>
                                <small class="text-body">{{ $cat->type }}</small>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach


        </div>
    </div>
    <!-- Categories End -->

    <!-- Sub-category Start -->
    <div style="background: url('assets/img/ban6.webp')" id="sub">
        <div class="container py-5">

            <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                    class="bg-light pr-3">Sub-Categories</span></h2>
            <div class="row px-xl-5">
                <div class="col">
                    <div class="owl-carousel vendor-carousel">

                        @foreach ($sub_all as $sub)
                            <div class="bg-primary p-4">

                                <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                    <a href="{{ asset('/storage/' . $sub->image) }}"><img style="height: 100px;"
                                            class="img-fluid w-100" src="{{ asset('/storage/' . $sub->image) }}"
                                            alt=""></a>
                                </div>
                                <div class="flex-fill pl-3">
                                    <a href="{{ url('view-product-log/' . $sub->id) }}">
                                        <h6 class="py-2"><b>{{ $sub->sub_name }}</b></h6>
                                        <span class="text-body"><b>{{ $sub->sub_type }}</b></span>
                                    </a>
                                </div>

                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>



        <div class="container py-5">
            <div class="row px-xl-5">
                <div class="col">
                    <div class="owl-carousel vendor-carousel">

                        @foreach ($sub_dec as $sub)
                            <div class="bg-primary p-4">

                                <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                    <a href="{{ asset('/storage/' . $sub->image) }}"><img style="height: 100px;"
                                            class="img-fluid w-100" src="{{ asset('/storage/' . $sub->image) }}"
                                            alt=""></a>
                                </div>
                                <div class="flex-fill pl-3">
                                    <a href="{{ url('view-product-log/' . $sub->id) }}">
                                        <h6 class="py-2"><b>{{ $sub->sub_name }}</b></h6>
                                        <span class="text-body"><b>{{ $sub->sub_type }}</b></span>
                                    </a>
                                </div>

                            </div>
                        @endforeach


                    </div>
                </div>
            </div>


            <div class="sub-main d-flex justify-content-center p-4">
                <button class="button-three">View More ▼</button>
            </div>

        </div>
    </div>
    <!-- Sub-category End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured
                Products</span></h2>
        <div class="row px-xl-5">


            @foreach ($all_product as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1" id="prod">
                    <div class="product-item bg-light mb-4" style="border-radius:20px;">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-90" style="height:280px;"
                                src="{{ asset('/storage/' . $product->image) }}" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square"
                                    href="{{ route('add.to.cart', $product->id) }}"><i
                                        class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate"
                                href="{{ url('productviewlog/' . $product->id) }}">{{ $product->product_name }}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>{{ $product->product_price }}</h5>
                                <h6 class="text-muted ml-2"><del>{{ $product->product_price + 200 }}</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>{{ $product->review }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="container-fluid">
                <div class="row p-3">
                    {{ $all_product->links() }}
                </div>
            </div>


        </div>
    </div>
    <!-- Products End -->
@endsection

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
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop Detail</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->
    @foreach ($all_product as $product)
        <div class="container-fluid pb-5">
            <div class="row px-xl-5">
                <div class="col-lg-5 mb-30">
                    <img style="width: 100%; height:620px;" src="{{ asset('/storage/' . $product->image) }}" alt="Image">
                </div>

                <div class="col-lg-7 h-auto mb-30">
                    <div class="h-100 bg-light p-30">
                        <h3>{{ $product->product_name }}</h3>
                        <div class="d-flex mb-3">
                            <div class="text-primary mr-2">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                            </div>

                        </div>
                        <h3 class="font-weight-semi-bold mb-4">{{ $product->product_price }} ৳</h3>

                        <div class="d-flex mb-3">
                            <strong class="text-dark mr-3">Sizes: {{ $product->product_size }}</strong>
                        </div>

                        <div class="d-flex mb-3">
                            <strong class="text-dark mr-3">Quantity: {{ $product->product_quantity }}</strong>
                        </div>

                        <div class="d-flex mb-3">
                            <strong class="text-dark mr-3">Tag: {{ $product->product_name }}</strong>
                        </div>

                        <div class="d-flex mb-4">
                            <strong class="text-dark mr-3">Stock: {{ $product->stock }}</strong>
                        </div>


                        <div class="d-flex align-items-center mb-4 pt-2">
                            {{-- <a type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To
                                Cart</a> --}}
                            <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}"
                                    class="btn btn-warning btn-block text-center" role="button"> <i class="fa fa-shopping-cart"></i> Add to cart</a> </p>
                        </div>

                        <div class="d-flex pt-2">
                            <strong class="text-dark mr-2">Share on:</strong>
                            <div class="d-inline-flex">
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-pinterest"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="row px-xl-5">
                <div class="col">
                    <div class="bg-light p-30">
                        <div class="nav nav-tabs mb-4">
                            <a class="nav-item nav-link text-dark active" data-toggle="tab"
                                href="#tab-pane-1">Description</a>
                            <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Reviews</a>
                        </div>
                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="tab-pane-1">
                                <h4 class="mb-3">Product Description</h4>
                                <p>{{ $product->product_desc }}</p>

                            </div>

                            <div class="tab-pane fade" id="tab-pane-2">
                                <h4 class="mb-3">Product Review</h4>
                                <p>{{ $product->review }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Shop Detail End -->
@endsection

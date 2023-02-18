@extends('frontend.layouts.base')
@section('main-container')
    <!-- The gap start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">

            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">

                </div>
            </div>
        </div>
    </div>
    <!-- The gap end -->
    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">All Sub
                Categories</span></h2>
        <div class="row px-xl-5 pb-3">

            @foreach ($sub_all as $sub)
                <div class="col-lg-4 col-md-4 col-sm-6 pb-1">
                    <a class="text-decoration-none" href="{{ url('view-product/' . $sub->id) }}">
                        <div class="cat-item d-flex align-items-center mb-4">
                            <div class="overflow-hidden">
                                <img class="img-fluid" style="width: 100px; height: 100px;"
                                    src="{{ asset('/storage/' . $sub->image) }}" alt="">
                            </div>
                            <div class="flex-fill pl-3">
                                <h4>Name: {{ $sub->sub_name }}</h4>
                                <span>{{ $sub->sub_type }}</span>
                                
                            </div>
                        </div>
                    </a>
                    

                </div>
            @endforeach


        </div>
    </div>
    <!-- Categories End -->
@endsection

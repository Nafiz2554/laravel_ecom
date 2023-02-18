@extends('auth.layouts.base')
@section('main-container')
    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">All Sub
                Categories</span></h2>
        <div class="row px-xl-5 pb-3"> 
            
            @foreach ($sub_all as $sub)
                <div class="col-lg-4 col-md-4 col-sm-6 pb-1">
                    <a class="text-decoration-none" href="{{ url('view-product-log/' . $sub->id) }}">
                        <div class="cat-item d-flex align-items-center mb-4">
                            <div class="overflow-hidden">
                                <img class="img-fluid"  style="width: 100px; height: 100px;" src="{{ asset('/storage/' . $sub->image) }}" alt="">
                            </div>
                            <div class="flex-fill pl-3">
                                <h6>Name: {{$sub->sub_name}}</h6>
                                <p>{{$sub->sub_type}}</p>
                                {{-- <small class="text-body">{{$sub->sub_desc}}</small> --}}
                            </div>
                        </div>
                    </a>
                     
                </div>
            @endforeach
            

        </div>
    </div>
    <!-- Categories End -->
@endsection

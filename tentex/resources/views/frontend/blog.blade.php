@extends('frontend.layouts.base')
@section('main-container')
     
     

    <!-- Blog Start -->
    <div class="container">
        @foreach ($blogs as $blog)
            <div class="row">

                <div class="col-md-6 p-2">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('/storage/' . $blog->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="text-center">Blog Story</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">

                    <h4 class="text-center p-3">{{ $blog->title }}</h4>
                    <p style="color: brown;" class="text-justify">{{ $blog->desc }}</p>

                </div>
            </div>
        @endforeach
    </div>

    <!-- Blog End -->
@endsection

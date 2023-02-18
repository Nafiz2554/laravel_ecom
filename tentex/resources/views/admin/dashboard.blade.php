@extends('admin.admin_master')
@section('admin_content')
    <style>
        .centered {
            position: absolute;
            top: 18%;
            left: 55%;
            transform: translate(-50%, -50%);
            color: rgb(255, 72, 0);
            font-weight: bolder;
        }
    </style>

    <div class="centered">
        
        <a href="" class="text-decoration-none">
            <img style="width: 420px;" src="{{ asset('assets/img/20221123_014119.png') }}"
                alt="">
        </a>

    </div>
    <img class="w-100 h-100" src="{{ asset('assets/img/to.png') }}" alt="">




    <!--/.fluid-container-->
@endsection

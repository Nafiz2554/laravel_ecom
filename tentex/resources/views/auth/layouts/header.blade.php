<!-- Topbar Start -->
<div class="container-fluid">

    <div class=" align-items-center py-3 px-xl-5 d-flex">
        <div class="col-lg-4">
            <a href="" class="text-decoration-none">
               <img style="width: 150px;height:75px" src="{{ asset('assets/img/on.png') }}" alt="">
            </a>
        </div>
        <div class="col-lg-4">
            {{-- search --}}
            <form action="{{ url('/product-search') }}" method="GET">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search...." name="product_name">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text bg-transparent text-success">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-4 col-6 text-right d-none d-lg-block">
            <p class="m-0 text-dark">📲 Customer Service</p>
            <h5 class="m-0">01718231406</h5>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid bg-dark mb-30">
    <div class="row px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn d-flex align-items-center justify-content-between bg-success w-100" data-toggle="collapse"
                href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                <h4 class="text-light m-0"><i class="fa fa-bars mr-2"></i>CATEGORIES</h4>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light"
                id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                <div class="navbar-nav w-100">

                    @foreach ($cat_all as $cat)
                        <a href="{{ url('sub-category-log/' . $cat->id) }}" class="nav-item nav-link bg-light">🕐
                            <b>{{ $cat->name }}</b></a>
                    @endforeach

                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{ url('/dashboard') }}" class="nav-item nav-link">Home</a>
                        <a href="/dashboard#sub" class="nav-item nav-link">Sub-Category</a>
                        <a href="/dashboard#prod" class="nav-item nav-link">Products</a>
                        <a href="{{ url('/all-faq') }}" class="nav-item nav-link">FaQs</a>
                        <a href="{{ url('/all-blog') }}" class="nav-item nav-link">Blogs</a>
                        <a href="{{ url('/contact-us-log') }}" class="nav-item nav-link">Contact</a>
                        <a href="{{ url('/logout') }}" class="nav-item nav-link"><i class="fas fa-sync-alt fa-spin"></i>
                            Log out</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0">

                        <div class="dropdown">
                            <button type="button" class="btn btn-success" data-toggle="dropdown">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span
                                    class="badge badge-pill badge-primary">{{ count((array) session('cart')) }}</span>
                            </button>
                            <div class="dropdown-menu">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-6">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span
                                            class="badge badge-pill badge-info">{{ count((array) session('cart')) }}</span>
                                    </div>
                                    @php $total = 0 @endphp
                                    @foreach ((array) session('cart') as $id => $details)
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                    @endforeach
                                    <div class="col-lg-6 col-sm-6 col-6 text-right">
                                        <p>Total: <span class="text-info"> {{ $total }} ৳</span></p>
                                    </div>
                                </div>
                                <hr>
                                @if (session('cart'))
                                    @foreach (session('cart') as $id => $details)
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-4 col-4">
                                                <img style="width:60px; height:60px;"
                                                    src="{{ asset('/storage/' . $details['image']) }}" />
                                            </div>
                                            <div class="col-lg-8 col-sm-8 col-8">
                                                <p>{{ $details['name'] }}</p>
                                                <span class="price text-info"> {{ $details['price'] }} ৳</span> <span
                                                    class="count"> Quantity:{{ $details['quantity'] }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                        <a href="{{ route('cart') }}" class="btn btn-info btn-block">View all</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->

<div class=" " style="position: fixed;
z-index: 9999;">
    <a class="btn btn-success btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
    <a class="btn btn-warning btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
    <a class="btn btn-success btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
    <a class="btn btn-warning btn-square" href="#"><i class="fab fa-instagram"></i></a>
</div>

<style>
    .dropdown {
        float: right;
        padding-right: 30px;
    }

    .dropdown .dropdown-menu {
        padding: 20px;
        top: 60px !important;
        width: 350px !important;
        left: -230px !important;
        box-shadow: 0px 5px 30px black;
    }

    .dropdown-menu:before {
        content: " ";
        position: absolute;
        top: -20px;
        right: 50px;
        border: 10px solid transparent;
        border-bottom-color: #fff;
    }
</style>

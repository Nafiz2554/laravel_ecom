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
             <form action="{{ url('/product-searchs') }}" method="GET">
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
             <p class="m-0 text-dark"> 📱 Customer Service</p>
             <h5 class="m-0">01575179484</h5>
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
                 <h4 class="text-light m-0"><i class="fa fa-bars mr-2"></i>CATEGORIES ⮮</h4>
                 <i class="fa fa-angle-down text-dark"></i>
             </a>
             <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light"
                 id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                 <div class="navbar-nav w-100">

                     @foreach ($cat_all as $cat)
                         <a href="{{ url('sub-category/' . $cat->id) }}" class="nav-item nav-link bg-light"><i
                                 class="fab fa-edge"></i>
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
                         <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                         <a href="/#prod" class="nav-item nav-link">Products</a>
                         <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Category
                             </a>
                             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                 @foreach ($cat_all as $cat)
                                     <a href="{{ url('sub-category/' . $cat->id) }}" class="dropdown-item"><i
                                             class="fas fa-angle-right"></i>
                                         <b>{{ $cat->name }}</b></a>
                                 @endforeach
                             </div>
                         </li>
                         <a href="/#sub" class="nav-item nav-link">Sub-Category</a>
                         <a href="{{ url('/contact-us') }}" class="nav-item nav-link">Contact</a>
                         <a href="{{ url('/all-faqs') }}" class="nav-item nav-link">FaQs</a>
                         <a href="{{ url('/all-blogs') }}" class="nav-item nav-link">Blogs</a>
                         <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                     class="fa fa-user"></i>
                                 My Account
                             </a>
                             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                 <a class="dropdown-item" href="{{ url('/login') }}">LOGIN</a>
                                 <div class="dropdown-divider"></div>
                                 <a class="dropdown-item" href="{{ url('/registration') }}">REGISTRATION</a>
                             </div>
                         </li>



                     </div>
                     <div class="navbar-nav ml-auto py-0 d-none d-lg-block">


                         <div class="d-flex">
                             <a style="border-radius:50%;" class="btn btn-success btn-square mr-2" href="#"><i
                                     class="fab fa-twitter"></i></a>
                             <a style="border-radius:50%;" class="btn btn-success btn-square mr-2" href="#"><i
                                     class="fab fa-facebook-f"></i></a>
                             <a style="border-radius:50%; " class="btn btn-success btn-square mr-2" href="#"><i
                                     class="fab fa-linkedin-in"></i></a>
                             <a style="border-radius:50%;" class="btn btn-success btn-square" href="#"><i
                                     class="fab fa-instagram"></i></a>
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
     
     <a target="_blank" class="btn btn-warning btn-square mr-2" href="https://www.facebook.com/TenTexBD/"><i class="fab fa-facebook-f"></i></a>
     <a class="btn btn-success btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
     <a class="btn btn-warning btn-square" href="#"><i class="fab fa-instagram"></i></a>
 </div>



 <style>
     .naf {

         position: fixed;
         z-index: 9999;
         /* Set the navbar to fixed position */

         /* Position the navbar at the top of the page */
         width: 100%;
         /* Full width */
     }
 </style>

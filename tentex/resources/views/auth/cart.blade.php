@extends('auth.layouts.base')
@section('main-container')



    @if (session()->has('message'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <h6 class="text-center"><strong>{{ session()->get('message') }}</strong></h6>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table id="cart" class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @php $total = 0 @endphp
                        @if (session('cart'))
                            @foreach (session('cart') as $id => $details)
                                @php $total += ($details['price']-$details['discount']) * $details['quantity'] @endphp
                                <tr data-id="{{ $id }}" class="">
                                    <td data-th="Product" class="align-middle">
                                        <img src="{{ asset('/storage/' . $details['image']) }}" width="100"
                                            height="100" class="img-responsive" />
                                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                                    </td>
                                    <td data-th="Price">
                                        {{ ($details['price']-$details['discount']) }}
                                    </td>
                                    <td data-th="Quantity">
                                        <input type="number" value="{{ $details['quantity'] }}"
                                            class="form-control quantity update-cart col-md-4 mx-auto" />
                                    </td>
                                    <td data-th="Subtotal" class="text-center">
                                        {{ ($details['price'] - ($details['price'] * $details['discount']) / 100) * $details['quantity'] }}
                                        ৳</td>
                                    <td class="actions" data-th="">
                                        <button class="btn btn-danger btn-sm remove-from-cart"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
                @if (empty(session('cart')))
                    <h2 class="text-center p-3">
                        <span style="border-radius:16px;" class="badge badge-pill badge-danger">No Item Added to
                            Order !</span>
                    </h2>
                @endif
            </div>

            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart
                        Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>{{ $total }} ৳</h6>
                        </div>

                    </div>
                    <form action="{{ url('/order') }}" method="POST">
                        @csrf
                        <div class="pt-2">
                            <select id="number-selector" onchange="addNumber()" name="" class="form-control">
                                <option selected disabled>Select Shipping</option>

                                <option value="150">Inside Dhaka</option>

                                <option value="500">Outside Dhaka</option>





                            </select>

                            <script>
                                function addNumber() {
                                    var select = document.getElementById("number-selector");
                                    var selectedValue = select.value;
                                    var number = Number(selectedValue);
                                    var totals = {{$total}};
                                    totals += number;
                                    document.getElementById("result").value = totals;
                                }
                            </script>
                            <div class="d-flex justify-content-between mt-2">

                                <h5>Total:</h5>
                                <h5><input id="result" type="text" name="price"> ৳</h5>
                            </div>
                            <input class="form-control" type="text" placeholder="Your Phone Number" name="user_phone"
                                required>
                            <input style="margin-top: 10px;" class="form-control" type="text" placeholder="Your Address"
                                name="user_add" required>
                            {{-- <input type="hidden" class="form-control" type="text" name="price"
                                value="{{ $total }}"> --}}
                            @php
                                if (empty(session('cart'))) {
                                    $dis = 'disabled';
                                } else {
                                    $dis = '';
                                }
                            @endphp
                            <button {{ $dis }} type="submit"
                                class="btn btn-block btn-primary font-weight-bold my-3 py-3  ">Proceed To
                                Checkout</button>

                        </div>
                    </form>
                </div>
            </div>




        </div>
    </div>
    <!-- Cart End -->
    {{-- dummy start --}}
    {{-- <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr data-id="{{ $id }}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}" width="100"
                                        height="100" class="img-responsive" /></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">${{ $details['price'] }}</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}"
                                class="form-control quantity update-cart" />
                        </td>
                        <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right">
                    <h3><strong>Total ${{ $total }}</strong></h3>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="text-right">
                    <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue
                        Shopping</a>
                    <button class="btn btn-success">Checkout</button>
                </td>
            </tr>
        </tfoot>
    </table> --}}

    {{-- dummy end --}}

    <script type="text/javascript">
        $(".update-cart").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection

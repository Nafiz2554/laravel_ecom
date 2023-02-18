@extends('admin.admin_master')
@section('admin_content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">All Client's Order Request</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Orders</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="btn btn-primary">
                            <i class="fas fa-file-pdf"></i>
                        </a>

                    </div>
                </div>
            </div>
            <!-- /Page Header -->


            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h6 class="text-center"><strong>{{ session()->get('message') }}</strong></h6>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif



            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-center table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Id</th>
                                            <th>Customer Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Products Details</th>
                                            <th> Total price</th>
                                            <th>Order Status</th>
                                            <th>Change Status(Order)</th>
                                            <th>Payment Status</th>
                                            <th>Change Status(Payment)</th>
                                            <th>Delete Order</th>


                                        </tr>
                                    </thead>

                                    @foreach ($orders as $order)
                                        <tbody>
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->user_id }}</td>
                                                <td>{{ $order->user_name }}</td>
                                                <td>{{ $order->email }}</td>
                                                <td>{{ $order->user_phone }}</td>
                                                <td>{{ $order->user_add }}</td>
                                                <td class="text-center">

                                                    <button type="button" class="bg-info" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $order->id }}">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </button>
                                                     
                                                    {{-- {{ $order->product_names }} --}}

                                                </td>
                                                <td>{{ $order->price }} Tk</td>
                                                <td>
                                                    @if ($order->confirm == 1)
                                                        <span class="badge bg-success">Confirmed</span>
                                                    @else
                                                        <span class="badge bg-danger">Pending</span>
                                                    @endif

                                                </td>
                                                <td>
                                                    <div class="d-flex flex-row justify-content-center">
                                                        <button id="{{ $order->id }}"
                                                            class="bg-{{ $order->confirm ? 'danger' : 'success' }} mx-2 confirm"></i>
                                                            @php
                                                                if ($order->confirm) {
                                                                    echo 'Cancel';
                                                                } else {
                                                                    echo 'Confirm';
                                                                }
                                                            @endphp
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    @if ($order->status == 1)
                                                        <span class="badge bg-success">Paid</span>
                                                    @else
                                                        <span class="badge bg-danger">Unpaid</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-row justify-content-center">
                                                        @if ($order->status == 1)
                                                            <a href="{{ url('/order-status' . $order->id) }}">
                                                                <i style="color:green;" class="fa fa-toggle-on fa-2x"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{ url('/order-status' . $order->id) }}">
                                                                <i class="fa fa-toggle-off fa-2x"
                                                                    style="color:rgb(158, 9, 9);"></i>
                                                            </a>
                                                        @endif

                                                    </div>
                                                </td>
                                                <td>

                                                    <button id="{{ $order->id }}" onclick="deleteorder(this.id)"
                                                        class="bg-danger mx-3 delete" type="button">
                                                        <i class="fa fa-trash"></i>
                                                    </button>

                                                </td>


                                            </tr>

                                        </tbody>

                                        <!-- Modal start -->
                                        <div class="modal fade" id="exampleModal{{ $order->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel{{ $order->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><b>Order Details</b></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container text-center">{{ $order->product_names }}</div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal end -->
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->

    <script>
        confirms = document.getElementsByClassName('confirm');
        Array.from(confirms).forEach((element) => {
            element.addEventListener("click", (e) => {
                // console.log(e.target.id)
                if (confirm("Do You want To Change This Order Status!")) {
                    window.location = `/confirm-order/${e.target.id}`;
                }
            })
        })
    </script>

    <script>
        function deleteorder(id) {
            console.log(id)
            if (confirm("Do You want To Delete This Order!")) {
                window.location = `orderdelete/` + id;
            }
        }
    </script>
@endsection

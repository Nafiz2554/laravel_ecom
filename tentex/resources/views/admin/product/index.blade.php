@extends('admin.admin_master')
@section('admin_content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Products</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">All Products</li>
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
            <p class="alert-info text-center">
                <?php
                $message = Session()->get('message');
                if ($message) {
                    echo $message;
                    Session()->put('message', null);
                }
                ?>
            </p>



            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-center table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Id</th>
                                            <th>Product Name</th>
                                            <th>Product Type</th>
                                            <th>Product Description</th>
                                            <th>Product Price</th>
                                            <th>Discount(%)</th>
                                            <th>Size</th>
                                            <th>Quantity</th>
                                            <th>Tag</th>
                                            <th>Stock</th>
                                            <th>Review</th>
                                            <th>Sub-Category Id</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>

                                    @foreach ($products as $product)
                                        <tbody>
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->product_name }}</td>
                                                <td>{{ $product->product_type }}</td>
                                                <td>{{ $product->product_desc }}</td>
                                                <td>{{ $product->product_price }}</td>
                                                <td>{{ $product->discount }}</td>
                                                <td>{{ $product->product_size }}</td>
                                                <td>{{ $product->product_quantity }}</td>
                                                <td>{{ $product->tag }}</td>
                                                <td>{{ $product->stock }}</td>
                                                <td>{{ $product->review }}</td>
                                                <td>{{ $product->sub_id }}</td>
                                                <td><img src="{{ asset('/storage/' . $product->image) }}"
                                                        style="width: 105px; height:105px;"> </td>
                                                <td>
                                                    @if ($product->status == 1)
                                                        <span class="badge bg-primary">Active</span>
                                                    @else
                                                        <span class="badge bg-warning">Deactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @if ($product->status == 1)
                                                            <a href="{{ url('/product-status' . $product->id) }}"
                                                                class="btn btn-success">
                                                                <i class="fa fa-thumbs-down"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{ url('/product-status' . $product->id) }}"
                                                                class="btn btn-danger">
                                                                <i class="fa fa-thumbs-up"></i>
                                                            </a>
                                                        @endif

                                                         
                                                        <button style="margin-left:10px;" type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal{{ $product->id }}">
                                                            <i class="fa fa-edit"></i>
                                                        </button>


                                                        <form style="padding-left:10px;"
                                                            action="{{ url('/product-delete/' . $product->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>

                                                </td>

                                            </tr>

                                        </tbody>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $product->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel{{ $product->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModal{{ $product->id }}">Edit Your Product</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="{{ url('/update-product/' . $product->id) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Product Name:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="product_name" value="{{ $product->product_name }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Product Type:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="product_type" value="{{ $product->product_type }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Product Description:</label>
                                                                        <textarea class="form-control" rows="3" name="product_desc">{{ $product->product_desc }}</textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Product Price:</label>
                                                                        <input type="text" class="form-control" name="product_price" value="{{ $product->product_price }}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Discount(%):</label>
                                                                        <input type="text" class="form-control" name="discount" value="{{ $product->discount }}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Product Tag:</label>
                                                                        <input type="text" class="form-control" name="tag" value="{{ $product->tag }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Product Review:</label>
                                                                        <input type="text" class="form-control" name="review" value="{{ $product->review }}">
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6">

                                                                    <div class="form-group">
                                                                        <label>Sub-Category Id:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="sub_id" value="{{ $product->sub_id }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Product Size:</label>
                                                                        <input type="text" class="form-control" name="product_size" value="{{ $product->product_size }}">
                                                                    </div>
                            
                                                                    <div class="form-group">
                                                                        <label>Product Quantity:</label>
                                                                        <input type="text" class="form-control" name="product_quantity" value="{{ $product->product_quantity }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Product Stock:</label>
                                                                        <input type="text" class="form-control" name="stock" value="{{ $product->stock }}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Image:</label>
                                                                        <input type="file" class="form-control"
                                                                            name="image">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-end mt-4">
                                                                <button type="submit" class="btn btn-primary">Edit</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                     
                                                </div>
                                            </div>
                                        </div>

                                        {{-- modalend --}}
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

 
@endsection

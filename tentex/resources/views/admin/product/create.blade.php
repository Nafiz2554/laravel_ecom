@extends('admin.admin_master')
@section('admin_content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">All Products</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="customers.html">Product</a></li>
                            <li class="breadcrumb-item active">Add Product</li>
                        </ul>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Product Info</h4>
                            <form action="{{ url('/products/') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Name:</label>
                                            <input type="text" class="form-control" name="product_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Type:</label>
                                            <select name="product_type" class="form-control">
                                                <option selected disabled>Select ⮟</option>
                                                <option value="Male">Electronics</option>
                                                <option value="Female">Hardwares</option>
                                                <option value="Kids">Machine</option>
                                                <option value="Others">Device</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Product Description:</label>
                                            <textarea class="form-control" rows="3" name="product_desc"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Product Price:</label>
                                            <input type="text" class="form-control" name="product_price" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Product Tag:</label>
                                            <input type="text" class="form-control" name="tag">
                                        </div>
                                        <div class="form-group">
                                            <label>Product Review:</label>
                                            <input type="text" class="form-control" name="review">
                                        </div>

                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Select Sub-Category:</label>
                                            <select name="sub_id" class="form-control" required>
                                                <option selected disabled>Select ⮟</option>
                                                @foreach ($subcategory_all as $subcategory)
                                                    <option value="{{ $subcategory->id }}">{{ $subcategory->sub_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Product Size:</label>
                                            <input type="text" class="form-control" name="product_size">
                                        </div>

                                        <div class="form-group">
                                            <label>Product Quantity:</label>
                                            <input type="text" class="form-control" name="product_quantity">
                                        </div>
                                        <div class="form-group">
                                            <label>Product Stock:</label>
                                            <input type="text" class="form-control" name="stock">
                                        </div>
                                        <div class="form-group">
                                            <label>Add Discount:</label>
                                            <input type="text" class="form-control" name="discount">
                                        </div>

                                        <div class="form-group">
                                            <label>Upload A Clear Image:</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-primary">Add Product</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

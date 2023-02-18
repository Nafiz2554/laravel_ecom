@extends('admin.admin_master')
@section('admin_content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">All Sub-Categories</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="customers.html">Product Sub-Categories</a></li>
                            <li class="breadcrumb-item active">Add Sub-Categories</li>
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
                            <h4 class="card-title">Sub-category Info</h4>
                            <form action="{{ url('/subcategories/') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sub-Category Name:</label>
                                            <input type="text" class="form-control" name="sub_name" required>
                                        </div>
                                         
                                        <div class="form-group">
                                            <label>Sub-Category Type:</label>
                                            <select name="sub_type" class="form-control" required>
                                                <option selected disabled>Select ⮟</option>
                                                <option value="hardware">Hardware</option>
                                                <option value="electric">Electric</option>
                                                <option value="sanitary">Sanitary</option>
                                                <option value="paint">Paint</option>
                                                <option value="others">Others</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Sub-Category Description:</label>
                                            <textarea class="form-control" rows="3" name="sub_desc" required></textarea>
                                        </div>

                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Select Category:</label>
                                            <select name="cat_id" class="form-control" required>
                                                <option selected disabled>Select ⮟</option>
                                                @foreach ($category_all as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Image:</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-primary">Add Sub-Category</button>
                                </div>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

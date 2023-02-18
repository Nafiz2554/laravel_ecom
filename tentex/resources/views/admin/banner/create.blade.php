@extends('admin.admin_master')
@section('admin_content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Banner Section</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="customers.html">Banners</a></li>
                            <li class="breadcrumb-item active">Add Banner</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Banner Info</h4>
                            <form action="{{ url('/banners/') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title:</label>
                                            <input type="text" class="form-control" name="title" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Short Description:</label>
                                            <input type="text" class="form-control" name="desc" required>
                                        </div>
                                         

                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Banner Image:</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-primary">Add Banner</button>
                                </div>
                            </form>
                            <p class="alert-info text-center">
                                <?php
                                $message = Session()->get('message');
                                if ($message) {
                                    echo $message;
                                    Session()->put('message', null);
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

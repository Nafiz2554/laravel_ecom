@extends('admin.admin_master')
@section('admin_content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Faqs</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="customers.html">Faqs</a></li>
                            <li class="breadcrumb-item active">Add Faqs</li>
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
                            <h4 class="card-title">Faq Info</h4>
                            <form action="{{ url('/faqs/') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Add Question:</label>
                                            <input type="text" class="form-control" name="ques">
                                        </div>

                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Add Answer:</label>
                                            <input type="text" class="form-control" name="ans">
                                        </div>


                                    </div>
                                </div>
                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-primary">Add Faq</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection

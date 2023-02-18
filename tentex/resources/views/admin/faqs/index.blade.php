@extends('admin.admin_master')
@section('admin_content')
   

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">All Faqs</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Faqs</li>
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
                                            <th>Questions?</th>
                                            <th>Answers</th> 
                                            <th>Status</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>

                                    @foreach ($faqs as $faq)
                                        <tbody>
                                            <tr>
                                                <td>{{ $faq->id }}</td>
                                                <td>{{ $faq->ques }}</td>
                                                <td class="text-wrap">{{ $faq->ans }}</td> 
                                                <td>
                                                    @if ($faq->status == 1)
                                                        <span class="badge bg-primary">Active</span>
                                                    @else
                                                        <span class="badge bg-warning">Deactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @if ($faq->status == 1)
                                                            <a href="{{ url('/faq-status' . $faq->id) }}"
                                                                class="btn btn-success">
                                                                <i class="fa fa-thumbs-down"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{ url('/faq-status' . $faq->id) }}"
                                                                class="btn btn-danger">
                                                                <i class="fa fa-thumbs-up"></i>
                                                            </a>
                                                        @endif
 

                                                        <form style="padding-left:10px;" action="{{ url('/faq-delete/' . $faq->id) }}"
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
@endsection

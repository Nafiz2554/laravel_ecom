@extends('admin.admin_master')
@section('admin_content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Banner Section</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Banner</li>
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
                                            <th>Banner Title</th>
                                            <th>Description</th>
                                            <th>Image</th> 
                                            <th>Actions</th>

                                        </tr>
                                    </thead>

                                    @foreach ($banners as $banner)
                                        <tbody>
                                            <tr>
                                                <td>{{ $banner->id }}</td>
                                                <td>{{ $banner->title }}</td>
                                                <td class="text-wrap">{{ $banner->desc }}</td>
                                                <td><img src="{{ asset('/storage/' . $banner->image) }}"
                                                        style="width: 105px; height:105px;"> </td>
                                                
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        

                                                         
                                                        <button style="margin-left:10px;" type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal{{ $banner->id }}">
                                                            <i class="fa fa-edit"></i>
                                                        </button>


                                                        <form style="padding-left:10px;"
                                                            action="{{ url('/banner-delete/' . $banner->id) }}"
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
                                        <div class="modal fade" id="exampleModal{{ $banner->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel{{ $banner->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModal{{ $banner->id }}">Edit Your Category</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="{{ url('/update-banner/' . $banner->id) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Banner Title:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="title" value="{{ $banner->title }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Description:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="desc" value="{{ $banner->desc }}">
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6">

                                                                    <div class="form-group">
                                                                        <label>Banner Image:</label>
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

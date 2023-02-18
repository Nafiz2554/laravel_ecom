@extends('admin.admin_master')
@section('admin_content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Product Sub-Categories</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">All Sub-Categories</li>
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
                                            <th>Sub-Category Name</th>
                                            <th>Sub-Category Type</th>
                                            <th>Sub-Category Description</th>
                                            <th>Category Id</th> 
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>

                                    @foreach ($subcategories as $subcategory)
                                        <tbody>
                                            <tr>
                                                <td>{{ $subcategory->id }}</td>
                                                <td>{{ $subcategory->sub_name }}</td>
                                                <td>{{ $subcategory->sub_type }}</td>
                                                <td class="text-wrap">{{ $subcategory->sub_desc }}</td>
                                                <td>{{ $subcategory->cat_id }}</td>
                                                
                                                <td><img src="{{ asset('/storage/' . $subcategory->image) }}"
                                                        style="width: 105px; height:105px;"> </td>
                                                <td>
                                                    @if ($subcategory->status == 1)
                                                        <span class="badge bg-primary">Active</span>
                                                    @else
                                                        <span class="badge bg-warning">Deactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @if ($subcategory->status == 1)
                                                            <a href="{{ url('/subcategory-status' . $subcategory->id) }}"
                                                                class="btn btn-success">
                                                                <i class="fa fa-thumbs-down"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{ url('/subcategory-status' . $subcategory->id) }}"
                                                                class="btn btn-danger">
                                                                <i class="fa fa-thumbs-up"></i>
                                                            </a>
                                                        @endif

                                                         
                                                        <button style="margin-left:10px;" type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal{{ $subcategory->id }}">
                                                            <i class="fa fa-edit"></i>
                                                        </button>


                                                        <form style="padding-left:10px;"
                                                            action="{{ url('/subcategory-delete/' . $subcategory->id) }}"
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
                                        <div class="modal fade" id="exampleModal{{ $subcategory->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel{{ $subcategory->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModal{{ $subcategory->id }}">Edit This Sub-Category</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="{{ url('/update-subcategory/' . $subcategory->id) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Sub-Category Name:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="sub_name" value="{{ $subcategory->sub_name }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Type:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="sub_type" value="{{ $subcategory->sub_type }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Sub-Category Description:</label>
                                                                        <textarea class="form-control" rows="3" name="sub_desc" required>{{ $subcategory->sub_desc }}</textarea>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6">

                                                                    <div class="form-group">
                                                                        <label>Image:</label>
                                                                        <input type="file" class="form-control"
                                                                            name="image">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Category Id:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="cat_id" value="{{ $subcategory->cat_id }}">
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

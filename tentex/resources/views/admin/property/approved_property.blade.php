@extends('admin.admin_master')
@section('admin_content')
    
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">All Active/Present Properties</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Reports</li>
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



            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-center table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Id</th> 
                                            <th>Seller Name</th>
                                            <th>Seller Address</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>NID No</th>
                                            <th>Interior</th>
                                            <th>Purpose</th>
                                            <th>Price (Taka)</th>
                                            <th>Location</th>
                                            <th>Type</th>
                                            <th>Description</th>
                                            <th>City</th>
                                            <th>Area</th>
                                            <th>Establishment</th>
                                            <th>Image-1</th>
                                            <th>Image-2</th>
                                            <th>Image-3</th>
                                        </tr>
                                    </thead>

                                    @foreach ($active_property as $property)
                                        <tbody>
                                            <tr>
                                                <td>{{ $property->id }}</td> 
                                                <td>{{ $property->seller_name }}</td>
                                                <td>{{ $property->seller_add }}</td>
                                                <td>{{ $property->email }}</td>
                                                <td>{{ $property->phone }}</td>
                                                <td>{{ $property->nid }}</td>
                                                <td>{{ $property->desc_interior }}</td>
                                                <td>{{ $property->purpose }}</td>
                                                <td>{{ $property->price }}</td>
                                                <td>{{ $property->property_loc }}</td>
                                                <td>{{ $property->property_type }}</td>
                                                <td>{{ $property->property_desc }}</td>
                                                <td>{{ $property->city }}</td>
                                                <td>{{ $property->area }}</td>
                                                <td>{{ $property->year }}</td>
                                                <td><img src="{{ asset('/storage/' . $property->image1) }}"
                                                        style="width: 105px; height:105px;"> </td>
                                                <td> <img src="{{ asset('/storage/' . $property->image2) }}"
                                                        style="width: 105px; height:105px;"> </td>
                                                <td> <img src="{{ asset('/storage/' . $property->image3) }}"
                                                        style="width: 105px; height:105px;">
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

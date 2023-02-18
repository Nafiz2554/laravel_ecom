@extends('admin.admin_master')
@section('admin_content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Add Property</h3>
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



            {{-- Add property start --}}

            <div class="container">
                <p class="alert-info text-center">
                    <?php
                    $message = Session()->get('message');
                    if ($message) {
                        echo $message;
                        Session()->put('message', null);
                    }
                    ?>
                </p>

                <form action="{{ url('/properties/') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Seller Name</label>
                                <input type="text" class="form-control" name="seller_name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Seller Address</label>
                                <textarea class="form-control" rows="3" name="seller_add" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" class="form-control" name="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">NID Number</label>
                                <input type="text" class="form-control" name="nid" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Description of Interiror</label>
                                <textarea class="form-control" rows="3" placeholder="In details" name="desc_interior"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Purpose</label>

                                <select name="purpose" class="form-control" required>
                                    <option selected disabled value="car">Select</option>
                                    <option value="sale">For Sale</option>
                                    <option value="rent">For Rent</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Price /-</label>
                                <input type="text" class="form-control" name="price" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image Upload</label>
                                <input type="file" id="exampleInputFile" name="image1" class="form-control" required>

                            </div>

                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Property Location</label>
                                <textarea class="form-control" rows="3" placeholder="In details" name="property_loc" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Type Of Property</label>
                                <select name="property_type" class="form-control">
                                    <option selected disabled value="car">Select</option>
                                    <option value="land">Land</option>
                                    <option value="house">Complete House</option>
                                    <option value="flat">Individual Flat</option>
                                    <option value="duplex">Duplex House</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Property description</label>
                                <textarea class="form-control" name="property_desc" rows="3" placeholder="In details"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">City</label>
                                <input type="text" class="form-control" name="city" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Total Area</label>
                                <input type="text" class="form-control" placeholder="In Sq. ft" name="area"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Buit In</label>
                                <input type="date" class="form-control" placeholder="Year" name="year" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Additional Facilities</label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> parking
                                    </label>
                                    <label>
                                        <input type="checkbox"> Swimming Pool
                                    </label>
                                    <label>
                                        <input type="checkbox"> Laundry Room
                                    </label>
                                    <label>
                                        <input type="checkbox"> Emergency Exit
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image Upload</label>
                                <input type="file" id="exampleInputFile" name="image2" class="form-control"
                                    required>

                            </div>
                            <div class="form-group" style="padding-top: 7px;">
                                <label for="exampleInputFile">Image Upload</label>
                                <input type="file" id="exampleInputFile" name="image3" class="form-control"
                                    required>

                            </div>

                        </div>
                    </div>




                    <button style="margin-bottom:30px; margin-top:20px;" type="submit"
                        class="btn btn-warning center-block">Submit</button>
                </form>
                
            </div>


        </div>
    </div>
@endsection

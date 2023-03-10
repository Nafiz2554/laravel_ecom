@extends('admin.admin_master')
@section('admin_content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Calendar</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Calendar</li>
                        </ul>
                    </div>
                    {{-- <div class="col-auto text-right float-right ml-auto">
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_event">Create
                            Event</a>
                    </div> --}}
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <h4 class="card-title">Choose Your Date</h4>
                    <div id="calendar-events" class="mb-3">
                        <div class="calendar-events" data-class="bg-info"><i class="fas fa-circle text-info"></i> My Event
                            One</div>
                        <div class="calendar-events" data-class="bg-success"><i class="fas fa-circle text-success"></i> My
                            Event Two</div>
                        <div class="calendar-events" data-class="bg-danger"><i class="fas fa-circle text-danger"></i> My
                            Event Three</div>
                        <div class="calendar-events" data-class="bg-warning"><i class="fas fa-circle text-warning"></i> My
                            Event Four</div>
                    </div>
                    
                    
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="card bg-white">
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Event Modal -->
            <div id="add_event" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Event</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label>Event Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Event Date <span class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text">
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Event Modal -->

            

            <!-- Add Category Modal -->
            <div class="modal custom-modal fade" id="add_new_event">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Category</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input class="form-control form-white" placeholder="Enter name" type="text"
                                        name="category-name" />
                                </div>
                                <div class="form-group mb-0">
                                    <label>Choose Category Color</label>
                                    <select class="form-control form-white" data-placeholder="Choose a color..."
                                        name="category-color">
                                        <option value="success">Success</option>
                                        <option value="danger">Danger</option>
                                        <option value="info">Info</option>
                                        <option value="primary">Primary</option>
                                        <option value="warning">Warning</option>
                                        <option value="inverse">Inverse</option>
                                    </select>
                                </div>
                                <div class="submit-section">
                                    <button type="button" class="btn btn-primary save-category submit-btn"
                                        data-dismiss="modal">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Category Modal -->

        </div>
    </div>
@endsection

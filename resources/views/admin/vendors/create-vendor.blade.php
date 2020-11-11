@extends('layouts.admin.app')

@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon-gradient bg-mean-fruit"></i>
            </div>
            <div>Admin Dashboard
                <div class="page-title-subheading">Control your App Features and functionality from here!</div>
            </div>
        </div>
        <div class="page-title-actions">
            <button type="button" data-toggle="tooltip" title="All Vendors" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                <i class="pe-7s-medal"></i>
            </button>
        </div>    
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @if ($success = Session::get('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $success }}</strong>
            </div>
        @endif
        <div class="main-card mb-3 card">
            <div class="card-header">Add Vendor
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                        <a href="{{route('admin.all.vendors')}}" class="border-0 btn-transition btn btn-outline-primary"><i class="pe-7s-look"></i> View Vendors</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="position-relative row form-group">
                        <label for="VendorName" class="col-sm-2 col-form-label">Vendor Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="VendorName" placeholder="Enter Name Here.." name="VendorName" required>
                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <label for="VendorDesc" class="col-sm-2 col-form-label">Vendor Description</label>
                        <div class="col-sm-10">
                            <textarea id="VendorDesc" class="form-control" name="VendorDesc" placeholder="Enter Description" required></textarea>
                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <label for="VendorType" class="col-sm-2 col-form-label">Select</label>
                        <div class="col-sm-10">
                            <select id="VendorType" class="form-control" name="VendorType">
                                <option selected value="0">Regular</option>
                                <option value="1">Featured</option>
                            </select>
                        </div>
                    </div>
                    <div class="position-relative row form-check">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-secondary">Add Vendor</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="d-block text-center card-footer">
                <span>You can add new vendor by submiting the following form.</span>
            </div>
        </div>
    </div>
</div>

@endsection
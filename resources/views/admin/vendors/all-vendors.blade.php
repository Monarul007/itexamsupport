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
@livewire('vendors')

@endsection
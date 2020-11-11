@extends('layouts.admin.app')

@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon-gradient bg-mean-fruit"></i>
            </div>
            <div>Certifications
                <div class="page-title-subheading">Control all your certification Features and functionality from here!</div>
            </div>
        </div>
        <div class="page-title-actions">
            <button type="button" data-toggle="tooltip" title="All Certification" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                <i class="pe-7s-target"></i>
            </button>
        </div>    
    </div>
</div>
@livewire('certifications')

@endsection
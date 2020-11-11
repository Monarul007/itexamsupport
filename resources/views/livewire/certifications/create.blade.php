<form class="card-body bg-white">
    <div class="row">
        <div class="col-md-6">
            <div class="form-row">
                <div class="col-12">
                    <div class="position-relative form-group">
                        <input type="text" class="form-control" id="name" placeholder="Enter Name Here.." wire:model="name">
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="position-relative row form-group">
                        <div class="col-12">
                            <select id="vendor" class="form-control" wire:model="vendor">
                                <option>Select Vendor</option>
                                @foreach($vendors as $vendor)
                                    <option value="{{ $vendor->id }}" @if ($loop->first) selected @endif>{{ $vendor->name }}</option>
                                @endforeach
                            </select>
                            @error('type') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <div class="col-12">
                            <select id="type" class="form-control" wire:model="type">
                                <option>Select Certification Type</option>
                                <option value="0">Regular</option>
                                <option value="1">Featured</option>
                            </select>
                            @error('type') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <div class="col-12">
                            <select id="status" class="form-control" wire:model="status">
                                <option>Select Certification Status</option>
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                            @error('status') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="position-relative form-group">
                <textarea id="VendorDesc" rows="8" class="form-control" wire:model="description" placeholder="Enter Description"></textarea>
                @error('description') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-12"><button wire:click.prevent="create()" class="btn btn-secondary">Submit</button></div>
    </div>
</form>
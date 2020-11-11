<form>
    <div class="position-relative row form-group">
        <label for="VendorName" class="col-sm-2 col-form-label">Vendor Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="VendorName" placeholder="Enter Name Here.." wire:model="VendorName">
            @error('VendorName') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="position-relative row form-group">
        <label for="VendorDesc" class="col-sm-2 col-form-label">Vendor Description</label>
        <div class="col-sm-10">
            <textarea id="VendorDesc" class="form-control" wire:model="VendorDesc" placeholder="Enter Description"></textarea>
            @error('VendorDesc') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="position-relative row form-group">
        <label for="VendorType" class="col-sm-2 col-form-label">Select</label>
        <div class="col-sm-10">
            <select id="VendorType" class="form-control" wire:model="VendorType">
                <option selected value="0">Regular</option>
                <option value="1">Featured</option>
            </select>
            @error('VendorType') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="position-relative row form-check">
        <div class="col-sm-10 offset-sm-2">
            <button wire:click.prevent="create()" class="btn btn-secondary">Add Vendor</button>
        </div>
    </div>
</form>
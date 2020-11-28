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
                        <div class="col-md-6 pr-1">
                            <select id="vendor" class="form-control" wire:model="vendor">
                                <option>Select Vendor</option>
                                @foreach($vendors as $vendor)
                                    <option value="{{ $vendor->id }}" @if ($loop->first) selected @endif>{{ $vendor->name }}</option>
                                @endforeach
                            </select>
                            @error('vendor') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 pl-1">
                            <select id="type" class="form-control" wire:model="certification">
                                <option>Select Certification</option>
                                @foreach($certifications as $certification)
                                    <option value="{{ $certification->id }}" @if ($loop->first) selected @endif>{{ $certification->title }}</option>
                                @endforeach
                            </select>
                            @error('certification') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <div class="col-md-6 pr-1">
                            <input type="text" class="form-control" id="name" placeholder="Exam code" wire:model="code">
                            @error('code') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 pl-1">
                            <input type="text" class="form-control" id="name" placeholder="Total Questions" wire:model="questions">
                            @error('questions') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <div class="col-md-6 pr-1">
                            <input type="number" class="form-control" id="price" placeholder="Exam Price" wire:model="price">
                            @error('price') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 pl-1">
                            <select id="status" class="form-control" wire:model="status">
                                <option>Select Exam Status</option>
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                            @error('status') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <div class="col-12">
                            <!-- @if ($attachment)
                                Attachement Preview:
                                <img width="80px" style="border-radius: 100%;" src="{{ $attachment->temporaryUrl() }}">
                            @endif -->
                            <input wire:model="attachment" id="attachment" type="file" class="form-control-file">
                            <div wire:loading wire:target="attachment">Uploading...</div>
                            @error('attachment') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="position-relative form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" wire:model="featured"> Is Featured?
                            @error('featured') <span class="text-danger">{{ $message }}</span>@enderror
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="position-relative form-group">
                <textarea id="description" rows="3" class="form-control" wire:model="description" placeholder="Enter Description"></textarea>
                @error('description') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="position-relative form-group">
                <textarea id="features" rows="3" class="form-control" wire:model="features" placeholder="Enter Features"></textarea>
                @error('features') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="position-relative form-group">
                <textarea id="extra_features" rows="3" class="form-control" wire:model="extra_features" placeholder="Enter extra features"></textarea>
                @error('extra_features') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-12 mt-3"><button wire:click.prevent="create()" class="btn btn-secondary">Submit</button></div>
    </div>
</form>
<h5 class="card-title">Create a new product</h5>
<form wire:submit.prevent="update()" class="mb-5">
    <input type="hidden" wire:model="product_id">
    <div class="form-row">
        <div class="col-md-7">
            <div class="position-relative form-group">
                <input type="text" class="form-control" wire:model="name" placeholder="Enter product name">
                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-5">
            <div class="position-relative form-group">
                <select class="custom-select" wire:model="category">
                    <option selected>Select Category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" @if ($loop->first) selected @endif>{{ $cat->name }}</option>
                    @endforeach
                </select>
                @error('category') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6">
            @if($discountMode)
                <div class="form-group">
                    <input type="number" class="form-control" wire:model="price" placeholder="Product price" min="1">
                    @error('price') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <div class="d-flex"><label for="discountType">Discount Type</label><button wire:click.prevent="disable()" class="btn-transition btn btn-link btn-sm ml-auto"><i class="fa fa-plus-circle" aria-hidden="true"></i> Disable Discount</button></div>
                    <select class="custom-select" wire:model="discountType" id="discountType">
                        <option value="0" selected>Percantage</option>
                        <option value="1">Flat Discount</option>
                    </select>
                    @error('discountType') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" wire:model="amount" value="0" min="0" placeholder="Discount amount or percantage">
                    @error('amount') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            @else
                <div class="row">
                    <div class="col-6 form-group">
                        <input type="text" class="form-control" wire:model="price" placeholder="Product price">
                    </div>
                    @error('price') <span class="text-danger">{{ $message }}</span>@enderror
                    <div class="col-6"><button wire:click.prevent="discount()" class="btn-transition btn btn-link"><i class="fa fa-plus-circle" aria-hidden="true"></i> Enable Discount</button></div>
                </div>
            @endif
            <div class="position-relative form-group">
                <textarea wire:model="description" class="form-control" rows="8" placeholder="Enter product description"></textarea>
                @error('description') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-6">
            <p>Optional Details</p>
            <div class="position-relative form-group"><input type="text" class="form-control" wire:model="code" placeholder="Enter product code"></div>
            <div class="position-relative form-group"><textarea wire:model="specs" class="form-control" rows="8" placeholder="Enter product specifications"></textarea></div>
        </div>
    </div>
    <div class="col-12">
        <div class="position-relative form-group row">
            <div class="row">
                <div class="col-md-6">
                    @if($prevPhotos)
                        <p>Photos:</p>
                        <div class="d-flex">
                            @foreach($prevPhotos as $item)
                            <div class="image-block position-relative d-flex">
                                <img src="{{ asset('storage/'.$item.'')}}" width="70" style="height: 70px; border-radius: 10px;"><i class="fa fa-times-circle" style="position: absolute;left: 0;color: #fff;cursor: pointer;"></i>
                            </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-md-6">
                    @if($photos)
                        <p>New Photos:</p>
                        <div class="d-flex">
                            @foreach($photos as $photo)
                            <div class="image-block position-relative d-flex" wire:key="{{$loop->index}}">
                                <img src="{{ $photo->temporaryUrl() }}" width="70" style="height: 70px; border-radius: 10px;"><i class="fa fa-times-circle" style="position: absolute;left: 0;color: #fff;cursor: pointer;" wire:click="remove({{$loop->index}})"></i>
                            </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="custom-file">
                <input type="file" wire:model="photos" class="custom-file-input" id="photos" multiple>
                <label class="custom-file-label" for="photos">Choose Product Images</label>
            </div>
            <div wire:loading wire:target="photos">Uploading...</div>
            @error('photos.*') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary mr-2">Update Product</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</form>
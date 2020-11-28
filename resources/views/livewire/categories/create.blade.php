<h4 class="card-title">Create Category</h4>
                        <form wire:submit.prevent="create()">
                            <div class="position-relative form-group">
                                <div class="d-flex">
                                    <span data-toggle="tooltip" title="The name is how it appears on your site." data-placement="right" class="mr-2"><i class="pe-7s-help1"></i></span>
                                    <label for="url" class=""> Name</label>
                                </div>
                                <input type="text" class="form-control" wire:model="name" placeholder="Enter Category Name">
                                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="position-relative form-group">
                                <div class="d-flex">
                                    <span data-toggle="tooltip" title="The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens." data-placement="right" class="mr-2"><i class="pe-7s-help1"></i></span>
                                    <label for="url" class="">Slug</label>
                                </div>
                                <input type="text" wire:model="url" class="form-control" id="url" placeholder="Enter url">
                                @error('url') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="position-relative form-group">
                                <div class="d-flex">
                                    <span data-toggle="tooltip" title="Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band." class="mr-2"><i class="pe-7s-help1"></i></span>
                                    <label for="url" class="">Parent Category</label>
                                </div>
                                <select class="custom-select" wire:model="parent">
                                    <option>Select Parent Category</option>
                                    <option value="0">Main Category</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" @if ($loop->first) selected @endif>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                @error('parent') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="position-relative form-group">
                                <div class="d-flex">
                                    <span data-toggle="tooltip" title="The description is not prominent by default; however, some themes may show it." class="mr-2"><i class="pe-7s-help1"></i></span>
                                    <label for="url" class="">Description</label>
                                </div>
                                <textarea type="text" wire:model="desc" class="form-control" placeholder="Enter Description"></textarea>
                                @error('desc') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add New Category</button>
                        </form>
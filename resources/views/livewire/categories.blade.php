            <div class="row">
                <div class="col-12">
                    @if ($message = Session::get('message'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            @if($updateMode)
                                @include('livewire.categories.update')
                            @else
                                @include('livewire.categories.create')
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">@if($categories->count() > 0) {{count($categories).' Category found.'}} @else <b class="text-danger">No category found!</b> @endif</h5>
                            <table class="mb-0 table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($categories->count() > 0)
                                        <?php $i = 1; ?>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td scope="row">{{$i++}}</td>
                                                <td class="text-center">{{$category->name}}</td>
                                                <td class="text-center">{{$category->url}}</td>
                                                <td class="text-center"><button wire:click="edit({{ $category->id }})" class="btn btn-outline-primary btn-sm mr-2"><i class="fa fa-edit"> Edit</i></button><button wire:click="remove({{ $category->id }})" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"> Delete</i></button></td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center"><span class="text-danger">No categoty to show! You can add category from left side form.</span></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
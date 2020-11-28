<div class="row" id="top">
    <div class="col-12">
        @if($updateMode)
            @include('livewire.products.update')
        @elseif($createMode)
            @include('livewire.products.create')
        @endif
    </div>
    <div class="col-12">
        @if ($message = Session::get('message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <h5 class="card-title">@if($products->count() > 0) {{count($products).' products found.'}} @else <b class="text-danger">No product found!</b> @endif</h5>
        <div class="grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex">All Products
                        <div class="ml-auto">
                            <button href="#top" wire:click.prevent="foo()" class="btn-transition btn btn-outline-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add new product</button>
                        </div>
                    </div>
                    <table class="mb-0 table table-bordered table-sm">
                        <thead class="text-center">
                            <tr>
                                <th>SL.</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>isFeatured</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($products->count() > 0)
                                <?php $i = 1; ?>
                                @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <th class="text-center">
                                            @if($product->image) 
                                                @foreach(json_decode($product->image) as $item)
                                                    <img src="{{ asset('storage/'.$item.'')}}" alt="" height="30" width="30">
                                                @endforeach
                                            @else 
                                                <img src="/images/cat-thumb-320x320.png" alt="" height="48" width="48">
                                            @endif
                                        </th>
                                        <td class="text-center">{{$product->name}}</td>
                                        <td class="text-center">{{$product->category->name}}</td>
                                        <td class="text-center">{{$product->price}}</td>
                                        <td class="text-center">
                                            @if($product->is_featured == 1)
                                            <div class="badge badge-success">Featured</div>
                                            @else
                                            <div class="badge badge-warning">General</div>
                                            @endif
                                        </td>
                                        <td class="text-center"><button wire:click="edit({{ $product->id }})" class="btn btn-outline-primary btn-sm mr-2"><i class="fa fa-edit"> Edit</i></button><button wire:click="delete({{ $product->id }})" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"> Delete</i></button></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center"><span class="text-danger">No product to show! <button wire:click.prevent="foo()" class="btn btn-link btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add new product</button></span></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

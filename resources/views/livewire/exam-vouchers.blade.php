                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                </div>
                                @if($updateMode)
                                    @include('livewire.vouchers.update')
                                @else
                                    @include('livewire.vouchers.create')
                                @endif
                                <div class="main-card mt-4 mb-3 card">
                                    <div class="card-header">All Vouchers
                                        <div class="btn-actions-pane-right">
                                            <div role="group" class="btn-group-sm btn-group">
                                                <button type="button" class="border-0 btn-transition btn btn-outline-primary"><i class="pe-7s-plus"></i> Add New Voucher</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Name</th>
                                                    <th class="text-center">Vendor</th>
                                                    <th class="text-center">Certification</th>
                                                    <th class="text-center">Price</th>
                                                    <th class="text-center">Type</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if($vouchers->count() > 0)
                                                @foreach($vouchers as $v)
                                                    <tr>
                                                        <td class="text-center text-muted">#{{$v->id}}</td>
                                                        <td>{{$v->exam_title}}</td>
                                                        <td>{{$v->vendor->name}}</td>
                                                        <td>{{$v->certification->title}}</td>
                                                        <td>{{$v->price}}</td>
                                                        <td>{{$v->type}}</td>
                                                        <td class="text-center">
                                                            @if($exam->status == 1)
                                                                <div class="badge badge-success">Active</div>
                                                            @else
                                                                <div class="badge badge-warning">Inactive</div>
                                                            @endif
                                                        </td>
                                                        <td class="text-center" style="min-width: 150px;">
                                                            <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper" wire:click="delete({{$v->id}})"> </i></button>
                                                            <button class="btn-wide btn btn-primary" wire:click="edit({{$v->id}})">Edit</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr><td class="text-danger text-center" colspan="8">No voucher found. Please add some voucher</td></tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-block text-center card-footer">
                                        <div class="text-center">You can manage vouchers, view, edit and delete vouchers from here...</div>
                                    </div>
                                </div>
                            </div>
                        </div>

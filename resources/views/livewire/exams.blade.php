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
                                    @include('livewire.exams.update')
                                @else
                                    @include('livewire.exams.create')
                                @endif
                                <div class="main-card mt-4 mb-3 card">
                                    <div class="card-header">All Exams
                                        <div class="btn-actions-pane-right">
                                            <div role="group" class="btn-group-sm btn-group">
                                                <button type="button" class="border-0 btn-transition btn btn-outline-primary"><i class="pe-7s-plus"></i> Add New Exam</button>
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
                                                    <th class="text-center">Code</th>
                                                    <th class="text-center">Questions</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if($exams->count() > 0)
                                                @foreach($exams as $exam)
                                                    <tr>
                                                        <td class="text-center text-muted">#{{$exam->id}}</td>
                                                        <td>{{$exam->exam_title}}</td>
                                                        <td>{{$exam->vendor->name}}</td>
                                                        <td>{{$exam->certification->title}}</td>
                                                        <td>{{$exam->exam_code}}</td>
                                                        <td>{{$exam->total_questions}}</td>
                                                        <td class="text-center">
                                                            @if($exam->status == 1)
                                                                <div class="badge badge-success">Active</div>
                                                            @else
                                                                <div class="badge badge-warning">Inactive</div>
                                                            @endif
                                                        </td>
                                                        <td class="text-center" style="min-width: 150px;">
                                                            <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper" wire:click="delete({{$exam->id}})"> </i></button>
                                                            <button class="btn-wide btn btn-primary" wire:click="edit({{$exam->id}})">Edit</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr><td class="text-danger text-center" colspan="8">No exam found. Please add some exam</td></tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-block text-center card-footer">
                                        <div class="text-center">You can manage exam, view, edit and delete exams from here...</div>
                                    </div>
                                </div>
                            </div>
                        </div>

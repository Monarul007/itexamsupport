            <div class="row mt-5 mb-5">
                <div class="col-12">
                    <h3>Exams Available</h3>
                    <div class="select-vendor p-3 border">
                        <form style="max-width: 50%; margin: auto;">
                            <div class="form-group row">
                                <label for="vendor" class="col-sm-4 col-form-label">Select Vendor</label>
                                <div class="col-sm-7">
                                    <select class="custom-select" wire:model="vendor" wire:change="results()" id="vendor">
                                        <option value="">Select Vendor</option>
                                        @foreach($vendors as $vendor)
                                            <option value="{{ $vendor->id }}" @if ($loop->first) selected @endif>{{ $vendor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('vendor') <span class="text-danger">{{ $message }}</span>@enderror
                        </form>
                    </div>
                    @if($singleMode)
                        @include('livewire.vendors.single-vendor')
                    @else
                        @foreach($vendors as $v)
                        <div class="exam-title">{{$v->name}}</div>
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-sm">
                                <thead class="text-white text-center">
                                    <tr>
                                        <th>Certification</th>
                                        <th>Exam</th>
                                        <th>Title</th>
                                        <th>No. of Q&A</th>
                                        <th>Last Updated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($v->exams->count() > 0)
                                        @foreach($v->exams as $exam)
                                        <tr>
                                            <td class="text-center">{{$exam->certification->title}}</td>
                                            <td class="text-center"><a href="exam/{{$exam->id}}">{{$exam->exam_code}}</a></td>
                                            <td class="text-center">{{$exam->exam_title}}</td>
                                            <td class="text-center">{{$exam->total_questions}}</td>
                                            <td class="text-center">{{($exam->updated_at->format('j F, Y'))}}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td height="30" width="750" colspan="5"><i class="fa fa-arrow-up"></i><a href="#top"> Top</a></td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center text-danger">No exams available to display under this vendor!</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>

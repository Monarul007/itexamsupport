
                    <div class="exam-title">{{$vv->name}}</div>
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
                                @if($vv->exams->count() > 0)
                                    @foreach($vv->exams as $exam)
                                    <tr>
                                        <td class="text-center">{{$exam->certification->title}}</td>
                                        <td class="text-center"><a href="/exam/{{$exam->id}}">{{$exam->exam_code}}</a></td>
                                        <td class="text-center">{{$exam->exam_title}}</td>
                                        <td class="text-center">{{$exam->total_questions}}</td>
                                        <td class="text-center">{{($exam->updated_at->format('j F, Y'))}}</td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center text-danger">No exams available to display under this vendor!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
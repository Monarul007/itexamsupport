            <div class="row mt-2 mb-5">
                <div class="col-md-12">
                    <table id="cert" class="table table-bordered table-sm">
                        @foreach($vendors as $v)
                            <tr class="header">
                                <th class="text-white" style="background: #164ea5;">{{$v->name}}</th>
                            </tr>
                            @if($v->certifications->count() > 0)
                                @foreach($v->certifications as $c)
                                <tr>
                                    <td><a href="vendors/{{$v->id}}">{{$c->title}}</a></td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-danger">No certification found under this vendor.</td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>

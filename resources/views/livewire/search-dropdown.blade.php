<div class="input-group search-input mb-2 position-relative">
    <input type="text" class="form-control" placeholder="Enter exam code or title here..." aria-label="Enter Your Text" aria-describedby="basic-addon2" wire:model="searchTerm">
    <div class="input-group-append">
        <button class="btn btn-outline-success" type="button">SEARCH</button>
    </div>
    <div class="search-results position-absolute" style="width: 100%; top: 57px; z-index: 1;">
        <div class="card border-0">
            <ul class="list-group list-group-flush">
                @if($searchTerm)
                    @if($results->count() > 0)
                        @foreach($results as $r)
                            <li class="list-group-item bg-light border" style="padding: 5px 16px;"><a href="/exam/{{$r->id}}">{{$r->exam_title}}</a></li>
                        @endforeach
                    @else
                        <li class="list-group-item">No results found!</li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</div>
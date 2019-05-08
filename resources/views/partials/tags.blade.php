<div class="card">
    <div class="card-header"> Categories</div>
    <div class="card-body">
        @foreach($tags as $tag)
            <span class="tag">{{$tag->name}}</span>
        @endforeach
    </div>
</div>
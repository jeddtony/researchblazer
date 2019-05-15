<div class="py-4">
<div class="card ">
    <div class="card-header"> Categories</div>
    <div class="card-body">
        @foreach($tags as $tag)
           <a href="/tags/{{$tag->name}}"> <span class="tag">{{$tag->name}}</span> </a>
        @endforeach
    </div>
</div>
</div>
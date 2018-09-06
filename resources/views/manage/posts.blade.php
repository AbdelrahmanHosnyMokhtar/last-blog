

<article class="article widget-article">
    <div class="article-img">
        <a href="{{ "/read/".$art->id}}">
            <img src="{{asset('image/'.$art->image)}}" alt="" height="320px">
        </a>
    </div>
    <div class="article-body">
        <h4 class="article-title"><a href="{{"/read/".$art->id}}">{{$art->title}}</a></h4>
        <ul class="article-meta">
            <li><i class="fa fa-clock-o"></i>{{$art->created_at->toFormattedDateString()}}</li>
            <li><i class="fa fa-comments"></i></li>

        </ul>
    </div>
</article>


<div id="owl-carousel-1" class="owl-carousel owl-theme center-owl-nav">
    @foreach($articles as $artic)
    <article class="article thumb-article">
        <div class="article-img">
            <img src="{{asset('image/'.$artic->image)}}" alt="" height="480px" width="1000px">
        </div>
        <div class="article-body">
            <h2 class="article-title"><a href="{{ "/read/".$artic->id}}">{{$artic->title}}</a></h2>
            <ul class="article-meta">
                <li><i class="fa fa-clock-o"></i>{{$artic->created_at->toFormattedDateString()}}</li>
                <li><i class="fa fa-comments"></i> </li>
            </ul>
        </div>
    </article>
    @endforeach

</div>








<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google font -->


    <style>
        body {
            margin: 15px;
            color: #444444;


        }


    h1 {
        font-family: 'Lato', sans-serif;
        font-size: 50px;
        font-weight: bold;
        color: #444444;
        text-align: left;
        margin-left: 50px;

    }
    img{
        height: 300px;
        width: 400px;
    }
    .image_art{

        padding: 1px;
        width: 500px;
        margin-left: -15px;
        position: relative;
        display: none;


    }


  .ar_body{
      width: 800px;
      position: relative;
      margin-left: 80px;
  }
.form-group{
    float: bottom;
    position: absolute;
    display: table-footer-group;
    margin-bottom: 10px;


}

.form-group a {
    cursor:pointer;
    text-decoration: none;
    color: #FFFFFF;
}
        .form-group a:hover{
            text-decoration: none;
            color: red;
        }
        h5 {
            font-size: 20px;
            width: fit-content ;
        }

.form-control{
    display: block;

}
.yee{
    display: inline;
    height: 250px;
    width: 200px;
    border: 2px solid #000000;
    float: right;
    font-size: 20px;
    font-weight: bold;
    padding: 10px;
    text-align: center;
    right: 50px;
    background-color: #000000;
    color: #FFFFFF;
    margin: 20px;

}
.img_av{
    height: 140px;
    width: 150px;
    border-radius: 50%;
}
.lin{
    cursor:pointer;
    text-decoration: none;
    color: #FFFFFF;
}

 .lin:hover{
     text-decoration: none;
     color: red;


 }
        .article.widget-article{
            width:400px;
            background-color: #000000 ;
            float: left;
            margin: 20px;
            border: 1px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            height: 300px;
        }


        .article.widget-article:after {
            content:"";
            display:inline;

        }
        .article.widget-article .article-body{
            text-align: center;
        }

        .article.widget-article .article-img {
            float:left;
            width:175px;
            margin-right:10px;
            margin-bottom:0px;
            height: 15px;
        }

        .article.widget-article .article-title {
            font-size:20px;
            text-align: center;
            margin-top:120px;

        }
        .article .article-meta {
            margin-bottom: 3px;
            margin-top: 10px;
        }

        .article .article-meta li {
            display:inline-block;
            color:#DDD;
            font-weight:400;
            font-size:12.5px;
            text-transform:uppercase;
        }

        .article .article-meta li + li {
            margin-left:10px;
        }
        .btn-primary {
            position: relative;
            background-color: #080808;
            border: none;
            font-size: 14px;
            color: #FFFFFF;
            padding: 20px;
            width: 150px;
            text-align: center;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            text-decoration: none;
            overflow: hidden;
            cursor: pointer;
            margin-bottom: 20px;

        }
        .btn-primary:hover{
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
            background-color: red;
            width: 200px;

        }

        .btn-primary:after {
            content: "";
            background: red;
            display: block;
            position: absolute;
            padding-top: 300%;
            padding-left: 350%;
            margin-left: -20px !important;
            margin-top: -120%;
            opacity: 0;
            transition: all 1s
        }

        .btn-primary:active:after {
            padding: 0;
            margin: 0;
            opacity: 1;
            transition: 0s
        }
        .table td {
            display: table;
        }
        .table tr:nth-child(even) {
            background-color: #E1E1E1;
        }
       .table tr:hover {background-color: #f5f5f5;}
    </style>
 <title>استقطاب</title>
</head>
<body>
    <div class="container">

    <img  class="image_art" src="{{asset('image/'.$article->image)}}" >
        <h1 >
            {{$article->title}}
        </h1>


        <ASIDE class="yee">
            <div>about the author</div>
            <br>
            <img class="img_av" src="{{asset('image/'.$article->user->avatar)}}" >
            <a class="lin" href="{{"/prof/".$article->user_id}}">   <h4>{{$article->user->name}}</h4></a>
        </ASIDE>

        <div class="ar_body">
        <h5 >

         <p>   {!! $article->body !!}</p>
        </h5>


        </div>

       <div class="form-group">
           <h2>Related articles :</h2>
           @foreach($articles=\App\Article::orderBy('created_at')->paginate(3) as $art)
               @include('manage.posts')
           @endforeach
            <table class="table table-striped">


                @foreach($article->comment as $c)


                    <tr>

                        <td>
                            {{$c->created_at->diffForHumans()}} :
                            <strong>
                                {!!  $c->comment!!}
                            </strong>


                        </td>
                    </tr>
                @endforeach

            </table>

            <form action="/read/{{$article->id}}" method="POST">
                {{csrf_field()}}
                <div class="form-gro">
                    <h3 for="usr">comment:</h3>
                    <textarea rows="5" cols="50" placeholder="Your Comment here"  name="body" class="form-control">
                    </textarea>
                </div>

                <br>
                <input type="submit" value="add comment" class="btn btn-primary"/>
            </form>
        </div>

    </div>


</body>
</html>
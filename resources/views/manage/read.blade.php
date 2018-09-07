@include('layouts.oop')

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700" rel="stylesheet">



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




        h5 {
            font-size: 20px;
           width: fit-content ;
        }

.yee{
    display: inline;
    height: 200px;
    width: 150px;
    border: 2px solid #000000;
    float: right;
    font-size: 20px;
    font-weight: bold;
    padding: 10px;
    text-align: center;
    right: 50px;
    background-color: #000000;
    color: #FFFFFF;

}
.img_av{
    height: 100px;
    width: 100px;
    border-radius: 50%;
}
.lin{
    cursor:pointer;
}

 .lin:hover{
     text-decoration: none;
     color: red;


 }
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
            BY:
            <img class="img_av" src="{{asset('image/'.$article->user->avatar)}}" >
            <a class="lin" href="{{"/prof/".$article->user_id}}">   <h4>{{$article->user->name}}</h4></a>
        </ASIDE>

        <div class="ar_body">
        <h5 >

         <p>   {!! $article->body !!}</p>
        </h5>


        </div>
       <div class="form-group">

            <table class="table table-striped">


                @foreach($article->comment as $c)


                    <tr>

                        <td>
                            {{$c->created_at->diffForHumans()}} :
                            <strong>
                                {{$c->comment}}
                            </strong>


                        </td>
                    </tr>
                @endforeach

            </table>

            <form action="/read/{{$article->id}}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="usr">comment:</label>
                    <textarea rows="2" cols="30" placeholder="Your Comment here"  name="body" class="form-control">
      </textarea>
                </div>

                </br>
                <input type="submit" value="add comment" class="btn btn-primary"/>
            </form>
        </div>

    </div>

</body>
</html>
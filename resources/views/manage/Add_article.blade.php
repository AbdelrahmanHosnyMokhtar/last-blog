@extends('layouts.oop')

@section('login')
    <div class="container">
       <form action="add"  method="POST" enctype="multipart/form-data" >
             {{csrf_field()}}
            <div class='form-group'>
                <label for="usr">Title:</label>
                <input type="text" name="title" class="form-cotrol" required >

            </div>
            <div class='form-group'>
                <label for="usr">body:</label>
                <textarea rows="3" cols="40" name="body" class="form-control" required></textarea>
                <input type="file" value="add photo" class="btn btn-block" name="image" > <br>
                <input  type="submit" value="add new" class="btn btn-primary">
            </div>


        </form>

    </div>
@endsection

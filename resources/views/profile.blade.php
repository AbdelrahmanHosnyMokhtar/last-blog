
@extends('layouts.oop')

@section('login')

        <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="/image/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{ $user->name }}'s Profile</h2>
            <form enctype="multipart/form-data" action="/profile" method="POST">
                <label>Update Profile Image</label>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <br>
                <label>Information</label>
                <textarea type="text" id="inform" name="inform" placeholder="about you" style=""></textarea>
            <br>
                <input type="submit" class="pull-right btn btn-sm btn-primary">

            </form>
        </div>
    </div>
</div>

    @endsection
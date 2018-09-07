
@extends('layouts.oop')

@section('login')

        <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <img src="{{"/image/". $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                <h3>{{ $user->name }}'s Profile</h3>
                <br>
                <br>
                <br>
                <br>
                <h3> Information:</h3>
                <h3>{!! $user->inform !!}</h3>
            </div>
        </div>
    </div>

@endsection
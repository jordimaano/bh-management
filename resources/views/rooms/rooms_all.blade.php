@extends('layouts.app')

@section('content')
<div class="container">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$error}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
        @foreach ($rooms as $room)
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top img-fluid" src="{{asset('images/photos/'.$room->photo)}}" alt="">
                <div class="card-body">
                    <h3 class="card-title">{{$room->name}}</h3>
                    <div>
                        Vacancies: {{$room->vacancies}}
                    </div>
                </div>
                <a href="{{route('rooms.show', [$room->id])}} " class="btn btn-info">View</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
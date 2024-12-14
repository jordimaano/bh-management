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

    <h1 class="bg-primary-subtle p-4 rounded-4">{{$boardingHouse->name}}</h1>
    <div class="row mb-3">
        <div class="d-flex justify-content-end">
            <a href="{{route('rooms.create', [$boardingHouse->id])}}" class="btn btn-primary">Add new room</a>
        </div>
    </div>
    <div class="row">
        @if (count($rooms)<=0) <h3>No rooms yet!</h3>
            @else
            @foreach ($rooms as $room)
            <div class="col-md-3">
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{asset('images/photos/'.$room->photo)}}" alt="">
                    <div class="card-body">
                        <h3 class="card-title">{{$room->name}}</h3>
                        <div>
                            Population: 5
                        </div>
                        <div>
                            Vacancies: 4
                        </div>
                    </div>
                    <a href="{{route('boarding-houses.show', [$boardingHouse->id])}} " class="btn btn-info">View</a>
                </div>
            </div>

            @endforeach
            @endif

    </div>
</div>
@endsection
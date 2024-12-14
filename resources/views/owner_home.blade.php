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
    <div class="row mb-3">
        <div class="d-flex justify-content-end">
            <a href="{{route('boarding-houses.create')}}" class="btn btn-primary">Add new boarding house</a>
        </div>
    </div>
    <div class="row">
        @if (count($boardingHouses)<=0) <h3>No boarding house yet!</h3>
            @else
            @foreach ($boardingHouses as $bh)
            <div class="col-md-3">
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{asset('images/photos/'.$bh->photo)}}" alt="">
                    <div class="card-body">
                        <h3 class="card-title">{{$bh->name}}</h3>
                        <h5 class="card-title">Owner: {{$bh->owner->name}}</h5>
                        <div>
                            <img src="{{asset('images/location.jpg')}}" class="icon" alt=""> {{$bh->location}}
                        </div>
                        <div>
                            Rooms: 5
                        </div>
                        <div>
                            Vacancies: 10
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
            @endif

    </div>
</div>
@endsection
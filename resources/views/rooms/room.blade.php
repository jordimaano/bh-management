@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-8">
                        <img src="{{asset('images/photos/'.$room->photo)}}" class="img-fluid" alt="room photo">
                    </div>
                    <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
                        <div class="text-center">
                            <h1>{{$room->name}}</h1>
                            <h5>Owner: {{$room->boardingHouse->owner->name}}</h5>
                            <div>{{$room->boardingHouse->location}}</div>
                            <div>Capacity: {{$room->capacity}}</div>
                            <div>Current population: {{$room->getpopulation()}}</div>
                            <div class="mt-5">
                                <form action="
                                {{route('boarders.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="room" value="{{$room->id}}">
                                    <input type="hidden" name="boarder" value="{{auth()->user()->id}}">
                                    {{-- check if user is not owner --}}
                                    @if (auth()->user()->role!= 'owner')

                                    {{-- check if the user is already registered as boarder --}}
                                    @if (auth()->user()->room())

                                    {{-- check if user has already applied for that room --}}
                                    @if (auth()->user()->room()->id == $room->id)

                                    <button class="btn btn-primary" disabled>Applied</button>
                                    @endif
                                    @else
                                    <button class="btn btn-primary">Apply</button>
                                    @endif
                                    @else
                                    <button class="btn btn-primary" disabled>Owner cannot apply for rooms!</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row full-screen-height">
        <div class="col-md-8">
            <div class="mx-5 mt-2 text-center">
                <h2>{{$room->name}}</h2>
            </div>
            <div class="text-center mb-2">
                <img src="{{asset('images/photos/'.$room->photo)}}" alt=""
                    class="border border-3 border-dark img-fluid">
            </div>
            <div class="mb-2 mx-5">
                <p>Capacity: {{$room->capacity}}</p>
                <p>Population: {{$room->getPopulation()}}</p>
            </div>
            <div class="mb-2 mx-5">
                {{-- displaying the current boarders in the room --}}
                <table class="table table-striped border">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($boarders as $boarder)
                        @if ($boarder->is_confirmed == 1)
                        <tr>
                            <td>{{$boarder->user->name}}</td>
                            <td>{{$boarder->user->phone}}</td>
                            <td>
                                <a href="{{route('boarders.profile', [$boarder->id])}}" class="btn btn-primary">View
                                    details</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4 border-start border-gray border-3 p-2">
            <h4>Applications</h4>
            @foreach ($boarders as $boarder)
            @if ($boarder->is_confirmed == 0)
            <div class="card p-2">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="">
                        {{$boarder->user->name}}
                    </div>
                    <div class="d-flex">
                        <form action="{{route('boarders.decision')}}" method="post">
                            @csrf
                            <input type="hidden" name="boarder" value="{{$boarder->id}}">
                            <input type="hidden" name="decision" value="1">
                            <button class="btn btn-primary mx-1" type="submit">Accept</button>
                        </form>
                        <form action="{{route('boarders.decision')}}" method="POST">
                            @csrf
                            <input type="hidden" name="boarder" value="{{$boarder->id}}">
                            <input type="hidden" name="decision" value="0">
                            <button class="btn btn-danger mx-1" type="submit">Decline</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-3 justify-content-center">
        <div class="col-md-10">
            <div class="card bg-light rounded-3 h-100 border-dark">
                <div class="row">
                    <div class="col-md-4 justify-content-center">
                        <div class="p-3 text-center">
                            <img src="{{asset('images/default-profile.png')}}" alt="profile picture"
                                class="profile-photo">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mt-3 mx-2 p-2 border border-3"><span class="fs-1">{{$boarder->user->name}}</span>
                        </div>
                        <div class="mt-3 mx-2 p-2 border border-3"><span class="fs-3">{{$boarder->user->phone}}</span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="p-3 bg-secondary">
                    <div class="fs-3 text-light">
                        <div class="row mt-2">
                            <div class="col-4">
                                Boarding House:
                            </div>
                            <div class="col-8">
                                <div class="rounded-2 px-3 py-1 bg-light text-dark">

                                    {{$boarder->room->boardingHouse->name}}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4">
                                Room:
                            </div>
                            <div class="col-8">
                                <div class="rounded-2 px-3 py-1 bg-light text-dark">
                                    {{$boarder->room->name}}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4">
                                Starting Date:
                            </div>
                            <div class="col-8">
                                <div class="rounded-2 px-3 py-1 bg-light text-dark">
                                    January 1, 2025
                                </div>
                            </div>
                        </div>
                        <hr class="border border-light border-2 opacity-50 mt-3">
                        <div class="row mt-2">
                            <div>
                                <form action="{{route('boarders.print')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{url()->current()}}" name="url">
                                    <button class="btn btn-primary" type="submit">Print</button>
                                </form>
                                {{-- <a href="{{route('boarders.print', [$boarder->id])}}"
                                    class="btn btn-primary">Print</a> --}}
                            </div>
                            <div>
                                Payment
                            </div>
                            <div>
                                <table class="table table-light">
                                    <thead>
                                        <tr>
                                            <th>Start</th>
                                            <th>End</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2025-01-01</td>
                                            <td>2025-01-31</td>
                                            <td>800</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
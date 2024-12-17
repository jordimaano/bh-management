@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Edit Boarding House</span>
                </div>
                <div class="card-body">
                    <form action="{{route('boarding-houses.update', [$boardingHouse->id])}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 px-3">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{$boardingHouse->name}}" required autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3 px-3">
                            <label for="location">Location</label>
                            <input id="location" type="text"
                                class="form-control @error('location') is-invalid @enderror" name="location"
                                value="{{$boardingHouse->location}}" required>
                            @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3 px-3">
                            <label for="photo">Photo</label>
                            <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror"
                                name="photo" required>
                            @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3 d-flex justify-content-end px-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
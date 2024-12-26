@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <form runat="server" action="{{route('boarding-houses.store')}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 px-3">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autofocus>
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
                                value="{{ old('location') }}" required>
                            @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3 px-3">
                            <div class="text-center">
                                <img id="uploadedPhotoDisplay" src="#" alt="boarding house photo" class="img-fluid">
                            </div>
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
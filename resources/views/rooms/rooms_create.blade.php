@extends('layouts.app')

@section('content')
<div class="container">
    @if (session()->has('errors'))
    <div class="alert alert-danger d-flex justify-content-between">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <form action="{{route('rooms.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input name="bhId" type="hidden" value="{{$boardingHouse}}">
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
                    <label for="capacity">Capacity</label>
                    <input id="capacity" type="number" min="1"
                        class="form-control @error('capacity') is-invalid @enderror" name="capacity"
                        value="{{ old('capacity') }}" required>
                    @error('capacity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3 px-3">
                    <label for="rent_price">Rent</label>
                    <input id="rent_price" type="number" min="1" step="0.01"
                        class="form-control @error('rent_price') is-invalid @enderror" name="rent_price"
                        value="{{ old('rent_price') }}" required>
                    @error('rent_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3 px-3">
                    <label for="photo">Photo</label>
                    <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo"
                        required>
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
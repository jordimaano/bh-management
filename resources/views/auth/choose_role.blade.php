@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card h-100">
                <div class="card-header">
                    Register As
                </div>
                <div class="card-body">
                    <div class="h-50 mb-3">
                        <div>
                            <a href="{{route('role.register', ['boarder'])}}"
                                class="btn btn-primary h-100 d-flex align-items-center justify-content-center fs-2">Boarder</a>
                        </div>
                    </div>
                    <div class="h-50 mb-3">
                        <div>
                            <a href="{{route('role.register', ['owner'])}}"
                                class="btn btn-primary h-100 d-flex align-items-center justify-content-center fs-2">Owner</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
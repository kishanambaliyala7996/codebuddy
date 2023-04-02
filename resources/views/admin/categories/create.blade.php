@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="d-flex justify-content-between align-items-center">
                            Create Category
                            <a href="{{ route('categories.index') }}" class="btn btn-sm btn-warning">Back</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('categories.store') }}">
                            @csrf
                            @include('admin.categories.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

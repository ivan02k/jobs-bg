@extends('adminlte::page')
@section('content')
    @if(\Illuminate\Support\Facades\Auth::user())
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 pt-3">
                <div class="card">
                    <h5 class="card-header">{{ __('Create New City') }}</h5>
                    <div class="card-body">
                        <form method="POST" action="{{route('cities.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-end">{{__('Name')}}</label>

                                <div class="col-md-6">
                                    <input type="text"
                                           name="name"
                                           id="name"
                                           class="form-control" @error('name') is-invalid @enderror
                                           value="{{ old('name') }}" required
                                           autocomplete="name" autofocus>
                                    @error('name')

                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3 mb-2">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create Category') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <h1 style="text-align:center">Only for admin</h1>
        <div style="text-align:center">
            <a  href="{{route('jobs.index')}}" class="btn btn-danger">Go home</a>
        </div>
    @endif
@endsection

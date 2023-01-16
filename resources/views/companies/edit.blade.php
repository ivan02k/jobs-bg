@extends('adminlte::page')
@section('content')
    @if(\Illuminate\Support\Facades\Auth::user())
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 pt-3">
                <div class="card">
                    <h5 class="card-header">{{ __('Edit City') }}</h5>
                    <div class="card-body">
                        <form method="post" action="{{route('companies.update', $company->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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

                            <div class="row mb-3">
                                <label for="city_id"
                                       class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>

                                <div class="col-md-6">
                                    <select id="city_id"
                                            class="form-control" @error('city_id') is-invalid @enderror
                                            name="city_id"
                                            required>
                                        <option selected disabled>{{__('Choose City')}}...</option>
                                        @foreach(\App\Models\City::all() as $city)
                                            <option value="{{$city->id}}">{{ ucwords($city->name) }}</option>
                                        @endforeach
                                    </select>

                                    @error('city_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="adress"
                                       class="col-md-4 col-form-label text-md-end">{{__('Adress')}}</label>
                                <div class="col-md-6">
                                    <input type="text"
                                           name="adress"
                                           id="adress"
                                           class="form-control" @error('adress') is-invalid @enderror
                                           value="{{ old('adress') }}" required
                                           autocomplete="name" autofocus>
                                    @error('adress')

                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3 mb-2">
                                <div class="col-md-6 offset-md-4">

                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
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

@extends('adminlte::page')
@section('content')
    @if(\Illuminate\Support\Facades\Auth::user())
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 pt-3">
                <div class="card">
                    <h5 class="card-header">{{ __('Create New job') }}</h5>
                    <div class="card-body">
                        <form method="POST" action="{{route('jobs.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="position_id"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Position') }}</label>

                                <div class="col-md-6">
                                    <select id="position_id"
                                            class="form-control" @error('position_id') is-invalid @enderror
                                            name="position_id"
                                            required>
                                        <option selected disabled>{{__('Choose Position')}}...</option>
                                        @foreach(\App\Models\Position::all() as $position)
                                            <option value="{{$position->id}}">{{ ucwords($position->name) }}</option>
                                        @endforeach
                                    </select>

                                    @error('position_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
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
                                <label for="company_id"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Company') }}</label>

                                <div class="col-md-6">
                                    <select id="company_id"
                                            class="form-control" @error('company_id') is-invalid @enderror
                                            name="company_id"
                                            required>
                                        <option selected disabled>{{__('Choose Company')}}...</option>
                                        @foreach(\App\Models\Company::all() as $company)
                                            <option value="{{$company->id}}">{{ ucwords($company->name) }}</option>
                                        @endforeach
                                    </select>

                                    @error('company_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description"
                                       class="col-md-4 col-form-label text-md-end">{{__('Description')}}</label>
                                <div class="col-md-6">
                                    <textarea rows="10" cols="50" type="text"
                                              name="description"
                                              id="description"
                                              class="form-control" @error('description') is-invalid @enderror
                                              value="{{ old('description') }}" required
                                              autocomplete="description" autofocus>

                                    </textarea>
                                    @error('description')

                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3 mb-2">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create Company') }}
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

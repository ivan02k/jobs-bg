@extends('adminlte::page')
    @section('content')
        @if(\Illuminate\Support\Facades\Auth::user())
        <div class="container">
            <h1 class="text-center mt-3">{{__('Cities')}}</h1>
            <div class="mb-3 mt-3 text-right">
                <a href="{{route('cities.create')}}"
                   class="btn btn-primary float-end">{{__('Create new')}}
                </a>
            </div>
            <div class="row justify-content-center">
                <table class="table table-dark">
                    <thead>
                    <th>{{__('ID')}}</th>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Actions')}}</th>
                    </thead>
                    <tbody>
                    @foreach($cities as $city)
                        <tr>
                            <td>{{( $city->id)}}</td>
                            <td>{{( $city->name)}}</td>
                            <td>
                                <div class="d-flex">
                                    <div class="edit mx-2">
                                        <a href="{{route('cities.edit', $city->id)}}" class="btn btn-primary">{{__('Edit')}}</a>
                                    </div>
                                    <form  method="post" action="{{route('cities.delete', $city->id)}}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this item?');">{{__('DELETE')}}</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
            <h1 style="text-align:center">Only for admin</h1>
            <div style="text-align:center">
                <a  href="{{route('jobs.index')}}" class="btn btn-danger">Go home</a>
            </div>
        @endif
    @endsection


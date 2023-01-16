@extends('adminlte::page')
@section('content')
    @if(\Illuminate\Support\Facades\Auth::user())
    <div class="container">
        <h1 class="text-center mt-3">{{__('Companies')}}</h1>
        <div class="mb-3 mt-3 text-right">
            <a href="{{route('companies.create')}}"
               class="btn btn-primary float-end">{{__('Create new')}}
            </a>
        </div>
        <div class="row justify-content-center">
            <table class="table table-dark">
                <thead>
                <th>{{__('ID')}}</th>
                <th>{{__('Name')}}</th>
                <th>{{__('City')}}</th>
                <th>{{__('Adress')}}</th>
                <th>{{__('Actions')}}</th>
                </thead>
                <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{( $company->id)}}</td>
                        <td>{{( $company->name)}}</td>
                        <td>{{( $company->city->name)}}</td>
                        <td>{{( $company->adress)}}</td>
                        <td>
                            <div class="d-flex">
                                <div class="edit mx-2">
                                    <a href="{{route('companies.edit', $company->id)}}" class="btn btn-primary">{{__('Edit')}}</a>
                                </div>
                                <form  method="post" action="{{route('companies.delete', $company->id)}}" class="d-inline">
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

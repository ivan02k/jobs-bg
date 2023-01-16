@extends('layouts.null')
@section('content')
    <!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <style>
        th, td {
            border-bottom: 2px solid black;
        }
        table {
            width: 100%;
        }

        td {
            font-family: Georgia, "Times New Roman", Times, serif;
            font-size: 120%;
            text-align: center;
            height: 100px;
            width: 10%;
        }
        th {
            font-family: Georgia, "Times New Roman", Times, serif;
            height: 50px;
            width: 10%;
            text-align: center;
        }
        h1 {
            font-family: Georgia, "Times New Roman", Times, serif;
            font-size: 500%;
            color: white;
        }
        p {
            font-family: Georgia, "Times New Roman", Times, serif;
            font-size: 200%;
            color: white;
        }
        body{
            background-color:snow;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: black;
            position: -webkit-sticky; /* Safari */
            position: sticky;
        }

        li a {
            font-family: Georgia, "Times New Roman", Times, serif;
            font-size: 120%;
            display: block;
            color: white;
            text-align: center;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div style="position: fixed;
  bottom: 3%;margin-left: 1%">
    <ul>
        <li><a href="#search">Back</a></li>
    </ul>
</div>

<div style="background-color:powderblue;border-style: solid;width: 90%;margin-left: auto;
  margin-right: auto;">
    <br>
    <h1 style="text-align:center">Find your Job</h1>
    <p style="text-align:center">Search by position!</p>
    <div class="container">
        <div class="search">
            <input style="text-align:center" name="search" id="search" placeholder="Search" class="form-control">
        </div>
    </div>
    <br>
</div>

<div style="width: 90%;margin-left: auto;margin-right: auto;background-color:white">
    @if(\Illuminate\Support\Facades\Auth::user())
        <div style="background-color:black">
            <div style="text-align:center">
                <a style="color: white;font-size: 120%"
                   href="{{route('jobs.create')}}"
                >{{__('Create new Job')}}
                </a>
            </div>
        </div>
    @endif
    <div style="margin-left: auto;margin-right: auto;">
        <table>
            <thead>
            @if(\Illuminate\Support\Facades\Auth::user())
            <th>ID</th>
            @endif
            <th>Position</th>
            <th>City</th>
            <th>Company</th>
            <th>Description</th>
            @if(\Illuminate\Support\Facades\Auth::user())
            <th>Actions</th>
            @endif
            </thead>
            <tbody id="Content" class="searchdata"></tbody>
            <tbody class="alldata">
            @foreach($jobs as $job)
                <tr>
                    @if(\Illuminate\Support\Facades\Auth::user())
                    <td>{{( $job->id)}}</td>
                    @endif
                    <td>{{( $job->position->name)}}</td>
                    <td>{{( $job->city->name)}}</td>
                    <td>{{( $job->company->name)}}</td>
                    <td id="clicked{{($job->id)}}"><div style="font-size: 50%"><a onclick="myFunction({{($job)}})">Open</a></div></td>
                    @if(\Illuminate\Support\Facades\Auth::user())
                        <td>
                            <div style="font-size: 50%">
                                    <a  href="{{route('jobs.index_admin')}}">Go</a>
                            </div>
                    @endif
                </tr>
                <tr id="{{($job->id)}}">
                </tr>
            @endforeach
            </tbody>
        </table>
            </tbody>
    </div>
</div>

<script>
    function myFunction(job) {
        let id = job.id;
        document.getElementById(id).innerHTML = `
        <td colspan="4"><textarea rows=10% cols=100%>${job.description}</textarea></td>`;
        document.getElementById(`clicked${id}`).innerHTML = ``;
    }
</script>

<script type="text/javascript">
    $('#search').on('keyup',function (){
        $value = $(this).val();
        console.log($value);
        if($value){
            $('.alldata').hide();
            $('.searchdata').show();
        }else {
            $('.alldata').show();
            $('.searchdata').hide();
        }
        $.ajax({
            tipe:'get',
            url:'{{URL::to('search')}}',
            data:{'search':$value},

            success:function (data){
                console.log(data);
                $('#Content').html(data);
            }
        })
    })
</script>
</body>
</html>
@endsection

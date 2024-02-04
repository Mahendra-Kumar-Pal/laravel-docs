@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">

                    <div class="card-header">
                        Dashboard
                        <span class="float-end">
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <input type="submit" value="Submit">
                            </form>
                        </span>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{$employee->name}}</td>
                                        <td>{{$employee->email}}</td>
                                        <td>
                                            @can('view', $employee->id) 
                                                <a href="{{route('gp.edit',$employee->id)}}" rel="noopener noreferrer" title="Edit">Edit</a>
                                                <a href="{{route('gp.delete',$employee->id)}}" rel="noopener noreferrer" title="Delete">Delete</a>
                                                <a href="{{route('gp.profile',$employee->id)}}" rel="noopener noreferrer" title="Profile">Profile</a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>

@endsection
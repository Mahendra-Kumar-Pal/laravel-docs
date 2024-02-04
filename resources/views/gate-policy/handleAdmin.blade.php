@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12"><br><br>
            @if (session()->has('message'))
            <h2>
                 {{session('message')}}   
            </h2>
            @endif
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
                                <a href="{{route('gp.edit',$employee->id)}}" rel="noopener noreferrer" title="Edit">Edit</a>
                                <a href="{{route('gp.delete',$employee->id)}}" rel="noopener noreferrer" title="Delete">Delete</a>
                                <a href="{{route('gp.profile',$employee->id)}}" rel="noopener noreferrer" title="Edit">Profile</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
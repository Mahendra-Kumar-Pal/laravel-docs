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
                    <td>Image</td>
                    <td>Status</td>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$employee->user->name ?? ''}}</td>
                        <td>{{$employee->user->email ?? ''}}</td>
                        <td><img src="{{$employee->image ?? ''}}" alt="profile img" width="50" height="50"></td>
                        <td>{{$employee->status ?? ''}}</td>
                    </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
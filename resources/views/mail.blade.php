@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <p>method, mail, template</p>
                    </div>
                    <div class="card-body">
                        @if (session('message1'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <a href="{{route('mail.firstMail')}}" class="btn btn-secondary btn-sm float-end">Send Mail</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <p>method, template</p>
                    </div>
                    <div class="card-body">
                        @if (session('message2'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <a href="{{route('mail.secondMail')}}" class="btn btn-secondary btn-sm float-end">Send Mail</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <p>method</p>
                    </div>
                    <div class="card-body">
                        @if (session('message3'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <a href="{{route('mail.thirdMail')}}" class="btn btn-secondary btn-sm float-end">Send Mail</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

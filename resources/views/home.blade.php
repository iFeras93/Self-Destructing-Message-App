@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>You are logged in!
                            <Strong>Welcome</Strong> {{ \Illuminate\Support\Facades\Auth::user()->name }}</p>

                        <p>
                            <a href="#" class="btn btn-success">create new message</a>
                        </p>

                        <p><span class="badge badge-info">List of unread message: </span></p>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Message</th>
                                <th>Create At</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>John</td>
                                <td>Doe</td>
                                <td>john@example.com</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

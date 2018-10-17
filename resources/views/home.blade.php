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
                            <a href="{{ url('/add_new_message') }}" class="btn btn-success">create new message</a>
                        </p>

                        <p><span class="badge badge-info">List of unread message: </span></p>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Message</th>
                                <th>Create At</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            @if($messages->count() > 0)
                                <tbody>

                                @foreach($messages as $message)
                                    <tr>
                                        <td>{{ $message->title }}</td>
                                        <td>{{ str_limit($message->content,20) }}</td>
                                        <td>{{ $message->created_at->format('Y-m-d') }}</td>

                                        <td>
                                            <!-- Trigger -->
                                            <button class="btn btn-sm btn-secondary"
                                                    onclick="copyText()"
                                                    data-id="{{ $message->id }}"
                                                    data-clipboard-text="{{ url('/message/'.$message->hash) }}">
                                                Copy link
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @else
                                <h2>No Record</h2>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extraJs')
    <script type="text/javascript">
        var clipboard = new ClipboardJS('.btn');
        clipboard.on('success', function (e) {
           alert('Link Copied')
        });

        clipboard.on('error', function (e) {
            console.error('Action:', e.action);
            console.error('Trigger:', e.trigger);
        });
    </script>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard: Users and Comments</h1>
    <form method="GET" action="{{ route('dashboard') }}" class="mb-3">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <label for="date" class="col-form-label">Filter by Date:</label>
            </div>
            <div class="col-auto">
                <input type="date" id="date" name="date" class="form-control" value="{{ $filterDate ?? '' }}">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
            @if($filterDate)
                <div class="col-auto">
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Clear</a>
                </div>
            @endif
        </div>
    </form>
    @if($filterDate)
        <div class="mb-2"><strong>Showing comments for date:</strong> {{ $filterDate }}</div>
    @endif
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <a href="{{ url('/bible-reading/' . date('Y-m-d')) }}" class="btn btn-success">Go to Today's Bible Reading</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User</th>
                <th>Email</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->comments->count())
                            <ul>
                                @foreach($user->comments as $comment)
                                    <li>
                                        <strong>{{ $comment->comment_date }}:</strong> {{ $comment->comment }}
                                        @if($comment->bibleReading)
                                            <br><small>Bible Reading: {{ $comment->bibleReading->passage ?? '' }}</small>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <em>No comments</em>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
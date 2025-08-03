@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pembacaan Alkitab Tanggal {{ \Carbon\Carbon::parse($date)->translatedFormat('d F Y') }}</h2>
    @if($reading)
        <h4>{{ $reading->passage }}</h4>
        <div class="mb-3">{{ $reading->text ?? '-' }}</div>
    @else
        <div class="alert alert-warning">Tidak ada bacaan untuk tanggal ini.</div>
    @endif

    <hr>
    <h5>Komentar</h5>
    @if($comments->count())
        <ul class="list-group mb-3">
            @foreach($comments as $comment)
                <li class="list-group-item">
                    <strong>{{ $comment->user->name ?? 'Anonim' }}</strong> ({{ \Carbon\Carbon::parse($comment->comment_date)->translatedFormat('d F Y') }}):<br>
                    {{ $comment->comment }}
                </li>
            @endforeach
        </ul>
    @else
        <div class="text-muted">Belum ada komentar.</div>
    @endif

    @auth
    <form action="{{ route('bible_reading.comment.store', ['date' => $date]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="comment" class="form-label">Tulis Komentar</label>
            <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
    @else
        <div class="alert alert-info mt-3">Silakan login untuk menulis komentar.</div>
    @endauth
</div>
@endsection
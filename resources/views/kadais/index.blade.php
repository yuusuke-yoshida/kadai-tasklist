@extends('layouts.app')

@section('content')

<h1>メッセージ一覧</h1>

    @if (count($kadais) > 0)
        <ul>
            @foreach ($kadais as $kadai)
                <li>{{ $kadai->content }}</li>
            @endforeach
        </ul>
    @endif

@endsection

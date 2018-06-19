@extends('layouts.app')

@section('content')

<h1>タスク一覧</h1>

    @if (count($kadais) > 0)
        <ul>
            @foreach ($kadais as $kadai)
                 <li>{!! link_to_route('kadais.show', $kadai->id, ['id' => $kadai->id]) !!} : {{ $kadai->status }} > {{ $kadai->content }}</li>
            @endforeach
        </ul>
    @endif
    {!! link_to_route('kadais.create', '新規タスクの投稿') !!}

@endsection

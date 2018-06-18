@extends('layouts.app')

@section('content')

    <h1>id = {{ $kadai->id }} の詳細ページ</h1>

    <p>{{ $kadai->content }}</p>
    
    {!! link_to_route('kadais.edit', 'このタスクを編集', ['id' => $kadai->id]) !!}

    {!! Form::model($kadai, ['route' => ['kadais.destroy', $kadai->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除') !!}
    {!! Form::close() !!}


@endsection

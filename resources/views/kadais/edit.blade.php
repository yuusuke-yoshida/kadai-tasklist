@extends('layouts.app')

@section('content')

    <h1>id: {{ $kadai->id }} のメッセージ編集ページ</h1>

    {!! Form::model($kadai, ['route' => ['kadais.update', $kadai->id], 'method' => 'put']) !!}

        {!! Form::label('content', 'メッセージ:') !!}
        {!! Form::text('content') !!}

        {!! Form::submit('更新') !!}

    {!! Form::close() !!}


@endsection

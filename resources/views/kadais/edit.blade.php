@extends('layouts.app')

@section('content')

    <h1>id: {{ $kadai->id }} の編集ページ</h1>

    {!! Form::model($kadai, ['route' => ['kadais.update', $kadai->id], 'method' => 'put']) !!}

        {!! Form::label('status', 'ステータス:') !!}
        {!! Form::text('status') !!}


        {!! Form::label('content', 'タスク:') !!}
        {!! Form::text('content') !!}

        {!! Form::submit('更新') !!}

    {!! Form::close() !!}


@endsection

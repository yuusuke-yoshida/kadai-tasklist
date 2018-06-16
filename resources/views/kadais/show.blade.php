@extends('layouts.app')

@section('content')

    <h1>id = {{ $kadai->id }} のメッセージ詳細ページ</h1>

    <p>{{ $kadai->content }}</p>

@endsection

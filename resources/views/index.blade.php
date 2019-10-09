@extends('layout')

@section('content')

  @foreach($memos as $memo)
    <div>
      <span> {{ $memo->content }} </span>
      <a href="{{ route('edit', ['id' => $memo->id]) }}">編集</a>
      <a href="{{ route('delete', ['id' => $memo->id]) }}">削除する</a>
    </div>
  @endforeach

  <a href="{{ route('create') }}">メモを作成</a>

@endsection

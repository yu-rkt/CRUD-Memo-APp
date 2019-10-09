@extends('layout')

@section('content')
    <form action="{{ route('update', ['id' => $memo->id]) }}" method="post">
      @csrf

        <textarea name="content" rows="4">{{ $memo->content }}</textarea>

        <button type="submit">更新</button>

        <a href="{{ route('index') }}">キャンセル</a>

    </form>

@endsection

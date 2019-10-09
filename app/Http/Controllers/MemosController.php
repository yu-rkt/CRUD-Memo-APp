<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Memo;

class MemosController extends Controller
{
    //メモの一覧を表示
    public function index()
    {
      $memos = Memo::orderBy('created_at', 'desc')->get();
      return view('index', ['memos' => $memos]);
    }

    //新規メモを作成
    public function create()
    {
      return view('create');
    }

    //作成されたメモをDBに保存
    public function store(Request $request)
    {
      $content = $request->validate(['content'=>'required|max:500']);
      Memo::create($content);
      return redirect()->route('index');
    }

    //メモを編集
    public function edit(Request $request)
    {
      $memo = Memo::find($request->id);
      return view('edit', ['memo' => $memo]);
    }

    //編集したメモを更新
    public function update(Request $request)
    {
      $memo = Memo::find($request->id);
      $content = $request->validate(['content'=>'required|max:500']);
      $memo->fill($content)->save();
      return redirect()->route('index');
    }

    //投稿を削除
    public function delete(Request $request)
    {
      $memo = Memo::find($request->id);
      $memo->delete();
      return redirect()->route('index');
    }
}

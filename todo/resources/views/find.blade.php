@extends('layout')
@section('title', 'タスク検索')
@section('content')



<div class="mainform">
    <div class="mainform__2">
        <div class="mainhead">
            <div class="mainhead"> <div class="title">タスク検索</div> </div>
            @if (Auth::check())
            <p>{{'「'.$user->name.'」' . 'でログイン中　　'}}</p>
            @else
            <p>ログインしてください。（<a href="/login">ログイン</a>｜
            <a href="/register">登録</a>）</p>
            @endif
            <form method="post" action="/logout">
            @csrf
            <input class="btn4" type="submit" value="ログアウト">
            </form>
            <br>
        </div>
       
        <br>
        @if ($errors->any())
        <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif 
      
    
        <form action="/search" method="post" >
            @csrf
            <div class="textbox">
                    <input type="text"  name="content" class="textform1">
                    <input type="hidden" name="user_id" value={{$user->id}} class="textform2">
                                

                    <select class="listbox" id="tag_id" name="tag_id">
                    @foreach ($tags as $category)
                    <option value="{{ $category->id }}">{{ $category->tagname }}</option>
                    @endforeach
                    </select>

                    <button class="btn" type="submit" >検索</button>
            </div>
        </form>
        
        <br>

        <table class="table table-striped">
            <tr>
                <th>作成日</th>
                <th>タスク名</th>
                <th>タグ</th>
                <th>更新</th>
                <th>削除</th>

                <th></th>
                <th></th>
            </tr>
            
            
        </table>
        <form method="post" action="/">
            @csrf
            <input class="btn6" type="submit" value="戻る">
        </form>
        </div>
</div>
@endsection



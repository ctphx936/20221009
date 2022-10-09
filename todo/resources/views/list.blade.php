@extends('layout')
@section('title', 'ToDo一覧')
@section('content')



<div class="mainform">
    <div class="mainform__2">
        <div class="mainhead">
            <div class="mainhead"> <div class="title">Todo List</div> </div>
            @if (Auth::check())
<!--            <p>ログイン中ユーザー: {{$user->name . ' メール' . $user->email . ''}}</p> -->
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
        <form method="post" action="/find">
            @csrf
            <input class="btn5" type="submit" value="タスク検索">
        </form>
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
      
    
<form action="/create" method="post" >
        @csrf
        <div class="textbox">
                <input type="text"  name="content" class="textform1">
                <input type="hidden" name="user_id" value={{$user->id}} class="textform2">
                              
                
                <select class="listbox" id="tag_id" name="tag_id">
                @foreach ($tags as $category)
                <option value="{{ $category->id }}">{{ $category->tagname }}</option>
                @endforeach
                </select>

                <button class="btn" type="submit" >追加</button>
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
            @foreach($todos as $todo)
            @if($user->id==$todo->user_id)
                <tr>
                <div class="textbox2">
                <td>{{ $todo->created_at  }}</td>

                <form action="{{ route('Todo.update', ['id'=>$todo->id]) }}" method="POST">
                @csrf
                
                <td><input type="text" name="content" value={{$todo->content}} class="textform2"></td>
               
                <td>
                <select class="listbox2" id="tag_id" name="tag_id">
                @foreach ($tags as $category)
                <!-- 初期値をカラムの値にする-->
                @if($todo->tag_id==$category->id)
                <option value="{{ $category->id }} "selected>{{ $category->tagname}}</option>  
                @else
                <option value="{{ $category->id }} ">{{ $category->tagname}}</option>  
                @endif
                @endforeach
                </select>
                </td>

                <td><button class="btn2" type="submit" >更新</button></td>
                
                </form>
                <td>
        
                <form action="{{ route('Todo.remove', ['id'=>$todo->id]) }}" method="POST">
                @csrf
                <button type="submit" class="btn3">削除</button>
                </form>
                </td>
            </div>
            </tr>
            @endif
            @endforeach
            
        </table>
        </div>
</div>
@endsection



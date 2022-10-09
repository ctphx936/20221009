<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Tag;

use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TagRequest;

class TodoController extends Controller
{
    //一覧表示
    public function index(Request $request)
    {
        $todo = Todo::all();
        $user = Auth::user();
        $tag  = Tag::all();
        $authors = Todo::paginate(4);
      
        $param = ['authors' => $authors, 'user' =>$user];
        return view('list', $param, ['tags' => $tag,'todos' => $todo]);
    }
    
    //検索が面表示
    public function find()
    {
        $todo = Todo::all();
        $user = Auth::user();
        $tag  = Tag::all();
        $authors = Todo::paginate(4);
        $param = ['authors' => $authors, 'user' =>$user];
        return view('find', $param, ['tags' => $tag,'todos' => $todo]);
    

    //    return view('find', ['input' => '']);
    }

    //public function index()
    //{
    //    
    //   return view('list', ['todos' => $todo]);
    //}
    
    //作成
    public function create(TodoRequest $request)
    {
        $form = $request->all();
        //dd($form);
        Todo::create($form);
        return redirect('/');
	}

    //検索
    public function search(Request $request)
    {

        //$form = $request->all();
       //dd($request);
        //Todo::create($form);
 //       return redirect('/find');
        $keyword = $request->input('content');
//        $keyword = $request->input('content');

        $tag = $request->input('tag_id');
        $usr = $request->input('user_id');

        $query = Todo::query();

        if(!empty($keyword)) {
            $query->where('content', 'LIKE', "%{$keyword}%")->where('user_id', 'LIKE', $usr);
        }else{
            $query->Where('tag_id', 'LIKE', "%{$tag}%")->where('user_id', 'LIKE', $usr);
        }

        $todos = $query->get();


        $user = Auth::user(); 
        $tag  = Tag::all();
        $authors = Todo::paginate(4);
        $param = ['authors' => $authors, 'user' =>$user, 'tags' => $tag];
        return view('/search',$param,compact('todos', 'keyword'));
        //return redirect('/find',$param,compact('todos', 'keyword'));    
        //return view('find', compact('todos', 'keyword'));
	}


    //更新
    public function update(TodoRequest $request, $id)
    {
        $form = $request->all();
        unset($form['_token']);
        Todo::find($id)->update($form);
        
        return redirect()->back();
    }

    //削除
    public function remove($id)
    {
       
        $todo = Todo::find($id)->delete();
        return redirect()->back();
    
    }

    //tags
  


    //ミドルウェア
    public function get()
    {
        $text = [
            'content' => '自由に入力してください',
        ];
        return view('middleware', $text);
    }
    public function post(Request $request)
    {
        $content = $request->content;
        $text = [
            'content' => $content . 'と入力しましたね'
        ];
        return view('middleware', $text);
    }

}
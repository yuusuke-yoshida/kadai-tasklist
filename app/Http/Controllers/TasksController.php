<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;    // 追加

use App\Http\Controllers\Controller;

class TasksController extends Controller 
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index() 
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
            $tasks = Task::all();
            
            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
            $data += $this->counts($user);
            return view('tasks.index', $data);
        }else {
            return view('welcome');
            
            
        }    
    }  

    

            //$tasks = Task::all();

        // view() は blade.phpの形式のファイルをHTMLに変換してresponseを返す
        //return view('tasks.index', [
          //  'tasks' => $tasks,
        //]);

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function create()
    {
        $task = new Task;
        $user = \Auth::user();
        $data = [
            'user' => $user,
           
        ];

        return view('tasks.create', [
            'task' => $task,
        ]);
            
    }
    
     //public function create()
    //{
       // $message = new Message;

        //return view('messages.create', [
           // 'message' => $message,
       // ]);

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|max:10',   //追加
            'content' => 'required|max:191',
        ]);
        
    /**    
        $task = new Task;                
        $task->status = $request->status;   
        $task->content = $request->content;
        $task->save();
     */
       
         $request->user()->tasks()->create([        // p98-100 登録を行う
            'content'=> $request->content,
            'status'=> $request->status,           //追加
        ]);

        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = task::find($id);
         
        if (\Auth::id() === $task->user_id) {
         
        return view('tasks.show', [
            'task' => $task,
        ]);
        
        } else {
        return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $task = Task::find($id);

        if (\Auth::id() === $task->user_id) {
            
        return view('tasks.edit', [
            'task' => $task,
        ]);

        } else {
        return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'status' => 'required|max:10',   // 追加
            'content' => 'required|max:191',
        ]);
        
        
        
        $task = Task::find($id);
        
        if (\Auth::id() === $task->user_id) {
            
        $task->status = $request->status;    // 追加
        $task->content = $request->content;
        $task->save();
        
        }
      
        return redirect('/');
        
    
            
    }       
        

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
         $task = \App\Task::find($id);

        if (\Auth::id() === $task->user_id) {
            
            $task->delete();
        }


  
        return redirect('/');

    }
}

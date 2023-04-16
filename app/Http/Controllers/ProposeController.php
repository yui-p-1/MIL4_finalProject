<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Propose;
use Illuminate\Http\Request;
use Validator;  //この1行だけ追加！

class ProposeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proposes = Propose::where('user_id',Auth::user()->id)->orderBy('created_at', 'asc')->paginate(3);
        return view('proposes', [
            'proposes' => $proposes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'who' => 'required',
            'what' => 'required',
            'how' => 'required',
            'now' => 'required',
            'market' => 'required',
            'why' => 'required',
            'you' => 'required',
            'published' => 'required', 
            ]);
        
            //バリデーション:エラー 
            if ($validator->fails()) {
                return redirect('/')
                    ->withInput()
                    ->withErrors($validator);
            }
            //以下に登録処理を記述（Eloquentモデル）
        
          // Eloquentモデル
        $proposes = new Propose;
        $proposes->user_id  = Auth::user()->id; //追加のコード
        $proposes->who = $request->who;
        $proposes->what = $request->what;
        $proposes->how = $request->how;
        $proposes->now = $request->now;
        $proposes->market = $request->market;
        $proposes->why = $request->why;
        $proposes->you = $request->you;
        $proposes->published = $request->published;
        $proposes->save(); 
          return redirect('/');
            }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\propose  $propose
     * @return \Illuminate\Http\Response
     */
    public function show(propose $propose)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\propose  $propose
     * @return \Illuminate\Http\Response
     */
    public function edit($propose_id){
        $proposes = Propose::where('user_id',Auth::user()->id)->find($propose_id);
        return view('proposesedit', ['propose' => $proposes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\propose  $propose
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propose $propose)
    {
        //バリデーション
         $validator = Validator::make($request->all(), [
            'id' => 'required',
            'who' => 'required',
            'what' => 'required',
            'how' => 'required',
            'now' => 'required',
            'market' => 'required',
            'why' => 'required',
            'you' => 'required',
            'published' => 'required', 
            ]);
        
        //バリデーション:エラー
         if ($validator->fails()) {
             return redirect('/proposesedit/'.$request->id)
                 ->withInput()
                 ->withErrors($validator);
        }
        
        //データ更新
        $proposes = Propose::where('user_id',Auth::user()->id)->find($request->id);
        $proposes->who = $request->who;
        $proposes->what = $request->what;
        $proposes->how = $request->how;
        $proposes->now = $request->now;
        $proposes->market = $request->market;
        $proposes->why = $request->why;
        $proposes->you = $request->you;
        $proposes->published = $request->published;
        $proposes->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\propose  $propose
     * @return \Illuminate\Http\Response
     */
    public function destroy(propose $propose)
    {
            $propose->delete();       //追加
            return redirect('/');  //追加
    }
    
     public function __construct()
     {
          $this->middleware('auth');
     }

    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function edit(Request $request, $id){
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }
    
    public function update(Request $request, $id){
        
        $user = User::find($id);
        
        // 入力情報の取得
        $name = $request->name;
        $birthday = $request->birthday;
        $file =  $request->image;
        
        // 画像のアップロード
        // https://qiita.com/ryo-program/items/35bbe8fc3c5da1993366
        if($file){
            // 現在時刻ともともとのファイル名を組み合わせてランダムなファイル名作成
            $image = time() . $file->getClientOriginalName();
            // アップロードするフォルダ名取得
            $target_path = public_path('uploads/');
            // アップロード処理
            $file->move($target_path, $image);
        }else{
            // 画像が選択されていなければ空文字をセット
            $image = '';
        }
        
        
        $user->name = $name;
        $user->birthday = $birthday;
        $user->image = $image;
        $user->save();
        
        // トップページへリダイレクト
        return redirect('/users/' . $id);
    }
    
    public function show(Request $request, $id){
        // dd($id);
        $user = User::find($id);
        $games = $user->games()->get();
        // dd($user);
        return view('users.show', compact('user', 'games'));
    }
}

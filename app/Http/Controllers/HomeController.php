<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kouhos;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');

    }
    
    public function index()
    {
        $user = \Auth::user();
        $senkyos=Kouhos::orderBy('create_at', 'DESC' )->get();
        foreach($senkyos as $sen){
            $senkyo_id[]=$sen["title"];
        }
        //dd($senkyo_id);
        $senkyo_ids = array_unique($senkyo_id);
        $senkyo_ids = array_values($senkyo_ids); // インデックスを振り直す（オプション）
        
        foreach($senkyo_ids as $senkyo_id){
            $spacePosition = strpos($senkyo_id, " ");
            $parenthesisPosition = strpos($senkyo_id, "（");
            
            if ($spacePosition !== false && $parenthesisPosition !== false) {
                // 空白と"（"の両方が見つかった場合、より早い位置を使用
                $position = min($spacePosition, $parenthesisPosition);
                $senkyotitle[] = substr($senkyo_id, 0, $position);
            } elseif ($spacePosition !== false) {
                // 空白が見つかった場合、空白の前までの部分文字列を取得
                $senkyotitle[] = substr($senkyo_id, 0, $spacePosition);
            } elseif ($parenthesisPosition !== false) {
                // "（"が見つかった場合、"（"の前までの部分文字列を取得
                $senkyotitle[] = substr($senkyo_id, 0, $parenthesisPosition);
            } else {
                // どちらも見つからない場合、元の文字列をそのまま使用
                $senkyotitle[] = $senkyo_id;
            };
        }
        return view('vote', compact('user','senkyotitle'));
    }
    public function senkyo($id)
    {
        $kouhoshas=Kouhos::where('id',$id)->get();
        $spacePosition = strpos($kouhoshas[0]['title'], "（");
                if ($spacePosition !== false) {
                    // 空白が見つかった場合、空白の前までの部分文字列を取得
                    $senkyotitle = substr($kouhoshas[0]['title'], 0, $spacePosition);
                }else{
                    $senkyotitle=$kouhoshas[0]['title'];
                }
                
        return view('senkyo', compact('id','kouhoshas','senkyotitle','user'));
    }
}

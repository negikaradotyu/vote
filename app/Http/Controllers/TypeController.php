<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kouhos;
use Illuminate\Support\Facades\Auth;
use App\Models\Types;

class TypeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function type($type_name)
    {
        //dd($type_name);
        $user = \Auth::user();
        $types=Types::get();
        $senkyosall=Kouhos::get();
        $senkyos=[];
        if($type_name=="kuni"){
            $group1="衆議";
            $group2="参議";
            $group3="xxx";
        }
        elseif($type_name=="kubi"){
            $group1="知事";
            $group2="市長";
            $group3="町長";
        }
        elseif($type_name=="kengi"){
            $group1="県議会";
            $group2="xxx";
            $group3="xxx";
        }
        elseif($type_name=="shigi"){
            $group1="市議会";
            $group2="xxx";
            $group3="xxx";
            //dd($type_name);
        }
        foreach($senkyosall as $sen){
            if(strpos($sen['title'], $group1) !== false || strpos($sen['title'], $group2) !== false || strpos($sen['title'], $group3) !== false){
                $senkyos[]=$sen;
            }
        };
        if(empty($senkyos)){
            $senkyos[]="現在、対象となる選挙は行われていません。";
        }



        $info=Kouhos::orderBy('create_at', 'DESC' )->get();
        $types=Types::get();
            foreach($info as $sen){
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
                    $senkyotitles[] = substr($senkyo_id, 0, $position);
                } elseif ($spacePosition !== false) {
                    // 空白が見つかった場合、空白の前までの部分文字列を取得
                    $senkyotitles[] = substr($senkyo_id, 0, $spacePosition);
                } elseif ($parenthesisPosition !== false) {
                    // "（"が見つかった場合、"（"の前までの部分文字列を取得
                    $senkyotitles[] = substr($senkyo_id, 0, $parenthesisPosition);
                } else {
                    // どちらも見つからない場合、元の文字列をそのまま使用
                    $senkyotitles[] = $senkyo_id;
                };
            }
    
        return view('type', compact('types', 'senkyos', 'senkyotitles'));
    }
}
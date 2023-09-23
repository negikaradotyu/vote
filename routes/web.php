<?php

use Illuminate\Support\Facades\Route;
use App\Models\Kenlists;
use App\Models\Types;
use App\Models\Kouhos;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/page_{kenname}', function ($kenname) {
    $kenroma=Kenlists::where('kenroma', $kenname)->first();
    $kenkanji=$kenroma['kenkanji'];
    $senkyos=Kouhos::where('ken', $kenkanji)->get();
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

    return view('page', compact('types', 'kenname','kenkanji', 'senkyos', 'senkyotitles'));
});

Route::get('/category/{category}', [App\Http\Controllers\HomeController::class, 'category'])->name('category');
Route::get('/online-vote', [App\Http\Controllers\HomeController::class, 'index'])->name('vote');
Route::get('/senkyo/{id}', [App\Http\Controllers\HomeController::class, 'senkyo'])->name('senkyo');
Route::get('/type/{type_name}', [App\Http\Controllers\TypeController::class, 'type'])->name('type');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

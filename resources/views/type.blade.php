@extends('layouts.app') 

@section('content')
<div class="kugityou">
@if($senkyos[0] !== "現在、対象となる選挙は行われていません。")
    @foreach($senkyos as $senkyo)
        <?php
            $kenmeis[]=$senkyo['ken'];
            $titles[]=$senkyo['title'];
            $amounts[]=$senkyo['amount'];
            $dates[]=$senkyo['date'];
            $ids[]=$senkyo['id'];
        ?>
    @endforeach
    
    <?php
        $ken=array_unique($kenmeis);
        $title=array_unique($titles);
        $amount=array_unique($amounts);
        $date=array_unique($dates);
        $id= array_unique($ids);
        $id = array_values($id);
    ?>
<?php $n = 0 ?>
    @foreach ($title as $k)
        <a href="/senkyo/{{$id[$n]}}">
            <?php $n = $n + 1 ?>
            <?php
                $spacePosition = strpos($k, "（");
                $blankPosition = strpos($k, " ");
                
                if ($spacePosition !== false && ($blankPosition === false || $spacePosition < $blankPosition)) {
                    // "（" が見つかり、かつ空白より前にある場合、空白の前までの部分文字列を取得
                    $result = substr($k, 0, $spacePosition);
                } elseif ($blankPosition !== false) {
                    // 空白が見つかった場合、空白の前までの部分文字列を取得
                    $result = substr($k, 0, $blankPosition);
                } else {
                    // どちらも見つからない場合、元の文字列をそのまま使用
                    $result = $k;
                }
            ?>
            <p>{{$result}}</p>
        </a>
    @endforeach

    
        @foreach($amount as $k)
            <p>{{$k}}</p>
        @endforeach

        @foreach($date as $k)
            <p>{{$k}}</p>
        @endforeach
    
@else
    <p>対象となる選挙はありません。</p>
@endif
</div>
@endsection

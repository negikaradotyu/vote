@extends('layouts.app2') 

@section('kensenkyo')

    <h3>{{ $kenkanji }}ページ</h3>
    @if(count($senkyos)>=1)
        @foreach($senkyos as $senkyo)
            <?php
                $kenmeis[]=$senkyo['ken'];
                $titles[]=$senkyo['title'];
                $amounts[]=$senkyo['amount'];
                $ids[]=$senkyo['id'];
            ?>
        @endforeach
        
        <?php
            $ken=array_unique($kenmeis);
            $title=array_unique($titles);
            $amount=array_unique($amounts);
            $id=array_unique($ids);
            $id = array_values($id);
        ?>
        <?php $n=0 ?>
        @foreach($title as $k)
        <a href="/senkyo/{{$id[$n]}}">
        <?php $n=$n+1 ?>
            <?php
                $spacePosition = strpos($k, "（");
                if ($spacePosition !== false) {
                    // 空白が見つかった場合、空白の前までの部分文字列を取得
                    $result = substr($k, 0, $spacePosition);
                }else{
                    $result =$k;
                }
            ?>
            <p>{{$result}}</p>
        </a>
        @endforeach
    
        @foreach($amount as $k)
            <p>{{$k}}</p>
        @endforeach
    
    @else
        <p>対象となる選挙はありません。</p>
    @endif
@endsection

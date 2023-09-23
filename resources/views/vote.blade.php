@extends('layouts.app') 

@section('content')
    <div class="bottom-content">
        <div class="allmap">
            <p>都道府県から選ぶ</p>
            <div id="jp_map">
                @php
                    $kenmeiData = DB::table('kenmeis')->get();
                    $kens = $kenmeiData->pluck('ken'); // 'ken'カラムを取得
                @endphp
                @foreach($kens as $ken)
                    {!! $ken !!} <br> {{-- {!! !!} を使ってエスケープしない --}}
                @endforeach
            </div>
        </div>
        <div class="allken">
            <div class="links2">
                @php
                    $kenmeiData = DB::table('kenmeis')->get();
                    $kenmeis = $kenmeiData->pluck('ken2'); // 'ken2'カラムを取得
                @endphp
                @foreach($kenmeis as $kenmei)
                    @if($kenmei<>null)
                    {!! $kenmei !!}  {{-- {!! !!} を使ってエスケープしない --}}
                    @endif
                    
                @endforeach
            </div>
        </div>
    </div>
@endsection
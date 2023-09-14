@extends('layouts.app') 

@section('content')
    <main>
        <div class="top-menu">
            <div class="links">
                <a href="">国政選挙</a>
                <a href="">首長選挙</a>
                <a href="">県議会選挙</a>
                <a href="">市議会選挙</a>
                <a href="">投票結果</a>
            </div>
        </div>
        <div class="contents">
            <div class="top-content">
                <div class="sub-content">
                @if (Auth::guest())
                    <div class="subtitle">
                        <p>Login</p>
                    </div>
                    <div class="loginform">
                        <form method="POST" action="{{ route('login') }}" class="form">
                            @csrf
                            <div class="email">
                                <label for="email">email：</label>
                                <input type="email" id="email" name="email">
                            </div>
                            <div class="password">
                                <label for="password">パスワード：<br></label>
                                <input type="password" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <button type="submit">ログイン</button>
                            </div>
                        </form>
                    </div>
                    @else
                        <!-- ログイン済みのユーザー向けのコンテンツ -->
                    <div class="profile">
                        <p>Welcome, {{ Auth::user()->name }}</p>
                        <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        ログアウト
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    @endif
                    <div class="registerform">
                        <a href="/register.php">
                            会員登録はこちらから
                        </a>
                        <p>会員登録すると、オンライン投票ができます。</p>
                    </div>
                </div>
                <div class="sub-content">
                    <div class="subtitle">
                        <p>新着情報</p>
                    </div>
                    <div class="tohyo-title">
                        <p>新しい000000000000 <br>000 <br>000 
                            <br>0000 <br>0000 <br>000  
                            <br>0000 <br>00000 <br>000 <br>0000 <br>000 <br> 
                            00000000000000000000000000000000000</p>
                    </div>
                </div>
                <div class="sub-content">
                    <div class="subtitle">
                        <p>今週の注目選挙！</p>
                        <div class="highlight">
                            <img class="daruma" src= "/img/7147.png" alt="">
                            <p>汚職市市長選挙<br>達磨氏再選なるか！？</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-content">
                <div class="allmap">
                    <p>都道府県から選ぶ</p>
                    <div id="jp_map">
                        @php
                            $kenmeiData = DB::table('kenmei')->get();
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
                            $kenmeiData = DB::table('kenmei')->get();
                            $kenmeis = $kenmeiData->pluck('ken2'); // 'ken2'カラムを取得
                        @endphp
                        @foreach($kenmeis as $kenmei)
                            @if($kenmei<>null)
                            {!! $kenmei !!} <br> {{-- {!! !!} を使ってエスケープしない --}}
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
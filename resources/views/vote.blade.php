@extends('layouts.app') 

@section('content')
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
                        <div class="registerform">
                        <a href="/register.php">
                            会員登録はこちらから
                        </a>
                        <p>会員登録すると、オンライン投票ができます。</p>
                    </div>
                    </div>
                    @else
                        <!-- ログイン済みのユーザー向けのコンテンツ -->
                    <div class="profile">
                        <p>有権者： {{ Auth::user()->username }}</p>
                        @if (Auth::user()->age_group ==1)
                            <?php $age="18才未満" ?>
                        @elseif (Auth::user()->age_group ==2)
                            <?php $age="18才以上&20代" ?>
                        @elseif (Auth::user()->age_group ==3)
                            <?php $age="30代" ?>
                        @elseif (Auth::user()->age_group ==4)
                            <?php $age="40代" ?>
                        @elseif (Auth::user()->age_group ==5)
                            <?php $age="50代" ?>
                        @elseif (Auth::user()->age_group ==6)
                            <?php $age="60代" ?>
                        @elseif (Auth::user()->age_group ==7)
                            <?php $age="70代" ?>
                        @endif
                        @if(Auth::user()->gender==1)
                            <?php $gender="男性" ?>
                            
                        @elseif(Auth::user()->gender==2)
                            <?php $gender="女性" ?>
                            
                        @elseif(Auth::user()->gender==3)
                            <?php $gender="不明" ?>
                        @endif
                        <p>{{$age, $gender}}</p>
                        <p> 被選挙区： {{ Auth::user()->location }}民</p>
                        <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        ログアウト
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    @endif
                    
                </div>
                <div class="sub-content">
                    <div class="subtitle">
                        <p>新着情報</p>
                    </div>
                    <div class="tohyo-title">
                        @foreach($senkyotitle as $title)
                            <a href="">{{$title}} 投票開始</a><br>
                        @endforeach
                    </div>
                </div>
                <div class="sub-content">
                    <div class="subtitle">
                        <p>今週の注目選挙！</p>
                    </div>
                    <div class="highlight">
                        <img class="daruma" src= "/img/7147.png" alt="">
                        <a>汚職市市長選挙<br>達磨氏再選なるか！？</a>
                    </div>
                </div>
            </div>
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
        </div>
@endsection
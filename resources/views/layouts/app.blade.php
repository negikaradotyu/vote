<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{'/css/style.css'}}">
    <link rel="stylesheet" href="{{'/css/style copy.css'}}">
    <link rel="stylesheet" href="{{'/css/map.css'}}">
    <link rel="stylesheet" href="{{'/css/allken.css'}}">
    <link rel="stylesheet" href="{{'/css/res.css'}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
</head>
<body>
    <header>
        <div class="title" >
            <img class="daruma" src="/img/7147.png" alt="">
            <div class="titleletter" id="container">
            <a class= "online" href="/online-vote"><h1 id="animated-h1">オンライン選挙民</h1>
                <h2 id="animated-h2">Online-Senkyomin</h2></a>
            </div>
            <img class="daruma2" src="/img/7148.png" alt="">
        </div>
    </header>
    <script>
    // JavaScriptでコミカルな動きを追加するためのコード
    const darumaImages = document.querySelectorAll('.daruma, .daruma2');
    darumaImages.forEach((img, index) => {
        // イメージに同じアニメーションを適用
        img.style.animation = `bounce 2s ease-in-out ${index % 2 === 0 ? 'alternate' : ''}`;
    });

    // アニメーションが終了したときの処理を定義する関数
    function handleAnimationEnd(event) {
        // イメージのアニメーションが終了した場合
        if (event.animationName === 'bounce') {
            // 1秒待ってから7150.pngに差し替える
            setTimeout(() => {
                if (event.target.classList.contains('daruma') || event.target.classList.contains('daruma2')) {
                    event.target.src = '/img/7150.png';

                    // さらに1秒待ってから7149.pngに差し替える
                    setTimeout(() => {
                        if (event.target.classList.contains('daruma') || event.target.classList.contains('daruma2')) {
                            // フェードアウトを適用する
                            event.target.src = '/img/7149.png';
                        
                        setTimeout(() => {
                            if (event.target.classList.contains('daruma') || event.target.classList.contains('daruma2')) {
                                // フェードアウトを適用する
                                event.target.style.animation = 'fadeout 2000ms';
                                event.target.addEventListener('animationend', () => {
                            event.target.style.display = 'none';
                        }, { once: true });
                            }
                        }, 1000); // 1000ミリ秒（1秒）後に7149.pngに差し替える
                    }
                    }, 1000); // 1000ミリ秒（1秒）後に7149.pngに差し替える
                }
            }, 1000); // 1000ミリ秒（1秒）後に7150.pngに差し替える
        }
    }

    // 各イメージにアニメーション終了時のイベントリスナーを追加
    darumaImages.forEach((img) => {
        img.addEventListener('animationend', handleAnimationEnd);
    });
</script>
<main>
    <div class="top-menu">
        <div class="links">
            @foreach($types as $type)
            <a href="/type/{{$type['type']}}">{{$type['name']}}</a>
            <?php $type_name=$type['type']; ?>
            @endforeach
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
                <div class="registerform">
                    <a href="/register.php">
                        会員登録はこちらから
                    </a>
                    <p>会員登録すると、オンライン投票ができます。</p>
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
                @foreach($senkyotitles as $title)
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
    @yield('content')
</div>
    
    

    
    <footer>
        <p class="info"> © Tsurugenef</p>
    </footer>
    </main>
</body>
</html>
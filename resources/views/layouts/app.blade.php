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
</head>
<body>
    <header>
        <div class="title" >
            <img class="daruma" src="/img/7147.png" alt="">
            <div class="titleletter" id="container">
            <h1 id="animated-h1">オンライン選挙民</h1>
                <h2 id="animated-h2">Online-Senkyomin</h2>
            </div>
            <img class="daruma2" src="/img/7148.png" alt="">
        </div>
    </header>
    <script>
        // JavaScriptでコミカルな動きを追加するためのコード
        const darumaImages = document.querySelectorAll('.daruma, .daruma2');
        darumaImages.forEach((img, index) => {
            // イメージにランダムなアニメーションを適用
            img.style.animation = `bounce ${Math.random() * 5 + 1}s ease-in-out ${index % 2 === 0 ? 'alternate' : ''}`;
            const darumaImages = document.querySelectorAll('.daruma, .daruma2');
        });

// アニメーションが終了したときの処理を定義する関数
            function handleAnimationEnd(event) {
                // イメージのアニメーションが終了した場合
                if (event.animationName === 'bounce') {
                    // この条件内でイメージを別のイメージに差し替える処理を行う
                    if (event.target.classList.contains('daruma')) {
                        // 例: イメージを差し替えるためのコード
                        event.target.src = '/img/7149.png';
                    }

                    // この条件内でイメージを別のイメージに差し替える処理を行う
                    if (event.target.classList.contains('daruma2')) {
                        // 例: イメージを差し替えるためのコード
                        event.target.src = '/img/7150.png';
                    }
                }
            }

// 各イメージにアニメーション終了時のイベントリスナーを追加
            darumaImages.forEach((img) => {
                img.addEventListener('animationend', handleAnimationEnd);
            
        });
    </script>
    @yield('content')
    <footer>
        <p class="info"> © Tsurugenef</p>
    </footer>
    
</body>
</html>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{'/css/style.css'}}">
    <link rel="stylesheet" href="{{'/css/senkyo.css'}}">
    <link rel="stylesheet" href="{{'/css/style copy.css'}}">
    <link rel="stylesheet" href="{{'/css/map.css'}}">
    <link rel="stylesheet" href="{{'/css/allken.css'}}">
    <link rel="stylesheet" href="{{'/css/res.css'}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
<main class="centered-main">
    <div class="top-menu">
        <div class="links">
            <a href="/kokusei">国政選挙</a>
            <a href="/kumityo">首長選挙</a>
            <a href="/kengikai">県議会選挙</a>
            <a href="/shigikai">市議会選挙</a>
            <a href="/kekka">投票結果</a>
        </div>
    </div>



    @yield('kensenkyo')
</main>
    <footer>
        <p class="info"> © Tsurugenef</p>
    </footer>
    
</body>
</html>
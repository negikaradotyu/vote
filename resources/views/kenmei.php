<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="allken.css">
</head>
<body>
    <div id="jp_map">
         <!-- <?php
        $servername = "127.0.0.1"; // データベースサーバーのホスト名
        $username = "root";
        $password = "";
        $dbname = "vote"; // データベース名

        // データベースに接続
        $conn = new mysqli($servername, $username, $password, $dbname);

        // 接続エラーの確認
        if ($conn->connect_error) {
            die("データベースへの接続に失敗しました: " . $conn->connect_error);
        }

        // SQLクエリを準備
        $sql = "SELECT ken2 FROM kenmei";

        // クエリを実行し、結果を取得
        $result = $conn->query($sql);

        // 結果を処理
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo $row["ken2"];
            }
        } else {
            echo "データが見つかりませんでした。";
        }

        // データベース接続をクローズ
        $conn->close();
        ?> -->
    </div>
</body>
</html>

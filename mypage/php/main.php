<?php
/**
 * マイページ機能
 *
 * お問い合わせ機能追加 2019-0303
 * 会員登録、会員変更機能追加 2019-0304
 *
 * filename:	main.php
 * @date		2019-01-22
 */

// セッションスタート
session_start();

include_once 'dbconnect.php';

// セッションにログイン情報が無い場合ログインページに戻す
if(!isset($_SESSION['user'])) {
  header("Location: login.php");
}

// ユーザーIDからユーザー名を取り出す
$query = "SELECT * FROM users WHERE user_id=".$_SESSION['user']."";
$result = $mysqli->query($query);

$result = $mysqli->query($query);
if (!$result) {
  print('クエリーが失敗しました。' . $mysqli->error);
  $mysqli->close();
  exit();
}

// ユーザー情報の取り出し
while ($row = $result->fetch_assoc()) {
  $username = $row['username'];
  $email = $row['email'];
}

// データベースの切断
$result->close();
?>

<!DOCTYPE HTML>
<html lang="ja">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>マイページ</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
  </head>

  <body>
    <div class="col-xs-6 col-xs-offset-3">

      <!-- プロフィール情報表示 -->
      <h1>プロフィール</h1>
      <ul>
        <li>名前：<?php echo $username; ?></li>
        <li>メールアドレス：<?php echo $email; ?></li>
      </ul>

      <!-- ナビゲーションバー -->
      <ul>
        <li><a href="member_regist.php">会員情報登録</a></li>
        <li><a href="member_change.php">会員情報変更</a></li>
        <li><a href="contact.php">お問い合わせ</a></li>
        <li><a href="logout.php?logout">ログアウト</a></li>
      </ul>
    </div>
  </body>
</html>
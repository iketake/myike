<?php
/**
 * お問い合わせ機能(完了)
 * 
 * お問い合わせ完了ページ
 *
 * filename:	contact_thanks.php
 * @date		2019-03-03
 */

// セッションスタート
session_start();

// 「マイページに戻る」ボタンがクリックされたときに下記を実行
if(isset($_POST['submit'])) {
    header("Location: main.php");
}
?>

<!DOCTYPE HTML>
<html lang="ja">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>お問い合わせページ(完了)</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
  </head>

  <body>
    <div class="col-xs-6 col-xs-offset-3">
      <form method="post">
        <p>お問い合わせが送信完了致しました。ありがとうございました</p>
        <button type="submit" class="btn btn-default" name="submit">マイページに戻る</button>
  </body>
</html>
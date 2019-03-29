<?php
/**
 * お問い合わせ機能(確認)
 * 
 * 項目の確認をします。
 *
 * filename:	contact_check.php
 * @date		2019-03-03
 */

// セッションスタート
session_start();

// お問い合わせ項目の内容を取得
if(isset($_SESSION['user_name'])) {
  $user_name = $_SESSION['user_name'];
}

if(isset($_SESSION['user_email'])) {
  $user_email = $_SESSION['user_email'];
}

if(isset($_SESSION['contact_matter'])) {
  $contact_matter = $_SESSION['contact_matter'];
}

// お問い合わせ内容をメールで送信する
// 「送信」ボタンがクリックされたときに下記を実行
if(isset($_POST['submit'])) {
  mb_language("Japanese");
  mb_internal_encoding("UTF-8");

  $user_email = "From: " . $user_email;
  $to    = "15jz0102@jec.ac.jp";
  $title = "名前:" . $user_name;

  if(mb_send_mail($to, $title, $contact_matter, $user_email)) {
    $result = 'ありがとうございます。メールの送信に成功しました。';
    header("Location: contact_thanks.php");
  } else {
    $result = '申し訳ありません。メールの送信に失敗しました。';
    echo $result;
    header("Location: contact_thanks.php");
  }
}
?>

<!DOCTYPE HTML>
<html lang="ja">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>お問い合わせページ(確認)</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
  </head>

  <body>
    <div class="col-xs-6 col-xs-offset-3">
      <form method="post">
        <h1>この内容で送信しても宜しいですか？</h1>
        <ul>
          <li>名前：<?php echo $user_name; ?></li>
          <li>メールアドレス：<?php echo $user_email; ?></li>
          <li>お問い合わせ内容<?php echo $contact_matter; ?></li>
        </ul>
        <button type="submit" class="btn btn-default" name="submit">送信</button>
  </body>
</html>
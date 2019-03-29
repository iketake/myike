<?php
/**
 * お問い合わせ機能
 * 
 * 項目「名前」「メールアドレス」「お問い合わせ項目」
 * 「送信」ボタンでお問い合わせ(確認)ページへ遷移
 *
 * filename:	contact.php
 * @date		2019-03-03
 */

// セッションスタート
session_start();

include_once 'dbconnect.php';

// 送信ボタンがクリックされたときに下記を実行
if(isset($_POST['submit'])) {

  $user_name      = $_POST['user_name'];      // 会員のお名前
  $user_email     = $_POST['user_email'];     // 会員のメールアドレス
  $contact_matter = $_POST['contact_matter']; //お問い合わせ内容

  // セッションに格納
  $_SESSION['user_name']      = $user_name;
  $_SESSION['user_email']     = $user_email;
  $_SESSION['contact_matter'] = $contact_matter;

  // お問い合わせ(確認ページへ遷移)
  if(isset($_SESSION['user_name'])) { 
    header("Location: contact_check.php");
  }
}
?>

<!DOCTYPE HTML>
<html lang="ja">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>お問い合わせページ</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
  </head>

  <body>
    <div class="col-xs-6 col-xs-offset-3">

      <form method="post">
        <h1>お問い合わせフォーム</h1>
        <div class="form-group">
          名前:<br>
          <input type="user_name"  class="form-control" name="user_name" required>
          メールアドレス<br>
          <input type="user_email"  class="form-control" name="user_email" required>
          お問い合わせ内容<br>
          <textarea name="contact_matter" rows="4" cols="62" required></textarea>
        </div>
          <button type="submit" class="btn btn-default" name="submit">送信</button>
          <input type="button" class="btn btn-default" onclick="location.href='main.php'" value="戻る">
      </form>
    </div>
  </body>
</html>
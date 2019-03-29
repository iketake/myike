<?php
/**
 * 会員情報変更機能
 *
 * 会員情報を変更します。
 *
 * filename:	member_change.php
 * @date		2019-03-03
 */

 // DBとの接続
include_once 'dbconnect.php';

// 「変更」ボタンがクリックされたときに下記を実行
if(isset($_POST['submit'])) {

    // POSTされた情報を変数に格納する
    $username = $mysqli->real_escape_string($_POST['username']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']);

    // パスワードをハッシュ化
    $password = password_hash($password, PASSWORD_DEFAULT);
  
    // SQL文を作成
    $query = "UPDATE users SET username='$username',email='$email',password='$password' WHERE user_id=2";
  
    // SQL文を実行
    if($mysqli->query($query)) {  ?>
      <div class="alert alert-success" role="alert">登録しました</div>
      <?php } else { ?>
      <div class="alert alert-danger" role="alert">エラーが発生しました。</div>
      <?php
    }
  }
?>

<!DOCTYPE HTML>
<html lang="ja">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>会員情報変更ページ</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
  </head>
    
    <body>
        <div class="col-xs-6 col-xs-offset-3">
            <form method="post">
            <h1>会員情報変更フォーム</h1>
    <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="ユーザー名" required />
    </div>
    <div class="form-group">
        <input type="email"  class="form-control" name="email" placeholder="メールアドレス" required />
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="パスワード" required />
    </div>
    <button type="submit" class="btn btn-default" name="submit">会員情報を変更する</button>
    <input type="button" class="btn btn-default" onclick="location.href='main.php'" value="戻る">
    </form>

</div>
</body>
</html>
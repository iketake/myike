<?php
/**
 * ログアウト機能
 *
 * セッションをクリアして、ログイン画面へ戻るボタンを設置します。
 * ログアウトを行った後は、必ずセッションのクリアを行うことを忘れないようにします。
 *
 * filename:	logout.php
 * @date		2019-01-22
 */

session_start();

// logout.php?logoutにアクセスしたユーザーをログアウトする
if(isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  header("Location: login.php");
} else {
  header("Location: login.php");
}
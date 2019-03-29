<?php
/**
 * データベース接続機能
 *
 * DBと接続するPHPファイル
 *
 * filename:	dbconenct.php
 * @date		2019-02-25
 */

require_once('config.php');

$mysqli = new mysqli($host, $username, $password, $dbname);
if ($mysqli->connect_error) {
  error_log($mysqli->connect_error);
  exit;
}

?>
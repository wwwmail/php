<?
$stmt = $pdo->query('SELECT name FROM users');
while ($row = $stmt->fetch())
{
    echo $row['name'] . "\n";

}


function pdoSet($allowed, &$values, $source = array()) {
  $set = '';
  $values = array();
  if (!$source) $source = &$_POST;
  foreach ($allowed as $field) {
    if (isset($source[$field])) {
      $set.="`".str_replace("`","``",$field)."`". "=:$field, ";
      $values[$field] = $source[$field];
    }
  }
  return substr($set, 0, -2);
}



$allowed = array("name","surname","email"); // allowed fields
$sql = "INSERT INTO users SET ".pdoSet($allowed,$values);
$stm = $dbh->prepare($sql);
$stm->execute($values);


$allowed = array("name","surname","email","password"); // allowed fields
$_POST['password'] = MD5($_POST['login'].$_POST['password']);
$sql = "UPDATE users SET ".pdoSet($allowed,$values)." WHERE id = :id";
$stm = $dbh->prepare($sql);
$values["id"] = $_POST['id'];
$stm->execute($values);





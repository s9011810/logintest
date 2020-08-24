<?php
        $dsn = "mysql:host=localhost;dbname=logintest;charset=utf8";
                $username = "dluser";
                $password = "dluser@515";
                $connection = new PDO($dsn, $username, $password);
                $sheet = $connection->query("SELECT * FROM logintest");
                $rowAccount=array();
		$id = $_GET['id'];
                foreach($sheet as $row){
                        array_push($rowAccount,$row);
                }
		$sql="DELETE FROM logintest WHERE id = $id";
                $sth = $connection->prepare($sql);
                $sth->execute(array($id=>1)); 
?> 
<!doctype html> 
<html>
  <head>
    <meta http-equiv="refresh" content="0;url=memberControl.php">
  </head> 
</html>

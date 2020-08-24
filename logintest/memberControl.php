<?php
	$dsn = "mysql:host=localhost;dbname=logintest;charset=utf8";
                $username = "dluser";
                $password = "dluser@515";
                $connection = new PDO($dsn, $username, $password);
                $sheet = $connection->query("SELECT * FROM logintest");
                $rowAccount=array();
                foreach($sheet as $row){
                        array_push($rowAccount,$row);
                }

?>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<h4>會員管理</h4>
				<table class="table">
					<thead>
						<th>帳號名稱</th>
						<th>編輯密碼</th>
						<th>刪除帳號</th>
					</thead>
					<tbody>
						<?php
							 for($i=0;$i<count($rowAccount);$i++){
								echo("<tr>");
								echo ("<td>".$rowAccount[$i]['Account']."</td>");
								echo("<td><a href=change.php?id=".$rowAccount[$i]['id'].">".編輯."</a></td>");
								echo("<td><a href=del.php?id=".$rowAccount[$i]['id'].">".刪除."</a></td>");
								echo("</tr>");
        						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>

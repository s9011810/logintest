
<?php 
		

		$dsn = "mysql:host=localhost;dbname=logintest;charset=utf8";
                $username = "dluser"; 
                $password = "dluser@515";
                $connection = new PDO($dsn, $username, $password);
		$sheet = $connection->query("SELECT * FROM logintest");
		$rowAccount=array();
		$isOK = False;
		foreach($sheet as $row){
    			array_push($rowAccount,$row);
		}
		if(isset($_POST['Account'])&&isset($_POST['Password'])){
			$account = $_POST['Account'];
			$password = $_POST['Password'];
			for($i=0;$i<count($rowAccount);$i++){
				if($rowAccount[$i]['Account']==$account){
					echo "此使用者已註冊";
					$isOk = False;
				}
				else{
					$sql="INSERT INTO logintest (Account, Password) VALUES ('$account','$password')";
                        		$sth = $connection->prepare($sql);
                        		$sth->execute();
					$isOk = True;
				}
			}
		}
		if($isOk){
			header("Location: http://120.110.115.152/logintest/login.php"); 
			exit;			
		}
?>

<!doctype html>
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
				<h4>註冊</h4>
				<div class="col-md-4">
				</div>
				 <div class="col-md-4" style="margin-top: 20%;">
					<form method="POST">
						<div class="form-group">
    							<label for="InputAccount">Account(帳號)</label>
    							<input type="text" class="form-control" id="InputAccount"  placeholder="Enter Account" name="Account">
  						</div>
						 <div class="form-group">
                                                        <label for="InputPassword">Password(密碼)</label>
                                                        <input type="password" class="form-control" id="InputPassword"  placeholder="Enter Password" name="Password">
                                                </div>
						<button type="reset" class="btn btn-danger">重寫</button>
						<button type="submit" class="btn btn-primary" style="margin-left: 50%;">註冊</button>
					</form>
                                </div>
			</div>
		</div>
	</body>
	
</html>


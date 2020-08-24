<?php
	$dsn = "mysql:host=localhost;dbname=logintest;charset=utf8";
                $username = "dluser";
                $password = "dluser@515";
                $connection = new PDO($dsn, $username, $password);
		$id = $_GET['id'];
		$change_account;
		$change_password;
		$isOk = False;
		$rowAccount=array();
                $sheet = $connection->query("SELECT * FROM logintest WHERE id = $id");
		$sheet1 = $connection->query("SELECT * FROM logintest ");
		foreach($sheet as $row){
			$change_account = $row['Account'];
			$change_password = $row['Password'];
		}
		foreach($sheet1 as $row1){
			array_push($rowAccount,$row1);
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
                                        $sql="UPDATE logintest SET Account='$account',Password='$password' WHERE id = $id";
                                        $sth = $connection->prepare($sql);
                                        $sth->execute();
                                        $isOk = True;
                                }
                        }
                }
	 if($isOk){
                        header("Location: http://120.110.115.152/logintest/memberControl.php");
                        exit;
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
	 	 <body>
                <div class="container">
                        <div class="row">
                                <div class="col-md-4">
                                </div>
                                 <div class="col-md-4" style="margin-top: 20%;">
                                        <form method="POST">
                                                <div class="form-group">
                                                        <label for="InputAccount">Account(帳號)</label>
                                                        <input type="text" class="form-control" id="InputAccount"  value=<?php echo $change_account;?> name="Account">
                                                </div>
                                                 <div class="form-group">
                                                        <label for="InputPassword">Password(密碼)</label>
                                                        <input type="password" class="form-control" id="InputPassword"  value=<?php echo $change_password;?>  name="Password">
                                                </div>
                                                <button type="reset" class="btn btn-danger">重寫</button>
                                                <button type="submit" class="btn btn-primary" style="margin-left: 50%;">註冊</button>
                                        </form>
                                </div>
                        </div>
                </div>
        </body>
               
	</body>
</html>



<!DOCTYPE html>
<html>
<head>
	<title>验证用户名密码</title>
</head>
<body>

<?php
	session_start();

	if(isset($_POST["submit"]))
	{
		$username = $_POST["username"];
		$password = $_POST["password"];
		$authcode = $_POST["authcode"];
//		新增（为了调试修改密码）
//        $_SESSION["username"]=$_POST["username"];
      // 数据库连接
		$link = mysqli_connect('localhost', 'root', '');
		$db_selected = mysqli_select_db($link, 'php');
		mysqli_query($link, "set names 'utf8'");//查询输出使用utf8的编码格式

		$sqlStr = "select username, pwd from manager";
		$result = mysqli_query($link, $sqlStr); //返回的是一个数据集，使用mysqli_fetch_array转换为数组才可以直接访问

		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			$flag = 0;

			if($username == $row['username'])
			{
				$flag = 1;
				if($password == $row['pwd'])
				{
					if($authcode != $_SESSION['authcode'])
					{
						header("refresh:3;url = index.php");
						echo "<script> alert('错误的验证码') ;history.go(-1);; </script>";
				    }
					else
					{
//						$role = $row['role'];
//						if($role == 0)
//						{
//							echo "user...";
//						}
//						else if($role == 1)
//						{
//							echo "admin...";
//						}
//						header("location:system.php?username=".$username."&role=".$role);
						header("location:system.php?username=".$username);
						break;
					}
				}
				else
				{
					header("refresh:1;url = index.php");
                    echo "<script> alert('错误的密码');history.go(-1); </script>";
				}

			}
			else{
                header("refresh:1;url = index.php");
                echo "<script> alert('错误的用户名');history.go(-1); </script>";
            }
		}
	}

?>

</body>
</html>
<?php
    session_start();
?>

<?php
    require_once("libs/db.php");
    if(isset($_POST["btn_login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
            
        $username = strip_tags($username); //remove HTML tag
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);

		if ($username == "" || $password =="") {?><script>
			alert("username và password bạn không được để trống!")
            </script>
            <?php
        }
        else{
			$sql = "SELECT * FROM user WHERE username = '$username'";
            $result = mysqli_query($link,$sql);
            $row = mysqli_fetch_assoc($result);
            printf ($row["username"] ." ".  $row["usertype"]);
            if(!$result || (mysqli_num_rows($result) < 1)){?>
                <script>
                    alert("Username không đúng");
                </script> 
            <?php
            }
            // $sql = "SELECT * FROM user";
            // $result = mysqli_query($link,$sql);
            // while($r=mysqli_fetch_assoc($result)){
            //     echo $r['username'];
            //     echo "-";
            //     echo $r['usertype'];
            //     echo "<br>";
            // }
                //echo $r;
             
            if($password === $row["password"]){
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                // phân quyền
                if($row['usertype'] == 99){
                    header('Location:admin/index.php');
                }
                else{
                    //member
              
                    header('Location:index.php');                    
                }
            }
            else{?>
                <script>
                    alert('Password failure');
                </script>
                <?php
            }
		}
    }
?>
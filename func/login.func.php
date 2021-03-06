<?php 
    include("../func/database-connect.func.php");

    function emptyInput($username,$password) {
        if(empty($username) || empty($password)) { $result = true; }
        else { $result = false; }
        return $result;
    }

    function userExist($conn,$username) {
        $sql = "SELECT * FROM login WHERE UserName = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)) {
            header("location:login.php?error=stmtfailure");
            exit();
        }

        mysqli_stmt_bind_param($stmt,"s",$username);
        mysqli_stmt_execute($stmt);
        $check = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($check)) {
            return $row;
        }
        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);

    }

    function loginUser($conn, $username, $password) {
        $userExist = userExist($conn,$username);
        if($userExist === false) {
            header("location:login.php?error=wronglogin");
            exit();
        }

        $Hash = $userExist["UserPwd"];
        $check = password_verify($password,$Hash);
        if($check === false) {
            header("location:login.php?error=wronglogin");
            exit();
        }
        else if($check === true) {
            session_start();
            $_SESSION["userid"] = $userExist["UserName"];
            $_SESSION["useruid"] = $userExist["UserName"];
            $_SESSION["staffid"] = $userExist["StaffID"];
            header("location:back.staff-reg.php");
            exit();
        }
    }
?>
<!--
            session_start();
            $_SESSION["userid"] = $userExist["UserName"];
            header("location:login.php");
            exit();
-->
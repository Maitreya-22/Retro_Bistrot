<?php
function emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat){
    $result='unset';
    if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function invalidUid($username){
    $result='unset';
    if(!preg_match("/^[a-zA-Z]*$/",$username)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function invalidEmail($email){
    $result='unset';
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function pwdMatch($pwd,$pwdRepeat){
    $result='unset';
    if($pwd!==$pwdRepeat){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function uidExists($conn,$username,$email){
    $sql ="SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt =mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:../signup.php?error=stmtfailed");
        exit();
}

mysqli_stmt_bind_param($stmt,"ss",$username,$email);
mysqli_stmt_execute($stmt);

$resultData = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($resultData)){
    return $row;
}

else{
    $result=false;
    return $result;
}

mysqli_stmt_close($stmt);

}


function createUser($conn,$name,$email,$username,$pwd){
    $sql ="INSERT INTO users (usersName,usersEmail,usersUid,usersPwd) VALUES (?, ?, ?, ?);";
    $stmt =mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:../signup.php?error=stmtfailed");
        exit();
}


$hashedPwd =password_hash($pwd,PASSWORD_DEFAULT);


mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$username,$hashedPwd);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location:../signup.php?error=none");
        exit();
}

function emptyInputLogin($username,$pwd){
    $result='unset';
    if(empty($username) || empty($pwd)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function LoginUser($conn,$username,$pwd){
    $uidExists=uidExists($conn,$username,$username);

    if($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    $pwdHashed=$uidExists["usersPwd"];
    $checkPwd =password_verify($pwd,$pwdHashed);

    if($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();

    }
}

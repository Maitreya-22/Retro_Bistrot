<?php
include_once 'header.php';
?>

<link rel="stylesheet" href="css/signup.css">
<br>
<br>
<div class="main-signup">
<section class="signup-form">
<h22 class="signh">Sign Up</h22>
<?php
if(isset($_GET["error"])){
    if($_GET["error"]=="emptyinput"){
        echo "<div class='modal-bg'>
                <span class='err-modal'>Fill in all fields.
                <button class='err-close'>X</button>
                </span>
                </div>
                ";
    }
    else if($_GET["error"]=="invaliduid"){
        echo "<div class='modal-bg'>
                <span class='err-modal'>Username can be only lowercase letters.
                <button class='err-close'>X</button>
                </span>
                </div>
                ";
    }
    else if($_GET["error"]=="invalidemail"){
        echo "<div class='modal-bg'>
                <span class='err-modal'>Choose a proper Email.
                <button class='err-close'>X</button>
                </span>
                </div>
                ";
    }
    else if($_GET["error"]=="passwordsdontmatch"){
        echo "<div class='modal-bg'>
                <span class='err-modal'>Password don't match.
                <button class='err-close'>X</button>
                </span>
                </div>
                ";
    }
    else if($_GET["error"]=="stmtfailed"){
        echo "<div class='modal-bg'>
                <span class='err-modal'>Something went wrong.
                <button class='err-close'>X</button>
                </span>
                </div>
                ";
    }
    else if($_GET["error"]=="usernametaken"){
        echo "<div class='modal-bg'>
                <span class='err-modal'>Username already exists.
                <button class='err-close'>X</button>
                </span>
                </div>
                ";
    }
    else if($_GET["error"]=="none"){
        echo "<div class='modal-bg'>
                <span class='err-modal success-msg' >You have signed up!
                <button class='err-close'>X</button>
                <button class='ok'><a href='login.php'>OK</a></button>
                </span>
                </div>
                ";
    }

}
?>
<form action="includes/signup.inc.php" method="post">
    <input type="text" name="name" placeholder="Full Name"><br><br>
    <input type="text" name="email" placeholder="E-mail"><br><br>
    <input type="text" name="uid" placeholder="Username"><br><br>
    <input type="password" name="pwd" placeholder="Password"><br><br>
    <input type="password" name="pwdrepeat" placeholder="Repeat password"><br><br><br>
    <button type="submit" name="submit" class="signup-btn">Sign Up</button>
</form>



</section>
</div>


<br>
<br>
<br>
<script src="js/error-handler.js"></script>
<?php
include_once 'footer.php';
?>

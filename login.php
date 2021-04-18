<?php
include_once 'header.php';
?>
<br>
<br>
<div class="main-signup">
<section class="signup-form">
<h22 class="signh1">Login</h22>
<?php
if(isset($_GET['error'])){
    if($_GET['error']=="emptyinput"){
        echo "<div class='modal-bg'>
                <span class='err-modal'>Fill in all fields.
                <button class='err-close'>X</button>
                </span>
                </div>
                ";
    }
    else if($_GET['error']=="wronglogin"){
        echo "<div class='modal-bg'>
        <span class='err-modal'>Invalid credentials
        <button class='err-close'>X</button>
        </span>
        </div>
        ";
    }
}
?>
<br>
<br>
<br>
<br>
<br>
<br>
<form action="includes/login.inc.php" method="post">
    <input type="text" name="uid" placeholder="Username/Email"><br>
    <br>
    <br>
    <br>
    <input type="password" name="pwd" placeholder="Password"><br>
    <br>
    <br>
    <br>
    <button type="submit" name="submit" class="login-btn">Log In</button>
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

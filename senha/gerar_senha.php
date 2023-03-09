<?php
$pass =$_POST['pass']?? false;

if($pass){
    //n faça 
    //echo md5($pass);
    //echo sha1($pass);

    //faça isso!!!
    echo password_hash($pass, PASSWORD_BCRYPT);
}
?>

<form action="<?=$_SERVER['PHP_SELF']; ?>" method="post">

<input type="password" name="pass">
<br>
<input type="submit" value="criptografar">


</form>
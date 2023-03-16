<?php
?>
<form method="post" action="novo_usuario_gravar.php" >


    <div><input type="text" name="nome"  placeholder="Nome do usuário"></div>
    
    <div><input type="email" name="email" placeholder="Email"></div> 

    <div><input type="text" name="user" placeholder="Usuário"></div> 

    <div><input type="password" name="pass" placeholder="Senha"></div>
    <br>
    
    <div><input type="checkbox" name="admi" VALUE="1"  placeholder="Admi">
    <label for="admi">Admin?</label></div> 
    <div><input type="checkbox" name="admi" VALUE="0"  placeholder="Admi">
    <label for="admi">Admin não</label></div> 

    <div><input type="submit" value="Gravar"></div>

</form>
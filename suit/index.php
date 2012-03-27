<?php
    
    if(!empty($_POST)){
        mysql_connect("localhost", "root", "marklar");    
        mysql_select_db("ggsd");
        
        $sql = "SELECT login, senha 
                  FROM usuarios 
                 WHERE login = '" . $_POST["login"] . "'
                   AND senha = '" . $_POST["senha"] . "'";                   
        $r = mysql_fetch_array(mysql_query($sql));
        
        
        if(mysql_error())            
            die("<br /><b>Erro ao executar a  query:</b> " . mysql_error());
                    
        
        if(!empty($r)){
            $_SESSION["login"] = $r[0]["login"];
            
            header('Location: ./php/index.php');                    
        } else{
            echo "<script>alert('Usuário e/ou senha incorretos.')</script>";   
        }
    }

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>GGSD - Suit</title>
        <link rel="stylesheet" href="./css/screen.css" type="text/css"/>
    </head>
    <body>
        <div id="site">
            <div id="pagina">
                <form name="login" method="post" action="<? echo $_SERVER["PHP_SELF"] ?>">
                    <div id="login"> 
                        Usuário: <input type="text" name="login"/>
                        Senha: <input type="password" name="senha"/>
                        <input type="submit" value="Entrar"/>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
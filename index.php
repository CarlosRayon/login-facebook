<?php
require_once 'app/init.php';

//Viene del init.php
// echo $fbAuth->getAuthUrl();//Verifico la url de autentificacion

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Facebook</title>
</head>
<body>

<h1>Login Con Facebook</h1>

<?php if ($fbAuth->isLogin()): ?>
<a href="logout.php">Cerrar Sesión</a>

<h3>Datos Usuario</h3>

<?php

echo '<pre>';
var_dump($_SESSION['perfil_facebook']);

?>




<?php else: ?>


<a href="<?=$fbAuth->getAuthUrl()?>">Iniciar Sesión</a>
<?php endif;?>


</body>
</html>
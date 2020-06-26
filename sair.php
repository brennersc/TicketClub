<?php

session_start();

unset($_SESSION['id_usuario']);
unset($_SESSION['email']);
unset($_SESSION['senha']);

header('Location: login');


?>
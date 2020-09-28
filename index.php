<?php

require_once("config.php");

// carrega um usuario
// $usuario = new Usuario();
// $usuario->loadById(4);

// echo $usuario;



// carrega uma lista de usuários
// $list = Usuario::getList();
// echo json_encode($list);


// carrega uma lista de usuarios buscando pelo login
// $search = Usuario::search("an");

// echo json_encode($search);



// carrega um usuário usando login e senha
$usuario = new Usuario();
$usuario->login("analfa", "fut");

echo $usuario;
<?php
session_start();

// 1. Limpa todas as variáveis da sessão em memória
$_SESSION = array();

// 2. Destrói o cookie da sessão gravado no navegador
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// 3. Destrói a sessão no servidor
session_destroy();

// 4. Redireciona para a tela de login
header("Location: login.php");
exit;
?>
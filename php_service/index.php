<?php
$uri = $_SERVER['REQUEST_URI'];

$uri = str_replace('/index.php', '', $uri);

if (preg_match('#^/customer/([^/]+)$#', $uri, $matches)) {
    $name = htmlspecialchars(urldecode($matches[1]), ENT_QUOTES, 'UTF-8');
    echo "Bonjour $name (depuis le service PHP)";
} else {
    echo "Service PHP OK";
}

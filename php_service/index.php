<?php
$uri = $_SERVER['REQUEST_URI'];

// On enlève /index.php s'il est présent
$uri = str_replace('/index.php', '', $uri);

if (preg_match('#^/customer/(.+)$#', $uri, $matches)) {
    $name = urldecode($matches[1]);
    echo "Bonjour $name (depuis le service PHP)";
} else {
    echo "Service PHP OK";
}

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__. '/src/controllers/app2.php';
} else {
    $template = file_get_contents(__DIR__. '/src/views/receitas.html');
    echo $template;
}
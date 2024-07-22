<?php

require 'vendor/autoload.php';

$update = json_decode(file_get_contents('php://input'));
if (isset($update->message)) {
    require "bot/bot.php";
    return;
}
$todo = new TODO();

if (!empty($_POST) || !empty($_GET)) {
    if (isset($_POST['text'])) {
        $todo->SETTODO($_POST['text']);
        header('Location:  index.php');
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $todo->DELETTODO($id);
    }
    if (isset($_GET['complete'])) {
        $todo->complete($_GET['complete']);
    }
    if (isset($_GET['uncompleted'])) {
        $todo->uncompleted($_GET['uncompleted']);
    }
}




require "view/view.php";
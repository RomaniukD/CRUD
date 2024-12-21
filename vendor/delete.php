<?php

require_once '../config/connect.php';

$id = $_GET ['id'];

mysqli_query($connect, query:"DELETE FROM `products` WHERE `products` . `id` = '$id'");

header('Location: /');
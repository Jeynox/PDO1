<?php
require_once "connect.php";
require __DIR__ . "/src/models/functions.php";
$friends = getFriendsList();
require __DIR__ . "/src/views/indexView.php";
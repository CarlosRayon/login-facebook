<?php

require_once 'app/init.php';

$fbAuth->signOut();

header('Location: index.php');

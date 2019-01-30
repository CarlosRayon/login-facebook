<?php
require_once 'app/init.php';

if ($fbAuth->login()) {
    header('Location: index.php');
} else {
    die('Error inicio session');
}

<?php



$errors = [];
// $errors['name']="hello";
// $errors['age']="";
// $errors['email']="";
// $errors['password']="";
// $errors['adhar']="";
$inputs = [];
$request_method = strtoupper($_SERVER['REQUEST_METHOD']);

if ($request_method === 'GET') {
    // show the form
    require('get.php');
} elseif ($request_method === 'POST')
{
        unset($errors['name']);
        unset($errors['age']);
        unset($errors['email']);
        unset($errors['password']);
        unset($errors['contact']);

    require('post.php');
    if (count($errors) > 0) { 
        require('get.php');
    }
}


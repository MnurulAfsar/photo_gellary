<?php
include './db.php';

// if($_SERVER['REQUEST_METHOD'] === "POST"){
//     //print_r($_POST);
//     //print_r($_POST['image']);
//     //var_dump($_POST['image']);
//     $title = $_POST['title'];
   
//     // print_r($_FILES);
//     echo "<pre>";
//     print_r($_FILES);
//     echo "</pre>";
//     $image = $_FILES['image'];
//     // //Checking if the image uploaded
//     // if(isset($image)){
//     //     $uploadDir = 'uploads/';
//     //     $filePath = $uploadDir . basename($image['name']);

//     //     //Upload the file
//     //     if(move_uploaded_file($image['tmp_name'], $filePath)){
//     //         //Insert the filepath in DB
//     //         $conn->query("INSERT INTO photos(title, image_path) VALUES ('$title', '$filePath')");
//     //         header('Location: index.php');
//     //         exit;
//     //     }else{
//     //         echo "File upload failed";
//     //     }
//     // }else{
//     //     echo "Please select a file";
//     // }
// }


    if($_SERVER['REQUEST_METHOD'] === "POST"){
    $title = $_POST['title'];
    // echo "<pre>";
    // print_r($_FILES['image']);
    // echo "</pre>";
    $image = $_FILES['image'];

    // Check if the image uploaded
    if(isset($image) && $image['tmp_name'] !== ""){
    $uploadDir = 'uploads/';
    $filePath = $uploadDir . basename($image['name']);

    // Upload the file
    if(move_uploaded_file($image['tmp_name'], $filePath)){
    // Insert the filepath in DB
    $conn->query("INSERT INTO photos(title, image_path) VALUES('$title', '$filePath')");
    header('Location: index.php');
    exit;
    }else{
    echo "File upload failed";
    }

    }else{
    echo "Please select a file";
    }
    }



?>
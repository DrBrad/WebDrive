<?php
    $files = $_GET;

    foreach($files as $file){
        if(is_dir($file)){
            rmdir($file);
        }else{
            unlink($file);
        }
        exec('rm -rf '.$file);
    }
    //unlink($_GET['file']);
    //rmdir($_GET['file']);
    //exec('rm -rf '.$_GET['file']);
?>
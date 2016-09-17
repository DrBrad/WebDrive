<?php
<<<<<<< HEAD
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
=======
    unlink($_GET['file']);
    rmdir($_GET['file']);
    exec('rm -rf '.$_GET['file']);
>>>>>>> b1e89509b87aca26b16153b9ef51d71ab0c6f387
?>
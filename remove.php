<?php
    unlink($_GET['file']);
    rmdir($_GET['file']);
    exec('rm -rf '.$_GET['file']);
?>
<?php
    $loc = $_GET['loc'];

    $folders = array();
    $files = array();
    $images = array();

    if($handle = opendir($loc)){
        while(false !== ($entry = readdir($handle))){
            if($entry != '.' && $entry != '..'){
                if(is_dir($loc.$entry)){
                    array_push($folders, $entry);
                }else if(is_file($loc.$entry)){
                    if(getimagesize($loc.$entry)){
                        array_push($images, $entry);
                    }else{
                        array_push($files, $entry);
                    }
                }
            }
        }
        
        //FOLDERS
        if(sizeof($folders) > 0){
            for($i = 0; $i < sizeof($folders); $i++){
                echo '<div name=\''.$folders[$i].'\' oncontextmenu=\'fileoptionname = "'.$folders[$i].'"; openOptions(); return false;\' class=\'item\' onclick="loc += \''.$folders[$i].'/\'; openfolder();"><img draggable=\'false\' src=\'pictures/folder.png\' style=\'width: 100%\'><br>'.$folders[$i].'</div>';
            }
        }
        
        //FILES
        if(sizeof($files) > 0){
            for($i = 0; $i < sizeof($files); $i++){
                echo '<div name=\''.$files[$i].'\' oncontextmenu=\'fileoptionname = "'.$files[$i].'"; openOptions(); return false;\' class=\'item\' onclick="window.open(\''.$loc.$files[$i].'\', \'_blank\');"><img draggable=\'false\' src=\'pictures/document.png\' style=\'width: 100%\'><br>'.$files[$i].'</div>';
            }
        }
        
        //IMAGES
        if(sizeof($images) > 0){
            for($i = 0; $i < sizeof($images); $i++){
                echo '<div name=\''.$images[$i].'\' oncontextmenu=\'fileoptionname = "'.$images[$i].'"; openOptions(); return false;\' class=\'item\' onclick="window.open(\''.$loc.$images[$i].'\', \'_blank\');"><img draggable=\'false\' src=\''.$loc.$images[$i].'\' style=\'width: calc(100% - 2px); border: solid #888888 1px; border-radius: 4px\'><br>'.$images[$i].'</div>';
            }
        }
        closedir($handle);
    }

    function endsWith($haystack, $needle){
        return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
    }
?>
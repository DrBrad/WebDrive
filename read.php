<?php
    $loc = $_GET['loc'];

    $folders = array();
    $files = array();
    $images = array();

    if($handle = opendir($loc)){
        while(false !== ($entry = readdir($handle))){
            if($entry != '.' && $entry != '..'){
<<<<<<< HEAD
                if(is_dir($loc.$entry)){
                    array_push($folders, $entry);
                }else if(is_file($loc.$entry)){
                    if(getimagesize($loc.$entry)){
                        array_push($images, $entry);
                    }else{
                        array_push($files, $entry);
                    }
=======
                if(endsWith($entry, '.jpg') || endsWith($entry, '.png') || endsWith($entry, '.gif')){
                    array_push($images, $entry);
                }else if(strpos($entry, '.') == false){
                    array_push($folders, $entry);
                }else{
                    array_push($files, $entry);
>>>>>>> b1e89509b87aca26b16153b9ef51d71ab0c6f387
                }
            }
        }
        
        //FOLDERS
        if(sizeof($folders) > 0){
            for($i = 0; $i < sizeof($folders); $i++){
<<<<<<< HEAD
                echo '<div name=\''.$folders[$i].'\' oncontextmenu=\'fileoptionname = "'.$folders[$i].'"; openOptions(); return false;\' class=\'item\' onclick="loc += \''.$folders[$i].'/\'; openfolder();"><img draggable=\'false\' src=\'pictures/folder.png\' style=\'width: 100%\'><br>'.$folders[$i].'</div>';
=======
                echo '<div oncontextmenu=\'fileoptionname = "'.$folders[$i].'"; openOptions(); return false;\' class=\'item\' onclick="loc += \''.$folders[$i].'/\'; openfolder();"><img draggable=\'false\' src=\'pictures/folder.png\' style=\'width: 100%\'><br>'.$folders[$i].'</div>';
>>>>>>> b1e89509b87aca26b16153b9ef51d71ab0c6f387
            }
        }
        
        //FILES
        if(sizeof($files) > 0){
            for($i = 0; $i < sizeof($files); $i++){
<<<<<<< HEAD
                echo '<div name=\''.$files[$i].'\' oncontextmenu=\'fileoptionname = "'.$files[$i].'"; openOptions(); return false;\' class=\'item\' onclick="window.open(\''.$loc.$files[$i].'\', \'_blank\');"><img draggable=\'false\' src=\'pictures/document.png\' style=\'width: 100%\'><br>'.$files[$i].'</div>';
=======
                echo '<div oncontextmenu=\'fileoptionname = "'.$files[$i].'"; openOptions(); return false;\' class=\'item\' onclick="window.open(\''.$loc.$files[$i].'\', \'_blank\');"><img draggable=\'false\' src=\'pictures/document.png\' style=\'width: 100%\'><br>'.$files[$i].'</div>';
>>>>>>> b1e89509b87aca26b16153b9ef51d71ab0c6f387
            }
        }
        
        //IMAGES
        if(sizeof($images) > 0){
            for($i = 0; $i < sizeof($images); $i++){
<<<<<<< HEAD
                echo '<div name=\''.$images[$i].'\' oncontextmenu=\'fileoptionname = "'.$images[$i].'"; openOptions(); return false;\' class=\'item\' onclick="window.open(\''.$loc.$images[$i].'\', \'_blank\');"><img draggable=\'false\' src=\''.$loc.$images[$i].'\' style=\'width: calc(100% - 2px); border: solid #888888 1px; border-radius: 4px\'><br>'.$images[$i].'</div>';
=======
                echo '<div oncontextmenu=\'fileoptionname = "'.$images[$i].'"; openOptions(); return false;\' class=\'item\' onclick="window.open(\''.$loc.$images[$i].'\', \'_blank\');"><img draggable=\'false\' src=\''.$loc.$images[$i].'\' style=\'width: calc(100% - 2px); border: solid #888888 1px; border-radius: 4px\'><br>'.$images[$i].'</div>';
>>>>>>> b1e89509b87aca26b16153b9ef51d71ab0c6f387
            }
        }
        closedir($handle);
    }

    function endsWith($haystack, $needle){
        return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
    }
?>
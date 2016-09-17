<?php
    $files = $_GET;

    if(count($files) < 2){
        foreach($files as $file){
            if(is_dir($file)){
                zipit();
            }else{
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                header('Content-Type: '.finfo_file($finfo, $file));

                $finfo = finfo_open(FILEINFO_MIME_ENCODING);
                header('Content-Transfer-Encoding: '.finfo_file($finfo, $file)); 

                header('Content-disposition: attachment; filename='.basename($file)); 
                readfile($file);
            }
        }
    }else{
        zipit();
    }

    function zipit(){
        $files = $_GET;
        $zip = new ZipArchive();

        $tmp_file = tempnam('.','');
        $zip->open($tmp_file, ZipArchive::CREATE);

        foreach($files as $file){
            if(is_dir($file)){
                $ifiles = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($file.'/'), RecursiveIteratorIterator::LEAVES_ONLY);

                foreach($ifiles as $ifile){
                    if(basename($ifile) != '..' && basename($ifile) != '.'){
                        $download_file = file_get_contents($ifile);
                        $zip->addFromString(str_replace('files/', '', $ifile), $download_file);
                    }
                }

            }else{
                $download_file = file_get_contents($file);
                $zip->addFromString(basename($file), $download_file);
            }
        }

        $zip->close();
        header('Content-disposition: attachment; filename=DriveDownload.zip');
        header('Content-type: application/zip');
        readfile($tmp_file);
    }
?>
<?php
if(!empty($_GET['file'])){
    $file_name =basename($_GET['file']);
    $file_path = "uplode/".$file_name;

    if(!empty($file_name) && file_exists($file_path)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/force-download');
        header("Content-Disposition: attachment; filename=$file_name");
        header('Content-Transfer-Encoding: binary');
        //readfile

        readfile($file_path);
        exit;
    }else{
        echo "file not found";
    }
}
?>
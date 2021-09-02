<?php
function change_extension($pdf){
    $file = $_FILES[$pdf];

    $file_ext = explode(".",$file);

    $file_name = strtolower($file_ext[0]);
    $file_actual_ext = strtolower(end($file_ext));

    if($file_actual_ext !== "pdf"){
        $file_actual_ext ="pdf";
    }

    $new_file = $file_name[0].".".$file_actual_ext;
    
    return $new_file;

}
?>

<?php
   
?>
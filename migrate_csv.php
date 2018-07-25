<?php

$inserts = "";
        $sql = "CREATE TABLE IF NOT EXISTS can_translate( ";
        $filds=[];
        $row = 1;
    if (($handle = fopen("./assets/j1939_translate.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        // echo "<p> $num campos na linha $row: <br /></p>\n";
        
        for ($c=0; $c < $num; $c++) {
            $data[$c] = str_replace("'",'"',$data[$c]);
            if($row==1){
            $type = $c==0?'int ':'text';
            $da = str_replace(' ','',$data[$c]);
            $filds[]="$da $type"; 
            }
            // echo $data[$c] . "<br />\n";

        }
        if($row==1){
            $sql .= implode(',',$filds);
            $sql .= ");";
            echo $sql;
        }else{
            $inserts .= "INSERT INTO can_translate values ('" . implode("','",$data)."');";
        }
        $row++;
        // die;
    }
    echo $inserts;
    fclose($handle);
}
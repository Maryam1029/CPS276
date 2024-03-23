<?php
require_once('../shared/db.php');
if(!empty($_POST)){
    if (!empty($_FILES['myfile']['name'])) {
        if ($_FILES['myfile']['type']!='text/plain'){
            echo("ERROR: Invalid file type");
        }else{
            $x = execute('select * from a7 where file_name = ?', [$_FILES['myfile']['name']]);
            if (!empty ($x)){
                echo ("ERROR: Duplicate file");
            }else{
                $contents = file_get_contents($_FILES['myfile']['tmp_name']);
                $contents = str_replace("\n","<br>",$contents);
                $fileName = $_FILES['myfile']['name'];
                execute("insert into a7 (file_name, contents) values (?, ?)",[$fileName, $contents]);
            }
        }

    }else{
        echo("ERROR: No File Uploaded");
    }
}
    $results = execute('select * from a7');
?>

<html>
    <form enctype="multipart/form-data" method="post">
        <input type="submit" value="Upload File" name="upload" />&nbsp;
        <input type="file" name="myfile" accept=".txt" />
        <br><br>
        <table border =1>
            <? foreach ($results as $x) { ?>
                <tr>
                    <td><?=$x['file_name']?></td>
                    <td><?=$x['contents']?></td>
                </tr>
            <?}?>
        </table>
    </form>

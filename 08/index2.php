<?
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
if (!empty($_GET)){
    //user clicked delete
    execute("delete from a7 where a7id=?",[$_GET['deleteid']]);
}
    //read data
    $results = execute('select * from a7 order by file_name');
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
                    <td><a onclick="return confirm('Are you sure?')" href="index2.php?deleteid=<?=$x['a7id']?>">Delete</a></td>
                </tr>
            <?}?>
        </table>
    </form>

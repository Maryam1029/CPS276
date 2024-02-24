<?php
require_once("Helper.php");
$name='';
$list='';
$myHelper = new Helper();
if (!empty($_REQUEST['addname'])){
    $name = $_REQUEST['name'];
    $name = $myHelper->reverseName($name);
    $list = $_REQUEST['list'];
    $list = $myHelper->addName($name, $list);
}

?>
<html>
    <head></head>
    <body>
<form method = 'post'>
    <b>Add Names</b>
    <br>
    <input type="submit" value="Add Name" name="addname">
    <input type="submit" value="Clear Names">
    <br><br>Enter Name<br>
    <input type="text" name="name" size="50">
    <br><br>List of Names<br>
    <textarea readonly name ="list" cols="50" rows="9"><?=$list?></textarea>
</form>
</html>

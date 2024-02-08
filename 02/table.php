<?
    $rows=15;
    $cols=5;
?>

<table border=1>
    <? for($r =0; $r < $rows; $r++) { ?>
    <tr>
        <? for ($c = 0; $c < $cols; $c++){ ?>
        <td><? echo('Row ' . $r + 1 . ' Cell ' . $c + 1) ?></td>
        <? } ?>
    </tr>
    <? } ?>
</table>
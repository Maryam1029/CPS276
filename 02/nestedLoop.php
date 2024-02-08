<?
  $mainList=4;
  $subList=5;
  $i=0;
?>

<ul><? for($i<0; $i<$mainList; $i++){?>
  <li><?echo($i+1)?>
    <ul><? for ($s = 0; $s < $subList; $s++){?>
      <li><?echo($s+1)?>
    <?}?></li>
</ul>
    <?}?></li>
</ul>

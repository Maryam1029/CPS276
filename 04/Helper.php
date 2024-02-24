<?
class Helper 
{
    public function reverseName($name){
        $a = explode(' ', $name);
        $a = array_reverse($a);
        $b = implode(', ', $a);
        return $b;
    }
    
    public function addName($lastNameFirstName, $existingNames){
        $existingNames = explode("\n", $existingNames);
        $existingNames[]=$lastNameFirstName;
        sort($existingNames, SORT_NATURAL | SORT_FLAG_CASE);
        $existingNames=implode("\n", $existingNames);
        return $existingNames;
        } 
}

?>

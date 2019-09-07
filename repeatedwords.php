<?php
error_reporting(0);
ini_set('display_errors', 0);
function get_word_counts($phrases) {
   $counts = array();
    foreach ($phrases as $phrase) {
        $words = explode(' ', $phrase);
        foreach ($words as $word) {
           	$word = preg_replace("#[^a-zA-Z\-]#", "", $word);
            $counts[$word] += 1;
        }
    }
    return $counts;
}
if(isset($_POST['sbtn'])){
$speech=trim(htmlspecialchars($_POST['speech']));	
$filter=filter_var($speech,FILTER_SANITIZE_SPECIAL_CHARS);
$phrases = array($filter);
$counts = get_word_counts($phrases);
arsort($counts);
foreach ($counts as $k=>$v)

{

 if ($v >= 2)

 {

  print "Duplicate word is  <b>$k</b> and its used $v times"."<br>";

 }

}
	}


?>
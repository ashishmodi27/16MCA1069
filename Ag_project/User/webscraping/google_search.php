<?php
include "header.php";
?>
<br /><br /><br />
<?php /*?>0<?php */?><?php
require_once('simple_html_dom.php');
$c = $_POST['search'];
$d = null;

if($c != '')
{
	$a = preg_match('/\s/',$c);
	if($a == '1')
	{
		$d = preg_replace('/\s+/', '+', $c);
	}
	else
	{
		$d = $c;
	}
}
$url  = 'http://www.google.com/search?hl=en&safe=active&tbo=d&site=&source=hp&q="'. $d .'"&oq="'. $d .'"';
$html = file_get_html($url);
$linkObjs = $html->find('h3.r a');
foreach ($linkObjs as $linkObj) {
    $title = trim($linkObj->plaintext);
    $link  = trim($linkObj->href);
    
    // if it is not a direct link but url reference found inside it, then extract
    if (!preg_match('/^https?/', $link) && preg_match('/q=(.+)&amp;sa=/U', $link, $matches) && preg_match('/^https?/', $matches[1])) {
        $link = $matches[1];
    } else if (!preg_match('/^https?/', $link)) { // skip if it is not a valid link
       	
	    continue;    
    }
    
    echo '<p>Title: ' . $title . '<br />';
    echo 'Link:<a href=' . $link . ' >' .$c .'</a></p>';    
}
?>
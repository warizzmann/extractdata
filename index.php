<style>
li{border:1px solid green;border-radius:5px;max-width:300px;list-style-type: none;float:left;}
.l_blue2_detik a{color:green;}
.date{color:green;}
img{float:left;}
</style>

<?php
include_once("simple_html_dom.php");
//use curl to get html content
function getHTML($url,$timeout)
{
       $ch = curl_init($url); // initialize curl with given url
       curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]); // set  useragent
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // write the response to a variable
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // follow redirects if any
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout); // max. seconds to execute
       curl_setopt($ch, CURLOPT_FAILONERROR, 1); // stop when it encounters an error
       return @curl_exec($ch);
}
// Create DOM from URL or file
$html = file_get_html('http://www.detik.com/');
$ret = $html->find('img[class=img1]');
$rett = $html->getElementById("popular");
$jum=count($rett);
?>
gambar dari detik yang classnya img1<hr />
<?php
foreach($ret as $element) 
       echo '<img src="'.$element->src . '" />';
?>
<div style="clear:both;width:100%;"></div>berita populer dari detik<hr />
<?php
	   echo $rett;
?>
<?php



// Eine Funktion um eine Ampel anzuzeigen
function draw_traffic_light(){
echo "<div style=\"line-height:0px;padding:0;text-decoration:none;\">";
$ampel_url=plugins_url( 'bilder/' , __FILE__ );

if(isset($_GET['ampel']) && is_user_logged_in() ){
update_option('ampel',$_GET['ampel']);
}

$farbe=get_option('ampel');

if ($farbe=="rot"){
echo "<img src=\"".$ampel_url."red.png\" /><br />";
}else{
if ( is_user_logged_in() ){echo "<a href=\"?ampel=rot\">";}else{}
echo "<img src=\"".$ampel_url."red-off.png\" />";
if ( is_user_logged_in() ){echo "</a>";}
echo "<br />";
}

if ($farbe=="gelb"){
echo "<img src=\"".$ampel_url."yellow.png\" /><br />";
}else{
if ( is_user_logged_in() ){echo "<a href=\"?ampel=gelb\">";}
echo "<img src=\"".$ampel_url."yellow-off.png\" />";
if ( is_user_logged_in() ){echo "</a>";}
echo "<br />";
}

if ($farbe=="gruen"){
echo "<img src=\"".$ampel_url."green.png\" /><br />";
}else{
if ( is_user_logged_in() ){echo "<a href=\"?ampel=gruen\">";}
echo "<img src=\"".$ampel_url."green-off.png\" />";
if ( is_user_logged_in() ){echo "</a>";}
echo "<br />";
}

echo "</div>";


}

?>
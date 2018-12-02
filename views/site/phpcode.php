<?php 


$database="newsadmin"; 
$username=""; 
$password=""; 

mysql_connect(localhost,root); 
@mysql_select_db($database) or die( "Unable to select database");


$query="select * from news ORDER BY 'id' DESC"; 
$result=mysql_query($query); 

$i=0; 
while ($i < 1){ 
$id=mysql_result($result,$i,"id"); 
$date=mysql_result($result,$i,"date"); 
$headline=mysql_result($result,$i,"headline"); 
$story=mysql_result($result,$i,"story"); 



$selfgen="news/$id.html"; 

$filename="$selfgen"; 
$filehandler=fopen($filename, 'w') or die("can't open file"); 

$stringData = "<body style=\"background-color: #E8E8D0; font-family: arial, helvetica, sans-serif; font-size: 12px; 
                margin: 100px\"> 
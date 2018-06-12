<?php
$vote = $_REQUEST['vote'];

//get content of textfile
$filename = "poll_result.txt";
$content = file($filename);

//put content in array
$array = explode("||", $content[0]);
$madrid = $array[0];
$liverpool = $array[1];

if ($vote == 0) {
  $madrid = $madrid + 1;
}
if ($vote == 1) {
  $liverpool = $liverpool + 1;
}

//insert votes to txt file
$insertvote = $madrid."||".$liverpool;
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
?>

<h2>Result:</h2>
<table>
<tr>
<td>Real Madrid:</td>
<td>
<img src="poll.gif"
width='<?php echo(100*round($madrid/($liverpool+$madrid),2)); ?>'
height='20'>
<?php echo(100*round($madrid/($liverpool+$madrid),2)); ?>%
</td>
</tr>
<tr>
<td>Liverpool Football Club:</td>
<td>
<img src="poll.gif"
width='<?php echo(100*round($liverpool/($liverpool+$madrid),2)); ?>'
height='20'>
<?php echo(100*round($liverpool/($liverpool+$madrid),2)); ?>%
</td>
</tr>
</table>
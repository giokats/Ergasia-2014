<!DOCTYPE html>
<html>
<head>
<?php

// Connect your Database

$connectDatabase = mysql_connect('localhost', 'root', '');


//select the database you want to connect with

mysql_select_db("site",$connectDatabase)

or die ("Could not connect to database ... \n" . mysql_error ());
?>

<script type="text/javascript">

function neaKataxwrisi(){
document.getElementById('new').style.visibility="visible";
}

function epilogi(){
document.getElementById('new').style.visibility="visible";
var sel=document.getElementById("titloi").selectedIndex;
var x=document.getElementById("titloi").options;
document.getElementById('titlos').innerHTML=x[sel].text;
var a=x[sel].text;
alert (a);
}

function validate()
{
var title=document.getElementById('titlos').value;
var news=document.getElementById('eidisi').value;
submitOK="true";
if(title.length==0){
alert("�������� ����������� ��� �����.");
submitOK="false";}
if(news.length==0){
alert("�������� ����������� ��� ������.");
submitOK="false";}
}

function akyrwsh(){
document.getElementById('titlos').value="";
document.getElementById('eidisi').value="";
}


</script>



</head>
<body>
<title>����������� �����</title>
<h1 style="text-align:center;">����������� ����� ��������� News Corner</h1>
<br> 
<br>
<form>
<h2>�������� ����� ��� �����������/�������� � ��������� ��� ������: 

<select>
<?php $query="SELECT titlos FROM eidiseis";
$result = mysql_query($query);

while($row = mysql_fetch_array($result)) { ?>
<option> <?php echo $row['titlos'];?></option><?php}?>

</select> </h2>
<br>
<input type="button" value="�������" onClick="epilogi()">
<input type="button" value="��������">
<input type="button" value="��� ������" onclick="neaKataxwrisi()">
</form>
<br>
<br>

<form id="new" style="visibility:hidden;" >
������: <textarea id="titlos"> </textarea><br>
������: <textarea id="eidisi" rows="10" cols="40"> </textarea><br>
<input type="button" name="ok" value="����������" onclick="validate()">
<input type="button" name="cancel" value="�������" onClick="akyrwsh()">
</form>
</body>
</html>
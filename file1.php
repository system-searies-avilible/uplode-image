<!-- Login form and also see if the email exist or not-->

<form method="post" enctype="multipart/form-data">
<table border="2">


<tr>
<th>Name </th>
<td><input type="text" name="txtname"/></td>
</tr>


<tr>
<th>Uplode Image</th>
<td><input type="file" name="img"/></td>
</tr>



<tr>
<th>:</th>
<td><input type="submit" name="btn_sub" value="register"/></td>
</tr>
</table>
</form>
</br></br>



<?php
$connect=mysqli_connect("localhost","root","","mytest");

if(isset($_POST['btn_sub'])){
	$name=$_POST['txtname'];
$pic=$_FILES['img']['name'];
move_uploaded_file($_FILES['img']['tmp_name'],'pics/'.$pic);
	
	
$insert=mysqli_query($connect,"insert into display_image_uplode values ('','$name','$pic')");

if($insert){
	echo"<script> alert('data inserted');</script>";	
}
else{
	echo"<script> alert('data can't be insert');</script>";
	
}
}




?>
<!--for image display-->
<table border="2" width="500px">
<tr>
<th>ID</th>
<th>Name</th>
<th>Image</th>
</tr>

<?php

$select=mysqli_query($connect,"select * from display_image_uplode ");
$num=mysqli_num_rows($select);

for($i=0; $i<$num; $i++){
	$row=mysqli_fetch_array($select);
	echo"<tr>";
	echo"<td>".$row[0]."</td>";
	echo"<td>".$row[1]."</td>";
	
	echo"<td>".'<img src="pics/'.$row[2].'" width="100px">'."</td>";
	echo"</tr>";
	
}

?>
</table>
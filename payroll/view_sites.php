<?php
	include_once'ConnectDB.php';
	$sql = "SELECT * FROM  sites";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
        $num=1;
		while($row = $result->fetch_assoc()) {
?>	
		<tr class="table-light">
            <td><?=$num++;?></td>
            <td><?=$row['SITE_ID'];?></td>
			<td><?=$row['SITE_NAME'];?></td>
		</tr>
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($conn);
?>
 
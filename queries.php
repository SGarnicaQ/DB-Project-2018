<?php
include 'header.php';


echo 
'

<form class="selectTables" action="#" method="POST">
<select name="tables[]" multiple>
<option value="users">users</option>
<option value="words">words</option>
</select>
<button type="submit" name="btnT" value="true">VER</button>
</form>

';

if (isset($_POST['tables'])) {
	foreach ($_POST['tables'] as $key ) {
		$sql = 
		'
		SELECT * from '.$key.';
		';

		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

		// Print the column names as the headers of a table
		echo '<table><thead><tr>';
		for($i = 0; $i < mysqli_num_fields($result); $i++) {
			$field_info = mysqli_fetch_field($result);
			echo '<th>'.$field_info->name.'</th>';
		}
		echo '</tr></thead>';

		// Print the data
		while($row = mysqli_fetch_row($result)) {
			echo '<tr>';
			foreach($row as $_column) {
				echo '<td>'.$_column.'</td>';
			}
			echo '</tr>';
		}

		echo '</table>';
	}
}
?>


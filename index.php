<!DOCTYPE HTML>
<html>
	<head>
		<body>
			<form action='index.php' method='GET'>
			<input type='text' name='val_1' pattern='([0-9]{4})-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01]) - ([0-9]{4})-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])'>
			<br>
			Введите число для сравнения:
			<br>
			<input type='text' name='val_2' pattern='([0-9]{4})-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])'>
			<input type='submit'> 
			</form>  
			<?php
			$val_1 = $_GET['val_1'];
			$val_2 = $_GET['val_2'];
			
			function getDates($val_1,$val_2)
			{
				$subject = $val_1;
				$pattern = '/[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])/';
				preg_match($pattern,$subject, $matches);
				$new_val_1 = $matches[0];
				
				$new_val_1_time = strtotime($new_val_1);
				
				$subject = $val_1;
				$pattern = '/[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])/';
				preg_match($pattern,$subject, $matches, $preg_offset_capture,13);
				$new_val_2 = $matches[0];
				
				$new_val_2_time = strtotime($new_val_2);
				
				$subject_d = $val_2;
				$pattern = '/([0-9]{4})-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])/';
				preg_match($pattern,$subject_d, $matches_d);

				$new_val_3 = $matches_d[0];
				
				$new_val_3_time = strtotime($new_val_3);
			
				if(($new_val_3_time < $new_val_2_time && $new_val_3_time > $new_val_1_time) ||
				 ($new_val_3_time == $new_val_1_time || $new_val_3_time == $new_val_2_time) )
					echo "true";
				else
					echo "false";
			}
			if(isset($_GET['val_1']))
			getDates($val_1,$val_2);
		 	?>
		</body>
	</head>
</html>	
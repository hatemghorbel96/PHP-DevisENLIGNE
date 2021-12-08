	<body class="welcome">
		<div class="step1" align="center">
	<?php
		foreach ($menu as $row)
			{
			?>
		
			<form action='' method='post'>
				<input type='hidden' name='menu' value="<?php echo $row[0];?>" />
				<input type='image'  width="150" height="100" alt="<?php echo $row[1];?>" value="<?php echo $row[1]?htmlspecialchars($row[1]):'';?>"/>
			</form>
			<br>
			<br>
			<?php
			}
		?>
		</div>
	</body>
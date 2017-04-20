
<div id="popup1" class="overlay">
	<div class="popup">
		<h2>Select theme</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
		<?php	
	
		echo "<form action='theme_act.php' method='post'> </p>
<div id='size'>
				select theme:
				<select name='theme'>
					<option>$style</option>
					<option>SolarizedLight</option>
					<option>Def</option>
					<option>SolarizedDark</option>
					
				</select>
		</div>
		<a href='index.php'><input style='margin-top: 20px;' id='atc' type = 'submit' name ='submit' value = 'select' /></a>
		</form>";	
?>
			</div>
	</div>
</div>
<table style="margin: auto;">	
			<tr>
			<form method="GET" action="index.php">
				<td>Name/Author:<br>
					<input type="text" name="search"/>
				</td>
			<td>Genre: <br>
				<select name="genre">
				<option value="">Any Ganre</option>';
				<?php

					while (list($k,$v) = each($qGenre)){
						echo "<option><?=$k[$v]?></option>";
					}
				?>
				</select>
			</td>
			<td><br><input type="submit" name="show" value="Show"/></td>
			</form>
			</tr>
</table><br>
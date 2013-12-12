<div>
	<form class="cmxform" id="race_add_form" method='POST' action='/races/p_add'>

		<label>Race Name: </label>
		<input type="text" name="race_name" id="race_name" minlength="2" required/>
			<br><br>

		<label>Race Date: </label>
		<input type="date" name="race_date" id="race_date" minlength="2" required/>
			<br><br>

		<label>Race Type (Length): </label>
		<select name="race_length" required/>
			<option value="">Select Length</option>
			<option>5 Kilometers</option>
			<option>5 Miles</option>
			<option>10 Kilometers</option>
			<option>Half Marathon</option>
			<option>Full Marathon</option>
			<option>Other</option>
		</select>
			<br><br>

		<label>Race Time (Enter in HH:MM:SS): </label>
		<select name="time_hours" id="time_hours" size="1" required/>
			<option value="">HH</option>
		</select><label>:</label>
		<select name="time_minutes" id="time_minutes" size="1" required/>
			<option value="">MM</option>
		</select><label>:</label>
		<select name="time_seconds" id="time_seconds" size="1" required/>
			<option value="">SS</option>
		</select>
			<br><br>

		<label>Race Pace (Enter in MM:SS): </label>
		<select name="pace_minutes" id="pace_minutes" size="1" required/>
			<option value="">MM</option>
		</select><label>:</label>
		<select name="pace_seconds" id="pace_seconds" size="1" required/>
			<option value="">SS</option>
		</select>
			<br><br>

		<input type="submit" name="submit" value"Submit">

	</form>
</div>
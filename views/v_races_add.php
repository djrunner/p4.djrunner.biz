<div>
	<form class="cmxform" id="race_add_form" method='POST' action='/races/p_add'>
		<fieldset>
			<legend>Enter the details of your race!</legend>
		<p>
		<label>Race Name: </label>
		<input type="text" name="race_name" id="race_name" minlength="2" required/>
			<br><br>
		</p>
		<p>
		<label>Race Date: </label>
		<input type="date" name="race_date" id="race_date" required/>
			<br><br>
		</p>
		<p>
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
		</p>
		<p>
		<label>Race Time (Enter in HH:MM:SS): </label>
		<input type="text" name="race_time_string" size="8" minlength="8" maxlength="8" class="required class_format_check"/>
			<br><br>
		</p>
		<p>
		<label>Race Pace (Enter in MM:SS): </label>
		<input type="text" name="race_pace_string" size="8" minlength="5" maxlength="5" class="required class_format_check"/>
		<label>Minute/Mile</label>
			<br><br>
		</p>
		<p>
		<input type="submit" value"Submit">
		</p>
		</fieldset>
	</form>
</div>
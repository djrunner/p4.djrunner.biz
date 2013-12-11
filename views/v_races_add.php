<div>
	<form method='POST' action='/races/p_add'>

		<label>Race Name: </label><br>
		<input type="text" name="race_name" id="race_name">
			<br>
		<label>Race Date: </label><br>
		<input type="date" name="race_date" id="race_date">
			<br>
		<label>Race Type (Length): </label>
		<select>
			<option>5 Kilometers</option>
			<option>5 Miles</option>
			<option>10 Kilometers</option>
			<option>Half Marathon</option>
			<option>Full Marathon</option>
		</select>
			<br>
		<label>Race Time (Enter in HH:MM:SS): </label>
		<select name="hours" id="hours" size="1"></select><label>:</label>
		<select name="minutes" id="minutes" size="1"></select><label>:</label>
		<select name="seconds" id="seconds" size="1"></select>


			<br>
		<label>Race Pace </label><input type="button" id="calculate" value="(Calculate):">
		<input type="text" name="race_pace" id="race_pace" readonly>
			<br>
		<input type="submit" name="submit" value"Submit">

	</form>
</div>
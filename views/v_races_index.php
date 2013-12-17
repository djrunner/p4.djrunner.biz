<h1>Here are your race stats</h1>


<div id="tabs">
	<ul>
    <li><a href="#tabs-1">5 Kilometer</a></li>
    <li><a href="#tabs-2">5 Miles</a></li>
    <li><a href="#tabs-3">10 Kilometers</a></li>
    <li><a href="#tabs-4">Half Marathon</a></li>
    <li><a href="#tabs-5">Full Marathon</a></li>
    <li><a href="#tabs-6">Race Stats</a></li>
  </ul>

	<div id="tabs-1">
		<div id="5_kilometers">

			<table id="table1" class="tablesorter">
				<thead>
					<tr><th>Race Name</th><th>Race Date</th><th>Race Time</th><th>Race Pace</th></tr>
				</thead>
				<tbody>
					<?php foreach($five_kilometers as $five_kilometer): ?>
					<article>
					<tr><td><?=$five_kilometer['race_name']?></td><td><?=$five_kilometer['race_date']?></td>
						<td><?=$five_kilometer['race_time_string']?></td><td><?=$five_kilometer['race_pace_string']?></td></tr>
					<?php endforeach; ?>
					</article>
				</tbody>
			</table>

		</div>
	</div>

	<div id="tabs-2">
		<div id="5_miles">
			
			<table id="table2" class="tablesorter">
				<thead>
					<tr><th>Race Name</th><th>Race Date</th><th>Race Time</th><th>Race Pace</th></tr>
				</thead>
				<tbody>
					<?php foreach($five_miles as $five_mile): ?>
					<article>
					<tr><td><?=$five_mile['race_name']?></td><td><?=$five_mile['race_date']?></td>
						<td><?=$five_mile['race_time_string']?></td><td><?=$five_mile['race_pace_string']?></td></tr>
					<?php endforeach; ?>
					</article>
				</tbody>
			</table>

		</div>
	</div>

	<div id="tabs-3">
		<div id="10_kilometers">

			<table id="table3" class="tablesorter">
				<thead>
					<tr><th>Race Name</th><th>Race Date</th><th>Race Time</th><th>Race Pace</th></tr>
				</thead>
				<tbody>
					<?php foreach($ten_kilometers as $ten_kilometer): ?>
					<article>
					<tr><td><?=$ten_kilometer['race_name']?></td><td><?=$ten_kilometer['race_date']?></td>
						<td><?=$ten_kilometer['race_time_string']?></td><td><?=$ten_kilometer['race_pace_string']?></td></tr>
					<?php endforeach; ?>
					</article>
				</tbody>
			</table>
			
		</div>
	</div>


	<div id="tabs-4">
		<div id="half_marathon">
			
			<table id="table4" class="tablesorter">
				<thead>
					<tr><th>Race Name</th><th>Race Date</th><th>Race Time</th><th>Race Pace</th></tr>
				</thead>
				<tbody>
					<?php foreach($half_marathons as $half_marathon): ?>
					<article>
					<tr><td><?=$half_marathon['race_name']?></td><td><?=$half_marathon['race_date']?></td>
						<td><?=$half_marathon['race_time_string']?></td><td><?=$half_marathon['race_pace_string']?></td></tr>
					<?php endforeach; ?>
					</article>
				</tbody>
			</table>

		</div>
	</div>

	<div id="tabs-5">
		<div id="full_marathon">
			
			<table id="table5" class="tablesorter">
				<thead>
					<tr><th>Race Name</th><th>Race Date</th><th>Race Time</th><th>Race Pace</th></tr>
				</thead>
				<tbody>
					<?php foreach($full_marathons as $full_marathon): ?>
					<article>
					<tr><td><?=$full_marathon['race_name']?></td><td><?=$full_marathon['race_date']?></td>
						<td><?=$full_marathon['race_time_string']?></td><td><?=$full_marathon['race_pace_string']?></td></tr>
					<?php endforeach; ?>
					</article>
				</tbody>
			</table>

		</div>
	</div>

	<div id="tabs-6">
		<p>Average 5 Kilometer time: <?=$race_time_5kilometers_average?></p>
		<p>Average 5 Kilometer pace: <?=$race_pace_5kilometers_average?></p>

		<p>Average 5 Mile time: <?=$race_time_5mile_average?></p>
		<p>Average 5 Mile pace: <?=$race_pace_5mile_average?></p>

		<p>Average 10 Kilometer time: <?=$race_time_10kilometers_average?></p>
		<p>Average 10 Kilometer pace: <?=$race_pace_10kilometers_average?></p>

		<p>Average Half Marathon time: <?=$race_time_halfMarathon_average?></p>
		<p>Average Half Marathon pace: <?=$race_pace_halfMarathon_average?></p>

		<p>Average Full Marathon time: <?=$race_time_fullMarathon_average?></p>
		<p>Average Full Marathon pace: <?=$race_pace_fullMarathon_average?></p>


	</div>


</div>
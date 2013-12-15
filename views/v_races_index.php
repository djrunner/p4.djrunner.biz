<h1>Here are your race stats</h1>

<div id="tabs">
	<ul>
    <li><a href="#tabs-1">5 Kilometer</a></li>
    <li><a href="#tabs-2">5 Miles</a></li>
    <li><a href="#tabs-3">10 Kilometers</a></li>
    <li><a href="#tabs-4">Half Marathon</a></li>
    <li><a href="#tabs-5">Full Marathon</a></li>
  </ul>

	<div id="tabs-1">
		<div id="5_kilometers">

			<table>
				<tr><th>Race Name</th><th>Race Date</th><th>Race Time</th><th>Race Pace</th></tr>
				<?php foreach($five_kilometers as $five_kilometer): ?>
				<article>
				<tr><td><?=$five_kilometer['race_name']?></td><td><?=$five_kilometer['race_date']?></td>
					<td><?=$five_kilometer['race_time_sting']?></td><td><?=$five_kilometer['race_pace_sting']?></td></tr>
				</article>
				<?php endforeach; ?>
			</table>
		</div>
	</div>

	<div id="tabs-2">
		<div id="5_miles">
			2<br>
			4<br>
			4<br>
			4
		</div>
	</div>

	<div id="tabs-3">
		<div id="10_kilometers">
			3
		</div>
	</div>

	<div id="tabs-4">
		<div id="half_marathon">
			4
		</div>
	</div>

	<div id="tabs-5">
		<div id="full_marathon">
			5
		</div>
	</div>

</div>
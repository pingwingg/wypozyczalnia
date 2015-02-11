<?php
require_once('funkcje_zakladki.php');
session_start();


tworz_naglowek_html('');

?>
<div class="row marketing">
	<div class="col-lg-8">
	<p>Tutaj wyswietlane bedą</p>
	
	<table class="table">
						<thead>
							<tr>
								
								<th>Film według gatunku (...)</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								
								<td>tytul1</td>
							</tr>
							<tr>
								
								<td>tytul12</td>
							</tr>
							<tr>
								
								<td>tytul13</td>
							</tr>
						</tbody>
					</table>
	
	</div>

<?php

wyswietlMenuNawigacjiGlowna();
tworz_stopke_html();


?>
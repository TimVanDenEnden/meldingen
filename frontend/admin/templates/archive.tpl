<div class="container">
	{% if hasPermission("ARCHIVE_CAN_VIEW") %}
		<div class="card">
			<div class="body table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#ID</th>
							<th>STATUS</th>
							<th>CATEGORIE</th>
							<th>LOCATIE</th>
							<th>AANGEMAAKT</th>
							<th>LAAST-AANGEPAST</th>
							{% if hasPermission("ARCHIVE_CAN_EDIT") or hasPermission("ARCHIVE_CAN_REMOVE") %}
								<th>ACTIONS</th>
							{% endif %}
						</tr>
					</thead>
					<tbody>
						{% for report in reports %}
							
							{% set category_text = "" %}
							{% for category in categories %}
								{% if category.id == report.category_id %}
									{% set category_text = category.name %}
								{% endif %}
							{% endfor %}
							
							{% set location_text = "" %}
							{% for location in locations %}
								{% if location.id == report.location_id %}
									{% set location_text = location.building %}
								{% endif %}
							{% endfor %}
							
							{% set status_text = "" %}
							{% if report.status == 0 %}
								{% set status_text = '<span class="label bg-red" style="display: block; padding: 5px;">Open</span>' %}
							{% elseif report.status == 1 %}
								{% set status_text = '<span class="label bg-amber" style="display: block; padding: 5px;">Bezig</span>' %}
							{% elseif report.status == 2 %}
								{% set status_text = '<span class="label bg-green" style="display: block; padding: 5px;">Afgehandeld</span>' %}
							{% elseif report.status == 3 %}
								{% set status_text = '<span class="label bg-blue" style="display: block; padding: 5px;">Verplaatst</span>' %}
							{% endif %}
							
							<tr>
								<th style="vertical-align: middle;" scope="row">{{ report.id }}</th>
								<td style="vertical-align: middle;">{{ status_text | raw }}</td>
								<td style="vertical-align: middle;">{{ category_text }}</td>
								<td style="vertical-align: middle;">{{ location_text }}</td>
								<td style="vertical-align: middle;">{{ report.created }}</td>
								<td style="vertical-align: middle;">{{ report.modified }}</td>
								{% if hasPermission("ARCHIVE_CAN_EDIT") or hasPermission("ARCHIVE_CAN_REMOVE") %}
									<td style="vertical-align: middle; width: 115px;">
										{% if hasPermission("ARCHIVE_CAN_EDIT") %}
											<button type="button" class="btn bg-light-green btn-circle waves-effect waves-circle waves-float m-r-10">
												<i class="material-icons">mode_edit</i>
											</button>
										{% endif %}
										{% if hasPermission("ARCHIVE_CAN_REMOVE") %}
											<button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
												<i class="material-icons">delete</i>
											</button>
										{% endif %}
									</td>
								{% endif %}
							</tr>
						{% endfor %}
						<!--
						<tr>
							<th scope="row">2</th>
							<td>Jacob</td>
							<td>Thornton</td>
							<td>@fat</td>
							<td>@lakitkat</td>
							<td>@mdo</td>
							<td style="width: 105px;">
								<button type="button" class="btn bg-light-green btn-circle waves-effect waves-circle waves-float">
									<i class="material-icons">mode_edit</i>
								</button>
								<button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
									<i class="material-icons">delete</i>
								</button>
							</td>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td>Larry</td>
							<td>the Bird</td>
							<td>@twitter</td>
							<td>@lakitkat</td>
							<td>@mdo</td>
							<td style="width: 105px;">
								<button type="button" class="btn bg-light-green btn-circle waves-effect waves-circle waves-float">
									<i class="material-icons">mode_edit</i>
								</button>
								<button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
									<i class="material-icons">delete</i>
								</button>
							</td>
						</tr>
						<tr>
							<th scope="row">4</th>
							<td>Larry</td>
							<td>Jellybean</td>
							<td>@lajelly</td>
							<td>@lakitkat</td>
							<td>@mdo</td>
							<td style="width: 105px;">
								<button type="button" class="btn bg-light-green btn-circle waves-effect waves-circle waves-float">
									<i class="material-icons">mode_edit</i>
								</button>
								<button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
									<i class="material-icons">delete</i>
								</button>
							</td>
						</tr>
						<tr>
							<th scope="row">5</th>
							<td>Larry</td>
							<td>Kikat</td>
							<td>@lakitkat</td>
							<td>@lakitkat</td>
							<td>@mdo</td>
							<td style="width: 105px;">
								<button type="button" class="btn bg-light-green btn-circle waves-effect waves-circle waves-float">
									<i class="material-icons">mode_edit</i>
								</button>
								<button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
									<i class="material-icons">delete</i>
								</button>
							</td>
						</tr>
						-->
					</tbody>
				</table>
			</div>
		</div>
	{% else %}
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1 style="color: #aaa;text-align: center;">U heeft geen rechten om het archief te bekijken!</h1>
				<i class="material-icons" style="color: #aaa;text-align: center;display: block;font-size: 80px;">account_balance</i>
			</div>
		</div>	
	{% endif %}
</div>
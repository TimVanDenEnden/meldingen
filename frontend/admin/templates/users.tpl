<div class="container">
	<div class="row">
		{% for i in 0..10 %}
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="card">
				<div class="header mldColor">
					<h2>
						Stijn
						<small>Stijn.van.nieulande@gmail.com</small>
					</h2>
				</div>
				<div class="body">
					<ul class="list-unstyled">
						<li><h4>Dashboard</h4></li>
						<li><i class="material-icons middle col-green">check</i> Kan items bewerken</li>
						<li><i class="material-icons middle col-green">check</i> Kan items verwijderen naar archief</li>
						<li><h4>Archief</h4></li>
						<li><i class="material-icons middle col-green">check</i> Kan archief bekijken</li>
						<li><i class="material-icons middle col-green">check</i> Kan archief items bewerken</li>
						<li><i class="material-icons middle col-green">check</i> Kan archief items verwijderen</li>
						<li><h4>Gebruikers</h4></li>
						<li><i class="material-icons middle col-green">check</i> Kan gebruikers bekijken</li>
						<li><i class="material-icons middle col-green">check</i> Kan gebruikers toevoegen</li>
						<li><i class="material-icons middle col-green">check</i> Kan gebruikers bewerken</li>
						<li><i class="material-icons middle col-green">check</i> Kan gebruikers verwijderen</li>
						<li><h4>Pagina Bouwer</h4></li>
						<li><i class="material-icons middle col-red">clear</i> Kan Pagina Bouwer gebruiken</li>
					</ul>
					<div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
						<a class="btn bg-blue waves-effect" data-toggle="modal" data-target="#modal-users-{{i}}">EDIT</a>
						<a href="#" class="btn bg-blue waves-effect" role="button">DELETE</a>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modal-users-{{i}}" tabindex="-1" role="dialog" style="display: none;">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="col-white mldColor modal-header" style="padding: 25px;">
						<h4 style="font-size: 18px;" class="modal-title" id="defaultModalLabel">Bewerken gebruiker: Stijn</h4>
					</div>
					<div class="modal-body">
						
						<h2>Gegevens</h2>
						
						<div class="form-group form-float">
							<div class="form-line">
								<input type="text" id="users_gegevens_gebruikersnaam" class="form-control">
								<label class="form-label">Gebruikersnaam</label>
							</div>
						</div>
						<div class="form-group form-float">
							<div class="form-line">
								<input type="password" id="users_gegevens_email" class="form-control">
								<label class="form-label">Email</label>
							</div>
						</div>
						
						<h4>Wachtwoord veranderen</h4>
						
						<div class="form-group form-float">
							<div class="form-line">
								<input type="password" id="users_gegevens_wachtwoord" class="form-control">
								<label class="form-label">Wachtwoord</label>
							</div>
						</div>
						<div class="form-group form-float">
							<div class="form-line">
								<input type="password" id="users_gegevens_wachtwoord_opnieuw" class="form-control">
								<label class="form-label">Wachtwoord Opnieuw</label>
							</div>
						</div>
						
						<h2>Rechten</h2>
						
						<h4>Dashboard</h4>
						<input type="checkbox" id="users_check_dashboard_bewerken" class="filled-in chk-col-blue" checked />
						<label for="users_check_dashboard_bewerken">Kan items bewerken</label>
						<br>
						<input type="checkbox" id="users_check_dashboard_verwijderen" class="filled-in chk-col-blue" checked />
						<label for="users_check_dashboard_verwijderen">Kan items verwijderen naar archief</label>
						
						<h4>Archief</h4>
						<input type="checkbox" id="users_check_archief_bekijken" class="filled-in chk-col-blue" checked />
						<label for="users_check_archief_bekijken">Kan archief bekijken</label>
						<br>
						<input type="checkbox" id="users_check_archief_bewerken" class="filled-in chk-col-blue" checked />
						<label for="users_check_archief_bewerken">Kan archief items bewerken</label>
						<br>
						<input type="checkbox" id="users_check_archief_verwijderen" class="filled-in chk-col-blue" checked />
						<label for="users_check_archief_verwijderen">Kan archief items verwijderen</label>
						
						<h4>Gebruikers</h4>
						<input type="checkbox" id="users_check_gebruikers_bekijken" class="filled-in chk-col-blue" checked />
						<label for="users_check_gebruikers_bekijken">Kan gebruikers bekijken</label>
						<br>
						<input type="checkbox" id="users_check_gebruikers_toevoegen" class="filled-in chk-col-blue" checked />
						<label for="users_check_gebruikers_toevoegen">Kan gebruikers toevoegen</label>
						<br>
						<input type="checkbox" id="users_check_gebruikers_bewerken" class="filled-in chk-col-blue" checked />
						<label for="users_check_gebruikers_bewerken">Kan gebruikers bewerken</label>
						<br>
						<input type="checkbox" id="users_check_gebruikers_verwijderen" class="filled-in chk-col-blue" checked />
						<label for="users_check_gebruikers_verwijderen">Kan gebruikers verwijderen</label>
						
						<h4>Pagina Bouwer</h4>
						<input type="checkbox" id="users_check_paginabouwer_kangebruiken" class="filled-in chk-col-blue" />
						<label for="users_check_paginabouwer_kangebruiken">Kan Pagina Bouwer gebruiken</label>
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
						<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
					</div>
				</div>
			</div>
		</div>
		{% endfor %}
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<button type="submit" name="postreport" class="btn btnSubmit btn-block btn-lg btn-default waves-effect fontsize18">Voeg gebruiker toe</button>
		</div>
	</div>
</div>
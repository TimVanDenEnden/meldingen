<div class="container">
	{% if hasPermission("USERS_CAN_VIEW") %}
		<div class="row">
			{% for id,user in users %}		
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="card">
						<div class="header mldColor">
							<h2>
								{{ user.user_name }}
								<small>{{ user.user_email }}</small>
							</h2>
							<ul class="header-dropdown m-r--5">
								{% if user.user_isadmin %}
									<h4><span class="label bg-green">Admin</span></h4>
								{% else %}
									<h4><span class="label bg-blue-grey">Gebruiker</span></h4>
								{% endif %}
							</ul>
						</div>
						<div class="body">
							<ul class="list-unstyled">
								<li><h4>Dashboard</h4></li>
								<li>
									{% if user.permissions.DASHBOARD_CAN_EDIT or user.user_isadmin %}
										<i class="material-icons middle col-green">check</i>
									{% else %}
										<i class="material-icons middle col-red">clear</i>
									{% endif %}
									Kan items bewerken
								</li>
								<li>
									{% if user.permissions.DASHBOARD_CAN_REMOVE or user.user_isadmin %}
										<i class="material-icons middle col-green">check</i>
									{% else %}
										<i class="material-icons middle col-red">clear</i>
									{% endif %}
									Kan items verwijderen naar archief
								</li>
								<li><h4>Archief</h4></li>
								<li>
									{% if user.permissions.ARCHIVE_CAN_VIEW or user.user_isadmin %}
										<i class="material-icons middle col-green">check</i>
									{% else %}
										<i class="material-icons middle col-red">clear</i>
									{% endif %}
									Kan archief bekijken
								</li>
								<li>
									{% if user.permissions.ARCHIVE_CAN_EDIT or user.user_isadmin %}
										<i class="material-icons middle col-green">check</i>
									{% else %}
										<i class="material-icons middle col-red">clear</i>
									{% endif %}
									Kan archief items bewerken
								</li>
								<li>
									{% if user.permissions.ARCHIVE_CAN_REMOVE or user.user_isadmin %}
										<i class="material-icons middle col-green">check</i>
									{% else %}
										<i class="material-icons middle col-red">clear</i>
									{% endif %}
									Kan archief items verwijderen
								</li>
								<li><h4>Gebruikers</h4></li>
								<li>
									{% if user.permissions.USERS_CAN_VIEW or user.user_isadmin %}
										<i class="material-icons middle col-green">check</i>
									{% else %}
										<i class="material-icons middle col-red">clear</i>
									{% endif %}
									Kan gebruikers bekijken
								</li>
								<li>
									{% if user.permissions.USERS_CAN_ADD or user.user_isadmin %}
										<i class="material-icons middle col-green">check</i>
									{% else %}
										<i class="material-icons middle col-red">clear</i>
									{% endif %}
									Kan gebruikers toevoegen
								</li>
								<li>
									{% if user.permissions.USERS_CAN_EDIT or user.user_isadmin %}
										<i class="material-icons middle col-green">check</i>
									{% else %}
										<i class="material-icons middle col-red">clear</i>
									{% endif %}
									Kan gebruikers bewerken
								</li>
								<li>
									{% if user.permissions.USERS_CAN_REMOVE or user.user_isadmin %}
										<i class="material-icons middle col-green">check</i>
									{% else %}
										<i class="material-icons middle col-red">clear</i>
									{% endif %}
									Kan gebruikers verwijderen
								</li>
								<li><h4>Pagina Bouwer</h4></li>
								<li>
									{% if user.permissions.PAGEBUILDER_USE or user.user_isadmin %}
										<i class="material-icons middle col-green">check</i>
									{% else %}
										<i class="material-icons middle col-red">clear</i>
									{% endif %}
									Kan Pagina Bouwer gebruiken
								</li>
							</ul>
							{% if user.user_isadmin %}
								<div style="height: 30px;"></div>
							{% else %}
								<div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
									{% if hasPermission("USERS_CAN_EDIT") %}
										<a class="btn bg-blue waves-effect" data-toggle="modal" data-target="#modal-users-{{ id }}">BEWERKEN</a>
									{% endif %}
									{% if hasPermission("USERS_CAN_REMOVE") %}
										<a href="#" class="btn bg-blue waves-effect" role="button">VERWIJDEREN</a>
									{% endif %}
								</div>
							{% endif %}
						</div>
					</div>
				</div>
				{% if (hasPermission("USERS_CAN_EDIT")) and (not user.user_isadmin) %}
					<div class="modal fade" id="modal-users-{{ id }}" tabindex="-1" role="dialog" style="display: none;">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<form class="form_updateuser" action="" method="">
									<div class="col-white mldColor modal-header" style="padding: 25px;">
										<h4 style="font-size: 18px;" class="modal-title" id="defaultModalLabel">Bewerken gebruiker: {{ user.user_name }}</h4>
									</div>
									<div class="modal-body">
										
										<h2>Gegevens</h2>
										
										<div class="form-group form-float">
											<div class="form-line">
												<input type="text" id="users_gegevens_gebruikersnaam" class="form-control" value="{{ user.user_name }}">
												<label class="form-label">Gebruikersnaam</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line">
												<input type="email" id="users_gegevens_email" class="form-control" value="{{ user.user_email }}">
												<label class="form-label">Email</label>
											</div>
										</div>
										
										<h4>Wachtwoord veranderen</h4>
										
										<div class="form-group form-float">
											<div class="form-line">
												<input type="password" id="users_gegevens_wachtwoord" class="form-control">
												<label class="form-label">Wachtwoord Nieuw</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line">
												<input type="password" id="users_gegevens_wachtwoord_opnieuw" class="form-control">
												<label class="form-label">Wachtwoord Nieuw Herhaling</label>
											</div>
										</div>
										
										<h2>Rechten</h2>
										
										<h4>Dashboard</h4>
										<input type="checkbox" id="users_check_DASHBOARD_CAN_EDIT" name="users_check_DASHBOARD_CAN_EDIT" class="filled-in chk-col-blue" {% if user.permissions.DASHBOARD_CAN_EDIT %}checked{% endif %} />
										<label for="users_check_DASHBOARD_CAN_EDIT" name="users_check_DASHBOARD_CAN_EDIT">Kan items bewerken</label>
										<br>
										<input type="checkbox" id="users_check_DASHBOARD_CAN_REMOVE" name="users_check_DASHBOARD_CAN_REMOVE" class="filled-in chk-col-blue" {% if user.permissions.DASHBOARD_CAN_REMOVE %}checked{% endif %} />
										<label for="users_check_DASHBOARD_CAN_REMOVE" name="users_check_DASHBOARD_CAN_REMOVE">Kan items verwijderen naar archief</label>
										
										<h4>Archief</h4>
										<input type="checkbox" id="users_check_ARCHIVE_CAN_VIEW" name="users_check_ARCHIVE_CAN_VIEW" class="filled-in chk-col-blue" {% if user.permissions.ARCHIVE_CAN_VIEW %}checked{% endif %} />
										<label for="users_check_ARCHIVE_CAN_VIEW" name="users_check_ARCHIVE_CAN_VIEW">Kan archief bekijken</label>
										<br>
										<input type="checkbox" id="users_check_ARCHIVE_CAN_EDIT" name="users_check_ARCHIVE_CAN_EDIT" class="filled-in chk-col-blue" {% if user.permissions.ARCHIVE_CAN_EDIT %}checked{% endif %} />
										<label for="users_check_ARCHIVE_CAN_EDIT" name="users_check_ARCHIVE_CAN_EDIT">Kan archief items bewerken</label>
										<br>
										<input type="checkbox" id="users_check_ARCHIVE_CAN_REMOVE" name="users_check_ARCHIVE_CAN_REMOVE" class="filled-in chk-col-blue" {% if user.permissions.ARCHIVE_CAN_REMOVE %}checked{% endif %} />
										<label for="users_check_ARCHIVE_CAN_REMOVE" name="users_check_ARCHIVE_CAN_REMOVE">Kan archief items verwijderen</label>
										
										<h4>Gebruikers</h4>
										<input type="checkbox" id="users_check_USERS_CAN_VIEW" name="users_check_USERS_CAN_VIEW" class="filled-in chk-col-blue" {% if user.permissions.USERS_CAN_VIEW %}checked{% endif %} />
										<label for="users_check_USERS_CAN_VIEW" name="users_check_USERS_CAN_VIEW">Kan gebruikers bekijken</label>
										<br>
										<input type="checkbox" id="users_check_USERS_CAN_ADD" name="users_check_USERS_CAN_ADD" class="filled-in chk-col-blue" {% if user.permissions.USERS_CAN_ADD %}checked{% endif %} />
										<label for="users_check_USERS_CAN_ADD" name="users_check_USERS_CAN_ADD">Kan gebruikers toevoegen</label>
										<br>
										<input type="checkbox" id="users_check_USERS_CAN_EDIT" name="users_check_USERS_CAN_EDIT" class="filled-in chk-col-blue" {% if user.permissions.USERS_CAN_EDIT %}checked{% endif %} />
										<label for="users_check_USERS_CAN_EDIT" name="users_check_USERS_CAN_EDIT">Kan gebruikers bewerken</label>
										<br>
										<input type="checkbox" id="users_check_USERS_CAN_REMOVE" name="users_check_USERS_CAN_REMOVE" class="filled-in chk-col-blue" {% if user.permissions.USERS_CAN_REMOVE %}checked{% endif %} />
										<label for="users_check_USERS_CAN_REMOVE" name="users_check_USERS_CAN_REMOVE">Kan gebruikers verwijderen</label>
										
										<h4>Pagina Bouwer</h4>
										<input type="checkbox" id="users_check_PAGEBUILDER_USE" name="users_check_PAGEBUILDER_USE" class="filled-in chk-col-blue" {% if user.permissions.PAGEBUILDER_USE %}checked{% endif %}/>
										<label for="users_check_PAGEBUILDER_USE" name="users_check_PAGEBUILDER_USE">Kan Pagina Bouwer gebruiken</label>
										
									</div>
									<div class="modal-footer">
										<button type="submit" id="updateuser" name="updateuser" class="btn btn-link waves-effect">WIJZIGEN OPSLAAN</button>
										<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">SLUITEN</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				{% endif %}
			{% endfor %}
			
			{% if hasPermission("USERS_CAN_ADD") %}
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<button type="submit" name="postreport" class="btn btnSubmit btn-block btn-lg btn-default waves-effect fontsize18">Voeg gebruiker toe</button>
				</div>
			{% endif %}
		</div>
	{% else %}
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1 style="color: #aaa;text-align: center;">U heeft geen rechten om de gebruikers te bekijken!</h1>
				<i class="material-icons" style="color: #aaa;text-align: center;display: block;font-size: 80px;">people</i>
			</div>
		</div>	
	{% endif %}
</div>

<script>
	$(document).ready(function() {
        $("form.form_updateuser").submit(function(){
            event.preventDefault();
            
			console.log("abc");
			console.log($(this));
			console.log("def");
			
            $.ajax({
                type: 'POST',
                url: '{{ API_URL }}admin/updateuser',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(data) {
					{% if DEBUG %}
						console.log("Succes:");
						console.log(data);
					{% endif %}
					
                    swal(
                        'Succesvol opgeslagen!',
                        'De gebruiker is succesvol opgeslagen!',
                        'success'
                    )

                },
                error: function(data) {
					{% if DEBUG %}
						console.log("Error:");
						console.log(data);
					{% endif %}
					
                    swal(
                        'Opslaan mislukt!',
                        'Er is iets mis gegaan met het opslaan van deze gebruiker, probeer het later opnieuw.',
                        'error'
                    )
                    
                }
            });
        })
	});
</script>
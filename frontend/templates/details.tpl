<div class="container p-sm-0">
	<div class="headerImage"></div>
	<div class="block-header">
		<div class="card">
			<div class="header headerTitle">
				Wat wilt u melden?
			</div>
		</div>
	</div>
</div>
<div class="container">
    <div class="row clearfix">
   		<form id="reportMelding" action="" method="">
			{% for block in pageblocks %}
				{% if block.blockname == "DESCRIPTION" %}
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                    <div class="card">
		                        <div class="header mldColor">
		                            <h2>{{ block.title }}</h2>
		                        </div>
		                        <div class="body">
		                            <div class="row clearfix">
		                                <div class="col-sm-12 margin0">
		                                    <div class="form-group margin0">
		                                        <div class="form-line">
		                                            <textarea rows="4" class="form-control no-resize" name="description" placeholder=""></textarea>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		        {% elseif block.blockname == "MOREINFO" %}
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                    <div class="card">
		                        <div class="header mldColor">
		                            <h2>{{ block.title }}</h2>
		                        </div>
		                        <div class="body">
		                            <div class="row clearfix">
		                                <div class="col-sm-12 margin0">
		                                    <div class="form-group margin0">
		                                        <div class="form-line">
		                                            <textarea rows="4" class="form-control no-resize" name="moreinfo" placeholder=""></textarea>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		        {% elseif block.blockname == "WEAPONLOCATION" %}
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                    <div class="card">
		                        <div class="header mldColor">
		                            <h2>{{ block.title }}</h2>
		                        </div>
		                        <div class="body">
		                            <div class="row clearfix">
		                                <div class="col-sm-12 margin0">
		                                    <div class="form-group margin0">
		                                        <div class="form-line">
		                                            <textarea rows="4" class="form-control no-resize" name="weaponlocation" placeholder=""></textarea>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		        {% elseif block.blockname == "STOLENOBJECT" %}
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                    <div class="card">
		                        <div class="header mldColor">
		                            <h2>{{ block.title }}</h2>
		                        </div>
		                        <div class="body">
		                            <div class="row clearfix">
		                                <div class="col-sm-12 margin0">
		                                    <div class="form-group margin0">
		                                        <div class="form-line">
		                                            <textarea rows="4" class="form-control no-resize" name="stolenobject" placeholder=""></textarea>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		        {% elseif block.blockname == "VICTIM" %}
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                    <div class="card">
		                        <div class="header mldColor">
		                            <h2>{{ block.title }}</h2>
		                        </div>
		                        <div class="body">
		                            <div class="row clearfix">
		                                <div class="col-sm-12 margin0">
		                                    <div class="form-group margin0">
		                                        <div class="form-line">
		                                            <textarea rows="4" class="form-control no-resize" name="victim" placeholder=""></textarea>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
				{% elseif block.blockname == "UNCONSCIOUS" %}	<!-- DEZE LATER EVEN NAAR KIJKEN! -->
	                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                    <div class="card">
	                        <div class="header mldColor">
								<h2>{{ block.title }}</h2>
	                        </div>
	                        <div class="body">
	                            <div class="row clearfix">
	                                <div class="col-sm-12 margin0">
	                                    <div class="btn-group btn-toggle btn-group-justified" id="toggle_event_editing">
	                                        <button type="button" class="btn btn-info waves-effect locked_active">Ja</button>
	                                        <button type="button" class="btn btn-default waves-effect unlocked_inactive">Nee</button>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            {% elseif block.blockname == "ISWEAPONPRESENT" %}	<!-- DEZE LATER EVEN NAAR KIJKEN! -->
	                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                    <div class="card">
	                        <div class="header mldColor">
								<h2>{{ block.title }}</h2>
	                        </div>
	                        <div class="body">
	                            <div class="row clearfix">
	                                <div class="col-sm-12 margin0">
	                                    <div class="btn-group btn-toggle btn-group-justified" id="toggle_event_editing">
	                                        <button type="button" class="btn btn-info waves-effect locked_active">Ja</button>
	                                        <button type="button" class="btn btn-default waves-effect unlocked_inactive">Nee</button>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
				{% elseif block.blockname == "CONTACT" %}
					{% if block.required == 1 %}
					<!-- Example Tab -->
	                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                    <div class="card">
	                        <div class="header mldColor">
								<h2>{{ block.title }}</h2>
	                        </div>

		                        <div class="body padding0">
		                            <!-- Nav tabs -->

		                            <!-- Tab panes -->
		                                <div role="tabpanel" class="tab-pane fade in active" id="ja">
						       				<div class="body">
					                                <label for="email_address">Wat is u naam?</label>
					                                <div class="form-group">
					                                    <div class="form-line">
					                                        <input type="text" id="email_address" name="contact_name" class="form-control" placeholder="">
					                                    </div>
					                                </div>
					                                <label for="password">Wat is uw telefoonnummer?</label>
					                                <div class="form-group">
					                                    <div class="form-line">
					                                        <input type="text" id="password" name="contact_number" class="form-control" placeholder="">
					                                    </div>
					                                </div>
					                                <label for="password">Wat is uw e-mailadres?</label>
					                                <div class="form-group">
					                                    <div class="form-line">
					                                        <input type="text" id="password" name="contact_email" class="form-control" placeholder="">
					                                    </div>
					                                </div>
					                        </div>
		                                <div role="tabpanel" class="tab-pane fade" id="nee"></div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            <!-- #END# Example Tab -->
					{% else %}
		 			<!-- Example Tab -->
	                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                    <div class="card">
	                        <div class="header mldColor">
								<h2>{{ block.title }}</h2>
	                        </div>

		                        <div class="body padding0">
		                            <!-- Nav tabs -->
		                            <ul class="nav nav-tabs tab-nav-right nav-justified" role="tablist">
		                                <li role="presentation" class="active"><a href="#ja" data-toggle="tab">Ja</a></li>
		                                <li role="presentation"><a href="#nee" data-toggle="tab">Nee</a></li>
		                            </ul>

		                            <!-- Tab panes -->
		                            <div class="tab-content">
		                                <div role="tabpanel" class="tab-pane fade in active" id="ja">
		       
						       				<div class="body padding0">
					                                <label for="email_address">Wat is u naam?</label>
					                                <div class="form-group">
					                                    <div class="form-line">
					                                        <input type="text" id="email_address" name="contact_name" class="form-control" placeholder="">
					                                    </div>
					                                </div>
					                                <label for="password">Wat is uw telefoonnummer?</label>
					                                <div class="form-group">
					                                    <div class="form-line">
					                                        <input type="text" id="password" name="contact_number" class="form-control" placeholder="">
					                                    </div>
					                                </div>
					                                <label for="password">Wat is uw e-mailadres?</label>
					                                <div class="form-group">
					                                    <div class="form-line">
					                                        <input type="text" id="password" name="contact_email" class="form-control" placeholder="">
					                                    </div>
					                                </div>
					                        </div>
						                </div>
		                                <div role="tabpanel" class="tab-pane fade" id="nee"></div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            <!-- #END# Example Tab -->
		            {% endif %}
		        {% elseif block.blockname == "IMAGES" %} <!-- Hoe gaan we deze oplossen nog!  -->
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                    <div class="card">
	                        <div class="header mldColor">
								<h2>{{ block.title }}</h2>
	                        </div>
	                        <div class="body">
	                            <div class="row clearfix">
	                                <div class="col-sm-12 margin0">
	                                    <div class="form-group margin0">
		                                    <div class="table-responsive">
		                                        <table class="table ">
		                                            <td style="vertical-align: middle;">Test.png</td>
		                                            <td style="width: 50px;">
		                                                <button type="button" class="btn bg-light-green btn-circle waves-effect waves-circle waves-float">
		                                                    <i class="material-icons">mode_edit</i>
		                                                </button>
		                                            </td>
		                                            <td style="width: 50px;">
		                                                <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
		                                                    <i class="material-icons">delete</i>
		                                                </button>
		                                            </td>
		                                        </table>
		                                    </div>
	                                        <button type="button" class="btn btnSubmit btn-block btn-lg btn-default waves-effect">Voeg afbeelding toe</button>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            {% elseif block.blockname == "VEHICLE" %} <!-- Hoe gaan we deze oplossen nog!  -->
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                    <div class="card">
	                        <div class="header mldColor">
								<h2>{{ block.title }}</h2>
	                        </div>
	                        <div class="body">
	                            <div class="row clearfix">
	                                <div class="col-sm-12 margin0">
	                                    <div class="form-group margin0">
		                                    <div class="table-responsive">
		                                        <table class="table ">
		                                        	<tr>
			                                            <td style="vertical-align: middle;">tesla</td>
			                                            <td style="width: 50px;">
			                                                <button type="button" class="btn bg-light-green btn-circle waves-effect waves-circle waves-float">
			                                                    <i class="material-icons">mode_edit</i>
			                                                </button>
			                                            </td>
			                                            <td style="width: 50px;">
			                                                <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
			                                                    <i class="material-icons">delete</i>
			                                                </button>
			                                            </td>
		                                            </tr>
		                                        	<tr>
			                                            <td style="vertical-align: middle;">fiets</td>
			                                            <td style="width: 50px;">
			                                                <button type="button" class="btn bg-light-green btn-circle waves-effect waves-circle waves-float">
			                                                    <i class="material-icons">mode_edit</i>
			                                                </button>
			                                            </td>
			                                            <td style="width: 50px;">
			                                                <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
			                                                    <i class="material-icons">delete</i>
			                                                </button>
			                                            </td>
		                                            </tr>
		                                        </table>
		                                    </div>
	                                        <button type="button" class="btn btnSubmit btn-block btn-lg btn-default waves-effect">Voeg voertuig toe</button>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
		   		{% elseif block.blockname == "WEAPONTYPE_ID" %}
			               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			                   <div class="card">
			                       <div class="header mldColor">
										<h2>{{ block.title }}</h2>
			                       </div>
			                       <div class="body">
			                           <div class="row clearfix">
			                               <div class="col-sm-12 margin0">
			                                   <select id="weaponSelector" name="weapontype_id" class="form-control show-tick">
			                                   		{% for weapon in weapons %}
			                                       		<option value="{{ weapon.id }}">{{ weapon.name }}</option>
			                                       	{% endfor %}
			                                   </select>
			                                   <div id="otherwaepon" style=" display: none;">
													<br>
													<div class='form-group margin0'>
														<div class='form-line'>
															<input type='text' name='weapontypeother' id='email_address' name='contact_name' class='form-control'>
														</div>
													</div>
			                                   </div>
			                               </div>
			                           </div>
			                       </div>
			                   </div>
			               </div>
			      <script>
					$('#weaponSelector').on('change', function() {        
						var option = $(this).find('option:selected').text();
						  if (option == "Anders") {
						      $( "#otherwaepon" ).show();
						  } else {
						      $( "#otherwaepon" ).hide();
						  }
					})
				</script>
			   	{% elseif block.blockname == "DRUGSACTION_ID" %} <!-- Deze nog even testen !!!!!! -->
			               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			                   <div class="card">
			                       <div class="header mldColor">
										<h2>{{ block.title }}</h2>
			                       </div>
			                       <div class="body">
			                           <div class="row clearfix">
			                               <div class="col-sm-12 margin0">
			                                   <select name="drugsaction_id" class="form-control show-tick">
			                                   		{% for drugs_action in drugs_actions %}
			                                       		<option value="{{ drugs_action.id }}">{{ drugs_action.name }}</option>
			                                       	{% endfor %}

			                                   </select>
			                               </div>
			                           </div>
			                       </div>
			                   </div>
			               </div>
				{% elseif block.blockname == "PERSON" %}
				    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                    <div class="card">
	                        <div class="header mldColor">
								<h2>{{ block.title }}</h2>
	                        </div>
	                        <div class="body">
	                            <div class="row clearfix">
	                                <div class="col-sm-12 margin0">
	                                    <div class="form-group margin0">
	                                        <div class="table-responsive">
	                                            <table class="table ">
	                                                <td style="vertical-align: middle;">Stijn</td>
	                                                <td style="width: 50px;">
	                                                    <button type="button" class="btn bg-light-green btn-circle waves-effect waves-circle waves-float">
	                                                        <i class="material-icons">mode_edit</i>
	                                                    </button>
	                                                </td>
	                                                <td style="width: 50px;">
	                                                    <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
	                                                        <i class="material-icons">delete</i>
	                                                    </button>
	                                                </td>
	                                            </table>
	                                        </div>
	                                        <button type="button" class="btn btnSubmit btn-block btn-lg btn-default waves-effect">Voeg persoon toe</button>
	  
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
				{% elseif block.blockname == "DATEOFTHEFT" %}
	                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                    <div class="card">
	                        <div class="header mldColor">
	                            <h2>
	                                DATETIME PICKER
	                            </h2>
	                        </div>
	                        <div class="body">
	                            <div class="row clearfix">
	                                <div class="col-sm-12 margin0">
	                                    <div class="form-group margin0">
	                                        <div class="form-line">
	                                            <input type="text" name="dateoftheft" class="datetimepicker form-control" placeholder="Please choose date & time...">
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
		   		{% elseif block.blockname == "FIGHTERCOUNT" %}
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                    <div class="card">
	                        <div class="header mldColor">
	                            <h2>{{ block.title }}</h2>
	                        </div>
	                        <div class="body">
	                            <div class="row clearfix">
	                                <div class="col-sm-12 margin0">
	                                    <div class="form-group margin0">
	                                        <div class="form-line">
	                                            <input type="number" name="fightercount" class="form-control no-resize" value="2" placeholder="">
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
				{% endif %}
			{% endfor %}
			
			<input type="hidden" name="report_id" value="{{ report_id }}">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<button type="submit" name='postreport' class="btn btnSubmit btn-block btn-lg btn-default waves-effect fontsize18">Melding versturen</button>
			</div>
		</form>
    </div>
</div>

<script>
	$(document).ready(function() {   
        $("form#reportMelding").submit(function(){
            event.preventDefault();
            
            $.ajax({
                type: 'POST',
                url: '{{ API_URL }}report/',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(data) {
                	console.log("Succes:");
					console.log(data);
                    swal(
                        'Succesvol verzonden!',
                        'uw melding is verzonden!',
                        'success'
                    )

                },
                error: function(data) {
                	console.log("Error:");
                	console.log(data);
                    swal(
                        'Verzenden mislukt!',
                        'Er is iets mis gegaan met het verzenden van uw melding, probeer het later opnieuw.',
                        'error'
                    )
                    
                }
            });
        });
		
		var auto_refresh = setInterval(
			function () {			
				updateForm();
			}, 5000
		);
		$.ajaxSetup({ cache: true });
		
		var updateForm = function() {
			$.ajax({
                type: 'POST',
                url: '{{ API_URL }}report/',
                data: $("form#reportMelding").serialize(),
                dataType: 'json',
                success: function(data) {
                	console.log("Succes:");
					console.log(data);

                },
                error: function(data) {
                	console.log("Error:");
                	console.log(data);
                }
            });
		};
    });
</script>
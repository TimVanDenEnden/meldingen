{% set category_name = '' %}
{% for category in categories %}
	{% if category.id == category_id  %}
		{% set category_name = category.name ~ ' - ' %}
	{% endif %}
{% endfor %}

<div class="container p-sm-0">
	<div class="headerImage"></div>
	<div class="block-header">
		<div class="card">
			<div class="header headerTitle">
				{{ category_name }}Waar is het gebeurd?
			</div>
		</div>
	</div>
</div>
<div class="container">
    <div class="row clearfix">
		{% for category in location_categories %}
			<div class="col-xs-12">
				<h3>{{ category.name }}</h3>
			</div>
			
			{% for location in locations %}
				{% if category.id == location.category_id %}
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-centered">
						<a href="{{ PageURL }}report/{{ category_id }}/{{ location.id }}">
							<div class="card waves-effect waves-block">
								<div class="header flex">
									<div class="imgDiv">
										<img class="cardImage" src="{{ API_URL }}image/{{ location.image_id }}" alt="{{ location.building }}">
									</div>
									<div class="borderDiv">
										<h2 class="h2Card">
											{{ location.building }}
										</h2>   
									</div>
								</div>
							</div>
						</a>
					</div>
				{% endif %}
			{% endfor %}
		{% endfor %}
    </div>
</div>
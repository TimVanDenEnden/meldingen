{{ dump(pageblocks) }}

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
		{% for category in categories %}
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-centered">
				<a href="{{ PageURL }}{{ category.id }}">
					<div class="card waves-effect waves-block">
						<div class="header flex">
							<div class="imgDiv">
								<img class="cardImage" src="{{ API_URL }}image/{{ category.image_id }}" alt="ongeval">
							</div>
							<div class="borderDiv">
								<h2 class="h2Card">
									{{ category.name }}
								</h2>   
							</div>
						</div>
					</div>
				</a>
			</div>
		{% endfor %}
    </div>
</div>
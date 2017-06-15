<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="block-header">
				<h2>Laatste Meldingen</h2>
			</div>
		</div>
			
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" id="outputRecentReports">
			<div class="preloader">
				<div class="spinner-layer pl-light-blue">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>
			</div>
			<!--
			{% for report in RecentReports %}
				<div class="card bg-container" style="background-image: url(http://meldingen.dev/api/content/images/system/2017/04/30/2017043011080000000058ec9cf0cc0d7.jpg);">
					<h3 class="status"><span class="label animation-status">#12345</span></h3>
					<div class="body">
						<div class="row">
							<div class="col-xs-12 vertical-align-md" style="margin-bottom: 0px;">
								<div class="col-lg-3 col-md-3 col-sm-12 col-white col-xs-12 text-center-sm" style="margin-bottom: 0px;">
									<h3 class="text-shadow-large">{{i}} minuut geleden</h3>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-white col-xs-12 text-center" style="margin-bottom: 0px;">
									<h1 class="text-shadow-large">Locatie Openbare plaats</h1>
									<h4 class="text-shadow-large">Ongeveal Type</h4>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right text-center-sm" style="margin-bottom: 0px;">
									<button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">
										<i class="material-icons">mode_edit</i>
									</button>
									<button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float m-l-10">
										<i class="material-icons">delete</i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			{% endfor %}
			{% for i in 0..3 %}
			<div class="card bg-container" style="background-image: url(http://meldingen.dev/api/content/images/system/2017/04/30/2017043011080000000058ec9cf0cc0d7.jpg);">
				<h3 class="status"><span class="label bg-amber">#12345</span></h3>
				<div class="body">
					<div class="row">
						<div class="col-xs-12 vertical-align-md" style="margin-bottom: 0px;">
							<div class="col-lg-3 col-md-3 col-sm-12 col-white col-xs-12 text-center-sm" style="margin-bottom: 0px;">
								<h3 class="text-shadow-large">{{i}} minuut geleden</h3>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-white col-xs-12 text-center" style="margin-bottom: 0px;">
								<h1 class="text-shadow-large">Locatie Openbare plaats</h1>
								<h4 class="text-shadow-large">Ongeveal Type</h4>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right text-center-sm" style="margin-bottom: 0px;">
								<button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">
									<i class="material-icons">mode_edit</i>
								</button>
								<button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float m-l-10">
									<i class="material-icons">delete</i>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{% endfor %}
			{% for i in 0..3 %}
			<div class="card bg-container" style="background-image: url(http://meldingen.dev/api/content/images/system/2017/04/30/2017043011080000000058ec9cf0cc0d7.jpg);">
				<h3 class="status"><span class="label bg-green">#12345</span></h3>
				<div class="body">
					<div class="row">
						<div class="col-xs-12 vertical-align-md" style="margin-bottom: 0px;">
							<div class="col-lg-3 col-md-3 col-sm-12 col-white col-xs-12 text-center-sm" style="margin-bottom: 0px;">
								<h3 class="text-shadow-large">{{i}} minuut geleden</h3>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-white col-xs-12 text-center" style="margin-bottom: 0px;">
								<h1 class="text-shadow-large">Locatie Openbare plaats</h1>
								<h4 class="text-shadow-large">Ongeveal Type</h4>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right text-center-sm" style="margin-bottom: 0px;">
								<button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">
									<i class="material-icons">mode_edit</i>
								</button>
								<button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float m-l-10">
									<i class="material-icons">delete</i>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{% endfor %}
			-->
		</div>
	</div>
</div>

<script>
//outputRecentReports
/*
<div class="card bg-container" style="background-image: url(http://meldingen.dev/api/content/images/system/2017/04/30/2017043011080000000058ec9cf0cc0d7.jpg);">
					<h3 class="status"><span class="label animation-status">#12345</span></h3>
					<div class="body">
						<div class="row">
							<div class="col-xs-12 vertical-align-md" style="margin-bottom: 0px;">
								<div class="col-lg-3 col-md-3 col-sm-12 col-white col-xs-12 text-center-sm" style="margin-bottom: 0px;">
									<h3 class="text-shadow-large">{{i}} minuut geleden</h3>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-white col-xs-12 text-center" style="margin-bottom: 0px;">
									<h1 class="text-shadow-large">Locatie Openbare plaats</h1>
									<h4 class="text-shadow-large">Ongeveal Type</h4>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right text-center-sm" style="margin-bottom: 0px;">
									<button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">
										<i class="material-icons">mode_edit</i>
									</button>
									<button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float m-l-10">
										<i class="material-icons">delete</i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
*/
</script>
<script type="text/javascript">
var RecentReports = function (api_url) {
	var recentreports = this;

	this.date = new Date;
	this.cache = {
		locations: [],
		categories: [],
		images: new Array(),
		
		locationsLoaded: false,
		categoriesLoaded: false,
		load: function () {
			$.getJSON(api_url+"report/locations", function(data) {
				$.each(data, function(key, val) {
					recentreports.cache.locations[val.id] = [];
					recentreports.cache.locations[val.id].building 	= val.building;
					recentreports.cache.locations[val.id].image_id 	= val.image_id;
				});
				recentreports.cache.locationsLoaded = true;
				recentreports.cache.loadingDone();
			});
			$.getJSON(api_url+"report/categories", function(data) {
				$.each(data, function(key, val) {
					recentreports.cache.categories[val.id] = [];
					recentreports.cache.categories[val.id].name		= val.name;
					recentreports.cache.categories[val.id].image_id	= val.image_id;
				});
				recentreports.cache.categoriesLoaded = true;
				recentreports.cache.loadingDone();
			});
		},
		loadingDone: function () {
			if (recentreports.cache.locationsLoaded && recentreports.cache.categoriesLoaded) {
				recentreports.run();
			}
		}
	};
	
	this.timeSince = function(date) {
		var seconds = Math.floor((new Date() - date) / 1000);
		var interval = Math.floor(seconds / 31536000);

		if (interval > 0) {
			return interval + " jaar";
		}
		interval = Math.floor(seconds / 2592000);
		if (interval > 1) {
			return interval + " maanden";
		} else if (interval == 1) {
			return interval + " maand";
		}
		interval = Math.floor(seconds / 86400);
		if (interval > 1) {
			return interval + " dagen";
		} else if (interval == 1) {
			return interval + " dag";
		}
		interval = Math.floor(seconds / 3600);
		if (interval > 0) {
			return interval + " uur";
		}
		interval = Math.floor(seconds / 60);
		if (interval > 1) {
			return interval + " minuten";
		} else if (interval == 1) {
			return interval + " minuut";
		}
		if (Math.floor(seconds) == 1) {
			return Math.floor(seconds) + " seconde";
		} else {
			return Math.floor(seconds) + " secondes";
		}
	}
	
	this.convertFileToDataURLviaFileReader = function(url, callback) {
		var xhr = new XMLHttpRequest();
		xhr.onload = function() {
			var reader = new FileReader();
			reader.onloadend = function() {
				callback(reader.result);
			}
			reader.readAsDataURL(xhr.response);
		};
		xhr.open('GET', url);
		xhr.responseType = 'blob';
		xhr.send();
	}
	
	this.update = function () {
		$.getJSON(api_url+"admin/recentReports", function(data) {
			recentreports.date = new Date;
			var items = [];
			
			$.each(data, function(key, val) {
				$.each(val, function(key2, val2) {
					var statusTagColor = "";
					if (key == "0") {
						statusTagColor = "animation-status";
					} else if (key == "1") {
						statusTagColor = "bg-amber";
					} else if (key == "2") {
						statusTagColor = "bg-green";
					}
					
					var location_bg_image = "";
					var location_title = "Locatie nog niet bekend";
					var category_title = "";
					
					if (val2.location_id != null) {
						//location_bg_image = api_url+"image/"+recentreports.cache.locations[val2.location_id].image_id;
						location_title = recentreports.cache.locations[val2.location_id].building;
						
						if (recentreports.cache.images[recentreports.cache.locations[val2.location_id].image_id] == undefined) {
							recentreports.convertFileToDataURLviaFileReader(api_url+"image/"+recentreports.cache.locations[val2.location_id].image_id, function(base64Img) {
								//location_bg_image = base64Img;
								recentreports.cache.images[recentreports.cache.locations[val2.location_id].image_id] = base64Img;
							});
							location_bg_image = api_url+"image/"+recentreports.cache.locations[val2.location_id].image_id;
						} else {
							location_bg_image = recentreports.cache.images[recentreports.cache.locations[val2.location_id].image_id];
						}
					}
					if (val2.category_id != null) {
						category_title = recentreports.cache.categories[val2.category_id].name;
					}
					
					var html = '\
	<div id="recentReportsItem_'+val2.id+'" class="card bg-container" style="background-image: url('+location_bg_image+'); background-color: #111133;">\
		<h3 class="status"><span class="label '+statusTagColor+'">#'+val2.id+'</span></h3>\
		<div class="body">\
			<div class="row">\
				<div class="col-xs-12 vertical-align-md" style="margin-bottom: 0px;">\
					<div class="col-lg-3 col-md-3 col-sm-12 col-white col-xs-12 text-center-sm" style="margin-bottom: 0px;">\
						<h3 class="text-shadow-large">'+recentreports.timeSince(new Date(val2.created))+' geleden</h3>\
					</div>\
					<div class="col-lg-6 col-md-6 col-sm-12 col-white col-xs-12 text-center" style="margin-bottom: 0px;">\
						<h1 class="text-shadow-large">' + location_title + '</h1>\
						<h4 class="text-shadow-large">' + category_title + '</h4>\
						<p class="hidden text-shadow-large">\
							<span class="m-l-5 m-r-5"><i class="material-icons">directions_car</i> 0</span>\
							<span class="m-l-5 m-r-5"><i class="material-icons">image</i> 0</span>\
							<span class="m-l-5 m-r-5"><i class="material-icons">people</i> 0</span>\
						</p>\
					</div>\
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right text-center-sm" style="margin-bottom: 0px;">\
						<button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">\
							<i class="material-icons">mode_edit</i>\
						</button>\
						<button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float m-l-10">\
							<i class="material-icons">delete</i>\
						</button>\
					</div>\
				</div>\
			</div>\
		</div>\
	</div>\
					';

					items.push(html);
				});
			});
	
			$("#outputRecentReports").html(items.join( "" ));
		});
	};
	
	this.runAutomaticUpdate = function () {
		var auto_refresh = setInterval(function () {
			recentreports.update();
		}, 6000);
	};
	
	this.runConnectionFailureCheck = function () {
		var auto_refresh = setInterval(function () {
			if (((new Date) - recentreports.date) > 15 * 1000) {
				swal({
					title: '',
					html:
						  '	<i class="fa fa-wifi fa-5x" aria-hidden="true"></i>'
						+ '	<br>'
						+ '	<h2>Verbinding verbroken!</h2>'
						+ '	<div style="text-align: left;">'
						+ '		<p>De verbinding naar de API is verbroken.<br>Dit kan liggen aan:</p>'
						+ '		<ul>'
						+ '			<li>Verbinding met internet is verbroken.</li>'
						+ '			<li>Er is een fout in ons systeem.</li>'
						+ '			<li>Netwerk systemen worden geblokkeerd.</li>'
						+ '		</ul>'
						+ '	</div>',
					showConfirmButton: false
				});
			} else {
				swal.close();
			}
		}, 1000);
	};
	
	this.run = function () {
		this.update();
		this.runAutomaticUpdate();
		$.ajaxSetup({ cache: true });
	};
	
	this.cache.load();
};

$(document).ready(function() {
	RecentReports("{{ API_URL }}");
});

/*
$(document).ready(function() {	
	var date = new Date;
	
	updateRecentReports();
	var auto_refresh = setInterval(function () {
		updateRecentReports();
	}, 2000);
	
	function updateRecentReports() {
		$.getJSON("{{ API_URL }}admin/recentReports", function(data) {
			date = new Date;
			var items = [];
			
			$.each(data, function(key, val) {
				$.each(val, function(key2, val2) {
					var statusTagColor = "";
					if (key == "0") {
						statusTagColor = "animation-status";
					} else if (key == "1") {
						statusTagColor = "bg-amber";
					} else if (key == "2") {
						statusTagColor = "bg-green";
					}
					
					var html = '\
	<div class="card bg-container" style="background-image: url(http://meldingen.dev/api/content/images/system/2017/04/30/2017043011080000000058ec9cf0cc0d7.jpg);">\
		<h3 class="status"><span class="label '+statusTagColor+'">#'+val2.id+'</span></h3>\
		<div class="body">\
			<div class="row">\
				<div class="col-xs-12 vertical-align-md" style="margin-bottom: 0px;">\
					<div class="col-lg-3 col-md-3 col-sm-12 col-white col-xs-12 text-center-sm" style="margin-bottom: 0px;">\
						<h3 class="text-shadow-large">'+timeSince(new Date(val2.created))+' geleden</h3>\
					</div>\
					<div class="col-lg-6 col-md-6 col-sm-12 col-white col-xs-12 text-center" style="margin-bottom: 0px;">\
						<h1 class="text-shadow-large">Locatie Openbare plaats</h1>\
						<h4 class="text-shadow-large">Ongeveal Type</h4>\
					</div>\
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right text-center-sm" style="margin-bottom: 0px;">\
						<button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">\
							<i class="material-icons">mode_edit</i>\
						</button>\
						<button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float m-l-10">\
							<i class="material-icons">delete</i>\
						</button>\
					</div>\
				</div>\
			</div>\
		</div>\
	</div>\
					';
					
					items.push(html);
				});
			});
	
			$("#outputRecentReports").html(items.join( "" ));
		});
	}
	
	function timeSince(date) {
		var seconds = Math.floor((new Date() - date) / 1000);
		var interval = Math.floor(seconds / 31536000);

		if (interval > 0) {
			return interval + " jaar";
		}
		interval = Math.floor(seconds / 2592000);
		if (interval > 1) {
			return interval + " maanden";
		} else if (interval == 1) {
			return interval + " maand";
		}
		interval = Math.floor(seconds / 86400);
		if (interval > 1) {
			return interval + " dagen";
		} else if (interval == 1) {
			return interval + " dag";
		}
		interval = Math.floor(seconds / 3600);
		if (interval > 0) {
			return interval + " uur";
		}
		interval = Math.floor(seconds / 60);
		if (interval > 1) {
			return interval + " minuten";
		} else if (interval == 1) {
			return interval + " minuut";
		}
		if (Math.floor(seconds) == 1) {
			return Math.floor(seconds) + " seconde";
		} else {
			return Math.floor(seconds) + " secondes";
		}
	}
	
	var auto_refresh = setInterval(
		function () {
			if (((new Date) - date) > 15 * 1000) {
				swal({
					title: '',
					html:
						  '	<i class="fa fa-wifi fa-5x" aria-hidden="true"></i>'
						+ '	<br>'
						+ '	<h2>Verbinding verbroken!</h2>'
						+ '	<div style="text-align: left;">'
						+ '		<p>De verbinding naar de API is verbroken.<br>Dit kan liggen aan:</p>'
						+ '		<ul>'
						+ '			<li>Verbinding met internet is verbroken.</li>'
						+ '			<li>Er is een fout in ons systeem.</li>'
						+ '			<li>Netwerk systemen worden geblokkeerd.</li>'
						+ '		</ul>'
						+ '	</div>',
					showConfirmButton: false
				});
			} else {
				swal.close();
			}
		}, 1000
	);
	$.ajaxSetup({ cache: true });
});
*/
</script>
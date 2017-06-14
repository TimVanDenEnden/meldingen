<style>
nav.navbar {
	min-height: 60px !important;
	position: relative !important;
	background-color: white !important;
}
nav.navbar a {
	color: #113 !important;
}
nav.navbar a:hover,
nav.navbar a:focus,
nav.navbar a:active{
	color: #5f5f5f !important;
}
nav.navbar .collapsing ul li i,
nav.navbar .collapse ul li i {
	vertical-align: middle;
}

nav.navbar .navbar-header {
	min-height: 50px;
}
nav.navbar .navbar-toggle {
	color: #113 !important;
}
nav.navbar .navbar-toggle,
nav.navbar .navbar-toggle:hover,
nav.navbar .navbar-toggle:focus,
nav.navbar .navbar-toggle:active {
	background: transparent;
	border: 1px solid transparent;
	color: #113;
}

nav.navbar .navbar-toggle.collapsed:before {
	content: '\E5D2';
}
nav.navbar .navbar-toggle:before {
	content: '\E5CD';
	margin-left: -30px;
	margin-top: -2px;
	position: absolute;
}

.bg-container {
	background-size: cover;
	background-position: center center;
}

@-webkit-keyframes animation-status {
	0%   	{ background-color: #F44336; }
	50%		{ background-color: #ff1100;}
	100% 	{ background-color: #F44336; }
}
@-moz-keyframes animation-status {
	0%   	{ background-color: #F44336; }
	50%		{ background-color: #ff1100;}
	100% 	{ background-color: #F44336; }
}
@-o-keyframes animation-status {
	0%   	{ background-color: #F44336; }
	50%		{ background-color: #ff1100;}
	100% 	{ background-color: #F44336; }
}
@keyframes animation-status {
	0%   	{ background-color: #F44336; }
	50%		{ background-color: #ff1100;}
	100% 	{ background-color: #F44336; }
}
.animation-status {
	-webkit-animation: animation-status 2s infinite; /* Safari 4+ */
	-moz-animation:    animation-status 2s infinite; /* Fx 5+ */
	-o-animation:      animation-status 2s infinite; /* Opera 12+ */
	animation:         animation-status 2s infinite; /* IE 10+, Fx 29+ */
}

h3.status {
	position: absolute;
	top: 0px;
	left: -18px;
	font-weight: bold;
}
h3.status span.label:before {
	content: "";
	position: absolute;
	display: block;
	border-style: solid;
	bottom: -15px;
	left: 0px;
	border-width: 10px 0 0 18px;
}
h3.status span.label.animation-status:before {
	border-color: #9a0a00 transparent transparent transparent;
}
h3.status span.label.bg-amber:before {
	border-color: #bf8f00 transparent transparent transparent;
}
h3.status span.label.bg-green:before {
	border-color: #327535 transparent transparent transparent;
}
.text-shadow-large {
	text-shadow: 2px 2px #000000;
}
</style>

<div class="container p-sm-0">
	<div class="headerImage"></div>
	<div class="block-header" style="margin-bottom: 0px;">
		<div class="card" style="margin-bottom: 0px;">
			<div class="header headerTitle">
				Dashboard
			</div>
		</div>
	</div>
	<nav class="navbar navbar-default">
		<div class="navbar-header">
			<a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"></a>
		</div>
		
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li>
					<a href="#"><i class="material-icons">dashboard</i> Dashboard</a>
				</li>
				<li>
					<a href="#"><i class="material-icons">account_balance</i> Archief</a>
				</li>
				<li>
					<a href="#"><i class="material-icons">build</i> Pagina Bouwer</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right m-r-0">
				<li><a href="#"><i class="material-icons">people</i> Gebruikers</a></li>
				<li><a href="#"><i class="material-icons">input</i> Uitloggen</a></li>
			</ul>
		</div>
	</nav>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="block-header">
				<h2>Laatste Meldingen</h2>
			</div>
		</div>
			
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="outputRecentReports">
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
</script>
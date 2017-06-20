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
	margin-top: -2px;
	position: absolute;
}
@media (max-width: 767px) {
	.navbar .navbar-header {
		width: 100%;
	}
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
				{{ HeaderTitle }}
			</div>
		</div>
	</div>
	{% if HIDE_NAV == false %}
		<nav class="navbar navbar-default">
			<div class="navbar-header">
				<a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"></a>
			</div>
			
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li>
						<a href="{{ PageURL }}admin/dashboard"><i class="material-icons">dashboard</i> Dashboard</a>
					</li>
					<li>
						<a href="{{ PageURL }}admin/archief"><i class="material-icons">account_balance</i> Archief</a>
					</li>
					<li>
						<a href="#"><i class="material-icons">build</i> Pagina Bouwer</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right m-r-0">
					<li><a href="#"><i class="material-icons">people</i> Gebruikers</a></li>
					<li><a href="{{ PageURL }}admin/logout"><i class="material-icons">input</i> Uitloggen</a></li>
				</ul>
			</div>
		</nav>
	{% endif %}
</div>
{{ ADMIN_CONTENT | raw }}
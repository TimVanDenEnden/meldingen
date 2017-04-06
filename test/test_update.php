<script src="//code.jquery.com/jquery-latest.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.4.4/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/sweetalert2/6.4.4/sweetalert2.min.js"></script>
<script src="https://use.fontawesome.com/46cd7bd22b.js"></script>

<div id="UPDATE_report">
</div>

<script type="text/javascript">
$(document).ready(function() {
	var date = new Date;
	
	var auto_refresh = setInterval(
		function () {
			var report_id = getCookie("reportID");
			$.getJSON("http://meldingen.dev/api/report/test_getreports&report_id=" + report_id, function(data) {
				date = new Date;
				var items = [];
				items.push("<table>");
				
				$.each(data, function(key, val) {
					$.each(val, function(key2, val2) {
						items.push("<tr>");
						items.push("<td>" + key2 + "</td>");
						items.push("<td>" + val2 + "</td>");
						items.push("</tr>");
					});
				});
				
				items.push("</table>");
	
				$("#UPDATE_report").html(items.join( "" ));
			});
		}, 2000
	);
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

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
</script>
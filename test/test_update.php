<div id="UPDATE_report">
</div>

<script src="//code.jquery.com/jquery-latest.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	var report_id = "report_34_58e3762dc8946";
	
	var auto_refresh = setInterval(
		function () {			
			$.getJSON( "http://meldingen.dev/api/report/test_getreports&report_id=" + report_id, function( data ) {
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
	$.ajaxSetup({ cache: true });
});
</script>
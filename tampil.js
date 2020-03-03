$(document).ready(function() {
    selesai();
});
 
function selesai() {
	setTimeout(function() {
		update();
		selesai();
	}, 200);
}
 
function update() {
	$.getJSON("home.php", function(data) {
		$("ul").empty();
		$.each(data.result, function() {
			$("ul").append("<li>Nomor : "+this['nomor']+"</li><br />");
		});
	});
}
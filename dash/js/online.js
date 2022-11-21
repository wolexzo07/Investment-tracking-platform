function load(page) {
	$("#calculate").show();
$("#calculate").fadeIn(400).html("<center><img src='../image/load_1.gif' style='width:140px;margin:30pt'/></center>");
topFunction();
	$.ajax({
		type	: 'GET',
		url		: page,
		success	: function(data) {
			try {
				$('#calculate').html(data);
			} catch (err) {
				alert(err);
			}
		}
	});
}
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

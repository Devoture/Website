$(document).ready(function(){
	$("a[href^='#']").click(function(e) {
		e.preventDefault();
		
		var position = $($(this).attr("href")).offset().top - 50;

		$("body, html").animate({
			scrollTop: position
		}, 500);
	});

	$("#getstarted").click(function () {
		$(".overlay").show();
	});

	var modal = document.getElementById('myModal');
	var btn = document.getElementById("getstarted");
	var span = document.getElementsByClassName("close")[0];

	btn.onclick = function() {
		modal.style.display = "block";
	}

	span.onclick = function() {
		modal.style.display = "none";
	}

	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
});
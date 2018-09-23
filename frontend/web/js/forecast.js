$(document).ready(
	function() {
		if (document.getElementById('error')) {
			$('#ind_check').hide();
		};
		$('#ind_check').toggle(
			function() {
				$('#ind_forecast').fadeIn('slow');
			},
			function() {
				$('#ind_forecast').fadeOut('slow');
			}
			);
		//**********
		$('#ex_check').toggle(
			function() {
				$('#explanation').fadeIn('slow');
			},
			function() {
				$('#explanation').fadeOut('slow');
			}
			);
		//**********
		$('#ex_check1').toggle(
			function() {
				$('#explanation1').fadeIn('slow');
			},
			function() {
				$('#explanation1').fadeOut('slow');
			}
			);
	}
); 
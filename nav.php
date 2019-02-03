<div class="nav">
	<form action="">
		<button name="acc" value="1">Consultas</button>
		<button name="acc" value="2">Mis programas</button>
		<button name="acc" value="3">Otros programas</button>
		<?php
		if (isset($_SESSION['id'])) {
			$userdba = $_SESSION['id'];
			if ($userdba == 111 OR $userdba == 112 OR $userdba == 113) {
				echo
				'
				<button name="acc" value="4">DBA</button>
				';
			}
		}
		?>
		<button style="float: right;" name="acc" value="5">Mis datos </button>
	</form>
</div>
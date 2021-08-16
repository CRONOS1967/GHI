<?php
session_start();
require_once 'navbar.php';
require_once 'Backend/Backend.php';
$obj = new Backend;
$conn = $obj->connection();


if (isset($_POST['submit'])) {
	$result = $obj->auth($conn, $_POST['Username'], $_POST['pass']);
	if ($result === null) {
		$error = "Incorrect Password";
	} else {
		unset($error);
		$_SESSION['id'] = $result['idUsers'];
		$_SESSION['user'] = $result['Username'];
		$_SESSION['role'] = $result['Role'];
		// echo $_SESSION['role'];
		require 'Routing.php';
	}
}
?>
<div class="wrapper">
	<div class="container">
		<div class="row">
			<div class="module module-login span4 offset4">
				<form autocomplete="off" class="form-vertical" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<div class="module-head">
						<h3>Sign In</h3>
					</div>
					<div class="module-body">
						<div class="control-group">
							<div class="controls row-fluid">
								<input class="span12" required type="text" id="Username" onblur="validate()" placeholder="Username" name="Username">
								<span id="result"></span>
							</div>
						</div>
						<div class="control-group">
							<div class="controls row-fluid">
								<input class="span12" required type="password" id="inputPassword" placeholder="Password" name="pass">
							</div>
						</div>
						<span style='color:red' id="error"><?php if (isset($error)) {
																echo $error;
																unset($error);
															} ?></span>
					</div>
					<div class="module-foot">
						<div class="control-group">
							<div class="controls clearfix">
								<button type="submit" name="submit" id="submit" class="btn btn-primary pull-right">Login</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	function validate() {
		var us = $("#Username").val();
		console.log(us);
		jQuery.ajax({
			url: "Backend/signin.php",
			data: 'username=' + us,
			type: "POST",
			success: function(response) {
				$("#result").html(response);
			},
			error: function(error) {
				console.log(error);
			}
		});

	}
</script>

<!--/.wrapper-->
<?php require_once 'footer.php'; ?>
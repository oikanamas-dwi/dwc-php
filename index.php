<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DWC PHP</title>
</head>

<?php

if (isset($_POST['contact'])) {

	$form_data = $_POST;

//	print_r( $form_data );

//	echo $form_data['name'];

	if ( $form_data['name'] == '' ) {

		$error_message = 'Please Enter a Name';

	}

	if ( $form_data['email'] == '' ) {

		$error_message = 'Please Enter an Email';

	}

	if ( $form_data['message'] == '' ) {

		$error_message = 'Please Enter a Message';

	}

	if (!isset($error_message)) {
		//send email if error hasn't been set
		$to = 'oikanamas@gmail.com';
		$from = 'oikanamas@me.com';
		$subject = 'Contact Form Submit Notice';
		$message = $form_data['message'];
		$headders = array(

			'From' => $form_data['email'],
			'Reply-To' => $to

		);

//		mail($to,$from,$subject,$message,$headders);
		mail($to,$from,$subject,$message); ?>

		<!DOCTYPE html>
		<html prefix="og: http://ogp.me/ns#">
		<head>
			<link rel="stylesheet" type="text/css" href="style.css">
			<meta http-equiv="X-UA-Compatible" content="IE=edge" />
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>DWC PHP</title>
		</head>

		<body>

			<div class="container">

				<div class="headerwrapper">

					<header>

					</header>

				</div>

				<div class="contentwrapper">

					<section>

						<h1>Your message has been set.</h1>

					</section>

				</div>

				<div class="footerwrapper">

					<footer>

					</footer>

				</div>

			</div>

		</body>

		</html>


		<?php exit;
	}

}

?>

	<body>

		<div class="container">

			<div class="headerwrapper">

				<header>

				</header>

			</div>

			<div class="contentwrapper">

				<section>

					<h2>Contact Us</h2>

					<form method="POST" action="index.php">

						<label>Name
							<input type="text" name="name"/>
						</label><br />

						<label>Email
							<input type="text" name="email"/>
						</label><br />

						<label>Message
							<input type="text" name="message" value=""/>
						</label><br />

						<label></label>
						<input type="submit" name="contact" value="Submit!" />


					</form>

				</section>

			</div>

			<div class="footerwrapper">

				<footer>

				</footer>

			</div>

		</div>

	</body>

</html>
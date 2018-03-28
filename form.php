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

//define variables and set to empty values
$name = $address = $phone = $email = "";
$name_err = $address_err = $phone_err = $email_err;

if (isset($_POST['add-customer'])) {

	$form_data = $_POST;
//
//	echo '<pre>';
//	print_r( $form_data );
//	echo '</pre>';

	$name = $form_data['name'];
	$address = $form_data['address'];
	$phone = $form_data['phone'];
	$email = $form_data['email'];

	if ( empty($name) ) {

		$name_err = 'Please Enter a Name';

	} else {

	    if ( !preg_match("/^[a-zA-Z ]*$/",$name) ) {

		    $name_err = 'Only letters allowed';

        }

    }

	if ( empty($address) ) {

		$address_err = 'Please Enter Your Address';

	}

	if ( empty($phone) ) {

		$phone_err = 'Please Enter a Phone Number';

	} else {

		if ( !preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/",$phone) ) {

			$phone_err = 'Invalid phone format';

		}

    }

	if ( empty($email) ) {

		$email_err = 'Please Enter an Email';

	} else {

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$email_err = "Invalid email format";
		}

    }

	if ( !isset($name_err) && !isset($address_err) && !isset($phone_err) && !isset($email_err) ) {

		//send email if error hasn't been set
		$to = 'oikanamas@gmail.com';
		$from = 'oikanamas@me.com';
		$subject = 'Add Customer Form Submit Notice';
		$message = $name . "\r\n" . $address . "\r\n" .  $phone . "\r\n" .  $email;
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

                            <h1>New Customer has been added.</h1>

                            <div><?php echo $name ?></div>
                            <div><?php echo $address ?></div>
                            <div><?php echo $phone ?></div>
                            <div><?php echo $email ?></div>

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

                    <h2>Add New Customer</h2>

                    <form method="POST" action="form.php">

                        <div class="name_input input">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="<?php echo $name ?>"/>
                            <span class="error">* <?php echo $name_err ?></span>
                        </div>
                        <div class="address_input input">
                            <label for="address">Address</label>
                            <input type="text" name="address" value="<?php echo $address ?>"/>
                            <span class="error">* <?php echo $address_err ?></span>
                        </div>
                        <div class="phone_input input">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" placeholder="555-555-5555" value="<?php echo $phone ?>"/>
                            <span class="error">* <?php echo $phone_err ?></span>
                        </div>
                        <div class="email_input input">
                            <label for="email">Email</label>
                            <input type="text" name="email" placeholder="example@example.com" value="<?php echo $email ?>"/>
                            <span class="error">* <?php echo $email_err ?></span>
                        </div>

                        <label></label>
                        <input type="submit" name="add-customer" value="Submit!" />


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

<?php  include "database/db.php"; ?>
<?php  include "partials/header.php"; ?>
<?php  include "partials/navigation.php"; ?>
 <?php
	if(isset($_POST['submit'])) {
//		extract the fields
		$to 			= "k_bnet570@verizon.net";
		$subject	= wordwrap($_POST['subject'], 70);
		$body 		= $_POST['body'];
		$header		=	"From:" . $_POST['email'];
		if(!empty($header) && !empty($subject) && !empty($body)) {
			mail($to, $subject, $body, $header);
			echo "<div class='alert alert-success alert-dismissable' role='alert'>
			  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Email has been sent</strong></div>";
		} else {
			echo "<div class='alert alert-danger alert-dismissable' role='alert'>
			  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>EMAIL FIELDS CAN NOT BE EMPTY</strong></div>";
		}
	}
	?>
    <!-- Page Content -->
    <div class="container">
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact</h1>
                    <form role="form" action="contact.php" method="post" id="login-form" autocomplete="off">
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Your Email Address">
                        </div>
                        <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject">
                        </div>
                       <div class="form-group">
                            <label for="body" class="sr-only">body</label>
                            <textarea class="form-control" name="body" id="body" cols="50" rows="10"></textarea>
                        </div>
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Send Email">
                    </form>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
        <hr>
<?php include "partials/footer.php";?>

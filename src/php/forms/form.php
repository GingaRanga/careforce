<form name="contactForm" method="post" action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>">
	<fieldset>
		<legend><h5>Leave us a message</h5></legend>
		<div class="form-group">
			<label for="formName">Full name</label>
			<input name="formName" type="name" class="form-control" id="formName" aria-describedby="nameHelp" placeholder="Full Name" required>
			<small id="nameHelp" class="form-text text-muted">Please enter your full name.</small>
		</div>
		<div class="form-group">
			<label for="email">Email address</label>
			<input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" required>
			<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		</div>
		<div class="form-group">
			<label for="comments">Enter your message here</label>
			<textarea name="comments" class="form-control" id="comments" rows="3"></textarea>
		</div>
		<button name="submit" type="submit" class="btn btn-info btn-block" value="Submit">Submit</button>
	</fieldset>
</form>

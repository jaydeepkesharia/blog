<!DOCTYPE html>
<html>
<head>
	<title>Interview system</title>

	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="fonts/glyphicons-halflings-regular.woff2">

	<!-- jQuery library -->
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	

	<!-- Latest compiled JavaScript -->
	<script src="js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="css/jquery-ui.css">


	<script src="js/jquery-1.12.4.js"></script>
  	<script src="js/jquery-ui.js"></script>
	<script>
	  $( function() {
	    $( "#datepicker" ).datepicker({ minDate: new Date() });
	  } );
	</script>


	<!--validation jquery-->
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js"></script>

	<script type="text/javascript">
		// Wait for the DOM to be ready
		$(function() {

			$.validator.addMethod("letters", function(value, element) {
	  			return this.optional(element) || value == value.match(/^[a-zA-Z\s]*$/);
			});

		  // Initialize form validation on the registration form.
		  // It has the name attribute "registration"
		  $("form[name='registration']").validate({
		    // Specify validation rules
		    rules: {
		      // The key name on the left side is the name attribute
		      // of an input field. Validation rules are defined
		      // on the right side
		      fname: {
		        required: true,
		        minlength: 3,
		        maxlength: 10,
		        letters: true
		      },
		      mname: {
		        required: true,
		        minlength: 1,
		        maxlength: 10,
		        letters: true
		      },
		      lname: {
		        required: true,
		        minlength: 3,
		        maxlength: 10,
		        letters: true
		      },
		      email: {
		        required: true,
		        email: true,
		        "remote":
                    {
                      	url: 'validateEmail.php',
                      	type: "post",
                      	data:
                      	{
                          	email: function()
                          	{
                              	return $('#register-form :input[name="email"]').val();
                          	}
                      	}
                    }
		      },
		      password: {
		        required: true,
		        maxlength: 10,
		        minlength: 5,
		      },
		      	education:"required",
		      	posts:"required",

		      	experience:{
			        required: true,
			        minlength: 1,
			        maxlength: 8,
		      	},
	      		current:{
			        required: true,
			        minlength: 2,
			        maxlength: 6,
		      	},
	      		expected:{
			        required: true,
			        minlength: 2,
			        maxlength: 6,
		      	},
	      		interviewdate:{
			        required: true,
			        date:true,
		      	},
	      		reason:{
		        	required: true,
		        	minlength: 6,
		        	maxlength: 15,
		        	letters: true
		      	},
	      
	      		notice:{
			        required: true,
			        minlength: 1,
			        maxlength: 7,
		      	},
	      		apply:"required",
	      		status:"required",
		    },
		   
		    messages: {
		     
		      fname: {
		        required: "Please specify your firstname (only letters and spaces are allowed )",
		        minlength: "Your firstname must be at least 3 characters long",
		        maxlength: "Your firstname should not be more than 10 characters long",
		         letters:"only letters and spaces are allowed",
		      },
		      mname: {
		        required: "Please specify your middlename (only letters and spaces are allowed )",
		        letters:"only letters and spaces are allowed",
		        maxlength: "Your middlename should not be more than 10 characters long",
		      },
		      lname: {
		        required: "Please specify your lastname (only letters and spaces are allowed )",
		        minlength: "Your lastname must be at least 3 characters long",
		        maxlength: "Your lastname should not be more than 10 characters long",
		        letters:"only letters and spaces are allowed",
		      },
		      reason: "Please specify reason to leave the job    (only letters and spaces are allowed atleast 6 letters needed)",
		      password: {
		        required: "Please provide a password",
		        minlength: "Your password must be at least 5 characters long",
		        maxlength: "Your password should not be more than 10 characters long",
		      },
		      experience:{
			        required: "Please provide your experience",
			        maxlength: "Your password should not be more than 8 characters long",
		      },
		      current:{
			        required: "Please provide your current CTC",
			        maxlength: "Your current CTC should not be more than 6 characters long",
		      	},
	      		expected:{
			        required: "Please provide your expected CTC",
			        maxlength: "Your expected CTC should not be more than 6 characters long",
		      	},
	      		
	      		reason:{
		        	required: "Please provide reason to leave job",
		        	minlength: "Your reason must be at least 6 characters long",
		        	maxlength: "Your reason should not be more than 15 characters long",
		        	letters:"only letters and spaces are allowed",
		      	},
	      
	      		notice:{
			        required: "Please provide notice period",
			        maxlength: "Your notice period should not be more than 7 characters long",
		      	},

		      email: {
		      		required: "Please enter your email address.",
                    email: "Please enter a valid email address.",
                    remote: jQuery.validator.format("{0} is already taken."),
                }
		    },
		    // Make sure the form is submitted to the destination defined
		    // in the "action" attribute of the form when valid
		   /* submitHandler: function(form) {
		      form.submit();
		    }*/
		  });
		});
	</script>
	  
</head>
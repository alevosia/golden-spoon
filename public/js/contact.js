$('body').css('opacity', 0);
$(document).ready(function() {
	$('body').animate({ opacity: 1 }, 800);
});

var characterLimit = 1000;

function isEmpty(input) {
	return !input || input.length === 0;
}

function resetForm() {
	$('#firstname').val('');
	$('#lastname').val('');
	$('#email').val('');
	$('#subject').val('');
	$('#message').val('');
}

function sendData(firstname, lastname, email, subject, message, grecaptchaResponse) {
	
	$.ajax({
		url: '/mail.php',
		method: 'POST',
		data: {
			firstname: firstname,
			lastname: lastname,
			email: email,
			subject: subject,
			message: message,
			'g-recaptcha-response': grecaptchaResponse
        }
        
	}).done(function(status) {
		
		console.log(status);
		
		$('#submit-button').html('Send Message');
		
		grecaptcha.reset();
		
		if (status === "passed") {
			resetForm();
			$('.status').text('Message was successfully sent. Thank you.');
		} else if (status === "missing") {
			alert('Please fill out all required fields.');
		} else {
			$('.status').text('Message failed to send. Please try again later.');
		}
	});
}

$('#submit-button').click(function(event) {
	var firstname = $('#firstname').val();
	var lastname = $('#lastname').val();
	var email = $('#email').val();
	var subject = $('#subject').val();
	var message = $('#message').val();

	if (
		isEmpty(firstname) ||
		isEmpty(lastname) ||
		isEmpty(email) ||
		isEmpty(subject) ||
		isEmpty(message)
	) {
		return alert('Please fill out all required fields.');
	}

	if (message.length > characterLimit) {
		return alert(`Message must not be more than ${characterLimit} characters.`);
	}

	var grecaptchaResponse = grecaptcha.getResponse();

	if (!grecaptchaResponse) {
		return alert('Please check the captcha, hooman.');
	}
	
	$(this).html('<i class="fas fa-spinner fa-spin"></i> Sending');

	sendData(firstname, lastname, email, subject, message, grecaptchaResponse);
});

$('textarea').keyup(function(event) {
	var message = $(this).val();
	$(this).next().text(`${characterLimit - message.length} characters left`);
});

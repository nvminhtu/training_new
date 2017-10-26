jQuery(function($) {
	
	var 
		$introduction = $('#field_introduction textarea'),
		$messNotify = $('#notify_intro .acf-input'),
		$changeNotify = $('#change_notification_text .acf-input input[type="text"]');

	var maxlength = $('#field_introduction textarea').attr('maxlength');
		
	var notifyChars = $changeNotify.val(),
		chars = notifyChars.split('xx');

		curLength = $introduction.val().length,
		leftChars = maxlength - curLength;

	
		leftChars = chars[0] + leftChars + chars[1];

	$messNotify.text(leftChars);

	//  Check length of Input
	$introduction.bind('input', function() {
	  var 
	  	selected_length = $(this).val().length;
	  	left_length = maxlength - selected_length;

	  left_length = chars[0] + left_length + chars[1];

	  if (selected_length <= maxlength) {
		$messNotify.text(left_length);
	  }
	})
});

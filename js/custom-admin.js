jQuery(function($) {
	
	var $introduction = $('#field_introduction textarea'),
		$messNotify = $('#notify_intro .acf-input'),
		
		curLength = $introduction.val().length,
		leftChars = 150 - curLength;

	$messNotify.text(leftChars);

	//  Check length of Input
	$introduction.bind('input', function() {
	  var 
	  	selected_length = $(this).val().length;
	  	left_length = 150 - selected_length;

	  if (selected_length <= 150) {
		$messNotify.text(left_length + ' characters remaining.');
	  }
	})
});

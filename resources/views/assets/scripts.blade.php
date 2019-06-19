<script type="text/javascript">
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$(function() {
		// Initialize form validation on the registration form.
		// It has the name attribute "registration"
		$("form.simple_form").validate({
			// Specify validation rules
			rules: {
				amount: {required: true, number: true, maxlength: 10},
				buyer: {required: true, letter_number_space: true, maxlength: 255},
				receipt_id: {required: true, maxlength: 20},
				'items[]': {required: true, maxlength: 255},
				buyer_email: {required: true, email: true, maxlength: 50},
				note: {required: true, maxwordCount: ['30']},
				city: {required: true, letter_space: true, maxlength: 20},
				phone: {required: true, number: true, maxlength: 20},
				entry_by: {required: true, number: true, maxlength: 10},
			},
			errorPlacement: function(error, element) {
		      element.parents('.inputGroupContainer').append(error);
		    },
			// Make sure the form is submitted to the destination defined
			// in the "action" attribute of the form when valid
			submitHandler: function(form) {

				if(readCookie('todays_submission') != 'true'){
					form.submit();
					createCookie('todays_submission','true',1);
				}else{
					alert('Come back tomorrow! You already submit this form.');
				}
				
			}
		});

		jQuery.validator.addMethod("letter_number_space", function(value, element) {
			return this.optional(element) || /^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/i.test(value);
		}, "Text, numbers and spaces only please"); 

		jQuery.validator.addMethod("letter_space", function(value, element) {
			return this.optional(element) || /^[A-Za-z _]*[A-Za-z][A-Za-z _]*$/i.test(value);
		}, "Text and spaces only please"); 

		function getWordCount(wordString) {
		  var words = wordString.split(" ");
		  words = words.filter(function(words) { 
		    return words.length > 0
		  }).length;
		  return words;
		}

		//add the custom validation method
		jQuery.validator.addMethod("maxwordCount",
		   function(value, element, params) {
		      var count = getWordCount(value);
		      if(count <= params[0]) {
		         return true;
		      }
		   },
		   jQuery.validator.format("Not more than {0} words.")
		);

		$('[name="phone"]').keyup(function(){
			if( !(/^(880)/i.test($(this).val())) ){
				$(this).val('880'+$(this).val());
			}
		});

		$('input[name="daterange"]').daterangepicker({
		    opens: 'left',
		    format: 'yyyy-mm-dd'
		  }, function(start, end, label) {
		    //console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
		    $.ajax({
			    type: "POST",
			    url: "{{route('get_filter_data')}}",
			    data: {from: start.format('YYYY-MM-DD'), to: end.format('YYYY-MM-DD')},
			    success: function(data) {
			        $('#submission_data').html(data);
			    },
			    error: function() {
			        alert('error handling here');
			    }
			});


		  });

	});


	function createCookie(name,value,days) {
	    var expires = "";
	    if (days) {
	        var date = new Date();
	        date.setTime(date.getTime() + (days*24*60*60*1000));
	        expires = "; expires=" + date.toUTCString();
	    }
	    document.cookie = name + "=" + value  + "; path=/";
	    //document.cookie = name + "=" + value + expires + "; path=/";
	}

	function readCookie(name) {
	    var nameEQ = name + "=";
	    var ca = document.cookie.split(';');
	    for(var i=0;i < ca.length;i++) {
	        var c = ca[i];
	        while (c.charAt(0)==' ') c = c.substring(1,c.length);
	        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	    }
	    return null;
	}

	function eraseCookie(name) {
	    createCookie(name,"",-1);
	}

	function add_more_item(){
		$('.all_item_wrapper').append($($('.single_item_wrapper')[0]).clone())
	}
</script>
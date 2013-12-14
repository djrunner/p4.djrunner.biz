$(document).ready(function () {


$.validator.addMethod("time_format_check",function (value,element){

      return ( 
      			(
      				(value.charAt(0) == "0") ||
      				(value.charAt(0) == "1") ||
      				(value.charAt(0) == "2") ||
      				(value.charAt(0) == "3") ||
      				(value.charAt(0) == "4") ||
      				(value.charAt(0) == "5") ||
      				(value.charAt(0) == "6") ||
      				(value.charAt(0) == "7") ||
      				(value.charAt(0) == "8") ||
      				(value.charAt(0) == "9") 

				) &&

      			(
      				(value.charAt(1) == "0") ||
      				(value.charAt(1) == "1") ||
      				(value.charAt(1) == "2") ||
      				(value.charAt(1) == "3") ||
      				(value.charAt(1) == "4") ||
      				(value.charAt(1) == "5") ||
      				(value.charAt(1) == "6") ||
      				(value.charAt(1) == "7") ||
      				(value.charAt(1) == "8") ||
      				(value.charAt(1) == "9")
      			) &&

				(	
					(value.charAt(2) == ":")
				) &&

				(
					(value.charAt(3) == "0") ||
      				(value.charAt(3) == "1") ||
      				(value.charAt(3) == "2") ||
      				(value.charAt(3) == "3") ||
      				(value.charAt(3) == "4") ||
      				(value.charAt(3) == "5")  
				) &&

				(
					(value.charAt(4) == "0") ||
      				(value.charAt(4) == "1") ||
      				(value.charAt(4) == "2") ||
      				(value.charAt(4) == "3") ||
      				(value.charAt(4) == "4") ||
      				(value.charAt(4) == "5") ||
      				(value.charAt(4) == "6") ||
      				(value.charAt(4) == "7") ||
      				(value.charAt(4) == "8") ||
      				(value.charAt(4) == "9")
				) &&

				(	
					(value.charAt(5) == ":")
				) &&

				(
					(value.charAt(6) == "0") ||
      				(value.charAt(6) == "1") ||
      				(value.charAt(6) == "2") ||
      				(value.charAt(6) == "3") ||
      				(value.charAt(6) == "4") ||
      				(value.charAt(6) == "5") 
				) &&

				(
					(value.charAt(7) == "0") ||
      				(value.charAt(7) == "1") ||
      				(value.charAt(7) == "2") ||
      				(value.charAt(7) == "3") ||
      				(value.charAt(7) == "4") ||
      				(value.charAt(7) == "5") ||
      				(value.charAt(7) == "6") ||
      				(value.charAt(7) == "7") ||
      				(value.charAt(7) == "8") ||
      				(value.charAt(7) == "9")
      			)
      	); 

    }, 'Please follow HH:MM:SS format');

$.validator.addMethod("pace_format_check",function (value,element){

      return ( 
                         (
                              (value.charAt(0) == "0") ||
                              (value.charAt(0) == "1") ||
                              (value.charAt(0) == "2") ||
                              (value.charAt(0) == "3") ||
                              (value.charAt(0) == "4") ||
                              (value.charAt(0) == "5")  
                        ) &&

                        (
                              (value.charAt(1) == "0") ||
                              (value.charAt(1) == "1") ||
                              (value.charAt(1) == "2") ||
                              (value.charAt(1) == "3") ||
                              (value.charAt(1) == "4") ||
                              (value.charAt(1) == "5") ||
                              (value.charAt(1) == "6") ||
                              (value.charAt(1) == "7") ||
                              (value.charAt(1) == "8") ||
                              (value.charAt(1) == "9")
                        ) &&

                        (     
                              (value.charAt(2) == ":")
                        ) &&

                        (
                              (value.charAt(3) == "0") ||
                              (value.charAt(3) == "1") ||
                              (value.charAt(3) == "2") ||
                              (value.charAt(3) == "3") ||
                              (value.charAt(3) == "4") ||
                              (value.charAt(3) == "5") 
                        ) &&

                        (
                              (value.charAt(4) == "0") ||
                              (value.charAt(4) == "1") ||
                              (value.charAt(4) == "2") ||
                              (value.charAt(4) == "3") ||
                              (value.charAt(4) == "4") ||
                              (value.charAt(4) == "5") ||
                              (value.charAt(4) == "6") ||
                              (value.charAt(4) == "7") ||
                              (value.charAt(4) == "8") ||
                              (value.charAt(4) == "9")
                        )
            ); 

    }, 'Please follow MM:SS format');

$("#race_add_form").validate({
	rules: 	{
		race_time_string: {
			time_format_check: true
		},
		pace_time_string: {
			pace_format_check: true
		}
	}
});

});
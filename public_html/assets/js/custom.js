var trucking;
var d = [];

$(document).ready(function () {

	$.ajax({
		
		url: "http://localhost/codeigniter/dashboard/getCategory",
        dataType: "json",

        success: function(data) {
        	trucking = data;
        	d = $.map(trucking, function (obj) {
  				obj.id = obj.id || obj.id_service;
  				obj.text = obj.text || obj.category; // replace pk with your identifier
  				delete obj.id_service;
  				delete obj.category;
  				return obj;
			});

			$('#service0').select2({
				placeholder: "test",
  				data: d
			});
        },

        error: function(xhr, status, error) {
				console.log(xhr);
				console.log(status);
				console.log(error);
		}
  	});

  	$('#service0').change(function() {

	  		$.ajax({
			
			type: "POST",
			url: "http://localhost/codeigniter/dashboard/getby",
			data: {id_service : $('#service0 option:selected').attr('value')},
	        dataType: "json",

	        success: function(data) {
	        	trucking.resultBy = data;
	        	$('#price0').val(trucking.resultBy[0].price);
	        },

	        error: function(xhr, status, error) {
					console.log(xhr);
					console.log(status);
					console.log(error);
			}

		});

  	});


});


// datepicker jquery ui
$(".form-control.date").datepicker({

	altField: "#actualDate",
	dateFormat: "dd-mm-yy",
	changeMonth: true,
	changeYear: true,
	autoSize: true,
	yearRange: "-25:+0"

});

var itemCounter = 1;

function appendItemService() {
	var tag = "<div class='items'><div class='col-sm-6 one'><select type='text' name='item-service" + itemCounter + "' class='form-control' id='service" + itemCounter + "' placeholder='Service Category'></select></div><div class='col-sm-6 two'><input type='text' name='price" + itemCounter + "' class='form-control' id='price" + itemCounter + "' placeholder='Price'></div></div>";
    $(".col-sm-10.adder").append(tag);
    
    $('#service'+ itemCounter).select2({
			placeholder: "test",
			data: d
	});

    itemCounter++;
}


function removeLastItem() {
	$('.col-sm-10.adder div.items:last-child').remove();
	itemCounter--;
}

$('div.items.col-sm-6.one select:last-child').change(function() {

	  		$.ajax({
			
			type: "POST",
			url: "http://localhost/codeigniter/dashboard/getby",
			data: {id_service : $('div.items.col-sm-6.one select:last-child option:selected').attr('value')},
	        dataType: "json",

	        success: function(data) {
	        	trucking.resultBy = data;
	        	$('div.items.col-sm-6.two input:last-child').val(trucking.resultBy[0].price);
	        },

	        error: function(xhr, status, error) {
					console.log(xhr);
					console.log(status);
					console.log(error);
			}

		});

 });
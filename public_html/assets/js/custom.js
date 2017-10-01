var trucking;
var d = [];

var priceTotal = 0;

var items = $('.col-sm-10.adder .items').length;

$(document).ready(function () {

	items = $('.col-sm-10.adder .items').length;

	$.ajax({
		
		url: categoryAllUrl,
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

  	preventAddButton();


  	$('#service0').change(function() {  			

	  		$.ajax({
			
			type: "POST",
			url: categoryByUrl,
			data: {id_service : $('#service0 option:selected').attr('value')},
	        dataType: "json",

	        success: function(data) {
	        	trucking.resultBy = data;
	        	$('#price0').val(trucking.resultBy[0].price);

	        	for (var i = 0; i < $('.col-sm-6.two input').length; i++) {
	        		priceTotal = priceTotal + parseInt($('.col-sm-6.two input#price' + i).val());
	        	}

	        	$('.col-sm-10 input#total-price').val(priceTotal);

	        	preventAddButton();

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
	var tag = "<div class='items'><div class='col-sm-6 one'><select type='text' name='item-service" + items + "' class='form-control' id='service" + items + "' placeholder='Service Category'></select></div><div class='col-sm-6 two'><input type='text' name='price" + items + "' class='form-control' id='price" + items + "' placeholder='Price'></div></div>";
    $(".col-sm-10.adder").append(tag);
    
    $('#service'+ items).select2({
			placeholder: "test",
			data: d
	});

	items = $('.col-sm-10.adder .items').length;

	preventAddButton();

	$('.col-sm-6.one select#service' + (items - 1)).change(function() {

	  		$.ajax({
			
			type: "POST",
			url: "http://localhost/codeigniter/dashboard/getby",
			data: {id_service : $('.col-sm-6.one select#service' + (items - 1) + ' option:selected').attr('value')},
	        dataType: "json",

	        success: function(data) {
	        	priceTotal = 0;
	        	trucking.resultBy = data;
	        	$('.col-sm-6.two input#price' + (items - 1)).val(trucking.resultBy[0].price);
	        	// priceTotal = parseInt(priceTotal) + parseInt(trucking.resultBy[0].price);
	        	for (var i = 0; i < $('.col-sm-6.two input').length; i++) {
					priceTotal = priceTotal + parseInt($('.col-sm-6.two input#price' + i).val());
				}
	        	$('.col-sm-10 input#total-price').val(priceTotal);
	        	preventAddButton();

	        },

	        error: function(xhr, status, error) {
					console.log(xhr);
					console.log(status);
					console.log(error);
			}

			});


 	});

    itemCounter++;
}


function removeLastItem() {
	$('.col-sm-10.adder div.items:last-child').remove();
	items = $('.col-sm-10.adder .items').length;
	priceTotal = 0;
	for (var i = 0; i < $('.col-sm-6.two input').length; i++) {
		priceTotal = priceTotal + parseInt($('.col-sm-6.two input#price' + i).val());
	}
	$('.col-sm-10 input#total-price').val(priceTotal);
	itemCounter--;
}

function resetItem(){
	$('.col-sm-10.adder div.items').remove();
	$('.col-sm-10 input#total-price').val('');
	items = 0;
}


function preventAddButton() {

	var g = $('.col-sm-10.adder .items').length;

	if ($('.col-sm-6.two input#price' + (g - 1)).val() == ''){

  		$('#add').attr({
  			disabled: 'true'
  		});

  	}else{
  		$('#add').removeAttr('disabled');
  	}
}
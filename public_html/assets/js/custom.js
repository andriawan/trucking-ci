// global variabel
var trucking;
var d = [];
var priceTotal = 0;
var items = $('.col-sm-10.adder .items').length;

// dieksekusi dengan library jquery
$(document).ready(function () {

	// inisialisasi DOM list jumlah item list service
	items = $('.col-sm-10.adder .items').length;


	// ambil data categori list service dari database dengan ajax
	// parsing dengan JSON dari server PHP
	// passing ke global variable array d[]
	$.ajax({
		
		// url diinisalisai pada footer dengan memanfaatkan server PHP 
		url: base_url + 'dashboard/getCategory',
		// data return
        dataType: "json",
        // jika ajax sukses akan passing array data yang di map kembali
        // dengan jquery.map
        success: function(data) {
        	// passing data ke global variable trucking
        	trucking = data;
        	// pasing map array ke global variable d
        	d = $.map(trucking, function (obj) {
  				obj.id = obj.id || obj.id_service;
  				obj.text = obj.text || obj.category; // replace pk with your identifier
  				delete obj.id_service;
  				delete obj.category;
  				return obj;
			});

			// inisialisasi library select2 untuk autosearch option dari
			// data hasil ajax request ke database yaitu variable d[]
			$('#service0').select2({
				placeholder: "test",
  				data: d
			});
        },

        // jika erro saat request ajax, tampilkan log
        error: function(xhr, status, error) {
				console.log(xhr);
				console.log(status);
				console.log(error);
		}
  	});

	// conditional statement apakah button add item list service
	// disable atau tidak jika harga/price ditentukan
  	preventAddButton();

  	// event trigger ketika data dari list item service di ubah
  	$('#service0').change(function() {  			

  			// melakukan pemanggilan ajax
  			// proses value dari selected option sebagai parameter POST
	  		$.ajax({
			
			type: "POST",
			url: base_url + 'dashboard/getby',
			// parameter post ialah id_service 
			data: {id_service : $('#service0 option:selected').attr('value')},
	        dataType: "json",

	        // jika sukses, data price/harga akan ditambahkan ke value #price
	        success: function(data) {
	        	trucking.resultBy = data;

	        	priceTotal = 0;

	        	$('#price0').val(trucking.resultBy[0].price);

	        	// refresh total harga keseluruhan
	        	for (var i = 0; i < $('.col-sm-6.two input').length; i++) {
	        		priceTotal = priceTotal + parseInt($('.col-sm-6.two input#price' + i).val());
	        	}

	        	// passing var priceTotal ke value price
	        	$('.col-sm-10 input#total-price').val(priceTotal);

	        	// ambil valu total, pass ke hidden value
	        	var sum = $('.col-sm-10 input#total-price').val();
				$('.sum').val(sum);

	        	// cek add item list apakah bisa enable atau tidak(akan disable jika #price valu empty
	        	// string, guna menghindari integritas data yang tidak sesuai
	        	preventAddButton();

	        },

	        // jika erro saat request ajax, tampilkan log
	        error: function(xhr, status, error) {
					console.log(xhr);
					console.log(status);
					console.log(error);
			}

		});

  	});

  	// datepicker jquery ui
	$(".form-control.date").datepicker({

		altField: "#actualDate",
		dateFormat: "dd-mm-yy",
		changeMonth: true,
		changeYear: true,
		autoSize: true,
		yearRange: "-25:+50"

	});


}); // end of document ready function


// menambahkan arbitrary list item kategori. tingkat kesulitan cukup tinggi
function appendItemService() {
	// mempersiapkan tag html yang akan di tambahkan ke DOM
	var tag = "<div class='items'><div class='col-sm-6 one'><select type='text' name='item-service" + items + "' class='form-control' id='service" + items + "' placeholder='Service Category'></select></div><div class='col-sm-6 two'><input type='text' disabled='true' name='price" + items + "' class='form-control' id='price" + items + "' placeholder='Price'></div></div>";

	// tambahkan ke DOM
    $(".col-sm-10.adder").append(tag);
    
    // trigger event untuk mengaktifkan select2 pada element yang baru saya ditambahkan
    $('#service'+ items).select2({
			placeholder: "test",
			data: d
	});

	//refresh jumlah child element
	items = $('.col-sm-10.adder .items').length;

	// cek add item list apakah bisa enable atau tidak(akan disable jika #price valu empty
	// string, guna menghindari integritas data yang tidak sesuai
	preventAddButton();

	// menambahkan handle event arbitrary list item kategori. tingkat kesulitan cukup tinggi
	$('.col-sm-6.one select#service' + (items - 1)).change(function() {

			// melakukan pemanggilan ajax
  			// proses value dari selected option sebagai parameter POST
	  		$.ajax({
			
			type: "POST",
			url: base_url + 'dashboard/getby',
			data: {id_service : $('.col-sm-6.one select#service' + (items - 1) + ' option:selected').attr('value')},
	        dataType: "json",

	        success: function(data) {
	        	// reset priceTotal agar hasil sebelumnya tidak mempengaruhi total terbaru
	        	priceTotal = 0;
	        	// simpah hasil request ajax (json) ke global object
	        	trucking.resultBy = data;
	        	// menamb
	        	$('.col-sm-6.two input#price' + (items - 1)).val(trucking.resultBy[0].price);
	        	// priceTotal = parseInt(priceTotal) + parseInt(trucking.resultBy[0].price);
	        	for (var i = 0; i < $('.col-sm-6.two input').length; i++) {
					priceTotal = priceTotal + parseInt($('.col-sm-6.two input#price' + i).val());
				}
				// passing var priceTotal ke value price
	        	$('.col-sm-10 input#total-price').val(priceTotal);
	        	
	        	// ambil valu total, pass ke hidden value
	        	var sum = $('.col-sm-10 input#total-price').val();
				$('.sum').val(sum);

	        	// cek add item list apakah bisa enable atau tidak(akan disable jika #price valu empty
				// string, guna menghindari integritas data yang tidak sesuai
	        	preventAddButton();

	        },

	        // jika erro saat request ajax, tampilkan log
	        error: function(xhr, status, error) {
					console.log(xhr);
					console.log(status);
					console.log(error);
			}

			});


 	});

 	addHiddenInput();

}


// menghapus element terakhir dari list item service
function removeLastItem() {
	$('.col-sm-10.adder div.items:last-child').remove();
	items = $('.col-sm-10.adder .items').length;
	priceTotal = 0;
	for (var i = 0; i < $('.col-sm-6.two input').length; i++) {
		priceTotal = priceTotal + parseInt($('.col-sm-6.two input#price' + i).val());
	}
	$('.col-sm-10 input#total-price').val(priceTotal);

	if($('.col-sm-10.adder .items').length <= 0){
		$('#add').removeAttr('disabled');	
	}

	// ambil length, pass ke hidden value count list
	var count = $('.col-sm-10.adder .items').length;
	$('.count-list').val(count);
}

// menghapus semua element dari list item service
function resetItem(){
	$('.col-sm-10.adder div.items').remove();
	$('.col-sm-10 input#total-price').val('');

	if($('.col-sm-10.adder .items').length <= 0){
		$('#add').removeAttr('disabled');	
	}

	items = 0;

	// set count item list
	$('.count-list').val(0);

	$('.sum').val(0);
}

// logic handle untuk button enable atau disable
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

// add hidden input value untuk server untuk mengenali jumlah looping pada service item list
function addHiddenInput() {
	var count = $('.col-sm-10.adder .items').length;
	$('.count-list').val(count);
}

// handle export Excel dan PDF
function exportExcel() {

	// get parent table tag
	var table = $('.table-responsive');

	$.ajax({
			
			type: "POST",
			url: base_url + 'dashboard/exportExcel',
			data: {html : table[0].innerHTML},
			dataType: "json",

	        // success: function(data) {
	        // 	 window.open(base_url + 'dashboard/exportExcel','_blank');
	        // },

	        // jika erro saat request ajax, tampilkan log
	        error: function(xhr, status, error) {
					console.log(xhr);
					console.log(status);
					console.log(error);
			}

			}).done(function(data){
			    var $a = $("<a>");
			    $a.attr("href",data.file);
			    $("body").append($a);
			    $a.attr("download","file.xls");
			    $a[0].click();
			    $a.remove();
		});

}
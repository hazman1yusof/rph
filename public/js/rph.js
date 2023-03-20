$(document).ready(function () {
	pop_weeks(weeks);
	$('#sel_year').calendar({type: 'year'});

	$('#sel_year').change(function(){
		$('#rph_year_week').dimmer('show');
	});

  $('select#sel_weeks').change(function(){
		let id = $(this).val();
		let week = weeks[id];

		$('#sel_weeks_p').text('Week : '+week.week);
	});

  $('#sel_tobtm').click(function(){
  	if($('#sel_weeks').val() == ' '){
  		alert('Please Select Week');
  	}else{
	  	$('select#sel_weeks,#sel_year').parent().addClass('disabled');
	  	$('#sel_tobtm').hide();
			$('#rph_select,#sel_totop').show();
  	}
	});

	$('#sel_totop').click(function(){
  	$('select#sel_weeks,#sel_year').parent().removeClass('disabled');
  	$('#sel_tobtm').show();
		$('#rph_select,#sel_totop').hide();
	});

	$("form#tambah_subjek").validate({
		ignore: [], //check jgk hidden
		messages: {
		    general_assesment: {
      			required: "",
		      	minlength: jQuery.validator.format("At least {0} characters required!")
		    }
		  },
	  	invalidHandler: function(event, validator) {
	  		validator.errorList.forEach(function(e,i){
	  			if($(e.element).is("select")){
	  				$(e.element).parent().addClass('error');
	  			}
	  		});
	  		$(validator.errorList[0].element).focus();
	  		alert('Please fill all mandatory field');
	  	},
	  	errorPlacement: function(error, element) {
	  		if (element.attr("name") == "general_assesment" ) {
		      error.insertAfter(element);
		    }
	  	}
	});

	$('i.right.floated.link.plus.icon.blue').popup();
	$('#add_1,#add_2,#add_3,#add_4,#add_5').click(function(){
		let hari = $(this).data('hari');
  	oper = 'add';
		emptyFormdata([],'form#tambah_subjek');
		$('.ui.modal').modal({
			onApprove:function($element){
				if($("form#tambah_subjek").valid()) {
	  				save_subjek(hari);
					return true;
				}else{
					return false;
				}
			}
		  }).modal('show');
	});

	init_jadual();
});

var oper='add';
function save_subjek(hari){
	var param = {
		action: 'save_jadual',
		hari: hari,
		oper:oper
	}

	var tambah_subjek = $("form#tambah_subjek").serializeArray();

	$.post( "./rph?"+$.param(param),$.param(tambah_subjek), function( data ){
		
	},'json').fail(function(data) {

    }).done(function(data){
		init_jadual();
    });
}

var jadual = [];
function init_jadual(){
	kosongkan_jadual();
	var param = {
		action: 'init_jadual'
	}

	$.get("./rph_table?"+$.param(param), function(data) {
	},'json').done(function(data) {

		data.data.forEach(function(e,i){
			jadual.push(e);
		});

		letak_jadual();
    }).fail(function(data){
        alert('error');
    });
}

function kosongkan_jadual(){
	jadual = [];
	$('div.swiper-wrapper').html('');
}

function letak_jadual(){
	var cnt_1 = 0;var cnt_2 = 0;var cnt_3 = 0;var cnt_4 = 0;var cnt_5 = 0;
	jadual.forEach(function(e,i){
		let masa_dari = moment(e.masa_dari, 'HH:mm:ss').format('hh:mm A');
		let masa_hingga = moment(e.masa_hingga, 'HH:mm:ss').format('hh:mm A');
		let my_i = 0;

		switch(e.hari){
			case 'ISNIN': cnt_1++; my_i = my_i+cnt_1; break;
			case 'SELASA':  cnt_2++; my_i = my_i+cnt_2; break;
			case 'RABU':  cnt_3++; my_i = my_i+cnt_3; break;
			case 'KHAMIS':  cnt_4++; my_i = my_i+cnt_4; break;
			case 'JUMAAT':  cnt_5++; my_i = my_i+cnt_5; break;
		}

		$('div#'+e.hari+' div.swiper-wrapper').append(`
			<div class="swiper-slide">
          <div class="ui card">
           <div class="content">
            <div class="header"> `+my_i+`) `+e.subjek+`
            </div>
            <div class="description">
              KELAS : `+e.kelas+`<br>
              MASA DARI : `+masa_dari+` – `+masa_hingga+` <br>
            </div>
            <br>
	           <div class="ui blue basic button add_rph" data-id = `+i+`>
					    <i class="add icon"></i>Add RPH
					   </div>
           </div>
          </div>
      </div>
		`);
	});

	$('span#1_cnt').text(cnt_1);
	$('span#2_cnt').text(cnt_2);
	$('span#3_cnt').text(cnt_3);
	$('span#4_cnt').text(cnt_4);
	$('span#5_cnt').text(cnt_5);

	$('i.edit_').on('click',edit_jadual);
	$('i.del_').on('click',delete_jadual);
	$('div.add_rph').on('click',add_rph);
}

function delete_jadual(event){
	let id = $(this).data('id');
	let data = jadual[id];

	let text = "Betul nak delete ni?";
	if (confirm(text) == true) {
		var param = {
			action: 'save_jadual',
			'_token': $('#_token').val(),
			idno: data.idno,
			oper:'del'
		}

		$.post( "./rph?"+$.param(param),{}, function( data ){
			
		},'json').fail(function(data) {

	    }).done(function(data){
			init_jadual();
	    });
	}
}

function edit_jadual(event){
	let id = $(this).data('id');
	let data = jadual[id];
	let entries = Object.entries(data);

	entries.forEach(function(e,i){
		var input=$("form#tambah_subjek [name='"+e[0]+"']").val(e[1]);
	});

	oper = 'edit';
	$('.ui.modal').modal({
		onApprove:function($element){
			if($("form#tambah_subjek").valid()) {
					save_subjek(data.hari);
				return true;
			}else{
				return false;
			}
		}
	}).modal('show');
}

function add_rph(){
	$('.ui.modal').modal({
		onApprove:function($element){
			if($("form#tambah_subjek").valid()) {
  				save_subjek(hari);
				return true;
			}else{
				return false;
			}
		}
	  }).modal('show');
}

function pop_weeks(weeks){
	$('select#sel_weeks').html('');
	weeks.forEach(function(e,i){
		if(e.key == 'none'){
			$('select#sel_weeks').append(`<option value=" ">Select Week</option>`);
		}else{
			$('select#sel_weeks').append(`<option value="`+i+`">`+e.key+` &nbsp;(`+e.week+`) </option>`);
		}
	});
}

const swiper = new Swiper('.swiper', {
  direction: 'horizontal',
  loop: false,
});
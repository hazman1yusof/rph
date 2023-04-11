$(document).ready(function () {
	year_id_sel_init();
	if(istablet){
		const swiper = new Swiper('.swiper', {
		  direction: 'horizontal',
		  loop: false,
		});	
	}else{
		$( "div.swiper" ).remove();
	}

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
		$('.ui.modal#modal_jadual').modal({
			autofocus:false,
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

	$('#add_jadual').click(function(){
		emptyFormdata([],'form#form_year_id');
		$('.ui.modal#modal_year_id').modal({
			autofocus:false,
			onApprove:function($element){
				if($("form#form_year_id").valid()) {
	  				save_year_id('add');
					return true;
				}else{
					return false;
				}
			}
		}).modal('show');
	});

	$('#edit_jadual').click(function(){
		emptyFormdata([],'form#form_year_id');
		year_id_sel_data.data.forEach(function(e,i){
			if(e.idno == $("#sel_year_id").val()){
				$("form#form_year_id [name='idno']").val(e.idno);
				$("form#form_year_id [name='desc']").val(e.desc);
				$("form#form_year_id [name='effdate']").val(e.effdate);
			}
		});
		$('.ui.modal#modal_year_id').modal({
			autofocus:false,
			onApprove:function($element){
				if($("form#form_year_id").valid()) {
	  				save_year_id('edit');
					return true;
				}else{
					return false;
				}
			}
		}).modal('show');
	});
	
	$('#delete_jadual').click(function(){
		if (confirm("Are you sure to delete?") == true) {
		  save_year_id('del');
		}
	});

	$('#sel_jad_btn').click(function(){
		if($('#sel_year_id').val() == ''){
			alert('Please pick a jadual')
		}else{
			init_jadual_setting();
			$('#rph_select').show();
			$('#div_sel_year_id').dimmer('show');
		}
	});
	$('#div_sel_year_id').dimmer({
    closable: false
  });

	$('#resel_jad_btn').click(function(){
		$('#div_sel_year_id').dimmer('hide');
		$('#rph_select').hide();
	});

  
});

var istablet = $(window).width() <= 768;
var oper='add';
function save_subjek(hari){
	var param = {
		action: 'save_jadual',
		hari: hari,
		year_id: $("#sel_year_id").val(),
		oper:oper
	}

	var tambah_subjek = $("form#tambah_subjek").serializeArray();

	$.post( "./rph?"+$.param(param),$.param(tambah_subjek), function( data ){
		
	},'json').fail(function(data) {

  }).done(function(data){
		init_jadual_setting();
  });
}

function save_year_id(oper){
	var param = {
		action: 'save_year_id',
		oper:oper
	}
	var year_id = $("form#form_year_id").serializeArray();

	if(oper == 'del'){
		param.idno = $("#sel_year_id").val();
		param._token = $("#_token").val();
		year_id=null;
	}


	$.post( "./rph?"+$.param(param),$.param(year_id), function( data ){
		
	},'json').fail(function(data) {
  }).done(function(data){
  	if($('#rph_select').is(":visible")){
  		$('#resel_jad_btn').click();
  	}
  	year_id_sel_init();
  });

}

var jadual = [];
function init_jadual_setting(){
	kosongkan_jadual();
	var param = {
		action: 'init_jadual_setting',
		year_id: $('#sel_year_id').val()
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
	if(istablet){
		$('div.swiper-wrapper').html('');
	}else{
		$('div.haridiv').html('');
	}
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
		if(istablet){
			$('div#'+e.hari+' div.swiper-wrapper').append(`
				<div class="swiper-slide">
		            <div class="ui card">
		             <div class="content">
		              <div class="header"> `+my_i+`) `+e.subjek+`
		                <i data-id="`+i+`" class="del_ right floated trash icon red"></i>
		                <i data-id="`+i+`" class="edit_ right floated link pen icon blue"></i>
		              </div>
		              <div class="description">
		                KELAS : `+e.kelas+`<br>
		                MASA DARI : `+masa_dari+` – `+masa_hingga+` <br>
		              </div>
		             </div>
		            </div>
		        </div>
			`);
		}else{
			$('div#'+e.hari).append(`
          <div class="ui card">
           <div class="content">
            <div class="header"> `+my_i+`) `+e.subjek+`
              <i data-id="`+i+`" class="del_ right floated trash icon red"></i>
              <i data-id="`+i+`" class="edit_ right floated link pen icon blue"></i>
            </div>
            <div class="description">
              KELAS : `+e.kelas+`<br>
              MASA DARI : `+masa_dari+` – `+masa_hingga+` <br>
            </div>
           </div>
          </div>
			`);
		}
		
	});

	$('span#1_cnt').text(cnt_1);
	$('span#2_cnt').text(cnt_2);
	$('span#3_cnt').text(cnt_3);
	$('span#4_cnt').text(cnt_4);
	$('span#5_cnt').text(cnt_5);

	$('i.edit_').on('click',edit_jadual);
	$('i.del_').on('click',delete_jadual);
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
			init_jadual_setting();
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
	$('.ui.modal#modal_jadual').modal({
		autofocus:false,
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

var year_id_sel_data = [];
function year_id_sel_init(){
	let datenow = moment();
	$('#sel_year_id').html(`<option value="">Pilih Jadual</option>`);
  

  var param = {
		action: 'year_id_sel_init'
	}

	$.get("./rph_table?"+$.param(param), function(data) {

	},'json').done(function(data) {
		year_id_sel_data = data;
		let lastdate = null;
		let idtopick = null;
		data.data.forEach(function(e,i){
	  	let currdate = moment(e.effdate);
	  	if(currdate.isSameOrBefore() && lastdate==null){
	  		lastdate = currdate;
	  		idtopick = e.idno;
	  	}else if(currdate.isSameOrBefore() && lastdate!=null){
	  		if(currdate.isAfter(lastdate)){
	  			lastdate = currdate;
	  			idtopick = e.idno;
	  		}
	  	}
	  	$("#sel_year_id").append(`<option value="`+e.idno+`">`+e.desc+`</option>`);
	  });
		$("#sel_year_id").val(idtopick);
  }).fail(function(data){
      alert('error');
  });
}
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

  $('select#sel_weeks').change(function(){
		let id = $(this).val();
		let week = get_weeks_data[id];

		$('#sel_weeks_id').val(week.key);
		$('#sel_weeks_p').text('Week : '+week.week);
	});

  $('#sel_tobtm').click(function(){
  	if($('#sel_weeks').val() == ' '){
  		alert('Please Select Week');
  	}else{
	  	$('select#sel_weeks,#sel_year_id').parent().addClass('disabled');
	  	$('#sel_tobtm').hide();
			$('#rph_select,#sel_totop,#sel_buts').show();
			init_jadual();
  	}
	});

	$('#sel_totop').click(function(){
  	$('select#sel_weeks,#sel_year_id').parent().removeClass('disabled');
  	$('#sel_tobtm').show();
		$('#rph_select,#sel_totop,#sel_buts').hide();
	});

	$('#sel_print').click(function(){
		window.open("./rph_pdf?minggu="+$('#sel_weeks_id').val()+"&year_id="+$('#sel_year_id').val());
	});

	$('#sel_preview').click(function(){
		window.open("./rph_prev?minggu="+$('#sel_weeks_id').val()+"&year_id="+$('#sel_year_id').val());
	});

	$('#sel_year_id').change(function(){
		$('#year_id').val($(this).val());
	});

	$("form#tambah_rph").validate({
		ignore: ['search'],
		debug: true,
  	onfocusout: false,
  	invalidHandler: function(event, validator) {
  		$(validator.errorList[0].element).focus();
  	},
  	errorPlacement: function(error, element) {
	    if (element.attr("name") == "topik_utama" || element.attr("name") == "sub_topik" || element.attr("name") == "objektif" ) {
	      error.insertAfter(element.parent());
	    } else {
	      error.insertAfter(element);
	    }
	  }
	});
});

function save_rph(oper){
	var param = {
		action: 'save_rph',
		oper:oper
	}

	var tambah_rph = $("form#tambah_rph").serializeArray();

	tambah_rph = tambah_rph.concat(
        $('form#tambah_rph input[type=checkbox]:checked').map(
        function() {
            return {"name": this.name, "value": 1}
        }).get()
	);

	$.post( "./rph?"+$.param(param),$.param(tambah_rph), function( data ){
		
	},'json').fail(function(data) {

  }).done(function(data){
  	$('.ui.modal').modal('hide');
		init_jadual();
  });
}

var istablet = $(window).width() <= 768;
var jadual = [];
function init_jadual(){
	kosongkan_jadual();
	var param = {
		action: 'init_jadual',
		minggu: $('#sel_weeks_id').val(),
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
	var cnt_1_d = 0;var cnt_2_d = 0;var cnt_3_d = 0;var cnt_4_d = 0;var cnt_5_d = 0;
	jadual.forEach(function(e,i){
		let date = car_date(e.hari);
		let masa_dari = moment(e.masa_dari, 'HH:mm:ss').format('hh:mm A');
		let masa_hingga = moment(e.masa_hingga, 'HH:mm:ss').format('hh:mm A');
		let my_i = 0;
		let oper_ = 'add';let title_='<i class="add icon"></i> Add RPH';
		let icon_='<i class="exclamation circle icon mytick2"></i>';let warna='blue_';
		if(e.idno!=null){
			oper_='edit';title_='<i class="pen icon"></i> Edit RPH';icon_=`<i class="check circle outline icon mytick"></i>`;warna='green_';
		}

		switch(e.hari){
			case 'ISNIN': cnt_1++; my_i = my_i+cnt_1; if(e.idno!=null)cnt_1_d++; break;
			case 'SELASA':  cnt_2++; my_i = my_i+cnt_2; if(e.idno!=null)cnt_2_d++; break;
			case 'RABU':  cnt_3++; my_i = my_i+cnt_3; if(e.idno!=null)cnt_3_d++; break;
			case 'KHAMIS':  cnt_4++; my_i = my_i+cnt_4; if(e.idno!=null)cnt_4_d++; break;
			case 'JUMAAT':  cnt_5++; my_i = my_i+cnt_5; if(e.idno!=null)cnt_5_d++; break;
		}
		if(istablet){
			$('div#'+e.hari+' div.swiper-wrapper').append(`
				<div class="swiper-slide">
	          <div class="ui raised card `+warna+`">
	           <div class="content mycard">
	           `+icon_+`
	            <div class="header"> `+my_i+`) `+e.subjek+`
	            </div>
	            <div class="description">
	              KELAS : `+e.kelas+`<br>
	              MASA DARI : `+masa_dari+` – `+masa_hingga+` <br>
	            </div>
	            <br>
		           <div class="ui blue basic button add_rph" data-id = `+i+` data-oper = `+oper_+` data-date = `+date+`>
						    `+title_+`
						   </div>
	           </div>
	          </div>
	      </div>
			`);
		}else{
			$('div#'+e.hari).append(`
          <div class="ui raised card `+warna+`">
           <div class="content mycard">
           `+icon_+`
            <div class="header"> `+my_i+`) `+e.subjek+`
            </div>
            <div class="description">
              KELAS : `+e.kelas+`<br>
              MASA DARI : `+masa_dari+` – `+masa_hingga+` <br>
            </div>
            <br>
	           <div class="ui blue basic button add_rph" data-id = `+i+` data-oper = `+oper_+` data-date = `+date+`>
					    `+title_+`
					   </div>
           </div>
          </div>
			`);
		}
		
	});

	$('span#1_cnt').text(cnt_1);
	span_msg_cnt(1,cnt_1,cnt_1_d);
	$('span#2_cnt').text(cnt_2);
	$('span#3_cnt').text(cnt_3);
	$('span#4_cnt').text(cnt_4);
	$('span#5_cnt').text(cnt_5);

	$('div.add_rph').on('click',add_rph);
}

function span_msg_cnt(no,cnt,cnt_d){
	$('#'+no+'_cnt_d').html('');
	if(cnt>0){
		if(cnt_d == cnt){
			$('#'+no+'_cnt_d').html(`<span class='greenspan'>All RPH task done!</span>`);
		}else if(cnt_d == 0){
			$('#'+no+'_cnt_d').html(`<span class='redspan'>All RPH task not yet done!</span>`);
		}else{
			$('#'+no+'_cnt_d').html(`<span class='redspan'>Only `+cnt_d+` from `+cnt+` RPH task done!</span>`);
		}
	}
}

function add_rph(event){
	init_form($(this).data('id'),$(this).data('date'));
	let oper = $(this).data('oper');
	$('.ui.modal').modal({
		autofocus:false,
		onApprove:function($element){
			if($("form#tambah_rph").valid()) {
  			save_rph(oper);
				return false;
			}else{
				return false;
			}
		},
		onHidden:function($element){
			$('form#tambah_rph .ui.dropdown').dropdown('restore defaults')
			$('form#tambah_rph .ui.checkbox').checkbox('set unchecked');
			emptyFormdata_div('form#tambah_rph');
		}
	}).modal('show');
}

var get_weeks_data = [];
function pop_weeks(idno){
	var param = {
		action: 'get_weeks',
		idno:idno
	}

	$.get("./rph_table?"+$.param(param), function(data) {

	},'json').done(function(data) {
		get_weeks_data = data;
		$('select#sel_weeks').html('<option value=" ">Select Week</option>');
		data.forEach(function(e,i){
	  	if(moment().isBetween(e.datefr, e.dateto, null, '[]')){
				$('select#sel_weeks').append(`<option value="`+i+`" selected >`+e.key+` &nbsp;(`+e.week+`) </option>`);
	  		$('#sel_weeks_id').val(e.key);
	  	}else{
				$('select#sel_weeks').append(`<option value="`+i+`">`+e.key+` &nbsp;(`+e.week+`) </option>`);
	  	}
		});

		// let lastdate = null;
		// let idtopick = null;
		// data.forEach(function(e,i){
	  	
	  // 	if(moment().isBetween(e.datefr, e.dateto, null, '[]')){
	  // 		idtopick = key;
	  // 	}

	  // 	$("#sel_year_id").append(`<option value="`+e.idno+`">`+e.desc+`</option>`);
	  // });
		// $("#sel_year_id").val(idtopick);
  }).fail(function(data){
      alert('error');
  });
	
}

function init_form(id,date){
	let data = jadual[id];
	let entries = Object.entries(data);
	init_topik_utk_subjek(entries[1][1]);

	entries.forEach(function(e,i){
		if($("form#tambah_rph [name='"+e[0]+"']").prop('type') == 'checkbox' && e[1] == '1'){
			$("form#tambah_rph [name='"+e[0]+"']").parent().checkbox('check');
		}else if(e[0] == 'sub_topik' || e[0] == 'objektif' || e[0] == 'topik_utama' ){
			$("form#tambah_rph [name='"+e[0]+"']").parent().dropdown('set selected',e[1]);
		}else{
			$("form#tambah_rph [name='"+e[0]+"']").val(e[1]);
		}
	});
	$("form#tambah_rph [name='minggu']").val($('#sel_weeks_id').val());
	$("form#tambah_rph [name='date']").val(date);

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
		$("#year_id").val(idtopick);
		pop_weeks(idtopick);
  }).fail(function(data){
      alert('error');
  });
}

function car_date(hari){
	let datefr = get_weeks_data[$('select#sel_weeks').val()].datefr;
	switch(hari){
		case 'ISNIN': return moment(datefr).format("YYYY-MM-DD"); break;
		case 'SELASA':  return moment(datefr).add(1,'days').format("YYYY-MM-DD"); break;
		case 'RABU':  return moment(datefr).add(2,'days').format("YYYY-MM-DD"); break;
		case 'KHAMIS':  return moment(datefr).add(3,'days').format("YYYY-MM-DD"); break;
		case 'JUMAAT':  return moment(datefr).add(4,'days').format("YYYY-MM-DD"); break;
	}
}

function init_topik_utk_subjek(subjek_code){
	$('#topik_utama_dd').html('');
	$('#sub_topik_dd').html('');
	$('#objektif_dd').html('');
	sub_detail_utama.forEach(function(e,i){
		if(e.subjekcode == subjek_code){
			$('#topik_utama_dd').append(`<div class="item" data-value="`+e.idno+`">`+e.desc+`</div>`);
		}
	});
	sub_detail_subtopik.forEach(function(e,i){
		if(e.subjekcode == subjek_code){
			$('#sub_topik_dd').append(`<div class="item" data-value="`+e.idno+`">`+e.desc+`</div>`);
		}
	});
	sub_detail_objektif.forEach(function(e,i){
		if(e.subjekcode == subjek_code){
			$('#objektif_dd').append(`<div class="item" data-value="`+e.idno+`">`+e.desc+`</div>`);
		}
	});
}
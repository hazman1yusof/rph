@extends('layouts.main')

@section('title', 'RPH')

@section('style')
    .uppercase {
      text-transform: uppercase;
    }
    .ui.card {
      width: 90%;
    }
    .swiper-slide{
      padding: 5px;
    }
    .kelas_cnt{
      color: grey;
      padding-left: 10px;
    }
@endsection

@section('header')
<script>
    var weeks = [
            {key:'none', week:'none'},
            @foreach ($weeks as $week)
                {key:'{{$week->key}}', week:'{{$week->week}}'},
            @endforeach
        ];
    
</script>
@endsection

@section('content')

<h4>RPH</h4>

<form class="ui form" id="rph_year_week">
 <div class="ui inverted dimmer"></div>
  <div class="field">
    <label>Select Year</label>
    <div class="ui calendar" id="sel_year">
      <div class="ui input left icon">
        <i class="calendar icon"></i>
        <input type="text" placeholder="Date" value="{{$year}}" required>
      </div>
    </div>
  </div>

  <div class="field">
    <label>Select weeks in Year</label>
    <select class="ui long dropdown" id="sel_weeks" required>
    </select>
  </div>

 <p><b><span id="sel_weeks_p"></span></b></p>
 <button type="button" class="fluid ui button green" id="sel_tobtm">Select</button>
 <button type="button" class="fluid ui button red" id="sel_totop" style="display:none;">Re - Select</button>
</form>

<div class="row" id="rph_select" style="display:none;">
 <div class="ui inverted dimmer"></div>
    <div class="ui red segments">
      <div class="ui segment header">
        Isnin<span class="kelas_cnt"><span id="1_cnt"></span> Kelas</span>
      </div>
      <div class="ui secondary segment" id="ISNIN">
        <div class="swiper">
          <div class="swiper-wrapper">
          </div>
        </div>
      </div>
    </div>

    <div class="ui red segments">
      <div class="ui segment header">
        Selasa<span class="kelas_cnt"><span id="2_cnt"></span> Kelas</span>
      </div>
      <div class="ui secondary segment" id="SELASA">
        <div class="swiper">
          <div class="swiper-wrapper">
          </div>
        </div>
      </div>
    </div>

    <div class="ui red segments">
      <div class="ui segment header">
        Rabu<span class="kelas_cnt"><span id="3_cnt"></span> Kelas</span>
      </div>
      <div class="ui secondary segment" id="RABU">
        <div class="swiper">
          <div class="swiper-wrapper">
          </div>
        </div>
      </div>
    </div>

    <div class="ui red segments">
      <div class="ui segment header">
        Khamis<span class="kelas_cnt"><span id="4_cnt"></span> Kelas</span>
      </div>
      <div class="ui secondary segment" id="KHAMIS">
        <div class="swiper">
          <div class="swiper-wrapper">
          </div>
        </div>
      </div>
    </div>

    <div class="ui red segments">
      <div class="ui segment header">
        Jumaat<span class="kelas_cnt"><span id="5_cnt"></span> Kelas</span>
      </div>
      <div class="ui secondary segment" id="JUMAAT">
        <div class="swiper">
          <div class="swiper-wrapper">
          </div>
        </div>
      </div>
    </div>
</div>

<div class="ui fullscreen modal">
  <i class="close icon"></i>
  <div class="header">
    RPH Menu
  </div>
  <div class="scrolling content">
    <form class="ui form" id="tambah_subjek">
      <input id="_token" name="_token" value="{{ csrf_token() }}" type="hidden">
      <input type="hidden" name="idno">
      <div class="field">
        <label>SUBJEK</label>
        <input type="text" name="subjek" id="subjek" class="uppercase" readonly>
      </div>
      <div class="field">
        <label>KELAS</label>
        <input type="text" name="kelas" id="kelas" class="uppercase" readonly>
      </div>
      <div class="field">
        <label>HARI</label>
        <input type="text" name="hari" id="hari" readonly>
      </div>
      <div class="field">
        <label>MASA DARI</label>
        <input type="time" name="masa_dari" id="masa_dari" readonly>
      </div>
      <div class="field">
        <label>MASA HINGGA</label>
        <input type="time" name="masa_hingga" id="masa_hingga" readonly>
      </div>
      <div class="field">
        <label>TOPIK UTAMA</label>
        <input type="time" name="masa_hingga" id="topik_utama" required>
      </div>
      <div class="field">
        <label>SUB TOPIK</label>
        <input type="time" name="masa_hingga" id="sub_topik" required>
      </div>
      <div class="field">
        <label>OBJEKTIF PEMBELAJARAN / KRITERIA KEJAYAAN</label>
        <input type="time" name="objektif" id="objektif" required>
      </div>
      <div class="field">
        <label>AKTIVITI PEMBELAJARAN & PEMUDAHCARAAN</label>
        <input type="time" name="aktiviti" id="aktiviti" required>
      </div>
      <div class="ui red segments">
          <div class="ui segment header">
            ABM / BBM
          </div>
          <div class="ui secondary segment">
            <div class="inline fields">
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" class="hidden" name="abm_1" id="abm_1">
                      <label>Buku Teks</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" class="hidden" name="abm_2" id="abm_2">
                      <label>I agree to the Terms and Conditions</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" class="hidden" name="abm_3" id="abm_3">
                      <label>I agree to the Terms and Conditions</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" class="hidden" name="abm_4" id="abm_4">
                      <label>I agree to the Terms and Conditions</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" class="hidden" name="abm_5" id="abm_5">
                      <label>I agree to the Terms and Conditions</label>
                    </div>
                </div>
                <div class="field">
                    <input type="time" name="masa_hingga" id="masa_hingga">
                </div>
            </div>
          </div>
      </div>
      <div class="field">
        <label>ABM / BBM</label>
        <input type="time" name="masa_hingga" id="masa_hingga">
      </div>
      <div class="field">
        <label>ELEMEN MERENTAS KURIKULUM (EMK)</label>
        <input type="time" name="masa_hingga" id="masa_hingga">
      </div>
      <div class="field">
        <label>TAHAP PEMIKIRAN</label>
        <input type="time" name="masa_hingga" id="masa_hingga">
      </div>
      <div class="field">
        <label>PETA PEMIKIRAN I-THINK</label>
        <input type="time" name="masa_hingga" id="masa_hingga">
      </div>
      <div class="field">
        <label>PENILAIAN PDPC</label>
        <input type="time" name="masa_hingga" id="masa_hingga">
      </div>
      <div class="field">
        <label>REFLEKSI</label>
        <input type="time" name="masa_hingga" id="masa_hingga">
      </div>
    </form>
  </div>
  <div class="actions">
    <button class="ui deny button" id="cancel">
      Cancel
    </button>
    <button class="ui positive right labeled icon button" id="save">
      Save
      <i class="checkmark icon"></i>
    </button>
  </div>
</div>

@endsection

@section('css')
    <link href="https://cdn.datatables.net/v/se/dt-1.13.4/r-2.4.1/datatables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;500&family=Open+Sans:wght@300;700&family=Syncopate&display=swap" rel="stylesheet">

@endsection

@section('js')
    <script src="https://cdn.datatables.net/v/se/dt-1.13.4/r-2.4.1/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/ecmascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/printThis.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/rph.js') }}"></script>
@endsection



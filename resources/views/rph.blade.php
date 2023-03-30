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
    .mytick{
      position: absolute !important;
      font-size: 110px !important;
      right: -30px !important;
      top: -20px !important;
      overflow: visible !important;
      color: green !important;
      opacity: .5 !important;
    }
    .mytick2{
      position: absolute !important;
      font-size: 110px !important;
      right: -30px !important;
      top: -20px !important;
      overflow: visible !important;
      color: #ff7b7b !important;
      opacity: .5 !important;
    }
    .mycard{
      position: relative;
      overflow: hidden;
    }
    .green_{
      background: #e5ffe8 !important;
    }
    .blue_{
      background: #fffac0 !important;
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
    <label for=''>Select Year</label>
    <div class="ui calendar" id="sel_year">
      <div class="ui input left icon">
        <i class="calendar icon"></i>
        <input type="text" placeholder="Date" value="{{$year}}" required>
      </div>
    </div>
  </div>

  <div class="field">
    <label for=''>Select weeks in Year</label>
    <select class="ui long dropdown" id="sel_weeks" required>
    </select>
  </div>

 <p><b><span id="sel_weeks_p"></span></b></p>
 <button type="button" class="fluid ui button green" id="sel_tobtm">Select</button>
 <button type="button" class="fluid ui button red" id="sel_totop" style="display:none;">Re - Select</button>
 <button type="button" class="fluid ui button blue" id="sel_print" style="display:none;margin-top: 10px;">PDF</button>
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
    <form class="ui form" id="tambah_rph">
      <input id="_token" name="_token" value="{{ csrf_token() }}" type="hidden">
      <input type="hidden" name="idno" id="idno">
      <input type="hidden" name="sel_weeks_id" id="sel_weeks_id">


      <div class="ui segments">
          <div class="ui secondary segment header">
            UTAMA (TAK PERLU UBAH)
          </div>
          <div class="ui segment">
            <div class="two fields">
              <div class="field">
                <label for=''>SUBJEK</label>
                <input type="text" name="subjek" id="subjek" class="uppercase" readonly>
              </div>
              <div class="field">
                <label for=''>KELAS</label>
                <input type="text" name="kelas" id="kelas" class="uppercase" readonly>
              </div>
          </div>
          <div class="two fields">
              <div class="field">
                <label for=''>HARI</label>
                <input type="text" name="hari" id="hari" readonly>
              </div>
              <div class="field">
                <label for=''>MINGGU</label>
                <input type="text" name="minggu" id="minggu" readonly>
              </div>
          </div>
          <div class="two fields">
              <div class="field">
                <label for=''>MASA DARI</label>
                <input type="text" name="masa_dari" id="masa_dari" readonly>
              </div>
              <div class="field">
                <label for=''>MASA HINGGA</label>
                <input type="text" name="masa_hingga" id="masa_hingga" readonly>
              </div>
          </div>
          </div>
      </div>
      
      <div class="field">
        <label for=''>TOPIK UTAMA</label>
        <div class="ui icon input">
          <input type="text" name="topik_utama" id="topik_utama" required>
          <i class="inverted circular search link icon"></i>
        </div>
      </div>
      <div class="field">
        <label for=''>SUB TOPIK</label>
        <div class="ui icon input">
          <input type="text" name="sub_topik" id="sub_topik" required>
          <i class="inverted circular search link icon"></i>
        </div>
      </div>
      <div class="field">
        <label for=''>OBJEKTIF PEMBELAJARAN / KRITERIA KEJAYAAN</label>
        <div class="ui icon input">
          <input type="text" name="objektif" id="objektif" required>
          <i class="inverted circular search link icon"></i>
        </div>
      </div>
      <div class="field">
        <label for=''>AKTIVITI PEMBELAJARAN & PEMUDAHCARAAN</label>
        <textarea type="text" name="aktiviti" id="aktiviti" required></textarea>
      </div>
      <div class="ui segments">
          <div class="ui segment header">
            ABM / BBM
          </div>
          <div class="ui secondary segment">
            <div class="inline fields">
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="abm_1" id="abm_1">
                      <label for='abm_1'>Buku Teks</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="abm_2" id="abm_2">
                      <label for='abm_2'>Edaran / Lembaran Kerja</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="abm_3" id="abm_3">
                      <label for='abm_3'>Modul Subjek</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="abm_4" id="abm_4">
                      <label for='abm_4'>Buku Rujukan / Kerja</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="abm_5" id="abm_5">
                      <label for='abm_5'>Model/ Gambar / Carta</label>
                    </div>
                </div>
                <div class="field">
                    <input type="text" name="abm_lain2" id="abm_lain2" placeholder="lain-lain">
                </div>
            </div>
          </div>
      </div>

      <div class="ui segments">
          <div class="ui segment header">
            ELEMEN MERENTAS KURIKULUM (EMK)
          </div>
          <div class="ui secondary segment">
            <div class="inline fields">
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="emk_1" id="emk_1">
                      <label for='emk_1'>Manhaj ASWJ</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="emk_2" id="emk_2">
                      <label for='emk_2'>Patriotisme</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="emk_3" id="emk_3">
                      <label for='emk_3'>STEM</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="emk_4" id="emk_4">
                      <label for='emk_4'>Bahasa</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="emk_5" id="emk_5">
                      <label for='emk_5'>Keusahawanan</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="emk_6" id="emk_6">
                      <label for='emk_6'>Kelestarian Alam Sekitar</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="emk_7" id="emk_7">
                      <label for='emk_7'>Nilai Murni</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="emk_8" id="emk_8">
                      <label for='emk_8'>TMK ( ICT )</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="emk_9" id="emk_9">
                      <label for='emk_9'>Kelestarian Global</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="emk_10" id="emk_10">
                      <label for='emk_10'>Sains & Teknologi</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="emk_11" id="emk_11">
                      <label for='emk_11'>Kreativiti & Inovasi</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="emk_12" id="emk_12">
                      <label for='emk_12'>Pendidikan Kewangan</label>
                    </div>
                </div>
            </div>
          </div>
      </div>

      <div class="ui segments">
          <div class="ui segment header">
            TAHAP PEMIKIRAN
          </div>
          <div class="ui secondary segment">
            <div class="inline fields">
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="tpn_1" id="tpn_1">
                      <label for='tpn_1'>Mengingat</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="tpn_2" id="tpn_2">
                      <label for='tpn_2'>Mengaplikasi</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="tpn_3" id="tpn_3">
                      <label for='tpn_3'>Menilai</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="tpn_4" id="tpn_4">
                      <label for='tpn_4'>Memahami</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="tpn_5" id="tpn_5">
                      <label for='tpn_5'>Menganalisis</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="tpn_6" id="tpn_6">
                      <label for='tpn_6'>Mencipta</label>
                    </div>
                </div>
            </div>
          </div>
      </div>

      <div class="ui segments">
          <div class="ui segment header">
            PETA PEMIKIRAN I-THINK
          </div>
          <div class="ui secondary segment">
            <div class="inline fields">
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="ppi_1" id="ppi_1">
                      <label for='ppi_1'>Peta Bulatan</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="ppi_2" id="ppi_2">
                      <label for='ppi_2'>Peta Titi</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="ppi_3" id="ppi_3">
                      <label for='ppi_3'>Peta Alir</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="ppi_4" id="ppi_4">
                      <label for='ppi_4'>Peta Dakap</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="ppi_5" id="ppi_5">
                      <label for='ppi_5'>Peta Buih</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="ppi_6" id="ppi_6">
                      <label for='ppi_6'>Peta Pelbagai Alir</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="ppi_7" id="ppi_7">
                      <label for='ppi_7'>Peta Pokok</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="ppi_8" id="ppi_8">
                      <label for='ppi_8'>Peta Buih Berganda</label>
                    </div>
                </div>
            </div>
          </div>
      </div>

      <div class="ui segments">
          <div class="ui segment header">
            PENILAIAN PDPC
          </div>
          <div class="ui secondary segment">
            <div class="inline fields">
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="pdpc_1" id="pdpc_1">
                      <label for='pdpc_1'>Lembaran Kerja</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="pdpc_2" id="pdpc_2">
                      <label for='pdpc_2'>Kuiz</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="pdpc_3" id="pdpc_3">
                      <label for='pdpc_3'>Tugasan</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="pdpc_4" id="pdpc_4">
                      <label for='pdpc_4'>Hasil Kerja Pelajar</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="pdpc_5" id="pdpc_5">
                      <label for='pdpc_5'>Lisan</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="pdpc_6" id="pdpc_6">
                      <label for='pdpc_6'>Pembentangan</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="pdpc_7" id="pdpc_7">
                      <label for='pdpc_7'>Pemerhatian</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="pdpc_8" id="pdpc_8">
                      <label for='pdpc_8'>Drama</label>
                    </div>
                </div>
                <div class="field">
                    <input type="text" name="pdpc_lain2" id="pdpc_lain2" placeholder="lain-lain">
                </div>
            </div>
          </div>
      </div>

      <div class="ui segments">
          <div class="ui segment header">
            REFLEKSI
          </div>
          <div class="ui secondary segment">
            Aktiviti pengajaran dan pembelajaran ditangguhkan kerana : <br>
            <div class="inline fields">
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="rlsi_1" id="rlsi_1">
                      <label for='rlsi_1'>Mesyuarat / Kursus</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="rlsi_2" id="rlsi_2">
                      <label for='rlsi_2'>Aktiviti Luar</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="rlsi_3" id="rlsi_3">
                      <label for='rlsi_3'>Cuti Rehat / Cuti Sakit</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="rlsi_4" id="rlsi_4">
                      <label for='rlsi_4'>Program Sekolah</label>
                    </div>
                </div>
            </div>
          </div>
      </div>
    </form>
  </div>
  <div class="actions">
    <button class="ui negative button" id="cancel" type="button">
      Cancel
    </button>
    <button class="ui right positive labeled icon button" id="save" type="button">
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



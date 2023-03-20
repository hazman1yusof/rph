@extends('layouts.main')

@section('title', 'Setup Jadual')

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

@section('content')

<h4>Setup Jadual</h4>

<div class="ui red segments">
  <div class="ui segment header">
    Isnin<span class="kelas_cnt"><span id="1_cnt"></span> Kelas</span>
    <i id="add_1" data-hari="isnin" class="right floated link plus icon blue" data-content="Tambah " data-variation="small"></i>
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
    <i id="add_2" data-hari="selasa" class="right floated link plus icon blue" data-content="Tambah " data-variation="small"></i>
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
    <i id="add_3" data-hari="rabu" class="right floated link plus icon blue" data-content="Tambah " data-variation="small"></i>
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
    <i id="add_4" data-hari="khamis" class="right floated link plus icon blue" data-content="Tambah " data-variation="small"></i>
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
    <i id="add_5" data-hari="jumaat" class="right floated link plus icon blue" data-content="Tambah " data-variation="small"></i>
  </div>
  <div class="ui secondary segment" id="JUMAAT">
    <div class="swiper">
      <div class="swiper-wrapper">
      </div>
    </div>
  </div>
</div>

<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Jadual Subjek
  </div>
  <div class="content">
    <form class="ui form" id="tambah_subjek">
      <input id="_token" name="_token" value="{{ csrf_token() }}" type="hidden">
      <input type="hidden" name="idno">
      <div class="field">
        <label>Subjek</label>
        <input type="text" name="subjek" id="subjek" class="uppercase" required>
      </div>
      <div class="field">
        <label>Kelas</label>
        <input type="text" name="kelas" id="kelas" class="uppercase" required>
      </div>
      <div class="field">
        <label>Masa Dari</label>
        <input type="time" name="masa_dari" id="masa_dari" required>
      </div>
      <div class="field">
        <label>Masa Hingga</label>
        <input type="time" name="masa_hingga" id="masa_hingga" required>
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
    <script type="text/javascript" src="{{ asset('js/setup_jadual.js') }}"></script>
@endsection



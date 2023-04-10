@extends('layouts.pdflayout')

@section('title','PDF')

@section('style')
.container{
    margin:5%;
}
.title{
    text-align:center;
    margin-top:0px;
    margin-bottom:10px;
}
.jadual_tbl{
    border: 1px solid black;
    border-collapse: collapse;
    width: 100%;
}
.rph_tbl{
    border: 1px solid black;
    border-collapse: collapse;
    width: 100%;
}
.jadual_tbl th, .jadual_tbl td{
    border: 1px solid black;
    padding: 8px;
}
.rph_tbl th, .rph_tbl td{
    border: 1px solid black;
    padding: 10px;
}
.table_title td{
    font-family: sans-serif;
    font-weight: 400;
}
.jadual_tbl td{
    font-family: sans-serif;
    font-weight: 400;
    text-align: center;
}
.rph_tbl td{
    font-family: sans-serif;
    font-weight: 400;
    text-align: center;
}
.page-break {
    page-break-after: always;
}
.left{
    text-align: left !important;
    padding-left: 8px;
}
td.noborder, th.noborder{
    border: none;
    text-align: left;
    vertical-align: baseline;
    padding:0px 0px 0px 10px;
}
.th_{
    background: #ffeac5;
}
.cb_tbl{
    width: 100%;
    table-layout: fixed;
}
.theader{
    background:darkorange;
    color:white;
}
input[type='checkbox']{
    display:inline;
}
.warna0{
    background: #cee8ff;
}

.warna1{
    background: #ffdada;
}

.warna2{
    background: #bdffc8;
}

.warna3{
    background: #aeffff;
}

.warna4{
    background: #ffffb3;
}

.warna5{
    background: #f4d1ff;
}

.warna6{
    background: #ffd3a6;
}

.warna7{
    background: #ff95df;
}

@endsection

@section('body')
    <div class="container">
        <h2 class="title">RINGKASAN SERAHAN DAN PENILAIAN KENDIRI</h2>
        <h2 class="title">RANCANGAN PENGAJARAN HARIAN ( RPH )</h2>
        <br><br>
        <table class="table_title">
            <tr>
               <td style="padding-right: 30px;">NAMA</td>
               <td>: MARDHIAH BINTI AHMAD TAJUDDIN</td> 
            </tr>
            <tr>
               <td style="padding-right: 30px;">MINGGU</td>
               <td>: KE - <span>{{$minggu_ke}}</span></td> 
            </tr>
        </table>
        <br>

        <table class="jadual_tbl">
            <tr class="theader">
                <th width="3%">BIL</th>
                <th width="18%">SUBJEK</th>
                <th width="8%">KELAS</th>
                <th width="20%">MASA</th>
                <th>CATATAN</th>
            </tr>
            @if (count($jad_1) > 0)
            <tr>
                <th colspan="5" class="left th_">ISNIN {{$jad_1[0]->date2}}</th>
            </tr>
            @foreach ($jad_1 as $jad)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$jad->subjek}}</td>
                <td class="{{$jad->warna}}">{{$jad->kelas}}</td>
                <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$jad->masa_dari)->format('h:i A')}} – {{\Carbon\Carbon::createFromFormat('H:i:s',$jad->masa_hingga)->format('h:i A')}}</td>
                <td class="left">{{$jad->catatan}}</td>
            </tr>
            @endforeach
            @endif
            @if (count($jad_2) > 0)
            <tr>
                <th colspan="5" class="left th_">SELASA {{$jad_2[0]->date2}}</th>
            </tr>
            @foreach ($jad_2 as $jad)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$jad->subjek}}</td>
                <td class="{{$jad->warna}}">{{$jad->kelas}}</td>
                <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$jad->masa_dari)->format('h:i A')}} – {{\Carbon\Carbon::createFromFormat('H:i:s',$jad->masa_hingga)->format('h:i A')}}</td>
                <td class="left"></td>
            </tr>
            @endforeach
            @endif
            @if (count($jad_3) > 0)
            <tr>
                <th colspan="5" class="left th_">RABU {{$jad_3[0]->date2}}</th>
            </tr>
            @foreach ($jad_3 as $jad)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$jad->subjek}}</td>
                <td class="{{$jad->warna}}">{{$jad->kelas}}</td>
                <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$jad->masa_dari)->format('h:i A')}} – {{\Carbon\Carbon::createFromFormat('H:i:s',$jad->masa_hingga)->format('h:i A')}}</td>
                <td class="left"></td>
            </tr>
            @endforeach
            @endif
            @if (count($jad_4) > 0)
            <tr>
                <th colspan="5" class="left th_">KHAMIS {{$jad_4[0]->date2}}</th>
            </tr>
            @foreach ($jad_4 as $jad)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$jad->subjek}}</td>
                <td class="{{$jad->warna}}">{{$jad->kelas}}</td>
                <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$jad->masa_dari)->format('h:i A')}} – {{\Carbon\Carbon::createFromFormat('H:i:s',$jad->masa_hingga)->format('h:i A')}}</td>
                <td class="left"></td>
            </tr>
            @endforeach
            @endif
            @if (count($jad_5) > 0)
            <tr>
                <th colspan="5" class="left th_">JUMAAT {{$jad_5[0]->date2}}</th>
            </tr>
            @foreach ($jad_5 as $jad)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$jad->subjek}}</td>
                <td class="{{$jad->warna}}">{{$jad->kelas}}</td>
                <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$jad->masa_dari)->format('h:i A')}} – {{\Carbon\Carbon::createFromFormat('H:i:s',$jad->masa_hingga)->format('h:i A')}}</td>
                <td class="left"></td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
    <div class="page-break"></div>

    @foreach ($rphs as $rph)
        <div class="container">
            <table class="rph_tbl">
                <tr><th class="{{$rph->warna}}" colspan="6">RANCANGAN PENGAJARAN HARIAN ( RPH )</th></tr>
                <tr>
                    <th class="{{$rph->warna}}" width="20%">MATA PELAJARAN</th>
                    <td>{{$rph->subjek}}</td>
                    <th width="10%">KELAS</th>
                    <td width="10%">{{$rph->kelas}}</td>
                    <th width="10%">MINGGU</th>
                    <td width="10%">KE - <span>{{$minggu_ke}}</span></td>
                </tr>
                <tr>
                    <th class="{{$rph->warna}} left" width="20%">HARI/TARIKH</th>
                    <td>{{$rph->date2}}</td>
                    <th>MASA</th>
                    <td colspan="3">{{\Carbon\Carbon::createFromFormat('H:i:s',$rph->masa_dari)->format('h:i A')}} – {{\Carbon\Carbon::createFromFormat('H:i:s',$rph->masa_hingga)->format('h:i A')}}</td>
                </tr>
                <tr>
                    <th class="{{$rph->warna}} left" width="20%">TOPIK UTAMA </th>
                    <th colspan="5" class="left">{{$rph->topik_utama}}</th>
                </tr>
                <tr>
                    <th class="{{$rph->warna}} left" width="20%">SUB-TOPIK </th>
                    <th colspan="5" class="left">{{$rph->sub_topik}}</th>
                </tr>
                <tr>
                    <th class="{{$rph->warna}} left" width="20%">OBJEKTIF PEMBELAJARAN / KRITERIA KEJAYAAN </th>
                    <td class="left" colspan="5">
                        <b>Pada akhir pengajaran dan pembelajaran pelajar dapat :</b><br><br>
                        <table>
                            <tr><td class="noborder">{{$rph->objektif_id}}</td>
                                <td class="noborder">{{$rph->objektif}}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <th class="{{$rph->warna}} left" width="20%">AKTIVITI PEMBELAJARAN & PEMUDAHCARAAN </th>
                    <td class="left" colspan="5">
                        {!! nl2br(e($rph->aktiviti)) !!}
                        <!-- <ol>
                            <li>Guru membantu pelajar menyelesaikan modul soalan penyelesian masalah melibatkan ketaksamaan linear.</li>
                        </ol> -->
                    </td>
                </tr>
                <tr>
                    <th class="{{$rph->warna}} left" width="20%">ABM / BBM </th>
                    <td class="left" colspan="5" style="padding:0px;">
                        <table class="cb_tbl">
                            <tr>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->abm_1){{'checked'}}@endif />
                                    Buku Teks
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->abm_2){{'checked'}}@endif >
                                    Edaran / Lembaran Kerja
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->abm_3){{'checked'}}@endif >
                                    Modul Subjek
                                </td>
                            </tr>
                            <tr>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->abm_4){{'checked'}}@endif >
                                    Buku Rujukan / Kerja
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->abm_5){{'checked'}}@endif >
                                    Model/ Gambar / Carta
                                </td>
                                <td class="noborder">
                                    lain-lain : <span>{{$rph->abm_lain2}}</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <th class="{{$rph->warna}} left" width="20%">ELEMEN MERENTAS KURIKULUM (EMK) </th>
                    <td class="left" colspan="5" style="padding:0px;">
                        <table class="cb_tbl">
                            <tr>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->emk_1){{'checked'}}@endif />
                                    Manhaj ASWJ
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->emk_2){{'checked'}}@endif >
                                    Patriotisme
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->emk_3){{'checked'}}@endif >
                                    STEM
                                </td>
                            </tr>
                            <tr>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->emk_4){{'checked'}}@endif >
                                    Bahasa
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->emk_5){{'checked'}}@endif >
                                    Keusahawanan
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->emk_6){{'checked'}}@endif >
                                    Kelestarian Alam Sekitar
                                </td>
                            </tr>
                            <tr>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->emk_7){{'checked'}}@endif >
                                    Nilai Murni
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->emk_8){{'checked'}}@endif >
                                    TMK ( ICT )
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->emk_9){{'checked'}}@endif >
                                    Kelestarian Global
                                </td>
                            </tr>
                            <tr>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->emk_10){{'checked'}}@endif >
                                    Sains & Teknologi
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->emk_11){{'checked'}}@endif >
                                    Kreativiti & Inovasi
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->emk_12){{'checked'}}@endif >
                                    Pendidikan Kewangan
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <th class="{{$rph->warna}} left" width="20%">TAHAP PEMIKIRAN </th>
                    <td class="left" colspan="5" style="padding:0px;">
                        <table class="cb_tbl">
                            <tr>
                                <th class="noborder">KBAR</th>
                                <th class="noborder">KBAT</th>
                                <td class="noborder"></td>
                            <tr>
                            <tr>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->tpn_1){{'checked'}}@endif />
                                    Mengingat
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->tpn_2){{'checked'}}@endif >
                                    Mengaplikasi
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->tpn_3){{'checked'}}@endif >
                                    Menilai
                                </td>
                            </tr>
                            <tr>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->tpn_4){{'checked'}}@endif >
                                    Memahami
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->tpn_5){{'checked'}}@endif >
                                    Menganalisis
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->tpn_6){{'checked'}}@endif >
                                    Mencipta
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <th class="{{$rph->warna}} left" width="20%">PETA PEMIKIRAN I-THINK </th>
                    <td class="left" colspan="5" style="padding:0px;">
                        <table class="cb_tbl">
                            <tr>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->ppi_1){{'checked'}}@endif />
                                    Peta Bulatan
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->ppi_2){{'checked'}}@endif >
                                    Peta Titi
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->ppi_3){{'checked'}}@endif >
                                    Peta Alir
                                </td>
                            </tr>
                            <tr>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->ppi_4){{'checked'}}@endif >
                                    Peta Dakap
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->ppi_5){{'checked'}}@endif >
                                    Peta Buih
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->ppi_6){{'checked'}}@endif >
                                    Peta Pelbagai Alir
                                </td>
                            </tr>
                            <tr>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->ppi_7){{'checked'}}@endif >
                                    Peta Pokok
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->ppi_8){{'checked'}}@endif >
                                    Peta Buih Berganda
                                </td>
                                <td class="noborder">

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <th class="{{$rph->warna}} left" width="20%">PENILAIAN PDPC </th>
                    <td class="left" colspan="5" style="padding:0px;">
                        <table class="cb_tbl">
                            <tr>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->pdpc_1){{'checked'}}@endif />
                                    Lembaran Kerja
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->pdpc_2){{'checked'}}@endif >
                                    Kuiz
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->pdpc_3){{'checked'}}@endif >
                                    Tugasan 
                                </td>
                            </tr>
                            <tr>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->pdpc_4){{'checked'}}@endif >
                                    Hasil Kerja Pelajar
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->pdpc_5){{'checked'}}@endif >
                                    Lisan
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->pdpc_6){{'checked'}}@endif >
                                    Pembentangan
                                </td>
                            </tr>
                            <tr>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->pdpc_7){{'checked'}}@endif >
                                    Pemerhatian
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->pdpc_8){{'checked'}}@endif >
                                    Drama
                                </td>
                                <td class="noborder">
                                    lain-lain : <span>{{$rph->pdpc_lain2}}</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <th class="{{$rph->warna}} left" width="20%">PENILAIAN PDPC </th>
                    <td class="left" colspan="5" style="padding:10px;">
                        {{$rph->bilmg_1}} / {{$rph->bilmg_2}} orang murid dapat menguasai objektif pembelajaran dan diberi latihan pengukuhan
                        <br>
                        {{$rph->bilxmg_1}} / {{$rph->bilxmg_2}} orang pelajar tidak menguasai objektif pembelajaran dan diberi latihan pemulihan 
                        <br><br>
                        Aktiviti pengajaran dan pembelajaran ditangguhkan kerana :
                        <table class="cb_tbl">
                            <tr>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->rlsi_1){{'checked'}}@endif >
                                     Mesyuarat / Kursus
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->rlsi_2){{'checked'}}@endif >
                                    Aktiviti Luar 
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->rlsi_3){{'checked'}}@endif >
                                    Cuti Rehat / Cuti Sakit 
                                </td>
                                <td class="noborder">
                                    <input type="checkbox" @if($rph->rlsi_4){{'checked'}}@endif >
                                    Program Sekolah
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        @if($loop->remaining>0)
        <div class="page-break"></div>
        @endif
    @endforeach
@endsection
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

.jadual_tbl th, .jadual_tbl td{
    border: 1px solid black;
    padding: 4px;
}

.table_title td{
    font-family: sans-serif;
    font-weight: bold;
}

.left{
    text-align: left;
    padding-left: 8px;
}

.th_{
    background: #ffeac5;
}

.warna1{

}

.warna2{
    
}

.warna3{
    
}

.warna4{
    
}

.warna5{
    
}

.warna6{
    
}

.warna7{
    
}

.warna8{
    
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
               <td>: KE-33</td> 
            </tr>
        </table>
        <br>

        <table class="jadual_tbl">
            <tr>
                <th width="3%">BIL</th>
                <th width="18%">SUBJEK</th>
                <th width="8%">KELAS</th>
                <th width="20%">MASA</th>
                <th>CATATAN</th>
            </tr>
            <tr>
                <th colspan="5" class="left th_">ISNIN 07-Nov-22</th>
            </tr>
            <tr>
                <th>1</th>
                <th>MATEMATIK</th>
                <th>4A</th>
                <th>11.30 – 12.30 PM</th>
                <th class="left">KETAKSAMAAN LINEAR DALAM 2 PEMBOLEHUBAH</th>
            </tr>
            <tr>
                <th colspan="5" class="left th_">SELASA 08-Nov-22</th>
            </tr>
            <tr>
                <th >1</th>
                <th >MATEMATIK</th>
                <th >4A</th>
                <th >11.30 – 12.30 PM</th>
                <th class="left">KETAKSAMAAN LINEAR DALAM 2 PEMBOLEHUBAH</th>
            </tr>
            <tr>
                <th >1</th>
                <th >MATEMATIK</th>
                <th >4A</th>
                <th >11.30 – 12.30 PM</th>
                <th class="left">KETAKSAMAAN LINEAR DALAM 2 PEMBOLEHUBAH</th>
            </tr>
            <tr>
                <th >1</th>
                <th >MATEMATIK</th>
                <th >4A</th>
                <th >11.30 – 12.30 PM</th>
                <th class="left">KETAKSAMAAN LINEAR DALAM 2 PEMBOLEHUBAH</th>
            </tr>
            <tr>
                <th >1</th>
                <th >MATEMATIK</th>
                <th >4A</th>
                <th >11.30 – 12.30 PM</th>
                <th class="left">KETAKSAMAAN LINEAR DALAM 2 PEMBOLEHUBAH</th>
            </tr>
            <tr>
                <th colspan="5" class="left th_">RABU 09-Nov-22</th>
            </tr>
            <tr>
                <th >1</th>
                <th >MATEMATIK</th>
                <th >4A</th>
                <th >11.30 – 12.30 PM</th>
                <th class="left">KETAKSAMAAN LINEAR DALAM 2 PEMBOLEHUBAH</th>
            </tr>
            <tr>
                <th colspan="5" class="left th_">KHAMIS 10-Nov-22</th>
            </tr>
            <tr>
                <th >1</th>
                <th >MATEMATIK</th>
                <th >4A</th>
                <th >11.30 – 12.30 PM</th>
                <th class="left">KETAKSAMAAN LINEAR DALAM 2 PEMBOLEHUBAH</th>
            </tr>
            <tr>
                <th colspan="5" class="left th_">JUMAAT 11-Nov-22</th>
            </tr>
            <tr>
                <th >1</th>
                <th >MATEMATIK</th>
                <th >4A</th>
                <th >11.30 – 12.30 PM</th>
                <th class="left">KETAKSAMAAN LINEAR DALAM 2 PEMBOLEHUBAH</th>
            </tr>
        </table>
    </div>
@endsection
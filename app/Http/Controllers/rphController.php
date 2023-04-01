<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;
use DB;
use File;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Storage;
use Image;
use PDF;
use Carbon\Carbon;

class rphController extends Controller
{   

    public function __construct()
    {

    }

    public function table(Request $request){
        switch($request->action){
            case 'init_jadual':
                return $this->init_jadual($request);
                break;

            default:
                return 'error happen..';
        }
    }
    
    public function form(Request $request){
        switch($request->action){
            case 'save_jadual':
                return $this->save_jadual($request);
                break;

            case 'save_rph':
                return $this->save_rph($request);
                break;

            case 'save_year_id':
                return $this->save_year_id($request);
                break;

            default:
                return 'error happen..';
        }
    }

    public function show(Request $request){
        $year = date_create('today')->format('Y');
        $weeks = $this->getWeek();

        $UTAMA = DB::table('rph.subjek_detail')
                        ->where('subjek','MATEMATIK')
                        ->where('type','UTAMA')
                        ->get();

        $SUBTOPIK = DB::table('rph.subjek_detail')
                        ->where('subjek','MATEMATIK')
                        ->where('type','SUBTOPIK')
                        ->get();

        $OBJEKTIF = DB::table('rph.subjek_detail')
                        ->where('subjek','MATEMATIK')
                        ->where('type','OBJEKTIF')
                        ->get();

        return view('rph',compact('year','weeks','UTAMA','SUBTOPIK','OBJEKTIF'));
    }

    public function setup_jadual(Request $request){
        $jadual_ids = DB::table('rph.year_id')
                        ->get();

        return view('setup_jadual',compact('jadual_ids'));
    }

    public function save_jadual(Request $request){
        DB::beginTransaction();

        try {

            if($request->oper == 'add'){
                DB::table('rph.jadual')
                    ->insert([
                        'hari' => strtoupper($request->hari),
                        'subjek' => strtoupper($request->subjek),
                        'kelas' => strtoupper($request->kelas),
                        'masa_dari' => $request->masa_dari,
                        'masa_hingga' => $request->masa_hingga
                    ]);
            }else if($request->oper == 'edit'){
                DB::table('rph.jadual')
                    ->where('idno',$request->idno)
                    ->update([
                        'subjek' => strtoupper($request->subjek),
                        'kelas' => strtoupper($request->kelas),
                        'masa_dari' => $request->masa_dari,
                        'masa_hingga' => $request->masa_hingga
                    ]);
            }else if($request->oper == 'del'){
                DB::table('rph.jadual')
                    ->where('idno',$request->idno)
                    ->delete();
            }

            DB::commit();
            
            $responce = new stdClass();
            $responce->operation = 'SUCCESS';
            return json_encode($responce);

        } catch (\Exception $e) {
            DB::rollback();

            return response($e->getMessage(), 500);
        }
    }

    public function save_year_id(Request $request){
        DB::beginTransaction();

        try {
            if($request->oper == 'add'){
                DB::table('rph.year_id')
                    ->insert([
                        'effdate' => $request->effdate,
                        'desc' => $request->desc
                    ]);
            }else if($request->oper == 'edit'){
                DB::table('rph.year_id')
                    ->where('idno',$request->idno)
                    ->insert([
                        'effdate' => $request->effdate,
                        'desc' => $request->desc
                    ]);
            }else if($request->oper == 'del'){
                DB::table('rph.year_id')
                    ->where('idno',$request->idno)
                    ->delete();
            }

            DB::commit();
            
            $responce = new stdClass();
            $responce->operation = 'SUCCESS';
            return json_encode($responce);

        } catch (\Exception $e) {
            DB::rollback();

            return response($e->getMessage(), 500);
        }
    }

    public function save_rph(Request $request){
        DB::beginTransaction();

        try {

            $array_=[
                'subjek' => (!empty($request->subjek))?$request->subjek:NULL,
                'kelas' => (!empty($request->kelas))?$request->kelas:NULL,
                'hari' => (!empty($request->hari))?$request->hari:NULL,
                'minggu' => (!empty($request->minggu))?$request->minggu:NULL,
                'date' => $this->getdays_fromweek($request->minggu,$request->hari),
                'masa_dari' => (!empty($request->masa_dari))?$request->masa_dari:NULL,
                'masa_hingga' => (!empty($request->masa_hingga))?$request->masa_hingga:NULL,
                'topik_utama' => (!empty($request->topik_utama))?$request->topik_utama:NULL,
                'sub_topik' => (!empty($request->sub_topik))?$request->sub_topik:NULL,
                'objektif' => (!empty($request->objektif))?$request->objektif:NULL,
                'aktiviti' => (!empty($request->aktiviti))?$request->aktiviti:NULL,
                'abm_1' => (!empty($request->abm_1))?$request->abm_1:NULL,
                'abm_2' => (!empty($request->abm_2))?$request->abm_2:NULL,
                'abm_3' => (!empty($request->abm_3))?$request->abm_3:NULL,
                'abm_4' => (!empty($request->abm_4))?$request->abm_4:NULL,
                'abm_5' => (!empty($request->abm_5))?$request->abm_5:NULL,
                'abm_lain2' => (!empty($request->abm_lain2))?$request->abm_lain2:NULL,
                'emk_1' => (!empty($request->emk_1))?$request->emk_1:NULL,
                'emk_2' => (!empty($request->emk_2))?$request->emk_2:NULL,
                'emk_3' => (!empty($request->emk_3))?$request->emk_3:NULL,
                'emk_4' => (!empty($request->emk_4))?$request->emk_4:NULL,
                'emk_5' => (!empty($request->emk_5))?$request->emk_5:NULL,
                'emk_6' => (!empty($request->emk_6))?$request->emk_6:NULL,
                'emk_7' => (!empty($request->emk_7))?$request->emk_7:NULL,
                'emk_8' => (!empty($request->emk_8))?$request->emk_8:NULL,
                'emk_9' => (!empty($request->emk_9))?$request->emk_9:NULL,
                'emk_10' => (!empty($request->emk_10))?$request->emk_10:NULL,
                'emk_11' => (!empty($request->emk_11))?$request->emk_11:NULL,
                'emk_12' => (!empty($request->emk_12))?$request->emk_12:NULL,
                'tpn_1' => (!empty($request->tpn_1))?$request->tpn_1:NULL,
                'tpn_2' => (!empty($request->tpn_2))?$request->tpn_2:NULL,
                'tpn_3' => (!empty($request->tpn_3))?$request->tpn_3:NULL,
                'tpn_4' => (!empty($request->tpn_4))?$request->tpn_4:NULL,
                'tpn_5' => (!empty($request->tpn_5))?$request->tpn_5:NULL,
                'tpn_6' => (!empty($request->tpn_6))?$request->tpn_6:NULL,
                'ppi_1' => (!empty($request->ppi_1))?$request->ppi_1:NULL,
                'ppi_2' => (!empty($request->ppi_2))?$request->ppi_2:NULL,
                'ppi_3' => (!empty($request->ppi_3))?$request->ppi_3:NULL,
                'ppi_4' => (!empty($request->ppi_4))?$request->ppi_4:NULL,
                'ppi_5' => (!empty($request->ppi_5))?$request->ppi_5:NULL,
                'ppi_6' => (!empty($request->ppi_6))?$request->ppi_6:NULL,
                'ppi_7' => (!empty($request->ppi_7))?$request->ppi_7:NULL,
                'ppi_8' => (!empty($request->ppi_8))?$request->ppi_8:NULL,
                'pdpc_1' => (!empty($request->pdpc_1))?$request->pdpc_1:NULL,
                'pdpc_2' => (!empty($request->pdpc_2))?$request->pdpc_2:NULL,
                'pdpc_3' => (!empty($request->pdpc_3))?$request->pdpc_3:NULL,
                'pdpc_4' => (!empty($request->pdpc_4))?$request->pdpc_4:NULL,
                'pdpc_5' => (!empty($request->pdpc_5))?$request->pdpc_5:NULL,
                'pdpc_6' => (!empty($request->pdpc_6))?$request->pdpc_6:NULL,
                'pdpc_7' => (!empty($request->pdpc_7))?$request->pdpc_7:NULL,
                'pdpc_8' => (!empty($request->pdpc_8))?$request->pdpc_8:NULL,
                'pdpc_lain2' => (!empty($request->pdpc_lain2))?$request->pdpc_lain2:NULL,
                'rlsi_1' => (!empty($request->rlsi_1))?$request->rlsi_1:NULL,
                'rlsi_2' => (!empty($request->rlsi_2))?$request->rlsi_2:NULL,
                'rlsi_3' => (!empty($request->rlsi_3))?$request->rlsi_3:NULL,
                'rlsi_4' => (!empty($request->rlsi_4))?$request->rlsi_4:NULL
            ];

            if($request->oper == 'add'){
                DB::table('rph.rph_main')
                    ->insert($array_);
            }else if($request->oper == 'edit'){
                if(empty($request->idno)){
                    throw new \Exception('Error edit because of no idno', 500);
                }
                DB::table('rph.rph_main')
                    ->where('idno',$request->idno)
                    ->update($array_);
            }else if($request->oper == 'del'){
                
            }

            DB::commit();
            
            $responce = new stdClass();
            $responce->operation = 'SUCCESS';
            return json_encode($responce);

        } catch (\Exception $e) {
            DB::rollback();

            return response($e->getMessage(), 500);
        }
    }

    public function init_jadual(Request $request){

        $table = DB::table('rph.jadual')
                    ->select('jadual.hari','jadual.subjek','jadual.kelas','jadual.masa_dari','jadual.masa_hingga','rph_main.idno','rph_main.minggu','rph_main.topik_utama','rph_main.sub_topik','rph_main.objektif','rph_main.aktiviti','rph_main.abm_1','rph_main.abm_2','rph_main.abm_3','rph_main.abm_4','rph_main.abm_5','rph_main.abm_lain2','rph_main.emk_1','rph_main.emk_2','rph_main.emk_3','rph_main.emk_4','rph_main.emk_5','rph_main.emk_6','rph_main.emk_7','rph_main.emk_8','rph_main.emk_9','rph_main.emk_10','rph_main.emk_11','rph_main.emk_12','rph_main.tpn_1','rph_main.tpn_2','rph_main.tpn_3','rph_main.tpn_4','rph_main.tpn_5','rph_main.tpn_6','rph_main.ppi_1','rph_main.ppi_2','rph_main.ppi_3','rph_main.ppi_4','rph_main.ppi_5','rph_main.ppi_6','rph_main.ppi_7','rph_main.ppi_8','rph_main.pdpc_1','rph_main.pdpc_2','rph_main.pdpc_3','rph_main.pdpc_4','rph_main.pdpc_5','rph_main.pdpc_6','rph_main.pdpc_7','rph_main.pdpc_8','rph_main.pdpc_lain2','rph_main.rlsi_1','rph_main.rlsi_2','rph_main.rlsi_3','rph_main.rlsi_4')
                    ->leftJoin('rph.rph_main', function($join) use ($request){
                        $join = $join->on('rph_main.subjek', '=', 'jadual.subjek')
                                    ->on('rph_main.kelas', '=', 'jadual.kelas')
                                    ->on('rph_main.hari', '=', 'jadual.hari')
                                    ->where('rph_main.minggu', '=', $request->minggu)
                                    ->on('rph_main.masa_dari', '=', 'jadual.masa_dari');
                    })
                    ->get();

        $responce = new stdClass();
        $responce->data = $table;
        return json_encode($responce);
    }

    public function getWeek(){
        $year = date_create('today')->format('Y');

        $dtStart = date_create('2 jan '.$year)->modify('last Monday');
        $dtEnd = date_create('last monday of Dec '.$year);

        for($weeks = [];$dtStart <= $dtEnd;$dtStart->modify('+1 week')){
          $key = $dtStart->format('W-Y');
          $from = $dtStart->format('d/m/Y');
          $to = (clone $dtStart)->modify('+6 Days')->format('d/m/Y');

          $responce = new stdClass();
          $responce->key = $key;
          $responce->week = $from.' - '.$to;

          array_push($weeks,$responce);
        }

        return $weeks;
    }

    public function getdays_fromweek($s_key,$hari){
        $year = date_create('today')->format('Y');
        $retval='';

        $dtStart = date_create('2 jan '.$year)->modify('last Monday');
        $dtEnd = date_create('last monday of Dec '.$year);

        for($weeks = [];$dtStart <= $dtEnd;$dtStart->modify('+1 week')){
          $key = $dtStart->format('W-Y');
          $from = $dtStart->format('d/m/Y');
          $to = (clone $dtStart)->modify('+6 Days')->format('d/m/Y');

          if($key == $s_key){
            $retval = $dtStart;
            break;
          }

          $responce = new stdClass();
          $responce->key = $key;
          $responce->week = $from.' - '.$to;

          array_push($weeks,$responce);
        }

        if($retval ==! ''){
            switch ($hari) {
                case 'ISNIN':
                    return $retval;
                    break;
                case 'SELASA':
                    return $retval->modify('+1 day');
                    break;
                case 'RABU':
                    return $retval->modify('+2 day');
                    break;
                case 'KHAMIS':
                    return $retval->modify('+3 day');
                    break;
                case 'JUMAAT':
                    return $retval->modify('+4 day');
                    break;
            }
        }

        return NULL;
    }

    public function amik_warna($warna_kelas,$kelas){
        foreach ($warna_kelas as $warna) {
            if($kelas == $warna[0]){
                return $warna[1];
            }
        }
    }


    public function rph_pdf(Request $request){
        $minggu = $request->minggu;
        $minggu_ke = substr($minggu,0,2);
        $jad_1=[];
        $jad_2=[];
        $jad_3=[];
        $jad_4=[];
        $jad_5=[];
        $warna_kelas=[];

        $jadual = DB::table('rph.jadual')
                        ->where('year_id','1')
                        ->get();

        foreach ($jadual->unique('kelas') as $key => $item){
            array_push($warna_kelas,[$item->kelas,'warna'.$key]);
        }

        foreach ($jadual as $item) {
            $item->date2 = Carbon::parse($this->getdays_fromweek($minggu,$item->hari))->isoformat('d MMMM Y');
            $item->warna = $this->amik_warna($warna_kelas,$item->kelas);
            switch ($item->hari) {
                case 'ISNIN':
                    array_push($jad_1,$item);
                    break;
                case 'SELASA':
                    array_push($jad_2,$item);
                    break;
                case 'RABU':
                    array_push($jad_3,$item);
                    break;
                case 'KHAMIS':
                    array_push($jad_4,$item);
                    break;
                case 'JUMAAT':
                    array_push($jad_5,$item);
                    break;
            }
        }

        $rphs = DB::table('rph.jadual')
                    ->select('jadual.hari','jadual.subjek','jadual.kelas','jadual.masa_dari','jadual.masa_hingga','rph_main.idno','rph_main.minggu','rph_main.date','rph_main.topik_utama','rph_main.sub_topik','rph_main.objektif_id','rph_main.objektif','rph_main.aktiviti','rph_main.abm_1','rph_main.abm_2','rph_main.abm_3','rph_main.abm_4','rph_main.abm_5','rph_main.abm_lain2','rph_main.emk_1','rph_main.emk_2','rph_main.emk_3','rph_main.emk_4','rph_main.emk_5','rph_main.emk_6','rph_main.emk_7','rph_main.emk_8','rph_main.emk_9','rph_main.emk_10','rph_main.emk_11','rph_main.emk_12','rph_main.tpn_1','rph_main.tpn_2','rph_main.tpn_3','rph_main.tpn_4','rph_main.tpn_5','rph_main.tpn_6','rph_main.ppi_1','rph_main.ppi_2','rph_main.ppi_3','rph_main.ppi_4','rph_main.ppi_5','rph_main.ppi_6','rph_main.ppi_7','rph_main.ppi_8','rph_main.pdpc_1','rph_main.pdpc_2','rph_main.pdpc_3','rph_main.pdpc_4','rph_main.pdpc_5','rph_main.pdpc_6','rph_main.pdpc_7','rph_main.pdpc_8','rph_main.pdpc_lain2','rph_main.rlsi_1','rph_main.rlsi_2','rph_main.rlsi_3','rph_main.rlsi_4')
                    ->join('rph.rph_main', function($join) use ($request){
                        $join = $join->on('rph_main.subjek', '=', 'jadual.subjek')
                                    ->on('rph_main.kelas', '=', 'jadual.kelas')
                                    ->on('rph_main.hari', '=', 'jadual.hari')
                                    ->where('rph_main.minggu', '=', $request->minggu)
                                    ->on('rph_main.masa_dari', '=', 'jadual.masa_dari');
                    })
                    ->get();

        foreach ($rphs as $item) {
            $item->date2 = $item->hari.' , '.Carbon::parse($this->getdays_fromweek($minggu,$item->hari))->isoformat('d MMMM Y');
            $item->warna = $this->amik_warna($warna_kelas,$item->kelas);
        }

        $pdf = PDF::loadView('rph_pdf',compact('jadual','jad_1','jad_2','jad_3','jad_4','jad_5','rphs','minggu','minggu_ke','warna_kelas'));
        return $pdf->stream();
        
        return view('rph_pdf',compact('jadual','jad_1','jad_2','jad_3','jad_4','jad_5','rphs','minggu','minggu_ke','warna_kelas'));
    }

    public function rph_prev(Request $request){
        $minggu = $request->minggu;
        $minggu_ke = substr($minggu,0,2);
        $jad_1=[];
        $jad_2=[];
        $jad_3=[];
        $jad_4=[];
        $jad_5=[];
        $warna_kelas=[];

        $jadual = DB::table('rph.jadual')
                        ->where('year_id','1')
                        ->get();

        foreach ($jadual->unique('kelas') as $key => $item){
            array_push($warna_kelas,[$item->kelas,'warna'.$key]);
        }

        foreach ($jadual as $item) {
            $item->date2 = Carbon::parse($this->getdays_fromweek($minggu,$item->hari))->isoformat('d MMMM Y');
            $item->warna = $this->amik_warna($warna_kelas,$item->kelas);
            switch ($item->hari) {
                case 'ISNIN':
                    array_push($jad_1,$item);
                    break;
                case 'SELASA':
                    array_push($jad_2,$item);
                    break;
                case 'RABU':
                    array_push($jad_3,$item);
                    break;
                case 'KHAMIS':
                    array_push($jad_4,$item);
                    break;
                case 'JUMAAT':
                    array_push($jad_5,$item);
                    break;
            }
        }

        $rphs = DB::table('rph.jadual')
                    ->select('jadual.hari','jadual.subjek','jadual.kelas','jadual.masa_dari','jadual.masa_hingga','rph_main.idno','rph_main.minggu','rph_main.date','rph_main.topik_utama','rph_main.sub_topik','rph_main.objektif_id','rph_main.objektif','rph_main.aktiviti','rph_main.abm_1','rph_main.abm_2','rph_main.abm_3','rph_main.abm_4','rph_main.abm_5','rph_main.abm_lain2','rph_main.emk_1','rph_main.emk_2','rph_main.emk_3','rph_main.emk_4','rph_main.emk_5','rph_main.emk_6','rph_main.emk_7','rph_main.emk_8','rph_main.emk_9','rph_main.emk_10','rph_main.emk_11','rph_main.emk_12','rph_main.tpn_1','rph_main.tpn_2','rph_main.tpn_3','rph_main.tpn_4','rph_main.tpn_5','rph_main.tpn_6','rph_main.ppi_1','rph_main.ppi_2','rph_main.ppi_3','rph_main.ppi_4','rph_main.ppi_5','rph_main.ppi_6','rph_main.ppi_7','rph_main.ppi_8','rph_main.pdpc_1','rph_main.pdpc_2','rph_main.pdpc_3','rph_main.pdpc_4','rph_main.pdpc_5','rph_main.pdpc_6','rph_main.pdpc_7','rph_main.pdpc_8','rph_main.pdpc_lain2','rph_main.rlsi_1','rph_main.rlsi_2','rph_main.rlsi_3','rph_main.rlsi_4')
                    ->join('rph.rph_main', function($join) use ($request){
                        $join = $join->on('rph_main.subjek', '=', 'jadual.subjek')
                                    ->on('rph_main.kelas', '=', 'jadual.kelas')
                                    ->on('rph_main.hari', '=', 'jadual.hari')
                                    ->where('rph_main.minggu', '=', $request->minggu)
                                    ->on('rph_main.masa_dari', '=', 'jadual.masa_dari');
                    })
                    ->get();

        foreach ($rphs as $item) {
            $item->date2 = $item->hari.' , '.Carbon::parse($this->getdays_fromweek($minggu,$item->hari))->isoformat('d MMMM Y');
            $item->warna = $this->amik_warna($warna_kelas,$item->kelas);
        }

        $pdf = PDF::loadView('rph_pdf',compact('jadual','jad_1','jad_2','jad_3','jad_4','jad_5','rphs','minggu','minggu_ke','warna_kelas'));
        // return $pdf->stream();
        
        return view('rph_pdf',compact('jadual','jad_1','jad_2','jad_3','jad_4','jad_5','rphs','minggu','minggu_ke','warna_kelas'));
    }

}
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

            default:
                return 'error happen..';
        }
    }

    public function goto(Request $request){
        return view('rph');
    }

    public function show(Request $request){
        $year = date_create('today')->format('Y');
        $weeks = $this->getWeek();

        return view('rph',compact('year','weeks'));
    }

    public function setup_jadual(Request $request){
        return view('setup_jadual');
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

    public function init_jadual(Request $request){

        $table = DB::table('rph.jadual')
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

}
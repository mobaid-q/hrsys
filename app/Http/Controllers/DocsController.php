<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Document;
// use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DocsController extends Controller
{
    public function index() {
        $data = Document::all();
        return view('doc.index', ['data' => $data]);
    }

    public function upl_doc() {
        $data = DB::select("select * from tblemp");
        return view('doc.upl_doc', ['data' => $data]);
    }

    public function sav_doc(Request $req) {
        $files = [];
        $titles = [];
        $eid = $req->input('ie_id');
        $req->validate([
            'idoc_files.*' => 'required'
        ]);
        if($req->hasfile('idoc_files')) {
            $allowedExt = ['pdf','jpg','png','docx'];
            foreach($req->file('idoc_files') as $file) {
                $ext = $file->getClientOriginalExtension();
                $chk = in_array($ext, $allowedExt);
                if($chk) {
                    $name = $file->getClientOriginalName();
                    $name = $eid."-".$name;
                    Storage::disk('docs')->put($eid.'/'.$name, File::get($file));
                    // $file->move(public_path('/edocs/'.$eid), $name);  
                    $files[] = $name;
                }
            }
        }
        if($req->has('ifile_title')) {
            foreach($req->input('ifile_title') as $ttl) {
                $titles[] = $ttl;
            }
        }
        $arr_comb = array_combine($titles, $files);
        foreach($arr_comb as $key=>$val) {
            $doc = new Document();
            $doc->e_id = $eid;
            $doc->doc_title = $key;
            $doc->doc_files = $val;
            if($doc->save()) {
                $req->session()->flash('admsg','Documents added successfully.');
            }
            else {
                $req->session()->flash('admsg','Sorry, try again!');
            }
        }
        return redirect('/upload_docs');
        
    }

    public function ed_doc($docid) {
        $data = Document::where('doc_id', $docid)->get();
        $emp = DB::table('tblemp')->get();
        return view('doc.ed_doc', ['data'=>$data, 'emp' => $emp]);
    }
    
    public function upd_doc(Request $req) {
        $data = $req->input();
        $eid = $data['ie_id'];
        if($req->hasfile('idoc_files')) {
            $allowedExt = ['pdf','jpg','png','docx'];
            $file = $req->file('idoc_files');
            $ext = $file->getClientOriginalExtension();
            $chk = in_array($ext, $allowedExt);
            if($chk) {
                $name = $file->getClientOriginalName();
                $name = $eid."-".$name;
                Storage::disk('docs')->put($eid.'/'.$name, File::get($file));
                // $file->move(public_path('/edocs/'.$eid), $name);  
                // unlink(public_path('/edocs/'.$eid.'/'.$data['iold_file']));
                unlink(storage_path('app/docs/'.$eid.'/'.$data['iold_file']));
            }
        }
        if (!isset($name)) {
            $name = $data['iold_file'];
        }
        $doc = Document::where('doc_id', $data['idoc_id'])
                ->update([
                    'e_id' => $eid,
                    'doc_title' => $data['ifile_title'],
                    'doc_files' => $name
                    ]);
        if($doc == 1) {
            $req->session()->flash('edmsg','Documents updated successfully.');
        }
        else {
            $req->session()->flash('edmsg','Sorry, try again!');
        }
        return redirect('/documents');

    }

    public function del_doc($docid, Request $req) {
        $delrec = Document::where('br_id', $docid)->delete();
        if($delrec > 0) {
            $req->session()->flash('delmsg','Branch deleted successfully.');
        }
        else {
            $req->session()->flash('delmsg','Sorry, try again!');
        }
        return redirect('/documents');
    }

}

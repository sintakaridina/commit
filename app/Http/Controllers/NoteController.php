<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Meet;
use App\Models\Pelaksana;
use PDF;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $meet_id=Pelaksana::where('user_id', Auth::user()->id)
        //                     ->where('role', 'notulen')
        //                     ->pluck('meet_id')
        //                     ->first();
        // $pimpinan=Pelaksana::join('users', 'users.id', '=', 'pelaksanas.user_id')
        //                     ->where('pelaksanas.meet_id', $meet_id) 
        //                     ->where('pelaksanas.role', 'pimpinan')
        //                     ->first();  

        // $notes = Note::join('meets', 'meets.id', '=', 'notes.meet_id')
        //                 ->where('notes.meet_id', $meet_id)
        //                 ->select('notes.*', 'meets.id as meet_id', 'meets.date')
        //                 ->paginate(5);
        $meets=Meet::leftJoin('notes', 'notes.meet_id', '=', 'meets.id')
                    ->select('meets.*', 'notes.status as noteStatus', 'notes.id as note_id', 'meets.status as meetStatus')
                    ->orderBy('meets.id', 'DESC')
                    ->get();

        return view('notulen.dashboard', compact('meets'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function indexPimpinan()
    {   
        // $meet_id=Pelaksana::where('user_id', Auth::user()->id)
        //                     ->where('role', 'pimpinan')
        //                     ->pluck('meet_id');
        // // $notulen=Pelaksana::join('users', 'users.id', '=', 'pelaksanas.user_id')
        // //                     ->where('pelaksanas.role', 'notulen')                    
        // //                     ->whereIn('pelaksanas.meet_id', $meet_id) 
        // //                     ->first();  

        // $notes = Note::join('meets', 'meets.id', '=', 'notes.meet_id')
        //                 ->whereIn('notes.meet_id', $meet_id)
        //                 ->select('notes.*', 'meets.title as name', 'meets.id as meet_id', 'meets.date as date')
        //                 ->paginate(5);
        $meets=Meet::leftJoin('notes', 'notes.meet_id', '=', 'meets.id')
                    ->select('meets.*', 'notes.status as noteStatus', 'notes.id as note_id', 'meets.status as meetStatus')
                    ->orderBy('meets.id', 'DESC')
                    ->get();

        return view('pimpinan.dashboard', compact('meets'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function indexPeserta()
    {   
        $meets=Meet::leftJoin('notes', 'notes.meet_id', '=', 'meets.id')
                    ->select('meets.*', 'notes.id as note_id', 'notes.status as noteStatus', 'meets.status as meetStatus')
                    ->orderBy('meets.id', 'DESC')
                    ->get();

        return view('peserta.dashboard', compact('meets'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function download(Note $note) {
        

        view()->share('note', $note);
        $pdf_doc = PDF::loadView('export_pdf', $note);
        $name="Laporan ".$note->title.".pdf";
        return $pdf_doc->download($name);
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Meet $meet)
    {
        $files=str_replace(array('[',']','"'),'', $meet->file);
        $files=explode(',', $files);
        return view('notulen.newnote', compact('meet','files'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $meet_id=Pelaksana::where('user_id', Auth::user()->id)
        //                     ->where('role', 'notulen')
        //                     ->orderBy('meet_id', 'desc')
        //                     ->first();

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        if ($request->hasfile('filename')) {
            foreach ($request->file('filename') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/mytestfile/', $name);
                $data[] = $name;
            }
            $meet=Meet::find($request->id);
            $meet->file.=json_encode($data);
            $meet->save();
        }

        $note = new Note();
        $note->title = $request->title;
        $note->status = 'belum';
        $note->content = $request->content;
        $note->meet_id = $request->id;
        $note->save();
      
        return redirect()->route('notulen.dashboard')
                        ->with('success','Post created successfully.');
    }
    
    public function showMeet(Meet $meet){
        $files=str_replace(array('[',']','"'),'', $meet->file);
        $files=explode(',', $files);

        return view('peserta.showmeet', compact('meet','files'));
    }

    public function recStore(Meet $meet, Request $request)
    {
        $meet->rec=$request->rec;
        $meet->save();
      
        return redirect()->route('notulen.dashboard')
                        ->with('success','Link created successfully.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {   
        $meet=Meet::find($note->meet_id);
        $files=str_replace(array('[',']','"'),'', $meet->file);
        $files=explode(',', $files);
        if(Auth::user()->role === "pimpinan"){
            return view('pimpinan.shownote', compact('note', 'files', 'meet'));
        }else{
            return view('peserta.shownote', compact('note', 'files'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        return view('notulen.editnote', compact('note'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $note->title = $request->title;
        $note->content = $request->content;
        $note->status = "belum";
        $note->save();
      
        return redirect()->route('notulen.dashboard')
                        ->with('success','Post created successfully.');
    }
    public function verifikasi(Note $note)
    {

        $note->status = 'validate';
        $note->save();
        
        $meet= Meet::find($note->meet_id);
        $meet->status = 'done';
        $meet->save();
      
        return redirect()->route('pimpinan.dashboard')
                        ->with('success','Note telah diverifikasi.');
    }
    public function tolak(Note $note)
    {

        $note->status = 'decline';
        $note->save();
      
        return redirect()->route('pimpinan.dashboard')
                        ->with('success','Note telah ditolak.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect('notulen_dashboard')->with('success', 'Hapus Data Berhasil');
    }
}

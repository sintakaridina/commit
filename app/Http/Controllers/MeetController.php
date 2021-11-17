<?php
namespace App\Http\Controllers;

use App\Models\Meet;
use App\Models\User;
use App\Models\Note;
use App\Models\Pelaksana;
use App\Models\Konsumsi;
use Illuminate\Http\Request;
use View;
use App\Mail\MyTestMail;
use Illuminate\Support\Facades\Mail;

class MeetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meets = Meet::orderBy('id', 'DESC')->paginate(5);

        return view('sekret.dashboard', compact('meets'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function tracking()
    {
        $meets = Meet::whereNull('part')->orderBy('date', 'DESC')->paginate(5);
        $notes=Note::where('status', '=', 'validate')->paginate(5);

        return view('sekret.tracking', compact('meets', 'notes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function tracking2(Meet $meet)
    {
         $tracking = Meet::where('part_id', $meet->id)
                       ->leftJoin('notes', 'notes.meet_id', '=', 'meets.id')
                       ->select('meets.*', 'meets.id as meet_id', 'notes.id as note_id', 'notes.title as title')
                       ->get();
        //  $meet = Meet::leftJoin('notes', 'notes.meet_id', '=', 'meets.id')
        //               ->select('meets.*', 'notes.*', 'notes.id as note_id', 'notes.title as title')
        //               ->get();
        $note=Note::where('meet_id', $meet->id)->first();
        $files=str_replace(array('[',']','"'),'', $meet->file);
        $files=explode(',', $files);
        return view('sekret.tracking-2', compact('meet','note', 'tracking', 'files'));
    }
    public function new2()
    {
        $users = User::get();

        return view('sekret.new-meeting-2', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function new3()
    {
        $users = User::first()->paginate(5);

        return view('sekret.new-meeting-3', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function details()
    {
        $users = User::first()->paginate(5);

        return view('sekret.new-details', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sekret.newmeeting');
    }
    public function next(Meet $meet)
    {
        return view('sekret.next-meeting', compact('meet'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'categories' => 'required',
            'date' => 'required',
            'location' => 'required',
            'status' => 'required'
        ]);

        $meet=Meet::create($request->all());
        $meet_id=$meet->id;
        
        return redirect()->route('sekret.newmeet2', ['id' => $meet_id]);

    }
    public function storeNext(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'part' => 'required',
            'part_id' => 'required',
            'categories' => 'required',
            'date' => 'required',
            'location' => 'required'
        ]);

            $meet = new Meet;
            $meet->title= $request->title;
            $meet->part= $request->part;
            $meet->part_id= $request->part_id;
            $meet->categories= $request->categories;
            $meet->date= $request->date;
            $meet->location= $request->location;
            $meet->save();

            $meet_part = Meet::find($request->part_id);
            $meet_part->status= $request->status;
            $meet_part->save();

            $meet_id=$meet->id;


        return redirect()->route('sekret.newmeet2', ['id' => $meet_id]);

    }
    public function storePelaksana(Request $request)
    {
        foreach($request->peserta as $key => $value) {
            $pelaksana = new Pelaksana;
            $pelaksana->meet_id = $request->id;
            $pelaksana->user_id = $value;
            $pelaksana->role = 'peserta';
            $pelaksana->save();

            $user=User::find($value);
            $user->role = 'peserta';
            $user->save();
        }

            $pelaksana = new Pelaksana;
            $pelaksana->meet_id = $request->id;
            $pelaksana->user_id = $request->pimpinan;
            $pelaksana->role = 'pimpinan';
            $pelaksana->save();

            $user=User::find($request->pimpinan);
            $user->role = 'pimpinan';
            $user->save();

            $pelaksana = new Pelaksana;
            $pelaksana->meet_id = $request->id;
            $pelaksana->user_id = $request->notulen;
            $pelaksana->role = 'notulen';
            $pelaksana->save();

            $user=User::find($request->notulen);
            $user->role = 'notulen';
            $user->save();
            

            $meet_id=$request->id;
           

            //Upload File
            $this->validate($request, [

                // 'filename' => 'required',
                'filename.*' => 'mimes:doc,pdf,docx,zip'

        ]);
            if ($request->hasfile('filename')) {
                foreach ($request->file('filename') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path() . '/mytestfile/', $name);
                    $data[] = $name;
                }
                $meet=Meet::find($meet_id);
                $meet->file=json_encode($data);
                $meet->save();
            }

            $meet=Meet::where('id', $meet_id)->first();
            $meet_cat=$meet->categories;

            if ( $meet_cat === "luring" ) {// do your magic here
                return redirect()->route('sekret.newmeet3', ['id' => $meet_id]);
            }
            else{
                return redirect()->route('sekret.newdetails', ['meet' => $meet_id]);
            }
            
            // return redirect()->route('sekret.newmeet3', ['id' => $meet_id]);

            

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meet  $Meet
     * @return \Illuminate\Http\Response
     */
    public function show(Meet $meet)
    {
        $pimpinan=Pelaksana::where('meet_id', $meet->id)->where('role', 'pimpinan')->first();
        $pimpinan=User::where('id', $pimpinan->user_id)->first();
        $notulen=Pelaksana::where('meet_id', $meet->id)->where('role', 'notulen')->first();
        $notulen=User::where('id', $notulen->user_id)->first();
        // $peserta=Pelaksana::where('meet_id', $meet->id)->where('role', 'peserta')->get();
        $peserta = Pelaksana::join('users', 'users.id', '=', 'pelaksanas.user_id')
              		->where('pelaksanas.meet_id', $meet->id)->where('pelaksanas.role', 'peserta')
              		->get(['users.name', 'users.email']);
        $files=str_replace(array('[',']','"'),'', $meet->file);
        $files=explode(',', $files);
        $konsumsi=Konsumsi::where('meet_id', $meet->id)->get();
        $total=0;
        foreach ($konsumsi as $k){
        $total=$total+($k->harga*$k->jumlah);
        }

        return view('sekret.new-details', compact('meet','pimpinan','notulen','peserta','files','total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meet  $Meet
     * @return \Illuminate\Http\Response
     */
    public function edit(Meet $meet)
    {
        return view('sekret.reschedule', compact('meet'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\meet  $Meet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meet $meet)
    {
        $request->validate([
            'title' => 'required',
            'categories' => 'required',
            'date' => 'required',
            'location' => 'required'
        ]);
        $meet->update($request->all());

        return redirect()->route('sekret.dashboard')
            ->with('success', 'Meet updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meet  $Meet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meet $meet)
    {
        $konsumsis=Konsumsi::where('meet_id', $meet->id)->delete();
        // foreach ($konsumsis as $konsumsi){
        //     $konsumsi->delete();
        // }
        $pelaksanas=Pelaksana::where('meet_id', $meet->id)->delete();
        // foreach ($pelaksanas as $pelaksana){
        //     $pelaksana->delete();
        // } 
        $meet->delete();
        return redirect()->route('sekret.dashboard')
            ->with('success', 'Meet deleted successfully');
    }
    public function delete($id)
    {
        $meet = Meet::find($id);

        return view('sekret.delete', compact('meet'));
    }
    public function start($id)
    {
        $meet = Meet::find($id);

        return view('sekret.start', compact('meet'));
    }
    public function startUpdate($id)
    {
        $meet = Meet::find($id);
        $meet->status='on-going';
        $meet->save();
        return redirect()->route('sekret.dashboard')
            ->with('success', 'Meet started successfully');
    }
    public function mailSend($id) {
        $pelaksana = Pelaksana::join('users', 'users.id', '=', 'pelaksanas.user_id')
                                ->where('pelaksanas.meet_id' , $id)
                                ->get();
        $meet=Meet::find($id);
        $emails = $pelaksana->pluck('email');
        $emails->all();
        // $email = 'mail@hotmail.com';

        $mailInfo = [
            'title' => 'Pengumuman Pelaksanaan Rapat Laboratorium RPL',
            'url' => 'http://127.0.0.1:8000',
            'judul' => $meet->title,
            'location' => $meet->location,
            'date' => $meet->date
        ];
        foreach($emails as $email){
        Mail::to($email)->send(new MyTestMail($mailInfo));
        }

        return redirect()->route('sekret.dashboard')
            ->with('success', 'Email sudah terkirim!');
    }
}

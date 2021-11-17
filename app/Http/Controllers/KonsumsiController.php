<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Konsumsi;
use Redirect,Response;
class KonsumsiController extends Controller
{

	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/

	public function index(Request $request)
	{
		$konsumsi = Konsumsi::where('meet_id', request()->id)->paginate(5);
		return view('sekret.new-meeting-3',compact('konsumsi'))->with('i', (request()->input('page', 1) - 1) * 4);
	}

	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/

	public function create()
	{
		return view('konsumsi.create');
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @return \Illuminate\Http\Response
	*/

	public function store(Request $request)
	{

		$r=$request->validate([
		'nama' => 'required',
		'harga' => 'required',
		'jumlah' => 'required',
        'meet_id' => 'required'
		]);
        
		// $meet_id = $request->id;
		Konsumsi::updateOrCreate(['id' => $request->id],['meet_id' => $request->meet_id, 'nama' => $request->nama, 'harga' => $request->harga, 'jumlah'=>$request->jumlah]);
		if(empty($request->id))
			$msg = 'Konsumsi entry created successfully.';
		else
			$msg = 'Konsumsi data is updated successfully';
		return redirect()->route('sekret.newmeet3',  ['id' => $request->meet_id]);
	}

	/**
	* Display the specified resource.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/

	public function show(Konsumsi $konsumsi)
	{
		return view('konsumsi.show',compact('konsumsi'));
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/
	
	public function edit($id)
	{
		$where = array('id' => $id);
		$konsumsi = Konsumsi::where($where)->first();
		return Response::json($konsumsi);
	}

	/**
	* Update the specified resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @param int $id
	* @return \Illuminate\Http\Response
	*/

	public function update(Request $request)
	{

	}

	/**
	* Remove the specified resource from storage.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/

	public function destroy($id)
	{
		$kons = Konsumsi::where('id',$id)->delete();
		return Response::json($kons);
	}
}
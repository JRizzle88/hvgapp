<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Fileentry;
use Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class FileManagerController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		//$this->middleware('admin');
		//$this->middleware('author', ['only' => ['add', 'index']]);
		//$this->middleware('player', ['only' => ['add', 'index']]);
		$this->middleware('guest', ['only' => ['get']]);
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$entries = Fileentry::all();
 		
		return view('filemanager.index', compact('entries'));
	}
 
	public function add() {
 
		$file = Request::file('filefield');
		$extension = $file->getClientOriginalExtension();
		Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
		$entry = new Fileentry();
		$entry->mime = $file->getClientMimeType();
		$entry->original_filename = $file->getClientOriginalName();
		$entry->filename = $file->getFilename().'.'.$extension;
 
		$entry->save();
 
		return redirect('filemanager');
		
	}
	
	public function get($filename){
	
		$entry = Fileentry::where('filename', '=', $filename)->firstOrFail();
		$file = Storage::disk('local')->get($entry->filename);
		
		return (new Response($file, 200))
			->header('Content-Type', $entry->mime);
	}
	

}

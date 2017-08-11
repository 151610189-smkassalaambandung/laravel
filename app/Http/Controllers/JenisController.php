<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenis;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class JenisController extends Controller
{
    public function index(Request $request, Builder $htmlBuilder)
    {
    	if ($request->ajax()) {
    		$jenis = Jenis::select(['id', 'name']);
    		return Datatables::of($jenis)
                ->addColumn('action', function($jenis){
                    return view('datatable._action', [
                        'edit_url' => route('jenis.edit', $jenis->id),
                        ]);
                })->make(true);
    	}

    	$html = $htmlBuilder
    		->addColumn(['data'=>'name', 'name'=>'name', 'title'=>'Nama']);
            ->addColumn(['data'=>'action','name'=>'action','title'=>'','orderable'=>false,'searchable'=>false]);

    	return view('jenis.index')->with(compact('html'));
    }

    public function create()
    {
        return view('jenis.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:jenis']);
        $jenis = Jenis::create($request->only('name'));
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $jenis->name"]);
        return redirect()->route('jenis.index');
    }

    public function edit($id)
    {
        $jenis = Jenis::find($id);
        return view('jenis.edit')->with(compact('jenis'));
    }
}

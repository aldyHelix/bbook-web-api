<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materi;

class MateriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show()
    {
        $data['materis'] = Materi::get();
        return view('materi.index', $data);
    }
    public function add()
    {
        return view('materi.add-edit', ['edit'=>false]);
    }
    public function showDetails($id)
    {
        $data['materi'] = Materi::findOrFail($id);
        return view('materi.details', $data);
    }
    public function insert(Request $request)
    {
        $request->validate([
            'gambar' => 'image|mimes:jpg,jpeg,png,gif|max:1048',
        ]);

        $data = $request->dt;
        $gambar = $request->file('gambar');
        if($gambar != null){
            $nama_file1 = time()."_".$gambar->getClientOriginalName();
            $tujuan_upload = 'uploads/materi';
            $gambar->move($tujuan_upload,$nama_file1);
            $data['gambar_materi'] = $nama_file1;
        }
        if(Materi::create($data))
        {
            return redirect('materi')->withSuccess(__("Successfuly Add New Materi."));
        }
        else
        {
            return redirect('materi')->withError(__("Failed Add Materi."));
        }
    }
    public function edit($id)
    {
        $data['materis'] = Materi::where('id', $id)->first();
        return view('materi.add-edit', ['edit' => true] ,$data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'image|mimes:jpg,jpeg,png,gif|max:1048',
        ]);

        $data = $request->dt;
        $gambar = $request->file('gambar');
        if($gambar != null){
            $nama_file1 = time()."_".$gambar->getClientOriginalName();
            $tujuan_upload = 'uploads/materi';
            $gambar->move($tujuan_upload,$nama_file1);
            $data['gambar_materi'] = $nama_file1;
        }

        if(Materi::where('id', $id)->update($data))
        {
            return redirect('materi')->withSuccess(__('Successfuly Update '.$data['nama_materi']));
        }
        else
        {
            return redirect('materi')->withError(__("Failed Update Materi."));
        }
    }
    public function delete($id)
    {
        $dt = Materi::findOrFail($id);
        if(!empty($dt))
        {
            Materi::destroy($id);
            return redirect('materi')->withSuccess(__("Successfuly Deleted Materi."));
        }
        else
        {
            return redirect('materi')->withError(__("Failed Deleted Materi."));
        }
    }

}

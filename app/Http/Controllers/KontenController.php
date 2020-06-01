<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Konten;
use App\Materi;

class KontenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show()
    {
        $data['konten'] = Konten::with('kontenMateri')->get();
        return view('konten.index', $data);
    }
    public function add()
    {
        $data['materis'] = Materi::get();
        return view('konten.add-edit', ['edit' => false], $data);
    }
    public function insert(Request $request)
    {
        $request->validate([
            'gambar_konten' => 'required|file|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        $data = $request->dt;
        $data['description'] = $request->desc;
        $header = $request->file('gambar_konten');

        if($header != null){
            $nama_file1 = time()."_".$header->getClientOriginalName();
            $tujuan_upload = 'uploads/konten';
            $header->move($tujuan_upload,$nama_file1);
            $data['gambar_konten'] = $nama_file1;
        }

        if(Konten::create($data))
        {
            return redirect()->back()->withSuccess(__("Successfuly Add Konten."));
        }
        else
        {
            return redirect()->back()->withError(__("Failed Add Konten."));
        }
    }
    public function edit($id)
    {
        $data['kontens'] = Konten::where('id', $id)->first();
        $data['materis'] = Materi::get();
        return view('konten.add-edit', ['edit' => true], $data);
    }
    public function update(Request $request, $id)
    {
       $request->validate([
            'gambar_konten' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        $data = $request->dt;
        $data['description'] = $request->desc;
        $header = $request->file('gambar_konten');

        if($header != null){
            $nama_file1 = time()."_".$header->getClientOriginalName();
            $tujuan_upload = 'uploads/konten';
            $header->move($tujuan_upload,$nama_file1);
            $data['gambar_konten'] = $nama_file1;
        }

        if(Konten::findOrFail($id)->update($data))
        {
            return redirect()->back()->withSuccess(__('Successfuly Update Konten'));
        }
        else
        {
            return redirect()->back()->withError(__("Failed Update User."));
        }
    }
    public function delete($id)
    {
        $dt = Konten::findOrFail($id);
        if(!empty($dt))
        {
            Konten::destroy($id);
            return redirect()->back()->withSuccess(__("Successfuly Deleted Konten."));
        }
        else
        {
            return redirect()->back()->withError(__("Failed Deleted Konten."));
        }
    }
    public function details($id)
    {
        $dt['konten'] = Konten::where('id', $id)->first();
        return view('konten.details', $dt);
    }
}

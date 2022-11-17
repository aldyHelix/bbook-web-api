<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Petunjuk\PetunjukInterface;
use App\Services\PetunjukService;

class PetunjukController extends Controller
{
    protected $petunjukRepository;
    protected $petunjukService;

    public function __construct(PetunjukInterface $petunjukRepository, PetunjukService $petunjukService)
    {
        $this->petunjukService = $petunjukService;
        $this->petunjukRepository = $petunjukRepository;
        $this->middleware('auth');
    }
    public function show()
    {
        $data['petunjuk'] = $this->petunjukRepository->getPetunjuk();
        return view('petunjuk.index', $data);
    }
    public function add()
    {
        return view('petunjuk.add-edit', ['edit' => false]);
    }
    public function insert(Request $request)
    {
        $created = $this->petunjukService->createPetunjuk($request);

        if($created)
        {
            return redirect()->back()->withSuccess(__("Successfuly Add Petunjuk."));
        }
        else
        {
            return redirect()->back()->withError(__("Failed Add Petunjuk."));
        }
    }
    public function edit($id)
    {
        $data['petunjuk'] = $this->petunjukRepository->getPetunjukById($id);
        return view('petunjuk.add-edit', ['edit' => true], $data);
    }
    public function update(Request $request, $id)
    {
        $updated = $this->petunjukService->updatePetunjuk($request, $id);

        if($updated)
        {
            return redirect()->back()->withSuccess(__('Successfuly Update Petunjuk'));
        }
        else
        {
            return redirect()->back()->withError(__("Failed Update Petunjuk."));
        }
    }
    public function destroy($id)
    {
        $deleted = $this->petunjukService->deletePetunjuk($id);
        if($deleted)
        {
            return redirect()->back()->withSuccess(__("Successfuly Deleted Petunjuk."));
        }
        else
        {
            return redirect()->back()->withError(__("Failed Deleted Petunjuk."));
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Materi\MateriInterface;
use App\Services\MateriService;

class MateriController extends Controller
{
    private $materiRepository;
    private $materiService;

    public function __construct(MateriInterface $materiRepository, MateriService $materiService)
    {
        $this->materiRepository = $materiRepository;
        $this->materiService = $materiService;
        $this->middleware('auth');
    }

    public function index()
    {
        $data['materis'] = $this->materiRepository->getMateri();
        return view('materi.index', $data);
    }

    public function showDetails($id)
    {
        $data['materi'] = $this->materiRepository->getMateriById($id);
        return view('materi.details', $data);
    }

    public function add()
    {
        return view('materi.add-edit', ['edit'=>false]);
    }

    public function insert(Request $request)
    {
        $created = $this->materiService->createMateri($request);
        if($created)
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
        $data['materis'] = $this->materiRepository->getMateriById($id);
        return view('materi.add-edit', ['edit' => true] ,$data);
    }

    public function update(Request $request, $id)
    {
        $updated = $this->materiService->updateMateri($request, $id);

        if($updated)
        {
            return redirect('materi')->withSuccess(__('Successfuly Update Data'));
        }
        else
        {
            return redirect('materi')->withError(__("Failed Update Materi."));
        }
    }

    public function destroy($id)
    {
        $deleted= $this->materiService->deleteMateri($id);

        if($deleted)
        {
            return redirect('materi')->withSuccess(__("Successfuly Deleted Materi."));
        }
        else 
        {
            return redirect('materi')->withError(__("Failed Deleted Materi."));
        }
    }
}

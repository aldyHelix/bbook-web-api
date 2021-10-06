<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MateriImageService;

class MateriImageController extends Controller
{
    private $materiImageService;

    public function __construct(MateriImageService $materiImageService)
    {
        $this->materiImageService = $materiImageService;
        $this->middleware('auth');
    }

    public function insert(Request $request)
    {
        $created = $this->materiImageService->create($request);

        if($created)
        {
            return redirect()->back()->withSuccess(__("Successfuly Add New Image."));
        }
        else
        {
            return redirect()->back()->withError(__("Failed Add Image."));
        }
    }

    public function update(Request $request, $id)
    {
        $updated = $this->materiImageService->update($request, $id);

        if($updated)
        {
            return redirect()->back()->withSuccess(__('Successfuly Update Image'));
        }
        else
        {
            return redirect()->back()->withError(__("Failed Update Image."));
        }
    }

    public function destroy($id)
    {
        $deleted= $this->materiImageService->delete($id);

        if($deleted)
        {
            return redirect()->back()->withSuccess(__("Successfuly Deleted Image."));
        }
        else 
        {
            return redirect()->back()->withError(__("Failed Deleted Image."));
        }
    }
}

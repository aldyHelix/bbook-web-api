<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MateriVideoService;

class MateriVideoController extends Controller
{
    private $materiVideoService;

    public function __construct(MateriVideoService $materiVideoService)
    {
        $this->materiVideoService = $materiVideoService;
        $this->middleware('auth');
    }

    public function insert(Request $request)
    {
        $created = $this->materiVideoService->create($request);

        if($created)
        {
            return redirect()->back()->withSuccess(__("Successfuly Add New Video."));
        }
        else
        {
            return redirect()->back()->withError(__("Failed Add Video."));
        }
    }

    public function update(Request $request, $id)
    {
        $updated = $this->materiVideoService->update($request, $id);

        if($updated)
        {
            return redirect()->back()->withSuccess(__('Successfuly Update Video'));
        }
        else
        {
            return redirect()->back()->withError(__("Failed Update Video."));
        }
    }

    public function destroy($id)
    {
        $deleted= $this->materiVideoService->delete($id);

        if($deleted)
        {
            return redirect()->back()->withSuccess(__("Successfuly Deleted Video."));
        }
        else 
        {
            return redirect()->back()->withError(__("Failed Deleted Video."));
        }
    }
}

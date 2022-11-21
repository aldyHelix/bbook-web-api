<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Petunjuk\PetunjukInterface as PetunjukInterface;

class PetunjukController extends Controller
{
    private $petunjukRepository;

    public function __construct(PetunjukInterface $petunjukRepository)
    {
        $this->petunjukRepository = $petunjukRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->petunjukRepository->getPetunjuk();
        return response([
            'success' => true,
            'message' => 'list all Petunjkuk',
            'data' => $data
        ], 200);
    }

    public function getPetunjukSoal()
    {
        $data = $this->petunjukRepository->getPetunjukSoal();
        return response([
            'success' => true,
            'message' => 'success',
            'data' => $data
        ], 200);
    }
}

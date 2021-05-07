<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Materi\MateriInterface as MateriInterface;

class MateriController extends Controller
{

    private $materiRepository;

    public function __construct(MateriInterface $materiRepository)
    {
        $this->materiRepository = $materiRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->materiRepository->getMateri();
        return response([
            'success' => true,
            'message' => 'list all materis',
            'data' => $data
        ], 200);
    }

    public function getLatestMateri()
    {
        $data = $this->materiRepository->getMateriOrderByLastAdded();
        return response([
            'success' => true,
            'message' => 'list all materis',
            'data' => $data
        ], 200);
    }

    public function getByKeySearchMateri($key)
    {
        $data = $this->materiRepository->getMateriByKey($key);
        return response([
            'success' => true,
            'message' => 'list all materis',
            'data' => $data
        ], 200);
    }

    public function getByQrKeySearchMateri($key)
    {
        $data = $this->materiRepository->getMateriByQrKey($key);
        return response([
            'success' => true,
            'message' => 'Qr Materi result',
            'data' => $data
        ], 200);
    }

    public function getByIdMateri($id)
    {
        $data = $this->materiRepository->getMateriById($id);
        return response([
            'success' => true,
            'message' => 'list all materis',
            'data' => $data
        ], 200);
    }
}

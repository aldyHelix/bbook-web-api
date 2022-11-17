<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Materi\MateriInterface as MateriInterface;
use App\Repositories\MateriImage\MateriImageInterface as MateriImageInterface;
use App\Repositories\MateriVideo\MateriVideoInterface as MateriVideoInterface;

class MateriController extends Controller
{

    private $materiRepository;
    private $materiImageRepository;
    private $materiVideoRepository;

    public function __construct(MateriInterface $materiRepository,
        MateriImageInterface $materiImageRepository,
        MateriVideoInterface $materiVideoRepository)
    {
        $this->materiRepository = $materiRepository;
        $this->materiImageRepository = $materiImageRepository;
        $this->materiVideoRepository = $materiVideoRepository;
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

    public function getBabMateri($bab)
    {
        $data = $this->materiRepository->getMateriByBab($bab);
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

    public function getByIdMateri($id)
    {
        $data = $this->materiRepository->getMateriById($id);
        return response([
            'success' => true,
            'message' => 'list all materis',
            'data' => $data
        ], 200);
    }

    public function getMateriImageById($id)
    {
        $data = $this->materiImageRepository->getMateriImageByMateriId($id);
        return response([
            'success' => true,
            'message' => 'list all materis',
            'data' => $data
        ], 200);
    }

    public function getMateriVideoById($id)
    {
        $data = $this->materiVideoRepository->getMateriVideoByMateriId($id);
        return response([
            'success' => true,
            'message' => 'list all materis',
            'data' => $data
        ], 200);
    }

    public function getMateriVideo()
    {
        $data = $this->materiVideoRepository->getAllMateriVideoOrderByMateri();
        return response([
            'success' => true,
            'message' => 'list all materis',
            'data' => $data
        ], 200);
    }
}

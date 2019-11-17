<?php

namespace App\Http\Controllers;

use App\Http\Handler\Action\ShowDataMinerHandler;
use Illuminate\View\View;

/**
 * Class DataMinerController
 */
class DataMinerController extends Controller
{
    /** @var ShowDataMinerHandler $showDataMinerHandler */
    protected $showDataMinerHandler;

    /**
     * @param ShowDataMinerHandler $showDataMinerHandler
     */
    public function __construct(ShowDataMinerHandler $showDataMinerHandler)
    {
        $this->showDataMinerHandler = $showDataMinerHandler;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $data = $this->showDataMinerHandler->showData();

        return view($data['template'], $data['params']);
    }
}

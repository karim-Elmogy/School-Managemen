<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Repository\PromotionRepository;
use App\Repository\PromotionRepositoryInterface;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    protected $Promotion;

    public function __construct(PromotionRepositoryInterface $Promotion)
    {
        $this->Promotion = $Promotion;
    }
    public function index()
    {
        return $this->Promotion->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->Promotion->create();
    }

    public function store(Request $request)
    {
        return $this->Promotion->store($request);
    }



    public function destroy(Request $request)
    {
        return $this->Promotion->destroy($request);
    }
}

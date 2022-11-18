<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeesRequest;
use App\Models\Fee;
use App\Repository\FeesRepositoryInterface;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    protected $Fee;

    public function __construct(FeesRepositoryInterface $Fee)
    {
        $this->Fee = $Fee;
    }
    public function index()
    {
        return $this->Fee->index();
    }


    public function create()
    {
        return $this->Fee->create();
    }

    public function store(StoreFeesRequest $request)
    {
        return $this->Fee->store($request);
    }



    public function edit($id)
    {
        return $this->Fee->edit($id);
    }


    public function update(StoreFeesRequest $request)
    {
        return $this->Fee->update($request);
    }

    public function destroy(request $request)
    {
        return $this->Fee->destroy($request);
    }
}

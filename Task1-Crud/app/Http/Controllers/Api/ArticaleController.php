<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Media\Media;
use App\Http\Requests\StoreArticaleRequest;
use App\Http\Requests\UpdateArticaleRequest;
use App\Http\Services\ArticalesService;
use App\Http\Services\CategoriesService;
use App\Traits\ApiRespone;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticaleController extends Controller

{
    use ApiRespone;

    private $articaleProvider, $categoriesService;

    public function __construct(ArticalesService $articaleProvider, CategoriesService $categoriesService)
    {
        $this->articaleProvider = $articaleProvider;
        $this->categoriesService = $categoriesService;
    }

    public function index(Request $request, int $id = 0 ):JsonResponse
    {
        if(!$id) {
            $respone = match (strtoupper($request->method())) {
                'GET' => $this->getArticales(),
                'POST' => $this->store($request)
            };
            return $respone;
        }
        $respone = match (strtoupper($request->method())) {
            'GET' => $this->getArticaleWithCategories($id),
            'PUT' => $this->update($request,$id),
            'DELETE'=>$this->destroy($id)
        };
        return $respone;
    }
    public function getArticaleWithCategories($id):JsonResponse{
        $articale= $this->articaleProvider->getArticale($id);
        $categories = $this->categoriesService->getCategories();
        return $this->SendData('',[compact('articale'), compact('categories')]);
    }
    public function getArticales(){
        $articales =$this->articaleProvider->getArticales();
      return $this->SendData('',['articles'=>compact('articales')]);
    }
    public function store(Request $request)
    {
        if ($this->articaleProvider->storeArticale($request)) {
            return $this->success('Articale Created Successfully');
        }
        return $this->error('Some Thing Wrong', 400);
    }

    public function update(Request $request, int $id)
    {
        if($this->articaleProvider->updateArticale($id,$request))
            return $this->success('Articales Updated Successfully');
        return $this->error('Some Thing Wrong',400);
    }


    public function destroy(int $id)
    {
        $this->articaleProvider->deleteArticale($id);
        return $this->success('Articales Deleted');
    }
}



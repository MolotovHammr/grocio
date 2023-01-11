<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCatalogueRequest;
use App\Services\CatalogueService;
use Illuminate\Http\Response as HttpResponse;


class CatalogueController extends Controller
{
    public function store(StoreCatalogueRequest $request, CatalogueService $catalogueService): HttpResponse
    {
        try {
            $data = $request->validated();
            $catalogue =$catalogueService->create($data);

            return response(
                [  
                    'catalogue' => $catalogue,
                    'message' => 'Catalogue succesfully created' 
                ], 201 );
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    

    public function show(Int $catalogueId, CatalogueService $catalogueService): HttpResponse
    {
        try {
            $catalogue = $catalogueService->show($catalogueId);

            return response(['catalogue' => $catalogue], 200 );
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuickNoteRequest;
use App\Http\Requests\UpdateQuickNoteRequest;
use App\Services\QuickNoteService;
use Illuminate\Http\Request;

class QuickNoteController extends Controller
{
    public function create(StoreQuickNoteRequest $request, QuickNoteService $quickNoteService)
    {
        try {
            $data  = $request->validated();
            $quickNote =  $quickNoteService->create($data);

            return response([
                'quickNote' => $quickNote,
                'message' => 'Quick note succesfully created'
            ], 201);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(UpdateQuickNoteRequest $request,  QuickNoteService $quickNoteService)
    {
        try {
            $data  = $request->validated();
            $quickNote =  $quickNoteService->create($data);

            return response([
                'quickNote' => $quickNote,
                'message' => 'Quick note succesfully updated'
            ], 200);
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

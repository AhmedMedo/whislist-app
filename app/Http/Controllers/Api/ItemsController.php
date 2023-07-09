<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Resources\ItemResource;
use App\Services\Interfaces\ItemServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function __construct(private readonly ItemServiceInterface $itemService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return ItemResource::collection($this->itemService->all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request):JsonResponse
    {
        $item = $this->itemService->store($request->validated());

        return $this->successResponseWithData((new ItemResource($item))->toArray(request()));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        return $this->successResponseWithData((new ItemResource($this->itemService->show($id)))->toArray(request()));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, string $id): JsonResponse
    {
        $item = $this->itemService->update($request->validated(), $id);

        return $this->successResponseWithData((new ItemResource($item))->toArray(request()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $this->itemService->delete($id);

        return $this->successResponseWithMessage(__('Item has been deleted successfully'), 200);
    }

    public function statistics(): JsonResponse
    {
        return $this->successResponseWithData($this->itemService->getStatistics());
    }
}

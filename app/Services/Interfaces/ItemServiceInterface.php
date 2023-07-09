<?php

namespace App\Services\Interfaces;

use App\Models\Item;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface ItemServiceInterface
{
    public function all(): LengthAwarePaginator;

    public function store($data): Item;

    public function show($id): Item;

    public function update($data, $id): Item;

    public function delete($id): bool;

    public function getStatistics(): array;
}

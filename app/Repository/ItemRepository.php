<?php

namespace App\Repository;

use App\Models\Item;
use App\Repository\Interfaces\ItemRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ItemRepository implements ItemRepositoryInterface
{

    public function all(): LengthAwarePaginator
    {
        return Item::paginate(request()->query('limit', 10));
    }

    public function store($data): Item
    {
        return Item::create($data);
    }

    public function show($id): Item
    {
        return Item::findOrFail($id);
    }

    public function update($data, $id): Item
    {
        $item = Item::findOrFail($id);
        $item->update($data);
        return $item;
    }

    public function getTotalPriceForItemsForCurrentMonth(): float
    {
        return Item::whereMonth('created_at', now()->month)->sum('price');
    }

    public function getAveragePriceForItemsForCurrentMonth(): float
    {
        return Item::whereMonth('created_at', now()->month)->avg('price');
    }

    public function delete($id): bool
    {
        $item = Item::findOrFail($id);
        return $item->delete();
    }
}

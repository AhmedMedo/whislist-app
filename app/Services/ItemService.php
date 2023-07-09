<?php

namespace App\Services;

use App\Models\Item;
use App\Repository\Interfaces\ItemRepositoryInterface;
use App\Services\Interfaces\ItemServiceInterface;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ItemService implements ItemServiceInterface
{


    public function __construct(private readonly ItemRepositoryInterface $itemRepository)
    {
    }

    public function all(): LengthAwarePaginator
    {
        return $this->itemRepository->all();
    }

    public function store($data): Item
    {
        return $this->itemRepository->store($data);
    }

    public function show($id): Item
    {
        return $this->itemRepository->show($id);
    }

    public function update($data, $id): Item
    {

        return $this->itemRepository->update($data, $id);
    }

    public function getStatistics(): array
    {
       return  [
           'total_price' => $this->itemRepository->getTotalPriceForItemsForCurrentMonth(),
           'average_price' => round($this->itemRepository->getAveragePriceForItemsForCurrentMonth(),2),
       ];
    }

    public function delete($id): bool
    {
        return $this->itemRepository->delete($id);
    }
}

<?php

namespace App\Repository\Interfaces;

use App\Models\Item;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ItemRepositoryInterface
{
    public function all():LengthAwarePaginator;

    public function store($data):Item;

    public function show($id):Item;

    public function update($data, $id):Item;

    public function delete($id):bool;

    public function getTotalPriceForItemsForCurrentMonth():float;

    public function getAveragePriceForItemsForCurrentMonth():float;

}

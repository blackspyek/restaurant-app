<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface BasketRepositoryContract
{
    /**
     * Add dish to the basket.
     *
     * @param int $id
     * @param int $qty
     * @return void
     */
    public function add(int $id, int $qty): void;

    /**
     * Get current qty of the dish in the basket.
     *
     * @param int $id
     * @return int
     */
    public function getCurrentQty(int $id): int;

    /**
     * Get all dishes in the basket
     *
     * @return array
     */
    public function all(): array;

    /**
     * Removes a dish from the basket
     *
     * @param int $id
     * @return void
     */
    public function remove(int $id): void;

    /**
     * Fetches dishes from the database that are in the basket, and for each dish, creates an object with the following properties:
     *
     * @return Collection
     */
    public function getDishes(): Collection;

    /**
     * Clears the basket
     *
     * @return void
     */
    public function clearBasket(): void;
}

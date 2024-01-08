<?php

namespace App\Repositories\Session;

use App\Models\Dish;
use App\Repositories\Contracts\BasketRepositoryContract;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Collection;

class BasketRepository implements BasketRepositoryContract
{
    private Session $session;

    private array $basket;
    /**
     * BasketRepository constructor.
     *
     * @param \Illuminate\Contracts\Session\Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
        $this->basket = $this->all();
    }

    /**
     * @inheritDoc
     */
    public function all(): array
    {
        return $this->session->get('basket', []);
    }
    /**
     * @inheritDoc
     */
    public function add(int $id, int $qty): void
    {
        $this->session->put($this->identity($id), $qty);
    }

    /**
     * Get item identity.
     *
     * @param int $id
     * @return string
     */
    private function identity(int $id) : string
    {
        return "basket.{$id}";
    }

    /**
     * @inheritDoc
     */
    public function getCurrentQty(int $id): int
    {
        return $this->session->get($this->identity($id), 0);
    }


    /**
     * @inheritDoc
     */
    public function remove(int $id): void
    {
        $this->session->remove($this->identity($id));
    }

    /**
     * @inheritDoc
     */
    public function getDishes():  Collection
    {

        if (empty($this->basket)) {
            return collect();
        }

        return Dish::whereIn('id', array_keys($this->basket))
            ->get()
            ->map(function (Dish $dish) {
                return (object)[
                    'id' => $dish->id,
                    'pizza_id' => $dish->pizza_id,
                    'name' => $dish->dish_name,
                    'price' => $dish->dish_price,
                    'qty' => $qty = $this->basket[$dish->id],
                    'total' => $dish->dish_price * $qty
                ];
            });


    }

    /**
     * @inheritDoc
     */
    public function clearBasket(): void
    {
        $this->session->put('basket', []);
    }
}

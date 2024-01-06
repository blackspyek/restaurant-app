<?php

use App\Repositories\Contracts\BasketRepositoryContract;

// IF instance of BasketRepositoryContract does not exist, create one
if (!function_exists('basket')) {

    function basket(): BasketRepositoryContract
    {
        return app(BasketRepositoryContract::class);
    }
}

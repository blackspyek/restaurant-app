<div id="bas">
    @if($toggle)
        <div style="left: -10px; " class="position-absolute mt-2 ">
            <div class="container  ">
                <div class="row">
                    <ul class="list-group">
                        @forelse($dishes as $dish)


                        <li class="list-group-item">
                            <span>{{ $dish->name }}</span>
                            <span class="quant ms-2">Price: {{ $dish->price }}$</span>
                            <span class="quant ms-2">Quantity: {{ $dish->qty }}
                            <i wire:click="decrease({{$dish->id}})" class="fa-solid fa-minus mt-3 me-1"></i>
                            <i wire:click="increase({{$dish->id}})" class="fa-solid fa-plus"></i>
                            </span>

                        </li>
                        @empty
                            <li class="list-group-item">
                                Your basket is empty
                            </li>

                            @endforelse

                        <button class="list-group-item" id="checkoutLink">
                            Check Out
                            <span id="basketValue">{{$total}} $</span>
                        </button>

                    </ul>


                </div>
            </div>

        </div>
    @endif
</div>

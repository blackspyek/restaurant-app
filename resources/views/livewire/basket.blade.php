<div>
    @if($toggle)
        <div id="bas" class="position-absolute mt-2 ">
            <div class="container  bas-content">
                <div class="row">
                    <ul class="list-group">
                        @forelse($dishes as $dish)

                            <li class="list-group-item">
                                <span>{{ $dish->name }}</span>
                                <span class="quant ms-2">Price: {{ $dish->price }}$</span>
                                <span class="quant ms-2">Quantity: {{ $dish->qty }}


                            </span>
                                <div class="d-flex basket-action">
                                    <i wire:click="decrease({{$dish->id}})" class="fa-solid fa-minus basket-action-element"></i>
                                    <i wire:click="increase({{$dish->id}})" class="fa-solid fa-plus basket-action-element"></i>
                                </div>

                            </li>

                        @empty
                            <li class="list-group-item">
                                Your basket is empty
                            </li>

                        @endforelse
                        <a href="{{ route("showCheckout") }}" class="list-group-item" id="checkoutLink">
                            Check Out
                            <span id="basketValue">{{$total}} $</span>
                        </a>


                    </ul>


                </div>
            </div>

        </div>
    @endif
</div>

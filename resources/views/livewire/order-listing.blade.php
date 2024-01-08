<div class="col">
    <div class="card" id="orderCard">
        <div class="card-body">

            <h5 class="card-title">Order</h5>
            <div class="card-text">
                <ul class="list-group list-group-light">
                    @forelse($dishes as $dish)
                    <li wire:key="{{$dish->id}}" class="list-group-item">
                        <div class=" d-flex gap-3">
                            <p class="qty">{{$dish->qty}}x</p>
                            <p class="name">{{ $dish->name }}</p>
                            <p class="price"> {{ $dish->price }}$</p>
                        </div>
                        @if($dish->pizza_id != null)
                            @foreach($ingredients[$dish->pizza_id] as $ingredient)
                                @if($loop->last)
                                    <span class="m-1">{{$ingredient}}</span>
                                @else
                                    <span class="m-1">{{$ingredient}}</span>,
                                @endif


                            @endforeach
                        @endif

                    </li>
                    @empty
                        <li class="list-group-item">
                            Your basket is empty, add something to basket first!
                        </li>

                    @endforelse
                </ul>


            </div>
            <p>Summary: {{$total}} $</p>
        </div>
    </div>
</div>

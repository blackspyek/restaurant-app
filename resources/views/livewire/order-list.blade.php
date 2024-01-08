<div wire:poll>
    <div class="row gap-3" >
        @foreach($orders as $order)
            <div wire:key="{{$loop->index}}" class="d-flex orderElement" >
                <div class="col">
                    <p>{{ $order["formattedDate"] }}</p>
                </div>
                <div class="col">
                    <p>{{ $order["order_header_id"] }}</p>
                </div>
                <div class="col">
                    @if($order["order_status_name"] == "confirmed")
                        <span class="text-success">{{$order["order_status_name"]}}</span>
                    @else
                        <span class="text-warning">{{$order["order_status_name"]}}</span>
                    @endif
                </div>

                <div class="col">
                    <div class="r-no">
                        @foreach($order["items"] as $item)
                            <p>{{$item["dish_name"]}}</p>
                        @endforeach

                    </div>
                </div>
                <div class="col">
                    <div>
                        <p>{{$order["total_price"]}} $</p>
                    </div>
                </div>
                <div class="col">
                    <div>
                        <span class="text-success">{{$order["payment_status_name"]}} </span>

                    </div>
                </div>
                <div class="col">
                    <div>
                        @if( $order["delivery_type_Id"]  == 1)
                            <span class="text-success">Yes</span>
                        @else
                            <span class="text-warning">No</span>
                        @endif
                    </div>
                </div>
                <div class="col">
                    <livewire:show-customer wire:key="{{$loop->index}}" :order="$order"/>
                </div>
                <div class="col">
                    <div>
                        @if($order["note"] != "NULL")
                            <p>{{$order["note"]}}</p>
                        @endif

                    </div>
                </div>
                <div class="col">
                    <div>
                        @if($order["order_status_name"] == "Received")
                            <livewire:accept-order :orderId="$order['order_header_id']" wire:key="$loop->index"/>
                        @endif
                        <i class="fa-solid fa-gear"></i>
                        <i class="fa-solid fa-map"></i>
                        <i class="fa-solid fa-ban"></i>
                    </div>
                </div>

            </div>

        @endforeach
    </div>
</div>

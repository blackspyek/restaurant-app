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

                        <div class="d-flex gap-1" >
                        @if($order["order_status_name"] == "Received")
                            <livewire:accept-order :orderId="$order['order_header_id']" wire:key="accept{{$loop->index}}"/>
                            <livewire:cancel-order :orderId="$order['order_header_id']" wire:key="cancel{{$loop->index}}"/>
                        @else
                                <i class="fa-solid fa-gear"
                                   wire:key="management{{$loop->index}}"
                                   wire:click="$dispatch('show-order-management-modal', { orderData: {{ $order['order_header_id'] }}, orderStatus:  '{{ $order['order_status_name'] }}' })"

                                   type="button"
                                   data-mdb-ripple-init data-mdb-modal-init>
                                </i>

                        @endif
                            <a href="https://www.google.com/maps/dir/?api=1&origin=Lublin+Nadbystrzycka+21B&destination={{$order['city_name']}}+{{$order['street_name']}}+{{$order['building_number']}}">
                                <i class="fa-solid fa-map"></i>
                            </a>
                        </div>



                    </div>
                </div>

            </div>

        @endforeach
            <div wire:ignore>
                <livewire:show-order-management-modal />
            </div>
    </div>
</div>

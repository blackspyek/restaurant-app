<div>
    <div>
        <div wire:ignore.self class="modal fade" id="managementModal" tabindex="-1"
             aria-labelledby="managementModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="managementModalLabel">Manage Order ID: {{$order}}</h5>
                        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col">
                                <div class="d-flex justify-content-center">
                                    <h5>Order Status:</h5>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <select wire:model="currStatus"   class="form-select" aria-label="Select order status">
                                        @foreach($orderStatuses as $orderStatusItem)
                                            @if($orderStatusItem->Order_status_name == $orderStatus)
                                                <option selected value="{{$orderStatusItem->id}}">{{$orderStatus}}</option>
                                            @else
                                                <option value="{{$orderStatusItem->id}}">{{$orderStatusItem->Order_status_name}}</option>
                                            @endif

                                        @endforeach


                                    </select>
                                </div>
                                <button wire:click="updateOrderStatus" class="btn btn-primary" type="button">Change</button>

                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

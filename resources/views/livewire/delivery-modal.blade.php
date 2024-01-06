<div>

    <div class="modal fade" id="deliveryMethodModal" tabindex="-1" aria-labelledby="deliveryMethodModalTitle"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deliveryMethodModalTitle">Delivery method</h5>
                    <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body ">

                    <div class="d-flex flex-column">
                        <input type="radio" class="btn-check deliveryMethodsInputs" value="PickUp"
                               wire:model="deliveryMethod" name="deliveryMethod" id="pickupMethod" autocomplete="off"
                               checked
                               data-mdb-ripple-init
                               data-mdb-dismiss="modal"
                        />
                        <label wire:click="setDeliveryType" class="btn btn-secondary deliveryMethods text-start"
                               for="pickupMethod" id="pickupMethodLabel" data-mdb-ripple-init >
                            <i class="fa-solid fa-truck-pickup "></i>
                            <span class="labelText">PickUp</span>
                            <i class="fa-solid fa-check" style="color: #14cc30;"></i>
                        </label>

                        <input type="radio" class="btn-check deliveryMethodsInputs" value="Delivery"
                               wire:model="deliveryMethod" name="deliveryMethod" id="deliveryMethod"
                               autocomplete="off"
                               data-mdb-ripple-init
                               data-mdb-dismiss="modal"
                        />
                        <label wire:click="setDeliveryType" class="btn btn-secondary deliveryMethods text-start"
                               for="deliveryMethod" data-mdb-ripple-init>
                            <i class="fa-solid fa-box"></i>
                            <span class="labelText">Delivery</span>
                            <i class="fa-solid fa-check" style="color: #14cc30;"></i>
                        </label>

                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

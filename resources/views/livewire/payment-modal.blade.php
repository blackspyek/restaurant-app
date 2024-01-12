<div>
    <div class="modal fade" id="paymentMethodModal" tabindex="-1" aria-labelledby="paymentMethodModalTitle"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentMethodModalTitle">Payment method</h5>
                    <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body ">

                    <div class="d-flex flex-column">
                        <input type="radio" value="Upon receipt" class="btn-check paymentMethodsInputs" name="paymentMethod"
                               id="uponReceiptMethod" autocomplete="off" checked
                               wire:model="paymentMethod"
                               data-mdb-ripple-init
                               data-mdb-dismiss="modal"
                        />
                        <label wire:click="setPaymentType" class="btn btn-secondary paymentMethods text-start" for="uponReceiptMethod"
                               id="paymentMethodLabel" data-mdb-ripple-init>
                            <i class="fa-solid fa-truck-pickup "></i>
                            <span class="labelText">Upon receipt</span>
                            <i class="fa-solid fa-check paymentIcon" style="color: #14cc30;"></i>
                        </label>

                        <input type="radio" class="btn-check paymentMethodsInputs" name="paymentMethod"
                               value="Przelewy24"
                               id="przelewyMethod" autocomplete="off"
                               wire:model="paymentMethod"
                               data-mdb-ripple-init
                               data-mdb-dismiss="modal"
                               disabled
                        />
                        <label wire:click="setPaymentType" class="btn btn-secondary paymentMethods text-start" for="przelewyMethod"
                               data-mdb-ripple-init>
                            <i class="fa-solid fa-box"></i>
                            <span class="labelText">Przelewy24</span>
                            <i class="fa-solid fa-check paymentIcon" style="color: #14cc30;"></i>
                        </label>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<div class="row gap-3 mb-3">
    <div class="d-flex align-items-center gap-3 border rounded p-3 modalActivators" data-mdb-ripple-init
         data-mdb-modal-init data-mdb-target="#deliveryMethodModal">
        <div>
            <i class="fa-solid fa-truck"></i>
        </div>
        <div class="card gap-0">
            <h5 class="card-title mb-0 fw-bolder ">Delivery method</h5>
            <p class="card-text">
                @if($deliveryMethod)
                    {{$deliveryMethod}}
                @else
                    Select delivery method
                @endif
            </p>


        </div>
    </div>
    <div class="d-flex align-items-center gap-3 border rounded p-3 modalActivators" data-mdb-ripple-init
         data-mdb-modal-init data-mdb-target="#paymentMethodModal"
    ">
    <div>
        <i class="fa-solid fa-money-bill"></i>
    </div>
    <div class="card">
        <h5 class="card-title mb-0 fw-bolder">Payment method</h5>
        <p class="card-text">
            @if($paymentMethod)
                {{$paymentMethod}}
            @else
                Select payment method
            @endif

        </p>

    </div>
</div>
</div>

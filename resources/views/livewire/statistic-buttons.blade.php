<div>
    <i class="fa-solid fa-user p-2" wire:click="$dispatch('show-customer-modal', { orderData: {{ $order }} })" type="button" data-mdb-ripple-init data-mdb-modal-init></i>
    @if($order->DeliveryTypeName == "Delivery")
    <i class="fa-solid fa-map" wire:click="$dispatch('show-address-modal', { orderData: {{ $order }} })"  type="button"></i>
    @endif

</div>

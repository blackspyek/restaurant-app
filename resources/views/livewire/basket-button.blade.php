<div>
    <div class="container basket-btn-container">
        <button wire:click="toggle" type="button" class="btn btn-primary basket-btn">
            <div class="d-flex align-items-center basket-button-content">
                @if($qty > 0)
                    <span class="me-1">{{ $qty }}</span>
                @endif
                <i class="fas fa-shopping-basket"></i>
            </div>
        </button>
    </div>

</div>

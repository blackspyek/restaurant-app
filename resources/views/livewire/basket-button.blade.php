<div>
    <div class="container">
        <button wire:click="toggle" type="button" class="btn btn-primary">
            <div class="d-flex align-items-center">
                @if($qty > 0)
                    <span class="me-1">{{ $qty }}</span>
                @endif
                <i class="fas fa-shopping-basket"></i>
            </div>
        </button>
    </div>

</div>

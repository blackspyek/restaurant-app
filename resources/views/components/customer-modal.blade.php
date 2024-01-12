<div>
    <div class="modal fade" id="customerModal{{$orderId}}" tabindex="-1" aria-labelledby="customerModalLabel{{$orderId}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customerModalLabel{{$orderId}}">Customer Data</h5>
                    <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>First name: {{$name}}  </p>
                    <p>Last name:  {{$lastname}}</p>
                    <p>Phone number:  {{$phone}}</p>
                    <p>Email:  {{$email}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" data-mdb-ripple-init>Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

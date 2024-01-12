<div>
    <div>
        <div wire:ignore.self class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="customerModalLabel">Customer Data</h5>
                        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>First Name: <span class="modalData">{{$CustomerName}}</span>  </p>
                        <p>Last Name: <span class="modalData">{{$CustomerSurname}}</span></p>
                        <p>Email: <span class="modalData">{{$CustomerEmail}}</span></p>
                        <p>Phone Number:  <span class="modalData">{{$CustomerPhoneNumber}}</span></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

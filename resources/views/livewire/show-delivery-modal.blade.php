<div>
    <div>
        <div wire:ignore.self class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addressModalLabel">Delivery Data</h5>
                        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <p>CityName: <span class="modalData">{{$CityName}}</span>  </p>
                            <p>StreetName: <span class="modalData">{{$StreetName}}</span></p>
                            <p>BuildingNumber: <span class="modalData">{{$BuildingNumber}}</span></p>
                            <p>ApartmentNumber: <span class="modalData">{{$ApartmentNumber}}</span></p>
                            <p>ZipCode: <span class="modalData">{{$ZipCode}}</span></p>
                            @if($FloorNumber)
                                <p>FloorNumber: <span class="modalData">{{$FloorNumber}}</span></p>
                            @endif
                        <p>
                            <a href="https://www.google.com/maps/dir/?api=1&origin=Lublin+Nadbystrzycka+21B&destination={{$CityName}}+{{$StreetName}}+{{$BuildingNumber}}">Google maps link</a>

                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

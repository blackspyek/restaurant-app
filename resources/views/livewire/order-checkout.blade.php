<div>
    @if($visible)
        <form wire:submit.prevent="validateData">

            <livewire:delivery-modal/>
            <livewire:payment-modal/>
            <div class="container">
                <div id="mainRow" class="row gap-2">
                    <div class="col-8">
                        <livewire:order-modal/>
                        @error('deliveryMethod') <p class="error">{{ $message }}</p> @enderror
                        @error('paymentMethod') <p class="error">{{ $message }}</p> @enderror

                        @if($deliveryMethod == 'Delivery')
                            <div class="container orderData">
                                <h4 class="mb-3">Delivery Address</h4>

                                <div class="row">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="streetName">Street</label>
                                            <input wire:model="street_name" type="text" class="form-control"
                                                   id="streetName"
                                                   aria-describedby="streetHelp" placeholder="Enter street name"
                                                   maxlength="250"
                                                   required pattern="^[A-Za-z0-9\s.'-]{2,}$">
                                            @error('street_name') <p class="error">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                    <div class="col colGap">
                                        <div class="form-group">
                                            <label for="buildingNumber">Building number</label>
                                            <input wire:model="building_number" type="text" class="form-control"
                                                   id="buildingNumber"
                                                   aria-describedby="buildingNumberHelp"
                                                   placeholder="Enter building number"
                                                   required
                                            >
                                            @error('building_number') <p class="error">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="gatewayCode">Gateway code (optional)</label>
                                            <input wire:model="gateway_code" type="text" class="form-control"
                                                   id="gatewayCode"
                                                   aria-describedby="gatewayCode" placeholder="Enter gateway code"
                                                   maxlength="25"
                                            >
                                            @error('gateway_code') <p class="error">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                    <div class="col ">

                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input wire:model="city_name" type="text" class="form-control" id="city"
                                                   aria-describedby="citylHelp" placeholder="Enter city"
                                                   maxlength="250"
                                                   required
                                            >
                                            @error('city_name') <p class="error">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                    <div class="col colGap">
                                        <div class="form-group">
                                            <label for="apartmentNumber">Apartment number </label>
                                            <input wire:model="apartment_number" type="text" class="form-control"
                                                   id="apartmentNumber"
                                                   aria-describedby="apartmentlHelp"
                                                   placeholder="Enter apartment number"
                                                   maxlength="10"
                                                   required
                                            >
                                            @error('apartment_number') <p class="error">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="floor">Floor (optional)</label>
                                            <input wire:model="floor_number" type="text" class="form-control" id="floor"
                                                   aria-describedby="floorHelp" placeholder="Enter floor"
                                                   maxlength="10"
                                                   pattern="[a-zA-Z0-9]+"
                                            >
                                            @error('floor_number') <p class="error">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                    <div class="col colGap">
                                        <div class="form-group">
                                            <label for="zipCode">Zip code</label>
                                            <input wire:model="zip_code" type="text" class="form-control" id="zipCode"
                                                   aria-describedby="zipCodeHelp" placeholder="Enter zip code"
                                                   minlength="5"
                                                   pattern="[0-9]{2}-[0-9]{3}"
                                                   required
                                            >
                                            @error('zip_code') <p class="error">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="companyName">Company name (optional)</label>
                                            <input wire:model="company_name" type="text" class="form-control"
                                                   id="companyName"
                                                   aria-describedby="emailHelp" placeholder="Enter company name"
                                                   maxlength="100"
                                            >
                                            @error('company_name') <p class="error">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                    <div class="col colGap">
                                        <div class="form-group">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="container orderData">
                            <h4 class="mb-3 mt-3 ">Personal data</h4>

                            <div class="row">

                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">First and Last name</label>
                                        <input wire:model="name" type="text" class="form-control" id="name"
                                               aria-describedby="nameHelp" placeholder="Enter your first and last name"
                                               maxlength="150"
                                               minlength="6"
                                               pattern="[A-Za-z]+[ ][A-Za-z]+"
                                               required
                                        >
                                        @error('name') <p class="error">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="col colGap">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input wire:model="email" type="email" class="form-control" id="email"
                                               aria-describedby="emailHelp" placeholder="youremail@email.com"
                                               maxlength="150"
                                               required
                                        >
                                        @error('email') <p class="error">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col">
                                    <div class="form-group">
                                        <label for="phoneNumber">Phone number</label>
                                        <input wire:model="phone_number" type="tel" class="form-control"
                                               id="phoneNumber"
                                               aria-describedby="phoneNumberHelp" placeholder="Enter your phone number"
                                               pattern="[0-9]{9}"
                                               required
                                        >
                                        @error('phone_number') <p class="error">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="col colGap">
                                    <label for="note">Add a note (optional)</label>
                                    <input wire:model="note" type="text" class="form-control" id="note"
                                           aria-describedby="noteHelp"
                                           placeholder="e.g.: Please do not use the bell. The baby is sleeping."
                                           maxlength="250"
                                    >
                                    @error('note') <p class="error">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="d-flex formBtns gap-4 ">
                                <button type="submit" class="btn btn-light formBtn">Cancel</button>
                                <button type="submit" class="btn btn-warning formBtn">Order</button>
                            </div>
                        </div>


                    </div>

                    <livewire:order-listing/>

                </div>

            </div>
        </form>
    @endif
    @if($visible == false)
            <livewire:waiting-modal :orderId="$this->orderId"/>
    @endif

</div>

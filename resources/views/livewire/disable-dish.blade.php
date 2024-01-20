<div>


        <table class="table">
            <thead>
            <tr>
                <th scope="col">Enable</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Last Update</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dishes as $dish)
            <tr>
                <td >
                    <label for="flexCheckDefault"></label>
                    <input wire:model="dishCheck" class="form-check-input" type="checkbox" value="{{$dish->id}}" id="flexCheckDefault" />
                </td>
                <td>#{{$dish->id}}</td>
                <td>{{$dish->dish_name}}</td>
                @if($dish->status == 1)
                    <td>Available</td>
                @else
                    <td>Disabled</td>
                @endif
                <td>{{$dish->updated_at}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <button wire:click="disableSelected" class="btn btn-primary ms-4">Disable</button>
</div>

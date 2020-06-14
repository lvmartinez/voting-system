@if(count($nominationsSelected) == 0)
    <div class="alert alert-info">Nominees not selected</div>
@else

        @foreach($nominationsSelected as $nomination)
            <div class="col-md-4">
                @include('nominations.profile_card')
            </div>
        @endforeach

@endif

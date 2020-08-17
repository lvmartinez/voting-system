@if(count($nominationsSelected) == 0)
    <div class="alert alert-info">Nominees not selected</div>
@else
    <!-- footer-top -->
    <div class="footer-top">
        <div class="container">
            <div class="footer-grids">
    @foreach($nominationsSelected as $nomination)

                    <figure class="effect-winston">
                        @include('nominations.election-profile_card')
                    </figure>


    @endforeach
            </div>
        </div>
    </div>
    <!-- //footer-top -->
@endif

<div class="col-md-12">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">

            @if (Auth::user()->role_id == 4)
                <li class="active"><a href="#nomination" data-toggle="tab" aria-expanded="true">Nomination</a></li>
            @endif

            <li class="@if (Auth::user()->role_id != 4)active @endif"><a href="#allnom" data-toggle="tab" aria-expanded="false">All Nominees</a></li>

        </ul>
        <div class="tab-content">
            <div class="tab-pane container @if (Auth::user()->role_id == 4) active @endif" id="nomination"><br>
                <h3 class="title">Your Nomination</h3>
                <div class="row">
                    @if( !isset($hasNominatedBefore) || $hasNominatedBefore == 0)
                        <h4>Nominate a candidate</h4><br>
                        @if ($isNominationPeriod == 'yes' && $isVotingPeriod == 'no')
                            {!! Form::open(['route' => 'nominations.store', 'enctype' => 'multipart/form-data']) !!}

                            @include('nominations.fields')

                            {!! Form::close() !!}
                        @else
                            <small>Nomination period is over</small>
                        @endif

                    @else

                        <div class="footer-top">
                            <div class="container">
                                <div class="footer-grids">
                                    @if(!empty($nomination))
                                        <figure class="effect-winston">
                                            @include('nominations.election-profile_card')
                                        </figure>
                                    @else
                                        <small>You made no nomination. Please go to All Nominees tab to vote</small>
                                    @endif
                                </div>
                            </div>
                        </div>

                    @endif

                </div>

            </div>

            <div class="tab-pane container @if (Auth::user()->role_id != 4) active @endif" id="allnom">
                <h3 class="title">Vote for a candidate</h3><br>
                <div class="box box-primary">
                    <div class="box-body">
                        @if ($isNominationPeriod == 'yes' && $isVotingPeriod == 'no')
                            <small>Nomination period still available</small>
                        @endif

                        @if (Auth::user()->role_id != 4 || $isVotingPeriod == 'yes')
                            @include('nominations.election-selected_nominees_table')
                        @endif


                    </div>
                </div>
                @if (Auth::user()->role_id != 4)
                    <h2>All Nominees</h2>
                    <div class="box box-primary">
                        <div class="box-body">

                            @include('nominations.table')

                        </div>
                    </div>
                @endif
            </div>
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->

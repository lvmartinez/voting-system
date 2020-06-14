
        <div class="col-md-2">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
                <img style="width: 100%" class=img-circle" src="@if ($category->image != null)../storage/upload/images/category/{{ $category->id }}_{{ $category->image }} @endif" >

                <h3 class="profile-username text-center">{{ $category->name }}</h3>

              <p class="text-muted text-center">Last updated: {{ $category->updated_at-> format('M d Y') }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>No. Nominees</b> <a class="pull-right">{{count($nominations)}}</a>
                </li>
                <li class="list-group-item">
                  <b>No. Nominations</b> <a class="pull-right">{{$sum_no_of_nominations}}</a>
                </li>
                <li class="list-group-item">
                  <b>Total Votes</b> <a class="pull-right">{{$totalVotes}}</a>
                </li>
              </ul>

                @if (Auth::user()->role_id < 4)
                    {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>

                        <a href="{{ route('categories.edit', [$category->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}

                    </div>
                @endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
        <div class="col-md-10">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                @if (Auth::user()->role_id == 4)
                    <li class="active"><a href="#nomination" data-toggle="tab" aria-expanded="true">My Nomination</a></li>
                @endif

                <li class="@if (Auth::user()->role_id != 4)active @endif"><a href="#allnom" data-toggle="tab" aria-expanded="false">All Nominees</a></li>

            </ul>
            <div class="tab-content">
              <div class="tab-pane  @if (Auth::user()->role_id == 4) active @endif" id="nomination">
                <h2>Nominate a candidate</h2>
                <div class="row">
                    @if( !isset($hasNominatedBefore) || $hasNominatedBefore == 0)
                        @if ($isNominationPeriod == 'yes' && $isVotingPeriod == 'no')
                            {!! Form::open(['route' => 'nominations.store', 'enctype' => 'multipart/form-data']) !!}

                                @include('nominations.fields')

                            {!! Form::close() !!}
                        @else
                            Nomination period is over
                        @endif

                    @else
                        @include('nominations.profile_card')
                    @endif

                </div>

              </div>

              <div class="tab-pane @if (Auth::user()->role_id != 4) active @endif" id="allnom">
                  <h2>Selected Nominees</h2>
                  <div class="box box-primary">
                      <div class="box-body">
                          @if ($isNominationPeriod == 'yes' && $isVotingPeriod == 'no')
                              Nomination period still available
                          @endif

                          @if (Auth::user()->role_id != 4 || $isVotingPeriod == 'yes')
                              @include('nominations.selected_nominees_table')
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

@if ($nomination != null)

                    <img src="@if ($nomination->image != null)../storage/upload/images/nomination/{{ $nomination->id }}_{{ $nomination->image }} @else https://cdn.onlinewebfonts.com/svg/img_258083.png @endif" alt="" class="img-responsive one" />
                    <figcaption>
                        <h2>{{ $nomination->name }}</h2>
                        <p>{{ $nomination->bio }}</p>

                        <ul class="social_icons">
                            @if( isset( $nomination->linkedin_url))
                                <li><a href="{{ $nomination->linkedin_url }}" target="_blank"><span class="label label-default">Linkedin</span></a> </li>

                            @endif
                            <li>
                                @if( !isset($checkVoted)  && ($nomination->is_admin_selected == 1) && Auth::user()->role_id == 4)

                                    {!! Form::open(['route' => 'votings.store']) !!}

                                    @include('votings.fields')

                                    {!! Form::close() !!}
                                @elseif( isset($checkVoted)  && $checkVoted['nomination_id'] == $nomination->id)
                                    <span class="label label-default">Voted</span>
                                @endif

                            </li>

                        </ul>
                    </figcaption>

@endif

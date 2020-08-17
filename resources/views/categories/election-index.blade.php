@extends('layouts.election-template')

@section('content')
    <div class="banner1">
        <div class="pull-right">
            <a href="{{ url('/logout') }}" class="btn btn-default btn-logout"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Sign out
            </a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        <div class="container">
            <div class="banner1-info">
                <h3>Welcome to the @if ($isNominationPeriod == 'yes' && $isVotingPeriod == 'no') Nomination
                    @elseif($isVotingPeriod == 'yes') Voting
                    @else Nomination and Voting
                    @endif system.</h3>
                <h3>Make your choice wisely</h3>
                <h4><i class="fa fa-asterisk"></i><i class="fa fa-asterisk"></i><i class="fa fa-asterisk"></i></h4>
                <h4> @if ($isNominationPeriod == 'yes' && $isVotingPeriod == 'no')
                        Nomination period from {{ $setting->nomination_start_date }} to {{ $setting->voting_end_date }}
                    @elseif($isVotingPeriod == 'yes') Voting
                    @endif</h4>
            </div>
        </div>
    </div>

    <div class="banner-bottom1">
        <div class="banner-bottom1-grids">
            @foreach($categories as $category)
            <div class="col-md-4 col-sm-6 col-xs-12 banner-bottom1-left banner-bottom1-left1">
                <div class="banner-bottom1-lft">
                    <i class="fa {{ $category->icon }}" aria-hidden="true"></i>
                    <h3><a href="{{ route('categories.show', [$category->id]) }}">
                            {{ $category->name }}
                        </a></h3>
                    <p>Last updated: {{ $category->updated_at-> format('M d Y') }}</p>
                </div>
            </div>
            @endforeach
            <div class="clearfix"> </div>
        </div>
    </div>

@endsection

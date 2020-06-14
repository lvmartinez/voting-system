<!-- Nomination Start Date Field -->
<div class="form-group">
    {!! Form::label('nomination_start_date', 'Nomination Start Date:') !!}
    <p>{{ $setting->nomination_start_date }}</p>
</div>

<!-- Nomination End Date Field -->
<div class="form-group">
    {!! Form::label('nomination_end_date', 'Nomination End Date:') !!}
    <p>{{ $setting->nomination_end_date }}</p>
</div>

<!-- Voting Start Date Field -->
<div class="form-group">
    {!! Form::label('voting_start_date', 'Voting Start Date:') !!}
    <p>{{ $setting->voting_start_date }}</p>
</div>

<!-- Voting End Date Field -->
<div class="form-group">
    {!! Form::label('voting_end_date', 'Voting End Date:') !!}
    <p>{{ $setting->voting_end_date }}</p>
</div>


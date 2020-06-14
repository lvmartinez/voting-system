<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $nomination->name }}</p>
</div>

<!-- Gender Field -->
<div class="form-group">
    {!! Form::label('gender', 'Gender:') !!}
    <p>{{ $nomination->gender }}</p>
</div>

<!-- Linkedin Url Field -->
<div class="form-group">
    {!! Form::label('linkedin_url', 'Linkedin Url:') !!}
    <p>{{ $nomination->linkedin_url }}</p>
</div>

<!-- Bio Field -->
<div class="form-group">
    {!! Form::label('bio', 'Bio:') !!}
    <p>{{ $nomination->bio }}</p>
</div>

<!-- Business Name Field -->
<div class="form-group">
    {!! Form::label('business_name', 'Business Name:') !!}
    <p>{{ $nomination->business_name }}</p>
</div>

<!-- Reason For Nomination Field -->
<div class="form-group">
    {!! Form::label('reason_for_nomination', 'Reason For Nomination:') !!}
    <p>{{ $nomination->reason_for_nomination }}</p>
</div>

<!-- No Of Nominations Field -->
<div class="form-group">
    {!! Form::label('no_of_nominations', 'No Of Nominations:') !!}
    <p>{{ $nomination->no_of_nominations }}</p>
</div>

<!-- Is Admin Selected Field -->
<div class="form-group">
    {!! Form::label('is_admin_selected', 'Is Admin Selected:') !!}
    <p>{{ $nomination->is_admin_selected }}</p>
</div>

<!-- Has Won Field -->
<div class="form-group">
    {!! Form::label('has_won', 'Has Won:') !!}
    <p>{{ $nomination->has_won }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $nomination->user_id }}</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', 'Category Id:') !!}
    <p>{{ $nomination->category_id }}</p>
</div>

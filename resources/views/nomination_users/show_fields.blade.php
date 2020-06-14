<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $nominationUser->user_id }}</p>
</div>

<!-- Nomination Id Field -->
<div class="form-group">
    {!! Form::label('nomination_id', 'Nomination Id:') !!}
    <p>{{ $nominationUser->nomination_id }}</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', 'Category Id:') !!}
    <p>{{ $nominationUser->category_id }}</p>
</div>


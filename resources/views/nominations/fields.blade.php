<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Full Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Gender:') !!}
    {!! Form::select('gender', ['female'=>'female', 'male'=>'male'], null, ['class' => 'form-control']) !!}
</div>

<!-- Linkedin Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('linkedin_url', 'Linkedin Url:') !!}
    {!! Form::text('linkedin_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Bio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bio', 'Bio:') !!}
    {!! Form::text('bio', null, ['class' => 'form-control']) !!}
</div>

<!-- Business Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('business_name', 'Business Name:') !!}
    {!! Form::text('business_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Reason For Nomination Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reason_for_nomination', 'Reason For Nomination:') !!}
    {!! Form::text('reason_for_nomination', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    @if (isset($category))
        {!! Form::hidden('category_id', $category->id ?? null, ['class' => 'form-control']) !!}
    @else
        {!! Form::label('category_id', 'Category:') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

    @endif
</div>

<!-- only admin can see this-->
@if (Auth::user()->role_id < 3)
<!-- Is Admin Selected Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_admin_selected', 'Selected for Voting:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_admin_selected', 0) !!}
        {!! Form::checkbox('is_admin_selected', '1', null) !!}
    </label>
</div>

<!-- Has Won Field -->
<div class="form-group col-sm-6">
    {!! Form::label('has_won', 'Won:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('has_won', 0) !!}
        {!! Form::checkbox('has_won', '1', null) !!}
    </label>
</div>
@endif

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('categories.index') }}" class="btn btn-default">Cancel</a>
</div>

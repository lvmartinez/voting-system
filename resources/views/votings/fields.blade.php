<!-- User Id Field
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>-->

<!-- Nomination Id Field
<div class="form-group col-sm-6">
    {!! Form::label('nomination_id', 'Nomination Id:') !!}
    {!! Form::number('nomination_id', null, ['class' => 'form-control']) !!}
</div>-->

<!-- Category Id Field
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category Id:') !!}
    {!! Form::number('category_id', null, ['class' => 'form-control']) !!}
</div>-->
@include('flash::message')
{!! Form::hidden('category_id', $category->id ?? null, ['class' => 'form-control']) !!}
{!! Form::hidden('nomination_id', $nomination->id ?? null, ['class' => 'form-control']) !!}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Vote', ['class' => 'btn btn-success btn-block']) !!}
    <!-- <a href="{{ route('votings.index') }}" class="btn btn-default">Cancel</a> -->
</div>

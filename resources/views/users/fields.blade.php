{{--
<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    @if (Auth::user()->role_id == 4)
        {!! Form::text('name', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
    @else
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @endif

</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    @if (Auth::user()->role_id == 4)
        {!! Form::text('email', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
    @else
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Email Verified At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    {!! Form::text('email_verified_at', null, ['class' => 'form-control','id'=>'email_verified_at']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#email_verified_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Remember Token Field -->
<div class="form-group col-sm-6">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    {!! Form::text('remember_token', null, ['class' => 'form-control']) !!}
</div>

--}}

@if (Auth::id() == $user->id)
<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>
@endif

<!-- Role Id Field -->
<div class="form-group col-sm-6">
    @if (Auth::user()->role_id == 4)
        {!! Form::hidden('role_id', $role->id ?? null, ['class' => 'form-control']) !!}
    @else
        {!! Form::label('role_id', 'Role:') !!}
        {!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}

    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
</div>

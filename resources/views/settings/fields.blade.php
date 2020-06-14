<!-- Nomination Start Date Field -->
<div class="col-sm-6">

    <div class="form-group">
        {!! Form::label('nomination_start_date', 'Nomination Start Date:') !!}
        <div class='input-group date' id='nomination_start_date'>
            {!! Form::text('nomination_start_date', null, ['class' => 'form-control','id'=>'nomination_start_date']) !!}
            <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
        </div>
    </div>
</div>

<!-- Nomination End Date Field -->
<div class="col-sm-6">
    <div class="form-group">
        {!! Form::label('nomination_end_date', 'Nomination End Date:') !!}
        <div class='input-group date' id='nomination_end_date'>
            {!! Form::text('nomination_end_date', null, ['class' => 'form-control','id'=>'nomination_end_date']) !!}
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
             </span>
        </div>
    </div>


</div>

@push('scripts')
    <script type="text/javascript">

        $(function () {
            $('#nomination_start_date').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                useCurrent: true,
                sideBySide: true
            })

            $('#nomination_end_date').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                useCurrent: false,
                sideBySide: true
            })
        $("#nomination_start_date").on("dp.change", function (e) {
            $('#nomination_end_date').data("DateTimePicker").minDate(e.date);
        });
        $("#nomination_end_date").on("dp.change", function (e) {
            $('#nomination_start_date').data("DateTimePicker").maxDate(e.date);
        });
        });
    </script>
@endpush

<!-- Voting Start Date Field -->
<div class="col-sm-6">
    {!! Form::label('voting_start_date', 'Voting Start Date:') !!}
    <div class='input-group date' id='voting_start_date'>
        {!! Form::text('voting_start_date', null, ['class' => 'form-control','id'=>'voting_start_date']) !!}
        <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
             </span>
    </div>

</div>

<!-- Voting End Date Field -->
<div class="col-sm-6">
    {!! Form::label('voting_end_date', 'Voting End Date:') !!}
    <div class='input-group date' id='voting_end_date'>
        {!! Form::text('voting_end_date', null, ['class' => 'form-control','id'=>'voting_end_date']) !!}
        <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
             </span>
    </div>

</div>

@push('scripts')
    <script type="text/javascript">
        $(function () {
            $('#voting_start_date').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                useCurrent: true,
                sideBySide: true
            })
        $('#voting_end_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false,
            sideBySide: true
        })
            $("#voting_start_date").on("dp.change", function (e) {
                $('#voting_end_date').data("DateTimePicker").minDate(e.date);
            });
            $("#voting_end_date").on("dp.change", function (e) {
                $('#voting_start_date').data("DateTimePicker").maxDate(e.date);
            });

        });
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('settings.index') }}" class="btn btn-default">Cancel</a>
</div>

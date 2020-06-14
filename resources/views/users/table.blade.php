<div class="table-responsive">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="users-table" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Email</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Role</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr role="row">
                                        <td class="sorting_1">{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role['name'] }}</td>
                                        <td>
                                            {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                                            <div class='btn-group'>
                                                <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                                <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                            </div>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                 </div>

            </div>
        </div>
        <!-- /.box-body -->
    </div>

</div>

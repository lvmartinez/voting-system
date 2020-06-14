<div class="table-responsive">
    <table class="table" id="categories-table">
        <thead>
            <tr>
                <th>Name</th>
                  @if (Auth::user()->role_id < 3)
                  <th colspan="3">Action</th>
                  @endif
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td><a href="{{ route('categories.show', [$category->id]) }}" class='btn btn-default'>
                  {{ $category->name }}</td></a>
                <td>
                    {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @if (Auth::user()->role_id < 4)
                        <a href="{{ route('categories.edit', [$category->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                          @endif
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

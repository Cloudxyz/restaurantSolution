<div class="table-responsive">
    <table class="table" id="restaurants-table">
        <thead>
        <tr>
            <th>Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($restaurants as $restaurant)
            <tr>
                <td>{{ $restaurant->id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['restaurants.destroy', $restaurant->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('restaurants.show', [$restaurant->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('restaurants.edit', [$restaurant->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

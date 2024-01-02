@foreach ($Tasks as $Task)
    <tr>
        <td>{{ $Task->name }}</td>
        <td>{{ $Task->project->name }}</td>
        <td>{{ ($Task->description) }} </td>
        <td class="d-flex">

            <a href="{{ route('show', ['task' => $Task->id]) }}" class="btn btn-sm btn-default mx-2">
                <i class="fa-regular fa-eye"></i>
            </a>
            <a href="{{ route('edit', ['task' => $Task->id]) }}" class="btn btn-sm btn-default mx-2">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
         
            <form action="{{ route('destroy', ['task' => $Task->id]) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
        </td>
    </tr>
@endforeach
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td>
        {{-- <div class=" card-footer d-flex justify-content-end align-items-center p-2"> --}}
        <div class="pagination m-0 float-right">
            {{ $Tasks->links() }}
        </div>
        {{-- </div> --}}

    </td>
</tr>
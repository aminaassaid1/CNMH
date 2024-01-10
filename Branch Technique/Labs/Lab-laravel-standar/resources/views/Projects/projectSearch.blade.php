@foreach ($projects as $project)
    <tr>
        <td>{{ $project->name }}</td>


        <td>{{ Str::limit($project->description, 30) }} <a href="{{ route('show', $project->id) }}">read more...</a></td>

        <td class="d-flex">
            <a href="{{ route('edit', ['task' => $project->id]) }}" class="btn btn-sm btn-default mx-2">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <form action="{{ route('destroy', ['task' => $project->id]) }}" method="post">
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
        <div class="pagination m-0 float-right">
            {{ $projects->links() }}
        </div>

    </td>
</tr>

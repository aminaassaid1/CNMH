@forelse ($Tasks as $Task)
    <tr>
        <td>{{ $Task->nom }}</td>
        <td>{{ Str::limit($Task->description, 30) }}</td>

        <td class="">
            <a href="{{ route('tasks.show', ['task' => $Task->id]) }}" class="btn btn-sm btn-default mx-2">
                <i class="fa-regular fa-eye"></i>
            </a>
            <a href="{{ route('tasks.edit', ['task' => $Task->id]) }}" class="btn btn-sm btn-default mx-2">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <button type="submit" class="btn btn-sm btn-danger" onclick="deleteTask({{ $Task->id }})" data-toggle="modal"
                    data-target="#deleteTask">
                <i class="fa-solid fa-trash"></i>
            </button>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="3" class="text-center">Aucune tâche trouvée.</td>
    </tr>
@endforelse

<tr>
    <td></td>
    <td></td>
    <td>
        <div class="pagination m-0 float-right">
            {{ $Tasks->links() }}
        </div>
    </td>
</tr>

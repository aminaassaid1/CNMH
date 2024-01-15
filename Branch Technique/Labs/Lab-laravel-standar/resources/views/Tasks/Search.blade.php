@forelse ($tasks as $task)
    <tr>
        <td>{{ $task->nom }}</td>
        <td>{{ Str::limit($task->description, 30) }} <a href="{{ route('taches.show', $task->id) }}"> plus...</a></td>        <td>
            <a href="{{ route('taches.show', ['tach' => $task->id]) }}" class='btn btn-default btn-sm'>
                <i class="far fa-eye"></i>
            </a>
            <a href="{{ route('taches.edit', ['tach' => $task->id, 'projectId' => $project->id ]) }}" class="btn btn-sm btn-default">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <button type="button" class="btn btn-sm btn-danger" onclick="deleteTask({{$task->id}})" data-toggle="modal" data-target="#deleteTask">
                <i class="fa-solid fa-trash"></i>
            </button>
            {{-- get modal delete task --}}
            <x-modal-delete-task />
        </td>
    </tr>
@empty
    <tr>
        <td colspan="3" class="text-center">No Tache found</td>
    </tr>
@endforelse

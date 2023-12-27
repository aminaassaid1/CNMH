<table class="table table-striped text-nowrap table-tasks">
    <thead>
        <tr>
            <th>Tâche</th>
            <th>Projet</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($tasks as $Task)
            <tr>
                <td>{{ $Task->name }}</td>
                <td>{{ $Task->Project->name }}</td>
                <td>{{ $Task->description }}</td>
                <td class="d-flex">
                    <a href="{{-- route('edit', ['task' => $Task->id]) --}}" class="btn btn-sm btn-default mx-2">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <form action="{{-- route('destroy', ['task' => $Task->id]) --}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>

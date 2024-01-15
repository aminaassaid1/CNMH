@forelse ($projects as $project)
    <tr>
        <td>{{ $project->nom }}</td>
        <td>{{ Str::limit($project->description, 30) }} <a href="{{ route('projects.show', $project->id) }}"> plus...</a></td>        <td>
        <td>
            <a href="{{ route('projects.show', ['project' => $project->id]) }}" class='btn btn-default btn-sm'>
                <i class="far fa-eye"></i>
            </a>
            <a href="{{ route('projects.tasks', ['projectId' => $project->id]) }}" class="btn btn-sm btn-info">
                <i class="fas fa-tasks"></i> Les Tâches
            </a>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="3" class="text-center">No projects found</td>
    </tr>
@endforelse

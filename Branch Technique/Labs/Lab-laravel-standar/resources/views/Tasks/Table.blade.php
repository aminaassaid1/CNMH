<table class="table table-striped text-nowrap">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @include('tasks.search')
    </tbody>
    <tfoot>
        <tr>
        <td></td>
        <td></td>
            <td colspan="3" class="text-center">{{ $tasks->links() }}</td>
        </tr>
    </tfoot>
</table>
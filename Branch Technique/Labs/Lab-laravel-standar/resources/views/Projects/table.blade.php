<table class="table table-striped text-nowrap">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @include('projects.search')
    </tbody>
    <tfoot>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ $projects->links() }}</td>
        </tr>
    </tfoot>
</table>

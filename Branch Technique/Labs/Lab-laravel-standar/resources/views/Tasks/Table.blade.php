<div class="card-body table-responsive p-0" style="overflow-x: auto;">
    <table class="table table-striped text-nowrap table-tasks">
        <thead>
            <tr>
                <th>Nom de tache</th>
                <th style="word-wrap: break-word;">Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @include('tasks.search')
        </tbody>
        <input type="hidden" id='page' value="1">
    </table>
</div>

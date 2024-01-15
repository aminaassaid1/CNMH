<div class="card-body table-responsive p-0">
    <table class="table table-striped text-nowrap table-tasks ">
        <thead>
            <tr>
                <th>Nom de projet</th>
                <th>Description</th>
            
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>

            @include('Projects.projectSearch')

        </tbody>
        <input type="hidden" id='page' value="1">
    </table>
</div>
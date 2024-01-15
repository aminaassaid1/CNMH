    <form method="POST" class="container pt-2" action="{{ isset($task) ? route('taches.update', ['tach' => $task->id]) : route('taches.store') }}">
        @csrf
        @if (isset($task))
            @method('PUT')
        @endif

        <div class="card-body">
            <div class="form-group">
                <label for="nom" class="form-label">Projet</label>
                <select name="projetId" id="projetId" class="form-control">
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" {{ request('projectId') == $project->id ? 'selected' : '' }}>
                            {{ $project->nom }}
                        </option>
                    @endforeach
                </select>
                
                @error('projetId')
                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="nom">Nom</label>
                <input name="nom" type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" placeholder="Entre le nom de la tâche"
                    value="{{ old('nom', isset($task) ? $task->nom : '') }}">
                @error('nom')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            

            <div class="form-group mb-3">
                <label for="Description">Description</label>
                <textarea name="description" id="inputDescription" class="form-control" oninput="setCustomValidity('')">{{ old('description', isset($task) ? $task->description : '') }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>
        <div class="card-footer">
            <a href="{{ route('taches.index') }}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary mx-2">{{ isset($task) ? 'Modifier' : 'Ajouter' }}</button>
        </div>
    </form>

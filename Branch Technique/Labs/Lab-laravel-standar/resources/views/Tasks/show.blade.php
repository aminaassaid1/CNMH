@extends('layouts.layout')
@section('content')
<div class="content" style="min-height: 1302.4px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Détails du tache</h1>
                </div>
                <div class="col-sm-6">
                    {{-- Add your edit button or other actions --}}
                    <a href="{{ route('tasks.edit', ["task" => $task->id])}}" class="btn btn-default float-right">
                        <i class="far fa-edit"></i> Modifier
                    </a>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- Check if task is not null --}}
                            @if ($task)
                                <div class="col-sm-12">
                                    <label for="nom">Nom:</label>
                                    <p>{{ $task->nom }}</p>
                                </div>

                                <!-- Projects Title -->
                                <div class="col-sm-12">
                                    <label for="description">Titre du projet:</label>
                                        <p>{{ $project->nom}}</p>
                                </div>

                                <!-- Description Field -->
                                <div class="col-sm-12">
                                    <label for="description">Description:</label>
                                    <p>{{ $task->description }}</p>
                                </div>
                            @else
                                <p>Task not found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
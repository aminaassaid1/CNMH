@extends('layouts.layout')
@section('content')
    <div class="content-wrapper" style="min-height: 1302.4px;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Détails du {{ $project->nom }}</h1>
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
                                @if ($project)
                                    <div class="col-sm-12">
                                        <label for="nom">Nom:</label>
                                        <p>{{ $project->nom }}</p>
                                    </div>


                                    <!-- Description Field -->
                                    <div class="col-sm-12">
                                        <label for="description">Description:</label>
                                        <p>{{ $project->description }}</p>
                                    </div>
                                @else
                                    <p>Project not found.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

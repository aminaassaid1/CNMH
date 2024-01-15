@extends('layouts.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Liste des projets</h1>
                </div>
               
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
        
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header ">
                            {{-- filter --}}
                            <div class="row d-flex justify-content-between">
                                <div class="col-4">
                                    <div class="input-group">
                                        <label class="input-group-text" for="filterSelectProjrctValue"><i
                                                class="fas fa-filter"></i></label>
                                        <select class="form-select form-control" id="filterSelectProjrctValue"
                                            aria-label="Filter Select">
                                            <option value="Filtrer par projet">Filtrer par projet</option>
                                            @foreach ($Projects as $Project)
                                                <option value="{{ $Project->id }}" nom="{{ $Project->id }}">
                                                    {{ $Project->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="input-group col-md-3">
                                    <input type="text" class="form-control" placeholder="Recherche"
                                        aria-label="Recherche" aria-describedby="basic-addon1" id="search-input">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                        <div id="search_ajax">
                            @include('Projects.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
  
   

@endsection

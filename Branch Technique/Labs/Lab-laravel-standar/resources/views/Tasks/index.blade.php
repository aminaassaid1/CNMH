@extends('layouts.master')

@section('content')
    <div class="content-wrapper" style="min-height: 1302.4px;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            @if (isset($project))
                                Tâches de {{ $project->nom }}
                            @else
                                Liste des tâches
                            @endif
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-sm-right">
                            <a href="{{ route('taches.create', ['projectId' => $project->id]) }}" class="btn btn-info">
                                <i class="fas fa-plus"></i> Nouveau Tâche
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-header col-md-12">
                                <div class="d-flex justify-content-between">
                                    <div class="btn-group mr-3">
                                        <button type="button" class="btn btn-default dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa-solid fa-filter text-dark pr-2 border-right"></i>
                                            <input type="hidden" name="projectId" id="projectId" value="{{ $project->id }}">
                                            {{ $project->nom }}
                                        </button>
                                        <div class="dropdown-menu">
                                            @foreach ($projects as $project)
                                                <a class="dropdown-item"
                                                    href="{{ route('projects.tasks', ['projectId' => $project->id]) }}">{{ $project->nom }}</a>
                                            @endforeach
                                        </div>
                                    </div>


                                    <div class=" p-0">
                                        <div class="input-group input-group-sm">
                                            <input type="text" name="search-input" id="search-input" class="form-control"
                                                placeholder="Recherche">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                @include('tasks.table')
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function fetchData(page, searchValue, projectId) {
                // Choose either requestUrl or requestUr2
                var requestUrl = "{{ url('projet') }}" + "/" + projectId + "/taches?page=" + page + "&searchValue=" + searchValue;
                // var requestUr2 = "{{ route('taches.index') }}" + "?page=" + page + "&searchValue=" + searchValue;
    
                console.log("Request URL:", requestUrl);
    
                $.ajax({
                    url: requestUrl, // Choose either requestUrl or requestUr2
                    success: function(data) {
                        console.log(1);
                        console.log(data);
                        $('tbody').html('');
                        $('tbody').html(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX Error:", textStatus, errorThrown);
                    }
                });
            }
    
            $('body').on('click', '.pagination a', function(event) {
                event.preventDefault();
    
                var page = $(this).attr('href').split('page=')[1];
                var searchValue = $('#search-input').val();
                var projectId = $('#projectId').val();
    
                fetchData(page, searchValue, projectId);
            });
    
            $('body').on('keyup', '#search-input', function() {
                var page = 1;
                var searchValue = $('#search-input').val();
                var projectId = $('#projectId').val();
    
                fetchData(page, searchValue, projectId);
            });
        });
    </script>
    
    

    <script>
        function deleteTask(taskId) {
            document.getElementById('Task_id').value = taskId;
            document.getElementById('deleteForm').action = "{{ route('taches.destroy', ':taskId') }}".replace(':taskId',
                taskId);
        }
    </script>
@endsection

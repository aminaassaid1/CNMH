@extends('layouts.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Liste des tâche</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <a href="{{ route('tasks.create') }}" class="btn btn-sm btn-primary">Ajouter tâche</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            {{-- start alert --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success </strong> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- end alert --}}

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
                                            @foreach ($projects as $Project)
                                                <option value="{{ $Project->id }}" name="{{ $Project->id }}">
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
                            @include('Tasks.Table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- script search by ajax --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function fetchData(page, searchTaskValue, selectProjrctValue) {
                $.ajax({
                    url: 'projects/?page=' + page + '&searchTaskValue=' + searchTaskValue + '&selectProjrctValue=' +
                        selectProjrctValue,
                    success: function(data) {
                        $('tbody').html('');
                        $('tbody').html(data);
                        console.log(data);
                    }
                });
                console.log(page);
                console.log(searchTaskValue);
                console.log(selectProjrctValue);
            }

            $('body').on('click', '.pagination a', function(e) {

                e.preventDefault();

                let page = $(this).attr('href').split('page=')[1];
                let searchTaskValue = $('#search-input').val();
                let selectProjrctValue = $('#filterSelectProjrctValue').val();
              
                fetchData(page, searchTaskValue, selectProjrctValue);

            });

            $('body').on('keyup', '#search-input', function() {
                let page = $('#page').val();
                let searchTaskValue = $('#search-input').val();
                console.log(searchTaskValue);
                let selectProjrctValue = $('#filterSelectProjrctValue').val();

                fetchData(page, searchTaskValue, selectProjrctValue);

            });

            $('#filterSelectProjrctValue').on('change', function() {
                let page = $('#page').val();
                let searchTaskValue = $('#search-input').val();
                let selectProjrctValue = $(this).val();
                fetchData(page, searchTaskValue, selectProjrctValue);
            });

        });
    </script>
@endsection
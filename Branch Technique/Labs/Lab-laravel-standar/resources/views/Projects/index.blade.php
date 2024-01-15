@extends('layouts.master')

@section('content')
    <div class="content-wrapper" style="min-height: 1302.4px;">
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
                            <div class="card-header col-md-12">
                                <div class=" p-0">
                                    <div class="input-group input-group-sm float-sm-right col-md-3 p-0">
                                        <input type="text" name="search-input" id="search-input" class="form-control float-right"
                                            placeholder="Recherche">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                @include('projects.table')
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<!-- Uncomment the jQuery script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function fetchData(page, searchValue) {
            $.ajax({
                url: 'projects/?page=' + page + '&searchValue=' + searchValue,
                success: function(data) {
                    $('tbody').html('');
                    $('tbody').html(data);
                }
            });
        }

        $('body').on('click', '.pagination a', function(event) {
            event.preventDefault();

            var page = $(this).attr('href').split('page=')[1];
            var searchValue = $('#search-input').val();

            fetchData(page, searchValue);
        });

        $('body').on('keyup', '#search-input', function() {
            var page = 1;
            var searchValue = $('#search-input').val();
            fetchData(page, searchValue);
        });
    });
</script>

@endsection

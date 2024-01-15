@extends('layouts.master')

@section('content')

<div class="content-wrapper pt-4" style="min-height: 1302.4px;">

    <div class="content-header">

    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-info">
                        <div class="card-header">
                            <h2 class="card-title"> <i class="nav-icon fas fa-tasks"></i> Ajouter Une Tâche</h2>
                        </div>
                        <!-- Inclusion du formulaire -->
                        @include('tasks.form')
                    </div>

                </div>
            </div>
        </div>

    </section>

</div>

@endsection

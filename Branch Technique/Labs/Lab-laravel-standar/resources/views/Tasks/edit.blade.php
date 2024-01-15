@extends('layouts.layout')


@section('content')

<div class="">

        <div class="" style="min-height: 1302.4px;">

            <div class="content-header">
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title"> <i class="nav-icon fas fa-table"></i> Modifier un Projet</h3>
                                </div>
                               @include('tasks.form')
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </div>

@endsection
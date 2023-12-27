@extends('layouts.app')
@extends('layouts.pagination')
@section('content')
    <main class="container">
        <section>
            <div class="titlebar">
                <h1>Tasks</h1>
                <a href="{{ route('Tasks.create') }}" class="btn-link">Add Tasks</a>
            </div>
            @if (session('success'))
                <script type="text/javascript">
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "{{ session('success') }}",
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>
            @endif
            <div class="table">
                <div class="table-filter">
                    <div>
                        <ul class="table-filter-list">
                            <li>
                                <p class="table-filter-link link-active">All</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <form method="GET" action="{{ route('Tasks.index') }}" accept-charset="UTF-8" role="search">
                    <div class="table-search">
                        <div>
                            <button class="search-select">
                                Search Product
                            </button>
                            <span class="search-select-arrow">
                                <i class="fas fa-caret-down"></i>
                            </span>
                        </div>
                        <div class="relative">
                            <input class="search-input" type="text" name="search" placeholder="Search product..."
                                name="search" value="{{ request('search') }}">
                        </div>
                    </div>
                </form>
                <div class="table-product-head">
                    <p>ID</p>
                    <p>Name</p>
                    <p>Description</p>
                    <p></p>
                    <p>Actions</p>
                </div>
                <div class="table-product-body">
                    @if (count($tasks) > 0)
                        @foreach ($tasks as $task)
                            <p>{{ $task->id }}</p>
                            <p>{{ $task->name }}</p>
                            <p>{{ $task->description }}</p>
                            <p></p>
                            <div style="display: flex">
                                <a href="{{ route('Tasks.edit', $task->id) }}"class="btn btn-success" style="padding-top: 4px; padding-bottom:4px;">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form method="POST" action="{{ route('Tasks.destroy', $task->id) }}">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" onclick="deleteConfirm(event)">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>

                            </div>
                        @endforeach
                    @else
                        <p>Tâche non trouvée</p>
                    @endif

                </div>
                <div class="table-paginate">
                    {{ $tasks->links() }}

                </div>

            </div>
        </section>
    </main>

    <script>
        window.deleteConfirm = function(e) {
            e.preventDefault();
            var form = e.target.form;
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>
@endsection

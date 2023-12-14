@extends('layouts.app')

@section('content')
    <main class="container">
        <section>
            <form method="POST" action="{{ route('Tasks.update' , $task->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="titlebar">
                    <h1>Modifier des tâches</h1>
                    <button type="submit">Save</button>
                </div>

                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <div>
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ $task->name }}">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" cols="10" rows="5">{{ $task->description }}</textarea>
                    </div>
                </div>

                <div class="titlebar">
                    <h1></h1>
                    <input type="hidden" name="hidden_id" value="{{ $task->id }}">
                    <button type="submit">Enregistrer</button>
                </div>
            </form>
        </section>
    </main>
@endsection

@extends('Layout.app')
@section('content')
    <main class="container">
        <section>
            <form method="POST" action="{{ route('Tasks.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="titlebar">
                    <h1>Ajouter des tâches</h1>
                    <button>Save</button>
                </div>
                @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card">
                    <div>
                        <label>Name</label>
                        <input type="text" name="name">
                        <label>Description</label>
                        <textarea name="description" cols="10" rows="5"></textarea>
                    </div>
                </div>
                <div class="titlebar">
                    <h1></h1>
                    <button>Enregistrer</button>
                </div>
            </form>
        </section>
    </main>
@endsection

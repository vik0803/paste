@extends("layout.base")

@section("title", "Wdi Paste - Crea nuovo")

@section("container")
    <h1 class="display-1">Crea nuovo Paste</h1>

    @includeWhen($errors->any(), "components.form-errors")

    <form action="{{ route("paste.add") }}" method="post" role="form">
        {{ csrf_field() }}

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="paste-name">Nome</label>
                <input type="text" class="form-control" id="paste-name" name="name" placeholder="Nome del paste">
            </div>
            <language-select></language-select>
        </div>

        <div class="form-group">
            <label for="paste-description">Breve Descrizione</label>
            <textarea class="form-control" id="paste-description" name="description" placeholder="Una breve descrizione del tuo paste"></textarea>
        </div>

        <div class="form-group">
            <label for="paste-code">Codice</label>
            <textarea class="form-control" id="paste-code" name="code" placeholder="Hello World;" rows="20"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Crea</button>
    </form>
@endsection

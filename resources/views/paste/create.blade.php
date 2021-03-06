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
                <input type="text" class="form-control" id="paste-name" name="name" placeholder="Nome del paste" value="{{ old("name") }}" required>
            </div>
            <language-select></language-select>
        </div>

        <div class="form-group">
            <label for="paste-description">Breve Descrizione</label>
            <textarea class="form-control" id="paste-description" name="description" placeholder="Una breve descrizione del tuo paste" required>{{ old("description") }}</textarea>
        </div>

        <div class="form-group">
            <label for="paste-code">Codice</label>
            <textarea class="form-control" id="paste-code" name="code" placeholder="Hello World;" rows="20" v-pre required>{{ old("code") }}</textarea>
        </div>

        <div class="form-row">
            <div class="col-md-12">
                <div class="bd-callout bd-callout-warning">
                    <h4 id="conveying-meaning-to-assistive-technologies">Nota sull'impostazione password</h4>

                    <p>Impostando una password a questo paste sarai in grado di modificarlo in futuro. <strong>Ricorda</strong> non è possibile recuperare la password o impostarla di nuovo, perciò se te la dimentichi non sarà più possibile effettuare nessuna modifica.</p>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="paste-password">Password</label>
                <input type="password" class="form-control" id="paste-password" name="password" placeholder="Eventuale password">
            </div>
            <div class="form-group col-md-6">
                <label for="paste-password-confirmation">Conferma password</label>
                <input type="password" class="form-control" id="paste-password-confirmation" name="password_confirmation" placeholder="Conferma la password">
            </div>
        </div>

        <button type="submit" class="btn btn-success">Crea</button>
    </form>
@endsection

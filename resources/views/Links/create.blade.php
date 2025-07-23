<div>
    <h1>Adicionar link</h1>

    @if($message = session()->get('message'))
        <div>{{$message}}</div>
    @endif

    <form action="{{route('links.create')}}" method="post">
        @csrf

        <div>
            <label for="name">Titulo do link</label>
            <input name="name" placeholder="Digite o nome do conteúdo" value="{{old('name')}}"/>
            @error('name')
                <span>{{$message}}</span>
            @enderror
        </div>

        <br>

        <div>
            <label for="tag">Plataforma de streaming</label>
            <input name="tag" placeholder="Onde voce está assistindo?" value="{{old('tag')}}"/>
            @error('tag')
                <span>{{$message}}</span>
            @enderror
        </div>

        <br>

        <div>
            <label for="link">URL</label>
            <input name="link" placeholder="Cole a URL do conteúdo" value="{{old('link')}}"/>
            @error('link')
            <span>{{$message}}</span>
            @enderror
        </div>

        <br>

        <a href="{{route('dashboard')}}">Voltar</a>
        <button type="submit">Salvar</button>

    </form>
</div>

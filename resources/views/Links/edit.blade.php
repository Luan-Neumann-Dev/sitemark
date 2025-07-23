<div>
    <h1>Editar link</h1>

    @if($message = session()->get('message'))
        <div>{{$message}}</div>
    @endif

    <form action="{{route('links.edit', $link)}}" method="post">
        @csrf
        @method('put')

        <div>
            <label for="name">Titulo do link</label>
            <input name="name" placeholder="Digite o nome do conteúdo" value="{{old('name', $link->name)}}"/>
            @error('name')
            <span>{{$message}}</span>
            @enderror
        </div>

        <br>

        <div>
            <label for="tag">Plataforma de streaming</label>
            <input name="tag" placeholder="Onde voce está assistindo?" value="{{old('tag', $link->tag)}}"/>
            @error('tag')
            <span>{{$message}}</span>
            @enderror
        </div>

        <br>

        <div>
            <label for="link">URL</label>
            <input name="link" placeholder="Cole a URL do conteúdo" value="{{old('link', $link->link)}}"/>
            @error('link')
            <span>{{$message}}</span>
            @enderror
        </div>

        <br>

        <a href="{{route('dashboard')}}">Voltar</a>
        <button type="submit">Editar</button>

    </form>
</div>

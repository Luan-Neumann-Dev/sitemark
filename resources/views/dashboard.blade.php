<div>
    <h1>Links</h1>

    <a href="{{route('links.create')}}">Adicionar link</a>

    <a href="{{route('profile')}}">Editar perfil</a>

    <ul>
        @foreach($links as $link)
            <li style="display:flex; gap: 10px">

                @unless($loop->last)
                    <form action="{{route('links.down', $link)}}" method="post">
                        @csrf
                        @method('PATCH')

                        <button>️⬇️</button>
                    </form>
                @endunless

                @unless($loop->first)
                    <form action="{{route('links.up', $link)}}" method="post">
                        @csrf
                        @method('PATCH')

                        <button>️⬆️</button>
                    </form>
                @endunless

                <a href="{{route('links.edit', $link)}}">{{$link->id}}::{{$link->name}}</a>

                <form action="{{route('links.destroy', $link)}}" method="post" onsubmit="return confirm('Tem certeza?')">
                    @csrf
                    @method('DELETE')

                    <button>DELETE</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>

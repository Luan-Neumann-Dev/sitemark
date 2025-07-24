<div>
    <h1>Dashboard</h1>

    <ul>
        @foreach($links as $link)
            <li style="display:flex;">
                <a href="{{route('links.edit', $link)}}">{{$link->name}}</a>

                <form action="{{route('links.destroy', $link)}}" method="post" onsubmit="return confirm('Tem certeza?')">
                    @csrf
                    @method('DELETE')

                    <button>DELETE</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>

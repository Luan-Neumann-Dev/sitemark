<div>
    <h1>Perfil</h1>

    @if($message = session()->get('message'))
        <div>{{$message}}</div>
    @endif

    <form action="{{route('profile')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <img src="/storage/{{$user->photo}}" alt="Foto de perfil">
            <input name="photo" type="file" />
        </div>

        <br>

        <div>
            <label for="name">Nome</label>
            <input name="name" placeholder="Digite seu nome" value="{{old('name', $user->name)}}"/>
            @error('name')
             <span>{{$message}}</span>
            @enderror
        </div>

        <br>

        <div>
            <label for="surname">Sobrenome</label>
            <input name="surname" placeholder="Digite seu sobrenome" value="{{old('surname', $user->surname)}}"/>
            @error('surname')
                <span>{{$message}}</span>
            @enderror
        </div>

        <br>

        <div>
            <label for="email">E-mail</label>
            <input name="email" placeholder="Digite seu e-mail" value="{{old('email', $user->email)}}"/>
            @error('email')
                <span>{{$message}}</span>
            @enderror
        </div>

        <br>

        <div>
            <label for="description">Bio</label>
            <textarea name="description" placeholder="Conte um pouco de você">
                {{old('description', $user->description)}}
            </textarea>
            @error('description')
                <span>{{$message}}</span>
            @enderror
        </div>

        <br>

        <button>Salvar</button>
    </form>
    <a href="{{route('dashboard')}}">Voltar</a>
</div>

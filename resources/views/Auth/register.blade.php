<div>
    <h1>Criar conta</h1>

    @if($message = session()->get('message'))
        <div>{{$message}}</div>
    @endif

    <form action="{{route('register')}}" method="post">
        @csrf

        <div>
            <label for="name">Nome</label>
            <input name="name" placeholder="Digite seu nome" value="{{old('name')}}"/>
            @error('name')
            <span>{{$message}}</span>
            @enderror
        </div>

        <br>

        <div>
            <label for="surname">Sobrenome</label>
            <input name="surname" placeholder="Digite seu sobrenome" value="{{old('surname')}}"/>
            @error('surname')
            <span>{{$message}}</span>
            @enderror
        </div>

        <br>

        <div>
            <label for="email">E-mail</label>
            <input name="email" placeholder="Digite seu e-mail" value="{{old('email')}}"/>
            @error('email')
            <span>{{$message}}</span>
            @enderror
        </div>

        <br>

        <div>
            <label for="password">Senha</label>
            <input name="password" type="password" placeholder="Insira sua senha"/>
            @error('password')
            <span>{{$message}}</span>
            @enderror
        </div>

        <br>

        <button>Criar conta</button>

        <br>

        <p>Já tem cadastro? <a href="{{route('login')}}">Acessar conta</a></p>
    </form>
</div>

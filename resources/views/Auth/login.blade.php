<div>
    <h1>Acessar conta</h1>

    @if($message = session()->get('message'))
        <div>{{$message}}</div>
    @endif

    <form action="{{route('login')}}" method="post">
        @csrf

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

        <button>Acessar conta</button>

        <br>

        <p>Não tem cadastro? <a href="{{route('register')}}">Criar conta</a></p>
    </form>
</div>

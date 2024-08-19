<x-app-layout>
    <div class="bg-slate-700 h-screen">
        <h1>Hola desde create usuario</h1>

        <form action="{{ route('create-users') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Ingrese un nombre" required>
            <input type="email" name="email" placeholder="Ingrese un email" required>
            <input type="password" name="password" placeholder="Ingrese su contraseña" required>
            <button type="submit">Guardar</button>
        </form> 

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Ingrese un email" required>
            <input type="password" name="password" placeholder="Ingrese su contraseña" required>
            <button type="submit">Guardar</button>
        </form> 

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Borrar Cookie</button>
        </form>
        
    </div>
</x-app-layout>

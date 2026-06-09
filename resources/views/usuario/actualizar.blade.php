<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Actualizar Perfil
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('perfil.guardar') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block">Nombre</label>
                        <input
                            type="text"
                            name="name"
                            value="{{ auth()->user()->name }}"
                            class="border rounded w-full p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block">Nueva Contraseña</label>
                        <input
                            type="password"
                            name="password"
                            class="border rounded w-full p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block">Confirmar Contraseña</label>
                        <input
                            type="password"
                            name="password_confirmation"
                            class="border rounded w-full p-2">
                    </div>

                    <button
                        type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded">
                        Actualizar Perfil
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
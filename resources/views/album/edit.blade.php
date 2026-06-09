<x-app-layout>

    <x-slot name="header">
        <h2>Editar Álbum</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">

            <form action="{{ route('albumes.update',$album->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label>Nombre</label>

                    <input type="text"
                           name="nombre"
                           value="{{ $album->nombre }}"
                           class="w-full border rounded p-2">
                </div>

                <div class="mb-4">
                    <label>Descripción</label>

                    <textarea name="descripcion"
                              class="w-full border rounded p-2">{{ $album->descripcion }}</textarea>
                </div>

                <button class="bg-blue-500 text-white px-4 py-2 rounded">
                    Actualizar
                </button>

            </form>

        </div>
    </div>

</x-app-layout>
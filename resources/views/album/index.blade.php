<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mis Álbumes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('albumes.create') }}"
                   class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    + Nuevo Álbum
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    @if($albumes->count())

                        <table class="min-w-full border border-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border px-4 py-2">Nombre</th>
                                    <th class="border px-4 py-2">Descripción</th>
                                    <th class="border px-4 py-2">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($albumes as $album)
                                    <tr>
                                        <td class="border px-4 py-2">
                                            {{ $album->nombre }}
                                        </td>

                                        <td class="border px-4 py-2">
                                            {{ $album->descripcion }}
                                        </td>

                                        <td class="border px-4 py-2">

                                            <a href="{{ route('fotos.index', $album->id) }}"
                                               class="text-green-600 hover:underline">
                                                Fotos
                                            </a>

                                            |

                                            <a href="{{ route('albumes.edit', $album->id) }}"
                                               class="text-blue-600 hover:underline">
                                                Editar
                                            </a>

                                            |

                                            <form action="{{ route('albumes.destroy', $album->id) }}"
                                                  method="POST"
                                                  class="inline">

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    onclick="return confirm('¿Deseas eliminar este álbum?')"
                                                    class="text-red-600 hover:underline">
                                                    Eliminar
                                                </button>

                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    @else

                        <p class="text-gray-600">
                            No tienes álbumes registrados.
                        </p>

                    @endif

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
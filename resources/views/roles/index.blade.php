<x-app-layout>
    <div class="max-w-5xl mx-auto py-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Roles</h1>

            <a href="{{ route('roles.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                Nuevo Rol
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <form method="GET" action="{{ route('roles.index') }}" class="mb-4 flex gap-2">
                <input type="text" name="search" value="{{ $search }}"
                placeholder="Buscar rol..."
                class="border rounded-lg px-3 py-2 w-full focus:ring focus:ring-blue-200">

                <button type="submit"
                    class="bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-900">
                    Buscar
                </button>
                <a href="{{ route('roles.index') }}"
                    class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500">
                    Limpiar
                </a>
            </form>
            <table class="w-full text-left">
                <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="p-3">ID</th>
                        <th class="p-3">Nombre</th>
                        <th class="p-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3">{{ $role->id }}</td>
                            <td class="p-3">{{ $role->name }}</td>
                            <td class="p-3 flex justify-center gap-2">
                                <a href="{{ route('roles.edit', $role) }}"
                                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                                    Editar
                                </a>

                                <form action="{{ route('roles.destroy', $role) }}" method="POST"
                                      onsubmit="return confirm('¿Eliminar este rol?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if($roles->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center p-4 text-gray-500">
                                No hay roles registrados
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
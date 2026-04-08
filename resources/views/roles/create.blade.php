<x-app-layout>
    <div class="max-w-xl mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Crear Rol</h1>

        <form action="{{ route('roles.store') }}" method="POST"
              class="bg-white p-6 rounded-lg shadow space-y-4">
            @csrf

            <div>
                <label class="block text-gray-700 mb-1">Nombre del rol</label>
                <input type="text" name="name"
                       class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200"
                       placeholder="Ej: admin">

                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between">
                <a href="{{ route('roles.index') }}"
                   class="text-gray-600 hover:underline">
                    ← Volver
                </a>

                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
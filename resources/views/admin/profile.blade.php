<x-app-layout>
    <div class="max-w-2xl mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Manage Profile</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Password (kosongkan jika tidak diubah)</label>
                <input type="password" name="password" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" class="w-full border rounded p-2">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Profile</button>
        </form>
    </div>
</x-app-layout>

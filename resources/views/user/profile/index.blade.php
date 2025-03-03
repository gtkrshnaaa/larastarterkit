@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow-md mt-6">
    <h2 class="text-2xl font-bold mb-4">Profile</h2>

    @if(session('success'))
        <p class="text-green-500 text-sm">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <div class="text-red-500 text-sm">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <!-- Profile Form -->
    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data" class="mb-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold">Avatar</label>
            <div class="flex items-center gap-4">
                <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}" 
                     alt="Avatar" class="w-16 h-16 rounded-full">
                <input type="file" name="avatar" class="w-full px-4 py-2 border rounded">
            </div>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Name</label>
            <input type="text" name="name" value="{{ $user->name }}" required class="w-full px-4 py-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" required class="w-full px-4 py-2 border rounded">
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Update Profile</button>
    </form>

    <!-- Change Password Form -->
    <h3 class="text-xl font-semibold mb-2">Change Password</h3>
    <form action="{{ route('user.profile.update-password') }}" method="POST" class="mb-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold">Current Password</label>
            <input type="password" name="current_password" required class="w-full px-4 py-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">New Password</label>
            <input type="password" name="new_password" required class="w-full px-4 py-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Confirm New Password</label>
            <input type="password" name="new_password_confirmation" required class="w-full px-4 py-2 border rounded">
        </div>

        <button type="submit" class="w-full bg-green-500 text-white py-2 rounded">Update Password</button>
    </form>

    <!-- Delete Account -->
    <h3 class="text-xl font-semibold text-red-600 mb-2">Delete Account</h3>
    <form action="{{ route('user.profile.delete') }}" method="POST" onsubmit="return confirmDelete()">
        @csrf
        @method('DELETE')
        <button type="submit" class="w-full bg-red-500 text-white py-2 rounded">Delete My Account</button>
    </form>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete your account? This action cannot be undone.");
        }
    </script>

</div>
@endsection

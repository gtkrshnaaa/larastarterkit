<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-900 text-white">

    <div class="max-w-md w-full bg-gray-800 p-6 rounded shadow-md">
        <h2 class="text-2xl font-bold text-center mb-4">Admin Login</h2>

        @if(session('error'))
            <p class="text-red-400 text-sm">{{ session('error') }}</p>
        @endif

        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block font-semibold">Email</label>
                <input type="email" name="email" required class="w-full px-4 py-2 border rounded bg-gray-700 text-white">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-2 border rounded bg-gray-700 text-white">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded">Login</button>
        </form>
    </div>

</body>
</html>

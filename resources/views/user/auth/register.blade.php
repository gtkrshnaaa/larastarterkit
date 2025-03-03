<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

    <div class="max-w-md w-full bg-white p-6 rounded shadow-md">
        <h2 class="text-2xl font-bold text-center mb-4">User Register</h2>

        @if(session('error'))
            <p class="text-red-500 text-sm">{{ session('error') }}</p>
        @endif

        <form action="{{ route('user.register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block font-semibold">Name</label>
                <input type="text" name="name" required class="w-full px-4 py-2 border rounded">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Email</label>
                <input type="email" name="email" required class="w-full px-4 py-2 border rounded">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-2 border rounded">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Confirm Password</label>
                <input type="password" name="password_confirmation" required class="w-full px-4 py-2 border rounded">
            </div>

            <button type="submit" class="w-full bg-green-500 text-white py-2 rounded">Register</button>
        </form>

        <p class="mt-4 text-center text-sm">
            Already have an account? <a href="{{ route('user.login') }}" class="text-blue-500">Login</a>
        </p>
    </div>

</body>
</html>

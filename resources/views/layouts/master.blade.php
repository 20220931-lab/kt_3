<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Management System</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <aside class="w-64 bg-white shadow-md p-4">
            <h2 class="text-xl font-bold mb-6">CMS</h2>
            <nav class="flex flex-col gap-2">
                <a href="{{ route('courses.index') }}" class="hover:text-blue-600">Courses</a>
                <a href="{{ route('enrollments.index') }}" class="hover:text-blue-600">Enrollments</a>
            </nav>
        </aside>
        <main class="flex-1 p-8">
            @include('components.alert')
            @yield('content')
        </main>
    </div>
</body>
</html>

@extends('layouts.master')

@section('content')
<h1 class="text-2xl font-bold mb-6">Sửa khóa học</h1>
@include('courses._form', [
    'action' => route('courses.update', $course),
    'method' => 'PUT',
    'buttonText' => 'Cập nhật',
    'course' => $course
])
@endsection

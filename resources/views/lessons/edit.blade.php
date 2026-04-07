@extends('layouts.master')

@section('content')
<h1 class="text-2xl font-bold mb-6">Sửa bài học</h1>
@include('lessons._form', [
    'action' => route('lessons.update', $lesson->id),
    'method' => 'PUT',
    'buttonText' => 'Cập nhật',
    'lesson' => $lesson
])
@endsection

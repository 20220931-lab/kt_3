@extends('layouts.master')

@section('content')
<h1 class="text-2xl font-bold mb-6">Thêm bài học cho khóa: {{ $course->name }}</h1>
@include('lessons._form', [
    'action' => route('lessons.store', $course->id),
    'method' => 'POST',
    'buttonText' => 'Thêm mới',
    'lesson' => null
])
@endsection

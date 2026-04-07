@extends('layouts.master')

@section('content')
<h1 class="text-2xl font-bold mb-6">Thêm khóa học mới</h1>
@include('courses._form', [
    'action' => route('courses.store'),
    'method' => 'POST',
    'buttonText' => 'Thêm mới',
    'course' => null
])
@endsection

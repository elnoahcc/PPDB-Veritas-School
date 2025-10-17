@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white shadow rounded p-4">
        <h2 class="text-gray-500">Total Pendaftar</h2>
        <p class="text-2xl font-bold"></p>
    </div>
    <div class="bg-white shadow rounded p-4">
        <h2 class="text-gray-500">Lulus Seleksi</h2>
        <p class="text-2xl font-bold"></p>
    </div>
    <div class="bg-white shadow rounded p-4">
        <h2 class="text-gray-500">Belum Seleksi</h2>
        <p class="text-2xl font-bold"></p>
    </div>
</div>
@endsection
x
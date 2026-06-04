@extends('layouts.app')

@section('content')
<div class="space-y-4">
    <h2 class="text-3xl font-bold mb-2">
        Kuis AI
    </h2>

    <p class="text-slate-600 mb-6 dark:text-slate-400">
        Jawablah pertanyaan berikut sesuai dengan materi yang telah dipelajari.
    </p>

    <x-card>
        <h3 class="font-semibold mb-4">
            Pertanyaan 1
        </h3>

        <p class="mb-4">
            Apa fungsi utama Composer dalam pengembangan aplikasi PHP?
        </p>

        <div class="space-y-2">
            <div>A. Mengelola dependensi dan package PHP</div>
            <div>B. Runtime bawaan untuk menjalankan aplikasi Node.js</div>
            <div>C. Package manager khusus JavaScript</div>
            <div>D. Framework untuk membangun aplikasi web</div>
        </div>
    </x-card>
</div>
@endsection

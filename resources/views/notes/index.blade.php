@extends('layouts.app')

@section('content')
<div class="space-y-4">
    <h2 class="text-3xl font-bold">
        Catatan Pembelajaran
    </h2>

    <p class="text-slate-500 mt-2">
        Kelola materi belajar dan buat ringkasan cerdas dengan bantuan AI.
    </p>

    <x-card>
        <h3 class="text-lg font-bold mb-6">Buat Catatan Baru</h3>

        <div class="space-y-4">
            <div>
                <label class="block mb-2">Judul Catatan</label>
                <input type="text" name="title" class="w-full border rounded-lg px-4 py-2">
            </div>

            <div>
                <label class="block mb-2">Isi Materi</label>
                <textarea rows="6" name="content" class="w-full border rounded-lg px-4 py-2"></textarea>
            </div>
        </div>

        <x-button>Simpan</x-button>
    </x-card>

    <x-card>
        <h3 class="text-lg font-semibold mb-4">Unggah Dokumen</h3>

        <input type="file" class="block w-full border rounded-lg px-4 py-2">

        <p class="text-slate-500 mt-4">
            Unggah PDF, dokumen, atau materi belajar untuk diproses dan diringkas oleh AI.
        </p>
    </x-card>

    <div>
        <h3 class="text-xl font-bold mb-4">Daftar Catatan</h3>

        <div class="space-y-4">
            <x-card>
                <h4 class="font-semibold">
                    Dasar Laravel Framework
                </h4>

                <p class="text-slate-500 mt-2">
                    Mempelajari konsep Route, Controller, Blade Template, dan struktur dasar aplikasi Laravel.
                </p>

                <div class="flex gap-2 mt-4">
                    <x-button>
                        Ringkas AI
                    </x-button>

                    <x-button class="bg-emerald-600">
                        Kuis AI
                    </x-button>

                    <x-button class="bg-red-600">
                        Hapus
                    </x-button>
                </div>
            </x-card>

            <x-card>
                <h4 class="font-semibold">
                    Pengenalan Next.js
                </h4>

                <p class="text-slate-500 mt-2">
                    Memahami routing, komponen React, serta proses rendering pada framework Next.js.
                </p>

                <div class="flex gap-2 mt-4">
                    <x-button>
                        Ringkas AI
                    </x-button>

                    <x-button class="bg-emerald-600">
                        Kuis AI
                    </x-button>

                    <x-button class="bg-red-600">
                        Hapus
                    </x-button>
                </div>
            </x-card>
        </div>
    </div>
</div>
@endsection

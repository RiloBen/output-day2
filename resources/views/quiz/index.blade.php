@extends('layouts.app')

@section('content')
<div class="space-y-4">
    <h2 class="text-3xl font-bold mb-2">
        Kuis AI
    </h2>

    <p class="text-slate-600 mb-8 dark:text-slate-400">
        Uji pemahamanmu melalui kuis yang dibuat secara otomatis oleh AI.
    </p>

    <div class="space-y-4">
        <x-card>
            <h3 class="font-bold">
                Dasar Laravel Framework
            </h3>

            <p class="text-slate-500 dark:text-slate-400">
                5 Pertanyaan
            </p>

            <div class="flex gap-2 mt-4">
                <a href="/show-quiz">
                    <x-button>
                        Mulai Kuis
                    </x-button>
                </a>

                <x-button class="bg-red-600">
                    Hapus
                </x-button>
            </div>
        </x-card>

        <x-card>
            <h3 class="font-bold">
                Pengenalan Next.js
            </h3>

            <p class="text-slate-500 dark:text-slate-400">
                5 Pertanyaan
            </p>

            <div class="flex gap-2 mt-4">
                <a href="/show-quiz">
                    <x-button>
                        Mulai Kuis
                    </x-button>
                </a>

                <x-button class="bg-red-600">
                    Hapus
                </x-button>
            </div>
        </x-card>
    </div>
</div>

@endsection

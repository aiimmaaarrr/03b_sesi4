<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Utama') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900">
                        Selamat Datang, {{ Auth::user()->name }}!
                    </h3>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Anda berhasil masuk ke sistem manajemen akademik.") }}
                    </p>

                    <hr class="my-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-indigo-50 border-l-4 border-indigo-500 p-4 rounded-md shadow-sm">
                            <div class="flex items-center">
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-indigo-700 uppercase tracking-wider">
                                        Total Mahasiswa
                                    </p>
                                    <p class="text-3xl font-bold text-indigo-900">
                                        {{ $jml_mhs }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-md shadow-sm">
                            <div class="flex items-center">
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-emerald-700 uppercase tracking-wider">
                                        Total Mata Kuliah
                                    </p>
                                    <p class="text-3xl font-bold text-emerald-900">
                                        {{ $jml_mk }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
@auth
    Halo, {{ auth()->user()->name }}
@endauth

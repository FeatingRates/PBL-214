@extends('layouts.app')


@section('title','Dashboard Admin')

@section('content')

<div class="flex h-screen ml-[250px] overflow-x-hidden">
    @include('layouts.sidebar')

    <div class="flex-1 flex flex-col">
        @include('layouts.header', ['notifikasiSurat' => $notifikasiSurat ?? collect([])])
        @include('components.alertnotif')
        <main class="flex-1 bg-white p-4 sm:p-6 md:p-8 lg:p-12">
            @yield('content')
            <div class="title-page flex flex-col md:flex-row justify-between gap-4">
                <h1 class="text-2xl md:text-[32px] text-[#1F384C] font-medium">
                    Dashboard
                </h1>
            </div>
        

            <div class="flex flex-col sm:flex-row gap-6 mt-6">
                <!-- Surat Diterima -->
                <div class="flex-1 flex flex-col items-center bg-[#F1F2F7] shadow-md shadow-blue-100 rounded-2xl py-6 mx-2">
                    <div class="w-20 h-20 rounded-full bg-gradient-to-b from-[#5A6ACF] to-blue-300 flex items-center justify-center mb-2 shadow">
                        <i class="fa-solid fa-file text-white text-4xl"></i>
                    </div>
                    <span class="text-[#5A6ACF] font-medium text-base mt-2">Surat Diterima</span>
                    <span class="text-blue-800 font-bold text-3xl mt-1">{{ $suratDiterima }}</span>
                </div>
                <!-- Surat Ditolak -->
                <div class="flex-1 flex flex-col items-center bg-[#F1F2F7] shadow-md shadow-blue-100 rounded-2xl py-6 mx-2">
                    <div class="w-20 h-20 rounded-full bg-gradient-to-b from-[#5A6ACF] to-blue-300 flex items-center justify-center mb-2 shadow">
                        <i class="fa-solid fa-file text-white text-4xl"></i>
                    </div>
                    <span class="text-blue-500 font-medium text-base mt-2">Surat Ditolak</span>
                    <span class="text-blue-800 font-bold text-3xl mt-1">{{ $suratDitolak }}</span>
                </div>
                <!-- Total Surat -->
                <div class="flex-1 flex flex-col items-center bg-[#F1F2F7] shadow-md shadow-blue-100 rounded-2xl py-6 mx-2">
                    <div class="w-20 h-20 rounded-full bg-gradient-to-b from-[#5A6ACF] to-blue-300 flex items-center justify-center mb-2 shadow">
                        <i class="fa-solid fa-file text-white text-4xl"></i>
                    </div>
                    <span class="text-[#1F384C] font-medium text-base mt-2">Total Surat</span>
                    <span class="text-blue-800 font-bold text-3xl mt-1">{{ $totalSurat }}</span>
                </div>
            </div>
            <div class="flex pt-10">
                <div class="flex justify-between w-full">
                    <div class="flex justify-start">
                        <h1 class="font-semibold text-[22px]">Riwayat Dokumen</h1>
                    </div>
                    <div class="flex justify-end mt-4 gap-2">
                        <input type="search" name="" id="custom-search" class="text-black rounded-[10px] bg-[#D9DCE2] caret-black py-2 px-4" placeholder="Cari Surat...">
                    </div>
                </div>
            </div>
            <div class="w-full">
                <x-datatable
                    id="surat-table"
                    :columns="$columns"
                    ajaxUrl="{{ route('admin.search') }}"
                    :ordering="false"
                    :lengthMenu="false"
                    :pageLength="5"
                    :showEdit="false"
                    :showDelete="false"
                    :search="true"
                />

                
            </div>
        </main>
    </div>
</div>

@endsection
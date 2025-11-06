@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-teal-900 relative pb-24">
    <!-- Top Right Corner -->
    <div class="absolute top-6 right-6 flex items-center gap-4 text-white">
        <div class="text-right">
            <div class="text-sm font-medium">Carbon AI</div>
            <div class="text-xs text-gray-300">Powered by AI</div>
        </div>
        <button class="p-2 hover:bg-white/10 rounded-lg transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
        </button>
    </div>

    <!-- Main Content -->
    <div class="flex flex-col items-center justify-center min-h-full px-6 py-20">
        <!-- Welcome Section -->
        <div class="text-center mb-12">
            <h1 class="text-5xl md:text-6xl font-bold text-teal-400 mb-4">
                Welcome to Carbon AI
            </h1>
            <p class="text-xl text-white/90 max-w-2xl mx-auto">
                Your conversational carbon accounting assistant — powered by AI.
            </p>
        </div>

        <!-- Action Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-7xl w-full mb-12">
            <!-- Upload Documents -->
            <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-6 border border-slate-700/50 hover:border-teal-400/50 transition-colors">
                <div class="w-12 h-12 bg-teal-400/20 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg>
                </div>
                <h3 class="text-white font-semibold text-lg mb-2">Upload Documents</h3>
                <p class="text-gray-300 text-sm">Upload invoices — I'll sort them into Scopes 1-3.</p>
            </div>

            <!-- Review & Audit -->
            <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-6 border border-slate-700/50 hover:border-teal-400/50 transition-colors">
                <div class="w-12 h-12 bg-teal-400/20 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-white font-semibold text-lg mb-2">Review & Audit</h3>
                <p class="text-gray-300 text-sm">Verify data accuracy before final reporting.</p>
            </div>

            <!-- Generate Report -->
            <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-6 border border-slate-700/50 hover:border-teal-400/50 transition-colors">
                <div class="w-12 h-12 bg-teal-400/20 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h3 class="text-white font-semibold text-lg mb-2">Generate Report</h3>
                <p class="text-gray-300 text-sm">Export reports aligned with ISSB, CDP, and SBTi.</p>
            </div>

            <!-- Connect Suppliers -->
            <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-6 border border-slate-700/50 hover:border-teal-400/50 transition-colors">
                <div class="w-12 h-12 bg-teal-400/20 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-white font-semibold text-lg mb-2">Connect Suppliers</h3>
                <p class="text-gray-300 text-sm">Invite suppliers to share emissions data.</p>
            </div>
        </div>
    </div>

    <!-- Chat Input Bar (Bottom) -->
    <div class="absolute bottom-0 left-0 right-0 p-6">
        <div class="max-w-4xl mx-auto">
            <div class="bg-slate-800/80 backdrop-blur-sm rounded-xl border border-slate-700/50 flex items-center px-4 py-3">
                <button class="p-2 text-gray-400 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                    </svg>
                </button>
                <input
                    type="text"
                    placeholder="Ask about scopes, upload documents, or request analysis..."
                    class="flex-1 bg-transparent border-none outline-none text-white placeholder-gray-400 px-3 py-1"
                />
                <button class="bg-teal-400 hover:bg-teal-500 text-white px-6 py-2 rounded-lg font-medium transition-colors flex items-center gap-2">
                    <span>Send</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection


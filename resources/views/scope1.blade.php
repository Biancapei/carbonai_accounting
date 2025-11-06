@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/scope1.css') }}">
@endpush

@section('content')
<div class="bg-white min-h-screen">
    <!-- Header Section -->
    <div class="px-8 py-6">
        <div class="flex items-start justify-between">
            <div>
                <h1 class="main-title">Scope 1</h1>
                <p class="text-sm text-gray-600">Direct emissions from owned or controlled sources</p>
            </div>
            <div class="flex items-center gap-4">
                <!-- Year Selector -->
                <div class="relative">
                    <select class="appearance-none bg-white border border-gray-300 rounded-lg px-4 py-2 pr-8 text-sm font-medium text-gray-700 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent cursor-pointer">
                        <option>2024</option>
                        <option>2023</option>
                        <option>2022</option>
                    </select>
                    <svg class="absolute right-2 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
                <span class="text-sm text-gray-500">Updated just now</span>
            </div>
        </div>
    </div>

    <!-- Overview Section -->
    <div class="overview px-8 py-6">
        <h2 class="header">Overview</h2>
        <div class="row g-3">
            <!-- Card 1: Total Scope 1 tCO₂e -->
            <div class="col-12 col-md-4">
            <div class="card">
                <div class="top d-flex mb-2" style="flex-direction: row;">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                    <div class="ml-3">
                        <h3 class="subtitle">Total Scope 1 tCO₂e</h3>
                        <p class="subcontent">Direct emissions</p>
                    </div>
                </div>

                <div class="my-2">
                    <span class="scope1" id="scope1Value">24.75</span>
                    <span class="unit">tCO₂e</span>
                </div>
                <div class="d-flex mt-2" style="align-items: center;">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <span class="percentage">+15.2% &nbsp;</span>
                    <span class="vs">vs last year</span>
                </div>
            </div>
            </div>

            <!-- Card 2: Target vs Actual -->
            <div class="col-12 col-md-4">
            <div class="card">
                <div class="top d-flex mb-2" style="flex-direction: row;">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="ml-3">
                        <h3 class="subtitle">Target vs Actual</h3>
                        <p class="subcontent">Target 21.04 tCO₂e (117.6%)</p>
                    </div>
                </div>

                <div class="my-2">
                    <span class="scope1" id="targetValue">24.75</span>
                    <span class="unit">tCO₂e</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden mt-1">
                    <div class="bg-teal-500 h-2 rounded-full" style="width: 100%"></div>
                </div>
            </div>
            </div>

            <!-- Card 3: Intensity per Revenue -->
            <div class="col-12 col-md-4">
            <div class="card">
                <div class="top d-flex mb-2" style="flex-direction: row;">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="ml-3">
                        <h3 class="subtitle">Intensity per Revenue</h3>
                        <p class="subcontent">Emissions efficiency</p>
                    </div>
                </div>

                <div class="my-2">
                    <span class="scope1" id="intensityValue">2.48</span>
                    <span class="unit">tCO₂e/$M</span>
                </div>
            </div>
            </div>

            <!-- Card 4: Data Confidence -->
            <div class="col-12 col-md-4">
            <div class="card">
                <div class="top d-flex mb-2" style="flex-direction: row;">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <div class="ml-3">
                        <h3 class="subtitle">Data Confidence</h3>
                        <p class="subcontent">Quality & completeness</p>
                    </div>
                </div>

                <div class="my-2">
                    <span class="scope1" id="confidenceValue">75.0</span>
                    <span class="unit">%</span>
                </div>
                <div class="warning">
                    <svg class="w-4 h-4 text-yellow-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <p class="subcontent text-yellow-800 mb-0 ml-2">Improve by adding more verified entries</p>
                </div>
            </div>
            </div>

            <!-- Card 5: Entries -->
            <div class="col-12 col-md-4">
            <div class="card">
                <div class="top d-flex mb-2" style="flex-direction: row;">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <div class="ml-3">
                        <h3 class="subtitle">Entries</h3>
                        <p class="subcontent">Active emission entries</p>
                    </div>
                </div>

                <div class="my-2">
                    <span class="scope1" id="entriesValue">8</span>
                </div>
            </div>
            </div>

            <!-- Card 6: Exceptions -->
            <div class="col-12 col-md-4">
            <div class="card">
                <div class="top d-flex mb-2" style="flex-direction: row;">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <div class="ml-3">
                        <h3 class="subtitle">Exceptions</h3>
                        <p class="subcontent">Data quality issues</p>
                    </div>
                </div>

                <div class="my-2">
                    <span class="scope1">0</span>
                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- Analysis Section -->
    <div class="analysis px-8 py-6">
        <div class="flex items-center justify-between mb-6">
            <h2>Analysis</h2>
        </div>

    </div>

    <!-- Emission Categories Section -->
    <div class="emission px-8 py-6">
        <h2>Emission Categories</h2>
        <div class="row g-3">
            <!-- Card 1: Fuel & Energy Equipment -->
            <div class="col-12 col-md-6">
                <div class="emission-card">
                    <div class="emission-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
                        </svg>
                        <div class="ml-3">
                            <h3 class="emission-title">Fuel & Energy Equipment</h3>
                            <p class="emission-subtitle">Stationary Combustion</p>
                        </div>
                    </div>
                    <div class="my-2">
                        <div class="emission-value" id="emissionValue">5.10 tCO₂e</div>
                        <span class="emission-percentage">(20.6% of total)</span>
                    </div>
                    <p class="emission-description">Calculate emissions from boilers, generators, and other fixed equipment.</p>
                    <button class="emission-add-btn" data-bs-toggle="modal" data-bs-target="#entryModeModal" data-category="fuel-energy">+ Add Entry</button>
                </div>
            </div>

            <!-- Card 2: Company Vehicles -->
            <div class="col-12 col-md-6">
                <div class="emission-card">
                    <div class="emission-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                        </svg>
                        <div class="ml-3">
                            <h3 class="emission-title">Company Vehicles</h3>
                            <p class="emission-subtitle">Mobile Combustion</p>
                        </div>
                    </div>
                    <div class="my-2">
                        <div class="emission-value" id="emissionValue">2.04 tCO₂e</div>
                        <span class="emission-percentage">(8.2% of total)</span>
                    </div>
                    <p class="emission-description">Calculate emissions from vehicles, forklifts, and mobile equipment.</p>
                    <button class="emission-add-btn" data-bs-toggle="modal" data-bs-target="#entryModeModal" data-category="vehicles">+ Add Entry</button>
                </div>
            </div>

            <!-- Card 3: Production & Processes -->
            <div class="col-12 col-md-6">
                <div class="emission-card">
                    <div class="emission-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                        <div class="ml-3">
                            <h3 class="emission-title">Production & Processes</h3>
                            <p class="emission-subtitle">Process Emissions</p>
                        </div>
                    </div>
                    <div class="my-2">
                        <div class="emission-value" id="emissionValue">3.15 tCO₂e</div>
                        <span class="emission-percentage">(12.7% of total)</span>
                    </div>
                    <p class="emission-description">Calculate emissions from industrial processes and chemical reactions.</p>
                    <button class="emission-add-btn" data-bs-toggle="modal" data-bs-target="#entryModeModal" data-category="production-processes">+ Add Entry</button>
                </div>
            </div>

            <!-- Card 4: Refrigeration & Leaks -->
            <div class="col-12 col-md-6">
                <div class="emission-card">
                    <div class="emission-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <div class="ml-3">
                            <h3 class="emission-title">Refrigeration & Leaks</h3>
                            <p class="emission-subtitle">Fugitive Emissions</p>
                        </div>
                    </div>
                    <div class="my-2">
                        <div class="emission-value" id="emissionValue">14.46 tCO₂e</div>
                        <span class="emission-percentage">(58.4% of total)</span>
                    </div>
                    <p class="emission-description">Calculate emissions from refrigerant leaks and other fugitive sources.</p>
                    <button class="emission-add-btn" data-bs-toggle="modal" data-bs-target="#entryModeModal" data-category="refrigeration-leaks">+ Add Entry</button>
                </div>
            </div>
        </div>
    </div>

    <!-- All Entries Section -->
    <div class="all-entries d-flex px-8 py-6" style="flex-direction: column;">
        <div class="d-flex my-2" style="justify-content: space-between;">
            <h2 class="header">All Entries</h2>
            <button type="button" class="btn filter-btn" id="filterToggleBtn">
                <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
                Filters
            </button>
        </div>

        <!-- Filter Panel -->
        <div id="filterPanel" class="bg-white rounded-lg border border-gray-200 p-4 mb-4">
            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <label for="filterCategory" class="form-label">Category</label>
                    <select class="form-select" id="filterCategory">
                        <option value="">All Categories</option>
                        <option value="stationary">Stationary</option>
                        <option value="mobile">Mobile</option>
                        <option value="process">Process</option>
                        <option value="fugitive">Fugitive</option>
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    <label for="filterCO2" class="form-label">CO₂ Emitted</label>
                    <select class="form-select" id="filterCO2">
                        <option value="">All Levels</option>
                        <option value="low">Low (0-2 tCO₂e)</option>
                        <option value="medium">Medium (2-5 tCO₂e)</option>
                        <option value="high">High (5+ tCO₂e)</option>
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    <label for="filterSource" class="form-label">Source</label>
                    <select class="form-select" id="filterSource">
                        <option value="">All Sources</option>
                        <option value="Boilers & Furnaces">Boilers & Furnaces</option>
                        <option value="Generators & Turbines">Generators & Turbines</option>
                        <option value="Cars, trucks, and vans">Cars, trucks, and vans</option>
                        <option value="Forklifts and construction equipment">Forklifts and construction equipment</option>
                        <option value="Cement & Lime Production">Cement & Lime Production</option>
                        <option value="Chemical & Fertiliser Production">Chemical & Fertiliser Production</option>
                        <option value="Chiller">Chiller</option>
                        <option value="Split A/C">Split A/C</option>
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    <label for="filterStatus" class="form-label">Status</label>
                    <select class="form-select" id="filterStatus">
                        <option value="">All Status</option>
                        <option value="Verified">Verified</option>
                        <option value="Pending">Pending</option>
                    </select>
                </div>
            </div>
            <div class="mt-3 text-end">
                <a href="#" id="clearFilters" class="text-sm text-blue-600 hover:text-blue-800">Clear All Filters</a>
            </div>
        </div>

        <!-- Entries Table -->
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th class="px-4 py-3 table-header">Category</th>
                    <th class="px-4 py-3 table-header">Source</th>
                    <th class="px-4 py-3 table-header">CO₂ emitted</th>
                    <th class="px-4 py-3 table-header">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">stationary</td>
                    <td class="px-4 py-3 table-cell-text" id="source">Boilers & Furnaces</td>
                    <td class="co2-emitted px-4 py-3" id="co2Emitted">2.8500 tCO₂e</td>
                    <td class="px-4 py-3"id="status"><span class="badge badge-success">Verified</span></td>
                </tr>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">stationary</td>
                    <td class="px-4 py-3 table-cell-text" id="source">Generators & Turbines</td>
                    <td class="co2-emitted px-4 py-3" id="co2Emitted">2.2500 tCO₂e</td>
                    <td class="px-4 py-3" id="status"><span class="badge badge-success">Verified</span></td>
                </tr>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">mobile</td>
                    <td class="px-4 py-3 table-cell-text" id="source">Cars, trucks, and vans</td>
                    <td class="co2-emitted px-4 py-3" id="co2Emitted">1.1900 tCO₂e</td>
                    <td class="px-4 py-3" id="status"><span class="badge badge-success">Verified</span></td>
                </tr>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">mobile</td>
                    <td class="px-4 py-3 table-cell-text" id="source">Forklifts and construction equipment</td>
                    <td class="co2-emitted px-4 py-3" id="co2Emitted">0.8500 tCO₂e</td>
                    <td class="px-4 py-3" id="status"><span class="badge badge-warning">Pending</span></td>
                </tr>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">process</td>
                    <td class="px-4 py-3 table-cell-text" id="source">Cement & Lime Production (CO₂)</td>
                    <td class="co2-emitted px-4 py-3" id="co2Emitted">1.8000 tCO₂e</td>
                    <td class="px-4 py-3" id="status"><span class="badge badge-success">Verified</span></td>
                </tr>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">process</td>
                    <td class="px-4 py-3 table-cell-text" id="source">Chemical & Fertiliser Production (N₂O, CO₂)</td>
                    <td class="co2-emitted px-4 py-3" id="co2Emitted">1.3500 tCO₂e</td>
                    <td class="px-4 py-3" id="status"><span class="badge badge-success">Verified</span></td>
                </tr>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">fugitive</td>
                    <td class="px-4 py-3 table-cell-text" id="source">Chiller</td>
                    <td class="co2-emitted px-4 py-3" id="co2Emitted">7.2500 tCO₂e</td>
                    <td class="px-4 py-3" id="status"><span class="badge badge-success">Verified</span></td>
                </tr>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">fugitive</td>
                    <td class="px-4 py-3 table-cell-text" id="source">Split A/C</td>
                    <td class="co2-emitted px-4 py-3" id="co2Emitted">7.2100 tCO₂e</td>
                    <td class="px-4 py-3" id="status"><span class="badge badge-warning">Pending</span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Methodology & Standards Section -->
    <div class="px-8 py-6">
        <div class="methodology-card bg-white rounded-lg border border-gray-200 p-6">
            <!-- Header -->
            <div class="d-flex align-items-center mb-4">
                <svg class="methodology-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                <h3 class="methodology-title mb-0 ms-3">Methodology & Standards</h3>
            </div>

            <!-- Main Content Sections -->
            <div class="row g-4 mb-4">
                <div class="col-12 col-md-6 col-lg-3">
                    <h4 class="methodology-section-title">Emission Standards</h4>
                    <p class="methodology-section-description">Corporate Accounting and Reporting Standard</p>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <h4 class="methodology-section-title">IPCC GWPs</h4>
                    <p class="methodology-section-description">AR5 and AR6 Global Warming Potentials</p>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <h4 class="methodology-section-title">EPA Emission Factors</h4>
                    <p class="methodology-section-description">Latest EPA and IPCC sources</p>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <h4 class="methodology-section-title">Uncertainty Assessment</h4>
                    <p class="methodology-section-description">Built-in uncertainty calculations</p>
                </div>
            </div>

            <!-- Separator -->
            <hr class="methodology-separator my-3">

            <!-- Footer -->
            <p class="methodology-footer mb-0">
                © 2025 Carbon AI. This tool helps organizations calculate Scope 1 emissions following international standards. Consult environmental professionals for official reporting.
            </p>
        </div>
    </div>

    <!-- Entry Mode Modal -->
    <div class="modal fade" id="entryModeModal" tabindex="-1" aria-labelledby="entryModeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered entry-mode-modal-dialog">
            <div class="modal-content entry-mode-modal">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title entry-mode-title" id="entryModeModalLabel">Choose Entry Mode</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-5">
                    <!-- Single Entry Option -->
                    <div class="entry-mode-option" id="singleEntryOption" data-bs-dismiss="modal">
                        <div class="entry-mode-content">
                            <div>
                                <h6 class="entry-mode-option-title">Single Entry</h6>
                                <p class="entry-mode-option-description">Add one emission source</p>
                            </div>
                        </div>
                        <svg class="entry-mode-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>

                    <!-- Bulk Entries Option -->
                    <div class="entry-mode-option">
                        <div class="entry-mode-content">
                            <div>
                                <h6 class="entry-mode-option-title">Bulk Entries</h6>
                                <p class="entry-mode-option-description">Add multiple entries at once</p>
                            </div>
                        </div>
                        <svg class="entry-mode-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>

                    <!-- Upload CSV Option -->
                    <div class="entry-mode-option">
                        <div class="entry-mode-content">
                            <div>
                                <h6 class="entry-mode-option-title">Upload CSV</h6>
                                <p class="entry-mode-option-description">Import from spreadsheet</p>
                            </div>
                        </div>
                        <svg class="entry-mode-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Single Entry Modal for Fuel & Energy -->
    <div class="modal fade" id="fuelEnergyModal" tabindex="-1" aria-labelledby="fuelEnergyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered single-entry-modal-dialog">
            <div class="modal-content single-entry-modal">
                <div class="modal-header border-0 pb-3 single-entry-modal-header">
                    <h5 class="modal-title single-entry-title" id="fuelEnergyModalLabel">Add Single Entry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body single-entry-modal-body">
                    <form id="singleEntryFormFuel">
                        <div class="row mb-3">
                            <div class="col-12 col-md-6">
                                <label for="entryId" class="form-label required">ID</label>
                                <input type="text" class="form-control" id="entryId" placeholder="e.g., Building A, Site-001" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="equipment" class="form-label required">Equipment</label>
                                <select class="form-select" id="equipment" required>
                                    <option value="">Select</option>
                                    <option value="Boiler">Boiler</option>
                                    <option value="Generator">Generator</option>
                                    <option value="Furnace">Furnace</option>
                                    <option value="Heater">Heater</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12 col-md-6">
                                <label for="fuelType" class="form-label required">Fuel Type</label>
                                <select class="form-select" id="fuelType" required>
                                    <option value="">Select</option>
                                    <option value="Natural Gas">Natural Gas</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Heavy Fuel Oil">Heavy Fuel Oil</option>
                                    <option value="LPG">LPG</option>
                                    <option value="Coal">Coal</option>
                                    <option value="Biomass">Biomass</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="fuelQuantity" class="form-label required">Fuel Quantity</label>
                                <input type="text" class="form-control" id="fuelQuantity" placeholder="0.00" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12 col-md-6">
                                <label for="unit" class="form-label required">Unit</label>
                                <select class="form-select" id="unit" required>
                                    <option value="">Select</option>
                                    <option value="L">L</option>
                                    <option value="kg">kg</option>
                                    <option value="kWh">kWh</option>
                                    <option value="m3">m³</option>
                                    <option value="Tonnes">Tonnes</option>
                                    <option value="MWh">MWh</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="country" class="form-label required">Country</label>
                                <input type="text" class="form-control" id="country" placeholder="e.g., MY, SG" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="form-label">Invoice Upload</label>
                                <div class="invoice-upload-area">
                                    <input type="file" class="invoice-upload-input" id="invoiceUpload" accept=".pdf,.jpg,.jpeg,.png" hidden>
                                    <label for="invoiceUpload" class="invoice-upload-label">
                                        <svg class="invoice-upload-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                        <span>Drag and drop or click to upload invoice</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="notes" class="form-label">Notes</label>
                                <textarea class="form-control" id="notes" rows="3" placeholder="Additional information..."></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-calculate" id="calculateBtn" disabled>Calculate</button>
                    <button type="button" class="btn btn-save" id="saveEntryBtn" disabled>Save Entry</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Single Entry Modal for Company Vehicles -->
    <div class="modal fade" id="vehicleModal" tabindex="-1" aria-labelledby="vehicleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered single-entry-modal-dialog">
            <div class="modal-content single-entry-modal">
                <div class="modal-header border-0 pb-3 single-entry-modal-header">
                    <h5 class="modal-title single-entry-title" id="vehicleModalLabel">Add Single Entry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body single-entry-modal-body">
                    <form id="singleEntryFormVehicles">
                        <div class="row mb-3">
                            <div class="col-12 col-md-6">
                                <label for="vehicleId" class="form-label required">ID</label>
                                <input type="text" class="form-control" id="vehicleId" placeholder="e.g., Vehicle-001, Truck-002" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="vehicleType" class="form-label required">Vehicle</label>
                                <select class="form-select" id="vehicleType" required>
                                    <option value="">Select</option>
                                    <option value="Cars, Trucks & Vans">Cars, Trucks & Vans</option>
                                    <option value="Forklifts & Construction Equipment">Forklifts & Construction Equipment</option>
                                    <option value="Boats & Ships">Boats & Ships</option>
                                    <option value="Aircraft & Helicopters">Aircraft & Helicopters</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12 col-md-6">
                                <label for="fuelTypeVehicle" class="form-label required">Fuel Type</label>
                                <select class="form-select" id="fuelTypeVehicle" required>
                                    <option value="">Select</option>
                                    <option value="Petrol">Petrol (Gasoline)</option>
                                    <option value="diesel">Diesel</option>
                                    <option value="Liquefied Petroleum Gas">Liquefied Petroleum Gas (LPG)</option>
                                    <option value="Compressed Natural Gas">Compressed Natural Gas (CNG)</option>
                                    <option value="Jet Fuel / Aviation Kerosene">Jet Fuel / Aviation Kerosene (Jet A-1)</option>
                                    <option value="Marine Gas Oil">Marine Gas Oil (MGO)</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="fuelQuantityVehicle" class="form-label required">Fuel Quantity</label>
                                <input type="text" class="form-control" id="fuelQuantityVehicle" placeholder="0.00" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12 col-md-6">
                                <label for="unitVehicle" class="form-label required">Unit</label>
                                <select class="form-select" id="unitVehicle" required>
                                    <option value="">Select</option>
                                    <option value="L">L</option>
                                    <option value="kg">kg</option>
                                    <option value="kwh">kWh</option>
                                    <option value="m³">m³</option>
                                    <option value="tonne">tonne</option>
                                    <option value="MWh">MWh</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="countryVehicle" class="form-label required">Country</label>
                                <input type="text" class="form-control" id="countryVehicle" placeholder="e.g., MY, SG" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="form-label">Invoice Upload</label>
                                <div class="invoice-upload-area">
                                    <input type="file" class="invoice-upload-input" id="invoiceUploadVehicle" accept=".pdf,.jpg,.jpeg,.png" hidden>
                                    <label for="invoiceUploadVehicle" class="invoice-upload-label">
                                        <svg class="invoice-upload-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                        <span>Drag and drop or click to upload invoice</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="notesVehicle" class="form-label">Notes</label>
                                <textarea class="form-control" id="notesVehicle" rows="3" placeholder="Additional information..."></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-calculate" id="calculateBtnVehicle" disabled>Calculate</button>
                    <button type="button" class="btn btn-save" id="saveEntryBtnVehicle" disabled>Save Entry</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Single Entry Modal for Production & Processes -->
    <div class="modal fade" id="productionProcessesModal" tabindex="-1" aria-labelledby="productionProcessesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered single-entry-modal-dialog">
            <div class="modal-content single-entry-modal">
                <div class="modal-header border-0 pb-3 single-entry-modal-header">
                    <h5 class="modal-title single-entry-title" id="productionProcessesModalLabel">Add Single Entry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body single-entry-modal-body">
                    <form id="singleEntryFormProduction">
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="productionId" class="form-label required">ID</label>
                                <input type="text" class="form-control" id="productionId" placeholder="e.g., Line-001, Plant-A" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="processType" class="form-label required">Process</label>
                                <select class="form-select" id="processType" required>
                                    <option value="">Select</option>
                                    <option value="Cement & Lime Production">Cement & Lime Production (CO₂)</option>
                                    <option value="Chemical & Fertiliser Production">Chemical & Fertiliser Production (N₂O, CO₂)</option>
                                    <option value="Metal Production">Metal Production (CO₂, PFCs)</option>
                                    <option value="Glass, Ceramics & Carbon Black">Glass, Ceramics & Carbon Black (CO₂)</option>
                                    <option value="Semiconductor & Electronics">Semiconductor & Electronics (PFCs, SF₆, NF₃)</option>
                                    <option value="Waste & Anaerobic Processes">Waste & Anaerobic Processes (CH₄, N₂O)</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="productionVolume" class="form-label required">Production Volume</label>
                                <input type="text" class="form-control" id="productionVolume" value="0.00" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="unitProduction" class="form-label required">Unit</label>
                                <select class="form-select" id="unitProduction" required>
                                    <option value="">Select</option>
                                    <option value="kg">kg</option>
                                    <option value="m3">m³</option>
                                    <option value="Nm³">Nm³</option>
                                    <option value="pcs">pcs</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="countryProduction" class="form-label required">Country</label>
                                <input type="text" class="form-control" id="countryProduction" value="MY" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="form-label">Invoice Upload</label>
                                <div class="invoice-upload-area">
                                    <input type="file" class="invoice-upload-input" id="invoiceUploadProduction" accept=".pdf,.jpg,.jpeg,.png" hidden>
                                    <label for="invoiceUploadProduction" class="invoice-upload-label">
                                        <svg class="invoice-upload-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                        <span>Drag and drop or click to upload invoice</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="notesProduction" class="form-label">Notes</label>
                                <textarea class="form-control" id="notesProduction" rows="3" placeholder="Additional information..."></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-calculate" id="calculateBtnProduction" disabled>Calculate</button>
                    <button type="button" class="btn btn-save" id="saveEntryBtnProduction" disabled>Save Entry</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Single Entry Modal for Refrigeration & Leaks -->
    <div class="modal fade" id="refrigerationLeaksModal" tabindex="-1" aria-labelledby="refrigerationLeaksModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered single-entry-modal-dialog">
            <div class="modal-content single-entry-modal">
                <div class="modal-header border-0 pb-3 single-entry-modal-header">
                    <h5 class="modal-title single-entry-title" id="refrigerationLeaksModalLabel">Add Single Entry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body single-entry-modal-body">
                    <form id="singleEntryFormRefrigeration">
                        <div class="row mb-3">
                            <div class="col-12 col-md-6">
                                <label for="refrigerationId" class="form-label required">ID</label>
                                <input type="text" class="form-control" id="refrigerationId" placeholder="e.g., AC-001, Chiller-A" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="equipmentSystem" class="form-label required">Equipment/System</label>
                                <select class="form-select" id="equipmentSystem" required>
                                    <option value="">Select</option>
                                    <option value="Chiller">Chiller</option>
                                    <option value="Cold Room">Cold Room</option>
                                    <option value="Split A/C">Split A/C</option>
                                    <option value="VRF System">VRF System</option>
                                    <option value="Refrigerated Truck">Refrigerated Truck</option>
                                    <option value="Fire Suppression System">Fire Suppression System</option>
                                    <option value="Gas Compressor">Gas Compressor</option>
                                    <option value="Switchgear">Switchgear</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12 col-md-6">
                                <label for="refrigerantType" class="form-label required">Gas/Refrigerant Type</label>
                                <select class="form-select" id="refrigerantType" required>
                                    <option value="">Select</option>
                                    <option value="R-22">R-22</option>
                                    <option value="R-134a">R-134a</option>
                                    <option value="R-404a">R-404A</option>
                                    <option value="R-410a">R-410A</option>
                                    <option value="R-32">R-32</option>
                                    <option value="HFC-227ea">HFC-227ea</option>
                                    <option value="SF₆">SF₆</option>
                                    <option value="CH₄">CH₄</option>
                                    <option value="CO2">CO₂ (R-744)</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="leakageQuantity" class="form-label required">Quantity</label>
                                <input type="text" class="form-control" id="leakageQuantity" value="0.00" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12 col-md-6">
                                <label for="unitRefrigeration" class="form-label required">Unit</label>
                                <select class="form-select" id="unitRefrigeration" required>
                                    <option value="">Select</option>
                                    <option value="kg">kg</option>
                                    <option value="g">g</option>
                                    <option value="t">t</option>
                                    <option value="lb">lb</option>
                                    <option value="oz">oz</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="countryRefrigeration" class="form-label required">Country</label>
                                <input type="text" class="form-control" id="countryRefrigeration" value="MY" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="form-label">Invoice Upload</label>
                                <div class="invoice-upload-area">
                                    <input type="file" class="invoice-upload-input" id="invoiceUploadRefrigeration" accept=".pdf,.jpg,.jpeg,.png" hidden>
                                    <label for="invoiceUploadRefrigeration" class="invoice-upload-label">
                                        <svg class="invoice-upload-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                        <span>Drag and drop or click to upload invoice</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="notesRefrigeration" class="form-label">Notes</label>
                                <textarea class="form-control" id="notesRefrigeration" rows="3" placeholder="Additional information..."></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-calculate" id="calculateBtnRefrigeration" disabled>Calculate</button>
                    <button type="button" class="btn btn-save" id="saveEntryBtnRefrigeration" disabled>Save Entry</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
// Track which category was selected
let selectedCategory = 'fuel-energy';

    // Initialize validation when modal is shown
document.addEventListener('DOMContentLoaded', function() {
    const fuelEnergyModal = document.getElementById('fuelEnergyModal');
    const vehicleModal = document.getElementById('vehicleModal');
    const productionProcessesModal = document.getElementById('productionProcessesModal');
    const refrigerationLeaksModal = document.getElementById('refrigerationLeaksModal');

    if (fuelEnergyModal) {
        fuelEnergyModal.addEventListener('shown.bs.modal', function() {
            initializeValidation('fuel-energy');
        });
    }

    if (vehicleModal) {
        vehicleModal.addEventListener('shown.bs.modal', function() {
            initializeValidation('vehicles');
        });
    }

    if (productionProcessesModal) {
        productionProcessesModal.addEventListener('shown.bs.modal', function() {
            initializeValidation('production-processes');
        });
    }

    if (refrigerationLeaksModal) {
        refrigerationLeaksModal.addEventListener('shown.bs.modal', function() {
            initializeValidation('refrigeration-leaks');
        });
    }

    // Handle entry mode modal - track which category button was clicked
    const entryModeModal = document.getElementById('entryModeModal');
    if (entryModeModal) {
        entryModeModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            if (button && button.hasAttribute('data-category')) {
                selectedCategory = button.getAttribute('data-category');
            }
        });
    }

    // Handle single entry option click
    const singleEntryOption = document.getElementById('singleEntryOption');
    if (singleEntryOption) {
        singleEntryOption.addEventListener('click', function() {
            if (selectedCategory === 'vehicles') {
                setTimeout(function() {
                    const modal = new bootstrap.Modal(document.getElementById('vehicleModal'));
                    modal.show();
                }, 300);
            } else if (selectedCategory === 'production-processes') {
                setTimeout(function() {
                    const modal = new bootstrap.Modal(document.getElementById('productionProcessesModal'));
                    modal.show();
                }, 300);
            } else if (selectedCategory === 'refrigeration-leaks') {
                setTimeout(function() {
                    const modal = new bootstrap.Modal(document.getElementById('refrigerationLeaksModal'));
                    modal.show();
                }, 300);
            } else {
                setTimeout(function() {
                    const modal = new bootstrap.Modal(document.getElementById('fuelEnergyModal'));
                    modal.show();
                }, 300);
            }
        });
    }

    // Handle invoice upload display for Fuel & Energy modal
    const invoiceUpload = document.getElementById('invoiceUpload');
    const invoiceUploadLabel = document.querySelector('#fuelEnergyModal .invoice-upload-label');
    const uploadArea = document.querySelector('#fuelEnergyModal .invoice-upload-area');

    if (invoiceUpload && uploadArea) {
        invoiceUpload.addEventListener('change', function(e) {
            if (e.target.files.length > 0 && invoiceUploadLabel) {
                invoiceUploadLabel.innerHTML = `
                    <svg class="invoice-upload-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>${e.target.files[0].name}</span>
                `;
            }
        });

        // Handle drag and drop for Fuel & Energy
        setupDragAndDrop(uploadArea, invoiceUpload);
    }

    // Handle invoice upload display for Vehicles modal
    const invoiceUploadVehicle = document.getElementById('invoiceUploadVehicle');
    const invoiceUploadLabelVehicle = document.querySelector('#vehicleModal .invoice-upload-label');
    const uploadAreaVehicle = document.querySelector('#vehicleModal .invoice-upload-area');

    if (invoiceUploadVehicle && uploadAreaVehicle) {
        invoiceUploadVehicle.addEventListener('change', function(e) {
            if (e.target.files.length > 0 && invoiceUploadLabelVehicle) {
                invoiceUploadLabelVehicle.innerHTML = `
                    <svg class="invoice-upload-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>${e.target.files[0].name}</span>
                `;
            }
        });

        // Handle drag and drop for Vehicles
        setupDragAndDrop(uploadAreaVehicle, invoiceUploadVehicle);
    }

    // Handle invoice upload display for Production & Processes modal
    const invoiceUploadProduction = document.getElementById('invoiceUploadProduction');
    const invoiceUploadLabelProduction = document.querySelector('#productionProcessesModal .invoice-upload-label');
    const uploadAreaProduction = document.querySelector('#productionProcessesModal .invoice-upload-area');

    if (invoiceUploadProduction && uploadAreaProduction) {
        invoiceUploadProduction.addEventListener('change', function(e) {
            if (e.target.files.length > 0 && invoiceUploadLabelProduction) {
                invoiceUploadLabelProduction.innerHTML = `
                    <svg class="invoice-upload-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>${e.target.files[0].name}</span>
                `;
            }
        });

        // Handle drag and drop for Production & Processes
        setupDragAndDrop(uploadAreaProduction, invoiceUploadProduction);
    }

    // Handle invoice upload display for Refrigeration & Leaks modal
    const invoiceUploadRefrigeration = document.getElementById('invoiceUploadRefrigeration');
    const invoiceUploadLabelRefrigeration = document.querySelector('#refrigerationLeaksModal .invoice-upload-label');
    const uploadAreaRefrigeration = document.querySelector('#refrigerationLeaksModal .invoice-upload-area');

    if (invoiceUploadRefrigeration && uploadAreaRefrigeration) {
        invoiceUploadRefrigeration.addEventListener('change', function(e) {
            if (e.target.files.length > 0 && invoiceUploadLabelRefrigeration) {
                invoiceUploadLabelRefrigeration.innerHTML = `
                    <svg class="invoice-upload-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>${e.target.files[0].name}</span>
                `;
            }
        });

        // Handle drag and drop for Refrigeration & Leaks
        setupDragAndDrop(uploadAreaRefrigeration, invoiceUploadRefrigeration);
    }
});

function initializeValidation(category) {
    let form, calculateBtn, requiredFields;

    if (category === 'vehicles') {
        form = document.getElementById('singleEntryFormVehicles');
        calculateBtn = document.getElementById('calculateBtnVehicle');
        requiredFields = ['vehicleId', 'vehicleType', 'fuelTypeVehicle', 'fuelQuantityVehicle', 'unitVehicle', 'countryVehicle'];
    } else if (category === 'production-processes') {
        form = document.getElementById('singleEntryFormProduction');
        calculateBtn = document.getElementById('calculateBtnProduction');
        requiredFields = ['productionId', 'processType', 'productionVolume', 'unitProduction', 'countryProduction'];
    } else if (category === 'refrigeration-leaks') {
        form = document.getElementById('singleEntryFormRefrigeration');
        calculateBtn = document.getElementById('calculateBtnRefrigeration');
        requiredFields = ['refrigerationId', 'equipmentSystem', 'refrigerantType', 'leakageQuantity', 'unitRefrigeration', 'countryRefrigeration'];
    } else {
        form = document.getElementById('singleEntryFormFuel');
        calculateBtn = document.getElementById('calculateBtn');
        requiredFields = ['entryId', 'equipment', 'fuelType', 'fuelQuantity', 'unit', 'country'];
    }

    if (!calculateBtn || !form) return;

    function validateForm() {
        let allFilled = true;

        requiredFields.forEach(fieldId => {
            const field = document.getElementById(fieldId);
            if (!field) return;

            const value = field.value.trim();

            if (fieldId === 'fuelQuantity' || fieldId === 'fuelQuantityVehicle' || fieldId === 'materialQuantity' || fieldId === 'productionVolume' || fieldId === 'leakageQuantity') {
                if (!value || value === '' || value === '0' || value === '0.00') {
                    allFilled = false;
                }
            } else {
                if (!value || value === '') {
                    allFilled = false;
                }
            }
        });

        if (allFilled) {
            calculateBtn.disabled = false;
            calculateBtn.classList.add('btn-enabled');
            calculateBtn.style.cssText = 'background-color: #3b82f6 !important; background: #3b82f6 !important; color: #fff !important; cursor: pointer !important; border: none !important;';
        } else {
            calculateBtn.disabled = true;
            calculateBtn.classList.remove('btn-enabled');
            calculateBtn.style.cssText = 'background-color: #a9acb2 !important; background: #a9acb2 !important; color: #fff !important; cursor: not-allowed !important; border: none !important;';
        }
    }

    // Attach event listeners to all required fields
    requiredFields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            field.addEventListener('input', validateForm);
            field.addEventListener('change', validateForm);
        }
    });

    // Initial validation
    validateForm();
}

function setupDragAndDrop(uploadArea, fileInput) {
    if (!uploadArea || !fileInput) return;

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    function highlight() {
        uploadArea.classList.add('drag-over');
    }

    function unhighlight() {
        uploadArea.classList.remove('drag-over');
    }

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        fileInput.files = files;
        fileInput.dispatchEvent(new Event('change'));
    }

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, preventDefaults, false);
    });

    ['dragenter', 'dragover'].forEach(eventName => {
        uploadArea.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, unhighlight, false);
    });

    uploadArea.addEventListener('drop', handleDrop, false);
}

// Filter Panel Toggle and Table Filtering
document.addEventListener('DOMContentLoaded', function() {
    const filterToggleBtn = document.getElementById('filterToggleBtn');
    const filterPanel = document.getElementById('filterPanel');
    const clearFilters = document.getElementById('clearFilters');
    const filterCategory = document.getElementById('filterCategory');
    const filterCO2 = document.getElementById('filterCO2');
    const filterSource = document.getElementById('filterSource');
    const filterStatus = document.getElementById('filterStatus');
    const tableBody = document.querySelector('table tbody');

    // Toggle filter panel visibility
    if (filterToggleBtn && filterPanel) {
        filterToggleBtn.addEventListener('click', function() {
            filterPanel.classList.toggle('hidden');
        });
    }

    // Filter table rows based on selected filters
    function filterTable() {
        if (!tableBody) return;

        const categoryValue = filterCategory ? filterCategory.value.toLowerCase() : '';
        const co2Value = filterCO2 ? filterCO2.value : '';
        const sourceValue = filterSource ? filterSource.value : '';
        const statusValue = filterStatus ? filterStatus.value : '';

        const rows = tableBody.querySelectorAll('tr');

        rows.forEach(row => {
            let showRow = true;

            // Filter by Category
            if (categoryValue) {
                const categoryCell = row.cells[0];
                if (categoryCell && categoryCell.textContent.trim().toLowerCase() !== categoryValue) {
                    showRow = false;
                }
            }

            // Filter by Source
            if (showRow && sourceValue) {
                const sourceCell = row.cells[1];
                if (sourceCell && sourceCell.textContent.trim() !== sourceValue) {
                    showRow = false;
                }
            }

            // Filter by CO₂ Emitted
            if (showRow && co2Value) {
                const co2Cell = row.cells[2];
                if (co2Cell) {
                    const co2Text = co2Cell.textContent.trim();
                    const co2Number = parseFloat(co2Text.replace(' tCO₂e', ''));

                    if (!isNaN(co2Number)) {
                        if (co2Value === 'low' && !(co2Number >= 0 && co2Number < 2)) {
                            showRow = false;
                        } else if (co2Value === 'medium' && !(co2Number >= 2 && co2Number < 5)) {
                            showRow = false;
                        } else if (co2Value === 'high' && co2Number < 5) {
                            showRow = false;
                        }
                    } else {
                        showRow = false;
                    }
                }
            }

            // Filter by Status
            if (showRow && statusValue) {
                const statusCell = row.cells[3];
                if (statusCell) {
                    const badge = statusCell.querySelector('.badge');
                    if (badge && badge.textContent.trim() !== statusValue) {
                        showRow = false;
                    }
                }
            }

            // Show or hide row
            if (showRow) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // Add event listeners to filter dropdowns
    if (filterCategory) {
        filterCategory.addEventListener('change', filterTable);
    }

    if (filterCO2) {
        filterCO2.addEventListener('change', filterTable);
    }

    if (filterSource) {
        filterSource.addEventListener('change', filterTable);
    }

    if (filterStatus) {
        filterStatus.addEventListener('change', filterTable);
    }

    // Clear all filters
    if (clearFilters) {
        clearFilters.addEventListener('click', function(e) {
            e.preventDefault();
            if (filterCategory) filterCategory.value = '';
            if (filterCO2) filterCO2.value = '';
            if (filterSource) filterSource.value = '';
            if (filterStatus) filterStatus.value = '';
            filterTable(); // Re-filter to show all rows
        });
    }
});
</script>
@endsection






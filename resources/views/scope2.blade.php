@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/scope1.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@section('content')
<div class="bg-white min-h-screen">
    <!-- Header Section -->
    <div class="px-8 py-6">
        <div class="flex items-start justify-between">
            <div>
                <h1 class="main-title">Scope 2</h1>
                <p class="text-sm text-gray-600">Indirect emissions from purchased energy</p>
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
                <button class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                    Finish update
                </button>
            </div>
        </div>
    </div>

    <!-- Top Summary Cards -->
    <div class="px-8 py-6">
        <div class="row g-3">
            <!-- Location-Based Total Card -->
            <div class="col-12 col-md-6">
                <div class="card">
                    <h3 class="subtitle">Location-Based Total</h3>
                    <div class="scope2-total my-2">
                        <span class="location-based-total" id=locationBasedTotal>39.05</span><br>
                        <span class="unit">tCO₂e</span>
                        <p class="subcontent">Based on regional grid emission factors</p>
                    </div>
                </div>
            </div>

            <!-- Market-Based Total Card -->
            <div class="col-12 col-md-6">
                <div class="card">
                    <h3 class="subtitle">Market-Based Total</h3>
                    <div class="scope2-total my-2">
                        <span class="market-based-total" id="marketBasedTotal" style="color: #16d3ca;">90.35</span><br>
                        <span class="unit">tCO₂e</span>
                        <p class="subcontent">Reflects contractual instruments (RECs, PPAs)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Overview Section -->
    <div class="overview px-8 py-6">
        <div class="d-flex my-3" style="justify-content: space-between; align-items: center;">
            <h2 class="header mb-0">Overview</h2>
                <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#manageCardsModal">
                Manage Cards
            </button>
        </div>
        <div class="row g-3">
            <!-- Card 1: Total Scope 2 tCO₂e -->
            <div class="col-12 col-md-4">
                <div class="card" id="totalScope2Card">
                    <div class="top d-flex mb-2" style="flex-direction: row;">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        <div class="ml-3">
                            <h3 class="subtitle">Total Scope 2 tCO₂e</h3>
                            <p class="subcontent">Indirect energy emissions (Location-based)</p>
                        </div>
                    </div>

                    <div class="my-2">
                        <span class="scope2" id="scope2Value">39.05</span>
                        <span class="unit">tCO₂e</span>
                    </div>
                    <div class="d-flex mt-2" style="align-items: center;">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                        <span class="percentage">-12.5% &nbsp;</span>
                        <span class="vs">vs last year</span>
                    </div>
                </div>
            </div>

            <!-- Card 2: Target vs Actual -->
            <div class="col-12 col-md-4">
                <div class="card" id="targetVsActualCard">
                    <div class="top d-flex mb-2" style="flex-direction: row;">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="ml-3">
                            <h3 class="subtitle">Target vs Actual</h3>
                            <p class="subcontent">Target 84.75 tCO₂e (85.0%)</p>
                        </div>
                    </div>

                    <div class="my-2">
                        <span class="scope2" id="targetValue">39.05</span>
                        <span class="unit">tCO₂e</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden mt-1">
                        <div class="bg-teal-500 h-2 rounded-full" style="width: 46.1%"></div>
                    </div>
                </div>
            </div>

            <!-- Card 3: Intensity per Revenue -->
            <div class="col-12 col-md-4">
                <div class="card" id="intensityPerRevenueCard">
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
                        <span class="scope2" id="intensityValue">1.99</span>
                        <span class="unit">tCO₂e/$M</span>
                    </div>
                </div>
            </div>

            <!-- Card 4: Data Confidence -->
            <div class="col-12 col-md-4">
                <div class="card" id="dataConfidenceCard">
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
                        <span class="scope2" id="confidenceValue">75.0</span>
                        <span class="unit">%</span>
                    </div>
                    <div class="warning">
                        <svg class="w-4 h-4 text-yellow-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <p class="subcontent text-yellow-800 mb-0 ml-2">▲ Improve by adding more verified entries</p>
                    </div>
                </div>
            </div>

            <!-- Card 5: Entries -->
            <div class="col-12 col-md-4">
                <div class="card" id="entriesCard">
                    <div class="top d-flex mb-2" style="flex-direction: row;">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <div class="ml-3">
                            <h3 class="subtitle">Entries</h3>
                            <p class="subcontent">Active emission entries</p>
                        </div>
                    </div>

                    <div class="my-2">
                        <span class="scope2" id="entriesValue">8</span>
                    </div>
                </div>
            </div>

            <!-- Card 6: Exceptions -->
            <div class="col-12 col-md-4">
                <div class="card" id="exceptionsCard">
                    <div class="top d-flex mb-2" style="flex-direction: row;">
                        <div style="color: #f59e0b; background: rgba(245, 158, 11, 0.1); padding: 0.5rem; width: 2.5rem; height: 2.5rem; border-radius: 9px; flex-shrink: 0; display: flex; align-items: center; justify-content: center;">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1.5rem; height: 1.5rem;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="subtitle">Exceptions</h3>
                            <p class="subcontent">Data quality issues</p>
                        </div>
                    </div>

                    <div class="my-2">
                        <span class="scope2" id="exceptionsValue">2</span>
                    </div>
                    <div class="warning">
                        <svg class="w-4 h-4 text-yellow-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <p class="subcontent text-yellow-800 mb-0 ml-2">▲ 2 entries need review</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Emission Categories Section -->
    <div class="emission px-8 py-6">
        <h2>Emission Categories</h2>
        <div class="row g-3">
            <!-- Card 1: Purchased Electricity -->
            <div class="col-12 col-md-6">
                <div class="emission-card">
                    <div class="emission-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <div class="ml-3">
                            <h3 class="emission-title">Purchased Electricity</h3>
                            <p class="emission-subtitle">Indirect Energy Emissions</p>
                        </div>
                    </div>
                    <div class="my-2">
                        <div class="emission-value" id="purchasedElectricityValue">39.05 tCO₂e</div>
                        <span class="emission-percentage" id="purchasedElectricityValueTotal">(100.0% of total)</span>
                    </div>
                    <p class="emission-description">Calculate emissions from purchased electricity consumption across facilities.</p>
                    <button class="emission-add-btn" data-bs-toggle="modal" data-bs-target="#entryModeModal" data-category="electricity">+ Add Entry</button>
                </div>
            </div>

            <!-- Card 2: Purchased Steam -->
            <div class="col-12 col-md-6">
                <div class="emission-card">
                    <div class="emission-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                        </svg>
                        <div class="ml-3">
                            <h3 class="emission-title">Purchased Steam</h3>
                            <p class="emission-subtitle">Indirect Heat Emissions</p>
                        </div>
                    </div>
                    <div class="my-2">
                        <div class="emission-value" id="purchasedSteamValue">44.65 tCO₂e</div>
                        <span class="emission-percentage" id="purchasedSteamValueTotal">(114.3% of total)</span>
                    </div>
                    <p class="emission-description">Calculate emissions from purchased steam for industrial processes.</p>
                    <button class="emission-add-btn" data-bs-toggle="modal" data-bs-target="#entryModeModal" data-category="steam">+ Add Entry</button>
                </div>
            </div>

            <!-- Card 3: Purchased Heat -->
            <div class="col-12 col-md-6">
                <div class="emission-card">
                    <div class="emission-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <div class="ml-3">
                            <h3 class="emission-title">Purchased Heat</h3>
                            <p class="emission-subtitle">Indirect Thermal Emissions</p>
                        </div>
                    </div>
                    <div class="my-2">
                        <div class="emission-value" id="purchasedHeatValue">2.40 tCO₂e</div>
                        <span class="emission-percentage" id="purchasedHeatValueTotal">(6.1% of total)</span>
                    </div>
                    <p class="emission-description">Calculate emissions from purchased heating for buildings and processes.</p>
                    <button class="emission-add-btn" data-bs-toggle="modal" data-bs-target="#entryModeModal" data-category="heat">+ Add Entry</button>
                </div>
            </div>

            <!-- Card 4: Purchased Cooling -->
            <div class="col-12 col-md-6">
                <div class="emission-card">
                    <div class="emission-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                        <div class="ml-3">
                            <h3 class="emission-title">Purchased Cooling</h3>
                            <p class="emission-subtitle">Indirect Cooling Emissions</p>
                        </div>
                    </div>
                    <div class="my-2">
                        <div class="emission-value" id="purchasedCoolingValue">5.60 tCO₂e</div>
                        <span class="emission-percentage" id="purchasedCoolingValueTotal">(14.3% of total)</span>
                    </div>
                    <p class="emission-description">Calculate emissions from purchased chilled water and cooling services.</p>
                    <button class="emission-add-btn" data-bs-toggle="modal" data-bs-target="#entryModeModal" data-category="cooling">+ Add Entry</button>
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
        <div id="filterPanel" class="bg-white rounded-lg border border-gray-200 p-4 mb-4 hidden" style="position: sticky; top: 0; z-index: 10; background-color: white; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <div class="row g-3">
                <div class="col-12 col-md-4">
                    <label for="filterCategory" class="form-label">Category</label>
                    <select class="form-select" id="filterCategory">
                        <option value="">All Categories</option>
                        <option value="Electricity">Electricity</option>
                        <option value="Steam">Steam</option>
                        <option value="Heat">Heat</option>
                        <option value="Cooling">Cooling</option>
                    </select>
                </div>
                <div class="col-12 col-md-4">
                    <label for="filterSource" class="form-label">Source</label>
                    <select class="form-select" id="filterSource">
                        <option value="">All Sources</option>
                        <option value="Main Office Building">Main Office Building</option>
                        <option value="Manufacturing Plant A">Manufacturing Plant A</option>
                        <option value="Industrial Steam Plant">Industrial Steam Plant</option>
                        <option value="Chemical Processing Unit">Chemical Processing Unit</option>
                        <option value="District Heating">District Heating - Office Complex</option>
                        <option value="Chilled Water Plant">Chilled Water Plant - Data Center</option>
                        <option value="Central Cooling">Central Cooling - Manufacturing</option>
                    </select>
                </div>
                <div class="col-12 col-md-4">
                    <label for="filterLocationBased" class="form-label">Location-Based</label>
                    <select class="form-select" id="filterLocationBased">
                        <option value="">All</option>
                        <option value="has-value">Has Value</option>
                        <option value="no-value">No Value</option>
                    </select>
                </div>
            </div>
            <div class="row g-3 mt-0">
                <div class="col-12 col-md-4">
                    <label for="filterMarketBased" class="form-label">Market-Based</label>
                    <select class="form-select" id="filterMarketBased">
                        <option value="">All</option>
                        <option value="has-value">Has Value</option>
                        <option value="no-value">No Value</option>
                    </select>
                </div>
                <div class="col-12 col-md-4">
                    <label for="filterPeriod" class="form-label">Period</label>
                    <select class="form-select" id="filterPeriod">
                        <option value="">All Periods</option>
                        <option value="2024-01">2024-01-01 to 2024-01-31</option>
                    </select>
                </div>
                <div class="col-12 col-md-4">
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
                    <th class="px-4 py-3 table-header">CO₂ emitted (Location-Based)</th>
                    <th class="px-4 py-3 table-header">CO₂ emitted (Market-Based)</th>
                    <th class="px-4 py-3 table-header">Period</th>
                    <th class="px-4 py-3 table-header">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">Electricity</td>
                    <td class="px-4 py-3 table-cell-text" id="source">
                        Main Office Building
                        <span id="supplierName">TNB Energy</span>
                    </td>
                    <td class="co2-emitted co2-location-based px-4 py-3" id="co2EmittedLocationBased">8.55 tCO₂e</td>
                    <td class="co2-emitted px-4 py-3" id="co2EmittedMarketBased">7.20 tCO₂e</td>
                    <td class="px-4 py-3 table-cell-text" id="period">2024-01-01 to 2024-01-31</td>
                    <td class="px-4 py-3" id="status"><span class="badge badge-success">Verified</span></td>
                </tr>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">Electricity</td>
                    <td class="px-4 py-3 table-cell-text" id="source">
                        Manufacturing Plant A
                        <span id="supplierName">TNB Energy</span>
                    </td>
                    <td class="co2-emitted co2-location-based px-4 py-3" id="co2EmittedLocationBased">25.65 tCO₂e</td>
                    <td class="co2-emitted px-4 py-3" id="co2EmittedMarketBased">25.65 tCO₂e</td>
                    <td class="px-4 py-3 table-cell-text" id="period">2024-01-01 to 2024-01-31</td>
                    <td class="px-4 py-3" id="status"><span class="badge badge-success">Verified</span></td>
                </tr>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">Electricity</td>
                    <td class="px-4 py-3 table-cell-text" id="source">
                        Warehouse B
                        <span id="supplierName">TNB Energy</span>
                    </td>
                    <td class="co2-emitted co2-location-based px-4 py-3" id="co2EmittedLocationBased">4.85 tCO₂e</td>
                    <td class="co2-emitted px-4 py-3" id="co2EmittedMarketBased">4.85 tCO₂e</td>
                    <td class="px-4 py-3 table-cell-text" id="period">2024-01-01 to 2024-01-31</td>
                    <td class="px-4 py-3" id="status"><span class="badge badge-success">Verified</span></td>
                </tr>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">Steam</td>
                    <td class="px-4 py-3 table-cell-text" id="source">
                        Industrial Steam Plant
                        <span id="supplierName">Steam Solutions Ltd</span>
                    </td>
                    <td class="co2-emitted co2-location-based px-4 py-3" id="co2EmittedLocationBased">-</td>
                    <td class="co2-emitted px-4 py-3" id="co2EmittedMarketBased">28.50 tCO₂e</td>
                    <td class="px-4 py-3 table-cell-text" id="period">2024-01-01 to 2024-01-31</td>
                    <td class="px-4 py-3" id="status"><span class="badge badge-success">Verified</span></td>
                </tr>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">Steam</td>
                    <td class="px-4 py-3 table-cell-text" id="source">
                        Chemical Processing Unit
                        <span id="supplierName">Industrial Steam Co</span>
                    </td>
                    <td class="co2-emitted co2-location-based px-4 py-3" id="co2EmittedLocationBased">-</td>
                    <td class="co2-emitted px-4 py-3" id="co2EmittedMarketBased">16.15 tCO₂e</td>
                    <td class="px-4 py-3 table-cell-text" id="period">2024-01-01 to 2024-01-31</td>
                    <td class="px-4 py-3" id="status"><span class="badge badge-warning">Pending</span></td>
                </tr>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">Heat</td>
                    <td class="px-4 py-3 table-cell-text" id="source">
                        District Heating - Office Complex
                        <span id="supplierName">District Energy Solutions</span>
                    </td>
                    <td class="co2-emitted co2-location-based px-4 py-3" id="co2EmittedLocationBased">-</td>
                    <td class="co2-emitted px-4 py-3" id="co2EmittedMarketBased">2.40 tCO₂e</td>
                    <td class="px-4 py-3 table-cell-text" id="period">2024-01-01 to 2024-01-31</td>
                    <td class="px-4 py-3" id="status"><span class="badge badge-success">Verified</span></td>
                </tr>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">Cooling</td>
                    <td class="px-4 py-3 table-cell-text" id="source">
                        Chilled Water Plant - Data Center
                        <span id="supplierName">Cool Solutions</span>
                    </td>
                    <td class="co2-emitted co2-location-based px-4 py-3" id="co2EmittedLocationBased">-</td>
                    <td class="co2-emitted px-4 py-3" id="co2EmittedMarketBased">3.40 tCO₂e</td>
                    <td class="px-4 py-3 table-cell-text" id="period">2024-01-01 to 2024-01-31</td>
                    <td class="px-4 py-3" id="status"><span class="badge badge-success">Verified</span></td>
                </tr>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">Cooling</td>
                    <td class="px-4 py-3 table-cell-text" id="source">
                        Central Cooling - Manufacturing
                        <span id="supplierName">Industrial Cooling Ltd</span>
                    </td>
                    <td class="co2-emitted co2-location-based px-4 py-3" id="co2EmittedLocationBased">-</td>
                    <td class="co2-emitted px-4 py-3" id="co2EmittedMarketBased">2.30 tCO₂e</td>
                    <td class="px-4 py-3 table-cell-text" id="period">2024-01-01 to 2024-01-31</td>
                    <td class="px-4 py-3" id="status"><span class="badge badge-success">Verified</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Manage Overview Cards Modal -->
<div class="modal fade" id="manageCardsModal" tabindex="-1" aria-labelledby="manageCardsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
            <div class="modal-header border-0 pb-3" style="padding: 1.5rem 1.5rem 0.75rem;">
                <h5 class="modal-title" id="manageCardsModalLabel" style="font-size: 1.25rem; font-weight: 600; color: #111827; margin: 0 auto;">Manage Overview Cards</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin: 0;"></button>
            </div>
            <div class="modal-body px-5">
                <div class="d-flex flex-column" style="gap: 1rem;">
                    <div class="form-check" style="display: flex; align-items: center; padding: 0.75rem 0;">
                        <input class="form-check-input" type="checkbox" id="cardTotalScope2" checked style="width: 18px; height: 18px; margin-top: 0; cursor: pointer;">
                        <label class="form-check-label" for="cardTotalScope2" style="margin-left: 0.75rem; font-size: 1rem; color: #111827; cursor: pointer; flex: 1;">
                            Total Scope 2 tCO₂e
                        </label>
                    </div>
                    <div class="form-check" style="display: flex; align-items: center; padding: 0.75rem 0;">
                        <input class="form-check-input" type="checkbox" id="cardTargetVsActual" checked style="width: 18px; height: 18px; margin-top: 0; cursor: pointer;">
                        <label class="form-check-label" for="cardTargetVsActual" style="margin-left: 0.75rem; font-size: 1rem; color: #111827; cursor: pointer; flex: 1;">
                            Target vs Actual
                        </label>
                    </div>
                    <div class="form-check" style="display: flex; align-items: center; padding: 0.75rem 0;">
                        <input class="form-check-input" type="checkbox" id="cardIntensityPerRevenue" checked style="width: 18px; height: 18px; margin-top: 0; cursor: pointer;">
                        <label class="form-check-label" for="cardIntensityPerRevenue" style="margin-left: 0.75rem; font-size: 1rem; color: #111827; cursor: pointer; flex: 1;">
                            Intensity per Revenue
                        </label>
                    </div>
                    <div class="form-check" style="display: flex; align-items: center; padding: 0.75rem 0;">
                        <input class="form-check-input" type="checkbox" id="cardDataConfidence" checked style="width: 18px; height: 18px; margin-top: 0; cursor: pointer;">
                        <label class="form-check-label" for="cardDataConfidence" style="margin-left: 0.75rem; font-size: 1rem; color: #111827; cursor: pointer; flex: 1;">
                            Data Confidence
                        </label>
                    </div>
                    <div class="form-check" style="display: flex; align-items: center; padding: 0.75rem 0;">
                        <input class="form-check-input" type="checkbox" id="cardEntries" checked style="width: 18px; height: 18px; margin-top: 0; cursor: pointer;">
                        <label class="form-check-label" for="cardEntries" style="margin-left: 0.75rem; font-size: 1rem; color: #111827; cursor: pointer; flex: 1;">
                            Entries
                        </label>
                    </div>
                    <div class="form-check" style="display: flex; align-items: center; padding: 0.75rem 0;">
                        <input class="form-check-input" type="checkbox" id="cardExceptions" checked style="width: 18px; height: 18px; margin-top: 0; cursor: pointer;">
                        <label class="form-check-label" for="cardExceptions" style="margin-left: 0.75rem; font-size: 1rem; color: #111827; cursor: pointer; flex: 1;">
                            Exceptions
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0" style="padding: 0 1.5rem 1.5rem;">
                <button type="button" class="btn w-100" id="doneManageCardsBtn" style="background-color: #14b8a6; color: #fff; border: none; padding: 0.75rem; border-radius: 8px; font-weight: 500; font-size: 1rem;">
                    Done
                </button>
            </div>
        </div>
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

<!-- Single Entry Modal for Purchased Electricity -->
<div class="modal fade" id="electricityModal" tabindex="-1" aria-labelledby="electricityModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered single-entry-modal-dialog">
        <div class="modal-content single-entry-modal">
            <div class="modal-header border-0 pb-3 single-entry-modal-header">
                <h5 class="modal-title single-entry-title" id="electricityModalLabel">Add Single Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body single-entry-modal-body">
                <form id="singleEntryFormElectricity">
                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="buildingSiteId" class="form-label required">Building / Site ID</label>
                            <input type="text" class="form-control" id="buildingSiteId" placeholder="e.g., Building A, Site-001" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="supplierName" class="form-label required">Supplier Name</label>
                            <input type="text" class="form-control" id="supplierName" placeholder="e.g., TNB Energy, Steam Solutions" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="quantityElectricity" class="form-label required">Quantity</label>
                            <input type="text" class="form-control" id="quantityElectricity" value="0.00" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="unitElectricity" class="form-label required">Unit</label>
                            <select class="form-select" id="unitElectricity" required>
                                <option value="">Select unit</option>
                                <option value="kWh">kWh</option>
                                <option value="MWh">MWh</option>
                                <option value="GWh">GWh</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="countryElectricity" class="form-label required">Country</label>
                            <input type="text" class="form-control" id="countryElectricity" value="MY" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="billingPeriodStart" class="form-label required">Billing Period Start</label>
                            <div class="position-relative">
                                <input type="text" class="form-control date-picker" id="billingPeriodStart" placeholder="dd/mm/yyyy" required>
                                <svg class="position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%); width: 20px; height: 20px; pointer-events: none; color: #6b7280; z-index: 1;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="billingPeriodEnd" class="form-label required">Billing Period End</label>
                            <div class="position-relative">
                                <input type="text" class="form-control date-picker" id="billingPeriodEnd" placeholder="dd/mm/yyyy" required>
                                <svg class="position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%); width: 20px; height: 20px; pointer-events: none; color: #6b7280; z-index: 1;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="renewable-source">
                                <input type="checkbox" class="form-check-input mt-1 me-2" id="renewableSource" style="width: 18px; height: 18px; margin-top: 0.25rem !important;">
                                <div class="flex-grow-1">
                                    <label for="renewableSource" class="form-label mb-1" style="font-weight: 600; cursor: pointer;">
                                        Renewable Source / Certificate
                                        <span class="badge bg-success ms-2" style="font-size: 0.75rem; padding: 0.125rem 0.5rem;">GREEN</span>
                                    </label>
                                    <p class="text-muted mb-0" style="font-size: 0.875rem;">
                                        Check this if your electricity is backed by renewable energy certificates (RECs, I-RECs, PPAs, or Green Tariffs)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Certificate Container (hidden by default) -->
                    <div id="certificateContainer" class="mb-3" style="display: none;">
                        <div id="certificatesList">
                            <!-- Certificate 1 will be added here dynamically -->
                        </div>
                        <button type="button" class="add-cert-btn mt-2" id="addCertificateBtn">
                            + Add Another Certificate
                        </button>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="locationBasedEF" class="form-label required">Location-Based Emission Factor (kg CO₂e / kWh)</label>
                            <input type="text" class="form-control" id="locationBasedEF" value="0.00057" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="marketBasedEF" class="form-label required">Market-Based Emission Factor (kg CO₂e / kWh)</label>
                            <input type="text" class="form-control" id="marketBasedEF" value="0.00048" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="allowOverrideEF" style="width: 18px; height: 18px;">
                                <label class="form-check-label" for="allowOverrideEF" style="cursor: pointer;">
                                    Allow Override Market-Based EF
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="form-label">Invoice Upload</label>
                            <div class="invoice-upload-area">
                                <input type="file" class="invoice-upload-input" id="invoiceUploadElectricity" accept=".pdf,.jpg,.jpeg,.png" hidden>
                                <label for="invoiceUploadElectricity" class="invoice-upload-label">
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
                            <label for="notesElectricity" class="form-label">Notes</label>
                            <textarea class="form-control" id="notesElectricity" rows="3" placeholder="Additional information..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-calculate" id="calculateBtnElectricity" disabled>
                    <svg class="me-2" style="width: 16px; height: 16px; vertical-align: middle;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    Calculate
                </button>
                <button type="button" class="btn btn-save" id="saveEntryBtnElectricity" disabled>Save Entry</button>
            </div>
        </div>
    </div>
</div>

<!-- Single Entry Modal for Purchased Steam -->
<div class="modal fade" id="steamModal" tabindex="-1" aria-labelledby="steamModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered single-entry-modal-dialog">
        <div class="modal-content single-entry-modal">
            <div class="modal-header border-0 pb-3 single-entry-modal-header">
                <h5 class="modal-title single-entry-title" id="steamModalLabel">Add Single Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body single-entry-modal-body">
                <form id="singleEntryFormSteam">
                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="buildingSiteIdSteam" class="form-label required">Building / Site ID</label>
                            <input type="text" class="form-control" id="buildingSiteIdSteam" placeholder="e.g., Building A, Site-001" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="supplierNameSteam" class="form-label required">Supplier Name</label>
                            <input type="text" class="form-control" id="supplierNameSteam" placeholder="e.g., TNB Energy, Steam Solutions" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="quantitySteam" class="form-label required">Quantity</label>
                            <input type="text" class="form-control" id="quantitySteam" value="0.00" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="unitSteam" class="form-label required">Unit</label>
                            <select class="form-select" id="unitSteam" required>
                                <option value="">Select unit</option>
                                <option value="t steam">t steam</option>
                                <option value="kg steam">kg steam</option>
                                <option value="MJ">MJ</option>
                                <option value="kWh thermal">kWh thermal</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="countrySteam" class="form-label required">Country</label>
                            <input type="text" class="form-control" id="countrySteam" value="MY" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="billingPeriodStartSteam" class="form-label required">Billing Period Start</label>
                            <div class="position-relative">
                                <input type="text" class="form-control date-picker-steam" id="billingPeriodStartSteam" placeholder="dd/mm/yyyy" required>
                                <svg class="position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%); width: 20px; height: 20px; pointer-events: none; color: #6b7280; z-index: 1;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="billingPeriodEndSteam" class="form-label required">Billing Period End</label>
                            <div class="position-relative">
                                <input type="text" class="form-control date-picker-steam" id="billingPeriodEndSteam" placeholder="dd/mm/yyyy" required>
                                <svg class="position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%); width: 20px; height: 20px; pointer-events: none; color: #6b7280; z-index: 1;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="emissionFactorSteam" class="form-label required">Emission Factor (kg CO₂e per selected unit)</label>
                            <input type="text" class="form-control" id="emissionFactorSteam" value="0.19" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="form-label">Invoice Upload</label>
                            <div class="invoice-upload-area">
                                <input type="file" class="invoice-upload-input" id="invoiceUploadSteam" accept=".pdf,.jpg,.jpeg,.png" hidden>
                                <label for="invoiceUploadSteam" class="invoice-upload-label">
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
                            <label for="notesSteam" class="form-label">Notes</label>
                            <textarea class="form-control" id="notesSteam" rows="3" placeholder="Additional information..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-calculate" id="calculateBtnSteam" disabled>
                    <svg class="me-2" style="width: 16px; height: 16px; vertical-align: middle;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    Calculate
                </button>
                <button type="button" class="btn btn-save" id="saveEntryBtnSteam" disabled>Save Entry</button>
            </div>
        </div>
    </div>
</div>

<!-- Single Entry Modal for Purchased Heat -->
<div class="modal fade" id="heatModal" tabindex="-1" aria-labelledby="heatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered single-entry-modal-dialog">
        <div class="modal-content single-entry-modal">
            <div class="modal-header border-0 pb-3 single-entry-modal-header">
                <h5 class="modal-title single-entry-title" id="heatModalLabel">Add Single Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body single-entry-modal-body">
                <form id="singleEntryFormHeat">
                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="buildingSiteIdHeat" class="form-label required">Building / Site ID</label>
                            <input type="text" class="form-control" id="buildingSiteIdHeat" placeholder="e.g., Building A, Site-001" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="supplierNameHeat" class="form-label required">Supplier Name</label>
                            <input type="text" class="form-control" id="supplierNameHeat" placeholder="e.g., TNB Energy, Steam Solutions" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="quantityHeat" class="form-label required">Quantity</label>
                            <input type="text" class="form-control" id="quantityHeat" value="0.00" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="unitHeat" class="form-label required">Unit</label>
                            <select class="form-select" id="unitHeat" required>
                                <option value="">Select unit</option>
                                <option value="MJ">MJ</option>
                                <option value="kWh thermal">kWh thermal</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="countryHeat" class="form-label required">Country</label>
                            <input type="text" class="form-control" id="countryHeat" value="MY" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="billingPeriodStartHeat" class="form-label required">Billing Period Start</label>
                            <div class="position-relative">
                                <input type="text" class="form-control date-picker-heat" id="billingPeriodStartHeat" placeholder="dd/mm/yyyy" required>
                                <svg class="position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%); width: 20px; height: 20px; pointer-events: none; color: #6b7280; z-index: 1;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="billingPeriodEndHeat" class="form-label required">Billing Period End</label>
                            <div class="position-relative">
                                <input type="text" class="form-control date-picker-heat" id="billingPeriodEndHeat" placeholder="dd/mm/yyyy" required>
                                <svg class="position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%); width: 20px; height: 20px; pointer-events: none; color: #6b7280; z-index: 1;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="emissionFactorHeat" class="form-label required">Emission Factor (kg CO₂e per selected unit)</label>
                            <input type="text" class="form-control" id="emissionFactorHeat" value="0.19" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="form-label">Invoice Upload</label>
                            <div class="invoice-upload-area">
                                <input type="file" class="invoice-upload-input" id="invoiceUploadHeat" accept=".pdf,.jpg,.jpeg,.png" hidden>
                                <label for="invoiceUploadHeat" class="invoice-upload-label">
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
                            <label for="notesHeat" class="form-label">Notes</label>
                            <textarea class="form-control" id="notesHeat" rows="3" placeholder="Additional information..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-calculate" id="calculateBtnHeat" disabled>
                    <svg class="me-2" style="width: 16px; height: 16px; vertical-align: middle;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    Calculate
                </button>
                <button type="button" class="btn btn-save" id="saveEntryBtnHeat" disabled>Save Entry</button>
            </div>
        </div>
    </div>
</div>

<!-- Single Entry Modal for Purchased Cooling -->
<div class="modal fade" id="coolingModal" tabindex="-1" aria-labelledby="coolingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered single-entry-modal-dialog">
        <div class="modal-content single-entry-modal">
            <div class="modal-header border-0 pb-3 single-entry-modal-header">
                <h5 class="modal-title single-entry-title" id="coolingModalLabel">Add Single Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body single-entry-modal-body">
                <form id="singleEntryFormCooling">
                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="buildingSiteIdCooling" class="form-label required">Building / Site ID</label>
                            <input type="text" class="form-control" id="buildingSiteIdCooling" placeholder="e.g., Building A, Site-001" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="supplierNameCooling" class="form-label required">Supplier Name</label>
                            <input type="text" class="form-control" id="supplierNameCooling" placeholder="e.g., TNB Energy, Steam Solutions" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="quantityCooling" class="form-label required">Quantity</label>
                            <input type="text" class="form-control" id="quantityCooling" value="0.00" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="unitCooling" class="form-label required">Unit</label>
                            <select class="form-select" id="unitCooling" required>
                                <option value="">Select unit</option>
                                <option value="RT-hr">RT-hr</option>
                                <option value="kWh eq">kWh eq</option>
                                <option value="MJ">MJ</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="countryCooling" class="form-label required">Country</label>
                            <input type="text" class="form-control" id="countryCooling" value="MY" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="billingPeriodStartCooling" class="form-label required">Billing Period Start</label>
                            <div class="position-relative">
                                <input type="text" class="form-control date-picker-cooling" id="billingPeriodStartCooling" placeholder="dd/mm/yyyy" required>
                                <svg class="position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%); width: 20px; height: 20px; pointer-events: none; color: #6b7280; z-index: 1;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="billingPeriodEndCooling" class="form-label required">Billing Period End</label>
                            <div class="position-relative">
                                <input type="text" class="form-control date-picker-cooling" id="billingPeriodEndCooling" placeholder="dd/mm/yyyy" required>
                                <svg class="position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%); width: 20px; height: 20px; pointer-events: none; color: #6b7280; z-index: 1;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="emissionFactorCooling" class="form-label required">Emission Factor (kg CO₂e per selected unit)</label>
                            <input type="text" class="form-control" id="emissionFactorCooling" value="0.19" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="form-label">Invoice Upload</label>
                            <div class="invoice-upload-area">
                                <input type="file" class="invoice-upload-input" id="invoiceUploadCooling" accept=".pdf,.jpg,.jpeg,.png" hidden>
                                <label for="invoiceUploadCooling" class="invoice-upload-label">
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
                            <label for="notesCooling" class="form-label">Notes</label>
                            <textarea class="form-control" id="notesCooling" rows="3" placeholder="Additional information..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-calculate" id="calculateBtnCooling" disabled>
                    <svg class="me-2" style="width: 16px; height: 16px; vertical-align: middle;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    Calculate
                </button>
                <button type="button" class="btn btn-save" id="saveEntryBtnCooling" disabled>Save Entry</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Manage Cards Modal functionality
    const manageCardsModal = document.getElementById('manageCardsModal');
    const doneManageCardsBtn = document.getElementById('doneManageCardsBtn');

    // Card checkbox IDs and their corresponding card container IDs
    const cardMapping = {
        'cardTotalScope2': 'totalScope2Card',
        'cardTargetVsActual': 'targetVsActualCard',
        'cardIntensityPerRevenue': 'intensityPerRevenueCard',
        'cardDataConfidence': 'dataConfidenceCard',
        'cardEntries': 'entriesCard',
        'cardExceptions': 'exceptionsCard'
    };

    // Function to toggle card visibility
    function toggleCardVisibility(checkboxId, cardId) {
        const checkbox = document.getElementById(checkboxId);
        const cardElement = document.getElementById(cardId);

        if (checkbox && cardElement) {
            const cardContainer = cardElement.closest('.col-12.col-md-4');
            if (cardContainer) {
                if (checkbox.checked) {
                    cardContainer.style.display = '';
                } else {
                    cardContainer.style.display = 'none';
                }
            }
        }
    }

    // Add event listeners to all checkboxes for real-time visibility toggle
    Object.keys(cardMapping).forEach(checkboxId => {
        const checkbox = document.getElementById(checkboxId);
        if (checkbox) {
            checkbox.addEventListener('change', function() {
                const cardId = cardMapping[checkboxId];
                toggleCardVisibility(checkboxId, cardId);
            });
        }
    });

    // Handle Done button click - just close the modal
    if (doneManageCardsBtn) {
        doneManageCardsBtn.addEventListener('click', function() {
            // Close the modal
            const modalInstance = bootstrap.Modal.getInstance(manageCardsModal);
            if (modalInstance) {
                modalInstance.hide();
            }
        });
    }

    // Track which category was selected
    let selectedCategory = 'electricity';

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
            if (selectedCategory === 'electricity') {
                setTimeout(function() {
                    const modal = new bootstrap.Modal(document.getElementById('electricityModal'));
                    modal.show();
                }, 300);
            } else if (selectedCategory === 'steam') {
                setTimeout(function() {
                    const modal = new bootstrap.Modal(document.getElementById('steamModal'));
                    modal.show();
                }, 300);
            } else if (selectedCategory === 'heat') {
                setTimeout(function() {
                    const modal = new bootstrap.Modal(document.getElementById('heatModal'));
                    modal.show();
                }, 300);
            } else if (selectedCategory === 'cooling') {
                setTimeout(function() {
                    const modal = new bootstrap.Modal(document.getElementById('coolingModal'));
                    modal.show();
                }, 300);
            }
            // Add other categories here when modals are created
        });
    }

    // Initialize validation for Electricity modal
    const electricityModal = document.getElementById('electricityModal');
    if (electricityModal) {
        electricityModal.addEventListener('shown.bs.modal', function() {
            initializeElectricityValidation();
            initializeCertificateHandlers();
        });

        // Reset certificates when modal is hidden
        electricityModal.addEventListener('hidden.bs.modal', function() {
            const certificateContainer = document.getElementById('certificateContainer');
            const certificatesList = document.getElementById('certificatesList');
            const renewableCheckbox = document.getElementById('renewableSource');

            if (certificateContainer) {
                certificateContainer.style.display = 'none';
            }
            if (certificatesList) {
                certificatesList.innerHTML = '';
            }
            if (renewableCheckbox) {
                renewableCheckbox.checked = false;
            }
            certificateCount = 0;
        });
    }

    // Initialize validation for Steam modal
    const steamModal = document.getElementById('steamModal');
    if (steamModal) {
        steamModal.addEventListener('shown.bs.modal', function() {
            initializeSteamValidation();
        });
    }

    // Initialize validation for Heat modal
    const heatModal = document.getElementById('heatModal');
    if (heatModal) {
        heatModal.addEventListener('shown.bs.modal', function() {
            initializeHeatValidation();
        });
    }

    // Initialize validation for Cooling modal
    const coolingModal = document.getElementById('coolingModal');
    if (coolingModal) {
        coolingModal.addEventListener('shown.bs.modal', function() {
            initializeCoolingValidation();
        });
    }

    // Certificate management
    let certificateCount = 0;

    function initializeCertificateHandlers() {
        const renewableCheckbox = document.getElementById('renewableSource');
        const certificateContainer = document.getElementById('certificateContainer');
        const certificatesList = document.getElementById('certificatesList');
        const addCertificateBtn = document.getElementById('addCertificateBtn');

        // Toggle certificate container on checkbox change
        if (renewableCheckbox && certificateContainer) {
            renewableCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    certificateContainer.style.display = 'block';
                    // Add first certificate if none exist
                    if (certificatesList.children.length === 0) {
                        addCertificate();
                    }
                } else {
                    certificateContainer.style.display = 'none';
                    // Clear all certificates
                    certificatesList.innerHTML = '';
                    certificateCount = 0;
                }
            });
        }

        // Add certificate button
        if (addCertificateBtn) {
            addCertificateBtn.addEventListener('click', function() {
                addCertificate();
            });
        }
    }

    function addCertificate() {
        certificateCount++;
        const certificatesList = document.getElementById('certificatesList');
        if (!certificatesList) return;

        const certificateHtml = `
            <div class="certificate-section mb-3 p-3 border rounded" data-certificate-id="${certificateCount}">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0">Certificate ${certificateCount}</h6>
                    ${certificateCount > 1 ? `
                    <button type="button" class="btn btn-sm btn-link text-danger p-0 remove-certificate" data-cert-id="${certificateCount}">
                        <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                    ` : ''}
                </div>
                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <label for="certificateType_${certificateCount}" class="form-label required">Certificate Type</label>
                        <select class="form-select certificate-field" id="certificateType_${certificateCount}" required>
                            <option value="">Select type</option>
                            <option value="Green Energy Tariff">Green Energy Tariff (GET)</option>
                            <option value="Solar PPA">Solar PPA</option>
                            <option value="REC">Renewable Energy Certificates (RECs)</option>
                            <option value="I-REC">International RECs (I-RECs)</option>
                            <option value="GO">Guarantees of Origin (GO)</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    ${certificateCount === 1 ? `
                    <div class="col-12 col-md-6">
                        <label for="certificateSupplier_${certificateCount}" class="form-label required">Certificate Supplier</label>
                        <input type="text" class="form-control certificate-field" id="certificateSupplier_${certificateCount}" placeholder="e.g., EKOenergy, APX" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="certificateId_${certificateCount}" class="form-label required">Certificate ID</label>
                        <input type="text" class="form-control certificate-field" id="certificateId_${certificateCount}" placeholder="e.g., CERT-2024-001" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="certificateQuantity_${certificateCount}" class="form-label required">Quantity</label>
                        <input type="text" class="form-control certificate-field" id="certificateQuantity_${certificateCount}" value="0.00" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="certificateUnit_${certificateCount}" class="form-label required">Unit</label>
                        <select class="form-select certificate-field" id="certificateUnit_${certificateCount}" required>
                            <option value="">Select</option>
                            <option value="kWh" selected>kWh</option>
                            <option value="MWh">MWh</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="certificateVintageYear_${certificateCount}" class="form-label required">Vintage Year</label>
                        <select class="form-select certificate-field" id="certificateVintageYear_${certificateCount}" required>
                            <option value="">Select year</option>
                            <option value="2025" selected>2025</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="certificateRenewablePercentage_${certificateCount}" class="form-label required">Renewable Percentage</label>
                        <input type="text" class="form-control certificate-field" id="certificateRenewablePercentage_${certificateCount}" value="100.00" required>
                    </div>
                    ` : `
                    <div class="col-12 col-md-6">
                        <label for="certificateId_${certificateCount}" class="form-label required">Certificate ID</label>
                        <input type="text" class="form-control certificate-field" id="certificateId_${certificateCount}" placeholder="e.g., CERT-2024-001" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="certificateUnit_${certificateCount}" class="form-label required">Unit</label>
                        <select class="form-select certificate-field" id="certificateUnit_${certificateCount}" required>
                            <option value="">Select</option>
                            <option value="kWh" selected>kWh</option>
                            <option value="MWh">MWh</option>
                            <option value="GWh">GWh</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="certificateRenewablePercentage_${certificateCount}" class="form-label required">Renewable Percentage</label>
                        <input type="text" class="form-control certificate-field" id="certificateRenewablePercentage_${certificateCount}" value="100.00" required>
                    </div>
                    `}
                </div>
            </div>
        `;

        certificatesList.insertAdjacentHTML('beforeend', certificateHtml);

        // Attach remove button event listener
        const removeBtn = certificatesList.querySelector(`[data-cert-id="${certificateCount}"]`);
        if (removeBtn) {
            removeBtn.addEventListener('click', function() {
                const certId = this.getAttribute('data-cert-id');
                const certSection = certificatesList.querySelector(`[data-certificate-id="${certId}"]`);
                if (certSection) {
                    certSection.remove();
                    // Renumber remaining certificates
                    renumberCertificates();
                }
            });
        }

        // Attach validation listeners to new certificate fields
        const certificateFields = certificatesList.querySelectorAll(`[data-certificate-id="${certificateCount}"] .certificate-field`);
        certificateFields.forEach(field => {
            field.addEventListener('input', function() {
                if (typeof initializeElectricityValidation === 'function') {
                    initializeElectricityValidation();
                }
            });
            field.addEventListener('change', function() {
                if (typeof initializeElectricityValidation === 'function') {
                    initializeElectricityValidation();
                }
            });
        });
    }

    function renumberCertificates() {
        const certificatesList = document.getElementById('certificatesList');
        if (!certificatesList) return;

        const certificates = certificatesList.querySelectorAll('.certificate-section');
        certificates.forEach((cert, index) => {
            const newNumber = index + 1;
            const isFirst = newNumber === 1;
            cert.setAttribute('data-certificate-id', newNumber);
            const title = cert.querySelector('h6');
            if (title) {
                title.textContent = `Certificate ${newNumber}`;
            }

            // Update remove button - only show for certificates after the first
            const removeBtn = cert.querySelector('.remove-certificate');
            if (isFirst) {
                // Remove delete button if it exists
                if (removeBtn) {
                    removeBtn.remove();
                }
            } else {
                // Add delete button if it doesn't exist
                if (!removeBtn) {
                    const titleRow = cert.querySelector('.d-flex.justify-content-between');
                    if (titleRow) {
                        const deleteBtn = document.createElement('button');
                        deleteBtn.type = 'button';
                        deleteBtn.className = 'btn btn-sm btn-link text-danger p-0 remove-certificate';
                        deleteBtn.setAttribute('data-cert-id', newNumber);
                        deleteBtn.innerHTML = `
                            <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        `;
                        deleteBtn.addEventListener('click', function() {
                            const certId = this.getAttribute('data-cert-id');
                            const certSection = certificatesList.querySelector(`[data-certificate-id="${certId}"]`);
                            if (certSection) {
                                certSection.remove();
                                renumberCertificates();
                            }
                        });
                        titleRow.appendChild(deleteBtn);
                    }
                } else {
                    removeBtn.setAttribute('data-cert-id', newNumber);
                }
            }

            // Check if certificate has all fields (first certificate structure)
            const hasSupplier = cert.querySelector('[id*="certificateSupplier"]');
            const hasQuantity = cert.querySelector('[id*="certificateQuantity"]');
            const hasVintageYear = cert.querySelector('[id*="certificateVintageYear"]');

            if (isFirst && (!hasSupplier || !hasQuantity || !hasVintageYear)) {
                // Need to add missing fields for first certificate
                const row = cert.querySelector('.row.g-3');
                if (row) {
                    // Get existing fields to insert after
                    const certTypeField = row.querySelector('[id*="certificateType"]').closest('.col-12.col-md-6');
                    const certIdField = row.querySelector('[id*="certificateId"]').closest('.col-12.col-md-6');
                    const certUnitField = row.querySelector('[id*="certificateUnit"]').closest('.col-12.col-md-6');
                    const certRenewableField = row.querySelector('[id*="certificateRenewablePercentage"]').closest('.col-12.col-md-6');

                    // Add Supplier after Type
                    if (!hasSupplier) {
                        const supplierDiv = document.createElement('div');
                        supplierDiv.className = 'col-12 col-md-6';
                        supplierDiv.innerHTML = `
                            <label for="certificateSupplier_${newNumber}" class="form-label required">Certificate Supplier</label>
                            <input type="text" class="form-control certificate-field" id="certificateSupplier_${newNumber}" placeholder="e.g., EKOenergy, APX" required>
                        `;
                        certTypeField.insertAdjacentElement('afterend', supplierDiv);
                        // Add validation listener
                        const supplierInput = supplierDiv.querySelector('input');
                        if (supplierInput) {
                            supplierInput.addEventListener('input', function() {
                                if (typeof initializeElectricityValidation === 'function') {
                                    initializeElectricityValidation();
                                }
                            });
                        }
                    }

                    // Add Quantity after Certificate ID
                    if (!hasQuantity) {
                        const quantityDiv = document.createElement('div');
                        quantityDiv.className = 'col-12 col-md-6';
                        quantityDiv.innerHTML = `
                            <label for="certificateQuantity_${newNumber}" class="form-label required">Quantity</label>
                            <input type="text" class="form-control certificate-field" id="certificateQuantity_${newNumber}" value="0.00" required>
                        `;
                        certIdField.insertAdjacentElement('afterend', quantityDiv);
                        // Add validation listener
                        const quantityInput = quantityDiv.querySelector('input');
                        if (quantityInput) {
                            quantityInput.addEventListener('input', function() {
                                if (typeof initializeElectricityValidation === 'function') {
                                    initializeElectricityValidation();
                                }
                            });
                        }
                    }

                    // Add Vintage Year after Unit
                    if (!hasVintageYear) {
                        const vintageDiv = document.createElement('div');
                        vintageDiv.className = 'col-12 col-md-6';
                        vintageDiv.innerHTML = `
                            <label for="certificateVintageYear_${newNumber}" class="form-label required">Vintage Year</label>
                            <select class="form-select certificate-field" id="certificateVintageYear_${newNumber}" required>
                                <option value="">Select year</option>
                                <option value="2025" selected>2025</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                            </select>
                        `;
                        certUnitField.insertAdjacentElement('afterend', vintageDiv);
                        // Add validation listener
                        const vintageSelect = vintageDiv.querySelector('select');
                        if (vintageSelect) {
                            vintageSelect.addEventListener('change', function() {
                                if (typeof initializeElectricityValidation === 'function') {
                                    initializeElectricityValidation();
                                }
                            });
                        }
                    }
                }
            } else if (!isFirst && (hasSupplier || hasQuantity || hasVintageYear)) {
                // Remove extra fields from non-first certificates
                if (hasSupplier) hasSupplier.closest('.col-12.col-md-6').remove();
                if (hasQuantity) hasQuantity.closest('.col-12.col-md-6').remove();
                if (hasVintageYear) hasVintageYear.closest('.col-12.col-md-6').remove();
            }

            // Renumber all field IDs and labels
            cert.querySelectorAll('label, input, select').forEach(element => {
                if (element.id) {
                    const oldId = element.id;
                    const newId = oldId.replace(/_\d+$/, `_${newNumber}`);
                    element.id = newId;
                    if (element.tagName === 'LABEL' && element.getAttribute('for')) {
                        element.setAttribute('for', newId);
                    }
                }
            });
        });

        certificateCount = certificates.length;
    }

    function initializeElectricityValidation() {
        const form = document.getElementById('singleEntryFormElectricity');
        const calculateBtn = document.getElementById('calculateBtnElectricity');
        const requiredFields = ['buildingSiteId', 'supplierName', 'quantityElectricity', 'unitElectricity', 'countryElectricity', 'billingPeriodStart', 'billingPeriodEnd', 'locationBasedEF', 'marketBasedEF'];

        if (!calculateBtn || !form) return;

        function validateForm() {
            let allFilled = true;

            // Validate main required fields
            requiredFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (!field) return;

                const value = field.value.trim();

                if (fieldId === 'quantityElectricity') {
                    if (!value || value === '' || value === '0' || value === '0.00') {
                        allFilled = false;
                    }
                } else {
                    if (!value || value === '') {
                        allFilled = false;
                    }
                }
            });

            // Validate certificate fields if checkbox is checked
            const renewableCheckbox = document.getElementById('renewableSource');
            if (renewableCheckbox && renewableCheckbox.checked) {
                const certificatesList = document.getElementById('certificatesList');
                if (certificatesList) {
                    const certificateSections = certificatesList.querySelectorAll('.certificate-section');
                    certificateSections.forEach(certSection => {
                        const certFields = certSection.querySelectorAll('.certificate-field[required]');
                        certFields.forEach(field => {
                            const value = field.value.trim();
                            if (!value || value === '') {
                                allFilled = false;
                            }
                        });
                    });
                }
            }

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

        // Attach event listener to renewable checkbox to re-validate
        const renewableCheckbox = document.getElementById('renewableSource');
        if (renewableCheckbox) {
            renewableCheckbox.addEventListener('change', validateForm);
        }

        // Use event delegation for dynamically added certificate fields
        const certificatesList = document.getElementById('certificatesList');
        if (certificatesList) {
            certificatesList.addEventListener('input', function(e) {
                if (e.target.classList.contains('certificate-field')) {
                    validateForm();
                }
            });
            certificatesList.addEventListener('change', function(e) {
                if (e.target.classList.contains('certificate-field')) {
                    validateForm();
                }
            });
        }

        // Initial validation
        validateForm();
    }

    function initializeSteamValidation() {
        const form = document.getElementById('singleEntryFormSteam');
        const calculateBtn = document.getElementById('calculateBtnSteam');
        const requiredFields = ['buildingSiteIdSteam', 'supplierNameSteam', 'quantitySteam', 'unitSteam', 'countrySteam', 'billingPeriodStartSteam', 'billingPeriodEndSteam', 'emissionFactorSteam'];

        if (!calculateBtn || !form) return;

        function validateForm() {
            let allFilled = true;

            requiredFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (!field) return;

                const value = field.value.trim();

                if (fieldId === 'quantitySteam') {
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

    function initializeHeatValidation() {
        const form = document.getElementById('singleEntryFormHeat');
        const calculateBtn = document.getElementById('calculateBtnHeat');
        const requiredFields = ['buildingSiteIdHeat', 'supplierNameHeat', 'quantityHeat', 'unitHeat', 'countryHeat', 'billingPeriodStartHeat', 'billingPeriodEndHeat', 'emissionFactorHeat'];

        if (!calculateBtn || !form) return;

        function validateForm() {
            let allFilled = true;

            requiredFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (!field) return;

                const value = field.value.trim();

                if (fieldId === 'quantityHeat') {
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

    function initializeCoolingValidation() {
        const form = document.getElementById('singleEntryFormCooling');
        const calculateBtn = document.getElementById('calculateBtnCooling');
        const requiredFields = ['buildingSiteIdCooling', 'supplierNameCooling', 'quantityCooling', 'unitCooling', 'countryCooling', 'billingPeriodStartCooling', 'billingPeriodEndCooling', 'emissionFactorCooling'];

        if (!calculateBtn || !form) return;

        function validateForm() {
            let allFilled = true;

            requiredFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (!field) return;

                const value = field.value.trim();

                if (fieldId === 'quantityCooling') {
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

    // Handle invoice upload for Electricity modal
    const invoiceUploadElectricity = document.getElementById('invoiceUploadElectricity');
    const invoiceUploadLabelElectricity = document.querySelector('#electricityModal .invoice-upload-label');
    const uploadAreaElectricity = document.querySelector('#electricityModal .invoice-upload-area');

    if (invoiceUploadElectricity && uploadAreaElectricity) {
        invoiceUploadElectricity.addEventListener('change', function(e) {
            if (e.target.files.length > 0 && invoiceUploadLabelElectricity) {
                invoiceUploadLabelElectricity.innerHTML = `
                    <svg class="invoice-upload-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>${e.target.files[0].name}</span>
                `;
            }
        });

        // Handle drag and drop
        setupDragAndDrop(uploadAreaElectricity, invoiceUploadElectricity);
    }

    function setupDragAndDrop(uploadArea, fileInput) {
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            uploadArea.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            uploadArea.classList.add('drag-over');
        }

        function unhighlight(e) {
            uploadArea.classList.remove('drag-over');
        }

        uploadArea.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            fileInput.files = files;
            const event = new Event('change', { bubbles: true });
            fileInput.dispatchEvent(event);
        }
    }

    const filterToggleBtn = document.getElementById('filterToggleBtn');
    const filterPanel = document.getElementById('filterPanel');
    const clearFilters = document.getElementById('clearFilters');
    const filterCategory = document.getElementById('filterCategory');
    const filterSource = document.getElementById('filterSource');
    const filterLocationBased = document.getElementById('filterLocationBased');
    const filterMarketBased = document.getElementById('filterMarketBased');
    const filterPeriod = document.getElementById('filterPeriod');
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
        const sourceValue = filterSource ? filterSource.value.toLowerCase() : '';
        const locationBasedValue = filterLocationBased ? filterLocationBased.value : '';
        const marketBasedValue = filterMarketBased ? filterMarketBased.value : '';
        const periodValue = filterPeriod ? filterPeriod.value : '';
        const statusValue = filterStatus ? filterStatus.value : '';

        const rows = tableBody.querySelectorAll('tr');

        rows.forEach(row => {
            let showRow = true;

            // Filter by Category
            if (categoryValue && showRow) {
                const categoryCell = row.cells[0];
                if (categoryCell && categoryCell.textContent.trim().toLowerCase() !== categoryValue) {
                    showRow = false;
                }
            }

            // Filter by Source
            if (sourceValue && showRow) {
                const sourceCell = row.cells[1];
                if (sourceCell) {
                    const sourceText = sourceCell.textContent.trim().toLowerCase();
                    if (!sourceText.includes(sourceValue)) {
                        showRow = false;
                    }
                }
            }

            // Filter by Location-Based
            if (locationBasedValue && showRow) {
                const locationBasedCell = row.cells[2];
                if (locationBasedCell) {
                    const locationBasedText = locationBasedCell.textContent.trim();
                    if (locationBasedValue === 'has-value') {
                        if (locationBasedText === '-' || !locationBasedText) {
                            showRow = false;
                        }
                    } else if (locationBasedValue === 'no-value') {
                        if (locationBasedText !== '-' && locationBasedText) {
                            showRow = false;
                        }
                    }
                }
            }

            // Filter by Market-Based
            if (marketBasedValue && showRow) {
                const marketBasedCell = row.cells[3];
                if (marketBasedCell) {
                    const marketBasedText = marketBasedCell.textContent.trim();
                    if (marketBasedValue === 'has-value') {
                        if (marketBasedText === '-' || !marketBasedText) {
                            showRow = false;
                        }
                    } else if (marketBasedValue === 'no-value') {
                        if (marketBasedText !== '-' && marketBasedText) {
                            showRow = false;
                        }
                    }
                }
            }

            // Filter by Period
            if (periodValue && showRow) {
                const periodCell = row.cells[4];
                if (periodCell) {
                    const periodText = periodCell.textContent.trim();
                    // Check if period contains the selected month/year
                    if (!periodText.includes(periodValue)) {
                        showRow = false;
                    }
                }
            }

            // Filter by Status
            if (statusValue && showRow) {
                const statusCell = row.cells[5];
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

    if (filterSource) {
        filterSource.addEventListener('change', filterTable);
    }

    if (filterLocationBased) {
        filterLocationBased.addEventListener('change', filterTable);
    }

    if (filterMarketBased) {
        filterMarketBased.addEventListener('change', filterTable);
    }

    if (filterPeriod) {
        filterPeriod.addEventListener('change', filterTable);
    }

    if (filterStatus) {
        filterStatus.addEventListener('change', filterTable);
    }

    // Clear all filters
    if (clearFilters) {
        clearFilters.addEventListener('click', function(e) {
            e.preventDefault();
            if (filterCategory) filterCategory.value = '';
            if (filterSource) filterSource.value = '';
            if (filterLocationBased) filterLocationBased.value = '';
            if (filterMarketBased) filterMarketBased.value = '';
            if (filterPeriod) filterPeriod.value = '';
            if (filterStatus) filterStatus.value = '';
            filterTable(); // Re-filter to show all rows
        });
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
// Initialize date pickers when electricity modal is shown
document.addEventListener('DOMContentLoaded', function() {
    const electricityModalElement = document.getElementById('electricityModal');
    if (electricityModalElement) {
        electricityModalElement.addEventListener('shown.bs.modal', function() {
            // Initialize date pickers after modal is fully shown
            setTimeout(function() {
                if (typeof flatpickr !== 'undefined') {
                    const billingStart = document.getElementById('billingPeriodStart');
                    const billingEnd = document.getElementById('billingPeriodEnd');

                    // Function to trigger validation
                    function triggerValidation() {
                        const validateEvent = new Event('change');
                        if (billingStart) billingStart.dispatchEvent(validateEvent);
                        if (billingEnd) billingEnd.dispatchEvent(validateEvent);
                    }

                    if (billingStart && !billingStart._flatpickr) {
                        flatpickr(billingStart, {
                            dateFormat: "d/m/Y",
                            allowInput: true,
                            clickOpens: true,
                            monthSelectorType: 'static',
                            onChange: function(selectedDates, dateStr, instance) {
                                triggerValidation();
                            }
                        });
                    }

                    if (billingEnd && !billingEnd._flatpickr) {
                        flatpickr(billingEnd, {
                            dateFormat: "d/m/Y",
                            allowInput: true,
                            clickOpens: true,
                            monthSelectorType: 'static',
                            onChange: function(selectedDates, dateStr, instance) {
                                triggerValidation();
                            }
                        });
                    }
                }
            }, 100);
        });
    }

    // Initialize date pickers when steam modal is shown
    const steamModalElement = document.getElementById('steamModal');
    if (steamModalElement) {
        steamModalElement.addEventListener('shown.bs.modal', function() {
            // Initialize date pickers after modal is fully shown
            setTimeout(function() {
                if (typeof flatpickr !== 'undefined') {
                    const billingStartSteam = document.getElementById('billingPeriodStartSteam');
                    const billingEndSteam = document.getElementById('billingPeriodEndSteam');

                    // Function to trigger validation
                    function triggerValidation() {
                        const validateEvent = new Event('change');
                        if (billingStartSteam) billingStartSteam.dispatchEvent(validateEvent);
                        if (billingEndSteam) billingEndSteam.dispatchEvent(validateEvent);
                    }

                    if (billingStartSteam && !billingStartSteam._flatpickr) {
                        flatpickr(billingStartSteam, {
                            dateFormat: "d/m/Y",
                            allowInput: true,
                            clickOpens: true,
                            monthSelectorType: 'static',
                            onChange: function(selectedDates, dateStr, instance) {
                                triggerValidation();
                            }
                        });
                    }

                    if (billingEndSteam && !billingEndSteam._flatpickr) {
                        flatpickr(billingEndSteam, {
                            dateFormat: "d/m/Y",
                            allowInput: true,
                            clickOpens: true,
                            monthSelectorType: 'static',
                            onChange: function(selectedDates, dateStr, instance) {
                                triggerValidation();
                            }
                        });
                    }
                }
            }, 100);
        });
    }

    // Handle invoice upload for Steam modal
    const invoiceUploadSteam = document.getElementById('invoiceUploadSteam');
    const invoiceUploadLabelSteam = document.querySelector('#steamModal .invoice-upload-label');
    const uploadAreaSteam = document.querySelector('#steamModal .invoice-upload-area');

    if (invoiceUploadSteam && uploadAreaSteam) {
        invoiceUploadSteam.addEventListener('change', function(e) {
            if (e.target.files.length > 0 && invoiceUploadLabelSteam) {
                invoiceUploadLabelSteam.innerHTML = `
                    <svg class="invoice-upload-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span>${e.target.files[0].name}</span>
                `;
            }
        });

        // Drag and drop functionality
        uploadAreaSteam.addEventListener('dragover', function(e) {
            e.preventDefault();
            uploadAreaSteam.style.borderColor = '#3b82f6';
            uploadAreaSteam.style.backgroundColor = '#f0f9ff';
        });

        uploadAreaSteam.addEventListener('dragleave', function(e) {
            e.preventDefault();
            uploadAreaSteam.style.borderColor = '';
            uploadAreaSteam.style.backgroundColor = '';
        });

        uploadAreaSteam.addEventListener('drop', function(e) {
            e.preventDefault();
            uploadAreaSteam.style.borderColor = '';
            uploadAreaSteam.style.backgroundColor = '';

            if (e.dataTransfer.files.length > 0) {
                invoiceUploadSteam.files = e.dataTransfer.files;
                if (invoiceUploadLabelSteam) {
                    invoiceUploadLabelSteam.innerHTML = `
                        <svg class="invoice-upload-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span>${e.dataTransfer.files[0].name}</span>
                    `;
                }
            }
        });
    }

    // Initialize date pickers when heat modal is shown
    const heatModalElement = document.getElementById('heatModal');
    if (heatModalElement) {
        heatModalElement.addEventListener('shown.bs.modal', function() {
            // Initialize date pickers after modal is fully shown
            setTimeout(function() {
                if (typeof flatpickr !== 'undefined') {
                    const billingStartHeat = document.getElementById('billingPeriodStartHeat');
                    const billingEndHeat = document.getElementById('billingPeriodEndHeat');

                    // Function to trigger validation
                    function triggerValidation() {
                        const validateEvent = new Event('change');
                        if (billingStartHeat) billingStartHeat.dispatchEvent(validateEvent);
                        if (billingEndHeat) billingEndHeat.dispatchEvent(validateEvent);
                    }

                    if (billingStartHeat && !billingStartHeat._flatpickr) {
                        flatpickr(billingStartHeat, {
                            dateFormat: "d/m/Y",
                            allowInput: true,
                            clickOpens: true,
                            monthSelectorType: 'static',
                            onChange: function(selectedDates, dateStr, instance) {
                                triggerValidation();
                            }
                        });
                    }

                    if (billingEndHeat && !billingEndHeat._flatpickr) {
                        flatpickr(billingEndHeat, {
                            dateFormat: "d/m/Y",
                            allowInput: true,
                            clickOpens: true,
                            monthSelectorType: 'static',
                            onChange: function(selectedDates, dateStr, instance) {
                                triggerValidation();
                            }
                        });
                    }
                }
            }, 100);
        });
    }

    // Handle invoice upload for Heat modal
    const invoiceUploadHeat = document.getElementById('invoiceUploadHeat');
    const invoiceUploadLabelHeat = document.querySelector('#heatModal .invoice-upload-label');
    const uploadAreaHeat = document.querySelector('#heatModal .invoice-upload-area');

    if (invoiceUploadHeat && uploadAreaHeat) {
        invoiceUploadHeat.addEventListener('change', function(e) {
            if (e.target.files.length > 0 && invoiceUploadLabelHeat) {
                invoiceUploadLabelHeat.innerHTML = `
                    <svg class="invoice-upload-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span>${e.target.files[0].name}</span>
                `;
            }
        });

        // Drag and drop functionality
        uploadAreaHeat.addEventListener('dragover', function(e) {
            e.preventDefault();
            uploadAreaHeat.style.borderColor = '#3b82f6';
            uploadAreaHeat.style.backgroundColor = '#f0f9ff';
        });

        uploadAreaHeat.addEventListener('dragleave', function(e) {
            e.preventDefault();
            uploadAreaHeat.style.borderColor = '';
            uploadAreaHeat.style.backgroundColor = '';
        });

        uploadAreaHeat.addEventListener('drop', function(e) {
            e.preventDefault();
            uploadAreaHeat.style.borderColor = '';
            uploadAreaHeat.style.backgroundColor = '';

            if (e.dataTransfer.files.length > 0) {
                invoiceUploadHeat.files = e.dataTransfer.files;
                if (invoiceUploadLabelHeat) {
                    invoiceUploadLabelHeat.innerHTML = `
                        <svg class="invoice-upload-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span>${e.dataTransfer.files[0].name}</span>
                    `;
                }
            }
        });
    }

    // Initialize date pickers when cooling modal is shown
    const coolingModalElement = document.getElementById('coolingModal');
    if (coolingModalElement) {
        coolingModalElement.addEventListener('shown.bs.modal', function() {
            // Initialize date pickers after modal is fully shown
            setTimeout(function() {
                if (typeof flatpickr !== 'undefined') {
                    const billingStartCooling = document.getElementById('billingPeriodStartCooling');
                    const billingEndCooling = document.getElementById('billingPeriodEndCooling');

                    // Function to trigger validation
                    function triggerValidation() {
                        const validateEvent = new Event('change');
                        if (billingStartCooling) billingStartCooling.dispatchEvent(validateEvent);
                        if (billingEndCooling) billingEndCooling.dispatchEvent(validateEvent);
                    }

                    if (billingStartCooling && !billingStartCooling._flatpickr) {
                        flatpickr(billingStartCooling, {
                            dateFormat: "d/m/Y",
                            allowInput: true,
                            clickOpens: true,
                            monthSelectorType: 'static',
                            onChange: function(selectedDates, dateStr, instance) {
                                triggerValidation();
                            }
                        });
                    }

                    if (billingEndCooling && !billingEndCooling._flatpickr) {
                        flatpickr(billingEndCooling, {
                            dateFormat: "d/m/Y",
                            allowInput: true,
                            clickOpens: true,
                            monthSelectorType: 'static',
                            onChange: function(selectedDates, dateStr, instance) {
                                triggerValidation();
                            }
                        });
                    }
                }
            }, 100);
        });
    }

    // Handle invoice upload for Cooling modal
    const invoiceUploadCooling = document.getElementById('invoiceUploadCooling');
    const invoiceUploadLabelCooling = document.querySelector('#coolingModal .invoice-upload-label');
    const uploadAreaCooling = document.querySelector('#coolingModal .invoice-upload-area');

    if (invoiceUploadCooling && uploadAreaCooling) {
        invoiceUploadCooling.addEventListener('change', function(e) {
            if (e.target.files.length > 0 && invoiceUploadLabelCooling) {
                invoiceUploadLabelCooling.innerHTML = `
                    <svg class="invoice-upload-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span>${e.target.files[0].name}</span>
                `;
            }
        });

        // Drag and drop functionality
        uploadAreaCooling.addEventListener('dragover', function(e) {
            e.preventDefault();
            uploadAreaCooling.style.borderColor = '#3b82f6';
            uploadAreaCooling.style.backgroundColor = '#f0f9ff';
        });

        uploadAreaCooling.addEventListener('dragleave', function(e) {
            e.preventDefault();
            uploadAreaCooling.style.borderColor = '';
            uploadAreaCooling.style.backgroundColor = '';
        });

        uploadAreaCooling.addEventListener('drop', function(e) {
            e.preventDefault();
            uploadAreaCooling.style.borderColor = '';
            uploadAreaCooling.style.backgroundColor = '';

            if (e.dataTransfer.files.length > 0) {
                invoiceUploadCooling.files = e.dataTransfer.files;
                if (invoiceUploadLabelCooling) {
                    invoiceUploadLabelCooling.innerHTML = `
                        <svg class="invoice-upload-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span>${e.dataTransfer.files[0].name}</span>
                    `;
                }
            }
        });
    }
});
</script>
@endsection


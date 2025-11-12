@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('content')
<div class="bg-white min-h-screen">
    <!-- Header Section -->
    <div class="px-8 py-6">
        <div class="flex items-start justify-between">
            <div>
                <h1 class="main-title">Dashboard</h1>
                <p class="text-sm text-gray-600">Overview of your carbon footprint across all scopes</p>
            </div>
            <div class="flex items-center gap-4">
                <!-- Year Selector -->
                <div class="relative">
                    <select class="appearance-none bg-white border border-gray-300 rounded-lg px-4 py-2 pr-8 text-sm font-medium text-gray-700 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent cursor-pointer">
                        <option id="yearSelector">2024</option>
                        <option id="yearSelector">2023</option>
                        <option id="yearSelector">2022</option>
                    </select>
                    <svg class="absolute right-2 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
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
            <!-- Card 1: Total Emissions -->
            <div class="col-12 col-md-4">
            <div class="card" id="totalEmissionsCard">
                <div class="top d-flex mb-2" style="flex-direction: row;">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                    <div class="ml-3">
                        <h3 class="subtitle">Total Emissions (All Scopes)</h3>
                        <p class="subcontent">Combined tCO₂e across Scope 1, 2, and 3</p>
                    </div>
                </div>
                <div class="my-2">
                    <span class="overview-value" id="totalEmissionsValue">1,309.6</span>
                    <span class="unit">tCO₂e</span>
                </div>
                <div class="d-flex mt-2" style="align-items: center;">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <span class="percentage" id="totalEmissionsPercentage">+8.5% &nbsp;</span>
                    <span class="vs">vs last year</span>
                </div>
            </div>
            </div>

            <!-- Card 2: Scope Breakdown -->
            <div class="col-12 col-md-4">
                <div class="card" id="scopeBreakdownCard">
                    <div class="top d-flex mb-2" style="flex-direction: row;">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="ml-3">
                            <h3 class="subtitle">Scope Breakdown</h3>
                            <p class="subcontent">Emissions split by scope</p>
                        </div>
                    </div>

                    <div class="pt-3">
                        <div class="d-flex px-3 py-2" style="justify-content: space-between; align-items: center;">
                            <div class="d-flex">
                                <div class="dot mr-2" style="background: #3b82f6;"></div>
                                <div class="content">Scope 1</div>
                            </div>
                            <div class="">
                                <div class="scope-breakdown-value" id="scopeBreakdownValue1">24.75 tCO₂e</div>
                                <div class="subcontent text-right" id="scopeBreakdownPercentage1">1.9%</div>
                            </div>
                        </div>

                        <div class="d-flex px-3 py-2" style="justify-content: space-between; align-items: center;">
                            <div class="d-flex">
                                <div class="dot mr-2" style="background: #16d3ca"></div>
                                <div class="content">Scope 2</div>
                            </div>
                            <div class="">
                                <div class="scope-breakdown-value" id="scopeBreakdownValue2">90.35 tCO₂e</div>
                                <div class="subcontent text-right" id="scopeBreakdownPercentage2">6.9%</div>
                            </div>
                        </div>

                        <div class="d-flex px-3 py-2" style="justify-content: space-between; align-items: center;">
                            <div class="d-flex">
                                <div class="dot mr-2" style="background: #22c55e"></div>
                                <div class="content">Scope 3</div>
                            </div>
                            <div class="">
                                <div class="scope-breakdown-value" id="scopeBreakdownValue3">1194.5 tCO₂e</div>
                                <div class="subcontent text-right" id="scopeBreakdownPercentage3">91.2%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3: Entries Summary -->
            <div class="col-12 col-md-4">
                <div class="card" id="entriesSummaryCard">
                    <div class="top d-flex mb-2" style="flex-direction: row;">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="ml-3">
                            <h3 class="subtitle">Entries Summary</h3>
                            <p class="subcontent">Total active emission entries</p>
                        </div>
                    </div>

                    <div class="my-2">
                        <span class="overview-value" id="entriesSummaryTotal">31</span>
                    </div>

                    <div class="pt-3">
                        <div class="d-flex px-3" style="justify-content: space-between; align-items: center;">
                            <div class="content">Scope 1</div>
                            <div class="scope-breakdown-value" id="entriesValue1">8</div>
                        </div>

                        <div class="d-flex px-3" style="justify-content: space-between; align-items: center;">
                            <div class="content">Scope 2</div>
                            <div class="scope-breakdown-value" id="entriesValue2">8</div>
                        </div>

                        <div class="d-flex px-3" style="justify-content: space-between; align-items: center;">
                            <div class="content">Scope 3</div>
                            <div class="scope-breakdown-value" id="entriesValue3">15</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4: Data Confidence Overall -->
            <div class="col-12 col-md-4">
                <div class="card" id="dataConfidenceOverallCard">
                    <div class="top d-flex mb-2" style="flex-direction: row;">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <div class="ml-3">
                            <h3 class="subtitle">Data Confidence (Overall)</h3>
                            <p class="subcontent">Weighted average data completeness</p>
                        </div>
                    </div>

                    <div class="my-2">
                        <span class="overview-value" id="confidenceOverallValue">76</span>
                        <span class="unit">%</span>
                    </div>
                    <div class="">
                        <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden mt-1">
                            <div class="overview-progress-fill h-2 rounded-full" style="width: 80%"></div>
                        </div>
                        <p class="content mt-2">Based on verified entries and available emission factors</p>
                    </div>
                </div>
            </div>

            <!-- Card 5: Emission Intensity -->
            <div class="col-12 col-md-4">
            <div class="card" id="emissionIntensityCard">
                <div class="top d-flex mb-2" style="flex-direction: row;">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <div class="ml-3">
                        <h3 class="subtitle">Emission Intensity per Revenue</h3>
                        <p class="subcontent">KPI for ESG reports</p>
                    </div>
                </div>

                <div class="my-2">
                    <span class="overview-value" id="emissionIntensityValue">2.15</span>
                    <span class="unit">tCO₂e/$M</span>
                </div>
            </div>
            </div>

            <!-- Card 6: Exceptions -->
            <div class="col-12 col-md-4">
            <div class="card" id="exceptionsCard">
                <div class="top d-flex mb-2" style="flex-direction: row;">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <div class="ml-3">
                        <h3 class="subtitle">Exceptions / Issues</h3>
                        <p class="subcontent">Aggregated count from all scopes</p>
                    </div>
                </div>

                <div class="my-2">
                    <span class="overview-value" id="exceptionsValue">6</span>
                    <span class="unit">entries</span>
                </div>
                <p class="content exceptions-content">Includes entries pending verification</p>
            </div>
            </div>
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
                    <div class="d-flex flex-column" style="gap: 1rem;" id="cardsListContainer">
                        <div class="form-check card-filter-item" style="display: flex; align-items: center; padding: 0.75rem 0;" data-card-name="Total Scope 1 tCO₂e">
                            <input class="form-check-input" type="checkbox" id="cardTotalEmissions" checked style="width: 18px; height: 18px; margin-top: 0; cursor: pointer;">
                            <label class="form-check-label" for="cardTotalEmissions" style="margin-left: 0.75rem; font-size: 1rem; color: #111827; cursor: pointer; flex: 1;">
                                Total Emissions (All Scopes)
                            </label>
                        </div>
                        <div class="form-check card-filter-item" style="display: flex; align-items: center; padding: 0.75rem 0;" data-card-name="Target vs Actual">
                            <input class="form-check-input" type="checkbox" id="cardScopeBreakdown" checked style="width: 18px; height: 18px; margin-top: 0; cursor: pointer;">
                            <label class="form-check-label" for="cardScopeBreakdown" style="margin-left: 0.75rem; font-size: 1rem; color: #111827; cursor: pointer; flex: 1;">
                                Scope Breakdown
                            </label>
                        </div>
                        <div class="form-check card-filter-item" style="display: flex; align-items: center; padding: 0.75rem 0;" data-card-name="Intensity per Revenue">
                            <input class="form-check-input" type="checkbox" id="cardEntriesSummary" checked style="width: 18px; height: 18px; margin-top: 0; cursor: pointer;">
                            <label class="form-check-label" for="cardEntriesSummary" style="margin-left: 0.75rem; font-size: 1rem; color: #111827; cursor: pointer; flex: 1;">
                                Entries Summary
                            </label>
                        </div>
                        <div class="form-check card-filter-item" style="display: flex; align-items: center; padding: 0.75rem 0;" data-card-name="Data Confidence">
                            <input class="form-check-input" type="checkbox" id="cardDataConfidence" checked style="width: 18px; height: 18px; margin-top: 0; cursor: pointer;">
                            <label class="form-check-label" for="cardDataConfidence" style="margin-left: 0.75rem; font-size: 1rem; color: #111827; cursor: pointer; flex: 1;">
                                Data Confidence Overall
                            </label>
                        </div>
                        <div class="form-check card-filter-item" style="display: flex; align-items: center; padding: 0.75rem 0;" data-card-name="Entries">
                            <input class="form-check-input" type="checkbox" id="cardEmissionIntensity" checked style="width: 18px; height: 18px; margin-top: 0; cursor: pointer;">
                            <label class="form-check-label" for="cardEmissionIntensity" style="margin-left: 0.75rem; font-size: 1rem; color: #111827; cursor: pointer; flex: 1;">
                                Emission Intensity per Revenue
                            </label>
                        </div>
                        <div class="form-check card-filter-item" style="display: flex; align-items: center; padding: 0.75rem 0;" data-card-name="Exceptions">
                            <input class="form-check-input" type="checkbox" id="cardExceptions" checked style="width: 18px; height: 18px; margin-top: 0; cursor: pointer;">
                            <label class="form-check-label" for="cardExceptions" style="margin-left: 0.75rem; font-size: 1rem; color: #111827; cursor: pointer; flex: 1;">
                                Exceptions / Issues
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

    <!-- Insight Summary Section -->
    <div class="insight px-8 py-6">
        <div class="flex items-center justify-between mb-6">
            <h2>Insight Summary</h2>
        </div>

        <div class="highlights">
            <h3 class="subtitle" id="highlightsYear">Highlights 2024</h3>
            <ul class="highlights-list mt-3">
                <li id="highlightSummary1">Total emissions decreased 7.8% vs baseline but remain 4.8% above target.</li>
                <li id="highlightSummary2">Scope 3 represents 91% of total footprint — driven by purchased goods and logistics.</li>
                <li id="highlightSummary3">Electricity use efficiency improved by 5%, reflecting partial solar adoption.</li>
                <li id="highlightSummary4">Data completeness improved to 76% from 70% last year.</li>
            </ul>
        </div>
    </div>

    <!-- Analysis Section -->
    <div class="analysis px-8 py-6">
        <div class="flex items-center justify-between mb-6">
            <h2>Analysis</h2>
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
                    <label for="filterScope" class="form-label">Scope</label>
                    <select class="form-select" id="filterScope">
                        <option value="">All Scope</option>
                        <option value="Scope 1">Scope 1</option>
                        <option value="Scope 2">Scope 2</option>
                        <option value="Scope 3">Scope 3</option>
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
                    <th class="px-4 py-3 table-header">Scope</th>
                    <th class="px-4 py-3 table-header">Source</th>
                    <th class="px-4 py-3 table-header">CO₂ emitted</th>
                    <th class="px-4 py-3 table-header">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">stationary</td>
                    <td class="px-4 py-3 table-cell-text" id="scope">Scope 1</td>
                    <td class="px-4 py-3 table-cell-text" id="source">Boilers & Furnaces</td>
                    <td class="co2-emitted px-4 py-3" id="co2Emitted">2.8500 tCO₂e</td>
                    <td class="px-4 py-3"id="status"><span class="badge badge-success">Verified</span></td>
                </tr>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">stationary</td>
                    <td class="px-4 py-3 table-cell-text" id="scope">Scope 2</td>
                    <td class="px-4 py-3 table-cell-text" id="source">Generators & Turbines</td>
                    <td class="co2-emitted px-4 py-3" id="co2Emitted">2.2500 tCO₂e</td>
                    <td class="px-4 py-3" id="status"><span class="badge badge-success">Verified</span></td>
                </tr>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">mobile</td>
                    <td class="px-4 py-3 table-cell-text" id="scope">Scope 3</td>
                    <td class="px-4 py-3 table-cell-text" id="source">Cars, trucks, and vans</td>
                    <td class="co2-emitted px-4 py-3" id="co2Emitted">1.1900 tCO₂e</td>
                    <td class="px-4 py-3" id="status"><span class="badge badge-success">Verified</span></td>
                </tr>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">mobile</td>
                    <td class="px-4 py-3 table-cell-text" id="scope">Scope 3</td>
                    <td class="px-4 py-3 table-cell-text" id="source">Forklifts and construction equipment</td>
                    <td class="co2-emitted px-4 py-3" id="co2Emitted">0.8500 tCO₂e</td>
                    <td class="px-4 py-3" id="status"><span class="badge badge-warning">Pending</span></td>
                </tr>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">process</td>
                    <td class="px-4 py-3 table-cell-text" id="scope">Scope 2</td>
                    <td class="px-4 py-3 table-cell-text" id="source">Cement & Lime Production (CO₂)</td>
                    <td class="co2-emitted px-4 py-3" id="co2Emitted">1.8000 tCO₂e</td>
                    <td class="px-4 py-3" id="status"><span class="badge badge-success">Verified</span></td>
                </tr>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">process</td>
                    <td class="px-4 py-3 table-cell-text" id="scope">Scope 1</td>
                    <td class="px-4 py-3 table-cell-text" id="source">Chemical & Fertiliser Production (N₂O, CO₂)</td>
                    <td class="co2-emitted px-4 py-3" id="co2Emitted">1.3500 tCO₂e</td>
                    <td class="px-4 py-3" id="status"><span class="badge badge-success">Verified</span></td>
                </tr>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">fugitive</td>
                    <td class="px-4 py-3 table-cell-text" id="scope">Scope 3</td>
                    <td class="px-4 py-3 table-cell-text" id="source">Chiller</td>
                    <td class="co2-emitted px-4 py-3" id="co2Emitted">7.2500 tCO₂e</td>
                    <td class="px-4 py-3" id="status"><span class="badge badge-success">Verified</span></td>
                </tr>
                <tr>
                    <td class="px-4 py-3 table-cell-text" id="category">fugitive</td>
                    <td class="px-4 py-3 table-cell-text" id="scope">Scope 1</td>
                    <td class="px-4 py-3 table-cell-text" id="source">Split A/C</td>
                    <td class="co2-emitted px-4 py-3" id="co2Emitted">7.2100 tCO₂e</td>
                    <td class="px-4 py-3" id="status"><span class="badge badge-warning">Pending</span></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Manage Cards Modal functionality
    const manageCardsModal = document.getElementById('manageCardsModal');
    const doneManageCardsBtn = document.getElementById('doneManageCardsBtn');

    // Card checkbox IDs and their corresponding card container IDs
    const cardMapping = {
        'cardTotalEmissions': 'totalEmissionsCard',
        'cardScopeBreakdown': 'scopeBreakdownCard',
        'cardEntriesSummary': 'entriesSummaryCard',
        'cardDataConfidence': 'dataConfidenceCard',
        'cardEmissionIntensity': 'emissionIntensityCard',
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

    // Filter cards in Manage Cards Modal
    const cardFilterInput = document.getElementById('cardFilterInput');
    const cardFilterItems = document.querySelectorAll('.card-filter-item');

    if (cardFilterInput && cardFilterItems.length > 0) {
        cardFilterInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase().trim();

            cardFilterItems.forEach(item => {
                const cardName = item.getAttribute('data-card-name') || '';
                const label = item.querySelector('label');
                const labelText = label ? label.textContent.toLowerCase() : '';

                if (searchTerm === '' || cardName.toLowerCase().includes(searchTerm) || labelText.includes(searchTerm)) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    }

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
}
</script>
@endsection






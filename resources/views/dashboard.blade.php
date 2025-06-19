@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="p-6 bg-white shadow rounded-lg">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-4 rounded-lg shadow">
                <p class="text-sm text-gray-600">Total Aspirasi</p>
                <p class="text-3xl font-bold text-blue-700">{{ $total }}</p>
            </div>
            <div class="bg-gradient-to-r from-green-50 to-green-100 p-4 rounded-lg shadow">
                <p class="text-sm text-gray-600">Kategori Akademik</p>
                <p class="text-3xl font-bold text-green-600">{{ $byKategori['akademik'] ?? 0 }}</p>
            </div>
            <div class="bg-gradient-to-r from-yellow-50 to-yellow-100 p-4 rounded-lg shadow">
                <p class="text-sm text-gray-600">Kategori Non-Akademik</p>
                <p class="text-3xl font-bold text-yellow-600">{{ $byKategori['non-akademik'] ?? 0 }}</p>
            </div>
        </div>
    </div>

    {{-- Grafik --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Status Aspirasi</h2>
        <canvas id="statusChart" height="200"></canvas>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Kategori Aspirasi</h2>
        <canvas id="kategoriChart" height="200"></canvas>
    </div>
</div>

{{-- Grafik Baru: Jumlah Aspirasi per Bulan --}}
<div class="bg-white mt-6 p-6 rounded-lg shadow">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Aspirasi per Bulan</h2>
    <canvas id="monthlyChart" height="100"></canvas>
</div>

</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart: Status Aspirasi
    const statusChart = new Chart(document.getElementById('statusChart'), {
        type: 'doughnut',
        data: {
            labels: {!! json_encode(array_keys($byStatus->toArray())) !!},
            datasets: [{
                label: 'Jumlah',
                data: {!! json_encode(array_values($byStatus->toArray())) !!},
                backgroundColor: ['#facc15', '#60a5fa', '#f87171', '#34d399'],
                borderColor: '#fff',
                borderWidth: 2,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: '#374151',
                        font: { size: 14 }
                    }
                }
            }
        }
    });

    // Chart: Kategori Aspirasi
    const kategoriChart = new Chart(document.getElementById('kategoriChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_keys($byKategori->toArray())) !!},
            datasets: [{
                label: 'Jumlah',
                data: {!! json_encode(array_values($byKategori->toArray())) !!},
                backgroundColor: ['#4ade80', '#fbbf24'],
                borderRadius: 6,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1, color: '#4b5563' },
                    grid: { color: '#e5e7eb' }
                },
                x: {
                    ticks: { color: '#4b5563' },
                    grid: { color: '#e5e7eb' }
                }
            },
            plugins: { legend: { display: false } }
        }
    });

    // Chart: Aspirasi per Bulan
    const monthlyChart = new Chart(document.getElementById('monthlyChart'), {
        type: 'line',
        data: {
            labels: {!! json_encode(array_keys($byMonth->toArray())) !!},
            datasets: [{
                label: 'Jumlah Aspirasi',
                data: {!! json_encode(array_values($byMonth->toArray())) !!},
                backgroundColor: '#93c5fd',
                borderColor: '#3b82f6',
                fill: true,
                tension: 0.4,
                pointRadius: 5,
                pointHoverRadius: 7
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        color: '#374151',
                        font: { size: 14 }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { color: '#4b5563' },
                    grid: { color: '#e5e7eb' }
                },
                x: {
                    ticks: { color: '#4b5563' },
                    grid: { color: '#e5e7eb' }
                }
            }
        }
    });
</script>

@endsection

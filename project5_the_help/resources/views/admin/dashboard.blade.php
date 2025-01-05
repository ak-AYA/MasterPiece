@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')

<style>
    .stat-card {
        background: linear-gradient(135deg,rgba(215, 215, 215, 0.58) 0%, #f8f9fa 100%);
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        height: 100%;
        min-height: 160px;
        border: none;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2563eb;
        margin: 10px 0;
    }

    .stat-label {
        color: #64748b;
        font-size: 1rem;
        font-weight: 500;
    }

    .stat-icon {
        font-size: 2rem;
        opacity: 0.2;
        position: absolute;
        right: 20px;
        top: 20px;
    }

    @keyframes countUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-count {
        animation: countUp 0.5s ease-out forwards;
    }

    .custom-card {
        background-color: rgba(247, 246, 246, 0.9) ; /* Light Gray with transparency */
        color: black; /* Dark text for contrast on light background */
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .custom-card:hover {
        background-color:rgba(208, 224, 255, 0.29); /* Solid light gray on hover */
    }

    /* Chart container to limit its height */
    .chart-container {
        height: 300px;
    }
</style>

<div class="container-fluid px-4">
    <h1 class="mt-4 mb-4">Welcome</h1>

    <div class="row g-4">
        <!-- Payments Card -->
        <div class="col-xl-3 col-md-6">
            <div class="stat-card p-4">
                <i class="fas fa-credit-card stat-icon"></i>
                <div class="stat-label">Payment Methods</div>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="stat-number">
                            <span class="counter" data-target="{{ $visaCount }}">0</span>
                        </div>
                        <div class="text-success">Visa Payments</div>
                    </div>
                    <div>
                        <div class="stat-number">
                            <span class="counter" data-target="{{ $cashCount }}">0</span>
                        </div>
                        <div class="text-primary">Cash Payments</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Card -->
        <div class="col-xl-3 col-md-6">
            <div class="stat-card p-4">
                <i class="fas fa-concierge-bell stat-icon"></i>
                <div class="stat-label">Total Services</div>
                <div class="stat-number">
                    <span class="counter" data-target="{{ $servicesCount }}">0</span>
                </div>
                <div class="text-success">Active Services</div>
            </div>
        </div>

        <!-- Categories Card -->
        <div class="col-xl-3 col-md-6">
            <div class="stat-card p-4">
                <i class="fas fa-th-large stat-icon"></i>
                <div class="stat-label">Categories</div>
                <div class="stat-number">
                    <span class="counter" data-target="{{ $categoriesCount }}">0</span>
                </div>
                <div class="text-info">Service Categories</div>
            </div>
        </div>

        <!-- Reviews & Bookings Card -->
        <div class="col-xl-3 col-md-6">
            <div class="stat-card p-4">
                <i class="fas fa-star stat-icon"></i>
                <div class="stat-label">Feedback Overview</div>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="stat-number">
                            <span class="counter" data-target="{{ $reviewsCount }}">0</span>
                        </div>
                        <div class="text-warning">Reviews</div>
                    </div>
                    <div>
                        <div class="stat-number">
                            <span class="counter" data-target="{{ $bookingsCount }}">0</span>
                        </div>
                        <div class="text-primary">Bookings</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Rest of your dashboard content -->
    <div class="row pt-4">
        <!-- First Card with Chart -->
        <div class="col-xl-6 col-md-12">
            <div class="card custom-card mb-4 shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h5 class="card-title">User and Provider Growth</h5>
                    <p class="card-text">A chart showing user and provider growth over the past few months.</p>
                    <div class="chart-container">
                        <canvas id="growthChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Card with Bookings Chart -->
        <div class="col-xl-6 col-md-12">
            <div class="card custom-card mb-4 shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h5 class="card-title">Bookings Overview</h5>
                    <p class="card-text">A chart showing the bookings over the past few months.</p>
                    <div class="chart-container">
                        <canvas id="bookingsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
const counterAnimation = () => {
    const counters = document.querySelectorAll('.counter');
    
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target'));
        const duration = 1000; // Animation duration in milliseconds
        const steps = 50; // Number of steps in animation
        const stepValue = target / steps;
        let current = 0;
        
        const updateCounter = () => {
            if (current < target) {
                current += stepValue;
                counter.textContent = Math.round(current);
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = target;
            }
        };
        
        updateCounter();
    });
};

// Run counter animation on page load
document.addEventListener('DOMContentLoaded', counterAnimation);

// Run counter animation when the page becomes visible
document.addEventListener('visibilitychange', () => {
    if (document.visibilityState === 'visible') {
        counterAnimation();
    }
});
</script>

<!-- Include Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Fetch data passed from controller
    var months = @json($months);
    var userCounts = @json($user_counts);
    var providerCounts = @json($provider_counts);
    var bookingCounts = @json($booking_counts);

    // User and Provider Growth Chart (Bar chart)
    var ctx1 = document.getElementById('growthChart').getContext('2d');
    var growthChart = new Chart(ctx1, {
        type: 'bar', // Bar chart
        data: {
            labels: months.map(month => {
                const date = new Date(2023, month - 1, 1); // Convert month number to full name
                return date.toLocaleString('default', { month: 'long' }); // Convert to month name
            }),
            datasets: [
                {
                    label: 'Users',
                    data: userCounts, // User counts per month
                    borderColor: 'rgb(173, 195, 230)', // Light Blue Border
                    backgroundColor: 'rgba(0, 30, 79, 0.6)', // Light Blue Background
                },
                {
                    label: 'Providers',
                    data: providerCounts, // Provider counts per month
                    borderColor: 'rgb(135, 206, 250)', // Light Blue Border
                    backgroundColor: 'rgba(12, 132, 207, 0.6)', // Light Blue Background
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    reverse: true, // Flip the x-axis for older months on the left
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Bookings Overview Chart (Line chart in orange)
    var ctx2 = document.getElementById('bookingsChart').getContext('2d');
    var bookingsChart = new Chart(ctx2, {
        type: 'line', // Line chart
        data: {
            labels: months.map(month => {
                const date = new Date(2023, month - 1, 1); // Convert month number to full name
                return date.toLocaleString('default', { month: 'long' }); // Convert to month name
            }),
            datasets: [{
                label: 'Bookings',
                data: bookingCounts, // Bookings counts per month
                borderColor: 'rgb(255, 165, 0)', // Orange Border
                backgroundColor: 'rgba(255, 165, 0, 0.2)', // Orange Background
                fill: true,
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    reverse: true, // Flip the x-axis for older months on the left
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection
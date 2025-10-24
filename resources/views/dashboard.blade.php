@extends('layout')

    @section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Progress Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
        }
        .card {
            background-color: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }
        .progress-circle-wrap {
            position: relative;
            width: 150px;
            height: 150px;
            margin: auto;
        }
        .progress-circle-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-color: #e0e0e0;
        }
        .progress-circle-fg {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            clip: rect(0, 75px, 150px, 0); /* Half circle for initial rotation */
            transform: rotate(calc(var(--angle) * 1deg));
            background: conic-gradient(
                #ff7f50 0%, #ff7f50 var(--p1),
                #6495ed var(--p1), #6495ed var(--p2),
                #ffd700 var(--p2), #ffd700 var(--p3),
                #3cb371 var(--p3), #3cb371 var(--p4),
                #dda0dd var(--p4), #dda0dd var(--p5),
                #f08080 var(--p5), #f08080 100%
            );
        }
        .progress-circle-inner {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            height: 80%;
            background-color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .progress-image {
            width: 90%;
            height: 90%;
            object-fit: cover;
            border-radius: 50%;
        }
        .progress-dot {
            position: absolute;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 0.75rem;
            color: white;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
            z-index: 10;
        }

        /* Dot positioning using CSS variables or JS for dynamic calculations */
        .dot-01 { top: 0; left: 50%; transform: translate(-50%, -50%); background-color: #ff7f50; }
        .dot-02 { top: 20%; right: 0; transform: translate(50%, -50%); background-color: #6495ed; }
        .dot-03 { bottom: 20%; right: 0; transform: translate(50%, 50%); background-color: #ffd700; }
        .dot-04 { bottom: 0; left: 50%; transform: translate(-50%, 50%); background-color: #3cb371; }
        .dot-05 { bottom: 20%; left: 0; transform: translate(-50%, 50%); background-color: #dda0dd; }
        .dot-06 { top: 20%; left: 0; transform: translate(-50%, -50%); background-color: #f08080; }
    </style>
</head>
<body>
    <div class="min-h-screen p-8">


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Personal Progress Card -->
            <div class="card flex flex-col items-center justify-center p-6 relative overflow-hidden">
                <div class="progress-circle-wrap" style="--angle: 20; --p1: 15%; --p2: 30%; --p3: 45%; --p4: 60%; --p5: 75%;">
                    <div class="progress-circle-bg"></div>
                    <div class="progress-circle-fg"></div>
                    <div class="progress-circle-inner">
                        <img src="https://via.placeholder.com/100" alt="Progress Image" class="progress-image">
                    </div>

                    <div class="progress-dot dot-01" style="background-color: #ff7f50;">01</div>
                    <div class="progress-dot dot-02" style="background-color: #6495ed;">02</div>
                    <div class="progress-dot dot-03" style="background-color: #ffd700;">03</div>
                    <div class="progress-dot dot-04" style="background-color: #3cb371;">04</div>
                    <div class="progress-dot dot-05" style="background-color: #dda0dd;">05</div>
                    <div class="progress-dot dot-06" style="background-color: #f08080;">06</div>
                </div>
            </div>

            <!-- Cardio Chart Card -->
            <div class="card">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Cardio</h2>
                <div class="flex items-center space-x-4 mb-4">
                    <div class="w-2/3">
                        <canvas id="cardioChart"></canvas>
                    </div>
                    <div class="w-1/3 flex flex-col space-y-2 text-sm text-gray-600">
                        <div class="flex items-center"><span class="w-3 h-3 rounded-full mr-2" style="background-color: #6495ed;"></span> Swimming</div>
                        <div class="flex items-center"><span class="w-3 h-3 rounded-full mr-2" style="background-color: #dda0dd;"></span> Spinning</div>
                        <div class="flex items-center"><span class="w-3 h-3 rounded-full mr-2" style="background-color: #ff7f50;"></span> Running</div>
                        <div class="flex items-center"><span class="w-3 h-3 rounded-full mr-2" style="background-color: #ffd700;"></span> Biking</div>
                    </div>
                </div>
            </div>

            <!-- Climbing Inclination Card -->
            <div class="card">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Climbing Inclination</h2>
                <div class="h-48 relative">
                    <canvas id="climbingChart"></canvas>
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-yellow-400 text-white text-xs px-3 py-1 rounded-md shadow-md"
                         style="white-space: nowrap; margin-left: 20px; margin-top: -20px;">
                        17 October<br>
                        19.14.000
                    </div>
                </div>
            </div>

            <!-- Progress Tracking Card -->
            <div class="card col-span-1 md:col-span-2">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Progress Tracking</h2>
                <div class="flex items-center space-x-6">
                    <div>
                        <p class="text-4xl font-bold text-gray-800">8.9</p>
                        <p class="text-sm text-gray-500">BiWeekly Progress</p>
                    </div>
                    <div class="flex-grow">
                        <canvas id="progressTrackingChart" height="100px"></canvas>
                    </div>
                    <div class="w-24 h-24 flex items-center justify-center">
                        <canvas id="smallDonutChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Weekly Goal Achieved Card -->
            <div class="card">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Weekly goal achieved</h2>
                <div class="w-48 h-48 mx-auto relative flex items-center justify-center">
                    <canvas id="weeklyGoalChart"></canvas>
                    <div class="absolute text-2xl font-bold text-gray-800">95%<div class="text-sm font-normal text-gray-500">Total</div></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Cardio Chart
        const cardioCtx = document.getElementById('cardioChart').getContext('2d');
        new Chart(cardioCtx, {
            type: 'doughnut',
            data: {
                labels: ['Swimming', 'Spinning', 'Running', 'Biking'],
                datasets: [{
                    data: [30, 20, 25, 25],
                    backgroundColor: ['#6495ed', '#dda0dd', '#ff7f50', '#ffd700'],
                    borderWidth: 0,
                    borderRadius: 5,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        enabled: true,
                    }
                }
            }
        });

        // Climbing Inclination Chart
        const climbingCtx = document.getElementById('climbingChart').getContext('2d');
        const climbingChart = new Chart(climbingCtx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Inclination',
                    data: [10, 15, 12, 18, 20, 16, 22],
                    borderColor: '#ffc107', // Yellow line
                    backgroundColor: 'rgba(255, 193, 7, 0.2)',
                    fill: true,
                    tension: 0.4,
                    pointRadius: 0,
                    pointHoverRadius: 5,
                },{
                    label: 'Inclination 2',
                    data: [8, 12, 10, 15, 17, 13, 19],
                    borderColor: '#7a42f4', // Purple line
                    backgroundColor: 'rgba(122, 66, 244, 0.2)',
                    fill: true,
                    tension: 0.4,
                    pointRadius: 0,
                    pointHoverRadius: 5,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        display: false,
                    },
                    y: {
                        display: false,
                        beginAtZero: true,
                    }
                },
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        enabled: false, // Custom tooltip handled by the div
                    }
                },
                elements: {
                    line: {
                        borderWidth: 2
                    }
                }
            }
        });

        // Progress Tracking Chart (Bar Chart)
        const progressTrackingCtx = document.getElementById('progressTrackingChart').getContext('2d');
        new Chart(progressTrackingCtx, {
            type: 'bar',
            data: {
                labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S', 'M', 'T', 'W', 'T', 'F', 'S', 'S'],
                datasets: [{
                    data: [5, 7, 6, 8, 9, 7, 6, 8, 10, 9, 11, 12, 10, 13],
                    backgroundColor: [
                        '#a78bfa', '#8b5cf6', '#c084fc', '#a78bfa', '#8b5cf6', '#c084fc', '#a78bfa',
                        '#8b5cf6', '#c084fc', '#a78bfa', '#8b5cf6', '#c084fc', '#a78bfa', '#8b5cf6'
                    ],
                    borderRadius: 5,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#a0aec0'
                        }
                    },
                    y: {
                        display: false,
                        beginAtZero: true,
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: false
                    }
                }
            }
        });

        // Small Donut Chart
        const smallDonutCtx = document.getElementById('smallDonutChart').getContext('2d');
        new Chart(smallDonutCtx, {
            type: 'doughnut',
            data: {
                labels: ['Completed', 'Remaining'],
                datasets: [{
                    data: [70, 30],
                    backgroundColor: ['#6366f1', '#e0e7ff'], // Indigo and very light indigo
                    borderWidth: 0,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '80%',
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        enabled: false,
                    }
                }
            }
        });

        // Weekly Goal Achieved Chart
        const weeklyGoalCtx = document.getElementById('weeklyGoalChart').getContext('2d');
        new Chart(weeklyGoalCtx, {
            type: 'doughnut',
            data: {
                labels: ['Achieved', 'Remaining'],
                datasets: [{
                    data: [95, 5],
                    backgroundColor: ['#4ade80', '#e2e8f0'], // Green for achieved, light gray for remaining
                    borderWidth: 0,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '80%',
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        enabled: false,
                    }
                }
            }
        });
    </script>
</body>
</html>

    @endsection

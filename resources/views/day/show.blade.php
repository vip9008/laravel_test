<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meals for Day {{ $day->day_number }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <!-- Week Selector -->
    <div class="d-flex justify-content-center mb-5 week-selector">
        <button class="btn btn-outline-secondary">Week 1</button>
        <button class="btn btn-outline-secondary">Week 2</button>
        <button class="btn active-week">Week 3</button>
        <button class="btn btn-outline-secondary">Week 4</button>
    </div>

    <!-- Day Header -->
    <div class="text-center mb-4">
        <h1 class="fw-bold">Day {{ $day->day_number }}</h1>
        <p class="text-muted">{{ $day->date }}</p>
    </div>

    <!-- Meals Section -->
    <div class="row">
        @foreach ($day->meals as $meal)
            <div class="col-md-4 mb-4">
                <div class="card meal-card h-100 shadow-sm">
                    <!-- Meal Image -->
                    <img src="{{ $meal->image }}" class="card-img-top" alt="{{ $meal->title }}">
                    <!-- Meal Details -->
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $meal->title }}</h5>
                        <p class="card-text">
                            <span class="badge bg-primary">{{ $meal->type_label }}</span>
                            <span class="text-muted small">- {{ $meal->time }} Min Total</span>
                        </p>
                        <ul class="list-unstyled meal-details">
                            <li><strong>Calories:</strong> {{ $meal->calories }}</li>
                            <li><strong>Fat:</strong> {{ $meal->fat }}g</li>
                            <li><strong>Protein:</strong> {{ $meal->protein }}g</li>
                            <li><strong>Net Carbs:</strong> {{ $meal->net_carbs }}g</li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Mark Day as Complete -->
    <div class="d-flex justify-content-end mt-4">
        @if (!$day->is_complete)
            <button class="btn mark-complete-btn">Mark Day as Complete</button>
        @else
            <button class="btn btn-secondary" disabled>Day Completed</button>
        @endif
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

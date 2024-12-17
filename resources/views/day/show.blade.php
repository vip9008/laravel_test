<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meals for Day {{ $day->day_number }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>

<div class="container py-5">
    <div class="weeks-buttons d-flex">
    @foreach ($weeks as $i => $weekGroup)
        <div class="week-group">
            <input type="radio" class="btn-check" name="week-button" value="{{$i}}" id="week-{{$i}}">
            <label class="btn d-block" for="week-{{$i}}">Week {{ $i + 1 }}</label>
            <div class="days-group">
            @foreach ($weekGroup as $weekDay)
                <a href="{{ route('day.show', ['id' => $weekDay['id']]) }}" class="btn {{$weekDay['id'] == $day->id ? 'active' : ''}}">
                    {{ $weekDay['day_number'] }}
                    @if ($weekDay['is_complete'])
                        <i class="bi bi-check2"></i>
                    @endif
                </a>
            @endforeach
            </div>
        </div>
    @endforeach
    </div>

    <script>
        $('.weeks-buttons .week-group .days-group .btn.active').parent().siblings('.btn-check').click();
    </script>

    <br>
    <br>
    <br>
    <br>

    <!-- <div class="mb-4">
        <h1 class="fw-bold">Day {{ $day->day_number }}</h1>
    </div> -->

    <div class="d-flex justify-content-between mb-4">
        <div class="btn-group days-pagination">
            <a href="#" class="btn btn-primary active" aria-current="page">Active link</a>
            <div>DAY {{$day->day_number}}</div>
            <a href="#" class="btn btn-primary">Link</a>
        </div>
        
        @if (!$day->is_complete)
            <button class="btn mark-complete-btn">Mark Day as Complete</button>
        @else
            <button class="btn btn-secondary" disabled>Day Completed</button>
        @endif
    </div>

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
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

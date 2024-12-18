<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meals for Day {{ $day->day_number }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="{{ asset('css/style.scss') }}" rel="stylesheet">
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
            <a href="{{ route('day.show', ['id' => $day->day_number - 1]) }}" class="btn btn-success">
                <i class="bi bi-arrow-left-short"></i>
            </a>
            <div class="day-title">DAY {{$day->day_number}}</div>
            <a href="{{ route('day.show', ['id' => $day->day_number + 1]) }}" class="btn btn-success">
                <i class="bi bi-arrow-right-short"></i>
            </a>
        </div>
        
        @if (!$day->is_complete)
            <form method="POST" action="{{ route('day.markComplete', ['id' => $day->id]) }}">
                @csrf
                <button type="submit" class="btn btn-success icon-button mark-complete-btn">
                    <i class="bi bi-check2"></i>
                    <div>Mark Day as Complete</div>
                </button>
            </form>
        @else
            <button class="btn btn-secondary icon-button" disabled>
                <i class="bi bi-check2-all"></i>
                <div>Day Completed</div>
            </button>
        @endif
    </div>

    <div class="row">
        @foreach ($day->meals as $meal)
            <div class="col-xl-4 col-lg-6 mb-4">
                <div class="card meal-card h-100">
                    <img src="{{ $meal->image }}" class="card-img-top">
                    <span class="badge meal-type text-bg-light">{{ $meal->type_label }}</span>
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-center">{{ $meal->title }}</h5>
                        <div class="meal-details">
                            <div class="detail-item">
                                <div class="title">Calories</div>
                                <div class="info">{{ $meal->calories }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="title">Fat</div>
                                <div class="info">{{ $meal->fat }}g</div>
                            </div>
                            <div class="detail-item">
                                <div class="title">Protein</div>
                                <div class="info">{{ $meal->protein }}g</div>
                            </div>
                            <div class="detail-item">
                                <div class="title">Net Carbs</div>
                                <div class="info">{{ $meal->net_carbs }}g</div>
                            </div>
                        </div>
                    </div>
                    <hr class="m-0">
                    <button type="button" class="btn icon-button recipe-btn" data-bs-toggle="modal" data-bs-target="#recipe-{{ $meal->id }}">
                        <i class="bi bi-search"></i>
                        <div>View Recipe</div>
                    </button>
                </div>
            </div>

            <div class="modal fade" id="recipe-{{ $meal->id }}" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            {{ $meal->recipe }}
                            <div class="d-flex justify-content-end mt-3">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

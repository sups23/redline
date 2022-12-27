@extends(backpack_view('blank'))

@section('content')
    <div class="card" style="width: 50%;">
        <div class="card-body">
            {!! $donorsByBGChart->container() !!}
        </div>
    </div>
    <div class="card" style="width: 50%;">
        <div class="card-body">
            {!! $donorsByAgeChart->container() !!}
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $donorsByBGChart->script() !!}
    {!! $donorsByAgeChart->script() !!}
@endsection

@extends(backpack_view('blank'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                        <h1>{{ $chart1->options['chart_title'] }}</h1>
                        {!! $chart1->renderHtml() !!}

                        <h1>{{ $chart2->options['chart_title'] }}</h1>
                        {!! $chart2->renderHtml() !!}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('after_content_widgets')
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}
    {!! $chart2->renderJs() !!}
@endsection

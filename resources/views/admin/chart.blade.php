@extends(backpack_view('blank'))

@section('content')
    <div class="row">
        <div class="col-6">
            <!-- Content for the first column goes here -->
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Donors by Blood Group</div>
                    <div>
                        {!! $donorsByBGChart->container() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <!-- Content for the second column goes here -->
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Donors by Age Range</div>
                    <div>
                        {!! $donorsByAgeChart->container() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $donorsByBGChart->script() !!}
    {!! $donorsByAgeChart->script() !!}
@endsection

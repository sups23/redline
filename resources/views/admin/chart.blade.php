@extends(backpack_view('blank'))

@section('content')
    <div class="my-3">
        <h2 class="display-4">Donors</h2>
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
    </div>

    <div class="my-3">
        <h2 class="display-4">Blood packs</h2>
        <div class="row">
            <div class="col-6">
                <!-- Content for the first column goes here -->
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Blood Packs by Blood Group</div>
                        <div>
                            {!! $bpByBGChart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <!-- Content for the second column goes here -->
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Available Blood Units</div>
                        <div>
                            {!! $bpByBGUnitChart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <!-- Content for the first column goes here -->
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Blood Pack by Blood Type</div>
                        <div>
                            {!! $bpByTypeChart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <!-- Content for the second column goes here -->
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Blood Pack Arrival and Expiry</div>
                        <div>
                            {!! $bpByArrExpDateChart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="my-3">
        <h2 class="display-4">Events</h2>
        <div class="row">
            <div class="col-6">
                <!-- Content for the first column goes here -->
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Events By Date</div>
                        <div>
                            {!! $eventDateChart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <!-- Content for the second column goes here -->
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Event by Donors Count</div>
                        <div>
                            {!! $eventByDonorCountChart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="my-3">
        <h2 class="display-4">Hospital requests</h2>
        <div class="row">
            <div class="col-6">
                <!-- Content for the first column goes here -->
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Hospital request count by Blood Group</div>
                        <div>
                            {!! $hrByBGChart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <!-- Content for the second column goes here -->
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Hospital requests by blood needed at date</div>
                        <div>
                            {!! $hrBYBNOChart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="my-3">
        <h2 class="display-4">Supply and Demand</h2>
        <div class="row">
            <div class="col-6">
                <!-- Content for the first column goes here -->
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">S/D by Blood Group</div>
                        <div>
                            {!! $supDemChart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <!-- Content for the first column goes here -->
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">S/D by Trend</div>
                        <div>
                            {!! $supDemTrendChart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $donorsByBGChart->script() !!}
    {!! $donorsByAgeChart->script() !!}
    {!! $bpByBGChart->script() !!}
    {!! $bpByBGUnitChart->script() !!}
    {!! $bpByTypeChart->script() !!}
    {!! $bpByArrExpDateChart->script() !!}
    {!! $eventDateChart->script() !!}
    {!! $eventByDonorCountChart->script() !!}
    {!! $hrByBGChart->script() !!}
    {!! $hrBYBNOChart->script() !!}
    {!! $supDemChart->script() !!}
    {!! $supDemTrendChart->script() !!}
@endsection

<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Donor;
use App\Charts\DonorChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChartController extends Controller
{
    public function index(Request $request)
    {
        $bg_data = Donor::pluck('blood_group')->countBy();
        $donorsByBGChart = new DonorChart;
        // $donorsByBGChart->minimalist(true);
        $donorsByBGChart->labels($bg_data->keys());
        $donorsByBGChart->dataset('Donors by Blood Group', 'bar', $bg_data->values())
            ->color([
                'rgb(104, 151, 187)',
                'rgb(89, 39, 79)',
                'rgb(0, 128, 128)',
                'rgb(255, 127, 80)',
                'rgb(255, 219, 88)',
                'rgb(178, 34, 34)',
                'rgb(255, 182, 193)',
                'rgb(0, 100, 0)',
            ])
            ->backgroundColor([
                'rgb(104, 151, 187)',
                'rgb(89, 39, 79)',
                'rgb(0, 128, 128)',
                'rgb(255, 127, 80)',
                'rgb(255, 219, 88)',
                'rgb(178, 34, 34)',
                'rgb(255, 182, 193)',
                'rgb(0, 100, 0)',
            ]);

        $age_data = Donor::pluck('age')->groupBy(function ($item, $key) {
            if ($item < 15) {
                return '0-15';
            } elseif ($item < 20) {
                return '15-20';
            } elseif ($item < 25) {
                return '20-25';
            } elseif ($item < 30) {
                return '25-30';
            } elseif ($item < 35) {
                return '30-35';
            } elseif ($item < 40) {
                return '35-40';
            } elseif ($item < 45) {
                return '40-45';
            } elseif ($item < 50) {
                return '45-50';
            } else {
                return '50+';
            }
        })->map(function ($group) {
            return $group->count();
        });
        $donorsByAgeChart = new DonorChart;
        // $donorsByAgeChart->minimalist(true);
        $donorsByAgeChart->labels($age_data->keys());
        $donorsByAgeChart->dataset('Donors by Age Range', 'pie', $age_data->values())
            ->color([
                'rgb(104, 151, 187)',
                'rgb(89, 39, 79)',
                'rgb(0, 128, 128)',
                'rgb(255, 127, 80)',
                'rgb(255, 219, 88)',
                'rgb(178, 34, 34)',
                'rgb(255, 182, 193)',
                'rgb(0, 100, 0)',
            ])
            ->backgroundColor([
                'rgb(104, 151, 187)',
                'rgb(89, 39, 79)',
                'rgb(0, 128, 128)',
                'rgb(255, 127, 80)',
                'rgb(255, 219, 88)',
                'rgb(178, 34, 34)',
                'rgb(255, 182, 193)',
                'rgb(0, 100, 0)',
            ]);

        $bg_bp_data = \App\Models\BloodPack::with('donor')
            ->where('is_sold', false)
            ->get()
            ->pluck('donor.blood_group')->countBy();
        $bpByBGChart = new DonorChart;
        // $bpByBGChart->minimalist(true);
        $bpByBGChart->labels($bg_bp_data->keys());
        $bpByBGChart->dataset('Blood Pack by Blood Group', 'pie', $bg_bp_data->values())
            ->color([
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 206, 86)',
                'rgb(75, 192, 192)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)',
                'rgb(232, 67, 147)',
                'rgb(255, 159, 64)',
            ])
            ->backgroundColor([
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 206, 86)',
                'rgb(75, 192, 192)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)',
                'rgb(232, 67, 147)',
                'rgb(255, 159, 64)',
            ]);

        $bp_units_data = \App\Models\BloodPack::with('donor')
            ->where('is_sold', false)
            ->get()
            ->groupBy('donor.blood_group')
            ->map(fn ($gr) => $gr->sum('unit'));
        $bpByBGUnitChart = new DonorChart;
        // $bpByBGUnitChart->minimalist(true);
        $bpByBGUnitChart->labels($bp_units_data->keys());
        $bpByBGUnitChart->dataset('Blood Pack by Blood Group', 'bar', $bp_units_data->values())
            ->color([
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 206, 86)',
                'rgb(75, 192, 192)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)',
                'rgb(232, 67, 147)',
                'rgb(255, 159, 64)',
            ])
            ->backgroundColor([
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 206, 86)',
                'rgb(75, 192, 192)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)',
                'rgb(232, 67, 147)',
                'rgb(255, 159, 64)',
            ]);


        $bp_types_data = \App\Models\BloodPack::pluck('blood_type')->countBy();
        $bpByTypeChart = new DonorChart;
        // $bpByTypeChart->minimalist(true);
        $bpByTypeChart->labels($bp_types_data->keys());
        $bpByTypeChart->dataset('Blood Pack by Blood Type', 'bar', $bp_types_data->values())
            ->color([
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 206, 86)',
                'rgb(75, 192, 192)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)',
                'rgb(232, 67, 147)',
                'rgb(255, 159, 64)',
                'rgb(129, 199, 132)',
                'rgb(255, 105, 180)',
            ])
            ->backgroundColor([
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 206, 86)',
                'rgb(75, 192, 192)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)',
                'rgb(232, 67, 147)',
                'rgb(255, 159, 64)',
                'rgb(129, 199, 132)',
                'rgb(255, 105, 180)',
            ]);

        $records = \App\Models\BloodPack::selectRaw('YEAR(expiry_at) year, MONTH(expiry_at) month, COUNT(*) count')
            ->whereYear('expiry_at', '>=', Carbon::now()->subYear())
            ->groupBy('year', 'month')
            ->get();

        $bp_exp_data = collect();

        foreach ($records as $record) {
            $bp_exp_data[$record->year . '/' . $record->month] = $record->count;
        }
        $records = \App\Models\BloodPack::selectRaw('YEAR(arrived_at) year, MONTH(arrived_at) month, COUNT(*) count')
            ->whereYear('arrived_at', '>=', Carbon::now()->subYear())
            ->groupBy('year', 'month')
            ->get();

        $bp_arr_data = collect();

        foreach ($records as $record) {
            $bp_arr_data[$record->year . '/' . $record->month] = $record->count;
        }

        $bpByArrExpDateChart = new DonorChart;
        // $bpByArrExpDateChart->minimalist(true);
        $bpByArrExpDateChart->labels($bp_exp_data->keys());
        $bpByArrExpDateChart->labels($bp_arr_data->keys());
        $bpByArrExpDateChart->dataset('Blood Group Expiry', 'line', $bp_exp_data->values())
            ->backgroundColor('rgba(255, 99, 132, 0.6)')
            ->color('rgb(255, 99, 132)');
        $bpByArrExpDateChart->dataset('Blood Group Arrival', 'line', $bp_arr_data->values())
            ->backgroundColor('rgba(54, 162, 235, 0.6)')
            ->color('rgb(54, 162, 235)');


        $event_data = \App\Models\Event::select('event_at')
            ->where('event_at', '>=', Carbon::now()->startOfMonth())
            ->get()
            ->groupBy(function ($record) {
                return Carbon::parse($record->event_at)->format('F');
            })->map(function ($group) {
                return $group->count();
            });
        $eventDateChart = new DonorChart;
        // $eventDateChart->minimalist(true);
        $eventDateChart->labels($event_data->keys());
        $eventDateChart->dataset('Events', 'bar', $event_data->values())
            ->backgroundColor([
                'rgb(255, 99, 71)', 'rgb(54, 162, 235)', 'rgb(255, 206, 86)', 'rgb(75, 192, 192)', 'rgb(153, 102, 255)',
                'rgb(255, 159, 64)', 'rgb(233, 30, 99)', 'rgb(205, 92, 92)', 'rgb(103, 58, 183)', 'rgb(0, 150, 136)',
                'rgb(139, 0, 139)', 'rgb(0, 188, 212)'
            ])
            ->color([
                'rgb(255, 99, 71)', 'rgb(54, 162, 235)', 'rgb(255, 206, 86)', 'rgb(75, 192, 192)', 'rgb(153, 102, 255)',
                'rgb(255, 159, 64)', 'rgb(233, 30, 99)', 'rgb(205, 92, 92)', 'rgb(103, 58, 183)', 'rgb(0, 150, 136)',
                'rgb(139, 0, 139)', 'rgb(0, 188, 212)'
            ]);

        $event_donor_data = \App\Models\Event::pluck('donors_count')->groupBy(function ($item, $key) {
            if ($item < 50) {
                return '0-50';
            } elseif ($item < 70) {
                return '50-70';
            } elseif ($item < 100) {
                return '70-100';
            } elseif ($item < 120) {
                return '100-120';
            } elseif ($item < 150) {
                return '120-150';
            } elseif ($item < 200) {
                return '150-200';
            } else {
                return '200+';
            }
        })->map(function ($group) {
            return $group->count();
        });
        $eventByDonorCountChart = new DonorChart;
        // $eventByDonorCountChart->minimalist(true);
        $eventByDonorCountChart->labels($event_donor_data->keys());
        $eventByDonorCountChart->dataset('Event by Donors Count Range', 'pie', $event_donor_data->values())
            ->color([
                'rgb(104, 151, 187)',
                'rgb(89, 39, 79)',
                'rgb(0, 128, 128)',
                'rgb(255, 127, 80)',
                'rgb(255, 219, 88)',
                'rgb(178, 34, 34)',
                'rgb(255, 182, 193)',
                'rgb(0, 100, 0)',
            ])
            ->backgroundColor([
                'rgb(104, 151, 187)',
                'rgb(89, 39, 79)',
                'rgb(0, 128, 128)',
                'rgb(255, 127, 80)',
                'rgb(255, 219, 88)',
                'rgb(178, 34, 34)',
                'rgb(255, 182, 193)',
                'rgb(0, 100, 0)',
            ]);

        $hr_bg_data = \App\Models\HospitalRequest::pluck('blood_group')->countBy();
        $hrByBGChart = new DonorChart;
        // $hrByBGChart->minimalist(true);
        $hrByBGChart->labels($hr_bg_data->keys());
        $hrByBGChart->dataset('Hospital Requests by Blood Group', 'pie', $hr_bg_data->values())
            ->color([
                'rgb(255, 99, 71)', // Tomato
                'rgb(54, 162, 235)', // Dodger Blue
                'rgb(255, 205, 86)', // Yellow
                'rgb(75, 192, 192)', // Turquoise
                'rgb(153, 102, 255)', // Purple
                'rgb(201, 203, 207)', // Silver
                'rgb(255, 159, 64)', // Orange
                'rgb(233, 30, 99)', // Pink
            ])
            ->backgroundColor([
                'rgb(255, 99, 71)', // Tomato
                'rgb(54, 162, 235)', // Dodger Blue
                'rgb(255, 205, 86)', // Yellow
                'rgb(75, 192, 192)', // Turquoise
                'rgb(153, 102, 255)', // Purple
                'rgb(201, 203, 207)', // Silver
                'rgb(255, 159, 64)', // Orange
                'rgb(233, 30, 99)', // Pink
            ]);

        $records = \App\Models\HospitalRequest::selectRaw('YEAR(blood_needed_on) year, MONTH(blood_needed_on) month, COUNT(*) count')
            ->whereYear('blood_needed_on', '>=', Carbon::now()->addYear())
            ->groupBy('year', 'month')
            ->get();

        $hr_trend_data = collect();

        foreach ($records as $record) {
            $hr_trend_data[$record->year . '/' . $record->month] = $record->count;
        }

        $hrBYBNOChart = new DonorChart;
        // $hrBYBNOChart->minimalist(true);
        $hrBYBNOChart->labels($hr_trend_data->keys());
        $hrBYBNOChart->dataset('Events', 'bar', $hr_trend_data->values())
            ->label(function ($index, $data) {
                $percentage = round($data / array_sum($data) * 100);
                return "{$percentage}%";
            })
            ->backgroundColor([
                'rgb(255, 99, 71)', // Tomato
                'rgb(54, 162, 235)', // Dodger Blue
                'rgb(255, 205, 86)', // Yellow
                'rgb(75, 192, 192)', // Turquoise
                'rgb(153, 102, 255)', // Purple
                'rgb(201, 203, 207)', // Silver
                'rgb(255, 159, 64)', // Orange
                'rgb(233, 30, 99)', // Pink
                'rgb(0, 188, 212)', // Light Blue
                'rgb(221, 44, 0)', // Red
                'rgb(0, 150, 136)', // Teal
                'rgb(0, 0, 0)', // Black
            ])
            ->color([
                'rgb(255, 99, 71)', // Tomato
                'rgb(54, 162, 235)', // Dodger Blue
                'rgb(255, 205, 86)', // Yellow
                'rgb(75, 192, 192)', // Turquoise
                'rgb(153, 102, 255)', // Purple
                'rgb(201, 203, 207)', // Silver
                'rgb(255, 159, 64)', // Orange
                'rgb(233, 30, 99)', // Pink
                'rgb(0, 188, 212)', // Light Blue
                'rgb(221, 44, 0)', // Red
                'rgb(0, 150, 136)', // Teal
                'rgb(0, 0, 0)', // Black
            ]);

        $hr_units_data = \App\Models\HospitalRequest::all()
            ->groupBy('blood_group')
            ->map(fn ($gr) => $gr->sum('unit'));

        $supDemChart = new DonorChart;
        // $supDemChart->minimalist(true);
        $supDemChart->labels($bp_units_data->keys());
        $supDemChart->dataset('Supply', 'line', $bp_units_data->values())
            ->backgroundColor('rgba(255, 99, 71, 0.6)')
            ->color('rgb(255, 99, 71)');
        $supDemChart->labels($hr_units_data->keys());
        $supDemChart->dataset('Demand', 'line', $hr_units_data->values())
            ->backgroundColor('rgba(75, 192, 192, 0.6)')
            ->color('rgb(75, 192, 192)');

        $records = \App\Models\HospitalRequest::selectRaw('YEAR(created_at) year, MONTH(created_at) month, COUNT(*) count')
            ->whereYear('created_at', '>=', Carbon::now()->subYear())
            ->groupBy('year', 'month')
            ->get();

        $hr_trend_data = collect();

        foreach ($records as $record) {
            $hr_needed_on_data[$record->year . '/' . $record->month] = $record->count;
        }

        $records = \App\Models\BloodPack::selectRaw('YEAR(created_at) year, MONTH(created_at) month, COUNT(*) count')
            ->whereYear('created_at', '>=', Carbon::now()->subYear())
            ->groupBy('year', 'month')
            ->get();

        $bp_trend_data = collect();

        foreach ($records as $record) {
            $bp_trend_data[$record->year . '/' . $record->month] = $record->count;
        }

        dd($bp_trend_data, $hr_trend_data);
        $supDemTrendChart = new DonorChart;
        // $supDemTrendChart->minimalist(true);
        $supDemTrendChart->labels($bp_trend_data->keys());
        $supDemTrendChart->dataset('Supply', 'line', $bp_trend_data->values())
            ->backgroundColor('rgba(0, 150, 136, 0.6)')
            ->color('rgb(0, 150, 136)');
        $supDemTrendChart->labels($hr_trend_data->keys());
        $supDemTrendChart->dataset('Demand', 'line', $hr_trend_data->values())
            ->backgroundColor('rgba(153, 102, 255, 0.6)')
            ->color('rgb(153, 102, 255)');

        return view('admin.chart', [
            'donorsByBGChart' => $donorsByBGChart,
            'donorsByAgeChart' => $donorsByAgeChart,
            'bpByBGChart' => $bpByBGChart,
            'bpByBGUnitChart' => $bpByBGUnitChart,
            'bpByTypeChart' => $bpByTypeChart,
            'bpByArrExpDateChart' => $bpByArrExpDateChart,
            'eventDateChart' => $eventDateChart,
            'eventByDonorCountChart' => $eventByDonorCountChart,
            'hrByBGChart' => $hrByBGChart,
            'hrBYBNOChart' => $hrBYBNOChart,
            'supDemChart' => $supDemChart,
            'supDemTrendChart' => $supDemTrendChart
        ]);
    }
}

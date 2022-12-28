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

        $bp_exp_data = \App\Models\BloodPack::select('expiry_at')
            ->where('expiry_at', '>=', Carbon::now()->startOfMonth())
            ->get()
            ->groupBy(function ($record) {
                return Carbon::parse($record->expiry_at)->format('F');
            })->map(function ($group) {
                return $group->count();
            });
        $bp_arr_data = \App\Models\BloodPack::select('expiry_at')
            ->where('arrived_at', '>=', Carbon::now()->startOfMonth())
            ->get()
            ->groupBy(function ($record) {
                return Carbon::parse($record->arrived_at)->format('F');
            })->map(function ($group) {
                return $group->count();
            });
        $bpByArrExpDateChart = new DonorChart;
        // $bpByArrExpDateChart->minimalist(true);
        $bpByArrExpDateChart->labels($bp_exp_data->keys());
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


        return view('admin.chart', [
            'donorsByBGChart' => $donorsByBGChart,
            'donorsByAgeChart' => $donorsByAgeChart,
            'bpByBGChart' => $bpByBGChart,
            'bpByBGUnitChart' => $bpByBGUnitChart,
            'bpByTypeChart' => $bpByTypeChart,
            'bpByArrExpDateChart' => $bpByArrExpDateChart,
            'eventDateChart' => $eventDateChart,
        ]);
    }
}

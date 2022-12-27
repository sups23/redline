<?php

namespace App\Http\Controllers\Admin;

use App\Charts\DonorChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Donor;

class ChartController extends Controller
{
    public function index(Request $request)
    {
        $bg_data = Donor::pluck('blood_group')->countBy();
        $donorsByBGChart = new DonorChart;
        $donorsByBGChart->labels($bg_data->keys());
        $donorsByBGChart->dataset('Donors by Blood Group', 'bar', $bg_data->values());

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
        $donorsByAgeChart->labels($age_data->keys());
        $donorsByAgeChart->dataset('Donors by Blood Group', 'pie', $age_data->values());

        return view('admin.chart', [
            'donorsByBGChart' => $donorsByBGChart,
            'donorsByAgeChart' => $donorsByAgeChart
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class ChartController extends Controller
{
    public function index(Request $request)
    {
        $chart_options = [
            'chart_title' => 'Donors by Blood Group',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Donor',
            'group_by_field' => 'blood_group',
            'chart_type' => 'bar',
        ];
        $chart1 = new LaravelChart($chart_options);
        
        return view('admin.chart', compact('chart1'));
    }
}

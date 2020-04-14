<?php

namespace App\Http\Controllers;


use App\Catalogue;
use App\Charts\RevChart;
use App\Rev;
use Illuminate\Http\Request;

class RevChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function start()
    {

        return view('chart/chart'


        );

    }

    public function index()
    {
        //
        $project = request('project', 1);
        $date = request('date', 3);
        //  $data = Rev::all()->where('projectID', $project)->orderBy('id', 'desc')->take($date);
        $data = Rev::where('projectID', $project)->orderBy('id', 'desc')->take($date)->get()->reverse();
        foreach ($data as $thisData) {
            $labels[] = jdate(date('Y-m-d', strtotime($thisData->created_at->format('d M Y'))))->format('Y-m-d');
            //    dd(jdate(date('Y-m-d', strtotime($thisData->created_at->format('d M Y')))));
            //   $labels[] = $thisDate->created_at->format('d M Y');
            $allPipe[] = $thisData->allPipe;
            $designPipe[] = $thisData->designPipe;
            $allStress[] = $thisData->allStress;
            $stressPipe[] = $thisData->stressPipe;
            $supportPipe[] = $thisData->supportPipe;
            $releasePipe[] = $thisData->releasePipe;
            $noStatusPipe[] = $thisData->noStatusPipe;
        }

        $allDate = [$labels, $allPipe, $designPipe, $allStress, $stressPipe, $supportPipe, $releasePipe, $noStatusPipe];
        $borderColors = ["rgba(255, 99, 132, 1.0)", "rgba(22,160,133, 1.0)", "rgba(255, 205, 86, 1.0)", "rgba(51,105,232, 1.0)", "rgba(244,67,54, 1.0)", "rgba(34,198,246, 1.0)", "rgba(153, 102, 255, 1.0)", "rgba(255, 159, 64, 1.0)", "rgba(233,30,99, 1.0)", "rgba(205,220,57, 1.0)"];
        $fillColors = ["rgba(255, 99, 132, 0.2)", "rgba(22,160,133, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(51,105,232, 0.2)", "rgba(244,67,54, 0.2)", "rgba(34,198,246, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(233,30,99, 0.2)", "rgba(205,220,57, 0.2)"];

        $stressRevChart = new RevChart();
        $stressRevChart->labels($labels);
        $stressRevChart->title('نمودار خطوط استرس شده');
        $stressRevChart->dataset('خطوط استرس شده', 'line', $stressPipe)
            ->color("rgb(255, 99, 132)")
            ->backgroundcolor("rgb(255, 99, 132)")
            ->fill(false)
            ->linetension(0.1);
        $stressRevChart->dataset('کل خطوط استرسی', 'line', $allStress)
            ->color('orange')
            ->backgroundcolor('orange')
            ->fill(false)
            ->linetension(0.1);


        $revChart = new RevChart();
        $revChart->labels($labels);
        $revChart->title('نمودار خطوط طراحی شده');

        $revChart->dataset('تمام خطوط', 'line', $allPipe)
            ->color('orange')
            ->backgroundcolor('orange')
            ->fill(false)
            ->linetension(0.1);
        $revChart->dataset('خطوط طراحی شده', 'line', $designPipe)
            ->color('green')
            ->fill(false)
            ->backgroundcolor('green')
            ->linetension(0.1);
        $revChart->dataset('خطوط ساپورت شده', 'line', $supportPipe)
            ->color('blue')
            ->backgroundcolor('blue')
            ->fill(false)
            ->linetension(0.1);
        $revChart->dataset('خطوط آزاد شده', 'line', $releasePipe)
            ->color("rgb(255, 99, 132)")
            ->backgroundcolor("rgb(255, 99, 132)")
            ->fill(false)
            ->linetension(0.1);
        $revChart->dataset('خطوط مشخص نشده', 'line', $noStatusPipe)
            ->color('black')
            ->backgroundcolor('black')
            ->fill(false)
            ->linetension(0.1);


        $lastDesignChart = new RevChart;
        $lastDesignChart->title("خطوط استرس شده");
        $lastDesignChart->displayAxes(false);
        $lastDesignChart->displayLegend(true);
        $lastDesignChart->labels(['استرس نشده', 'استرس شده']);
        $lastDesignChart->dataset('Users by trimester', 'doughnut', [end($allStress) - end($stressPipe), end($stressPipe)])
            ->color($borderColors)
            ->backgroundcolor($fillColors);


        $lastReleaseChart = new RevChart;
        $lastReleaseChart->title("خطوط آزاد شده");
        $lastReleaseChart->displayAxes(false);
        $lastReleaseChart->displayLegend(true);
        $lastReleaseChart->labels(['آزاد نشده', 'آزاد شده']);
        $lastReleaseChart->dataset('Users by trimester', 'doughnut', [end($allPipe) - end($releasePipe), end($releasePipe)])
            ->color($borderColors)
            ->backgroundcolor($fillColors);

        $lastSupportChart = new RevChart;
        $lastSupportChart->title("خطوط ساپورت شده");
        $lastSupportChart->displayAxes(false);
        $lastSupportChart->displayLegend(true);
        $lastSupportChart->labels(['ساپورت نشده', 'ساپورت شده']);
        $lastSupportChart->dataset('Users by trimester', 'doughnut', [end($allPipe) - end($supportPipe), end($supportPipe)])
            ->color($borderColors)
            ->backgroundcolor($fillColors);


        $lastStressChart = new RevChart;
        $lastStressChart->title(" خطوط طراحی شده");
        $lastStressChart->minimalist(true);
        $lastStressChart->displayAxes(false);
        $lastStressChart->displayLegend(true);
        $lastStressChart->labels(['طراحی نشده', 'طراحی شده']);

        $lastStressChart->dataset('Users by trimester', 'doughnut', [end($allPipe) - end($designPipe), end($designPipe)])
            ->color($borderColors)
            ->backgroundcolor($fillColors);


        //   $allCharts = [ $revChart ,$stressRevChart ,$lastDesignChart ,$lastStressChart,end($labels),$lastReleaseChart];
        $allCharts = [$revChart, $stressRevChart, $lastDesignChart, $lastStressChart, $allDate, $lastReleaseChart, $lastSupportChart];

        return view('chart/chart',
            ['allCharts' => $allCharts]

        )->with('thisProject', $project)->with('thisDate', $date);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

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
        foreach ($data as $thisDate) {
            $labels[] = $thisDate->created_at->format('d M Y');
            $allPipe[] = $thisDate->allPipe;
            $designPipe[] = $thisDate->designPipe;
            $allStress[] = $thisDate->allStress;
            $stressPipe[] = $thisDate->stressPipe;
            $supportPipe[] = $thisDate->supportPipe;
            $releasePipe[] = $thisDate->releasePipe;
            $noStatusPipe[] = $thisDate->noStatusPipe;
        }


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

        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];
        $lasDesignChart = new RevChart;
        $lasDesignChart->minimalist(true);
        $lasDesignChart->labels(['Not Design', 'Design']);
        $lasDesignChart->dataset('Users by trimester', 'doughnut', [10, 25, 13])
            ->color($borderColors)
            ->backgroundcolor($fillColors);


        $allCharts = [$lasDesignChart , $revChart ,$stressRevChart];

        return view('chart/chart',
            ['allCharts' => $allCharts]

        )->with('thisProject',$project)->with('thisDate',$date);

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

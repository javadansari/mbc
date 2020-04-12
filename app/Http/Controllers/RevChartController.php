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
    public function index()
    {
        //

        $data = Catalogue::all();

        $data = Rev::all()->where('projectID', '6');
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
        return view('chart/chart',
            ['revChart' => $revChart],
            ['stressRevChart' => $stressRevChart]

        );
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

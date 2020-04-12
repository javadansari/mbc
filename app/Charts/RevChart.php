<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class RevChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function title(
        string $title,
        int $font_size = 14,
        string $color = '#666',
        string $font_weight = 'bold',
        string $font_family = "'B Nazanin'"
    )
    {
        return $this->options([
            'title' => [
                'display' => true,
                'fontFamily' => $font_family,
                'fontSize' => $font_size,
                'fontColor' => $color,
                'fontStyle' => $font_weight,
                'text' => $title,
            ],
        ]);
    }
}

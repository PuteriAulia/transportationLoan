<?php

namespace App\Charts;

use App\Models\Loan;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TransportationUsingChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $year = date('Y');
        $month= date('m');
        for ($i=1; $i <= $month ; $i++) { 
            if ($i === 1) {
                $i = '01';
            }elseif ($i === 2) {
                $i = '02';
            }elseif ($i === 3) {
                $i = '03';
            }elseif ($i === 4) {
                $i = '04';
            }elseif ($i === 5) {
                $i = '05';
            }elseif ($i === 6) {
                $i = '06';
            }elseif ($i === 7) {
                $i = '07';
            }elseif ($i === 8) {
                $i = '08';
            }elseif ($i === 9) {
                $i = '09';
            }
            // dd($i);

            $totalLoan = Loan::whereYear('date_loan',$year)->whereMonth('date_loan',$i)->where('active','active')->get();
            $countLoan = count($totalLoan);

            $dataMonth[] = changeIntToMonth($i);
            $dataTotalLoan[] = $countLoan; 
        }

        return $this->chart->lineChart()
            ->setTitle('Pemesanan Kendaraan.')
            ->addData('Total peminjaman', $dataTotalLoan)
            ->setHeight(300)
            ->setXAxis( $dataMonth);
    }
}

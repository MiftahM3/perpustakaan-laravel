<?php

namespace App\Charts;

use App\Models\Peminjaman;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PeminjamanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $data = Peminjaman::selectRaw('kategori.nama AS nama_kategori, COUNT(*) AS jumlah_peminjaman')
            ->join('buku', 'peminjaman.buku_id', '=', 'buku.id')
            ->join('kategori', 'buku.kategori_id', '=', 'kategori.id')
            ->where('peminjaman.status', 2)
            ->orderByDesc('jumlah_peminjaman')
            ->groupBy('kategori.nama')
            ->get();

        $labels = $data->pluck('nama_kategori')->toArray();
        $counts = $data->pluck('jumlah_peminjaman')->toArray();

        $chart = $this->chart->barChart()
            ->setTitle('Peminjaman Per Kategori')
            ->setXAxis($labels)
            ->setColors(['#00695C', '#004D40'])
            ->addData('Jumlah Peminjaman', $counts);

        return $chart;
    }
}

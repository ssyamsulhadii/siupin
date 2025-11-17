<?php

namespace App\Providers;

use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        
        Paginator::useBootstrapFive();
        $list_pegawai = Pegawai::where('data_done', true)
            ->where('tanggal_usul', '>=', Carbon::now()->subMonth())
            ->orderBy('tanggal_usul', 'desc')
            ->take(5)
            ->get();
        $jumlah_usul_masuk = Pegawai::where('data_done', true)
            ->where('tanggal_usul', '>=', Carbon::now()->subMonth())
            ->count();

        View::share('glob_jumlah_usul_masuk', $jumlah_usul_masuk);
        View::share('glob_5_pegawai', $list_pegawai);
    }
}

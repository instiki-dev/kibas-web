<?php

namespace App\Console;

use App\Models\Rekening;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule -> command(function() {
            $day = Carbon::now() -> toArray()["day"];
            $month = Carbon::now() -> toArray()["month"];
            $url = 'https://fcm.googleapis.com/fcm/send';
            $serverKey = env('SERVER_KEY');
            $token = Rekening::whereNotNull('device_token') -> pluck('device_token');
            $message = ["registration_ids" => $token];
             $headers = [
                'Authorization:key=' . $serverKey,
                'Content-Type: application/json',
            ];

            if ($day == 18) {
                $message["notification"] = [
                    "title" => 'Info Tagihan',
                    "body" => 'Bagi pelanggan yang belum melunasi pembayaran, mohon segera untuk melunasi pembayaran'
                ];
                $encodedData = json_encode($message);
                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                // Disabling SSL Certificate
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);

                  $result = curl_exec($ch);
                if ($result === FALSE) {
                    // die('Curl failed: ' . curl_error($ch));
                    curl_close($ch);
                }
                curl_close($ch);
            }

            if (($day == 21) || ($day == 28)) {
                $message["notification"] = [
                    "title" => 'Tunggakan Pelanggan',
                    "body" => 'Bagi pelanggan yang masih memiliki tunggakan pembayaran, mohon segera untuk melunasi pembayaran'
                ];
                $encodedData = json_encode($message);
                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                // Disabling SSL Certificate
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);

                  $result = curl_exec($ch);
                if ($result === FALSE) {
                    // die('Curl failed: ' . curl_error($ch));
                    curl_close($ch);
                }
                curl_close($ch);
            }

            if (($day == 1) && ($month == 3)) {
                $message["notification"] = [
                    "title" => 'Info Penutupan Sambungan Sementara',
                    "body" => 'Bagi pelanggan yang masih memiliki tunggakan pembayaran, mohon segera lunasi pembayaran dengan denda sebesar Rp. 250.000 sebelum sambungan ditutup sementara'
                ];
                $encodedData = json_encode($message);
                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                // Disabling SSL Certificate
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);

                  $result = curl_exec($ch);
                if ($result === FALSE) {
                    // die('Curl failed: ' . curl_error($ch));
                    curl_close($ch);
                }
                curl_close($ch);

            }

        }) -> dailyAt('06:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

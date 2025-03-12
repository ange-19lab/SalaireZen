<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Employer;
use App\Models\Configuration;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppController extends Controller
{
    //
    public function index()
    {
        $totalDepartements = Departement::all()->count();
        $totalEmployers = Employer::all()->count();
        $totalAdministrateurs = User::all()->count();

        $defaultPaymentDate = null;
        $paymentNotification = "";

        $currentDate = Carbon::now()->day;
        // dd($currentDate);
        $defaultPaymentDateQuery = Configuration::where('type','PAYMENT_DATE')->first();
        // dd($defaultPaymentDateQuery);
        
        if ($defaultPaymentDateQuery)
        {
            $defaultPaymentDate = $defaultPaymentDateQuery->value;
            $convertedPaymentDate = intval($defaultPaymentDate);
           
            if ($currentDate < $convertedPaymentDate)
            {
                $paymentNotification = "Attention: Le paiement doit avoir lieu le " . $defaultPaymentDate . " de ce mois";
            }
            else
            {
                $nextMonth = Carbon::now()->addMonth();
                $nextMonthName = $nextMonth->format('F');
                $paymentNotification = "Attention: Le paiement doit avoir lieu le " . $defaultPaymentDate . " du mois suivant (" . $nextMonthName . ")";
            }
        }

        return view('dashboard', compact('totalDepartements', 'totalEmployers', 'totalAdministrateurs', 'paymentNotification'));
    }
}

<?php

namespace Modules\Admin\app\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     * Displays dashboard.
     * 
     * @author Sooryajith
     */
    public function index()
    {
        $enquiries = Enquiry::count();
        return view('admin::dashboard', compact('enquiries'));
    }
}

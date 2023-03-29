<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('Pages.Report.index');
    }

    public function show(Request $request)
    {
        $dateStrings = explode(' to ', $request->dateRange);
        $startDate = $dateStrings[0];
        $endDate = $dateStrings[1];

        $report = $this->getReport($startDate,$endDate);
        $total = $this->getTotal($startDate, $endDate);
        return view('Pages.Report.show', compact('report','total','startDate','endDate'));
    }

    public function generatePdf(Request $request)
    {
        $date = date('F d, Y');
        $fileName = 'Report_Summary_'.$date.'.pdf';
        $report = $this->getReport($request->start,$request->end);
        $total = $this->getTotal($request->start, $request->end);
        // return view('Pages.Report.pdfView', compact('total', 'report'));
        $html = view('Pages.Report.pdfView',['report'=>$report,'total'=>$total])->render();
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        // (Optional) Set options for the PDF
        $dompdf->setPaper('A4', 'lanscape');
    
        // Render the PDF
        $dompdf->render();
    
        // Output the generated PDF to the browser
        $dompdf->stream($fileName);
    }

    public function orders()
    {
        return view('Pages.Report.orders');
    }

    public function finance()
    {
        return view('Pages.Report.finance');
    }

    protected function getReport($startDate,$endDate)
    {
        return Order::selectRaw('DATE(created_at) AS date, COUNT(id) AS orders, COUNT(user_id) AS customers, SUM(total) AS income, SUM(tax) AS tax, SUM(grand_total) AS revenue')
                        ->whereBetween('created_at',[$startDate,$endDate])
                        ->groupBy('date')
                        ->get();
    }

    protected function getTotal($startDate, $endDate)
    {
        return Order::selectRaw('SUM(total) AS income, SUM(tax) AS tax, SUM(grand_total) AS revenue')
                        ->whereBetween('created_at',[$startDate,$endDate])
                        ->first();
    }
}

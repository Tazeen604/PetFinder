<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Your dashboard logic here
       return view('admin.dashboard');
    }

    public function generateQRcode(Request $request){
        $code=$request->input('securityCode');
        $qrCodeUrl = route('finder_page', ['code' => $code]);
        QrCode::format('png')->size(100)->generate($qrCodeUrl, '../public/qrcodes/qrcode.png');
    }
}
?>
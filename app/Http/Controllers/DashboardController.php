<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Intervention\Image\Facades\Image;
use App\Models\PetQRCode;
use Session;

class DashboardController extends Controller
{
    public function index()
    {
        // Your dashboard logic here
       return view('admin.dashboard');
    }

    public function generateQRcode(Request $request){
       
        $request->validate([
            'securityCode' => 'required|string',
        ]);
        $code=$request->input('securityCode');
        $qrCodePath = public_path('qrcodes/') . $code . '.svg';
        $qrCodeUrl = route('finder_page', ['code' => $code]);
        QrCode::format('svg')->size(100)->generate($qrCodeUrl,$qrCodePath);
         // Save data to the database
         $qrCodeData = new PetQRCode();
         $qrCodeData->security_code = $code;
         $qrCodeData->qr_code_url = $qrCodeUrl;
         $qrCodeData->save();
         Session::flash('success', 'QR Code created successfully');
         return redirect()->route('showQRcode', ['code' => $code]);
    }

    public function showGeneratedQRCode($code)
    {
        $qrCodePathView = public_path('qrcodes/') . $code . '.svg';
        return view('/admin/dashboard', compact('qrCodePathView'));
    }

  
        public function redirectURL($code)
    {
        // Retrieve owner based on the provided security code
        $owner = Owner::where('security_code', $code)->first();

        if ($owner) {
            return redirect()->route('finder_page', ['code' => $code])
            ->with('owner', $owner);
        } else {
            return view('owner-not-found');
        }
    }


    public function sendLocationEmail(Request $request, $code)
{
    $owner = Owner::where('security_code', $code)->first();

    if ($owner) {
        // Retrieve latitude and longitude values from the form
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $message = $request->input('message');

        // Prepare location data for the email
        $locationData = [
            'latitude' => $latitude,
            'longitude' => $longitude,
        ];

        // Send email to owner
        Mail::to($owner->email)->send(new LocationEmail($locationData,$message));

        return redirect()->route('finder_page', ['code' => $code])
            ->with('success', 'Email sent successfully.');
    } else {
        return redirect()->route('finder_page', ['code' => $code])
            ->with('error', 'Owner not found for the provided security code.');
    }
}
}
?>
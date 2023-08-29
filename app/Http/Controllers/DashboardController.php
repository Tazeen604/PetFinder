<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Intervention\Image\Facades\Image;
use App\Models\PetQRCode;
use Session;
use Illuminate\Support\Facades\Response;
use App\Models\Owner;
use App\Models\Pet;
use Mail;
use App\Mail\LocationEmail;
use Illuminate\Support\Facades\Storage;

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
        $qrCodeUrl = url('finder_page/' . $code);
        QrCode::format('svg')->size(100)->generate($qrCodeUrl,$qrCodePath);
         // Set up the response for download
    $response = Response::download($qrCodePath, $code . '.svg', [
        'Content-Type' => 'image/svg+xml',
    ]);
         // Save data to the database
         $qrCodeData = new PetQRCode();
         $qrCodeData->security_code = $code;
         $qrCodeData->qr_code_url = $qrCodeUrl;
         $qrCodeData->save();
         Session::flash('success', 'QR Code created successfully');
         return $response;
    }

    public function viewSecurityCodes()
    {
        $securityCodes = PetQRCode::all(); // Assuming you have a PetQRCode model
    
        return view('/admin/security_codes', compact('securityCodes'));
    }

  
        public function redirectURL($code)
    {
        // Retrieve owner based on the provided security code
        $owner = Owner::where('security_code', $code)->first();

        if ($owner) {
            return view('finder_page', compact('owner'));
        } else {
            $findermessage = "QR Code is not Registered Yet, Please Register your Pet";
            return view('welcome', compact('findermessage'));
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
            ->with('success', 'An email has been sent to the owner. You can contact them by their phone number. Thank you for your help.');
    } else {
        return redirect()->route('finder_page', ['code' => $code])
            ->with('error', 'Owner not found for the provided security code.');
    }
}



//delete Security codes
public function deleteSecurityCodes($code)
{
    $scode = PetQRCode::where('security_code', $code)->first();

    if ($scode) {
        // Check if related owner exists
        $ownerExists = Owner::where('security_code', $code)->exists();

        // Check if related pet exists
        $petExists = Pet::where('security_code', $code)->exists();

        if ($ownerExists && $petExists) {
            // Delete the related owner
            Owner::where('security_code', $code)->delete();

            // Delete the related pet
            Pet::where('security_code', $code)->delete();
        }
            // Delete the QR code image
            $qrCodeFileName = $scode->security_code . '.svg';
            Storage::delete('public/qrcodes/' . $qrCodeFileName);

            // Delete the QR code record
            $scode->delete();

            return redirect()->back()->with('deletedcodeSuccess', 'All Related Customers and Pets Deleted Successfully');
        } else {
            return redirect()->back()->with('deletedcodeerror', 'Related records not found.');
        }
    }
}

?>
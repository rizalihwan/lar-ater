<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function sendEmail(Request $request)
    {
        // Siapkan Data
        $email = $request->email;
        $data = array(
                'name' => $request->name,
                'email_body' => $request->email_body
            );

        // Kirim Email
        try {
            Mail::send('form_email.index', $data, function($mail) use($email) {
                $mail->to($email, 'no-reply')
                        ->subject("Sample Email Laravel");
                $mail->from('hrihost99@gmail.com', 'Message Email Testing');
            });
    
            // Cek kegagalan
            if (Mail::failures()) {
                return "Gagal mengirim Email";
            }
            return "Email berhasil dikirim!";
        } catch (\Exception $e){
            return 'kesalahan!' . $e->getMessage();
        }
    }
}

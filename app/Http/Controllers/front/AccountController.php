<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\create_mainUsers;
use App\Services\AccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AccountController extends Controller
{
    public function __construct(private AccountService $accountService)
    {
    }


    public function index()
    {
        $login = Cookie::get('email');
        if ($login) {
            $email = Cookie::get('email');
            $user = create_mainUsers::where('email', $email)->first();
            return view('front.account', compact('user'));
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $updatedUserAvatar = $this->accountService->update($request, $id);
            return response()->json(['success' => true, 'message' => 'Məlumatlarınız yeniləndilər.', 'updated_user_avatar' => $updatedUserAvatar]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => "Məlumatların yenilənməsi zamanı xəta"]);
        }
    }


    // app/Http/Controllers/front/AccountController.php

    public function check(Request $request, $id)
    {

        try {
            $result = $this->accountService->passwordUpdate($request, $id);
            if ($result == 0) {
                return response()->json(['success' => true, "code" => 0, 'message' => 'Daxil etdiyiniz şifrə yanlışdır', 'mm' => $request->newpass]);
            } elseif ($result == 1) {
                return response()->json(['success' => true, "code" => 1, 'message' => "Şifrə uğurla yeniləndi"]);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => "Məlumatların yenilənməsi zamanı xəta"]);
        }
    }

    public function hashParola($parola)
    {
        return hash('sha256', $parola);
    }
}

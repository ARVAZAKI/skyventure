<?php

namespace App\Http\Controllers;

use PDO;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index(){
        $accounts = User::all();
        return view('Features.account', compact('accounts'));
    }
    public function destroy($id){
        $account = User::find($id);
        $account->delete();
        return redirect()->route('account.index');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'role' => ['required', 'string', 'max:255', 'in:admin,superadmin'],
    ]);

    try {
        $account = new User();
        $account->name = $request->name;
        $account->email = $request->email;
        $account->password = Hash::make($request->password);
        $account->role = $request->role;
        $account->save();

        return redirect()->route('account.index')->with('success', 'Account successfully created.');
    } catch (\Exception $e) {
        // Log error message
        Log::error('Failed to create account: ' . $e->getMessage(), [
            'request' => $request->all()
        ]);

        return redirect()->back()->withErrors(['error' => 'Failed to create account. Please try again.']);
    }
}
}

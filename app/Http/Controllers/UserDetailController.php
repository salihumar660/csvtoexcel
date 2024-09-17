<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UsersAddress;
use Illuminate\Support\Facades\DB;

class UserDetailController extends Controller
{
    public function withAddress()
    {
        $usersWithAddressCount = User::withCount('addresses')->get();
        return view('users-addresses', compact('usersWithAddressCount'));
    }
    public function withOutAddress()
    {
        $usersWithoutAddress = User::doesntHave('addresses')->get();
        return view('without-address', compact('usersWithoutAddress'));
    }
    public function duplicateAddress()
    {
        $duplicates = UsersAddress::select('address', DB::raw('COUNT(*) as count'))
            ->groupBy('address')
            ->havingRaw('COUNT(*) > 1')
            ->get();

        return view('duplicate-address', compact('duplicates'));
    }
}

<?php

namespace App\Services\Admin;

use App\Models\User\User;
use App\Models\PaymentPlan\paymentPlan;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UpdateUserRequest;

class ManageUsersService
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.show', compact('users'));
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);;
        return view('admin.user.edit', compact('user'));
        return redirect(route('admin.home'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'is_active' => $request->is_active,
        ]);

        return redirect(route('user.index'));
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'User deleted successfully');
    }
}

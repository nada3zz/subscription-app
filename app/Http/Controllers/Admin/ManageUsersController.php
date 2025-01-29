<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\ManageUsersService;
use App\Http\Requests\Admin\UpdateUserRequest;

class ManageUsersController extends Controller
{
    protected $manageUsersService;

    public function __construct(ManageUsersService $manageUsersService)
    {
        $this->manageUsersService = $manageUsersService;
    }


    public function index()
    {
        return $this->manageUsersService->index();
    }


    public function edit(Request $request)
    {
        $userId = $request->query('id');
        return $this->manageUsersService->edit($userId);
    }


    public function update(UpdateUserRequest $request)
    {
        $userId = $request->query('id');
        return $this->manageUsersService->update($request, $userId);
    }


    public function destroy(Request $request)
    {
        $userId = $request->query('id');
        return $this->manageUsersService->destroy($userId);
    }
}

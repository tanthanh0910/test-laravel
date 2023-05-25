<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\AdminUpdatePasswordRequest;
use App\Http\Requests\Admin\User\AdminSaveUserRequest;
use App\Http\Requests\Admin\User\AdminStoreUserRequest;
use App\Http\Responses\APIResponse;
use App\Interfaces\UserServiceInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    private $userService;
    private $outletService;
    private $factoryService;

    public function __construct(
        UserServiceInterface    $userService
    )
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $query = $this->userService->getUsersQuery(['id', 'user_name', 'email', 'role_id', 'phone']);
        $query->orderBy('id', 'DESC')->filterIndexData($request);

        $users = $query->paginate(config('constant.per_page'));
        return view('admin.user.index', compact('users'));

    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(AdminStoreUserRequest $request)
    {
        $request->merge([
            'is_active' => User::IS_ACTIVE
        ]);

        DB::beginTransaction();
        try {
            $user = $this->userService->createUser($request->except(['password', 'password_confirmation']));
            $this->userService->changeUserPassword($user, $request->input('password'));

        } catch (\Exception $e) {
            Log::info("USER | CREATE NEW: " . $e->getMessage());
            DB::rollBack();
            return back()
                ->withInput($request->input())
                ->with('danger', 'Action Fail');
        }

        DB::commit();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Created user successfully');

    }

    public function show($id)
    {
        $user = $this->userService->getUserById($id);
        if (empty($user)) {
            abort(404);
        }

        return view('admin.user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->userService->getUserById($id);
        if (empty($user)) {
            abort(404);
        }

        return view('admin.user.edit', compact('user'));
    }

    public function update($id, AdminSaveUserRequest $request)
    {
        $user = $this->userService->getUserById($id);
        if (empty($user)) {
            abort(404);
        }

        DB::beginTransaction();
        try {

            $user = $this->userService->updateUser(removeOtherKeyInArray($request->all(), ['password', 'password_confirmation']), $user);

            if (!empty($request->input('password'))) {
                $this->userService->changeUserPassword($user, $request->input('password'));
            }

        } catch (\Exception $e) {
            Log::info("USER | UPDATE: " . $e->getMessage());
            DB::rollBack();
            return back()
                ->withInput($request->input())
                ->with('danger', 'Action fail');
        }
        DB::commit();

        return redirect()
            ->route('admin.users.edit', ['user' => $user->id])
            ->with('success', 'Update user successfully');


    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $user = $this->userService->getUserById($id);
        if (empty($user)) {
            return APIResponse::fail(null, 'Data not found');
        }

        if ($user->id == auth()->user()->id) {
            return APIResponse::fail(null, 'Action fail');
        }

        $user->delete();

        return APIResponse::success(null, 'Delete user successfully');

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Role;
use App\Models\UserRole;
use App\User;

class UserController extends Controller
{
    public function add(){
    	Customer::create([
    		'l_name' => 'Nguyễn Tuấn',
    		'f_name' => 'Sơn',
    		'email' => 'tieuthantai3112@gmail.com',
    		'password' => bcrypt(123456789),
    		'birthday' => '1997-12-31',
    		'phone' => '0975492234',
    		'address' => 'T2-22-12 Times City, 458 Minh Khai, Hà Nội'
    	]);
    }

    public function index()
    {
        $data = User::paginate(15);
        return view('admin.user.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routes = '';
        return view('admin.user.create',compact('routes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Vui lòng nhập tên nhóm quyền'
        ]);
        $routes = json_encode($request->route);
        User::create(['name' => $request->name, 'permissions' => $request->$routes]);
        return redirect()->route('admin.user.index')->with('status-success', 'Thêm nhóm quyền thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $role_assignment = $user->getRoles->pluck('name','id')->toArray();

        $roles = Role::orderBy('name','ASC')->get();
        return view('admin.user.edit',compact('user','roles','role_assignment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ];

        $messages = [

        ];
        if ($request->password != '') {
              $rules['cpassword'] = 'required|same:password';

              $messages['cpassword.required'] = 'Vui lòng xác nhận mật khẩu';
              $messages['cpassword.same'] = 'Mật khẩu không trùng nhau, vui lòng nhập lại';
        }

        $request->validate($rules,$messages);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password ? bcrypt($request->password) : $user->password
        ];

        $user->update($data);

        if (is_array($request->role)) {
            UserRole::where('user_id',$user->id)->delete();
            foreach ($request->role as $role_id){
                UserRole::create(['user_id' => $user->id,'role_id' => $role_id]);
            }
        }
        return redirect()->route('admin.user.index')->with('status-success','Chỉnh sửa quản trị thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

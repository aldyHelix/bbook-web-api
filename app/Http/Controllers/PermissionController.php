<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function viewData()
    {
        $this->authorize('view');

        return 'view';
    }

    public function createData()
    {
        $this->authorize('create');

        return 'create';
    }

    public function editData()
    {
        $this->authorize('edit');

        return 'edit';
    }

    public function updateData()
    {
        $this->authorize('update');

        return 'update';
    }

    public function deleteData()
    {
        $this->authorize('delete');

        return 'delete';
    }
    public function viewDashboard()
    {
        $this->authorize('dashboard');

        return 'dashboard';
    }
    public function viewUserDashboard()
    {
        $this->authorize('user-dashboard');

        return 'user-dashboard';
    }
}

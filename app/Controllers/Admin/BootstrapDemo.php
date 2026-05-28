<?php

namespace App\Controllers\Admin;

class BootstrapDemo extends BaseController
{
    /**
     * Display the Admin Dashboard page.
     *
     * Prepares view data for the dashboard, including:
     * - Datatables feature flag
     * - JavaScript asset list
     * - CSS asset list
     * - Page title
     *
     * @return string Rendered admin dashboard view output.
     */
    public function index()
    {
        // Datatables flag
        $data['datatables'] = false;
        // Array of javascript files to include
        $data['js'] = ['admin/bootstrap-demo'];
        // Array of CSS files to include
        $data['css'] = ['admin/bootstrap-demo'];
        // Set the page title
        $data['title'] = 'Bootstrap Demo';
        return view('admin/bootstrap-demo', $data);
    }
}

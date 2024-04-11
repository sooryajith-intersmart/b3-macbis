<?php

namespace Modules\Admin\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EnquiryExport;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Enquiry::orderBy('id', 'desc');
            // Handle search query
            if (!empty($request->input('search.value'))) {
                $searchTerm = $request->input('search.value');
                $data->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('phone', 'like', '%' . $searchTerm . '%')
                    ->orWhere('message', 'like', '%' . $searchTerm . '%');
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return $row->name;
                })
                ->addColumn('email', function ($row) {
                    return $row->email;
                })
                ->addColumn('phone', function ($row) {
                    return $row->phone;
                })
                ->addColumn('message', function ($row) {
                    return $row->message;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<form action="' . route('enquiry.destroy', $row->id) . '" method="POST"
                                style="display: inline-block;">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="button" class="btn btn-danger btn-sm delete-btn"
                                    data-toggle="tooltip" data-placement="top" data-original-title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $enquiries = Enquiry::all();

        return view('admin::enquiry.index', compact('enquiries'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Enquiry $enquiry)
    {
        if ($enquiry->delete()) {
            return redirect()->route('enquiry.index')->with('success', 'Enquiry deleted successfully.');
        } else {
            return redirect()->route('enquiry.index')->with('error', 'Failed to delete Enquiry.');
        }
    }

    /**
     * enquiry export.
     * 
     * @author Sooryajith
     */
    public function export()
    {
        $enquiry = Enquiry::all();

        return Excel::download(new EnquiryExport($enquiry), 'enquiry.csv');
    }
}

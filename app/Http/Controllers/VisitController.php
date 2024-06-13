<?php

namespace App\Http\Controllers;
//use App\Http\Requests\VisitorRequest;
use App\Models\Host;
use Inertia\Inertia;
use App\Models\Visit;
use Inertia\Response;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected string  $visit = '';

    public function __construct(Visit $visit)
    {
//       ;
        $this->visit = $visit;
    }
    // public function index():Response
    // {
    //     //
    //     $visits = Visit::all();
    //     return Inertia::render('Visits', [
    //         'visits' => $visits,
    //     ]);
    // }
    public function index(): Response
    {
        $visits = Visit::with(['visitor', 'host'])->get();

        $visitsData = $visits->map(function ($visit) {
            return [
                'visit_id' => $visit->id,
                'date' => $visit->date,
                'check_in_time' => $visit->check_in_time,
                'check_out_time' => $visit->check_out_time,
                'purpose' => $visit->purpose,
                'status' => $visit->status,
                'visitor_name' => $visit->visitor->full_name,
                'visitor_email' => $visit->visitor->email,
                'visitor_company' => $visit->visitor->company,
                'host_name' => $visit->host->host_name,
                'host_department' => $visit->host->host_department,
                'host_position' => $visit->host->host_position,
            ];
        });

        return Inertia::render('Visits', [
            'visits' => $visitsData,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request  $request)
    {

//        $visitor = User::create($request->validated());
//        return response()->json($visitor, 201);
//        return Inertia::render('Dashboard');
//        return Redirect::to('/dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    //     $visitor = Visit::create($request->all());
    // }


    public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'visitor_name' => 'required|string|max:255',
        'visitor_email' => 'required|string|email|max:255',
        'visitor_company' => 'required|string|max:255',
        'host_name' => 'required|string|max:255',
        'host_department' => 'required|string|max:255',
        'host_position' => 'required|string|max:255',
        'date' => 'required|date',
        'check_in_time' => 'required',
        'check_out_time' => 'required',
        'purpose' => 'required|string|max:255',
        'status' => 'required|string|max:255',
    ]);

    // Fetch visitor_id from the visitors table
    $visitor = Visitor::where('full_name', $request->visitor_name)
        ->where('email', $request->visitor_email)
        ->where('company', $request->visitor_company)
        ->firstOrFail();

    // Fetch host_id from the hosts table
    $host = Host::where('host_name', $request->host_name)
        ->where('host_department', $request->host_department)
        ->where('host_position', $request->host_position)
        ->firstOrFail();

    // Create the visit with the fetched ids
    $visit = Visit::create([
        'visitor_id' => $visitor->id,
        'host_id' => $host->host_id,
        'date' => $request->date,
        'check_in_time' => $request->check_in_time,
        'check_out_time' => $request->check_out_time,
        'purpose' => $request->purpose,
        'status' => $request->status,
    ]);
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     $visitor = Visitor::findOrFail($id);

    //     // Validate the request
    //     $request->validate([
    //         'full_name' => ['required', 'string', 'max:255'],
    //         'phone_number' => ['required', 'string', 'max:255'],
    //         'company' => ['required', 'string', 'max:255'],
    //         'email' => [
    //             'required',
    //             'string',
    //             'email',
    //             'max:255',
    //             'unique:visitors,email,' . $id
    //         ],
    //     ]);

    //   //  Update the visitor
    //     $visitor->fill($request->all());
    //     $visitor->save();

    //     return redirect()->back()->with('success', 'Visitor has been updated successfully.');
    // }

    public function update(Request $request, $visit_id)
    {
        $visit = Visit::findOrFail($visit_id);

        $request->validate([
            'visitor_name' => 'required|string|max:255',
            'visitor_email' => 'required|string|email|max:255',
            'visitor_company' => 'required|string|max:255',
            'host_name' => 'required|string|max:255',
            'host_department' => 'required|string|max:255',
            'host_position' => 'required|string|max:255',
            'date' => 'required|date',
            'check_in_time' => 'required',
            'check_out_time' => 'required',
            'purpose' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);
    
        // Fetch visitor_id from the visitors table
        $visitor = Visitor::where('full_name', $request->visitor_name)
            ->where('email', $request->visitor_email)
            ->where('company', $request->visitor_company)
            ->firstOrFail();
    
        // Fetch host_id from the hosts table
        $host = Host::where('host_name', $request->host_name)
            ->where('host_department', $request->host_department)
            ->where('host_position', $request->host_position)
            ->firstOrFail();

      
        


        // Update the visitor
        $visit->fill($request->all());
        $visit->save();

        return redirect()->back()->with('success', 'Host has been updated successfully.');
    }

//     /**
//      * Remove the specified resource from storage.
//      */
// //    public function destroy(string $id)
    public function destroy(Visit $visit)
    {
    
        
        $visit->delete();
    }
}

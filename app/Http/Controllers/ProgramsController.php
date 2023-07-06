<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Exports\AttendeesCsvExport;
// use App\Exports\AttendeesExcelExport;
use Maatwebsite\Excel\Facades\Excel;

class ProgramsController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->paginate(5);

        return Inertia::render('Programs/Index', [
            'programs' => $programs,
        ]);
    }

    public function create()
    {
        return view('programs.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'venue' => 'required',
        ]);

        // $validatedData['link'] = generateLink(); // You need to implement the logic to generate the link

        Program::create($validatedData);

        return redirect()->route('programs.index')
            ->with('success', 'Program created successfully.');
    }

    public function show(Program $program)
    {
        $program->load('attendees'); // Eager load the attendees relationship

        return Inertia::render('Programs/Show', [
            'program' => $program,
        ]);
    }

    public function edit(Program $program)
    {
        return view('programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'venue' => 'required',
        ]);

        $program->update($validatedData);

        return redirect()->route('programs.index')
            ->with('success', 'Program updated successfully.');
    }

    public function destroy(Program $program)
    {
        $program->delete();

        return redirect()->route('programs.index')
            ->with('success', 'Program deleted successfully.');
    }

    public function exportCsv(Program $program)
    {
        $attendees = $program->attendees;
        $export = new AttendeesCsvExport($attendees);

        return Excel::download($export, 'attendees.csv');
    }

    public function exportExcel(Program $program)
    {
        $attendees = $program->attendees;
        $export = new AttendeesExcelExport($attendees);

        return Excel::download($export, 'attendees.xlsx');
    }
}

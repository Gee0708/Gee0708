<?php

namespace App\Exports;

use App\Models\Program;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AttendeesCsvExport implements FromQuery, WithHeadings, ShouldAutoSize
{
    public function query()
    {
        // Build your query to retrieve the attendees data
        return Program::first()->attendees();
    }

    public function headings(): array
    {
        // Return the column headings for the CSV file
        return [
            'First Name',
            'Last Name',
            'Email',
            // Add more headings as needed
        ];
    }
}

<?php

namespace App\Exports;

use App\models\Enquiry;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EnquiryExport implements
    FromCollection,
    WithHeadings,
    ShouldAutoSize,
    WithStyles,
    WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $enquiries = Enquiry::orderBy('id', 'desc')->get();

        return $enquiries->map(function ($enquiry, $index) {
            return [
                $index + 1,
                $enquiry->name,
                $enquiry->email,
                $enquiry->phone,
                $enquiry->message,
                $enquiry->created_at,
            ];
        });
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'SN',
            'Name',
            'Email',
            'Phone',
            'Message',
            'Date'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:F1')->getFont()->setBold(true);
    }

    public function columnWidths(): array
    {
        return [
            'D' => 35,
        ];
    }
}
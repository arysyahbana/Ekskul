<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class siswaEkskulExport implements FromArray, WithHeadings, WithCustomStartCell, WithTitle, WithStyles
{
    protected $siswaData;

    public function __construct($siswaData)
    {
        $this->siswaData = $siswaData;
    }

    // Define the starting cell for the data
    public function startCell(): string
    {
        return 'A1';
    }

    // Define the sheet title
    public function title(): string
    {
        return 'Data Siswa';
    }

    // Define the array data
    public function array(): array
    {
        $data = [];
        $rowNumber = 1; // Initialize row number

        foreach ($this->siswaData as $ekskul => $students) {
            foreach ($students as $student) {
                $data[] = [
                    $rowNumber,                  // Nomor
                    $student['nis'],             // NIS
                    $student['nama'],            // Nama Siswa
                    $student['gender'],          // Jenis Kelamin
                    $student['kelas'],           // Kelas
                    $student['jenjang'],         // Jenjang
                    $ekskul                      // Ekskul
                ];
                $rowNumber++;
            }
        }

        return $data;
    }

    // Define the column headers
    public function headings(): array
    {
        $today = date('d-m-Y');
        return [
            ['Dokumen di download pada tanggal ' . $today], // Title row
            ['Nomor', 'NIS', 'Nama Siswa', 'Jenis Kelamin', 'Kelas', 'Jenjang', 'Ekskul'] // Table headers
        ];
    }

    // Apply styles to the Excel sheet
    public function styles(Worksheet $sheet)
    {
        // Merge the title cells
        $sheet->mergeCells('A1:G1');

        // Style for title row
        $sheet->getStyle('A1')->applyFromArray([
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => 'center']
        ]);

        // Style for header row
        $sheet->getStyle('A2:G2')->applyFromArray([
            'font' => ['bold' => true],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'CCFFCC'], // Light green background
            ],
        ]);

        // Set columns to auto size
        foreach (range('A', 'G') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
    }
}

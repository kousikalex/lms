<?php
namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToCollection, WithHeadingRow
{
    protected $collegeId;
    protected $courseId;

    public function __construct($collegeId, $courseId,$departmentId, $yearId,$sectionId)
    {
        $this->collegeId = $collegeId;
        $this->courseId  = $courseId;
        $this->departmentId  = $departmentId;
        $this->yearId  = $yearId;
        $this->sectionId  = $sectionId;
    }

    /**
     * @param Collection $rows
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Excel header row MUST be: name, email, contact_number, department, year
            if (!isset($row['name']) || !isset($row['email'])) {
                // skip invalid rows if needed
                continue;
            }

            Student::create([
                'college_id'      => $this->collegeId,
                'course_id'       => $this->courseId,
                'department_id'       => $this->departmentId,
                'section_id'       => $this->sectionId,
                'year_id'       => $this->yearId,
                'name'            => $row['name'],
                'email'           => $row['email'],
                'contact_number'  => $row['contact_number'] ?? null,

            ]);
        }
    }
}

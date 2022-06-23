<?php

namespace App\Imports;

use App\Models\GuestList;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Helpers\UtilityHelper;

class GuestListImport implements ToModel, WithHeadingRow
{

    // public function getCsvSettings()
    // {
    //     return [
    //         'delimiter' => ';'
    //     ];
    // }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new GuestList([
            'invitation_code' => UtilityHelper::generateInvitationCode(),
            'guest_name' => $row['guest_name'],
            'max_attendance' => $row['max_attendance'],
            'number_of_attendance' => 0,
            'attendance_type' => $row['attendance_type'],
            'enable_edit_name' => $row['enable_edit_name'] == null ? '0' : '1'
        ]);
    }
}

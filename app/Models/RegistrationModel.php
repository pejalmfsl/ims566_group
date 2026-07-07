<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrationModel extends Model
{
    protected $table = 'registrations';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'event_id',
        'full_name',
        'fullname',
        'student_staff_id',
        'student_id',
        'email',
        'phone_number',
        'faculty',
        'programme',
        'status',
        'attendance_status',
        'created_at',
        'updated_at',
        'register_date',
    ];
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
}

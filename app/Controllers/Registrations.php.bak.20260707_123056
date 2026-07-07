<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\RegistrationModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Registrations extends BaseController
{
    private array $rules = [
        'full_name' => 'required|min_length[3]|max_length[150]',
        'student_staff_id' => 'required|max_length[50]',
        'email' => 'required|valid_email|max_length[150]',
        'phone_number' => 'required|max_length[30]',
        'faculty' => 'required|max_length[100]',
        'programme' => 'required|max_length[100]',
    ];

    public function create(string $token)
    {
        $event = $this->findEventByToken($token);

        $this->data['title'] = 'Event Registration';
        $this->data['event'] = $event;
        $this->data['token'] = $token;

        return view('registrations/create', $this->data);
    }

    public function store(string $token)
    {
        $event = $this->findEventByToken($token);

        if (! $this->validate($this->rules)) {
            $this->data['title'] = 'Event Registration';
            $this->data['event'] = $event;
            $this->data['token'] = $token;
            $this->data['validation'] = $this->validator;

            return view('registrations/create', $this->data);
        }

        if (! in_array(strtolower((string) ($event['status'] ?? '')), ['open', 'active'], true)) {
            return redirect()->to(site_url('register/' . $token))->with('error', 'Pendaftaran untuk event ini belum dibuka atau telah ditutup.');
        }

        if (! empty($event['registration_close_date']) && date('Y-m-d') > $event['registration_close_date']) {
            return redirect()->to(site_url('register/' . $token))->with('error', 'Tarikh tutup pendaftaran telah tamat.');
        }

        $registrationModel = new RegistrationModel();
        $fullName = $this->request->getPost('full_name');
        $studentStaffId = $this->request->getPost('student_staff_id');

        $registrationModel->insert([
            'event_id' => $event['id'],
            'full_name' => $fullName,
            'fullname' => $fullName,
            'student_staff_id' => $studentStaffId,
            'student_id' => $studentStaffId,
            'email' => $this->request->getPost('email'),
            'phone_number' => $this->request->getPost('phone_number'),
            'faculty' => $this->request->getPost('faculty'),
            'programme' => $this->request->getPost('programme'),
            'status' => 'registered',
            'register_date' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('register/' . $token))->with('success', 'Pendaftaran berjaya dihantar.');
    }

    private function findEventByToken(string $token): array
    {
        $eventModel = new EventModel();
        $event = $eventModel->where('registration_token', $token)->first();

        if (! $event) {
            throw PageNotFoundException::forPageNotFound('Registration URL tidak wujud. Sila semak semula link pendaftaran.');
        }

        return $event;
    }
}

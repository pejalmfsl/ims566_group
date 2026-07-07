<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\RegistrationModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $eventModel = new EventModel();
        $registrationModel = new RegistrationModel();

        $this->data['totalEvents'] = $eventModel->countAllResults();
        $this->data['totalParticipants'] = $registrationModel->countAllResults();
        $this->data['upcomingEvents'] = $eventModel->where('event_date >=', date('Y-m-d'))->orderBy('event_date', 'ASC')->findAll(5);
        $this->data['recentRegistrations'] = $registrationModel->orderBy('created_at', 'DESC')->findAll(5);
        $this->data['title'] = 'Dashboard';

        return view('dashboard/index', $this->data);
    }
}

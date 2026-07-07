<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\RegistrationModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use Dompdf\Dompdf;
use Dompdf\Options;

class Attendance extends BaseController
{
    public function index(int $eventId)
    {
        [$event, $participants, $filters] = $this->getAttendanceData($eventId);

        $this->data['title'] = 'Attendance';
        $this->data['event'] = $event;
        $this->data['participants'] = $participants;
        $this->data['registered'] = count($participants);
        $this->data['filters'] = $filters;

        return view('attendance/index', $this->data);
    }

    public function exportPdf(int $eventId)
    {
        [$event, $participants] = $this->getAttendanceData($eventId, false);

        $html = view('attendance/pdf', [
            'event' => $event,
            'participants' => $participants,
            'registered' => count($participants),
            'generatedAt' => date('d/m/Y h:i A'),
        ]);

        $options = new Options();
        $options->set('defaultFont', 'DejaVu Sans');
        $options->set('isRemoteEnabled', false);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $filename = 'attendance-' . url_title($event['event_name'] ?? 'aktiviti', '-', true) . '.pdf';

        return $this->response
            ->setHeader('Content-Type', 'application/pdf')
            ->setHeader('Content-Disposition', 'attachment; filename="' . $filename . '"')
            ->setBody($dompdf->output());
    }

    private function getAttendanceData(int $eventId, bool $useFilters = true): array
    {
        $eventModel = new EventModel();
        $registrationModel = new RegistrationModel();
        $event = $eventModel->find($eventId);

        if (! $event) {
            throw PageNotFoundException::forPageNotFound('Aktiviti tidak dijumpai.');
        }

        $filters = [
            'q' => $useFilters ? trim((string) $this->request->getGet('q')) : '',
            'status' => $useFilters ? trim((string) $this->request->getGet('status')) : '',
        ];

        $registrationModel->where('event_id', $eventId);

        if ($filters['q'] !== '') {
            $registrationModel->groupStart()
                ->like('full_name', $filters['q'])
                ->orLike('student_staff_id', $filters['q'])
                ->orLike('email', $filters['q'])
                ->orLike('faculty', $filters['q'])
                ->orLike('programme', $filters['q'])
                ->groupEnd();
        }

        if (in_array($filters['status'], ['registered', 'approved', 'rejected', 'attended', 'absent'], true)) {
            $registrationModel->where('status', $filters['status']);
        } else {
            $filters['status'] = '';
        }

        $participants = $registrationModel
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return [$event, $participants, $filters];
    }
}

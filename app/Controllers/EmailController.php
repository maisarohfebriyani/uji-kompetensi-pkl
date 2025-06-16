<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class EmailController extends Controller
{
    public function index()
    {
        return view('email/form');
    }

    public function send()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'to'      => 'required|valid_email',
            'subject' => 'required',
            'message' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $to      = $this->request->getPost('to');
        $subject = $this->request->getPost('subject');
        $message = $this->request->getPost('message');
        $file    = $this->request->getFile('attachment');

        $email = \Config\Services::email();

        $email->setTo($to);
        $email->setFrom('kursusbelajarkuliah@gmail.com', 'Mai Saroh');
        $email->setSubject($subject);
        $email->setMessage($message);

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $newName);
            $filepath = WRITEPATH . 'uploads/' . $newName;
            $email->attach($filepath);
        }

        if ($email->send()) {
            return redirect()->to('/kirim-email')->with('success', 'Email berhasil dikirim!');
        } else {
            return redirect()->to('/kirim-email')->with('error', $email->printDebugger(['headers']));
        }
    }
}

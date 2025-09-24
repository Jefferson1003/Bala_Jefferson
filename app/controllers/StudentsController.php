<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

/**
 * Controller: StudentsController
 * 
 * Automatically generated via CLI.
 */
class StudentsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->database();
        $this->call->model('StudentsModel');
    }

    public function index()
    {
        $page = isset($_GET['page']) && !empty($_GET['page']) ? $this->io->get('page') : 1;

        // Search query
        $q = isset($_GET['q']) && !empty($_GET['q']) ? trim($this->io->get('q')) : '';

        $records_per_page = 10;

        // Load pagination library
        $this->call->library('pagination');

        // Get paginated data
        $students = $this->StudentsModel->page($q, $records_per_page, $page);

        $data['students'] = $students['records'];

        $total_rows = $students['total_rows'];

        // Pagination settings
        $this->pagination->set_options([
            'first_link' => '⏮ First',
            'last_link'  => 'Last ⏭',
            'next_link'  => 'Next →',
            'prev_link'  => '← Prev',
            'page_delimiter' => '&page='
        ]);

        $this->pagination->set_theme('bootstrap');
        $this->pagination->initialize($total_rows, $records_per_page, $page, '?q=' . $q);

        // Custom CSS for horizontal + centered pagination
        $pagination_html = "
        <style>
            .pagination-wrapper {
                display: flex;
                justify-content: center;
                margin-top: 20px;
            }
            .pagination {
                display: flex;
                list-style: none;
                padding: 0;
                margin: 0;
                gap: 8px;
            }
            .pagination li {
                display: inline-block;
            }
            .pagination li a,
            .pagination li span {
                display: block;
                padding: 8px 14px;
                border-radius: 6px;
                background: #7e57c2;
                color: #fff;
                text-decoration: none;
                transition: 0.3s;
            }
            .pagination li a:hover {
                background: #5e35b1;
            }
            .pagination li.active span {
                background: #5e35b1;
            }
        </style>
        <div class='pagination-wrapper'>"
        . $this->pagination->paginate()
        . "</div>";

        $data['page'] = $pagination_html;

        $this->call->view('students/index', $data);
    }

    public function create()
    {
        if ($this->io->method() == 'post') {
            $fname = $this->io->post('first_name');
            $lname = $this->io->post('last_name');
            $email = $this->io->post('email');

            $data = [
                'first_name' => $fname,
                'last_name' => $lname,
                'email' => $email
            ];

            $this->StudentsModel->insert($data);

            echo "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Success</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background: linear-gradient(135deg, #e0f7fa, #e1bee7);
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 100vh;
                        margin: 0;
                    }
                    .card {
                        background: #fff;
                        padding: 25px 30px;
                        border-radius: 12px;
                        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
                        text-align: center;
                        width: 350px;
                    }
                    h2 {
                        margin-bottom: 15px;
                        color: #333;
                    }
                    p {
                        margin-bottom: 20px;
                        font-size: 16px;
                        color: #444;
                    }
                    a {
                        display: inline-block;
                        background: #7e57c2;
                        color: white;
                        padding: 12px 18px;
                        border-radius: 8px;
                        text-decoration: none;
                        font-size: 16px;
                        transition: 0.3s;
                    }
                    a:hover {
                        background: #5e35b1;
                    }
                </style>
            </head>
            <body>
                <div class='card'>
                    <h2>Success 🎉</h2>
                    <p>Student created successfully!</p>
                    <a href='" . site_url('') . "'>View Data</a>
                </div>
            </body>
            </html>
            ";
        } else {
            $this->call->view('students/create_new');
        }
    }

    public function update($id)
    {
        if ($this->io->method() == 'post') {
            $fname = $this->io->post('first_name');
            $lname = $this->io->post('last_name');
            $email = $this->io->post('email');
            $newdata = [
                'first_name'=> $fname,
                'last_name'=> $lname,
                'email' => $email
            ];

            $this->StudentsModel->update($id, $newdata);

            echo "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Success</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background: linear-gradient(135deg, #e0f7fa, #e1bee7);
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 100vh;
                        margin: 0;
                    }
                    .card {
                        background: #fff;
                        padding: 25px 30px;
                        border-radius: 12px;
                        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
                        text-align: center;
                        width: 350px;
                    }
                    h2 {
                        margin-bottom: 15px;
                        color: #333;
                    }
                    p {
                        margin-bottom: 20px;
                        font-size: 16px;
                        color: #444;
                    }
                    a {
                        display: inline-block;
                        background: #7e57c2;
                        color: white;
                        padding: 12px 18px;
                        border-radius: 8px;
                        text-decoration: none;
                        font-size: 16px;
                        transition: 0.3s;
                    }
                    a:hover {
                        background: #5e35b1;
                    }
                </style>
            </head>
            <body>
                <div class='card'>
                    <h2>Success 🎉</h2>
                    <p>Student updated successfully!</p>
                    <a href='" . site_url('') . "'>View Data</a>
                </div>
            </body>
            </html>
            ";
        } else {
            $data = $this->StudentsModel->find($id);
            $this->call->view('students/update_student', $data);
        }
    }

    public function delete($id)
    {
        $this->StudentsModel->delete($id);

        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Deleted</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background: linear-gradient(135deg, #e0f7fa, #e1bee7);
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                }
                .card {
                    background: #fff;
                    padding: 25px 30px;
                    border-radius: 12px;
                    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
                    text-align: center;
                    width: 350px;
                }
                h2 {
                    margin-bottom: 15px;
                    color: #333;
                }
                p {
                    margin-bottom: 20px;
                    font-size: 16px;
                    color: #444;
                }
                a {
                    display: inline-block;
                    background: #7e57c2;
                    color: white;
                    padding: 12px 18px;
                    border-radius: 8px;
                    text-decoration: none;
                    font-size: 16px;
                    transition: 0.3s;
                }
                a:hover {
                    background: #5e35b1;
                }
            </style>
        </head>
        <body>
            <div class='card'>
                <h2>Deleted ✅</h2>
                <p>Student deleted successfully!</p>
                <a href='" . site_url('') . "'>View Data</a>
            </div>
        </body>
        </html>
        ";
    }
}

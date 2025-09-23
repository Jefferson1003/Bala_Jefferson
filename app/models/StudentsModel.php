<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: StudentsModel
 * 
 * Automatically generated via CLI.
 */
class StudentsModel extends Model {
    protected $table = 'students';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }
    public function page($q = '', $records_per_page = null, $page = null)
{
    $query = $this->db->table($this->table);

    if (!empty($q)) {
$query->like('id', '%'.$q.'%')
              ->or_like('first_name', '%'.$q.'%')
              ->or_like('last_name', '%'.$q.'%')
              ->or_like('email', '%'.$q.'%');
    }

    $countQuery = clone $query;
    $total_rows = $countQuery->select_count('*', 'count')->get()['count'];
        
    $records = $query->pagination($records_per_page, $page)->get_all();

    return ['records' => $records, 'total_rows' => $total_rows];
}

}
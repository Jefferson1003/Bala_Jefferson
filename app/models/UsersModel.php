<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primary_key = 'id';

    public function findByUsername($username)
    {
        return $this->db->table($this->table)->where('username', $username)->get();
    }

    public function findByEmail($email)
    {
        return $this->db->table($this->table)->where('email', $email)->get();
    }
}

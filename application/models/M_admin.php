<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends Ci_model
{
    function website()
    {
        $this->db->select("*");
        $this->db->from('website');
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->result_array();
    }
    
    function id_kec()
    {
        $this->db->select("*");
        $this->db->from('kecamatan');
        $this->db->order_by('id_kec', 'ASC');

        $query = $this->db->get();
        return $query->result_array();
    }

    function dt_kec()
    {
        $this->db->select('count(id_desa) as total');
        $this->db->select('desa.id_kec');
        $this->db->select('kecamatan');
        $this->db->group_by('kecamatan.id_kec');
        $this->db->order_by('kecamatan.id_kec', 'ASC');
        $this->db->join('desa', 'kecamatan.id_kec = desa.id_kec');

        $query = $this->db->get('kecamatan');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    function nama_kec($id_kec)
    {
        $this->db->select("*");
        $this->db->from('kecamatan');
        $this->db->where('id_kec',$id_kec);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }

    function dt_desa($id_kec)
    {
        $this->db->select('count(nama) as total');
        $this->db->select('desa');
        $this->db->select('desa.id_desa');
        $this->db->where('desa.id_kec', $id_kec);
        $this->db->order_by('kecamatan.id_kec', 'ASC');
        $this->db->order_by('desa.id_desa', 'ASC');
        $this->db->group_by('desa.id_desa');
        $this->db->join('kecamatan', 'desa.id_kec = kecamatan.id_kec');
        $this->db->join('dt_stunting', 'desa.id_desa = dt_stunting.id_desa');

        $query = $this->db->get('desa');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }
    
    function dt_desa1($id_kec)
    {
        $this->db->select("*");
        $this->db->from('desa');
        $this->db->order_by('id_kec', 'ASC');
        $this->db->where('desa.id_kec', $id_kec);

        $query = $this->db->get();
        return $query->result_array();
    }

    function list_data_stunting($id_desa)
    {
        $this->db->select("*");
        $this->db->from('dt_stunting');
        $this->db->where('desa.id_desa', $id_desa);
        $this->db->order_by('thn', 'DESC');
        $this->db->order_by('tgl', 'DESC');
        $this->db->join('desa', 'desa.id_desa = dt_stunting.id_desa');
        $this->db->join('kecamatan', 'desa.id_kec = kecamatan.id_kec');

        $query = $this->db->get();
        return $query->result_array();
    }

    function list_data_stunting_all($awal, $akhir, $status, $kecamatan)
    {
        if($awal == 'ALL' && $akhir == 'ALL') {
            $this->db->select("*");
            $this->db->from('dt_stunting');
            $this->db->order_by('tgl', 'DESC');
            $this->db->order_by('thn', 'DESC');

        }elseif($status == 'Status') {
            $this->db->select("*");
            $this->db->from('dt_stunting');
            $this->db->where('tgl >=', $awal);
            $this->db->where('tgl <=', $akhir);
            $this->db->where('kecamatan', $kecamatan);
            $this->db->order_by('tgl', 'DESC');
            $this->db->order_by('thn', 'DESC');

        }elseif($kecamatan == 'Kecamatan') {
            $this->db->select("*");
            $this->db->from('dt_stunting');
            $this->db->where('tgl >=', $awal);
            $this->db->where('tgl <=', $akhir);
            $this->db->where('status', $status);
            $this->db->order_by('tgl', 'DESC');
            $this->db->order_by('thn', 'DESC');
        }else {
            $this->db->select("*");
            $this->db->from('dt_stunting');
            $this->db->where('tgl >=', $awal);
            $this->db->where('tgl <=', $akhir);
            $this->db->where('status', $status);
            $this->db->where('kecamatan', $kecamatan);
            $this->db->order_by('tgl', 'DESC');
            $this->db->order_by('thn', 'DESC');
        }
        $this->db->join('desa', 'desa.id_desa = dt_stunting.id_desa');
        $this->db->join('kecamatan', 'desa.id_kec = kecamatan.id_kec');

        $query = $this->db->get();
        return $query->result_array();
    }

    function hapus_data($where, $table)
    {
        $this->db->where($where);

        $this->db->delete($table);
    }

    public function verify_password($username, $old_password) {
        // Ambil data password lama dari database
        $this->db->select('password');
        $this->db->where('username', $username);
        $query = $this->db->get('login'); // Gantilah 'users' dengan nama tabel Anda
        $result = $query->row();

        // Verifikasi password lama dengan password_verify
        return password_verify($old_password, $result->password);
    }

    public function update_password($username, $new_password) {
        // Simpan password baru ke database
        $data = array(
            'password' => $new_password
        );
        $this->db->where('username', $username);
        $this->db->update('login', $data); // Gantilah 'users' dengan nama tabel Anda
    }

}
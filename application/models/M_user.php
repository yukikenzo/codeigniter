<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends Ci_model
{
    function website()
    {
        $this->db->select("*");
        $this->db->from('website');
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->result_array();
    }
    
// dashboard
    function dt_kec()
    {
        $this->db->select("*");
        $this->db->from('kecamatan');
        $this->db->order_by('id_kec', 'ASC');

        $query = $this->db->get();
        return $query->result_array();
    }

    //konformasi aktif, gejalah, sembuh
    public function aktif_d()
    {
        $this->db->where('status','Aktif');
        
        $query = $this->db->get('dt_stunting');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function sembuh_d()
    {
        $this->db->where('status','Sembuh');
        $query = $this->db->get('dt_stunting');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function gejala_d()
    {
        $this->db->where('status','Gejala');
        
        $query = $this->db->get('dt_stunting');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    // end konformasi aktif, gejalah, sembuh

    // kasus aktif per tahun

    function dt_kasus_aktif22_d($thn_now1)
    {
        $this->db->select('count(dt_stunting.id_desa) as total');
        $this->db->select('thn');
        $this->db->where('thn', $thn_now1);
        $this->db->where('status','Aktif');
        $this->db->group_by('kecamatan.id_kec');
        $this->db->order_by('kecamatan.id_kec', 'ASC');
        $this->db->join('desa', 'desa.id_desa = dt_stunting.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kec = desa.id_kec');

        $query = $this->db->get('dt_stunting');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    function dt_kasus_aktif23_d($thn_now)
    {
        $this->db->select('count(dt_stunting.id_desa) as total');
        $this->db->select('thn');
        $this->db->where('thn', $thn_now);
        $this->db->where('status','Aktif');
        $this->db->group_by('kecamatan.id_kec');
        $this->db->order_by('kecamatan.id_kec', 'ASC');
        $this->db->join('desa', 'desa.id_desa = dt_stunting.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kec = desa.id_kec');

        $query = $this->db->get('dt_stunting');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    //end kasus aktif per tahun

    // seluruh kasus tahun now

    function dt_kasus_now_d()
    {
        $this->db->select('count(dt_stunting.id_desa) as total');
        $this->db->where('thn', date('Y'));
        $this->db->where('status','Aktif');
        $this->db->group_by('kecamatan.id_kec');
        $this->db->order_by('kecamatan.id_kec', 'ASC');
        $this->db->join('desa', 'desa.id_desa = dt_stunting.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kec = desa.id_kec');

        $query = $this->db->get('dt_stunting');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    // end seluruh kasus tahun now

    function dt_kasus_d()
    {
        $this->db->select('count(dt_stunting.id_desa) as total');
        $this->db->where('status','Aktif');
        $this->db->group_by('desa.id_kec');
        $this->db->order_by('desa.id_kec', 'ASC');
        $this->db->join('desa', 'desa.id_desa = dt_stunting.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kec = desa.id_kec');

        $query = $this->db->get('dt_stunting');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    function dt_kasus2_d()
    {
        $this->db->select('count(dt_stunting.id_desa) as total');
        $this->db->where('status','Gejala');
        $this->db->group_by('desa.id_kec');
        $this->db->order_by('desa.id_kec', 'ASC');
        $this->db->join('desa', 'desa.id_desa = dt_stunting.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kec = desa.id_kec');

        $query = $this->db->get('dt_stunting');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    function dt_kasus3_d()
    {
        $this->db->select('count(dt_stunting.id_desa) as total');
        $this->db->where('status','Sembuh');
        $this->db->group_by('desa.id_kec');
        $this->db->order_by('desa.id_kec', 'ASC');
        $this->db->join('desa', 'desa.id_desa = dt_stunting.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kec = desa.id_kec');

        $query = $this->db->get('dt_stunting');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }


// dashboard

// presentasi kasus per kecamatan

    // presentasi keseluruhan kasus
    function dt_desa($id_kec)
    {
        $this->db->select('desa.*, kecamatan.kecamatan, kecamatan.gambar');
        $this->db->from('desa');
        $this->db->order_by('id_desa', 'ASC');
        $this->db->where('desa.id_kec', $id_kec);
        $this->db->join('kecamatan', 'kecamatan.id_kec = desa.id_kec');

        $query = $this->db->get();
        return $query->result_array();
    }

    function thn_kec($id_kec)
    {
        $this->db->select("thn");
        $this->db->group_by('thn');
        $this->db->order_by('thn','ASC');
        $this->db->where('desa.id_kec',$id_kec);

        $this->db->join('desa', 'desa.id_desa = dt_stunting.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kec = desa.id_kec');
        
        $this->db->from('dt_stunting');
        
        $query = $this->db->get();
        return $query->result_array();
    }

    function dt_kasus($id_kec)
    {
        $this->db->select('count(dt_stunting.id_desa) as total');
        $this->db->where('desa.id_kec',$id_kec);
        $this->db->where('status','Aktif');
        $this->db->order_by('desa.id_desa', 'ASC');
        $this->db->group_by('dt_stunting.id_desa');
        $this->db->join('desa', 'desa.id_desa = dt_stunting.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kec = desa.id_kec');

        $query = $this->db->get('dt_stunting');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    function dt_kasus2($id_kec)
    {
        $this->db->select('count(dt_stunting.id_desa) as total');
        $this->db->where('desa.id_kec',$id_kec);
        $this->db->where('status','Gejala');
        $this->db->group_by('dt_stunting.id_desa');
        $this->db->order_by('desa.id_desa', 'ASC');
        $this->db->join('desa', 'desa.id_desa = dt_stunting.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kec = desa.id_kec');

        $query = $this->db->get('dt_stunting');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    function dt_kasus3($id_kec)
    {
        $this->db->select('count(dt_stunting.id_desa) as total');
        $this->db->where('desa.id_kec',$id_kec);
        $this->db->where('status','Sembuh');
        $this->db->group_by('dt_stunting.id_desa');
        $this->db->order_by('desa.id_desa', 'ASC');
        $this->db->join('desa', 'desa.id_desa = dt_stunting.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kec = desa.id_kec');

        $query = $this->db->get('dt_stunting');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }


    // end presentasi keseluruhan kasus


    // kasus aktif per tahun

    function dt_kasus_aktif22($id_kec, $thn_now1)
    {
        $this->db->select('count(dt_stunting.id_desa) as total');
        $this->db->where('thn', $thn_now1);
        $this->db->where('desa.id_kec',$id_kec);
        $this->db->where('status','Aktif');
        $this->db->group_by('dt_stunting.id_desa');
        $this->db->order_by('desa.id_desa', 'ASC');
        $this->db->join('desa', 'desa.id_desa = dt_stunting.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kec = desa.id_kec');

        $query = $this->db->get('dt_stunting');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    function dt_kasus_aktif23($id_kec,$thn_now)
    {
        $this->db->select('count(dt_stunting.id_desa) as total');
        $this->db->where('thn', $thn_now);
        $this->db->where('desa.id_kec',$id_kec);
        $this->db->where('status','Aktif');
        $this->db->group_by('dt_stunting.id_desa');
        $this->db->order_by('desa.id_desa', 'ASC');
        $this->db->join('desa', 'desa.id_desa = dt_stunting.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kec = desa.id_kec');

        $query = $this->db->get('dt_stunting');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    //end kasus aktif per tahun

    // seluruh kasus tahun now

    function dt_kasus_now($id_kec)
    {
        $this->db->select('count(dt_stunting.id_desa) as total');
        $this->db->where('thn', date('Y'));
        $this->db->where('desa.id_kec',$id_kec);
        $this->db->where('status','Aktif');
        $this->db->group_by('dt_stunting.id_desa');
        $this->db->order_by('desa.id_desa', 'ASC');
        $this->db->join('desa', 'desa.id_desa = dt_stunting.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kec = desa.id_kec');

        $query = $this->db->get('dt_stunting');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    // end seluruh kasus tahun now


    //konformasi aktif, gejalah, sembuh
    public function aktif($id_kec)
    {
        $this->db->where('desa.id_kec',$id_kec);
        $this->db->where('status','Aktif');
        $this->db->join('desa', 'desa.id_desa = dt_stunting.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kec = desa.id_kec');
        
        $query = $this->db->get('dt_stunting');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function sembuh($id_kec)
    {
        $this->db->where('desa.id_kec',$id_kec);
        $this->db->where('status','Sembuh');
        $this->db->join('desa', 'desa.id_desa = dt_stunting.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kec = desa.id_kec');
        
        $query = $this->db->get('dt_stunting');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function gejala($id_kec)
    {
        $this->db->where('desa.id_kec',$id_kec);
        $this->db->where('status','Gejala');
        $this->db->join('desa', 'desa.id_desa = dt_stunting.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kec = desa.id_kec');
        
        $query = $this->db->get('dt_stunting');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    // end konformasi aktif, gejalah, sembuh

    

// end presentasi kasus per kecamatan

}
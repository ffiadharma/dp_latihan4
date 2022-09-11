<?php
defined('BASEPATH') OR exit('Not Allowed Access Direct');

Class Mahasiswa_model extends CI_Model{
    public function getDataMahasiswa(){
        $this->db->order_by('id_mhs', 'DESC');
        // select * from mahasiswa
        $data = $this->db->get('mahasiswa')->result();

        return $data;
    }

    public function simpan_data($data){
        $this->db->insert('mahasiswa', $data);
        return $this;
    }

    public function find($id_mhs){
        $this->db->where('id_mhs', $id_mhs);
        $data= $this->db->get('mahasiswa')->row();

        return $data;
    }

    public function edit_data($data,$id_mhs){
        // update mahasiswa 
        $this->db->where('id_mhs', $id_mhs);
        $this->db->update('mahasiswa', $data);

        return $this;
    }

    public function edit_save() {
        $id =$this->input->post('id');
        $data = array(
            'nama' => $this->input->post('nama_mahasiswa'),
            'nim' => $this->input->post('nim'),
            'no_hp' => $this->input->post('no_hp'),
            'email' => $this->input->post('email'),
            'jurusan' => $this->input->post('jurusan'),
            'foto_profile' => $this->input->post('foto_profile'),
            'alamat' => $this->input->post('alamat'),
        );

        $edit = $this->Mahasiswa_model->edit_data($data,$id);
        if($edit) {
            redirect('mahasiswa');
        }
    }

    public function delete($id){
        $this->db->where("id_mhs", $id);
        $this->db->delete('mahasiswa');

        return $this;
    }
}
?>

<?php

class Penduduk_model
{
    private $table = 'tb_penduduk';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // untuk menampilkan di tabel
    public function getAllPenduduk()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    // untuk fitur detail
    public function getPendudukById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function add($data)
    {
        $query = "INSERT INTO tb_penduduk (nama, asal, no_tlpn) VALUES (:nama, :asal, :no_tlpn)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('asal', $data['asal']);
        $this->db->bind('no_tlpn', $data['no_tlpn']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deletePenduduk($id)
    {
        $query = "DELETE FROM tb_penduduk WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editDataPenduduk($data)
    {
        try {
            // Debugging
            // var_dump($data);
            // die();

            $query = "UPDATE tb_penduduk SET
                    nama = :nama,
                    asal = :asal,
                    no_tlpn = :no_tlpn
                WHERE id = :id";

            $this->db->query($query);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('asal', $data['asal']);
            $this->db->bind('no_tlpn', $data['no_tlpn']);
            $this->db->bind('id', $data['id']);

            $this->db->execute();

            // Return the number of affected rows
            return $this->db->rowCount();
        } catch (Exception $e) {
            // Handle the exception
            // You can log the error, show a user-friendly message, or take other appropriate actions
            echo "Error: " . $e->getMessage();
        }
    }
}

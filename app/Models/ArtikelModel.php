<?php
namespace App\Models;
use CodeIgniter\Model;
class ArtikelModel extends Model {
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_kategori','judul', 'isi', 'status', 'slug', 'gambar'];
    public function getArtikelDenganKategori() {
        return $this->db->table('artikel')
            ->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori')
            ->get()
            ->getResultArray();
    }
}

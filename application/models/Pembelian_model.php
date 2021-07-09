<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class pembelian_model extends CI_Model
{
	public function book_getAll()
	{
		$query = $this->db->query("SELECT * FROM book");
		return $query;
	}

	public function book_getAll1()
	{
		$query = $this->db->query("SELECT * FROM book INNER JOIN book_author ON book.book_id=book_author.book_id INNER JOIN author ON book_author.author_id=author.author_id");
		return $query;
	}

	public function book_getAll2()
	{
		$query = $this->db->query("SELECT * FROM book INNER JOIN book_bookcat ON book.book_id=book_bookcat.book_id INNER JOIN book_category ON book_bookcat.book_category_id=book_category.book_category_id");
		return $query;
	}

	public function book_getById($id)
	{
		$query = $this->db->query("SELECT * FROM book WHERE book_id=$id");
		return $query;
	}

	public function min_stock($qty, $book_id) 
	{ 
		$query = $this->db->query (" UPDATE book SET stock = stock - $qty WHERE book_id = $book_id"); 
		return $query; 
	}

	public function plus_stock($qty, $book_id) 
	{ 
		$query = $this->db->query ("UPDATE book SET stock = stock + $qty WHERE book_id = $book_id"); 
		return $query; 
	}

	public function invoice_no() 
	{ 
		$query = $this->db->query (" SELECT MAX(pembelian_id) as invoice_no from pembelian"); 
		if ($query->num_rows() > 0) 
		{ 
			$row = $query->row(); 
			$n = ((int) $row->invoice_no) + 1; 
			$no = sprintf("%09s", $n); 
		} else { 
			$no = sprintf("%09s", 1); 
		} 
		$kode_beli = "PMB" .$no; 
		return $kode_beli; 
	}

	public function pembelian_insert($table, $data) 
	{ 
		$query = $this->db->insert($table, $data); 
		return $query; 
	} 

	public function pembelian_last_id() 
	{ 
		$query = $this->db->query("SELECT MAX(pembelian_id) as pembelian_id FROM pembelian"); 
		return $query->row(); 
	}

	public function d_pembelian_insert($table, $data) 
	{ 
		$query = $this->db->insert($table, $data); 
		return $query; 
	}

	public function pembelian_getAll()
	{
		$query = $this->db->query("SELECT pembelian.pembelian_id, pembelian.kode_beli, supplier.supplier_id, supplier.name as supplier_name, employee.employee_id, employee.name as employee_name, pembelian.buy_date
 FROM pembelian LEFT JOIN supplier ON pembelian.supplier_id=supplier.supplier_id
 INNER JOIN employee ON pembelian.employee_id=employee.employee_id");
		return $query;
	}

	public function pembelian_getAll1()
	{
		$query = $this->db->query("SELECT * FROM d_pembelian INNER JOIN pembelian ON d_pembelian.pembelian_id=pembelian.pembelian_id");
		return $query;
	}

	public function pembelian_getById($pembelian_id)
	{
		$query = $this->db->query("SELECT * FROM pembelian where pembelian_id=$pembelian_id");
		return $query;
	}

	public function pembelian_getAll2($pembelian_id)
	{
		$query = $this->db->query("SELECT * FROM d_pembelian INNER JOIN book ON d_pembelian.book_id=book.book_id where pembelian_id=$pembelian_id");
		return $query;
	}

	public function rangeDate($start_date, $end_date)
	{
		$query = $this->db->query("SELECT pembelian.pembelian_id, pembelian.kode_beli, supplier.supplier_id, supplier.name as supplier_name, employee.employee_id, employee.name as employee_name, pembelian.buy_date
 FROM pembelian
 LEFT JOIN supplier ON pembelian.supplier_id = supplier.supplier_id
 INNER JOIN employee ON pembelian.employee_id = employee.employee_id
 WHERE pembelian.buy_date >= '$start_date' AND pembelian.buy_date <= '$end_date'");

		return $query;
	}

	public function monthChart($start_date, $end_date) // menghitung jml buku terbeli per bulan (current year)
	{
		$query = $this->db->query("SELECT pembelian.pembelian_id, d_pembelian.pembelian_id, SUM(d_pembelian.amount) as count, MONTHNAME(buy_date) as month_name, YEAR(CURDATE()) as year_num
 FROM pembelian
 INNER JOIN d_pembelian ON d_pembelian.pembelian_id = pembelian.pembelian_id
 WHERE buy_date >= '$start_date' AND buy_date <= '$end_date'
 GROUP BY YEAR(buy_date), MONTH(buy_date)");
		return $query;
	}

	public function dateChart() // menghitung jml buku terbeli per hari (current month)
	{
		$query = $this->db->query("SELECT pembelian.pembelian_id, d_pembelian.pembelian_id, SUM(d_pembelian.amount) as count, DATE_FORMAT(buy_date, '%d %M') as date_name, MONTHNAME(buy_date) as month_name, YEAR(CURDATE()) as year_num
 FROM pembelian
 INNER JOIN d_pembelian ON d_pembelian.pembelian_id = pembelian.pembelian_id
 WHERE MONTH(buy_date)=MONTH(CURDATE()) and YEAR(buy_date)=YEAR(CURDATE()) 
 GROUP BY MONTH(buy_date), DATE_FORMAT(buy_date, '%d %M')");
		return $query;
	}


}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class penjualan_model extends CI_Model
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
		$query = $this->db->query(" UPDATE book SET stock = stock - $qty WHERE book_id = $book_id");
		return $query;
	}

	public function plus_stock($qty, $book_id)
	{
		$query = $this->db->query("UPDATE book SET stock = stock + $qty WHERE book_id = $book_id");
		return $query;
	}

	public function invoice_no()
	{
		$query = $this->db->query(" SELECT MAX(penjualan_id) as invoice_no from penjualan");
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$n = ((int) $row->invoice_no) + 1;
			$no = sprintf("%09s", $n);
		} else {
			$no = sprintf("%09s", 1);
		}
		$kode_jual = "PNJ" . $no;
		return $kode_jual;
	}

	public function penjualan_insert($table, $data)
	{
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function penjualan_last_id()
	{
		$query = $this->db->query("SELECT MAX(penjualan_id) as penjualan_id FROM penjualan");
		return $query->row();
	}

	public function d_penjualan_insert($table, $data)
	{
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function penjualan_getAll()
	{
		$query = $this->db->query("SELECT penjualan.penjualan_id, penjualan.kode_jual, customer.customer_id, customer.name as customer_name, employee.employee_id, employee.name as employee_name, penjualan.sale_date
 FROM penjualan LEFT JOIN customer ON penjualan.customer_id=customer.customer_id
 INNER JOIN employee ON penjualan.employee_id=employee.employee_id");
		return $query;
	}

	public function penjualan_getAll1()
	{
		$query = $this->db->query("SELECT * FROM d_penjualan INNER JOIN penjualan ON d_penjualan.penjualan_id=penjualan.penjualan_id");
		return $query;
	}

	public function penjualan_getById($penjualan_id)
	{
		$query = $this->db->query("SELECT * FROM penjualan where penjualan_id=$penjualan_id");
		return $query;
	}

	public function penjualan_getAll2($penjualan_id)
	{
		$query = $this->db->query("SELECT * FROM d_penjualan INNER JOIN book ON d_penjualan.book_id=book.book_id where penjualan_id=$penjualan_id");
		return $query;
	}

	public function rangeDate($start_date, $end_date)
	{
		$query = $this->db->query("SELECT penjualan.penjualan_id, penjualan.kode_jual, customer.customer_id, customer.name as customer_name, employee.employee_id, employee.name as employee_name, penjualan.sale_date
 FROM penjualan
 LEFT JOIN customer ON penjualan.customer_id = customer.customer_id
 INNER JOIN employee ON penjualan.employee_id = employee.employee_id
 WHERE penjualan.sale_date >= '$start_date' AND penjualan.sale_date <= '$end_date'");

		return $query;
	}

	public function monthChart($start_date, $end_date) // menghitung jml buku terjual per bulan (current year)
	{
		$query = $this->db->query("SELECT penjualan.penjualan_id, d_penjualan.penjualan_id, SUM(d_penjualan.amount) as count, MONTHNAME(sale_date) as month_name, YEAR(CURDATE()) as year_num
 FROM penjualan
 INNER JOIN d_penjualan ON d_penjualan.penjualan_id = penjualan.penjualan_id
 WHERE sale_date >= '$start_date' AND sale_date <= '$end_date'
 GROUP BY YEAR(sale_date), MONTH(sale_date)");
		return $query;
	}

	public function dateChart() // menghitung jml buku terjual per bulan (current year)
	{
		$query = $this->db->query("SELECT penjualan.penjualan_id, d_penjualan.penjualan_id, SUM(d_penjualan.amount) as count, DATE_FORMAT(sale_date, '%d %M') as date_name, MONTHNAME(sale_date) as month_name, YEAR(CURDATE()) as year_num
 FROM penjualan
 INNER JOIN d_penjualan ON d_penjualan.penjualan_id = penjualan.penjualan_id
 WHERE MONTH(sale_date)=MONTH(now()) and YEAR(sale_date)=YEAR(now()) 
 GROUP BY MONTH(sale_date), DATE_FORMAT(sale_date, '%d %M')");
		return $query;
	}
}

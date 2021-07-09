<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class penjualan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		#Load model, helper dan library
		$this->load->model('penjualan_model');
		$this->load->model('level_model');
		$this->load->model('customer_model');
	}
	public function index()
	{
		if ($this->session->userdata('employee_id') != NULL) {
			$id = $this->session->userdata('level_id');
			$data = array(
				'kode_jual' => $this->penjualan_model->invoice_no(),
				'total' => $this->show_total(),
				'user_level' => $this->level_model->level_getById($id)->row(),
				'book' => $this->penjualan_model->book_getAll(),
				'book1' => $this->penjualan_model->book_getAll1(),
				'book2' => $this->penjualan_model->book_getAll2(),
				'customer' => $this->customer_model->customer_getAll(),
			);
			$this->load->view('admin/penjualan/v_penjualan.php', $data);
		} else {
			echo '<script language=JavaScript>alert("Anda Belum Login, Silahkan Login"); onclick=location.href = "../auth"</script>';
		}
	}

	function add_to_cart()
	{
		$data = array(
			'id' => $this->input->post('product_id'),
			'name' => $this->input->post('product_name'),
			'price' => $this->input->post('product_price'),
			'qty' => $this->input->post('quantity'),
			'discount' => $this->input->post('product_discount'),
			'status' => 1
		);
		$insert = $this->cart->insert($data);
		$book_id = $this->input->post('product_id');
		$qty = $this->input->post('quantity');
		if ($insert == TRUE) {
			$this->penjualan_model->min_stock($qty, $book_id);
		} else {
			echo '<script language=JavaScript>alert("Fail add to cart") 
			</script>';
		}
	}

	function show_cart()
	{
		$output = '';
		$no = 0;
		$x = 0;
		foreach ($this->cart->contents() as $items) {
			if (number_format($items['status']) == 1) {
				$no++;
				$output .= ' <tr> 
				<td>' . number_format($items['id']) . '</td> 
				<td>' . $items['name'] . '</td> 
				<td>' . number_format($items['price']) . '</td> 
				<td>' . number_format($items['qty']) . '</td> 
				<td>' . number_format($items['discount']) . '%</td> 
				<td>' . number_format($items['subtotal']) . '</td> 
				<td> <button type="button" id="' . $items['rowid'] . '" class="remove_cart btn btn-danger btn-sm">Cancel</button></td> </tr>';
			} else {
				$x++;
			}
		}
		if ($no == 0 && $x == 0) {
			$output .= ' 
			<tr> 
			<td colspan="7" class="text-center">Tidak ada Item</td> 
			</tr>';
		} else if ($no != 0 && $x == 0) {
			$output .= ' 
			<tr> 
			<th colspan="5">Total</th> 
			<th colspan="1">' . 'Rp ' . number_format($this->cart->total()) . '</th> 
			</tr>';
		} else if ($no == 0 && $x != 0) {
			echo '<script language=JavaScript>alert("Library Cart masih digunakan di Pembelian. Tekan `Cancel` pada bagian bawah halaman Pembelian. "); 
			onclick=location.href="pembelian"</script>';
		}
		return $output;
	}

	function load_cart()
	{
		echo $this->show_cart();
	}

	function delete_cart()
	{
		$row_id = $this->input->post('row_id');
		foreach ($this->cart->contents() as $items) {
			$row_id1 = $items['rowid'];
			$book_id = $items['id'];
			$qty = $items['qty'];
			if ($row_id == $row_id1) {
				$this->penjualan_model->plus_stock($qty, $book_id);
				$data = array(
					'rowid' => $this->input->post('row_id'),
					'qty' => 0,
				);
				$this->cart->update($data);
			}
		}
		echo $this->show_cart();
	}

	function show_total()
	{
		if (number_format($this->cart->total()) > 0) {
			$output1 = number_format($this->cart->total());
		} else {
			$output1 = 0;
		}
		return $output1;
	}

	function clear_cart()
	{
		foreach ($this->cart->contents() as $items) {
			$book_id = $items['id'];
			$qty = $items['qty'];
			$this->penjualan_model->plus_stock($qty, $book_id);
		}
		echo $this->cart->destroy();
		echo '<script language=JavaScript>alert("Transaksi Dibatalkan"); onclick=location.href = document.referrer</script>';
	}

	public function add_penjualan()
	{
		$kode_jual = $this->input->post('kode_jual');
		date_default_timezone_set('Asia/Jakarta');
		$sale_date = date("Y-m-d H:i:s");
		$member = $this->input->post('customer');
		$data = array(
			'kode_jual' => $kode_jual,
			'employee_id' => $this->session->userdata('employee_id'),
			'sale_date' => $sale_date,
			'customer_id' => $member
		);
		$this->penjualan_model->penjualan_insert('penjualan', $data);
		foreach ($this->cart->contents() as $items) {
			$book_id = number_format($items['id']);
			$qty = number_format($items['qty']);
			$sub_total = $items['subtotal'];
			$status = $items['status'];
			if ($status == 1) {
				// Input Array
				$data = array(
					'book_id' => $book_id,
					'amount' => $qty,
					'penjualan_id' => $this->penjualan_model->penjualan_last_id()->penjualan_id,
					'total_price' => $sub_total
				);
				$this->penjualan_model->d_penjualan_insert('d_penjualan', $data);
			}
		}
		$this->cart->destroy();
		echo '<script language=JavaScript>alert("Payment Berhasil"); onclick=location.reload()</script>';
	}

	public function list_penjualan()
	{
		if ($this->session->userdata('employee_id') != Null) {
			$id = $this->session->userdata('level_id');
			$data = array(
				'user_level' => $this->level_model->level_getById($id)->row(),
				'penjualan' => $this->penjualan_model->penjualan_getAll(),
				'penjualan1' => $this->penjualan_model->penjualan_getAll1(),
			);
			$this->load->view('admin/penjualan/v_laporan', $data);
		} else {
			echo '<script language=JavaScript>alert("Anda Belum Login, Silahkan Login"); onclick=location.href="../auth"</script>';
		}
	}

	public function pdf()
	{
		$this->load->library('dompdf_gen');
		$data = array(
			'penjualan1' => $this->penjualan_model->penjualan_getAll(),
			'penjualan2' => $this->penjualan_model->penjualan_getAll1(),
		);
		$this->load->view('admin/penjualan/v_laporan_pdf', $data);
		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream(
			"Laporan_Penjualan.pdf",
			array('Attachment' => 0)
		);
	}

	public function detail_penjualan($penjualan_id)
	{
		$data = array(
			'penjualan3' =>
			$this->penjualan_model->penjualan_getAll2($penjualan_id),
		);
		$this->load->view('admin/penjualan/v_detail', $data);
	}

	public function chart()
	{
		if ($this->session->userdata('employee_id') != Null) {
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			$record = $this->penjualan_model->monthChart($start_date, $end_date)->result();
			$data = [];
			$data['label_tahun'] = "-";
			foreach ($record as $row) {
				$data['label_bulan'][] = $row->month_name;
				$data['label_tahun'] = $row->year_num;
				$data['data_jml'][] = (int) $row->count;
			}
			$data1 = [];
			$data1['label_bulan'] = "-";
			$record = $this->penjualan_model->dateChart()->result();
			foreach ($record as $row) {
				$data1['label_tanggal'][] = $row->date_name;
				$data1['label_tahun'] = $row->year_num;
				$data1['label_bulan'] = $row->month_name;
				$data1['data_jml1'][] = (int) $row->count;
			}
			$data2 = array(
				'find_date' => $this->penjualan_model->rangeDate($start_date, $end_date),
				'penjualan1' => $this->penjualan_model->penjualan_getAll1(),
				'chart_data' => json_encode($data), // Mengkonversi datadata dalam variabel $data menjadi objek JSON
				'chart_data1' => json_encode($data1),
			);
			$this->load->view('admin/penjualan/v_chart', $data2);
			// Load v_chart.php dengan membawa data array $data2
		} else {

			echo '<script language=JavaScript>alert("Anda Belum Login, Silahkan Login"); onclick=location.href="../auth"</script>';
		}
	}
}

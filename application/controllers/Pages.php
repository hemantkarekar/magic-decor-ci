<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('pages/index');
	}

	public function assignment($number)
	{
		$this->load->model("Functions_model");
		switch ($number) {
			case '2':
				echo "<h1>Sort Array in Ascending Order</h1>";


				$arr = array(23, 33, 2, 45, 23, 4, 8, 12);

				# With Bult in Function
				echo "<p>Descending Sort With Built in Function:</p>";
				$result1 = $this->Functions_model->sort_array($arr, 'DESC');
				print_r($result1);

				# With Loop
				echo "<p>Ascending Sort Without Built in Function:</p>";
				$result2 = $this->Functions_model->sort_array($arr, 'ASC', true);
				print_r($result2);
				# code...
				break;

			case '3':
				# code...
				$ch = curl_init();

				curl_setopt($ch, CURLOPT_URL, 'https://api.ximilar.com/dom_colors/generic/v2/dominantcolor');
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"color_names\": true, \"records\":[{\"_url\":\"https://magicdecor.com/wp-content/uploads/2023/02/image-1680791000-822.jpg\"}]}");

				$headers = array();
				$headers[] = 'Content-Type: application/json';
				$headers[] = 'Authorization: Token 6a66c6c5f5af5d6fd577664f01944bd76511c44e';
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

				$result = curl_exec($ch);
				if (curl_errno($ch)) {
					echo 'Error: ' . curl_error($ch); // Display the cURL error message
				}
				curl_close($ch);
				echo "<pre>";
				print_r(json_decode($result)->records[0]->_dominant_colors->rgb_hex_colors);
				break;
			case '4':
				$inputHexColor = 'FFFFFF';
				$closestMatch = $this->Functions_model->closest_color($inputHexColor);
				echo "Closest match: " . $closestMatch;
				break;
			case '5':
				echo "<h1>Convert inches to ft inches</h1>";
				$result = $this->Functions_model->inch_to_ft(62);
				print_r($result);
				break;

			case '6':
				$jpgPath = 'https://magicdecor.com/wp-content/uploads/2023/02/image-1680791000-822.jpg';
				$jpgPath = 'https://magicdecor.com/wp-content/uploads/2023/02/image-1683789598-5898.jpg';
				$pngPath = 'https://magicdecor.com/wp-content/themes/magicwall/assets/images/mockup/mockup-2.png';
				$outputPath = FCPATH . 'output.jpg';

				$this->Functions_model->set_background($jpgPath, $pngPath, $outputPath);

				echo "Background Added Successfully and final Result Saved at - " . base_url('output.jpg');

				break;

			default:
				# code...
				break;
		}
	}
}

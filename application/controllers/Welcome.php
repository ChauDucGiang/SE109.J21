<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		
	}

	public function admin()
	{
		$allTP = $this->Home_model->getAll();
		// print_r($allTP);die;
		$data = array(
			'allTP' => $allTP );
		$this->load->view('input', $data, false);
		
	}
	public function addContent(){
		$matp  =  $this->input->post('tp');
		$content  =  $this->input->post('editor');
		$data = array(
			'content' => $content, 
		);
		if($this->Home_model->updateTp($matp, $data)){
			
			redirect('/admin');
			
		}
	}

	public function index()
	{
		$allTP = $this->Home_model->getAll();
		$detail = $this->Home_model->getTpById('01');
		// $content = json_decode(file_get_contents("https://api.openweathermap.org/data/2.5/forecast?q=Hanoi,vn&units=metric&appid=f1961c3c62f144979cf28e1fc0d43daf"), true);
		$content = json_decode(file_get_contents("https://weather.cit.api.here.com/weather/1.0/report.json?product=forecast_7days_simple&name=ho+chi+minh&app_id=DemoAppId01082013GAL&app_code=AJKnXv84fjrb0KIHawS0Tg"), true);
		$hourly = json_decode(file_get_contents("https://weather.cit.api.here.com/weather/1.0/report.json?product=forecast_hourly&name=ho+cchi+minh&app_id=DemoAppId01082013GAL&app_code=AJKnXv84fjrb0KIHawS0Tg"), true);
		$Hanoi = json_decode(file_get_contents("https://weather.cit.api.here.com/weather/1.0/report.json?product=observation&name=Hanoi&oneobservation=true&app_id=DemoAppId01082013GAL&app_code=AJKnXv84fjrb0KIHawS0Tg"), true);
		$Danang = json_decode(file_get_contents("https://weather.cit.api.here.com/weather/1.0/report.json?product=observation&name=Danang&oneobservation=true&app_id=DemoAppId01082013GAL&app_code=AJKnXv84fjrb0KIHawS0Tg"), true);
		$Hue = json_decode(file_get_contents("https://weather.cit.api.here.com/weather/1.0/report.json?product=observation&name=Hue&oneobservation=true&app_id=DemoAppId01082013GAL&app_code=AJKnXv84fjrb0KIHawS0Tg"), true);
		$Hochiminh = json_decode(file_get_contents("https://weather.cit.api.here.com/weather/1.0/report.json?product=observation&name=ho+chi+minh&oneobservation=true&app_id=DemoAppId01082013GAL&app_code=AJKnXv84fjrb0KIHawS0Tg"), true);
		$Gialai = json_decode(file_get_contents("https://weather.cit.api.here.com/weather/1.0/report.json?product=observation&name=gia+lai&oneobservation=true&app_id=DemoAppId01082013GAL&app_code=AJKnXv84fjrb0KIHawS0Tg"), true);
		$Camau = json_decode(file_get_contents("https://weather.cit.api.here.com/weather/1.0/report.json?product=observation&name=ca+mau&oneobservation=true&app_id=DemoAppId01082013GAL&app_code=AJKnXv84fjrb0KIHawS0Tg"), true);

		// print_r($content);die;
		$data = array(
		 'content' => $content,
		 'allTP' => $allTP,
		 'detail' => $detail['0']['content'],
		 'Hanoi' => $Hanoi['observations']['location'][0],
		 'Danang' => $Danang['observations']['location'][0],
		 'Hue' => $Hue['observations']['location'][0],
		 'Hochiminh' => $Hochiminh['observations']['location'][0],
		 'Gialai' => $Gialai['observations']['location'][0],
		 'Camau' => $Camau['observations']['location'][0],
		 'hourly' => $hourly['hourlyForecasts']['forecastLocation']['forecast'],
		);
		// print_r($data);
		$this->load->view('welcome_message', $data, false);
	}
	public function search()
	{
		$allTP = $this->Home_model->getAll();
		$key =  $this->input->get('q');
		$detail = $this->Home_model->getTpByName($key);
		$string  = trim(str_replace(array('Tỉnh', 'Thành phố '),'',$key));
		$result = $this->vn_to_str($string);

		// echo $result;die;
		// $content = json_decode(file_get_contents("https://api.openweathermap.org/data/2.5/forecast?q=Hanoi,vn&units=metric&appid=f1961c3c62f144979cf28e1fc0d43daf"), true);
		$content = json_decode(file_get_contents("https://weather.cit.api.here.com/weather/1.0/report.json?product=forecast_7days_simple&name=".$result."&app_id=DemoAppId01082013GAL&app_code=AJKnXv84fjrb0KIHawS0Tg"), true);
		$hourly = json_decode(file_get_contents("https://weather.cit.api.here.com/weather/1.0/report.json?product=forecast_hourly&name=".$result."&app_id=DemoAppId01082013GAL&app_code=AJKnXv84fjrb0KIHawS0Tg"), true);
		$Hanoi = json_decode(file_get_contents("https://weather.cit.api.here.com/weather/1.0/report.json?product=observation&name=Hanoi&oneobservation=true&app_id=DemoAppId01082013GAL&app_code=AJKnXv84fjrb0KIHawS0Tg"), true);
		$Danang = json_decode(file_get_contents("https://weather.cit.api.here.com/weather/1.0/report.json?product=observation&name=Danang&oneobservation=true&app_id=DemoAppId01082013GAL&app_code=AJKnXv84fjrb0KIHawS0Tg"), true);
		$Hue = json_decode(file_get_contents("https://weather.cit.api.here.com/weather/1.0/report.json?product=observation&name=Hue&oneobservation=true&app_id=DemoAppId01082013GAL&app_code=AJKnXv84fjrb0KIHawS0Tg"), true);
		$Hochiminh = json_decode(file_get_contents("https://weather.cit.api.here.com/weather/1.0/report.json?product=observation&name=ho+chi+minh&oneobservation=true&app_id=DemoAppId01082013GAL&app_code=AJKnXv84fjrb0KIHawS0Tg"), true);
		$Gialai = json_decode(file_get_contents("https://weather.cit.api.here.com/weather/1.0/report.json?product=observation&name=gia+lai&oneobservation=true&app_id=DemoAppId01082013GAL&app_code=AJKnXv84fjrb0KIHawS0Tg"), true);
		$Camau = json_decode(file_get_contents("https://weather.cit.api.here.com/weather/1.0/report.json?product=observation&name=ca+mau&oneobservation=true&app_id=DemoAppId01082013GAL&app_code=AJKnXv84fjrb0KIHawS0Tg"), true);

		// print_r($content);die;
		$data = array(
		 'content' => $content,
		 'detail' => $detail['0']['content'],
		 'allTP' => $allTP,
		 'Hanoi' => $Hanoi['observations']['location'][0],
		 'Danang' => $Danang['observations']['location'][0],
		 'Hue' => $Hue['observations']['location'][0],
		 'Hochiminh' => $Hochiminh['observations']['location'][0],
		 'Gialai' => $Gialai['observations']['location'][0],
		 'Camau' => $Camau['observations']['location'][0],
		 'hourly' => $hourly['hourlyForecasts']['forecastLocation']['forecast'],
		);
		// print_r($data);
		$this->load->view('welcome_message', $data, false);
	}
	function vn_to_str($str)
	{

		$unicode = array(

		'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

		'd' => 'đ',

		'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

		'i' => 'í|ì|ỉ|ĩ|ị',

		'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

		'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

		'y' => 'ý|ỳ|ỷ|ỹ|ỵ',

		'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

		'D' => 'Đ',

		'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

		'I' => 'Í|Ì|Ỉ|Ĩ|Ị',

		'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

		'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

		'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

		);

		foreach ($unicode as $nonUnicode => $uni)
		{

			$str = preg_replace("/($uni)/i", $nonUnicode, $str);

		}
		$str = str_replace(' ', '+', $str);

		return $str;

	}
	public function autocomplete(){
		$key =  $this->input->post('query');
		$result =  $this->Home_model->getLike($key);
		$output ='<ul class="list" >';
		if(!empty($result)){
			foreach ($result as $key => $value) {
				$output  .= '<li>'.$value['name'].'</li>'; 
			}
		}else{
			// $output  .= '<li>'.$value['name'].'li'; 
		}
		$output .= '</ul>';
		echo $output;
	}
}
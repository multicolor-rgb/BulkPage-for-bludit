<?php

class BulkPage extends Plugin
{

	public function adminController()
	{



		// Check if the form was sent
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			set_time_limit(0);
			$list = explode(",", $_POST['list']);
			$removedDuplicate = array_unique($list);


			if ($_POST['option'] == 'pages') {

				foreach ($removedDuplicate  as $key => $value) {
					$arg = [];

					if ($value[0] == ' ') {
						$arg['title'] = substr($value, 0);
					} else {
						$arg['title'] =  $value;
					};

					if ($value == '') {
						$arg['title'] = 'no-title';
					};




					if (@$_POST['autotags'] !== 'true') {
						$arg['tags'] = $_POST['tags'];
					} else {
						$arrayFromTitle = explode(' ', $value);
						$arg['tags'] = implode(',', $arrayFromTitle);
					};

					$arg['content'] = $_POST['content'];
					$arg['type'] = $_POST['type'];
					$arg['parent'] = $_POST['parents'];
					$arg['category'] = $_POST['categories'];

					global $pages;


					$titleList = array();

					foreach ($pages->db as $key => $value) {
						array_push($titleList, $value['title']);
					};



					if (in_array($arg['title'], $titleList)) {
						echo '<div class="alert alpage alert-danger">Page with title ' . $arg['title'] . ' exist!</div>';
					} elseif ($arg['title'] == 'no-title') {
						echo '<div class="alert alpage alert-danger">Page empty!</div>';
					} else {
						createPage($arg);

						Alert::set('Pages added', ALERT_STATUS_OK);
					};


					echo '<script>
					
					setTimeout(()=>{

					if(document.querySelector(".alpage")!==null){

					document.querySelectorAll(".alpage").forEach(x=>{
					x.classList.add("d-none");
					})
				
					};

				},1500);
					
					</script>';
				};
			};


			if ($_POST['option'] == 'categories') {
				foreach ($list as $key => $value) {
					$arg = [];
					$arg['name'] = $value;
					createCategory($arg);
				};
			};
		}
	}

	public function adminView()
	{
		// Token for send forms in Bludit
		global $security;
		$tokenCSRF = $security->getTokenCSRF();

		// Current site title
		global $site;
		$title = $site->title();

		include($this->phpPath() . 'PHP/options.inc.php');
	}

	public function adminSidebar()
	{
		$pluginName = Text::lowercase(__CLASS__);
		$url = HTML_PATH_ADMIN_ROOT . 'plugin/' . $pluginName;
		$url2 = HTML_PATH_ADMIN_ROOT . 'plugin/' . $pluginName . '?&content';
		$html = '<a id="current-version" class="nav-link" href="' . $url . '">✔️BulkPage settings</a>';
		return $html;
	}


	public function adminBodyEnd()
	{
		include $this->phpPath() . 'PHP/script.php';
	}
}

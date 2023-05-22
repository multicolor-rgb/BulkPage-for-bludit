<?php

class BulkPage extends Plugin
{

	public function adminController()
	{



		// Check if the form was sent
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$list = explode(",", $_POST['list']);


			if ($_POST['option'] == 'pages') {
				foreach ($list as $key => $value) {
					$arg = [];
					$arg['title'] = $value;
					$arg['tags'] = $_POST['tags'];
					$arg['content'] = $_POST['content'];
					$arg['type'] = $_POST['type'];
					$arg['parent'] = $_POST['parents'];
					createPage($arg);
				};

				Alert::set('Pages added', ALERT_STATUS_OK);
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
		$html = '<a id="current-version" class="nav-link" href="' . $url . '">✔️BulkPage settings</a>';
		return $html;
	}
}

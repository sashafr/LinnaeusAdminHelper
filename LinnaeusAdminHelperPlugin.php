<?php

include dirname(__FILE__) . '/helpers.php';

class LinnaeusAdminHelperPlugin extends Omeka_Plugin_AbstractPlugin
{

    protected $_hooks = array(
    	'install',
    	'admin_head',
    	'admin_footer',
    	'uninstall',
    	);

	public function hookAdminHead(){

		// header scripts: admin styles
		require dirname(__FILE__) . '/functions/admin_head.php';

	}

	public function hookAdminFooter(){

		// footer scripts: admin dashboard enhancements
		require dirname(__FILE__) . '/functions/admin_footer.php';

	}

    public function hookInstall(){

		// install scripts: plugin options
		$this->_installOptions();

		// install scripts: create custom item type and elements
		require dirname(__FILE__) . '/functions/install.php';

	}

    public function hookUninstall(){

	    $this->_uninstallOptions();

    }
}

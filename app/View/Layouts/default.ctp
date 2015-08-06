<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<?php echo $this->Html->charset(); ?>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('stylesheet');
		echo $this->Html->css('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
		echo $this->Html->css('//fonts.googleapis.com/css?family=Montserrat:400,700');
	?>
</head>
<body>
	<?php echo $this->element('navbar'); ?>
	<div class="container-fluid">
		<?php echo $this->element('header'); ?>
		<?php echo $this->fetch('content'); ?>
		<?php echo $this->element('footer'); ?>
		<?php echo $this->element('lazy-loading'); ?>
	</div>
</body>
</html>

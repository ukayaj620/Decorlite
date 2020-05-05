<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter PDF Library
 *
 * Generate PDF in CodeIgniter applications.
 *
 * @package            CodeIgniter
 * @subpackage        Libraries
 * @category        Libraries
 * @author            CodexWorld
 * @license            https://www.codexworld.com/license/
 * @link            https://www.codexworld.com
 */

// reference the Dompdf namespace
use Dompdf\Dompdf;

class PDFGenerator
{
	public function generate($html) {
		$dompdf = new DOMPDF();
		$dompdf->loadHtml($html);
		$dompdf->render();
		$dompdf->stream("history.pdf", array("Attachment" => 0));
	}
}


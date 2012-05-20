<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function pdf_create($html, $filename, $stream=TRUE) {

	require_once(APPPATH.'helpers/mpdf/mpdf.php');

	$CI =& get_instance();

    $mpdf = new mPDF('',    // mode - default ''
 			'A4',    // format - A4, for example, default ''
			0,     // font size - default 0
			'',    // default font family
			0,    // margin_left
			0,    // margin right
			0,     // margin top
			0,    // margin bottom
			9,     // margin header
			9,     // margin footer
			'L'  // L - landscape, P - portrait
    );

    $mpdf->SetAutoFont();

    $mpdf->WriteHTML($html);

	if ($stream) {

		$mpdf->Output($filename, 'I');

	}

	else {

		$mpdf->Output('./uploads/temp/' . $filename . '.pdf', 'F');

	}

}

?>
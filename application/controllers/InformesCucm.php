<?php 

class InformesCucm extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['page_title'] = 'Informes CUCM';
		$this->db_bd = $this->load->database('tercero', true);
		// $this->load->model('model_users');
		$this->load->model('model_informesCucm');
	}

	
	public function index()
	{
		if(!in_array('viewInformeCucm', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$informe_data = $this->model_informesCucm->getDataInformesActivos();
		$result = array();
		foreach ($informe_data as $k => $v) {
			$result[$k]['user_info'] = $v;
		}
		$this->data['informe_data'] = $result;
		$this->render_template('informesCucm/index', $this->data);
	}

    public function EnviarCostos($id)
	{
		$datos=$this->model_informesCucm->Interesado($id)->result();
		$niveles = explode(",", $datos[0]->nivelE);
		
		$this->load->library('email');
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		$this->email->initialize($config);
		$this->email->to($datos[0]->email, $datos[0]->nombreT);
		$this->email->from("asistentedireccionprim@colegiomexicodelsureste.edu.mx", "Colegio México del Sureste");
		$this->email->bcc('informaticacolmex18@gmail.com', 'Copia registro Colmex');
		$this->email->cc('asistentedireccionprim@colegiomexicodelsureste.edu.mx, subdirectoradeartesfinaseinnovacion@colegiomexicodelsureste.edu.mx', 'Copia registro Colmex');
		$this->email->subject("Información de costos colegiaturas");
		$telefono="";
		$tel_preescolar="";
		$tel_primaria="";
		$tel_secprep="";
		foreach ($niveles as $value) {			
			if(preg_match("/Preescolar/i",$value) ){
				echo $value."<br>";
				$this->email->attach('http://colegiomexicodelsureste.edu.mx/publico/images/R_costos/InfoCorreo/Pre20-21.pdf', 'attachment', 'Preescolar 2020-2021.pdf');
				$tel_preescolar="Preescolar 9932799698";
			}
			if(preg_match("/Primaria/i",$value) ){
				echo $value."<br>";
				$this->email->attach('http://colegiomexicodelsureste.edu.mx/publico/images/R_costos/InfoCorreo/prim20-21.pdf', 'attachment', 'Primaria 2020-2021.pdf');
				$tel_primaria="Primaria 9932637498";
			}
			if(preg_match("/Secundaria/i",$value) ){
				echo $value."<br>";
				$this->email->attach('http://colegiomexicodelsureste.edu.mx/publico/images/R_costos/InfoCorreo/sec20-21.pdf', 'attachment', 'Secundaria 2020-2021.pdf');
				$tel_secprep="Secundaria 9934366898";
			}
			if(preg_match("/Preparatoria/i",$value) ){
				echo $value."<br>";
				$this->email->attach('http://colegiomexicodelsureste.edu.mx/publico/images/R_costos/InfoCorreo/prep20-21.pdf', 'attachment', 'Preparatoria 2020-2021.pdf');
				$tel_secprep="Preparatoria 9934366898";
			}
		}
		$telefono= $tel_preescolar." ".$tel_primaria." ".$tel_secprep;
		$nombreTutor= $datos[0]->nombreT;
		$nombreTutor2= $datos[0]->nombreT2;
		$html=<<<EOD

		<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "https://www.w3.org/TR/html4/strict.dtd">
		<html lang="es-419"><head><meta http-equiv=Content-Type content="text/html; charset=UTF-8">
			<style type="text/css" nonce="+CyingdxdLy3sbqnVi/K7g">
			body,td,div,p,a,input {font-family: arial, sans-serif;}
			</style>
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<link rel="shortcut icon" href="https://ssl.gstatic.com/ui/v1/icons/mail/rfr/gmail.ico" type="image/x-icon">
			<style type="text/css" nonce="+CyingdxdLy3sbqnVi/K7g">
				body, td {font-size:13px} a:link, a:active {color:#1155CC; text-decoration:none} a:hover {text-decoration:underline; cursor: pointer} a:visited{color:##6611CC} img{border:0px} pre { white-space: pre; white-space: -moz-pre-wrap; white-space: -o-pre-wrap; white-space: pre-wrap; word-wrap: break-word; max-width: 800px; overflow: auto;} .logo { left: -7px; position: relative; }
			</style>
			<body>
				<table width="100%" cellpadding="12" cellspacing="0" border="0"><tbody><tr><td><div style="overflow: hidden;"><font size="-1"><u></u>
					<div style="height:100%;margin:0;padding:0;width:100%">
					<center>
					<table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="m_-238509726181642872bodyTable" style="border-collapse:collapse;height:100%;margin:0;padding:0;width:100%">
					<tbody><tr>
					<td align="center" valign="top" id="m_-238509726181642872bodyCell" style="height:100%;margin:0;padding:0;width:100%">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
					<tbody><tr>
					<td align="center" valign="top" id="m_-238509726181642872templateHeader" style="background:#122d70 none no-repeat 50% 50%/cover;background-color:#122d70;background-image:none;background-repeat:no-repeat;background-position:50% 50%;background-size:cover;border-top:0;border-bottom:0;padding-top:0px;padding-bottom:0px">
					<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-238509726181642872templateContainer" style="border-collapse:collapse;max-width:600px!important">
					<tbody><tr>
					<td valign="top" class="m_-238509726181642872headerContainer" style="background:transparent none no-repeat center/cover;background-color:transparent;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top:0;border-bottom:0;padding-top:0;padding-bottom:0"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
					<tbody>
					<tr>
					<td valign="top" style="padding:0px">
					<table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" style="min-width:100%;border-collapse:collapse">
					<tbody><tr>
					<td valign="top" style="padding-right:0px;padding-left:0px;padding-top:0;padding-bottom:0;text-align:center">
					<img align="center" alt="" src="https://ci5.googleusercontent.com/proxy/hDikTINvguFf2Gm483lRHF0yExmQJ0lMr6-kxMdqKyrcnpcoCzAu4KH3FKqP30dbAw66-Rd2KUWMmVXrrjJlVLB3TBylhNoEY3UzU0gY2Whlo_cvL_SUstb9S7KgLR3cfueK2cG_DDXYGOLk0CNGM04eFSJROA=s0-d-e1-ft#https://mcusercontent.com/f3c37015aa32fe9f8cab4fe75/images/3cc2daa6-6d29-4417-b72d-83168227fbb9.png" width="600" style="max-width:1080px;padding-bottom:0;display:inline!important;vertical-align:bottom;border:0;height:auto;outline:none;text-decoration:none" class="m_-238509726181642872mcnImage">
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
					<tbody>
					<tr>
					<td valign="top" style="padding-top:9px">
					<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;border-collapse:collapse" width="100%" class="m_-238509726181642872mcnTextContentContainer">
					<tbody><tr>
					<td valign="top" class="m_-238509726181642872mcnTextContent" style="padding-top:0;padding-right:18px;padding-bottom:9px;padding-left:18px;word-break:break-word;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left">
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table></td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					<tr>
					<td align="center" valign="top" id="m_-238509726181642872templateBody" style="background:#ebecec none no-repeat 50% 50%/cover;background-color:#ebecec;background-image:none;background-repeat:no-repeat;background-position:50% 50%;background-size:cover;border-top:0;border-bottom:0;padding-top:13px;padding-bottom:13px">
					<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-238509726181642872templateContainer" style="border-collapse:collapse;max-width:600px!important">
					<tbody><tr>
					<td valign="top" class="m_-238509726181642872bodyContainer" style="background:transparent none no-repeat center/cover;background-color:transparent;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top:0;border-bottom:0;padding-top:0;padding-bottom:0"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
					<tbody>
					<tr>
					<td valign="top" style="padding:0px">
					<table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" style="min-width:100%;border-collapse:collapse">
					<tbody><tr>
					<td valign="top" style="padding-right:0px;padding-left:0px;padding-top:0;padding-bottom:0;text-align:center">
					<img align="center" alt="" src="https://ci3.googleusercontent.com/proxy/WmCDDsV3U58KqhAkIuv2vMvIlwCn-5rWje4fCt_Y1yxqzFiyZNlQbtdoBlu2h2P3cy1Ri-TXS_oCA2ASfOp7e3i2O2G5qWQ-cImE2PZWw5-cThxcBTEkmhzd8Z3rcsGO7KmS1QAUHRLOjWhwNLcndUFqHpov1A=s0-d-e1-ft#https://mcusercontent.com/f3c37015aa32fe9f8cab4fe75/images/78b797a1-208f-4651-bc54-7891f83f901f.png" width="600" style="max-width:2071px;padding-bottom:0px;vertical-align:bottom;display:inline!important;border-radius:0%;border:0;height:auto;outline:none;text-decoration:none" class="m_-238509726181642872mcnImage">
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
					<tbody>
					<tr>
					<td valign="top" style="padding-top:9px">
					<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;border-collapse:collapse" width="100%" class="m_-238509726181642872mcnTextContentContainer">
					<tbody><tr>
					<td valign="top" class="m_-238509726181642872mcnTextContent" style="padding-top:0;padding-right:18px;padding-bottom:9px;padding-left:18px;word-break:break-word;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left">
					<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
					<tbody>
					<tr>
					<td valign="top">
					<div style="text-align:center"><span style="font-size:18px"><strong><font color="#0000ff">BIENVENIDO(S) $nombreTutor / $nombreTutor2</font></strong></span></div>
					<div style="text-align:center"><strong><font color="#0000ff">Horarios de atención dentro de las instalaciones</font></strong><br>
					<strong><font color="#0000ff"> de 08:00 a.m. a 03:00 p.m.</font></strong></div>
					</td>
					</tr>
					</tbody>
					</table>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
					<tbody>
					<tr>
					<td valign="top" style="padding-top:9px;padding-right:18px;padding-bottom:9px;padding-left:18px">
					<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#002058;border-collapse:collapse">
					<tbody><tr>
					<td class="m_-238509726181642872mcnImageCardBottomImageContent" align="left" valign="top" style="padding-top:0px;padding-right:0px;padding-bottom:0;padding-left:0px">
					<img alt="" src="https://ci5.googleusercontent.com/proxy/FWrMHgb4WarkaMhqeAcCG7B2-8AQMEEb6BclkTun9RKRJpj4mJI0gFC0sgYe0sZ71O0wwrn1xGs2fRpKALJbZwNTslf1Fz-k0cJZLC-_uglKbuhPozvYdzYyEUGbQhqgPwQQz0oCMdchf5Hkxti_FkB2j-UhLEI=s0-d-e1-ft#https://mcusercontent.com/f3c37015aa32fe9f8cab4fe75/images/1b4f97f0-f2f6-49ca-95c7-2d38fd96e8ab.jpeg" width="564" style="max-width:1280px;border:0;height:auto;outline:none;text-decoration:none;vertical-align:bottom" class="m_-238509726181642872mcnImage">
					</td>
					</tr>
					<tr>
					<td class="m_-238509726181642872mcnTextContent" valign="top" style="padding:9px 18px;color:#f2f2f2;font-family:Helvetica;font-size:14px;font-weight:normal;text-align:center;word-break:break-word;line-height:150%" width="546">
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
					<tbody>
					<tr>
					<td valign="top" style="padding-top:9px;padding-right:18px;padding-bottom:9px;padding-left:18px">
					<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#002058;border-collapse:collapse">
					<tbody><tr>
					<td class="m_-238509726181642872mcnImageCardBottomImageContent" align="left" valign="top" style="padding-top:0px;padding-right:0px;padding-bottom:0;padding-left:0px">
					<img alt="" src="https://ci3.googleusercontent.com/proxy/lb_TaGXnWNApZP69I3GBdy3mOOOGPQ9OvFDLpRojGAAcbRZYWy8IOZCLYaTP61z1QWBpmQ9vVUf1GSv2tB-4YeRIT4jR4c6rVjKLDhn5m9N3oaGba6xgw4e3jnrvnfMTapLHKm-II_qPs-UJ-lBCBTmGGU9uRw=s0-d-e1-ft#https://mcusercontent.com/f3c37015aa32fe9f8cab4fe75/images/41116a70-9ea4-4712-a803-7118d92c7ee8.png" width="564" style="max-width:1280px;border:0;height:auto;outline:none;text-decoration:none;vertical-align:bottom" class="m_-238509726181642872mcnImage">
					</td>
					</tr>
					<tr>
					<td class="m_-238509726181642872mcnTextContent" valign="top" style="padding:9px 18px;color:#f2f2f2;font-family:Helvetica;font-size:14px;font-weight:normal;text-align:center;word-break:break-word;line-height:150%" width="546">
					<span style="color:#ffff00"><span style="font-family:lato,helvetica neue,helvetica,arial,sans-serif"><strong><span style="font-size:18px"><em><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit">A la altura académica de las mejores escuelas del país. </font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></em></span></strong></span></span>
					<div style="text-align:justify"><em><span style="font-size:18px"><span style="font-family:lato,helvetica neue,helvetica,arial,sans-serif"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit">Asegura la mejor herencia que les traerá felicidad y éxito a tus hijos para que puedan enfrentar cualquier adversidad y triunfar en su futuro como adultos profesionistas con nuestra educación destacada y reconocida desde 1988.</font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></span></span></em></div>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
					<tbody>
					<tr>
					<td align="center" valign="top" style="padding:9px">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
					<tbody><tr>
					<td align="center" style="padding-left:9px;padding-right:9px">
					<table border="0" cellpadding="0" cellspacing="0" style="border:1px none;border-collapse:collapse">
					<tbody><tr>
					<td align="center" valign="top" style="padding-top:9px;padding-right:9px;padding-left:9px">
					<table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
					<tbody><tr>
					<td align="center" valign="top">
					<table align="left" border="0" cellpadding="0" cellspacing="0" style="display:inline;border-collapse:collapse">
					<tbody><tr>
					<td valign="top" style="padding-right:10px;padding-bottom:9px">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
					<tbody><tr>
					<td align="left" valign="middle" style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:9px">
					<table align="left" border="0" cellpadding="0" cellspacing="0" width="" style="border-collapse:collapse">
					<tbody><tr>
					<td align="center" valign="middle" width="24">
					<a href="http://www.facebook.com" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es-419&amp;q=http://www.facebook.com&amp;source=gmail&amp;ust=1625249008387000&amp;usg=AFQjCNHtwQGexyRt_D7mmP_x4Nk3R2wwqQ"><img src="https://ci5.googleusercontent.com/proxy/KLWDyxU_2JT5nOGTE6_NSp-hT37kpCU8B8HLih6GyBnhKJEvCDQsIeq4uLfJ7CQWsSCfpfcbCXVh74IrAuFYiXcU4R2sPN1CInMYwE7DpPIiYM9dGmBbl7FrtmeFZ6I=s0-d-e1-ft#https://cdn-images.mailchimp.com/icons/social-block-v2/color-facebook-48.png" alt="https://www.facebook.com/ColegioMexicodelSuresteCMS/" style="display:block;border:0;height:auto;outline:none;text-decoration:none" height="24" width="24"></a>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					<table align="left" border="0" cellpadding="0" cellspacing="0" style="display:inline;border-collapse:collapse">
					<tbody><tr>
					<td valign="top" style="padding-right:10px;padding-bottom:9px">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
					<tbody><tr>
					<td align="left" valign="middle" style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:9px">
					<table align="left" border="0" cellpadding="0" cellspacing="0" width="" style="border-collapse:collapse">
					<tbody><tr>
					<td align="center" valign="middle" width="24">
					<a href="http://colegiomexicodelsureste.edu.mx/" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es-419&amp;q=http://colegiomexicodelsureste.edu.mx/&amp;source=gmail&amp;ust=1625249008387000&amp;usg=AFQjCNFuDKh1flX8yHc62kb5ghNarUDWDw"><img src="https://ci5.googleusercontent.com/proxy/FR4I0VM10pxcUwbQ63iIF6cAOqyzEbM1yC4ru84XQ1cT1RbvvmtJzUt4RdH1WUB452ecisGFRwh877ppJp5BhUmQhUWIABs5JUY80JFlBF08huivKdmS6R-dPg=s0-d-e1-ft#https://cdn-images.mailchimp.com/icons/social-block-v2/color-link-48.png" alt="Website" style="display:block;border:0;height:auto;outline:none;text-decoration:none" height="24" width="24"></a>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					<table align="left" border="0" cellpadding="0" cellspacing="0" style="display:inline;border-collapse:collapse">
					<tbody><tr>
					<td valign="top" style="padding-right:0;padding-bottom:9px">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
					<tbody><tr>
					<td align="left" valign="middle" style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:9px">
					<table align="left" border="0" cellpadding="0" cellspacing="0" width="" style="border-collapse:collapse">
					<tbody><tr>
					<td align="center" valign="middle" width="24">
					<a href="https://www.youtube.com/channel/UCFNYdRq_LXAiJ4fse6GjeVg" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es-419&amp;q=https://www.youtube.com/channel/UCFNYdRq_LXAiJ4fse6GjeVg&amp;source=gmail&amp;ust=1625249008387000&amp;usg=AFQjCNGxZyBPhK7Mh3NShsaQYQdDjpiqEQ"><img src="https://ci3.googleusercontent.com/proxy/UZmsqbR0YicV2Dut8L3zgzEo4jupJEoo_M2eyGVoTUqJ8TC_2hipkr2l-JV-uTKoVQAGjTEuVd_3mFGuOKWqoj2ji0OjjHB1ShyYPzqUidP9s75s194CW40mMOmhPw=s0-d-e1-ft#https://cdn-images.mailchimp.com/icons/social-block-v2/color-youtube-48.png" alt="YouTube" style="display:block;border:0;height:auto;outline:none;text-decoration:none" height="24" width="24"></a>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
					<tbody>
					<tr>
					<td valign="top" style="padding-top:9px;padding-right:18px;padding-bottom:9px;padding-left:18px">
					<table align="right" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#002058;border-collapse:collapse">
					<tbody><tr>
					<td class="m_-238509726181642872mcnImageCardBottomImageContent" align="left" valign="top" style="padding-top:0px;padding-right:0px;padding-bottom:0;padding-left:0px">
					<img alt="" src="https://ci6.googleusercontent.com/proxy/j-kJ9CtigKwAAyDZyOzlWAG3WPSAPgWBgaJaobjTdEqpgG_5EzwMUksuUMZOFCwK6GVC8JPcQH3vmp-4_sUPhfb3guyanB3W-sweKEW4JTrcRS-rQoGW-5P6DnWwTCozdjKl1omv7vd3a76kUEil4J8LpgDLQiw=s0-d-e1-ft#https://mcusercontent.com/f3c37015aa32fe9f8cab4fe75/images/30f2a690-5d34-467f-9415-5be5153bc391.jpeg" width="564" style="max-width:1080px;border:0;height:auto;outline:none;text-decoration:none;vertical-align:bottom" class="m_-238509726181642872mcnImage">
					</td>
					</tr>
					<tr>
					<td class="m_-238509726181642872mcnTextContent" valign="top" style="padding:9px 18px;color:#f2f2f2;font-family:Helvetica;font-size:14px;font-weight:normal;text-align:center;word-break:break-word;line-height:150%" width="546">
					<div style="text-align:justify"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit">Somos la única escuela en todo el sureste en ser contactados y tener alumnos admitidos en Harvard que es la mejor universidad del mundo y la más difícil de accesar. </font></font></font></font></font></font></font></font></font></font><br>
					<br>
					<font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit">Colegio México del Sureste se ha posicionado a la altura de las mejores escuelas del país y nuestros estudiantes tienen los conocimientos para superar cualquier obstáculo y vencer a alumnos de primer mundo.</font></font></font></font></font></font></font></font></font></font></font></font></div>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
					<tbody>
					<tr>
					<td valign="top" style="padding-top:9px">
					<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;border-collapse:collapse" width="100%" class="m_-238509726181642872mcnTextContentContainer">
					<tbody><tr>
					<td valign="top" class="m_-238509726181642872mcnTextContent" style="padding:0px 18px 9px;color:#000000;word-break:break-word;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left">
					<div style="text-align:center"><strong><font style="vertical-align:inherit"><font style="vertical-align:inherit">ALGUNAS DE LAS MUCHAS PRESTIGIOSAS UNIVERSIDADES EXTRANJERAS DONDE NUESTROS ALUMNOS HAN INGRESADO.</font></font></strong></div>
					<ul>
					<li style="text-align:justify"><font style="vertical-align:inherit"><font style="vertical-align:inherit">66 Prestigiosas universidades extranjeras en todos los continentes del mundo.</font></font></li>
					<li style="text-align:justify"><font style="vertical-align:inherit"><font style="vertical-align:inherit">90 Alumnos estudiaron en el extranjero.</font></font></li>
					<li style="text-align:justify"><font style="vertical-align:inherit"><font style="vertical-align:inherit">22 Becas completas han obtenido nuestros alumnos en las mejores universidades del mundo.</font></font></li>
					<li style="text-align:justify"><font style="vertical-align:inherit"><font style="vertical-align:inherit">Más de 278 triunfos académicos y deportivos en México y en el extranjero.</font></font></li>
					<li style="text-align:justify"><font style="vertical-align:inherit"><font style="vertical-align:inherit">Más de 306 becas de universidades prestigiosas nacionales e internacionales.</font></font></li>
					</ul>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
					<tbody>
					<tr>
					<td valign="top" style="padding:9px">
					<table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" style="min-width:100%;border-collapse:collapse">
					<tbody><tr>
					<td valign="top" style="padding-right:9px;padding-left:9px;padding-top:0;padding-bottom:0;text-align:center">
					<img align="center" alt="" src="https://ci5.googleusercontent.com/proxy/9oFAID0zIVtDgJcsY_1qD5aT_bxBDDLAvPIgjxi2AlW7xQnR6ZlqtjEHeD5hQYs8aBPglD4GJPetiW4zFDDyiOQW0SNHKq5_xbjNjDryN9SVJDejgwK8q3xvz_mOjDiUIFcwAIA0vz54Ajn_Pi9jHBCK4DRd5Q=s0-d-e1-ft#https://mcusercontent.com/f3c37015aa32fe9f8cab4fe75/images/1572e500-03b1-4d36-92d6-de9bb8572a4b.png" width="564" style="max-width:704px;padding-bottom:0;display:inline!important;vertical-align:bottom;border:0;height:auto;outline:none;text-decoration:none" class="m_-238509726181642872mcnImage">
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
					<tbody>
					<tr>
					<td valign="top" style="padding:9px">
					<table align="left" border="0" cellpadding="0" cellspacing="0" class="m_-238509726181642872mcnCaptionBottomContent" style="border-collapse:collapse">
					<tbody><tr>
					<td align="center" valign="top" style="padding:0 9px 9px 9px">
					<img alt="" src="https://ci4.googleusercontent.com/proxy/47H1PZsn-EdpCVR_hdxytFDeU76vlIELgrdgsDPC92YEEGj_TGVj80ZnqvbQyl_LpSfin0j_0V9mLfvwlN9fd5ayjhxRa_LZfmBymoIZOFONWmenuBp-M2NVMCqNXMj_hA8AHEvhfKoG8aIQJwrKpZGsjHb1sg=s0-d-e1-ft#https://mcusercontent.com/f3c37015aa32fe9f8cab4fe75/images/dfd6f539-ce81-46c7-ba4a-e294214d63c7.png" width="564" style="max-width:1158px;border:0;height:auto;outline:none;text-decoration:none;vertical-align:bottom" class="m_-238509726181642872mcnImage">
					</td>
					</tr>
					<tr>
					<td class="m_-238509726181642872mcnTextContent" valign="top" style="padding:0 9px 0 9px;word-break:break-word;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left" width="564">
					<div style="text-align:justify"><span style="color:#000000">Los alumnos graduados están preparados para presentar los exámenes de GRE, SAT,  ETC. Estos exámenes son obligatorios para poder  ingresar  a las  universidades más difíciles  del mundo.  <strong> </strong></span></div>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
					<tbody>
					<tr>
					<td valign="top" style="padding-top:9px">
					<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;border-collapse:collapse" width="100%" class="m_-238509726181642872mcnTextContentContainer">
					<tbody><tr>
					<td valign="top" class="m_-238509726181642872mcnTextContent" style="padding:0px 18px 9px;color:#002058;word-break:break-word;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left">
					<div style="text-align:center"><span style="color:#ffffff"><span style="background-color:#000066">Nuestros egresados obtienen mejores puntajes y resultados  que el promedio de estudiantes originarios de países extranjeros de primer mundo. </span></span></div>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
					<tbody>
					<tr>
					<td valign="top" style="padding-top:9px;padding-right:18px;padding-bottom:9px;padding-left:18px">
					<table align="right" border="0" cellpadding="0" cellspacing="0" width="100%" style="border:1px none;border-collapse:collapse">
					<tbody><tr>
					<td class="m_-238509726181642872mcnTextContent" valign="top" style="padding:18px 18px 0px;font-family:Helvetica;font-size:14px;font-weight:normal;text-align:center;word-break:break-word;color:#757575;line-height:150%" width="546">
					</td>
					</tr>
					<tr>
					<td class="m_-238509726181642872mcnImageCardTopImageContent" align="center" valign="top" style="padding-top:9px;padding-right:0px;padding-bottom:0px;padding-left:0px">
					<a href="https://www.youtube.com/watch?v=CgGN3jn3d9E&amp;list=UUFNYdRq_LXAiJ4fse6GjeVg&amp;index=6" title="CMS" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es-419&amp;q=https://www.youtube.com/watch?v%3DCgGN3jn3d9E%26list%3DUUFNYdRq_LXAiJ4fse6GjeVg%26index%3D6&amp;source=gmail&amp;ust=1625249008387000&amp;usg=AFQjCNEMBqXoLIojtwMwTXIVcQqQgR-OQg" class="playable">
					<img alt="" src="https://ci3.googleusercontent.com/proxy/Iv6w9Vqh698WCEITP524G8wCFzYJ9k5sp9xL0YH9FeFbgxcTaS88mzz8v6q1ZWVSEsG6gCs2GG3gIQTuyCPmB_30hx2UbjU8gzQJQ_azdvz7DTmpQj9trA9sUgx4xlYXvePozjASyOZwN2fmHkou8M3wRRaYRPV0xx0NhAwli58=s0-d-e1-ft#https://mcusercontent.com/f3c37015aa32fe9f8cab4fe75/video_thumbnails_new/876c12a28da2cbf60988b417ae4e316d.png" width="562" style="max-width:640px;border-radius:0%;border:0;height:auto;outline:none;text-decoration:none;vertical-align:bottom" class="m_-238509726181642872mcnImage">
					</a>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
					<tbody>
					<tr>
					<td valign="top" style="padding-top:9px">
					<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;border-collapse:collapse" width="100%" class="m_-238509726181642872mcnTextContentContainer">
					<tbody><tr>
					<td valign="top" class="m_-238509726181642872mcnTextContent" style="padding-top:0;padding-right:18px;padding-bottom:9px;padding-left:18px;word-break:break-word;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left">
					<div style="text-align:justify"><span style="color:#000000"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit">Nos destacamos por ser pioneros globales, capaces de competir con los mejores sistemas educativos del mundo y darles las herramientas educativas y tecnológicas para triunfar. </font></font></font></font></font><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit">Creamos nuestro propio contenido académico el cual es único e inigualable conforme a las tendencias académicas más innovadoras mundialmente. </font></font></font></font></font></font><br>
					<font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit">Le recomendamos hacer clic en el siguiente enlace para ver la mayoría de nuestros triunfos.</font></font></font></font></font></font></span></div>
					<div style="text-align:justify"><a href="http://colegiomexicodelsureste.edu.mx/Bienvenido/NuestrosLogros" style="color:#007c89;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es-419&amp;q=http://colegiomexicodelsureste.edu.mx/Bienvenido/NuestrosLogros&amp;source=gmail&amp;ust=1625249008387000&amp;usg=AFQjCNEl2V3UP9bvY66T2LzSZ7nus78MGw"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit">http://<wbr>colegiomexicodelsureste.edu.<wbr>mx/Bienvenido/NuestrosLogros</font></font></font></font></a></div>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
					<tbody class="m_-238509726181642872mcnImageGroupBlockOuter">
					<tr>
					<td valign="top" style="padding:9px" class="m_-238509726181642872mcnImageGroupBlockInner">
					<table align="left" width="273" border="0" cellpadding="0" cellspacing="0" class="m_-238509726181642872mcnImageGroupContentContainer" style="border-collapse:collapse">
					<tbody><tr>
					<td class="m_-238509726181642872mcnImageGroupContent" valign="top" style="padding-left:9px;padding-top:0;padding-bottom:0">
					<img alt="" src="https://ci5.googleusercontent.com/proxy/3BttDcgUrOmRmU_SShSL4C_6mDypUEyNfhXZrzrtCvBMMr086G3iEhoZpjX9zVwnBJZZZipq58E725LA41O6yObfAV6PCTkTkmXafeZ6bkRx69mmDFy8VFKLKMXAHVVxTt51Rpw3Y1TqAwSvKZSUsgR1D3vR_A=s0-d-e1-ft#https://mcusercontent.com/f3c37015aa32fe9f8cab4fe75/images/b54c8b11-4335-43d4-aa0a-68e04a44ab30.png" width="264" style="max-width:1000px;padding-bottom:0;border:0;height:auto;outline:none;text-decoration:none;vertical-align:bottom" class="m_-238509726181642872mcnImage">
					</td>
					</tr>
					</tbody></table>
					<table align="right" width="273" border="0" cellpadding="0" cellspacing="0" class="m_-238509726181642872mcnImageGroupContentContainer" style="border-collapse:collapse">
					<tbody><tr>
					<td class="m_-238509726181642872mcnImageGroupContent" valign="top" style="padding-right:9px;padding-top:0;padding-bottom:0">
					<img alt="" src="https://ci4.googleusercontent.com/proxy/ojoUTyn0IdLVMXzWwUQK37uA_JpXy1eD2qk3W9q_-Om49GJvSV668wEHrOMqz8Md5WAQbRq1USO3BMjGTszzc29qpBcT-NXHM7UIvH5Crm-QtgiyOYJLC20MAF-WJCwhsQcDKDFJATAS_HKcR9jGOOuFvlsFTw=s0-d-e1-ft#https://mcusercontent.com/f3c37015aa32fe9f8cab4fe75/images/530617fd-3100-4b78-a954-4151f2ea09e8.png" width="264" style="max-width:1366px;padding-bottom:0;border:0;height:auto;outline:none;text-decoration:none;vertical-align:bottom" class="m_-238509726181642872mcnImage">
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
					<tbody>
					<tr>
					<td valign="top" style="padding-top:9px">
					<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:300px;border-collapse:collapse" width="100%" class="m_-238509726181642872mcnTextContentContainer">
					<tbody><tr>
					<td valign="top" class="m_-238509726181642872mcnTextContent" style="padding-top:0;padding-left:18px;padding-bottom:9px;padding-right:18px;word-break:break-word;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left">
					<span style="color:#000000">KINDER</span><br>
					<a href="http://colegiomexicodelsureste.edu.mx/Bienvenido/Kinder" style="color:#007c89;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es-419&amp;q=http://colegiomexicodelsureste.edu.mx/Bienvenido/Kinder&amp;source=gmail&amp;ust=1625249008388000&amp;usg=AFQjCNHWfQPdKFQojDJCKimZaBsxnymycQ">http://<wbr>colegiomexicodelsureste.edu.<wbr>mx/Bienvenido/Kinder</a>
					</td>
					</tr>
					</tbody></table>
					<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:300px;border-collapse:collapse" width="100%" class="m_-238509726181642872mcnTextContentContainer">
					<tbody><tr>
					<td valign="top" class="m_-238509726181642872mcnTextContent" style="padding-top:0;padding-left:18px;padding-bottom:9px;padding-right:18px;word-break:break-word;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left">
					<span style="color:#000000">PRIMARIA</span><br>
					<a href="http://colegiomexicodelsureste.edu.mx/Bienvenido/Primaria" style="color:#007c89;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es-419&amp;q=http://colegiomexicodelsureste.edu.mx/Bienvenido/Primaria&amp;source=gmail&amp;ust=1625249008388000&amp;usg=AFQjCNEI1PhCOrS9HxQxHdM6Pvxvzmzorg">http://<wbr>colegiomexicodelsureste.edu.<wbr>mx/Bienvenido/Primaria</a>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
					<tbody class="m_-238509726181642872mcnImageGroupBlockOuter">
					<tr>
					<td valign="top" style="padding:9px" class="m_-238509726181642872mcnImageGroupBlockInner">
					<table align="left" width="273" border="0" cellpadding="0" cellspacing="0" class="m_-238509726181642872mcnImageGroupContentContainer" style="border-collapse:collapse">
					<tbody><tr>
					<td class="m_-238509726181642872mcnImageGroupContent" valign="top" style="padding-left:9px;padding-top:0;padding-bottom:0">
					<img alt="" src="https://ci5.googleusercontent.com/proxy/DhsALp_DukXvu66CARGWPplccwrs-JXkJuknRw5U3YsSk7LBJEj3AnfvEXY1oPedkVrvFfYeucOZMbnjTwZXrVNM5voHjd9wr1rutjuxLaeHFMuMWe-7Nas8dS0PEcwepSIVVDOfCctG0st1LRs_-xw77FA13A=s0-d-e1-ft#https://mcusercontent.com/f3c37015aa32fe9f8cab4fe75/images/9dd57394-77f9-46c9-8f3c-6b3e1f7b9e1e.png" width="264" style="max-width:1366px;padding-bottom:0;border:0;height:auto;outline:none;text-decoration:none;vertical-align:bottom" class="m_-238509726181642872mcnImage">
					</td>
					</tr>
					</tbody></table>
					<table align="right" width="273" border="0" cellpadding="0" cellspacing="0" class="m_-238509726181642872mcnImageGroupContentContainer" style="border-collapse:collapse">
					<tbody><tr>
					<td class="m_-238509726181642872mcnImageGroupContent" valign="top" style="padding-right:9px;padding-top:0;padding-bottom:0">
					<img alt="" src="https://ci6.googleusercontent.com/proxy/M0oYEJ0_501XSIALy9V78b-AezuSHO5sLzLFu_RJpqcbZyW3Ph-iJy5y3nrHf6AAFkwG2a7F3F-DuhGG0Oz5qrte4eXStsodSaBIVQO07ohRTAO8OfwrniJAWB1anyaLMnJNymas3kz-XN1F0yvi7CJfvBOLtw=s0-d-e1-ft#https://mcusercontent.com/f3c37015aa32fe9f8cab4fe75/images/f25bdac1-5f1c-46e4-94ca-fc0c09c15bda.png" width="264" style="max-width:1366px;padding-bottom:0;border:0;height:auto;outline:none;text-decoration:none;vertical-align:bottom" class="m_-238509726181642872mcnImage">
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
					<tbody>
					<tr>
					<td valign="top" style="padding-top:9px">
					<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:300px;border-collapse:collapse" width="100%" class="m_-238509726181642872mcnTextContentContainer">
					<tbody><tr>
					<td valign="top" class="m_-238509726181642872mcnTextContent" style="padding-top:0;padding-left:18px;padding-bottom:9px;padding-right:18px;word-break:break-word;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left">
					<span style="color:#000000">SECUNDARIA</span><br>
					<a href="http://colegiomexicodelsureste.edu.mx/Bienvenido/Secundaria" rel="noreferrer noreferrer noreferrer" style="color:#007c89;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es-419&amp;q=http://colegiomexicodelsureste.edu.mx/Bienvenido/Secundaria&amp;source=gmail&amp;ust=1625249008388000&amp;usg=AFQjCNH8x9xLmQOq0s4FZqdDh6-xtAlYUw">http://<wbr>colegiomexicodelsureste.edu.<wbr>mx/Bienvenido/Secundaria</a>
					</td>
					</tr>
					</tbody></table>
					<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:300px;border-collapse:collapse" width="100%" class="m_-238509726181642872mcnTextContentContainer">
					<tbody><tr>
					<td valign="top" class="m_-238509726181642872mcnTextContent" style="padding-top:0;padding-left:18px;padding-bottom:9px;padding-right:18px;word-break:break-word;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left">
					<span style="color:#000000">PREPARATORIA</span><br>
					<a href="http://colegiomexicodelsureste.edu.mx/Bienvenido/Preparatoria" rel="noreferrer noreferrer noreferrer" style="color:#007c89;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es-419&amp;q=http://colegiomexicodelsureste.edu.mx/Bienvenido/Preparatoria&amp;source=gmail&amp;ust=1625249008388000&amp;usg=AFQjCNGu0OHc4_oCVn1vcmsd7GULZgpzxg">http://<wbr>colegiomexicodelsureste.edu.<wbr>mx/Bienvenido/Preparatoria</a>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
					<tbody>
					<tr>
					<td valign="top" style="padding-top:9px;padding-right:18px;padding-bottom:9px;padding-left:18px">
					<table align="right" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
					<tbody><tr>
					<td class="m_-238509726181642872mcnImageCardBottomImageContent" align="left" valign="top" style="padding-top:0px;padding-right:0px;padding-bottom:0;padding-left:0px">
					<img alt="" src="https://ci4.googleusercontent.com/proxy/SYnpaVlPFn7lbmjuddVTHljB9usxzqUq-0lYMkOWTxOqOihale74qkpRDLvTHh0arkno4FD2RJoMudcCfB9b49azvwSs38MYYdIBRaBoZJExHnlZivclZWYaqnzJDRXIxEu04vzFeKw1w5_lSaMSF6Tk8t_k-qY=s0-d-e1-ft#https://mcusercontent.com/f3c37015aa32fe9f8cab4fe75/images/4a404746-3c0b-4429-b8fd-3fa66b57cfe4.jpeg" width="564" style="max-width:1280px;border:0;height:auto;outline:none;text-decoration:none;vertical-align:bottom" class="m_-238509726181642872mcnImage">
					</td>
					</tr>
					<tr>
					<td class="m_-238509726181642872mcnTextContent" valign="top" style="padding:9px 18px;color:#000000;font-family:Helvetica;font-size:14px;font-weight:normal;text-align:center;word-break:break-word;line-height:150%" width="546">
					<div style="text-align:left">INSTALACIONES</div>
					<div style="text-align:justify"><span style="font-size:15px">Los únicos con sala de juicios orales, cámara de Gesell con aparatos técnicos de electro encefalograma, alberca con filtro, vanguardista y pionera aula de mecatrónica, sala de cinematografía actualizado e instalado por una experta en la industria del cine de Hollywood, Los Ángeles.<br>
					<a href="http://colegiomexicodelsureste.edu.mx/Bienvenido/Instalaciones" style="color:#007c89;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es-419&amp;q=http://colegiomexicodelsureste.edu.mx/Bienvenido/Instalaciones&amp;source=gmail&amp;ust=1625249008388000&amp;usg=AFQjCNE4VTE1isfnZ8mzQvXYfdmQVHgTGg">http://<wbr>colegiomexicodelsureste.edu.<wbr>mx/Bienvenido/Instalaciones</a></span></div>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
					<tbody>
					<tr>
					<td valign="top" style="padding-top:9px;padding-right:18px;padding-bottom:9px;padding-left:18px">
					<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#002058;border-collapse:collapse">
					<tbody><tr>
					<td class="m_-238509726181642872mcnImageCardBottomImageContent" align="left" valign="top" style="padding-top:0px;padding-right:0px;padding-bottom:0;padding-left:0px">
					<a href="https://www.youtube.com/watch?v=70NcsSfayKY&amp;ct=t%28COLEGIO+MEXICO+DEL+SURESTE_COPY_01%29&amp;mc_cid=5a4f726397&amp;mc_eid=%5BUNIQID%5D" title="" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es-419&amp;q=https://www.youtube.com/watch?v%3D70NcsSfayKY%26ct%3Dt%2528COLEGIO%2BMEXICO%2BDEL%2BSURESTE_COPY_01%2529%26mc_cid%3D5a4f726397%26mc_eid%3D%255BUNIQID%255D&amp;source=gmail&amp;ust=1625249008388000&amp;usg=AFQjCNES5pGikrM5StslHh4r3tvDh6_3ZA" class="playable">
					<img alt="" src="https://ci4.googleusercontent.com/proxy/5LzkaLikYE4ZSIhWK41tKz6y0-UbNxbaq2pOC5jChVq6w0gL4mAGzxoqoAoAw_3Wo7a5YJ0mRutjneGtwtaksnOKQB-2m9cpVvOvpg0b66dGSwioBtclTfD24TR8l-uF0NjY-zptvMHfkaKNmpmmePOBT5nRKC2yUpTWnxp2nW8=s0-d-e1-ft#https://mcusercontent.com/f3c37015aa32fe9f8cab4fe75/video_thumbnails_new/b1f5136336084499aaae976a7aed0574.png" width="564" style="max-width:640px;border:0;height:auto;outline:none;text-decoration:none;vertical-align:bottom" class="m_-238509726181642872mcnImage">
					</a>
					</td>
					</tr>
					<tr>
					<td class="m_-238509726181642872mcnTextContent" valign="top" style="padding:9px 18px;color:#ffffff;font-family:Helvetica;font-size:14px;font-weight:normal;text-align:center;word-break:break-word;line-height:150%" width="546">
					<div style="text-align:center"><span style="color:#ffffff"><span style="font-size:15px">Los únicos y pioneros en implementar ingeniería mecatrónica desde kínder hasta preparatoria. Todos nuestros proyectos tienen enfoque humanista lo cual ayuda a nuestros estudiantes a que les guste y les motive hacer el bien común a personas y animales con necesidades diferentes. </span></span></div>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-238509726181642872mcnDividerBlock" style="min-width:100%;border-collapse:collapse;table-layout:fixed!important">
					<tbody>
					<tr>
					<td style="min-width:100%;padding:18px">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-top:2px groove #ff1d1d;border-collapse:collapse">
					<tbody><tr>
					<td>
					<span></span>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
					<tbody>
					<tr>
					<td valign="top" style="padding-top:9px">
					<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;border-collapse:collapse" width="100%" class="m_-238509726181642872mcnTextContentContainer">
					<tbody><tr>
					<td valign="top" class="m_-238509726181642872mcnTextContent" style="padding-top:0;padding-right:18px;padding-bottom:9px;padding-left:18px;word-break:break-word;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left">
					<div style="text-align:center"><span style="color:#000000"><strong><span style="font-size:18px">CLASES VIRTUALES</span></strong></span></div>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
					<tbody>
					<tr>
					<td valign="top" style="padding:9px">
					<table border="0" cellpadding="0" cellspacing="0" class="m_-238509726181642872mcnCaptionRightContentOuter" width="100%" style="border-collapse:collapse">
					<tbody><tr>
					<td valign="top" style="padding:0 9px">
					<table align="left" border="0" cellpadding="0" cellspacing="0" class="m_-238509726181642872mcnCaptionRightImageContentContainer" width="264" style="border-collapse:collapse">
					<tbody><tr>
					<td align="center" valign="top">
					<img alt="" src="https://ci5.googleusercontent.com/proxy/QTvG_AuFrvYYGyH5pEsVcEaD89uJlmO1yacMv66Atsq8KLKJ5OORzPYY6vUI6Xk0QJhFl7zxFvnmB6UGLtG73X6xpFoxIzIUyiX1gYJ3Q_pUpybv5OMj2_lOqMcs-tsFmIrA9pSFi92voAZTxlhEr9gRQxc5XO8=s0-d-e1-ft#https://mcusercontent.com/f3c37015aa32fe9f8cab4fe75/images/e502609d-eb48-4b7d-a347-338d572d44b1.jpeg" width="264" style="max-width:720px;border:0;height:auto;outline:none;text-decoration:none;vertical-align:bottom" class="m_-238509726181642872mcnImage">
					</td>
					</tr>
					</tbody></table>
					<table class="m_-238509726181642872mcnCaptionRightTextContentContainer" align="right" border="0" cellpadding="0" cellspacing="0" width="264" style="border-collapse:collapse">
					<tbody><tr>
					<td valign="top" class="m_-238509726181642872mcnTextContent" style="word-break:break-word;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left">
					<div style="text-align:justify"><span style="color:#000000"><strong><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit">Desde preescolar hasta preparatoria clases a distancia con aprendizaje interactivo los únicos en Tabasco innovando y capacitando a los maestros constantemente para brindar la mejor educación en línea.</font></font></font></font></strong></span></div>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table></td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					<tr>
					<td align="center" valign="top" id="m_-238509726181642872templateFooter" style="background:#122d70 none no-repeat center/cover;background-color:#122d70;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top:0;border-bottom:0;padding-top:0px;padding-bottom:0px">
					<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-238509726181642872templateContainer" style="border-collapse:collapse;max-width:600px!important">
					<tbody><tr>
					<td valign="top" class="m_-238509726181642872footerContainer" style="background:transparent none no-repeat center/cover;background-color:transparent;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top:0;border-bottom:0;padding-top:0;padding-bottom:0"><table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
					<tbody>
					<tr>
					<td valign="top" style="padding-top:9px">
					<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;border-collapse:collapse" width="100%" class="m_-238509726181642872mcnTextContentContainer">
					<tbody><tr>
					<td valign="top" class="m_-238509726181642872mcnTextContent" style="padding-top:0;padding-right:18px;padding-bottom:9px;padding-left:18px;word-break:break-word;color:#ffffff;font-family:Helvetica;font-size:12px;line-height:150%;text-align:center">
					<div style="text-align:center"><span style="font-size:20px"><strong><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit">COLEGIO MÉXICO DEL SURESTE</font></font></font></font></font></font></strong></span><br>
					<strong><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit">Estamos disponibles para agendar una videollamada a la hora y día que más le convenga o bien acudir a las instalaciones del colegio con las medidas de prevención ante el COVID-19. </font></font></font></font></font></font></strong><br>
					<br>
					<span style="font-size:14px"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit"><font style="vertical-align:inherit">$telefono</font></font></font></font></font></font></span></div>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
					<tbody>
					<tr>
					<td valign="top" style="padding:0px">
					<table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" style="min-width:100%;border-collapse:collapse">
					<tbody><tr>
					<td valign="top" style="padding-right:0px;padding-left:0px;padding-top:0;padding-bottom:0;text-align:center">
					<a href="http://%20wa.link/uysvi3" title="" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es-419&amp;q=http://%2520wa.link/uysvi3&amp;source=gmail&amp;ust=1625249008388000&amp;usg=AFQjCNFMS9HE8jXNZPfNVHUNHWuTGuv9-w">
					<img align="center" alt="" src="https://ci4.googleusercontent.com/proxy/uuVdANnly9AC6Dfg5L5vvolVEzOd_NSOrTLqVnwW8bwPuxjKNo8SplsCt313OuFWEMOtnpEwugZFsxHpSsu_bmaXNC1DY0sJNWXYnEK8Bp1025wvJNYhtLWYwiBLVhe9sueclzw2Tacsqv8mxJ8QLMI50WMHuA=s0-d-e1-ft#https://mcusercontent.com/f3c37015aa32fe9f8cab4fe75/images/e6bc1cf0-c8ca-4ab2-89bc-df65e06e5599.png" width="60" style="max-width:3840px;padding-bottom:0px;vertical-align:bottom;display:inline!important;border-radius:0%;border:0;height:auto;outline:none;text-decoration:none" class="m_-238509726181642872mcnImage">
					</a>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
					<tbody>
					<tr>
					<td valign="top" style="padding-top:9px">
					<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;border-collapse:collapse" width="100%" class="m_-238509726181642872mcnTextContentContainer">
					<tbody><tr>
					<td valign="top" class="m_-238509726181642872mcnTextContent" style="padding-top:0;padding-right:18px;padding-bottom:9px;padding-left:18px;word-break:break-word;color:#ffffff;font-family:Helvetica;font-size:12px;line-height:150%;text-align:center">
					<div style="text-align:center"><span style="color:#fff0f5"><strong><font style="vertical-align:inherit"><font style="vertical-align:inherit">Horario de atención</font></font></strong><br>
					<font style="vertical-align:inherit"><font style="vertical-align:inherit">Lunes a viernes de 08:00 a 15:00 hrs. </font></font><br>
					<font style="vertical-align:inherit"><font style="vertical-align:inherit"><a href="https://www.google.com/maps/search/AV.+Paseo+de+la+Sierra+615?entry=gmail&amp;source=g">AV.</a> <a href="https://www.google.com/maps/search/AV.+Paseo+de+la+Sierra+615?entry=gmail&amp;source=g">Paseo de la Sierra 615</a>, Guayabal, Centro, 86090 Villahermosa, Tab.</font></font></span></div>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="m_-238509726181642872mcnDividerBlock" style="min-width:100%;border-collapse:collapse;table-layout:fixed!important">
					<tbody>
					<tr>
					<td style="min-width:100%;padding:18px">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-top:2px solid #ec1b1b;border-collapse:collapse">
					<tbody><tr>
					<td>
					<span></span>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table><table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
					<tbody>
					<tr>
					<td align="center" valign="top" style="padding:9px">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
					<tbody><tr>
					<td align="center" style="padding-left:9px;padding-right:9px">
					<table border="0" cellpadding="0" cellspacing="0" style="border:1px none;border-collapse:collapse">
					<tbody><tr>
					<td align="center" valign="top" style="padding-top:9px;padding-right:9px;padding-left:9px">
					<table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
					<tbody><tr>
					<td align="center" valign="top">
					<table align="left" border="0" cellpadding="0" cellspacing="0" style="display:inline;border-collapse:collapse">
					<tbody><tr>
					<td valign="top" style="padding-right:10px;padding-bottom:9px">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
					<tbody><tr>
					<td align="left" valign="middle" style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:9px">
					<table align="left" border="0" cellpadding="0" cellspacing="0" width="" style="border-collapse:collapse">
					<tbody><tr>
					<td align="center" valign="middle" width="24">
					<a href="http://www.facebook.com" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es-419&amp;q=http://www.facebook.com&amp;source=gmail&amp;ust=1625249008388000&amp;usg=AFQjCNEr8vZYz-XbeXHb7tqn5sPRp4T0Vw"><img src="https://ci5.googleusercontent.com/proxy/KLWDyxU_2JT5nOGTE6_NSp-hT37kpCU8B8HLih6GyBnhKJEvCDQsIeq4uLfJ7CQWsSCfpfcbCXVh74IrAuFYiXcU4R2sPN1CInMYwE7DpPIiYM9dGmBbl7FrtmeFZ6I=s0-d-e1-ft#https://cdn-images.mailchimp.com/icons/social-block-v2/color-facebook-48.png" alt="https://www.facebook.com/ColegioMexicodelSuresteCMS/" style="display:block;border:0;height:auto;outline:none;text-decoration:none" height="24" width="24"></a>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					<table align="left" border="0" cellpadding="0" cellspacing="0" style="display:inline;border-collapse:collapse">
					<tbody><tr>
					<td valign="top" style="padding-right:10px;padding-bottom:9px">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
					<tbody><tr>
					<td align="left" valign="middle" style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:9px">
					<table align="left" border="0" cellpadding="0" cellspacing="0" width="" style="border-collapse:collapse">
					<tbody><tr>
					<td align="center" valign="middle" width="24">
					<a href="http://colegiomexicodelsureste.edu.mx/" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es-419&amp;q=http://colegiomexicodelsureste.edu.mx/&amp;source=gmail&amp;ust=1625249008388000&amp;usg=AFQjCNGrT7zVIGpRXQ5IQ8diG8WBFghULw"><img src="https://ci5.googleusercontent.com/proxy/FR4I0VM10pxcUwbQ63iIF6cAOqyzEbM1yC4ru84XQ1cT1RbvvmtJzUt4RdH1WUB452ecisGFRwh877ppJp5BhUmQhUWIABs5JUY80JFlBF08huivKdmS6R-dPg=s0-d-e1-ft#https://cdn-images.mailchimp.com/icons/social-block-v2/color-link-48.png" alt="Website" style="display:block;border:0;height:auto;outline:none;text-decoration:none" height="24" width="24"></a>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					<table align="left" border="0" cellpadding="0" cellspacing="0" style="display:inline;border-collapse:collapse">
					<tbody><tr>
					<td valign="top" style="padding-right:10px;padding-bottom:9px">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
					<tbody><tr>
					<td align="left" valign="middle" style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:9px">
					<table align="left" border="0" cellpadding="0" cellspacing="0" width="" style="border-collapse:collapse">
					<tbody><tr>
					<td align="center" valign="middle" width="24">
					<a href="https://www.youtube.com/channel/UCFNYdRq_LXAiJ4fse6GjeVg" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es-419&amp;q=https://www.youtube.com/channel/UCFNYdRq_LXAiJ4fse6GjeVg&amp;source=gmail&amp;ust=1625249008389000&amp;usg=AFQjCNFGfZ2H0iUYreZW4d7ATFi1vAE1yA"><img src="https://ci3.googleusercontent.com/proxy/UZmsqbR0YicV2Dut8L3zgzEo4jupJEoo_M2eyGVoTUqJ8TC_2hipkr2l-JV-uTKoVQAGjTEuVd_3mFGuOKWqoj2ji0OjjHB1ShyYPzqUidP9s75s194CW40mMOmhPw=s0-d-e1-ft#https://cdn-images.mailchimp.com/icons/social-block-v2/color-youtube-48.png" alt="YouTube" style="display:block;border:0;height:auto;outline:none;text-decoration:none" height="24" width="24"></a>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					<table align="left" border="0" cellpadding="0" cellspacing="0" style="display:inline;border-collapse:collapse">
					<tbody><tr>
					<td valign="top" style="padding-right:0;padding-bottom:9px">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
					<tbody><tr>
					<td align="left" valign="middle" style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:9px">
					<table align="left" border="0" cellpadding="0" cellspacing="0" width="" style="border-collapse:collapse">
					<tbody><tr>
					<td align="center" valign="middle" width="24">
					<a href="https://www.instagram.com/colegiomexicodelsureste/" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es-419&amp;q=https://www.instagram.com/colegiomexicodelsureste/&amp;source=gmail&amp;ust=1625249008389000&amp;usg=AFQjCNGpZzBEqZ3L8jn6NJ1mN4oshr4jHg"><img src="https://ci3.googleusercontent.com/proxy/Kxmv_VOWHxRbx9ha8NMR9nONZZkGxv2vyrUOlpQhi5_ieDBEPqRomk1Twd6kvqAcUM1ccGIxTgC8Rh1TvQcdKf-Ql5F87HSw4DKkcKIdL9Gz-WFmaHDWBrvzjPHt2CVn=s0-d-e1-ft#https://cdn-images.mailchimp.com/icons/social-block-v2/color-instagram-48.png" alt="Instagram" style="display:block;border:0;height:auto;outline:none;text-decoration:none" height="24" width="24"></a>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody>
					</table></td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					</center>
					<center>
					</center></div>
					</font></div></td></tr></tbody></table>
			</body>
EOD;
		$this->email->message(
			$html
			);
		if($this->email->send())
		{
			$this->model_informesCucm->ActualizarEstatus($id);
			echo "Correo enviado correctamente <a href='".base_url('informesCucm/index')."'>Regresar a la página anterior</a>";
		}else{
            echo "Error al enviar";
			echo "Correo enviado correctamente <a href='".base_url('informesCucm/index')."'>Regresar a la página anterior</a>";            
		}
	}

	public function delete($id)
	{
		if(!in_array('deleteInformeCucm', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			if($this->input->post('confirm')) {
					$delete = $this->model_informesCucm->eliminar($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Eliminado satisfactoriamente');
		        		redirect('informesCucm/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Ocurrió un error!!');
		        		redirect('informesCucm/delete/'.$id, 'refresh');
		        	}

			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('informesCucm/delete', $this->data);
			}	
		}
	}
}
<?php
/* Smarty version 4.1.0, created on 2022-11-04 19:27:53
  from 'C:\xampp\htdocs\proyecto-web\smarty\templates\index2.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_636559a91ead70_27891994',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b9bf9cba467382c5c4385b6511cae02617994af' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyecto-web\\smarty\\templates\\index2.tpl',
      1 => 1667586297,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_636559a91ead70_27891994 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en"> 
<head>
	<title><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</title>
	
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
	<link rel="shortcut icon" href="favicon.ico"> 
	
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
	
	<!-- FontAwesome JS-->
	<?php echo '<script'; ?>
 defer src="assets/fontawesome/js/all.min.js"><?php echo '</script'; ?>
>
	
	<!-- Theme CSS -->  
	<link id="theme-style" rel="stylesheet" href="assets/css/devresume.css"> 
	
</head> 

<body>
	<!-- DEMO ONLY --> 
	<div class="demo-banner px-2 py-3 text-white text-center font-weight-bold bg-primary">Bienvenidos al portal de empleo donde te ayudamos crecer, Registrate y haz que las mejores empresas te encuentren<br class="d-lg-none"><a class="btn demo-btn-on-bg text-white font-weight-bold ml-2 mt-2 mt-lg-0" href="login.php?xme!r=<?php echo $_SESSION['t_usuario'];?>
" target=""><i class="fas fa-user mr-2"></i>Soy Usuario</a><a class="btn demo-btn-on-bg text-white font-weight-bold ml-2 mt-2 mt-lg-0" href="login.php?xme!r=<?php echo $_SESSION['t_empresa'];?>
" target=""><i class="fas fa-building mr-2"></i>Soy empresa</a>
	</div>
	<div class="main-wrapper">
		<div class="container px-3 px-lg-5">
			<article class="resume-wrapper mx-auto theme-bg-light p-5 mb-5 my-5 shadow-lg">
				
				<div class="resume-header">
					<div class="row align-items-center">
						<div class="resume-title col-12 col-md-6 col-lg-8 col-xl-9">
							<img src="assets/images/logolargegreen.png" class="img-fluid" width="450" height="180" alt="image">
							<!--<div class="resume-tagline mb-3 mb-md-0">Senior Software Engineer</div>-->
						</div><!--//resume-title-->
						<div class="resume-contact col-12 col-md-6 col-lg-4 col-xl-3">
							<ul class="list-unstyled mb-0">
								<!--<li class="mb-2"><i class="fas fa-phone-square fa-fw fa-lg mr-2 "></i><a class="resume-link" href="tel:#">0123 4567 890</a></li>
								<li class="mb-2"><i class="fas fa-envelope-square fa-fw fa-lg mr-2"></i><a class="resume-link" href="mailto:#">simon.doe@yourwebsite.com</a></li>
								<li class="mb-2"><i class="fas fa-globe fa-fw fa-lg mr-2"></i><a class="resume-link" href="#">www.yourwebsite.com</a></li>
								<li class="mb-0"><i class="fas fa-map-marker-alt fa-fw fa-lg mr-2"></i>New York</li>-->
							</ul>
						</div><!--//resume-contact-->
					</div><!--//row-->
					
				</div><!--//resume-header-->
				<hr>
				<div class="resume-intro py-3">
					<div class="media flex-column flex-md-row align-items-center">
						<!-- <img class="resume-profile-image mb-3 mb-md-0 mr-md-5 ml-md-0 rounded mx-auto" src="assets/images/mainwork.jpg" alt="image"> -->
						<!--<img src="assets/images/mainwork.jpg" alt="image">-->
						<br>
						<div class="media-body">
							<h3 class="text-uppercase resume-section-heading mb-4">Forma parte de la gran cantidad de usuarios que usan nuestra plataforma, como enlace para conseguir los mejores empleos.</h3>
						</div><!--//media-body-->
					</div>
				</div><!--//resume-intro-->
				<hr>
				<div class="resume-body">
					<div class="row">
						<div class="resume-main col-12 col-lg-8 col-xl-9 pr-0 pr-lg-5">
							<section class="work-section py-3">
								<h3 class="text-uppercase resume-section-heading mb-4">Crea facilmente tu CV</h3>
								<div class="item mb-3">
									<div class="item-heading row align-items-center mb-2">
										<h4 class="item-title col-12 col-md-6 col-lg-8 mb-2 mb-md-0">En pocos pasos te ayudamos</h4>
									</div>
									<div class="item-content">
										<p>Cada vez son mas las empresas que se sumergen en el mundo digital, estan buscando personal preparado nosotros te ayudaremos en pocos pasos a que des el salto digital, y que tu CV este al alcance de las mejores empresas.</p>
										<ul class="resume-list">
											<li>Registrate</li><a class="btn btn-primary" href="registrousuario.php?xme!r=<?php echo $_SESSION['t_usuario'];?>
" target=""><i class="fas fa-external-link-alt mr-2"></i>Quiero registrarme</a>
											<li>Llena tu perfil</li>
											<li>Necesitas imprimir tu Curriculum Vitae?, Estas a solo un click</li>
										</ul>
									</div>
								</div><!--//item-->
								<h3 class="text-uppercase resume-section-heading mb-4">Eres Empresa?</h3>
								<div class="item mb-3">
									<div class="item-heading row align-items-center mb-2">
										<h4 class="item-title col-12 col-md-6 col-lg-8 mb-2 mb-md-0">Dejanos ayudarte en tu busqueda</h4>
									</div>
									<div class="item-content">
										<p>Sabemos que el capital humano para tu empresa es valioso y por ello solo buscas al mejor, permitenos ayudar a tu empresa en la mejor seleccion de tus candidatos a los valiosos puestos que necesitas ocupar, para que logres los objetivos propuestos</p>
										<ul class="resume-list">
											<li>Registra tu empresa en la lista de empresas ofertantes</li><a class="btn btn-primary" href="registrousuario.php?xme!r=<?php echo $_SESSION['t_empresa'];?>
" target=""><i class="fas fa-external-link-alt mr-2"></i>Quiero registrarme</a>
											<li>Publica tus vacantes con nosotros</li>
											<li>Encuentra los perfiles adecuados para tus vacantes en nuestra base de datos</li>
										</ul>
									</div>
								</div><!--//item-->
							</section><!--//work-section-->

							
							<!--<section class="project-section py-3">
								<h3 class="text-uppercase resume-section-heading mb-4">Projects</h3>
								<div class="item mb-3">
									<div class="item-heading row align-items-center mb-2">
										<h4 class="item-title col-12 col-md-6 col-lg-8 mb-2 mb-md-0">Project Lorem Ipsum</h4>
										<div class="item-meta col-12 col-md-6 col-lg-4 text-muted text-left text-md-right">Open Source</div>
										
									</div>
									<div class="item-content">
										<p>You can use this section for your side projects. You can <a href="#" class="theme-link">provide a project link here</a> as well. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
										
										
									</div>
								</div>//item-->
								<!-- <div class="item">
									<div class="item-heading row align-items-center mb-2">
										<h4 class="item-title col-12 col-md-6 col-lg-8 mb-2 mb-md-0">Project Sed Fringilla</h4>
										<div class="item-meta col-12 col-md-6 col-lg-4 text-muted text-left text-md-right">Open Source</div>
										
									</div>
									<div class="item-content">
										<p>You can use this section for your side projects. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
										
									</div>
								</div><//item-->
								<!-- <div class="item">
									<div class="item-heading row align-items-center mb-2">
										<h4 class="item-title col-12 col-md-6 col-lg-8 mb-2 mb-md-0">Project Praesent </h4>
										<div class="item-meta col-12 col-md-6 col-lg-4 text-muted text-left text-md-right">Open Source</div>
										
									</div>
									<div class="item-content">
										<p>You can use this section for your side projects. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
										
									</div>
								</div><//item-->
							<!--</section> --><!--//project-section-->	
						</div><!--//resume-main-->
						<!-- <aside class="resume-aside col-12 col-lg-4 col-xl-3 px-lg-4 pb-lg-4">
							<section class="skills-section py-3">
								<h3 class="text-uppercase resume-section-heading mb-4">Skills</h3>
								<div class="item">
									<h4 class="item-title">Technical</h4>
									<ul class="list-unstyled resume-skills-list">
										<li class="mb-2">JavaScript/Angular/React/Vue</li>
										<li class="mb-2">Python/Ruby/PHP<li>
											<li class="mb-2">Node.js/ASP.NET</li>
											<li class="mb-2">PostgreSQL/MySQL</li>
											<li class="mb-2">Object-oriented design</li>
											<li class="mb-2">Design and implement database structures</li>
											<li>Lead and deliver complex software systems</li>
										</ul>
									</div><!//item-->
									<!-- <div class="item">
										<h4 class="item-title">Professional</h4>
										<ul class="list-unstyled resume-skills-list">
											<li class="mb-2">Effective communication</li>
											<li class="mb-2">Team player<li>
												<li class="mb-2">Strong problem solver</li>
												<li>Good time management</li>
											</ul>
										</div>//item-->
									<!-- </section><//skills-section-->
									<!-- <section class="education-section py-3">
										<h3 class="text-uppercase resume-section-heading mb-4">Education</h3>
										<ul class="list-unstyled resume-education-list">
											<li class="mb-3">
												<div class="resume-degree font-weight-bold">MSc in Computer Science</div>
												<div class="resume-degree-org text-muted">University College London</div>
												<div class="resume-degree-time text-muted">2010 - 2011</div>
											</li>
											<li>
												<div class="resume-degree font-weight-bold">BSc Maths and Physics</div>
												<div class="resume-degree-org text-muted">Imperial College London</div>
												<div class="resume-degree-time text-muted">2007 - 2010</div>
											</li>
										</ul>
									</section> --><!--//education-section-->
									<!-- <section class="education-section py-3">
										<h3 class="text-uppercase resume-section-heading mb-4">Awards</h3>
										<ul class="list-unstyled resume-awards-list">
											<li class="mb-3">
												<div class="font-weight-bold">Award Lorem Ipsum</div>
												<div class="text-muted">Microsoft lorem ipsum (2019)</div>
											</li>
											<li>
												<div class="font-weight-bold">Award Donec Sodales</div>
												<div class="text-muted">Oracle Aenean (2017)</div>
											</li>
										</ul>
									</section> --><!--//education-section-->
									<!-- <section class="skills-section py-3">
										<h3 class="text-uppercase resume-section-heading mb-4">Languages</h3>
										<ul class="list-unstyled resume-lang-list">
											<li class="mb-2">English <span class="text-muted">(Native)</span></li>
											<li>Spanish <span class="text-muted">(Professional)</span></li>
										</ul>
									</section> --><!--//certificates-section-->
									<!-- <section class="skills-section py-3">
										<h3 class="text-uppercase resume-section-heading mb-4">Interests</h3>
										<ul class="list-unstyled resume-interests-list mb-0">
											<li class="mb-2">Climbing</li>
											<li class="mb-2">Snowboarding</li>
											<li class="mb-2">Photography</li>
											<li>Travelling</li>
										</ul>
									</section> --><!--//certificates-section-->
									
								<!-- </aside> --><!--//resume-aside-->
							</div><!--//row-->
						</div><!--//resume-body-->
						<hr>
						<div class="resume-footer text-center">
							<ul class="resume-social-list list-inline mx-auto mb-0 d-inline-block text-muted">
								<li class="list-inline-item mb-lg-0 mr-3"><a class="resume-link" href="https://www.facebook.com/profile.php?id=100070748049225"><i class="fab fa-facebook-square fa-2x mr-2" data-fa-transform="down-4"></i><span class="d-none d-lg-inline-block text-muted">Buscanos en facebook</span></a></li>
							</ul>
						</div><!--//resume-footer-->
					</article>
					
				</div><!--//container-->
				
				<footer class="footer text-center py-4">
					<!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
					<small class="copyright text-muted">powered By workele</small>
				</footer>
				
			</div><!--//main-wrapper-->
			

</body>
</html> 

<?php }
}

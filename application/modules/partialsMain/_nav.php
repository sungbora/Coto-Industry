<!-- Navigation -->
<nav id="navbarExample" class="navbar navbar-expand-lg fixed-top navbar-light" aria-label="Main navigation">
		<div class="container">

			<!-- Image Logo -->
			<a class="navbar-brand logo-image" href="index.html"><img src="<?php echo base_url('main/images/logo.svg'); ?>" alt="alternative"></a>

			<!-- Text Logo - Use this if you don't have a graphic logo -->
			<!-- <a class="navbar-brand logo-text" href="index.html">Zinc</a> -->

			<button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
				<ul class="navbar-nav ms-auto navbar-nav-scroll">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#header">Beranda</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#services">Kemitraan</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#projects">Program</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#pricing">Tentang Kami</a>
					</li>
				</ul>
				<span class="nav-item">
					<a class="btn-solid-sm" href="<?php echo site_url('login/Login') ?>">Ayo Mulai!</a>
				</span>
			</div> <!-- end of navbar-collapse -->
		</div> <!-- end of container -->
	</nav> <!-- end of navbar -->
	<!-- end of navigation -->
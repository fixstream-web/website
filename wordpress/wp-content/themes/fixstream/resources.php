<!DOCTYPE html>
<html class="no-js">
<head>
	<title>Fixstream | Resources</title>
	<meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis in tincidunt neque. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut quis elit sed eros viverra interdum.">
	<meta property="og:title" content="test og title">
	<meta name="twitter:title" content="test twitter title">
	<meta property="og:url" content="http://localhost:8888">
	<meta property="og:site_name" content="Fixstream"/>
	<meta property="og:locale" content="en_US">
	<meta property="og:type" content="website">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="/wp-content/themes/fixstream/css/resources.css">
	<script type="text/javascript" src="/wp-content/themes/fixstream/js/head.js" rel="preload" as="script"></script></head>
<body class="page-resources">
	<header class="globalheader">
		<div class="globalheader__navbar">
		<a class="globalheader__link" href="/">
			<img class="globalheader__logo" src="/wp-content/themes/fixstream/img/temp-logo.png" />
		</a>
		<label class="globalnav-button button button-secondary button-small" tabindex="0" for="menuToggle-1"><span class="icon-menu"></span></label>
<input id="menuToggle-1" class="globalnav-toggle hidden" type="checkbox" tabindex="0" />
<nav class="globalnav">
			<ul class="globalnav__toplevel">
				<li class="globalnav__item with-subnav">
					<a class="globalnav__link" href="/platform">Platform</a>
						<input type="checkbox"
							   id="subnavToggle-24"
							   class="globalnav__subnav-toggle hidden"
							   name="platform"
							   
							    /><label class="globalnav__subnav-button" for="subnavToggle-24">+</label>						<ul class="globalnav__subnav">
						<li class="globalnav__item">
							<a class="globalnav__link" href="/platform/agent-less-auto-discovery">Agent-less Auto Discovery
							</a>
						</li>
						<li class="globalnav__item">
							<a class="globalnav__link" href="/platform/machine-learning">Machine Learning
							</a>
						</li>
						<li class="globalnav__item">
							<a class="globalnav__link" href="/platform/transaction-to-infra-correlation">Transaction To Infra Correlation
							</a>
						</li>
						<li class="globalnav__item">
							<a class="globalnav__link" href="/platform/architecture">Architecture
							</a>
						</li>
						<li class="globalnav__item with-subnav">
							<a class="globalnav__link" href="/platform/ecosystem">Ecosystem
							</a>
		        		<input type="checkbox"
		        			   id="subnavToggle-25"
		        			   class="globalnav__subnav-toggle hidden"
		        			   name="ecosystem"
		        			   
		        			    /><label class="globalnav__subnav-button" for="subnavToggle-25">+</label>								<ul class="globalnav__subnav">
						<li class="globalnav__item">
							<a class="globalnav__link" href="/platform/ecosystem/oracle">Oracle
							</a>
						</li>
					</ul>
						</li>
					</ul>
				</li>
				<li class="globalnav__item">
					<a class="globalnav__link" href="/solutions">Solutions</a>
				</li>
				<li class="globalnav__item">
					<a class="globalnav__link" href="/resources">Resources</a>
				</li>
				<li class="globalnav__item with-subnav">
					<a class="globalnav__link" href="/customers">Customers</a>
						<input type="checkbox"
							   id="subnavToggle-26"
							   class="globalnav__subnav-toggle hidden"
							   name="customers"
							   
							    /><label class="globalnav__subnav-button" for="subnavToggle-26">+</label>						<ul class="globalnav__subnav">
						<li class="globalnav__item">
							<a class="globalnav__link" href="/customers/broadcom">Broadcom
							</a>
						</li>
						<li class="globalnav__item">
							<a class="globalnav__link" href="/customers/maxim">Maxim
							</a>
						</li>
						<li class="globalnav__item">
							<a class="globalnav__link" href="/customers/colv">COLV
							</a>
						</li>
						<li class="globalnav__item">
							<a class="globalnav__link" href="/customers/bt">BT
							</a>
						</li>
					</ul>
				</li>
				<li class="globalnav__item">
					<a class="globalnav__link" href="/whats-aiops">What&#x27;s AIOps?</a>
				</li>
				<li class="globalnav__item">
					<a class="globalnav__link" href="/company">Company</a>
				</li>
				<li class="globalnav__item">
					<a class="globalnav__link" href="/blog">Blog</a>
				</li>
				<li class="globalnav__free-trial"><a class="button button-small" href="/free-trial">Free Trial</a></li>
			</ul>
		</nav>
		</div>
		<div class="pageheader">
			<h1 class="pageheader-headline">Resources</h1>
		</div>
		
	</header>
	<main>


<section class="section section-resources-whitepapers page-resources">
			<div class="section-content">
		<h2>Whitepapers</h2>
		<ul class="item-list item-list--large-padding resource__list">
			<?php $args = array( 'post_type' => 'resources', 'posts_per_page' => -1, 'resource-type' => 'whitepapers' );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<li class="item item--50 resource__item">
				<h3 class="resource__title"><?php the_title(); ?></h3>
				<div class="resource__options">
					<a class="button button-small button-secondary button-secondary-orange resource__link" href="<?php echo get_permalink(); ?>">More</a>
					<a class="button button-small resource__link">Download</a>
				</div>
			</li>
		<?php endwhile; ?>
		</ul>
			</div>
		</section>
<section class="section section-resources-case-studies page-resources">
			<div class="section-content">
		<h2>Case Studies</h2>
		<ul class="item-list resource__list">
		<?php $args = array( 'post_type' => 'resources', 'posts_per_page' => -1, 'resource-type' => 'case-studies' );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<li class="item item--25 resource__item">
				<h3 class="resource__title"><?php the_title(); ?></h3>
				<div class="resource__options">
					<a class="button button-small button-secondary button-secondary-orange resource__link" href="<?php echo get_permalink(); ?>">More</a>
					<a class="button button-small resource__link">Download</a>
				</div>
			</li>
		<?php endwhile; ?>
		</ul>
			</div>
		</section>
<section class="section section-resources-tech-docs page-resources">
			<div class="section-content">
		<h2>Tech Docs</h2>
		<ul class="item-list resource__list">
		<?php $args = array( 'post_type' => 'resources', 'posts_per_page' => -1, 'resource-type' => 'tech-docs' );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<li class="item item--50 resource__item">
				<h3 class="resource__title"><?php the_title(); ?></h3>
				<div class="resource__options">
					<a class="button button-small button-secondary button-secondary-orange resource__link" href="<?php echo get_permalink(); ?>">More</a>
					<a class="button button-small resource__link">Download</a>
				</div>
			</li>
		<?php endwhile; ?>
		</ul>
			</div>
		</section>

<section class="section section-resources-videos page-resources">
			<div class="section-content">
		<h2>Videos</h2>
		<ul class="item-list resource__list">
		<?php $args = array( 'post_type' => 'resources', 'posts_per_page' => -1, 'resource-type' => 'videos' );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<li class="item item--33 resource__item">
				<h3 class="resource__title"><?php the_title(); ?></h3>
				<div class="resource__options">
					<a href="<?php echo get_permalink(); ?>" class="button button-small resource__link">Watch</a>
				</div>
			</li>
		<?php endwhile; ?>
		</ul>
			</div>
		</section>
<section class="section section-resources-form page-resources">
			<div class="section-content">

<form
	id="resourcesForm"
	class="resource-gate-form"
	method=""
	action=""
	name="resources-form">
				<label for="resource-gate-first-name" >First Name<sup>*</sup></label>
			<input type="text"
				   id="resource-gate-first-name"
				   class="cookies-first-name"
				   name="first-name"
				   
				   required />
				<label for="resource-gate-last-name" >Last Name</label>
			<input type="text"
				   id="resource-gate-last-name"
				   class="cookies-last-name"
				   name="last-name"
				   
				    />
				<label for="resource-gate-email" >Email<sup>*</sup></label>
			<input type="email"
				   id="resource-gate-email"
				   class="cookies-email"
				   name="email"
				   
				   required />
				<label for="resource-gate-company" >Company</label>
			<input type="text"
				   id="resource-gate-company"
				   class="cookies-company"
				   name="company"
				   
				    />
				<label for="resource-gate-job-title" >Job Title</label>
			<input type="text"
				   id="resource-gate-job-title"
				   class="cookies-job-title"
				   name="job-title"
				   
				    />
				<label for="resource-gate-phone" >Phone</label>
			<input type="tel"
				   id="resource-gate-phone"
				   class="cookies-phone"
				   name="phone"
				   
				    />
	<input type="submit" id="resource-gate-submit" value="Submit" />
</form>
			</div>
		</section>

	</main>
	<footer class="globalfooter">
		<nav class="globalfooter__nav">
			<ul class="globalfooter__nav-list">
				<li class="globalfooter__nav-item">
					<a class="globalfooter__nav-link" href="/platform">Platform</a>
						<ul class="globalfooter__subnav">
						<li class="globalfooter__nav-item">
							<a class="globalfooter__nav-link" href="/platform/agent-less-auto-discovery">Agent-less Auto Discovery
							</a>
						</li>
						<li class="globalfooter__nav-item">
							<a class="globalfooter__nav-link" href="/platform/machine-learning">Machine Learning
							</a>
						</li>
						<li class="globalfooter__nav-item">
							<a class="globalfooter__nav-link" href="/platform/transaction-to-infra-correlation">Transaction To Infra Correlation
							</a>
						</li>
						<li class="globalfooter__nav-item">
							<a class="globalfooter__nav-link" href="/platform/architecture">Architecture
							</a>
						</li>
						<li class="globalfooter__nav-item with-subnav">
							<a class="globalfooter__nav-link" href="/platform/ecosystem">Ecosystem
							</a>
								<ul class="globalfooter__subnav">
						<li class="globalfooter__nav-item">
							<a class="globalfooter__nav-link" href="/platform/ecosystem/oracle">Oracle
							</a>
						</li>
					</ul>
						</li>
					</ul>
				</li>
				<li class="globalfooter__nav-item">
					<a class="globalfooter__nav-link" href="/solutions">Solutions</a>
				</li>
				<li class="globalfooter__nav-item">
					<a class="globalfooter__nav-link" href="/resources">Resources</a>
				</li>
				<li class="globalfooter__nav-item">
					<a class="globalfooter__nav-link" href="/customers">Customers</a>
						<ul class="globalfooter__subnav">
						<li class="globalfooter__nav-item">
							<a class="globalfooter__nav-link" href="/customers/broadcom">Broadcom
							</a>
						</li>
						<li class="globalfooter__nav-item">
							<a class="globalfooter__nav-link" href="/customers/maxim">Maxim
							</a>
						</li>
						<li class="globalfooter__nav-item">
							<a class="globalfooter__nav-link" href="/customers/colv">COLV
							</a>
						</li>
						<li class="globalfooter__nav-item">
							<a class="globalfooter__nav-link" href="/customers/bt">BT
							</a>
						</li>
					</ul>
				</li>
				<li class="globalfooter__nav-item">
					<a class="globalfooter__nav-link" href="/whats-aiops">What&#x27;s AIOps?</a>
				</li>
				<li class="globalfooter__nav-item">
					<a class="globalfooter__nav-link" href="/company">Company</a>
				</li>
				<li class="globalfooter__nav-item">
					<a class="globalfooter__nav-link" href="/blog">Blog</a>
				</li>
			</ul>
		</nav>
		<ul class="globalfooter__social">
			<li class="globalfooter__social-item"><span class="icon-twitter"></span></li>
			<li class="globalfooter__social-item"><span class="icon-linkedin"></span></li>
			<li class="globalfooter__social-item"><span class="icon-youtube2"></span></li>
		</ul>
		<small class="globalfooter__copyright">© Copyright <?php echo copyright_year(); ?> | <a href="#">Terms of Use</a> | <a href="">Privacy Policy</a></small>
	</footer>
	<script type="text/javascript" src="/wp-content/themes/fixstream/js/resources.js"></script>
	<?php wp_footer(); ?>
	<script type="text/javascript" src='https://crm.zoho.com/crm/javascript/zcga.js'></script>
</body>
</html>
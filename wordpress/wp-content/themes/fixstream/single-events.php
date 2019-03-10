<!DOCTYPE html>
<html class="no-js">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="/wp-content/themes/fixstream/css/single-events.css">
	<script type="text/javascript" src="/wp-content/themes/fixstream/js/head.js" rel="preload" as="script"></script></head>
<body class="page-single-events">
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
							   id="subnavToggle-30"
							   class="globalnav__subnav-toggle hidden"
							   name="platform"
							   
							    /><label class="globalnav__subnav-button" for="subnavToggle-30">+</label>						<ul class="globalnav__subnav">
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
		        			   id="subnavToggle-31"
		        			   class="globalnav__subnav-toggle hidden"
		        			   name="ecosystem"
		        			   
		        			    /><label class="globalnav__subnav-button" for="subnavToggle-31">+</label>								<ul class="globalnav__subnav">
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
							   id="subnavToggle-32"
							   class="globalnav__subnav-toggle hidden"
							   name="customers"
							   
							    /><label class="globalnav__subnav-button" for="subnavToggle-32">+</label>						<ul class="globalnav__subnav">
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

	</header>		
	<main>
		<article>
			
<section class="section section-single-event page-single-events">
			<div class="section-content">
	<div class="single-event">

		<div class="single-event__header">
			<h1 class="single-event__name"><?php the_title(); ?></h1>
			<?php if( get_field('message') ): ?>
			<p><?php echo the_field('message'); ?></p>
			<?php endif; ?>
		</div>

		<div class="single-event__info">
			<?php if( get_field('event_start_date') || get_field('event_start_date') ): ?>
			<p><?php if( get_field('event_start_date') ): ?><?php echo the_field('event_start_date'); ?><?php endif; ?><?php if( get_field('event_end_date') ): ?> - <?php echo the_field('event_end_date'); ?><?php endif; ?></p>
			<?php endif; ?>


			<?php if( get_field('location_or_booth') ): ?>
			<p><?php echo the_field('location_or_booth'); ?></p>
			<?php endif; ?>

			<?php if( get_field('street_address') ): ?>
			<p><?php echo the_field('street_address'); ?></p>
			<?php endif; ?>

			<?php if( get_field('city') || get_field('state') || get_field('country') ): ?>
			<p><?php if( get_field('city') ): ?><?php echo the_field('city'); ?><?php endif; ?><?php if( get_field('city') && get_field('state') ): ?>, <?php endif; ?><?php if( get_field('state') ): ?><?php echo the_field('state'); ?><?php endif; ?><?php if( get_field('country') ): ?> <?php echo the_field('country'); ?><?php endif; ?></p>
			<?php endif; ?>
	
		</div>

	</div>
	
			</div>
		</section>  


		</article>
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
	<?php wp_footer(); ?>
	<script type="text/javascript" src='https://crm.zoho.com/crm/javascript/zcga.js'></script>
</body>
</html>
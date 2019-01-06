<!DOCTYPE html>
<html class="no-js">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="/wp-content/themes/fixstream/css/single.css">
	<script type="text/javascript" src="/wp-content/themes/fixstream/js/single.js"></script>
</head>
<body class="page-single">
	<header class="globalheader">
		<div class="globalheader__navbar">
		<a class="globalheader__link" href="/">
			<img class="globalheader__logo" src="/wp-content/themes/fixstream/img/temp-logo.png" />
		</a>
		<label class="globalnav-button button button-small" for="menuToggle-1">#</label>
<input id="menuToggle-1" class="globalnav-toggle hidden" type="checkbox" />
<nav class="globalnav">
			<ul class="globalnav__toplevel">
				<li class="globalnav__item with-subnav">
					<a class="globalnav__link" href="/platform">Platform</a>
						<input
							type="checkbox"
							id="subnavToggle-33"
							class="globalnav__subnav-toggle hidden"
							name="platform"
						 /><label class="globalnav__subnav-button" for="subnavToggle-33">+</label>						<ul class="globalnav__subnav">
						<li class="globalnav__item">
							<a class="globalnav__link" href="/platform/agent-less-auto-discovery">- Agent-less Auto Discovery
							</a>
						</li>
						<li class="globalnav__item">
							<a class="globalnav__link" href="/platform/machine-learning">- Machine Learning
							</a>
						</li>
						<li class="globalnav__item">
							<a class="globalnav__link" href="/platform/transaction-to-infra-correlation">- Transaction To Infra Correlation
							</a>
						</li>
						<li class="globalnav__item">
							<a class="globalnav__link" href="/platform/architecture">- Architecture
							</a>
						</li>
						<li class="globalnav__item with-subnav">
							<a class="globalnav__link" href="/platform/ecosystem">- Ecosystem
							</a>
		        		<input
		        			type="checkbox"
		        			id="subnavToggle-34"
		        			class="globalnav__subnav-toggle hidden"
		        			name="ecosystem"
		        		 /><label class="globalnav__subnav-button" for="subnavToggle-34">+</label>								<ul class="globalnav__subnav">
						<li class="globalnav__item">
							<a class="globalnav__link" href="/platform/ecosystem/oracle">- Oracle
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
						<input
							type="checkbox"
							id="subnavToggle-35"
							class="globalnav__subnav-toggle hidden"
							name="customers"
						 /><label class="globalnav__subnav-button" for="subnavToggle-35">+</label>						<ul class="globalnav__subnav">
						<li class="globalnav__item">
							<a class="globalnav__link" href="/customers/broadcom">- Broadcom
							</a>
						</li>
						<li class="globalnav__item">
							<a class="globalnav__link" href="/customers/maxim">- Maxim
							</a>
						</li>
						<li class="globalnav__item">
							<a class="globalnav__link" href="/customers/colv">- COLV
							</a>
						</li>
						<li class="globalnav__item">
							<a class="globalnav__link" href="/customers/bt">- BT
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
				<li class="globalnav__free-trial"><a class="button" href="/free-trial">Free Trial</a></li>
			</ul>
		</nav>

	</header>		
	<article>
		
	<div class="section-content">
		<?php if (have_posts()) : while (have_posts()) : the_post();?>
		<main>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
		</main>

		<?php $post = get_field('attribution');
		if( $post ): ?>
		<aside>
			<h4>About the author</h4>
			<?php setup_postdata($post); ?>
				<?php the_title(); ?>
			<?php wp_reset_postdata(); ?>
		</aside>
		<?php endif; ?>

		<?php endwhile; endif; wp_reset_query(); ?>
	</div>


	</article>
	<footer class="globalfooter">
		<ul class="globalfooter__social">
			<li class="globalfooter__social-item">TW</li>
			<li class="globalfooter__social-item">LI</li>
			<li class="globalfooter__social-item">YT</li>
		</ul>
		<nav class="globalfooter__nav">
			<ul class="globalfooter__nav-list">
				<li class="globalfooter__nav-item"><a class="globalfooter__nav-link" href="/platform">Platform</a></li>
				<li class="globalfooter__nav-item"><a class="globalfooter__nav-link" href="/solutions">Solutions</a></li>
				<li class="globalfooter__nav-item"><a class="globalfooter__nav-link" href="/resources">Resources</a></li>
				<li class="globalfooter__nav-item"><a class="globalfooter__nav-link" href="/customers">Customers</a></li>
				<li class="globalfooter__nav-item"><a class="globalfooter__nav-link" href="/whats-aiops">What&#x27;s AIOps?</a></li>
				<li class="globalfooter__nav-item"><a class="globalfooter__nav-link" href="/company">Company</a></li>
				<li class="globalfooter__nav-item"><a class="globalfooter__nav-link" href="/blog">Blog</a></li>
				<li class="globalfooter__free-trial"><a class="button" href="/free-trial">Free Trial</a></li>
			</ul>
		</nav>
	</footer>
	<?php wp_footer(); ?> 
</body>
</html>
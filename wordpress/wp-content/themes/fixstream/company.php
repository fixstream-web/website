<!DOCTYPE html>
<html class="no-js">
<head>
	<title>Fixstream | Company</title>
	<meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis in tincidunt neque. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut quis elit sed eros viverra interdum.">
	<meta property="og:title" content="test og title">
	<meta name="twitter:title" content="test twitter title">
	<meta property="og:url" content="https://fixstream.com">
	<meta property="og:site_name" content="Fixstream"/>
	<meta property="og:locale" content="en_US">
	<meta property="og:type" content="website">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="/wp-content/themes/fixstream/css/company.css">
	<script type="text/javascript" src="/wp-content/themes/fixstream/js/company.js"></script>
</head>
<body class="page-company">
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
							id="subnavToggle-6"
							class="globalnav__subnav-toggle hidden"
							name="platform"
						 /><label class="globalnav__subnav-button" for="subnavToggle-6">+</label>						<ul class="globalnav__subnav">
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
		        			id="subnavToggle-7"
		        			class="globalnav__subnav-toggle hidden"
		        			name="ecosystem"
		        		 /><label class="globalnav__subnav-button" for="subnavToggle-7">+</label>								<ul class="globalnav__subnav">
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
							id="subnavToggle-8"
							class="globalnav__subnav-toggle hidden"
							name="customers"
						 /><label class="globalnav__subnav-button" for="subnavToggle-8">+</label>						<ul class="globalnav__subnav">
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
		</div>
		
	</header>
	<main>
		 
		<section class="section section-hero">
			<div class="section-content">
				<h1 class="section-headline hero-headline">About FixStream</h1>
				<a class="section-cta hero-cta button" href="/company">Get in touch</a>
			</div>
		</section>
		
<section class="section section-company-leardership">
			<div class="section-content">
		<div class="row">
			<div class="leadership-leaders col-x">
				<h2>Leadership</h2>
				<?php $args = array( 'post_type' => 'team', 'posts_per_page' => -1, 'group' => 'leadership', 'order' => 'ASC' );
				$loop = new WP_Query( $args );
				if ($loop->have_posts() ) : ?>
				<ul class="leadership-list">
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<li class="leadership-item">
						<a class="leadership-link" href="<?php echo get_permalink(); ?>">
							<h3 class="leadership-header"><?php the_title(); ?></h3>
						</a>
						<span class="leadership-title"><?php the_field('job_title'); ?></span>
					</li>
					<?php endwhile;?>
				</ul>
				<?php endif; ?>
			</div>
			<div class="leadership-board  col-x">
				<h2>Board</h2>
				<?php $args = array( 'post_type' => 'team', 'posts_per_page' => -1, 'group' => 'board', 'order' => 'ASC' );
				$loop = new WP_Query( $args );
				if ($loop->have_posts() ) : ?>
				<ul class="leadership-list">
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<li class="leadership-item">
						<a class="leadership-link" href="<?php echo get_permalink(); ?>">
							<h3 class="leadership-header"><?php the_title(); ?></h3>
						</a>
						<span class="leadership-title"><?php the_field('job_title'); ?></span>
						<?php if( get_field('company') ): ?>
						<span class="leadership-company">at <?php the_field('company'); ?></span>
						<?php endif; ?>
					</li>
					<?php endwhile;?>
				</ul>
				<?php endif; ?>
			</div>
		</div>
			</div>
		</section>

<section class="section section-company-press-releases">
			<div class="section-content">
		<h2>Press Releases</h2>

		<?php $args = array( 'post_type' => 'news', 'posts_per_page' => 4, 'news-type' => 'press-releases' );
		$loop = new WP_Query( $args );
		if ($loop->have_posts() ) : ?>
		<ul class="press-releases-list">
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<li class="press-releases-item">
				<a class="press-releases-link" href="<?php echo get_permalink(); ?>">
					<h3 class="press-releases-header"><?php the_title(); ?></h3>
				</a>
			</li>
			<?php endwhile;?>
		</ul>
		<?php endif; ?>
			</div>
		</section>

<section class="section section-company-news-mentions">
			<div class="section-content">
		<h2>In The News</h2>

		<?php $args = array( 'post_type' => 'news', 'posts_per_page' => 7, 'news-type' => 'mentions' );
		$loop = new WP_Query( $args );
		if ($loop->have_posts() ) : ?>
		<ul class="news-mentions-list">
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<li class="news-mentions-item">
				<span class="news-mention-publisher"><?php echo the_field('publisher_name') ?></span>
				<a class="news-mentions-link" href="<?php echo the_field('source'); ?>" target="_blank">
					<h3 class="news-mentions-header"><?php the_title(); ?></h3>
				</a>
				<?php if( get_field('show_date') ): ?>
				<span class="news-mention-date"><?php echo get_the_date('F n, Y') ?></span>
				<?php endif; ?>
			</li>
			<?php endwhile;?>
		</ul>
		<?php endif; ?>

			</div>
		</section>

<section class="section section-company-form">
			<div class="section-content">

		<form id="companyForm" class="company-form-form">
				<label for="first-name">First Name</label>
			<input
				type="text"
				id="company-form-first-name"
				name="first-name"
			 />
				<label for="last-name">Last Name</label>
			<input
				type="text"
				id="company-form-last-name"
				name="last-name"
			 />
				<label for="email">Email</label>
			<input
				type="email"
				id="company-form-email"
				name="email"
			 />
				<label for="company">Company</label>
			<input
				type="text"
				id="company-form-company"
				name="company"
			 />
				<label for="job-title">Job Title</label>
			<input
				type="text"
				id="company-form-job-title"
				name="job-title"
			 />
				<label for="phone">Phone</label>
			<input
				type="tel"
				id="company-form-phone"
				name="phone"
			 />
			<input type="submit" id="company-form-submit" value="Submit" />
		</form>
			</div>
		</section>


	</main>
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
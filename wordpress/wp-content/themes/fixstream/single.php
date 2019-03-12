<!DOCTYPE html>
<html class="no-js">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="/wp-content/themes/fixstream/css/single.css">
	<script type="text/javascript" src="/wp-content/themes/fixstream/js/head.js" rel="preload" as="script"></script></head>
<body class="page-single">
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
							   id="subnavToggle-48"
							   class="globalnav__subnav-toggle hidden"
							   name="platform"
							   
							    /><label class="globalnav__subnav-button" for="subnavToggle-48">+</label>						<ul class="globalnav__subnav">
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
		        			   id="subnavToggle-49"
		        			   class="globalnav__subnav-toggle hidden"
		        			   name="ecosystem"
		        			   
		        			    /><label class="globalnav__subnav-button" for="subnavToggle-49">+</label>								<ul class="globalnav__subnav">
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
							   id="subnavToggle-50"
							   class="globalnav__subnav-toggle hidden"
							   name="customers"
							   
							    /><label class="globalnav__subnav-button" for="subnavToggle-50">+</label>						<ul class="globalnav__subnav">
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
			
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<div class="section-content">
		<div class="blog-header">
			<h1><?php the_title(); ?></h1>
			<?php $cats = get_the_category(get_the_ID()); ?>

			<?php if (!in_category("Uncategorized")): ?>
			<div class="tags-row">
				<?php foreach ($cats as $cat) { ?>
		        <a class="tag__link" href="<?php echo get_category_link($cat->term_id); ?>">
		        	<span class="tag tag--small tag--<?php echo $cat->slug; ?> blog-archive__tag"><?php echo $cat->name ?></span>
		        </a>
		  		<?php } ?>
			</div>
			<?php endif; ?>
		</div>
		<?php the_content(); ?>
	</div>

	<?php $post = get_field('attribution');
	if( $post ): ?>
	
	<aside>
		<div class="section-content">
			<h4>About the author</h4>
			<?php setup_postdata($post); ?>
			<?php the_title(); ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</aside>
	
	<?php endif; ?>

	<?php endwhile; endif; wp_reset_query(); ?>


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
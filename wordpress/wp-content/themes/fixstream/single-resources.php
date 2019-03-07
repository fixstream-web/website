<!DOCTYPE html>
<html class="no-js">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="/wp-content/themes/fixstream/css/single-resources.css">
	<script type="text/javascript" src="/wp-content/themes/fixstream/js/head.js" rel="preload" as="script"></script></head>
<body class="page-single-resources">
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
			
    <?php if (have_posts()) : while (have_posts()) : the_post();
    $single = makeSingleCategory($post->ID);
    ?>

    <div class="resource-row">

<section class="section section-single-resource page-single-resources">
			<div class="section-content">
    <span class="tag tag--<?php echo $single['class'] ?> single-resource__tag"><?php echo $single['termName'] ?></span>
	<h1 class="single-resource__header"><?php the_title(); ?></h1>
    <?php if (get_the_excerpt()): ?>
    <blockquote class="single-resource__excerpt"><?php echo get_the_excerpt() ?></blockquote>
     <?php endif; ?>
			</div>
		</section>

<section class="section section-resource-gate page-single-resources">
			<div class="section-content">
        <form
        	id="resourcesForm"
        	class="resource-gate-form"
        	method=""
        	action=""
        	name="resource-gate">
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
        	<input type="submit" id="resource-gate-submit" value="<?php if ($single['termName'] == 'Videos'): ?>Watch<?php else: ?>Download<?php endif ?> this <?php echo $single['singular']; ?>" />
        </form>			</div>
		</section>
    </div>

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
	<script type="text/javascript" src="/wp-content/themes/fixstream/js/single-resources.js"></script>
	<?php wp_footer(); ?>
	<script type="text/javascript" src='https://crm.zoho.com/crm/javascript/zcga.js'></script>
</body>
</html>
	<footer>

		<div class="row">

			<div class="small-12 medium-4 columns">
				<?php wp_nav_menu(array('theme_location' => 'footer', 'menu_class' => 'vertical menu')); ?>
			</div>
			<div class="small-12 medium-4 columns">
				<ul class="sidebar menu vertical">
					<?php if ( ! dynamic_sidebar('footer1') ) : ?>
						<li class="text-center">{static sidebar item 1}</li>
					<?php endif; ?>
				</ul>
			</div>
			<div class="small-12 medium-4 columns">
				<ul class="sidebar menu vertical">
					<?php if ( ! dynamic_sidebar('footer2') ) : ?>
						<li>{static sidebar item 1}</li>
					<?php endif; ?>
				</ul>
			</div>

		</div>

		<div class="row">

			<div class="small-12 columns">
				&copy; <?php echo date('Y'); ?> <?php bloginfo('title'); ?>
			</div>

		</div>

	</footer>

	</div>

</div>
<?php wp_footer(); ?>
</body>
</html>
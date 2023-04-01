
				</section>
            </main>

		<footer>
			<div class="footer-row">
				<div class="footer-col">
					<h4>Site Pages</h4>
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#">Blog</a></li>
					</ul>
				</div>

				<div class="footer-col">
					<h4>Products</h4>
					<ul>
						<li><a href="#">Product A</a></li>
						<li><a href="#">Product B</a></li>
						<li><a href="#">Product C</a></li>
						<li><a href="#">Product D</a></li>
					</ul>
				</div>
				
				<div class="footer-col">
					<h4>Company</h4>
					<ul>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Jobs</a></li>
						<li><a href="#">Press</a></li>
						<li><a href="#">Blog</a></li>
					</ul>
				</div>
				
				<div class="footer-col">
					<h4>Legal</h4>
					<ul>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Terms and Conditions</a></li>
						<li><a href="#">Cookie Policy</a></li>
						<li><a href="#">Disclaimer</a></li>
					</ul>
				</div>

			</div>
			<div class="footer-row">
				<div class="footer-col">
					<div style="display: flex; align-items: center;">
						<hr style="height: 3px; width: 50%; background-color: yellow;">
						<i class="fa fa-star" style="margin: 0 10px; font-size:55px; color: yellow;"></i>
						<hr style="height: 3px; width: 50%; background-color: yellow;">
					</div>
				</div>
			</div>
			<div class="footer-row">
				<div class="footer-col">
				<p>&copy;  
				<?php
				echo get_theme_mod('footer_copyright_established');
				$year = date('Y');
				echo " - $year ";
				bloginfo('name'); ?>. All rights reserved.</p>
				</div>
			</div>
		</footer>
	</body>
</html>		

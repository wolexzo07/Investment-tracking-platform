  <section class="menu cid-rUE69IwtuZ" once="menu" id="menu2-n">

	<nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="./">
                        <img src="image/logboss.png" alt="Xelow-gc" title="" style="height: 3.8rem;"/>
                    </a>
                </span>
                
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<?php
			use Jenssegers\Agent\Agent;
			$agent = new Agent();
			$desktop = $agent->isDesktop();
			if($desktop){
				?>
			   <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item">
                  <a class="nav-link link text-black display-4" href="#testimonials-slider1-g"><span class="mbrib-users mbr-iconfont mbr-iconfont-btn"></span>Testimonials</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link link text-black display-4" href="#pricing-tables1-p"><span class="mbrib-cash mbr-iconfont mbr-iconfont-btn"></span>Investment Plans&nbsp;</a>
                </li><!---<li class="nav-item dropdown"><a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true"><span class="mbrib-briefcase mbr-iconfont mbr-iconfont-btn"></span>Services&nbsp;</a>
				<div class="dropdown-menu">
				<a class="text-black dropdown-item display-4" href="#">New Item</a>
				<a class="text-black dropdown-item display-4" href="#">New Item</a>
				<a class="text-black dropdown-item display-4" href="#">New Item</a>
				<a class="text-black dropdown-item display-4" href="#">New Item</a></div></li>---></ul>
            	
				<?php
			}
		?>
		<?php
		if(!$desktop){
			?>
		 <div class="navbar-buttons mbr-section-btn">
		<a class="btn btn-sm btn-success display-4" href="ApplicationForm"><span class="mbrib-responsive mbr-iconfont mbr-iconfont-btn"></span>Create an account</a>
		</div>
		<div class="navbar-buttons mbr-section-btn">
			<a class="btn btn-sm btn-primary display-4" href="ApplicationLogin"><span class="mbrib-responsive mbr-iconfont mbr-iconfont-btn"></span>Login into account</a>
			</div>
			<?php
		}else{
			?>
			 <div class="navbar-buttons mbr-section-btn">
			<a class="btn btn-sm btn-primary display-4" href="ApplicationLogin"><span class="mbrib-responsive mbr-iconfont mbr-iconfont-btn"></span>Login</a>
			</div>
			<?php
		}
		?>
        
        </div>
    </nav>
</section>
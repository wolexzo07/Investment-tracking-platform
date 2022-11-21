<ul class="list-unstyled components">

					<li class="active">
					  <a href="./ApplicationView">
                            <i class="glyphicon glyphicon-dashboard"></i>
                            Dashboard
                        </a>
					</li>

					<?php
					$uid = x_clean($_SESSION["IQGAMES_ID_2018_VISION"]);
						if(x_count("userdb_bank","is_verified_agent='1' AND id='$uid'") > 0){
							?>	<li>
								  <a href="#" onclick="load('agentearning')">
			                            <i class="fa fa-money"></i>
			                           Earnings
			                        </a>
								</li><?php
						}else{

						}
					?>

			<li>
					  <a href="#" onclick="load('walletfunder')">
                            <i class="fa fa-cc-mastercard"></i>
                             Fund Wallet
                        </a>
					</li>

<hr />				   
				   
				   <!----<li>
                        <a href="#savingBoss" data-toggle="collapse" aria-expanded="false"><i class="fa fa-bank"></i> Savings Manager</a>
                        <ul class="collapse list-unstyled" id="savingBoss">
                            <li><a href="#" onclick="load('create_savings')"><i class="fa fa-database"></i>
                             Create Savings</a></li>
                            <li><a href="#" onclick="load('track_savings')"><i class="fa fa-calendar"></i>
                            Track Savings</a></li>
                          
                        </ul>
                    </li>--->
				   
				   <li>
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"><i class="fa fa-briefcase"></i> Investments </a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="#" onclick="load('playgames')"><i class="fa fa-database"></i>
                             Create Investments</a></li>
                            <li><a href="#" onclick="load('playedgames')"><i class="fa fa-calendar"></i>
                            Track Investments</a></li>
                          
                        </ul>
                    </li>
					
					<!---<li>
					  <a href="#" onclick="load('incomePlans')">
                            <i class="fa fa-money"></i>
                           Income Plans
						   
                        </a>
					</li>
					
					<li>
					  <a href="#" onclick="load('SpecialOffers')">
                            <i class="fa fa-gift"></i>
                           Special Offers
						   <span id="noteit" class="badge pull-right">0</span>
                        </a>
					</li>
					<hr />
					--->
					
					
					<li>
					  <a href="#" onclick="load('bankd')">
                            <i class="fa fa-bank"></i>
                            Add Bank Details
                        </a>
					</li>

					<li>
					  <a href="#" onclick="load('track_details')">
                            <i class="fa fa-signal"></i>
                            Transactions
                        </a>
					</li>

					<li>
					  <a href="#" onclick="load('wallet_manager')">
                            <i class="glyphicon glyphicon-credit-card"></i>
                           Wallet Manager
                        </a>
					</li>

			<hr />

					<li>
					  <a href="#" onclick="load('developerbase')">
                            <i class="fa fa-github"></i>
                           Developer Tools
                        </a>
					</li>

					<li>
					  <a href="#" onclick="load('referral_base')">
                            <i class="fa fa-link"></i>
                          Manage Referrals
                        </a>
					</li>

						<hr/>
						
					<li>
					  <a href="#" onclick="load('faqbase')">
                            <i class="fa fa-question-circle"></i>
                          FAQ
                        </a>
					</li>

						<li>
					  <a href="#" onclick="load('testify')">
                            <i class="glyphicon glyphicon-edit"></i>
                           Testify
                      </a>
					</li>

					<li>
					  <a href="#" onclick="load('contactbase')">
                            <i class="fa fa-envelope-o"></i>
                            Contact us
                        </a>
					</li>

					 <li>
                        <a href="#" onclick="load('notifyme')">
                            <i class="fa fa-bell"></i>
                            Notifications <span id="noteit" class="badge pull-right">
	<?php
	$user = x_clean($_SESSION["IQGAMES_ID_2018_VISION"]);
	$cut = x_count("notifyme","type='all' AND status='0' OR type='p' AND user_id='$user' AND status='0' LIMIT 1");
	echo $cut;
	?></span>
                        </a>
                    </li>
				
<hr/>
					<li>
					  <a href="#" onclick="load('profileman')">
                            <i class="fa fa-cog"></i>
                           Settings
                        </a>
					</li>



					<li>
                        <a href="../logout">
                            <i class="glyphicon glyphicon-log-out"></i>
                            Logout
                        </a>
                    </li>
                </ul>
<style>
#noteit{
	color:black;
	background-color:white;
}
</style>
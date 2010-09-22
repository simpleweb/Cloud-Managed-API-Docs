<?php
//Let's get cracking. Include the Swim API lib. This is known as LucidGecko.
require_once('LucidGecko/LucidGecko.php');

//Include a config file with our api details.
require_once('config.php');

//Create an instance of the API Lib. This is like this with getInstance because the class is implemented as a singleton.
$lucidGecko = LucidGecko::getInstance(PLUGIN_KEY, PLUGIN_SECRET);

//Information for the logged in user.
?>
<swm:page>Context Information</swm:page>


<h3>What information does SWM pass your app?</h3>

	
		<h4>User Details</h4>
		
		<p>It's easy to get details of the currently logged in user:</p>
		
		<table>
			<tr>
				<th>Property</th>
				<th>Current Value</th>
			</tr>			
			<tr>
				<td>
					UserID
				</td>
				<td>
					<?=$lucidGecko->user['ID']?>
				</td>
			</tr>
			<tr>
				<td>
					Forename
				</td>
				<td>
					<swm:user id="<?=$lucidGecko->user['ID']?>" detail="forename" />
				</td>
				
			</tr>		
			<tr>
				<td>
					Surname
				</td>
				<td>
					<swm:user id="<?=$lucidGecko->user['ID']?>" detail="surname" />
				</td>
			</tr>
			<tr>
				<td>
					Full Name
				</td>
				<td>
					<swm:user id="<?=$lucidGecko->user['ID']?>" detail="name" />
				</td>
			</tr>			
				
		</table>

		<p>The UserID is a unique integer for each user in SWM and can therefore be used as a key for storing user specific data.</p>
		
		<p>You can easily determine if the user is a reseller or the client of a reseller by checking <code>$lucidGecko->user['IsReseller']</code></p>
		<?
		
		
		if( $lucidGecko->user['IsReseller']) {
			echo '<swm:user id="'. $lucidGecko->user['GUID']. '" detail="name" /> <strong>is a reseller.</strong>';	
		} else {
			echo $lucidGecko->user['Name'] . ' is NOT reseller.';
		}
		?>
	

	
		<h4>Call Location Details</h4>
		
		<p>At the moment, apps are passed limited company information as follows in two arrays.</p>
		
		<p>If you are storing your own data you can use the key as unique company keys. No Reseller or Company can share the same key. If you use the putData method of the API lib, the storage of the information will be taken care of in the correct context location.</p>
		
		<h5>Reseller Context</h5>
		
		<p>Reseller context will ALWAYS be set. This does not mean that the app is being accessed at reseller level as there may also be a <a href="#companycontext">Company Context</a> set.</p>
		
		<table>
			<tr>
				<th>Property</th>
				<th>Current Value</th>
				
			</tr>			
			<tr>
				<td>
					Parent Company Key
				</td>
				<td>
					<?=$lucidGecko->parentCompany['GUID']?>
				</td>
				
			</tr>
			<tr>
				<td>
					Parent Company Name
				</td>
				<td>
					<swm:company companykey="<?=$lucidGecko->parentCompany['GUID']?>" detail="name" />
				</td>
				
			</tr>
		</table>		

		
		<h5 id="companycontext">Company Context</h5>
		
		<p>Company context will only be set if the app is accessed at a client/company level.</p>
		
		<table>
			<tr>
				<th>Property</th>
				<th>Current Value</th>
				
			</tr>			
			<tr>
				<td>
					Company Key
				</td>
				<td>
					<?=$lucidGecko->company['GUID']?>
				</td>
				
			</tr>
			<tr>
				<td>
					Company Name
				</td>
				<td>
					<swm:company companykey="<?=$lucidGecko->company['GUID']?>" detail="name" />
				</td>
				
			</tr>
		</table>
		
		<h5>Location Company Context</h5>
		
		<p>The location company is always set and represents the company the app is installed against. It will have the same values as either Company or Reseller context depending on if the app is called at a client level or reseller level.</p>
		
		<table>
			<tr>
				<th>Property</th>
				<th>Current Value</th>
				
			</tr>			
			<tr>
				<td>
					Location Company Key
				</td>
				<td>
					<?=$lucidGecko->locationCompany['GUID']?>
				</td>
				
			</tr>
			<tr>
				<td>
					Location Company Name
				</td>
				<td>
					<swm:company companykey="<?=$lucidGecko->locationCompany['GUID']?>" detail="name" />
				</td>
				
			</tr>
		</table>
		


	
			<h3>General</h3>		

			<p>
			You also have access to the URL of swim for postbacks.
			</p>
			<p>
			In your markup, if you have a link such as &lt;a href=&quot;//page.htm&quot;&gt; the '//' will automatically be replaced with this full postback url.
			<a href="/index/">A normal root based link</a> | <a href="//index/">A link that SWM has converted to go to the root of the app installation.</a>
			</p>
			
			<p>You can also get the root URL of the app intallation with LucidGecko using <code>$lucidGecko->postbackUrl</code></p>
			
			<?php
			echo '<p><strong>Postback URL:</strong> ' .$lucidGecko->postbackUrl . '<br /></p>';
			?>

	

		
			<h3>Notes:</h3>
				<ul>
					<li>At the moment, you can only place app files in the root of your application.</li>
					<li>The PHP LucidGecko lib uses CURL for communicating with the server so this will need to be enabled.</li>
				</ul>	


<!--You can put the main app nav anywhere in your output and it will be stripped out and moved, just make sure it's in a div ID'd as appNav -->
<?php
require_once('appnav.php');
?>
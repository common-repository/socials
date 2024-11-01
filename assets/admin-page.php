<?php defined('ABSPATH') or die('No script kiddies please!');
/**
 * @package WordPress
 * @subpackage Socials
 *
 * @author RapidDev | Polish technology company
 * @copyright Copyright (c) 2018, RapidDev
 * @link https://www.rapiddev.pl/en/socials
 * @license https://opensource.org/licenses/MIT
 */
	$options = json_decode(get_option('social_sharing'), true);
?>
<div id="rapiddev-wrap" class="wrap">
	<div id="rapiddev-header">
		<div class="rapiddev-header-logo">
			<a href="<?php echo admin_url('/options-general.php?page=social-share'); ?>" class="rapiddev-logo"><img style="width: 180px;" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA4MDI0IDE0MTguNjEiPjxkZWZzPjxzdHlsZT4uY2xzLTF7ZmlsbDojZmZmfTwvc3R5bGU+PC9kZWZzPjxnIGlkPSJMYXllcl8yIiBkYXRhLW5hbWU9IkxheWVyIDIiPjxnIGlkPSJSYXBpZERldl9Tb2NpYWxfU2hhcmluZyIgZGF0YS1uYW1lPSJSYXBpZERldiB8IFNvY2lhbCBTaGFyaW5nIj48ZyBpZD0iU29jaWFsX1NoYXJpbmciIGRhdGEtbmFtZT0iU29jaWFsIFNoYXJpbmciPjxwYXRoIGQ9Ik0xOTc5LjQ3IDgzNS44OXEwLTMzLjItMjMuNDQtNTF0LTg0LjM3LTM3LjVxLTYwLjk1LTE5LjcxLTk2LjQ4LTM4Ljg2LTk2Ljg5LTUyLjM1LTk2Ljg4LTE0MSAwLTQ2LjA4IDI2LTgyLjIzdDc0LjYxLTU2LjQ0cTQ4LjYzLTIwLjMxIDEwOS4xOC0yMC4zMSA2MC45MyAwIDEwOC41OSAyMi4wN3Q3NCA2Mi4zcTI2LjM3IDQwLjI0IDI2LjM3IDkxLjQxaC0xMTcuMTlxMC0zOS4wNi0yNC42MS02MC43NHQtNjkuMTQtMjEuNjhxLTQzIDAtNjYuNzkgMTguMTZ0LTIzLjgzIDQ3Ljg1cTAgMjcuNzUgMjcuOTMgNDYuNDl0ODIuMjIgMzUuMTVxMTAwIDMwLjA5IDE0NS43MSA3NC42MXQ0NS43IDExMC45NHEwIDczLjgzLTU1Ljg2IDExNS44MnQtMTUwLjM5IDQycS02NS42MiAwLTExOS41My0yNFQxNjg5IDkwMy4wOHEtMjguMzItNDEuNzktMjguMzItOTYuODhoMTE3LjYycTAgOTQuMTUgMTEyLjUgOTQuMTQgNDEuNzkgMCA2NS4yMy0xN3QyMy40NC00Ny40NXpNMjY0My41MyA3MTMuNjJxMCA4NC0yOS42OCAxNDcuMjd0LTg1IDk3LjY2cS01NS4yOSAzNC4zOC0xMjYuNzYgMzQuMzctNzAuNzEgMC0xMjYuMTctMzRUMjE5MCA4NjEuODdxLTMwLjQ2LTYzLjA5LTMwLjg2LTE0NS4xMnYtMjguMTNxMC04NCAzMC4yNy0xNDcuODV0ODUuNTUtOThxNTUuMjgtMzQuMTkgMTI2LjM3LTM0LjE4dDEyNi4zNiAzNC4xOHE1NS4yNyAzNC4xOCA4NS41NSA5OHQzMC4yNyAxNDcuNDZ6bS0xMTguNzUtMjUuNzhxMC04OS40NS0zMi0xMzUuOTN0LTkxLjQtNDYuNDlxLTU5IDAtOTEgNDUuOXQtMzIuNDIgMTM0LjU3djI3LjczcTAgODcuMTIgMzIgMTM1LjE2dDkyLjE5IDQ4LjA1cTU5IDAgOTAuNjItNDYuMjl0MzItMTM1ek0zMTc1LjE4IDc5NS42NnEtNi42NiA5MS44LTY3Ljc4IDE0NC41M3QtMTYxLjEzIDUyLjczcS0xMDkuMzggMC0xNzIuMDctNzMuNjN0LTYyLjctMjAyLjE1di0zNC43N3EwLTgyIDI4LjkxLTE0NC41M3Q4Mi42Mi05NS45cTUzLjctMzMuMzkgMTI0LjgtMzMuMzkgOTguNDUgMCAxNTguNiA1Mi43M1QzMTc2IDYwOS4zM2gtMTE3LjIzcS00LjMtNTUuMDgtMzAuNjYtNzkuODl0LTgwLjI4LTI0LjhxLTU4LjU5IDAtODcuNjkgNDJ0LTI5Ljg5IDEzMC4yOHY0M3EwIDkyLjIxIDI3LjkzIDEzNC43N3Q4OC4wOSA0Mi41OHE1NC4yOSAwIDgxLjA1LTI0LjgxdDMwLjY4LTc2Ljh6TTMzNzYuNzQgOTg1LjExaC0xMTcuMTlWNDE2LjM2aDExNy4xOXpNMzgxMy40NiA4NjcuOTJIMzYwOGwtMzkuMDYgMTE3LjE5aC0xMjQuNjJMMzY1NiA0MTYuMzZoMTA4LjZsMjEyLjg5IDU2OC43NWgtMTI0LjU4ek0zNjM5LjYzIDc3M2gxNDIuMTlsLTcxLjQ5LTIxMi44OXpNNDE0Ny44MyA4OTFoMjQ4Ljgzdjk0LjE0aC0zNjZWNDE2LjM2aDExNy4xOXpNNDk1OCA4MzUuODlxMC0zMy4yLTIzLjQ0LTUxdC04NC4zNy0zNy41cS02MC45NC0xOS43MS05Ni40OS0zOC44Ni05Ni44OC01Mi4zNS05Ni44Ny0xNDEgMC00Ni4wOCAyNi04Mi4yM3Q3NC42MS01Ni40NHE0OC42My0yMC4zMSAxMDkuMTgtMjAuMzEgNjAuOTQgMCAxMDguNiAyMi4wN3Q3NCA2Mi4zcTI2LjM3IDQwLjI0IDI2LjM3IDkxLjQxaC0xMTcuMjFxMC0zOS4wNi0yNC42MS02MC43NHQtNjkuMTQtMjEuNjhxLTQzIDAtNjYuOCAxOC4xNlQ0Nzc0IDU2Ny45MnEwIDI3Ljc1IDI3LjkzIDQ2LjQ5dDgyLjIzIDM1LjE1cTEwMCAzMC4wOSAxNDUuNyA3NC42MXQ0NS43MSAxMTAuOTRxMCA3My44My01NS44NiAxMTUuODJ0LTE1MC4zOSA0MnEtNjUuNjIgMC0xMTkuNTQtMjR0LTgyLjIyLTY1LjgycS0yOC4zNC00MS43OS0yOC4zMi05Ni44OGgxMTcuNThxMCA5NC4xNSAxMTIuNSA5NC4xNCA0MS43OSAwIDY1LjIzLTE3dDIzLjQ1LTQ3LjQ4ek01NjE3Ljc1IDk4NS4xMWgtMTE3LjE4Vjc0MS4zNmgtMjI4LjUydjI0My43NWgtMTE3LjE5VjQxNi4zNmgxMTcuMTl2MjMwLjQ3aDIyOC41MlY0MTYuMzZoMTE3LjE4ek02MDQ4LjIyIDg2Ny45MmgtMjA1LjQ3bC0zOS4wNiAxMTcuMTloLTEyNC42MWwyMTEuNzItNTY4Ljc1aDEwOC41OWwyMTIuODkgNTY4Ljc1aC0xMjQuNnpNNTg3NC4zOSA3NzNoMTQyLjE5bC03MS40OC0yMTIuODl6TTY0NzYgNzc2LjkxaC05My40djIwOC4yaC0xMTcuMTlWNDE2LjM2aDIxMS4zM3ExMDAuNzkgMCAxNTUuNDcgNDQuOTJ0NTQuNjggMTI3cTAgNTguMjEtMjUuMTkgOTcuMDd0LTc2LjM3IDYxLjkybDEyMy4wNSAyMzIuNDJ2NS40N0g2NTgyLjZ6TTYzODIuNiA2ODJoOTQuNTNxNDQuMTMgMCA2OC4zNi0yMi40NnQyNC4yMi02MS45MXEwLTQwLjIzLTIyLjg1LTYzLjI4dC03MC4xMi0yMy4wNWgtOTQuMTR6TTY5MDAuNTcgOTg1LjExaC0xMTcuMTlWNDE2LjM2aDExNy4xOXpNNzQ3MS42NiA5ODUuMTFoLTExNy4xOWwtMjI4LjEyLTM3NC4yMnYzNzQuMjJoLTExNy4xOVY0MTYuMzZoMTE3LjE5bDIyOC41MSAzNzV2LTM3NWgxMTYuOHpNODAyNCA5MTMuMjNxLTMxLjY0IDM3LjktODkuNDUgNTguNzl0LTEyOC4xMiAyMC45cS03My44MyAwLTEyOS41LTMyLjIzVDc1OTEgODY3LjE0cS0zMC4yOC02MS4zMi0zMS4wNi0xNDQuMTR2LTM4LjY3cTAtODUuMTYgMjguNzEtMTQ3LjQ2dDgyLjgxLTk1LjMycTU0LjEtMzMgMTI2Ljc2LTMzIDEwMS4xOCAwIDE1OC4yMSA0OC4yNFQ4MDI0IDU5Ny4yMmgtMTE0LjA2cS03LjgxLTQ4LjgzLTM0LjU3LTcxLjQ5dC03My42My0yMi42NXEtNTkuNzcgMC05MSA0NC45MnQtMzEuNjQgMTMzLjU5djM2LjMzcTAgODkuNDYgMzQgMTM1LjE2dDk5LjYxIDQ1LjdxNjYgMCA5NC4xNC0yOC4xMnYtOThoLTEwNi42N3YtODYuMzhIODAyNHoiIGNsYXNzPSJjbHMtMSIvPjwvZz48cGF0aCBpZD0iU29jaWFsX1NoYXJpbmdfTG9nbyIgZmlsbD0iIzAxY2NkMyIgZD0iTTcwOS4zMSAwQzMxNy41NyAwIDAgMzE3LjU3IDAgNzA5LjMxczMxNy41NyA3MDkuMyA3MDkuMzEgNzA5LjMgNzA5LjMtMzE3LjU2IDcwOS4zLTcwOS4zUzExMDEgMCA3MDkuMzEgMHpNNTczLjg0IDcwOS4zMWExNjAuMDYgMTYwLjA2IDAgMCAxLTcuMyA0Ny45MmwxOTguMTMgMTMyLjZhMTYwLjIgMTYwLjIgMCAxIDEtMzAuNDcgOTRjMC0yLjkuMDktNS43Ny4yNC04LjYzTDUxOC4zMyA4MzAuNTZhMTYwLjIxIDE2MC4yMSAwIDEgMS0yLTI0NC4yMmwyMTkuMjgtMTI2LjZhMTYwLjIgMTYwLjIgMCAxIDEgMzUuMyA4MUw1NjUuOCA2NTkuMWExNjAgMTYwIDAgMCAxIDguMDQgNTAuMjF6IiBkYXRhLW5hbWU9IlNvY2lhbCBTaGFyaW5nIExvZ28iLz48L2c+PC9nPjwvc3ZnPg==" alt="Social Sharing logo"></a>
		</div>
	</div>
	<div class="rapiddev-title-bar">
		<div>
			<?php _e('Social sharing', 'rd_socials') ?>
		</div>
	</div>
	<div class="rapiddev-alerts">
		<div class="rapiddev-alert rapiddev-alert-saving">
			<div style="float:left;margin-right: 20px;"><svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 50 50" xml:space="preserve"><path fill="#2a5c73" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z"><animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.6s" repeatCount="indefinite"/></path></svg></div>
			<h1><span id="alert-saving-header">Saving</span></h1>
			<span id="alert-saving-message">?</span>
		</div>
		<div class="rapiddev-alert rapiddev-alert-danger">
			<h1><span id="alert-danger-header">Error</span></h1>
			<span id="alert-danger-message">?</span>
		</div>
		<div class="rapiddev-alert rapiddev-alert-success">
			<h1><span id="alert-success-header">Success</span></h1>
			<span id="alert-success-message">?</span>
		</div>
	</div>
	<div id="rapiddev-body">
		<div class="rapiddev-row">
			<div class="rapiddev-col-6">
				<div class="rapiddev-card">
					<form id="rapiddev-form-social-settings">
						<div class="rapiddev-form-group">
							<input type="text" class="rapiddev-form-control" name="page-id" placeholder="<?php _e('Facebook page ID', 'rd_socials') ?>" value="<?php echo $options['page-id']; ?>">
						</div>
						<div class="rapiddev-form-group">
							<input type="text" class="rapiddev-form-control" name="page-token" placeholder="<?php _e('Facebook page token', 'rd_socials') ?>" value="<?php echo $options['page-token']; ?>">
						</div>
						<div class="rapiddev-form-group">
							<div class="rapiddev-switch-row">
								<div class="rapiddev-switch-wrapper">
									<input id="tags-checkbox" name="tags-checkbox" <?php echo (!$options['tags']) ?: 'checked' ?> value="1" class="rapiddev-switch-input" type="checkbox" />
									<label class="rapiddev-switch-label rapiddev-switch-toggle" for="tags-checkbox">
										<span class="toggle--handler"></span>
									</label>
								</div>
								<label for="tags-checkbox" class="rapiddev-switch-description"><?php _e('Attach the first ten tags to the published post', 'rd_socials') ?></label>
							</div>
						</div>
						<div class="rapiddev-form-group">
							<div class="rapiddev-switch-row">
								<div class="rapiddev-switch-wrapper">
									<input id="url-checkbox" name="url-checkbox" <?php echo (!$options['url']) ?: 'checked' ?> value="1" class="rapiddev-switch-input" type="checkbox" />
									<label class="rapiddev-switch-label rapiddev-switch-toggle" for="url-checkbox">
										<span class="toggle--handler"></span>
									</label>
								</div>
								<label for="url-checkbox" class="rapiddev-switch-description"><?php _e('Attach the page URL to the published post', 'rd_socials') ?></label>
							</div>
						</div>
					</form>
					<div class="rapiddev-veis-result" style="display: none;"></div>
					<div class="rapiddev-space"></div>
					<button id="social-save-options" class="rapiddev-btn rapiddev-btn-block rapiddev-btn-blue" type="button"><?php _e('Save changes', 'rd_socials') ?></button>
				</div>
			</div>
			<div class="rapiddev-col-4">
				<div class="rapiddev-card">
					<div class="rapiddev-form-group">
						<a id="publish-test-post" class="rapiddev-btn rapiddev-btn-block rapiddev-btn-blue" href="#" type="button"><?php _e('Try publish test post', 'rd_socials') ?></a>
					</div>
					<a class="rapiddev-btn rapiddev-btn-block rapiddev-btn-blue <?php echo ($options['page-token']!='' ?: 'disabled'); ?>" <?php echo ($options['page-token'] == '' ? 'href="#"': 'target="_blank" rel="noopener" href="https://developers.facebook.com/tools/debug/accesstoken/?access_token='.$options['page-token'].'&version=v3.2"'); ?> type="button"><?php _e('Get permanent token', 'rd_socials') ?></a>
				</div>
				<div class="rapiddev-card">
					<ul class="rapiddev-list">
						<li><a href="https://www.facebook.com/pages/?category=your_pages" target="_blank" rel="noopener"><?php _e('My Facebook pages', 'rd_socials') ?></a></li>
						<li><a href="https://developers.facebook.com/apps" target="_blank" rel="noopener"><?php _e('Facebook Apps Dashboard', 'rd_socials') ?></a></li>
						<li><a href="https://developers.facebook.com/tools/explorer/" target="_blank" rel="noopener"><?php _e('Graph API Explorer', 'rd_socials') ?></a></li>
					</ul>
				</div>
			</div>
			<div class="rapiddev-col-4">
				<div class="rapiddev-card">
					<p>
						<b><?php _e('Where can I find my token', 'rd_socials') ?>?</b>
						<ol>
							<li><?php _e('Open Graph Api Explorer', 'rd_socials') ?>.</li>
							<li><?php _e('Choose your application in the upper right corner', 'rd_socials') ?>.</li>
							<li><?php _e('From the "Get Token" button, select your fanpage from the "Page Access Token" list', 'rd_socials') ?>.</li>
							<li><?php _e('Paste your token in Social Sharing settings and save changes', 'rd_socials') ?>.</li>
							<li><?php _e('Click the "Get temporary token" button', 'rd_socials') ?>.</li>
						</ol>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>